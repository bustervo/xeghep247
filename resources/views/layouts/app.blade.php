<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Xe Ghép 247')</title>

  {{-- Meta Description SEO --}}
  @hasSection('meta')
    @yield('meta')
  @else
    <meta name="description" content="XEGHEP247.NET - Đặt xe ghép giá rẻ toàn quốc. Ghép khách chuẩn giờ, xe đẹp, tài xế uy tín. Đặt nhanh qua Zalo 24/7.">
  @endif

  <link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <style>
    * { box-sizing: border-box; }
    body { font-family: 'Segoe UI', sans-serif; margin: 0; background: #fff; color: #111; line-height: 1.6; }
    header, footer { background: #f8f8f8; padding: 10px 20px; }
    nav { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; }
    nav .logo { font-size: 20px; font-weight: bold; color: green; }
    nav ul { display: flex; list-style: none; gap: 20px; margin: 0; padding: 0; }
    nav a { text-decoration: none; color: #111; font-weight: 600; }
    .btn { background: #2e7d32; color: #fff; padding: 10px 20px; border-radius: 6px; text-decoration: none; display: inline-block; margin-top: 10px; }
    footer { text-align: center; font-size: 14px; padding: 30px 20px; }
    .menu-toggle { display: none; font-size: 24px; cursor: pointer; }
    @media (max-width: 768px) {
      nav ul { display: none; flex-direction: column; width: 100%; margin-top: 10px; }
      nav ul.active { display: flex; }
      .menu-toggle { display: block; }
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const toggle = document.getElementById('menu-toggle');
      const menu = document.getElementById('menu-list');
      if (toggle && menu) {
        toggle.addEventListener('click', () => {
          menu.classList.toggle('active');
        });
      }
    });
  </script>

  @stack('head')
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
  <header>
    <nav>
      <a href="{{ url('/') }}" class="logo">XEGHEP247</a>
      <div id="menu-toggle" class="menu-toggle">☰</div>
      <ul id="menu-list">
        <li><a href="{{ url('/tuyen-xe') }}">Tuyến xe</a></li>
        <li><a href="#">Đặt xe</a></li>
        <li><a href="{{ url('/tin-tuc') }}">Tin tức</a></li>
        <li><a href="{{ url('/lien-he') }}">Liên hệ</a></li>
        @auth
          <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        @endauth
      </ul>
      <a href="https://zalo.me/0793459687" class="btn">Zalo Đặt xe</a>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    <p><strong>XEGHEP247</strong> - 111 Hoa Phượng, P2, Phú Nhuận, TP.HCM | Hotline: 079.345.9687 | Email: admin@xeghep247.net</p>
    <p><a href="#">Chính sách riêng tư</a> | <a href="#">Điều khoản</a></p>
  </footer>
  @stack('scripts')

</body>
</html>
