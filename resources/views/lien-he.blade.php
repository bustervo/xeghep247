@extends('layouts.app')

@section('title', 'Liên hệ XEGHEP247 - Đặt xe nhanh, phản hồi siêu tốc')

@section('content')
<style>
  .trust {
  background: #f1f8e9;
  padding: 40px 16px;
  text-align: center;
}

.trust h2 {
  color: #2e7d32;
  font-size: 26px;
  margin-bottom: 24px;
}

.trust h2 span {
  color: #1b5e20;
  font-weight: bold;
}

.reasons {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  max-width: 1000px;
  margin: 0 auto;
}

.reason-box {
  flex: 1 1 220px;
  background: #fff;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.06);
  transition: all 0.3s ease;
}

.reason-box:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 16px rgba(0,0,0,0.1);
}

.reason-box .icon {
  font-size: 32px;
  margin-bottom: 12px;
  color: #2e7d32;
}

.reason-box p {
  font-size: 15px;
  color: #333;
  line-height: 1.5;
}

  .hero {
    background: #e8f5e9;
    text-align: center;
    padding: 48px 16px;
  }
  .hero h1 {
    font-size: 30px;
    margin-bottom: 10px;
    color: #2e7d32;
  }
  .hero p {
    font-size: 16px;
    color: #555;
  }

  .contact-options {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 40px 20px;
    max-width: 1000px;
    margin: 0 auto;
  }

  .option-box {
    flex: 1 1 280px;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 24px;
    background: #fafafa;
    text-align: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.03);
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .option-box:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(46, 125, 50, 0.15);
    background: #ffffff;
    border-color: #c8e6c9;
  }

  .option-box h3 {
    margin-top: 0;
    color: #2e7d32;
    font-size: 20px;
  }

  .option-box p {
    font-size: 14px;
    color: #444;
    margin: 8px 0;
  }

  .option-box a.button {
    display: inline-block;
    margin-top: 12px;
    padding: 10px 20px;
    background: #2e7d32;
    color: #fff;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    transition: background 0.3s ease, transform 0.3s ease;
  }

  .option-box a.button:hover {
    background: #1b5e20;
    transform: scale(1.05);
  }

  .trust {
    background: #f1f8e9;
    text-align: center;
    padding: 32px 16px;
  }

  .trust h2 {
    color: #2e7d32;
    margin-bottom: 16px;
  }

  .trust p {
    font-size: 15px;
    color: #555;
    margin: 4px 0;
  }
</style>


<section class="hero">
  <h1>Liên hệ XEGHEP247 – phản hồi siêu tốc 24/7</h1>
  <p>Hỗ trợ đặt xe, phản ánh dịch vụ, hợp tác vận tải – Tất cả trong một cú nhấn</p>
</section>

<section class="contact-options">
  <div class="option-box">
    <h3>📲 Zalo nhanh</h3>
    <p>Gửi yêu cầu qua Zalo, phản hồi trong 5 phút</p>
    <a href="https://zalo.me/0793459687" class="button" target="_blank">Nhắn Zalo ngay</a>
  </div>
  <div class="option-box">
    <h3>📞 Gọi điện</h3>
    <p>Liên hệ tổng đài: 08:00 – 22:00 mỗi ngày</p>
    <a href="tel:0793459687" class="button">Gọi ngay</a>
  </div>
  <div class="option-box">
    <h3>📝 Gửi yêu cầu</h3>
    <p>Điền thông tin – chúng tôi gọi lại trong 30 phút</p>
    <a href="#" class="button">Mở form</a>
  </div>
</section>

<section class="trust">
  <h2>Vì sao chọn <span>XEGHEP247?</span></h2>
  <div class="reasons">
    <div class="reason-box">
      <div class="icon">💬</div>
      <p>100.000+ khách hàng<br>đã liên hệ qua Zalo</p>
    </div>
    <div class="reason-box">
      <div class="icon">⭐</div>
      <p>1.000+ đánh giá 5 sao<br>Google & Facebook</p>
    </div>
    <div class="reason-box">
      <div class="icon">📍</div>
      <p>5 văn phòng hỗ trợ<br>toàn quốc</p>
    </div>
    <div class="reason-box">
      <div class="icon">👩‍💼</div>
      <p>Tư vấn viên online<br>liên tục 24/7</p>
    </div>
  </div>
</section>


@endsection
