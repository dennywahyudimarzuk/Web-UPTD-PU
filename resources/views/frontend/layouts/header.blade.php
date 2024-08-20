<!-- Header top Start -->
<div class="header-top d-none d-lg-block" style="background-color: #4FC0E8">
    <div class="container">

        <!-- Header top Wrapper Start -->
        <div class="header-top-wrapper d-flex justify-content-center py-1 text-white">

            <!-- Header top Wrapper Start -->
            <p style="font-weight: 500; font-size: 16px" class="me-1">Kunjungi Kami :</p>
            <div class="header-top-info p-0">
                @foreach ($social_media as $item)
                    <p style="font-weight: 500; font-size: 16px">
                        <a style="color:#fff" href="{{ $item->url }}"target="_blank">
                            <i class="{{ $item->icon }} me-1 rounded"
                                style="background-color: {{ $item->background }}"></i>{{ $item->name }}
                        </a>
                    </p>
                @endforeach
                {{-- <p style="font-weight: 500; font-size: 16px">
                    <a style="color:#fff" href="https://www.instagram.com/dinaspmdsumsel/" target="_blank">
                        <i class="icofont-instagram me-1 rounded" style="background-color: #001248"></i>DPMD Sumsel
                    </a>
                </p>
                <p style="font-weight: 500; font-size: 16px">
                    <a style="color:#fff" href="https://www.youtube.com/@dinaspemberdayaanmasyaraka3734" target="_blank">
                        <i class="icofont-youtube-play me-1 rounded px-1" style="background-color: #001248"></i>DPMD Sumsel
                    </a>
                </p> --}}
            </div>
            <!-- Header top Wrapper End -->

            <!-- Header top Wrapper Start -->
            {{-- @if (!Auth::guard()->check())
                <div class="header-top-btn">
                    <a style="color: #FDFF01" href={{ route('login') }}>Masuk</a>
                    <a style="color: #FDFF01" href={{ route('register') }}>Daftar</a>
                </div>
            @else
                <div class="dropdown">
                    <div class="header-top-btn" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <a style="color: #FDFF01">{{ Auth::user()->nama }}</a>
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item"  href={{ route('logout') }}>Logout</a></li>
                    </ul>
                  </div>
            @endif --}}
            <!-- Header top Wrapper End -->

        </div>
        <!-- Header top Wrapper End -->

    </div>
</div>
<!-- Header top End -->
