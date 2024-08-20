@extends('frontend.layouts.appcontent')

@section('title', $data->name)
@section('content')

    <div class="section-title" data-aos="fade-right" data-aos-delay="200">
        <h6 class="mb-0 mb-lg-3 sub-title" style="letter-spacing: 0px; text-transform: initial; font-weight: 600">
            @if ($data->menu)
                {{ $data->menu->name }} -
            @endif
            {{ explode(' ', $data->name)[1] ?? '' }}
        </h6>
    </div>
    <div class="blog-items">
        <div class="row">
            @if ($pg == 'berita-sumsel')
                @foreach ($berita->data as $item)
                    <div class="col-md-6">
                        <div class="single-blog" data-aos="fade-up" data-aos-delay="200">
                            <div class="blog-image rounded-4 {{ $item->filegambar == null ? 'd-none' : '' }}">
                                {{-- <div class="blog-image rounded-4"> --}}
                                {{-- <a href="/berita-kejati/{{ $item->id }}"> --}}
                                <a href="{{ route('beritadetail', ['pg' => 'berita-sumsel', 'slug' => $item->slug]) }}"
                                    style=" height: 300px;
                                        background-size: cover;
                                        background-repeat: no-repeat;
                                        background-position: center;
                                        background-image: url(https://sumselprov.go.id/storage/{{ substr($item->filegambar, 7) }});">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="meta">
                                    <li> <i class="fa fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($item->tgl)->isoFormat('dddd, D MMMM Y') }}</li>
                                </ul>
                                <h3 class="title">
                                    <a
                                        href="{{ route('beritadetail', ['pg' => 'berita-sumsel', 'slug' => $item->slug]) }}">{{ $item->judul }}</a>
                                </h3>
                                <a href="{{ route('beritadetail', ['pg' => 'berita-sumsel', 'slug' => $item->slug]) }}"
                                    class="more">+
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach ($berita as $item)
                    <div class="col-md-6">
                        <div class="single-blog" data-aos="fade-up" data-aos-delay="200">
                            {{-- @foreach ($item->gambar as $newsimage) --}}
                            <div class="blog-image">
                                <a href="{{ route('beritadetail', ['pg' => 'berita-disdukcapil', 'slug' => $item->slug]) }}"
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
                                <h3 class="title"><a
                                        href="{{ route('beritadetail', ['pg' => 'berita-disdukcapil', 'slug' => $item->slug]) }}">{{ $item->title }}</a>
                                </h3>
                                <a href="{{ route('beritadetail', ['pg' => 'berita-disdukcapil', 'slug' => $item->slug]) }}"
                                    class="more">+
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
