<!-- Mobile Menu Start -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" style="background-color: #203469">

    <div class="offcanvas-header">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">

        <div class="header-top-info">
            <h4 style="color: #EFD256">UPTD Laboratorium Bahan Konstruksi</h4>
            <h4 style="color: #EFD256">Dinas Pekerjaan Umum Bina Marga dan Tata Ruang</h4>
            <h4 style="color: #EFD256">Provinsi Sumatera Selatan</h4>
            <p>Hubungi Kami : <span class="text-white">{{ $identity_website->no_tlp }}</span></p>
            <p>
                @foreach ($social_media as $item)
                    <a class="text-white mx-2 " href="{{ $item->url }}" target="_blank">
                        <i class="{{ $item->icon }}"></i>
                    </a>
                @endforeach
            </p>
        </div>

        <div class="mobile-menu-items">
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
                {{-- <li><a href="{{ route('beranda') }}" class="text-white">Beranda</a></li>
                <li><a href="javascript:;" class="text-white">Profil</a>
                    <ul class="sub-menu" style="background-color: white">
                        <li><a href="{{ route('sejarah') }}" style="color:#203469">Sejarah</a></li>
                            <li><a href="{{ route('visi-misi') }}" style="color:#203469">Visi Misi</a></li>
                            <li><a href="{{ route('struktur') }}" style="color:#203469">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li><a href="javascript:;" class="text-white">Berita</a>
                    <ul class="sub-menu" style="background-color: white">
                        <li><a href="{{ route('kegiatan') }}" style="color:#203469">Berita DPMD</a></li>
                        <li><a href="berita/{page}" style="color:#203469">Berita Sumsel</a></li>
                    </ul>
                </li>
                <li><a href="javascript:;" class="text-white">Informasi</a>
                    <ul class="sub-menu" style="background-color: white">
                        <li><a href="{{ route('setiap-saat') }}" style="color:#203469">Informasi Setiap Saat</a></li>
                        <li><a href="{{ route('berkala') }}" style="color:#203469">Informasi Berkala</a></li>
                        <li><a href="{{ route('serta-merta') }}" style="color:#203469">Informasi Serta Merta</a></li>
                    </ul>
                </li>
                <li><a href="javascript:;" class="text-white">Galeri</a>
                    <ul class="sub-menu" style="background-color: white">
                        <li><a href="{{ route('foto') }}" style="color:#203469">Foto</a></li>
                        <li><a href="{{ route('video') }}" style="color:#203469">Video</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('agenda') }}" class="text-white">Agenda</a></li>
                <li><a href="{{ route('kontak-kami') }}" class="text-white">Kontak Kami</a></li> --}}
            </ul>

        </div>
        <!-- Mobile Menu End -->

    </div>
</div>
<!-- Mobile Menu End -->
