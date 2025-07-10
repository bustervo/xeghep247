<nav class="bg-white border-b border-gray-200 px-4 py-3 flex items-center justify-between flex-wrap">
    <div class="flex items-center space-x-4">
        <a href="{{ url('/') }}" class="text-green-700 font-bold text-lg">XEGHEP247</a>
        <button class="sm:hidden text-2xl" onclick="document.getElementById('menu').classList.toggle('hidden')">
            ☰
        </button>
    </div>

    <ul id="menu" class="hidden sm:flex sm:items-center sm:space-x-6 mt-2 sm:mt-0">
        <li><a href="{{ url('/tuyen-xe') }}" class="text-gray-700 hover:text-green-700 font-semibold">Tuyến xe</a></li>
        <li><a href="https://zalo.me/0793459687" class="text-gray-700 hover:text-green-700 font-semibold">Đặt xe</a></li>
        <li><a href="{{ url('/tin-tuc') }}" class="text-gray-700 hover:text-green-700 font-semibold">Tin tức</a></li>
        <li><a href="{{ url('/lien-he') }}" class="text-gray-700 hover:text-green-700 font-semibold">Liên hệ</a></li>
    </ul>

    <div class="hidden sm:block">
        <a href="https://zalo.me/0793459687" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
            Zalo Đặt Xe
        </a>
    </div>
</nav>
