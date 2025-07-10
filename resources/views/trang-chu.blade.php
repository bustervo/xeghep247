@extends('layouts.app')

@section('title', 'Xe Ghép 247 – Đặt Xe Giá Rẻ | Ghép Chuyến Toàn Quốc')

@section('content')
<style>
  .banner-content h1 {
  font-size: 32px;
  font-weight: 800;
  margin-bottom: 8px;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.banner-content .subheading {
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 4px;
  color: #ffffffdd;
}

.banner-content .tagline {
  font-size: 16px;
  color: #ffffffcc;
  margin-bottom: 20px;
}

.qr-only-mobile img {
  width: 180px;
  margin-top: 20px;
}

  .qr-only-desktop {
    display: flex;
    gap: 10px;
    position: absolute;
    bottom: 20px;
    right: 20px;
    z-index: 2;
  }

  .qr-only-mobile {
    display: none;
  }

  @media (max-width: 768px) {
    .qr-only-desktop {
      display: none;
    }

    .qr-only-mobile {
      display: flex;
      justify-content: center;
      margin-top: 20px;
      position: relative;
      z-index: 2;
    }

 .qr-only-mobile img {
  width: 230px;
  max-width: 80%;
  border: 6px solid white;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}

  }

  .banner {
    background: url('{{ asset('assets/banner.jpg') }}') no-repeat center/cover;
    padding: 100px 20px;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
  }

  .banner::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.4);
    z-index: 0;
  }

  .banner-content {
    position: relative;
    z-index: 1;
    max-width: 900px;
    margin: auto;
  }

  .banner-content h1 {
    font-size: 36px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  @media (max-width: 768px) {
    .banner {
      padding: 80px 20px;
    }

    .banner-content h1 {
      font-size: 28px;
    }
  }

  .routes, .process {
    padding: 40px 20px;
    max-width: 1100px;
    margin: auto;
  }

  .route-list, .step-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
  }

  .card {
    width: 280px;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    background: #fff;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  }

  .card h3 a {
    color: inherit;
    text-decoration: none;
  }

  .card h3 a:hover {
    color: #2e7d32;
  }

  .price {
    color: green;
    font-size: 20px;
    margin: 10px 0;
  }

  .step {
  width: 22%;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}


  .step img {
    width: 60px;
    margin-bottom: 10px;
  }

  @media (max-width: 768px) {
    .step {
      width: 45%;
    }
    .card {
      width: 90%;
    }
  }

  .why-zalo {
    padding: 40px 20px;
    background: #fff;
  }

  .why-content {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 40px;
    flex-wrap: wrap;
    max-width: 1000px;
    margin: auto;
  }

  .qr {
    text-align: center;
  }

  .qr-caption {
    font-weight: bold;
    color: #2e7d32;
    margin-top: 10px;
  }

  .why-text h3 {
    color: #2e7d32;
    margin-bottom: 16px;
  }

  .why-text ul {
    list-style: disc inside;
    color: #444;
    padding-left: 0;
    font-size: 16px;
    line-height: 1.6;
  }

  @media (max-width: 768px) {
    .why-content {
      flex-direction: column;
      text-align: center;
    }

    .why-text ul {
      text-align: left;
      display: inline-block;
    }
  }
  .route-card {
  width: 280px;
  background: #fff;
  border-radius: 12px;
  padding: 24px 20px;
  text-align: center;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  transition: transform 0.2s ease, box-shadow 0.3s ease;
  border: 1px solid #e0e0e0;
}

.route-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

.route-name {
  font-size: 18px;
  font-weight: 700;
  color: #2e2e2e;
  margin-bottom: 12px;
}

.route-price {
  font-size: 22px;
  font-weight: bold;
  color: #2e7d32;
  margin-bottom: 6px;
}

.route-duration {
  font-size: 15px;
  color: #666;
  margin-bottom: 20px;
}

.route-btn {
  background-color: #2e7d32;
  color: #fff;
  padding: 10px 18px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  transition: background 0.3s ease;
  display: inline-block;
}

.route-btn:hover {
  background-color: #1b5e20;
}
.routes h2,
.process h2 {
  text-align: center;
  font-size: 28px;
  font-weight: 700;
  margin-bottom: 30px;
  color: #1b5e20;
}


</style>

<section class="banner">
  <div class="banner-content">
    <h1>XEGHEP247.NET</h1>
    <p class="subheading">Xe ghép toàn quốc – Giá rẻ – Đúng giờ – Uy tín</p>
    <p class="tagline">Đặt nhanh qua Zalo, tài xế xác nhận liền tay</p>

    <a href="https://zalo.me/0793459687" class="btn">Đặt xe ngay qua Zalo</a>

    <!-- QR cho mobile -->
    <div class="qr-only-mobile">
      <img src="{{ asset('assets/zalo-qr.png') }}" alt="QR Zalo">
    </div>
  </div>

  <!-- QR desktop góc phải -->
  <div class="qr-only-desktop">
    <img src="{{ asset('assets/logo-xeghep247-net.png') }}" alt="Logo XEGHEP247" width="120">
    <img src="{{ asset('assets/zalo-qr.png') }}" alt="QR Zalo" width="120">
  </div>
</section>


<section class="routes">
  <h2>Các tuyến xe phổ biến</h2>
  <div class="route-list">
    @php
      $routes = [
        ['name' => 'Đà Nẵng – Tam Kỳ', 'price' => '100.000đ', 'duration' => '1 giờ 10 phút'],
        ['name' => 'Đà Nẵng – Hội An', 'price' => '80.000đ', 'duration' => '0 giờ 45 phút'],
        ['name' => 'Đà Nẵng - Chu Lai', 'price' => '130.000đ', 'duration' => '1 giờ 30 phút'],
        ['name' => 'TP.HCM - Mỹ Tho', 'price' => '150.000đ', 'duration' => '1 giờ 11 phút'],
        ['name' => 'TP.HCM - Gò Công', 'price' => '130.000đ', 'duration' => '0 giờ 50 phút'],
        ['name' => 'TP.HCM – Vũng Tàu', 'price' => '150.000đ', 'duration' => '1 giờ 10 phút'],
      ];
    @endphp

    @foreach($routes as $route)
<div class="card route-card">
  <h3 class="route-name">{{ $route['name'] }}</h3>
  <div class="route-price">{{ $route['price'] }}</div>
  <div class="route-duration">{{ $route['duration'] }}</div>
  <a href="https://zalo.me/0793459687" class="btn route-btn">Đặt ngay</a>
</div>

    @endforeach
  </div>
</section>

<section class="process">
  <h2>Quy trình đặt xe</h2>
  <div class="step-group">
    <div class="step"><img src="{{ asset('assets/icon-zalo.png') }}"><p>Gửi yêu cầu qua Zalo</p></div>
    <div class="step"><img src="{{ asset('assets/icon-match.png') }}"><p>Ghép chuyến nhanh</p></div>
    <div class="step"><img src="{{ asset('assets/icon-driver.png') }}"><p>Tài xế xác nhận</p></div>
    <div class="step"><img src="{{ asset('assets/icon-pickup.png') }}"><p>Đón đúng giờ</p></div>
  </div>

  <section class="why-zalo">
    <div class="container">
      <div class="why-content">
        <div class="qr">
          <img src="{{ asset('assets/zalo-qr.png') }}" alt="QR Zalo" width="160">
          <p class="qr-caption">Quét Zalo để đặt xe giá rẻ</p>
        </div>
        <div class="why-text">
          <h3>Tại sao nên đặt xe qua Zalo?</h3>
          <ul>
            <li>Không cần tải app</li>
            <li>Phản hồi tự động trong 5 giây</li>
            <li>Ghép chuyến chuẩn giờ, đúng tuyến</li>
            <li>Ưu đãi giá rẻ mỗi ngày</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</section>
@endsection
