<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | Xe Ghép 247</title>

    <!-- Tailwind / App CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
</head>
<body class="bg-gray-100 text-gray-900 font-sans">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        {{-- Logo hoặc QR nếu muốn --}}
        <div class="mb-6">
            <a href="/">
                <img src="{{ asset('assets/logo-xeghep247-net.png') }}" alt="Logo" width="120">
            </a>
        </div>

        {{-- Nội dung chính --}}
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
