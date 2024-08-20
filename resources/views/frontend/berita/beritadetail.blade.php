@extends('frontend.layouts.appcontent')

@section('title', 'Detail Berita')
@section('content')

    @if ($pg == 'berita-sumsel')
        <div class="blog-items p-0">
            @if ($berita == '')
                <h2 class="title text-start mb-3">Berita Tidak Tersedia</h2>
            @else
                <div class="blog-details-content m-0" data-aos="fade-up" data-aos-delay="200">
                    <div id="carouselExampleIndicators" class="carousel slide d-none d-md-block" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($gambar != '')
                                @foreach ($gambar as $item)
                                    <div class="carousel-item single-slider {{ $loop->index == 0 ? 'active' : '' }}"
                                        style="background-image: url(https://sumselprov.go.id/storage/{{ substr($item, 7) }}); height: 550px">
                                    </div>
                                @endforeach
                            @endif
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
                    <div id="carouselExampleIndicators1" class="carousel slide d-block d-md-none" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($gambar != '')
                                @foreach ($gambar as $item)
                                    <div class="carousel-item single-slider p-0 {{ $loop->index == 0 ? 'active' : '' }}"
                                        style="height: 100%">
                                        <img src="https://sumselprov.go.id/storage/{{ substr($item, 7) }}" alt=""
                                            style="height: 100%">
                                    </div>
                                @endforeach
                            @endif
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
                <div class="blog-details-content" data-aos="fade-up" data-aos-delay="200">
                    <ul class="meta mt-3 mt-md-5">
                        <li> <i class="fa fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($berita->tanggal)->isoFormat('dddd, D MMMM Y') }}
                        </li>
                    </ul>
                    <h2 class="title text-start mb-3">{{ $berita->judul }}</h2>
                    <p style="text-align: justify">{!! $berita->isi !!}</p>
                </div>
            @endif
        </div>
    @else
        @if ($berita == '')
            <h2 class="title text-start mb-3">Berita Tidak Tersedia</h2>
        @else
            <div class="blog-items p-0">
                <div class="blog-details-content m-0" data-aos="fade-up" data-aos-delay="200">
                    <div id="carouselExampleIndicators" class="carousel slide d-none d-md-block" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($gambar != '')
                                @foreach ($gambar as $item)
                                    <div class="carousel-item single-slider {{ $loop->index == 0 ? 'active' : '' }}"
                                        style="background-image: url({{ asset('storage/news/') . '/' . $item->image }}); height: 550px">
                                    </div>
                                @endforeach
                            @endif
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
                    <div id="carouselExampleIndicators1" class="carousel slide d-block d-md-none" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($gambar != '')
                                @foreach ($gambar as $item)
                                    <div class="carousel-item single-slider p-0 {{ $loop->index == 0 ? 'active' : '' }}"
                                        style="height: 100%">
                                        <img src="{{ asset('storage/news/' . $item->image) }}" alt=""
                                            style="height: 100%">
                                    </div>
                                @endforeach
                            @endif
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
                <div class="blog-details-content" data-aos="fade-up" data-aos-delay="200">
                    <ul class="meta mt-3 mt-md-5">
                        <li> <i class="fa fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($berita->publish_date)->isoFormat('dddd, D MMMM Y') }}
                        </li>
                    </ul>
                    <h2 class="title text-start mb-3">{{ $berita->title }}</h2>
                    <p style="text-align: justify">{!! $berita->content !!}</p>
                </div>
            </div>
        @endif
    @endif

@endsection
