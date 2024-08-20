<!-- Header Main Start -->
<div class="header-main" style="background-color: #fff">
    <div class="container">

        <!-- Header Main Start -->
        <div class="header-main-wrapper justify-content-between row">

            <!-- Header Logo Start -->
            <div class="header-logo col-auto">
                <a href="{{ route('beranda') }}">
                    <img width="400" src="{{ asset('storage/identities/' . $identity_website->logo) }}" alt="Logo">
                </a>
            </div>
            <!-- Header Logo End -->

            <!-- Header Menu Start -->
            <div class="primary-menu d-none d-lg-block col-auto p-0">
                <ul class="nav-menu">
                    @foreach ($menu as $item)
                        <li class="{{ Request::is(Str::lower($item->name) . '/*') ? 'active' : '' }}">
                            <a href={{ $item->url != '' ? url($item->url) : 'javascript:;' }}>{{ $item->name }} </a>
                            @if (count($item->menu_child) != 0)
                                <ul class="sub-menu">
                                    @foreach ($item->menu_child as $item_child)
                                        <li><a
                                                href={{ $item_child->url != '' ? url(Str::lower($item->name) . '/' . $item_child->url) : 'javascript:;' }}>{{ $item_child->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                    {{-- <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li><a href="javascript:;">Profil</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('sejarah') }}">Sejarah</a></li>
                            <li><a href="{{ route('visi-misi') }}">Visi Misi</a></li>
                            <li><a href="{{ route('struktur') }}">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;">Berita</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('kegiatan') }}">Berita DPMD</a></li>
                            <li><a href="berita/{$page}">Berita Sumsel</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;">Informasi</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('setiap-saat') }}">Informasi Setiap Saat</a></li>
                            <li><a href="{{ route('berkala') }}">Informasi Berkala</a></li>
                            <li><a href="{{ route('serta-merta') }}">Informasi Serta Merta</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;">Galeri</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('foto') }}">Foto</a></li>
                            <li><a href="{{ route('video') }}">Video</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('agenda') }}">Agenda</a></li>
                    <li><a href="{{ route('kontak-kami') }}">Kontak Kami</a></li> --}}
                </ul>

            </div>
            <!-- Header Menu End -->

            <!-- Header Meta Start -->
            <div class="header-meta d-block d-lg-none col-auto">

                <div class="header-toggle d-flex align-items-center d-lg-none">
                    <button class="menu-toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>

            </div>
            <!-- Header Meta End -->

        </div>
        <!-- Header Main End -->

    </div>
</div>
<!-- Header Main End -->
