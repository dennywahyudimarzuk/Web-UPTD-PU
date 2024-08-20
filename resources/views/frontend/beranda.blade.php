@extends('frontend.layouts.app')

@section('title', 'Beranda')
@section('content')

    {{-- <div class="section slider-section d-none d-md-block">

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($banner as $item)
                    <div class="carousel-item single-slider {{ $loop->index == 0 ? 'active' : '' }}"
                        style="background-image: url({{ asset('storage/banners/') . '/' . $item->image }}); height: 550px">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
        </div>

    </div> --}}

    <div class="section slider-section">

        <div id="carouselExampleIndicators1" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($banner as $item)
                    <div class="carousel-item single-slider p-0 {{ $loop->index == 0 ? 'active' : '' }}"
                        style="height: 100%">
                        <img src="{{ asset('storage/banners/' . $item->image) }}" alt="" style="width: 100%">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators1"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators1"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
        </div>

    </div>

    <div id="berita" class="section section-padding-01">
        <div class="container">
            <div class="row">
                <div class="section-title col" data-aos="fade-right" data-aos-delay="200">
                    <h5 class="sub-title" style="letter-spacing: 0px; text-transform: initial; font-weight: 600">Kegiatan
                        <span style="color: #fbc005;">UPTD LABBK Sumsel<span>
                    </h5>
                </div>
                <div class="blog-btn text-end col" data-aos="fade-left" data-aos-delay="200">
                    <a href="berita/berita-uptdlabbk" class="btn-custom-01 px-2 rounded">Lainnya</a>
                </div>
            </div>
            <div class="blog-items row">
                @foreach ($berita_uptdlabbk3 as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog" data-aos="fade-up" data-aos-delay="200">
                            {{-- @foreach ($item->gambar as $newsimage) --}}
                            <div class="blog-image">
                                {{-- <a href="/berita-uptdlabbk/detail/{{ Str::slug($item->title) }}" --}}
                                <a href="{{ route('beritadetail', ['pg' => 'berita-uptdlabbk', 'slug' => $item->slug]) }}"
                                    style=" height: 300px;
                                                background-size: cover;
                                                background-repeat: no-repeat;
                                                background-position: center;
                                                background-image: url({{ asset('storage/news/' . $item->gambar[0]->image) }});">
                                </a>
                            </div>
                            {{-- @endforeach --}}
                            <div class="blog-content">
                                <ul class="meta">
                                    <li><i class="fa fa-calendar-alt"></i>
                                        <small>
                                            {{ \Carbon\Carbon::parse($item->publish_date)->isoFormat('dddd, D MMMM Y') }}
                                        </small>
                                    </li>
                                    <li> <i class="fa fa-user"></i> Admin</li>
                                </ul>
                                <h3 class="title"><a href="{{ route('beritadetail', ['pg' => 'berita-uptdlabbk', 'slug' => $item->slug]) }}">{{ $item->title }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="section py-3"
        style="background: linear-gradient(to right,#fbc005 0%, #fbc005 20%, #203469 40%, #203469 0%)">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 d-flex align-items-center justify-content-center" data-aos="fade-right"
                    data-aos-delay="200">
                    <img class="py-2" src="{{ asset('storage/identities/' . $identity_website->icon) }}"
                        style="width: 50%" alt="img">
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-center text-center text-md-start"
                    data-aos="fade-left" data-aos-delay="200">
                    <div class="">
                        <h2 class="text-white">Komitmen Kami</h2>
                        <br>
                        <p class="lead text-white">{{ $identity_website->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-padding-01" style="background-color: #eff3f9">
        <div class="container">
            <div class="blog-wrapper px-2">
                <div class="section-title text-center" data-aos="fade-up" data-aos-delay="200">
                    <h5 class="sub-title" style="letter-spacing: 0px; text-transform: initial; font-weight: 600">Galeri
                        <span style="color: #fbc005;">Foto<span>
                    </h5>
                </div>
                <div class="blog-items">
                    <div class="row">
                        @foreach ($foto as $item)
                            <div class="col-lg-3 col-md-6">
                                <div class="single-blog" data-aos="fade-up" data-aos-delay="200" type="button"
                                    data-bs-toggle="modal" data-bs-target="#modal_{{ $item->id }}">
                                    {{-- <div class="single-blog" data-aos="fade-up" data-aos-delay="200" type="button" data-bs-toggle="modal" data-bs-target="#modal_1"> --}}
                                    <div class="rounded"
                                        style="height: 250px;
                                                background-size: cover;
                                                background-repeat: no-repeat;
                                                background-position: center;
                                                background-image: url({{ asset('storage/gallery/images/' . $item->image) }});">
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modal_{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                {{-- <div class="modal fade" id="modal_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <img src="{{ asset('storage/gallery/images/' . $item->image) }}"
                                            style="width: 100%" alt="">
                                        {{-- <img src="{{ asset('frontend/fotokegiatan.png')}}" style="width: 100%" alt=""> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="berita" class="section section-padding-01">
        <div class="container">
            <div class="row">
                <div class="section-title col" data-aos="fade-right" data-aos-delay="200">
                    <h5 class="sub-title" style="letter-spacing: 0px; text-transform: initial; font-weight: 600">Berita
                        <span style="color: #fbc005;">Sumsel<span>
                    </h5>
                </div>
                <div class="blog-btn text-end col" data-aos="fade-left" data-aos-delay="200">
                    <a href="berita/berita-sumsel" class="btn-custom-01 px-2 rounded">Lainnya</a>
                </div>
            </div>
            <div class="blog-items row">
                @if (count($berita3) > 0)
                    @foreach ($berita3 as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog" data-aos="fade-up" data-aos-delay="200">
                                <div class="blog-image">
                                    <a href="{{ route('beritadetail', ['pg' => 'berita-sumsel', 'slug' => $item->slug]) }}"
                                        style=" height: 300px;
                                                    background-size: cover;
                                                    background-repeat: no-repeat;
                                                    background-position: center;
                                                    background-image: url({{ $item->filegambar }});">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <ul class="meta">
                                        <li> <i class="fa fa-calendar-alt"></i>
                                            <small>{{ $item->tgl }}</small>
                                        </li>
                                    </ul>
                                    <h3 class="title">
                                        <a href="{{ route('beritadetail', ['pg' => 'berita-sumsel', 'slug' => $item->slug]) }}">{{ $item->judul }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div id="berita" class="section section-padding-01" style="background-color: #eff3f9">
        <div class="container">

            <!-- Blog Wrapper Start -->
            <div class="blog-wrapper">
                <div class="section-title" data-aos="fade-up" data-aos-delay="200">
                    <h5 class="sub-title" style="letter-spacing: 0px; text-transform: initial; font-weight: 600">Temukan
                        Kami di
                        <span style="color: #fbc005;">Media Sosial<span>
                    </h5>
                </div>
                <div class="blog-items mt-4">
                    <div class="row">
                        @foreach ($social_media as $item)
                            <div class="col-lg-4 col-md-6">
                                <a class="rounded mt-2" href="{{ $item->url }}" title="facebook" target="_blank"
                                    style="background-color: {{ $item->background }}; width: 100%" data-aos="fade-up"
                                    data-aos-delay="400">
                                    <div class="px-3 py-1 text-white">
                                        <i class="{{ $item->icon }}"></i>
                                        <span class="px-2">{{ $item->name_brands }}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        {{-- <div class="col-lg-4 col-md-6">
                            <a class="rounded mt-2" href="https://www.instagram.com/dinaspmdsumsel/" title="instagram"
                                target="_blank" style="background-color: #C13282; width: 100%" data-aos="fade-up"
                                data-aos-delay="400">
                                <div class="px-3 py-1 text-white">
                                    <i class="fa-brands fa-instagram"></i>
                                    <span class="px-2">Instagram</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a class="rounded mt-2" href="https://www.youtube.com/@dinaspemberdayaanmasyaraka3734"
                                title="youtube" target="_blank" style="background-color: #DE4B39; width: 100%"
                                data-aos="fade-up" data-aos-delay="400">
                                <div class="px-3 py-1 text-white">
                                    <i class="fa-brands fa-youtube"></i>
                                    <span class="px-2">Youtube</span>
                                </div>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- Blog Wrapper End -->

        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
@endsection
