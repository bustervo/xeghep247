@extends('layouts.app')

@section('title', 'Danh mục tuyến xe | XEGHEP247')

@section('content')
<style>
  .hero {
    background: linear-gradient(to right, #e0f7fa, #f1f8e9);
    padding: 40px 32px;
    text-align: center;
  }

  .hero h1 {
    margin: 0;
    font-size: 28px;
    color: #2e7d32;
  }

  .filter-box {
    display: flex;
    justify-content: center;
    gap: 16px;
    margin: 32px 0;
    flex-wrap: wrap;
  }

  .filter-box select,
  .filter-box button {
    padding: 10px 14px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 6px;
  }

  .filter-box button {
    background-color: #2e7d32;
    color: white;
    border: none;
    cursor: pointer;
  }

  .route-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    padding: 0 32px 64px;
  }

  .route-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
  }

  .route-card h3 {
    margin: 0 0 8px;
    color: #2e7d32;
  }

  .route-card p {
    margin: 4px 0;
    font-size: 14px;
    color: #555;
  }

  .route-card a {
    display: inline-block;
    margin-top: 12px;
    padding: 8px 16px;
    background-color: #2e7d32;
    color: #fff;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
  }
</style>

<section class="hero">
  <h1>Danh mục các tuyến xe ghép toàn quốc</h1>
  <p>Chọn tuyến phù hợp và đặt xe qua Zalo ngay!</p>
</section>

<section class="filter-box">
  <select><option>Đi từ...</option><option>TP.HCM</option><option>Đà Nẵng</option></select>
  <select><option>Đến...</option><option>Tiền Giang</option><option>Kon Tum</option></select>
  <button>Tìm tuyến</button>
</section>

<section class="route-grid">
  @php
    $routes = [
      ['name' => 'TP.HCM → Mỹ Tho', 'duration' => '1 giờ 30 phút', 'price' => '200.000đ'],
      ['name' => 'Đà Nẵng → Măng Đen', 'duration' => '4 giờ 11 phút', 'price' => '400.000đ'],
      ['name' => 'TP.HCM → Gò Công', 'duration' => '0 giờ 50 phút', 'price' => '130.000đ'],
      ['name' => 'TP.HCM → Mỹ Tho', 'duration' => '1 giờ 30 phút', 'price' => '200.000đ'],
      ['name' => 'Đà Nẵng → Măng Đen', 'duration' => '4 giờ 11 phút', 'price' => '400.000đ'],
      ['name' => 'TP.HCM → Gò Công', 'duration' => '0 giờ 50 phút', 'price' => '130.000đ'],
      ['name' => 'TP.HCM → Mỹ Tho', 'duration' => '1 giờ 30 phút', 'price' => '200.000đ'],
      ['name' => 'Đà Nẵng → Măng Đen', 'duration' => '4 giờ 11 phút', 'price' => '400.000đ'],
      ['name' => 'TP.HCM → Gò Công', 'duration' => '0 giờ 50 phút', 'price' => '130.000đ'],
      ['name' => 'TP.HCM → Gò Công', 'duration' => '0 giờ 50 phút', 'price' => '130.000đ'],
      ['name' => 'TP.HCM → Gò Công', 'duration' => '0 giờ 50 phút', 'price' => '130.000đ'],
    ];
  @endphp

  @foreach($routes as $route)
    <div class="route-card">
      <h3>{{ $route['name'] }}</h3>
      <p>{{ $route['duration'] }}</p>
      <p>{{ $route['price'] }}</p>
      <a href="https://zalo.me/0793459687">Đặt qua Zalo</a>
    </div>
  @endforeach
</section>
@endsection
