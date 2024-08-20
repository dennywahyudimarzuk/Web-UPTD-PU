<div class="p-4 bg-white rounded mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200"
    style="box-shadow: 0 4px 12px 0 rgb(111 111 111 / 15%)">
    <h4 class="pb-2"
        style="letter-spacing: 0px; text-transform: initial; font-weight: 700; font-size: 18px; border-bottom: 1.5px solid #4FC0E8;">
        <span style="color: #4FC0E8">Kegiatan </span>Disdukcapil Sumsel
    </h4>
    @foreach ($berita_disdukcapil as $item)
        <div class="single-blog mt-3 row" data-aos="fade-up" data-aos-delay="400">
            {{-- @foreach ($item->gambar as $newsimage) --}}
            <div class="blog-image rounded-4 col-4">
                <a href="{{ route('beritadetail', ['pg' => 'berita-disdukcapil', 'slug' => $item->slug]) }}">
                    <div
                        style="height: 70px;
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    background-position: center;
                                    background-image: url({{ asset('storage/news/' . $item->gambar[0]->image) }})">
                    </div>
                </a>
            </div>
            {{-- @endforeach --}}
            <div class="blog-content ps-0 pt-0 col-8">
                <ul class="meta">
                    <li style="font-size: 12px"> <i class="fa fa-calendar-alt"></i>
                        {{ \Carbon\Carbon::parse($item->publish_date)->isoFormat('dddd, D MMMM Y') }}</li>
                    </li>
                </ul>
                <h3 class="title d-flex align-items-center">
                    <a href="{{ route('beritadetail', ['pg' => 'berita-disdukcapil', 'slug' => $item->slug]) }}"
                        style="font-size: 14px">{{ $item->title }}</a>
                </h3>
            </div>
        </div>
    @endforeach
</div>
<div class="p-4 bg-white rounded mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200"
    style="box-shadow: 0 4px 12px 0 rgb(111 111 111 / 15%)">
    <h4 class="pb-2"
        style="letter-spacing: 0px; text-transform: initial; font-weight: 700; font-size: 18px; border-bottom: 1.5px solid #4FC0E8;">
        <span style="color: #4FC0E8">Berita </span>Sumsel
    </h4>
    @if (count($berita3) > 0)
        @foreach ($berita3 as $item)
            <div class="single-blog mt-3 row" data-aos="fade-up" data-aos-delay="400">
                <div class="blog-image rounded-4 col-4 {{ $item->filegambar == null ? 'd-none' : '' }}">
                    <a href="{{ route('beritadetail', ['pg' => 'berita-sumsel', 'slug' => $item->slug]) }}">
                        <div
                            style="height: 70px;
                                background-size: cover;
                                background-repeat: no-repeat;
                                background-position: center;
                                background-image: url({{ $item->filegambar }});">
                        </div>
                    </a>
                </div>
                <div class="blog-content ps-0 pt-0 col-8">
                    <ul class="meta">
                        <li style="font-size: 12px"> <i class="fa fa-calendar-alt"></i>
                            {{ $item->tgl }}
                        </li>
                    </ul>
                    <h3 class="title">
                        <a href="{{ route('beritadetail', ['pg' => 'berita-sumsel', 'slug' => $item->slug]) }}"
                            style="font-size: 14px">{{ $item->judul }}</a>
                    </h3>
                </div>
            </div>
        @endforeach
    @endif
</div>
<div class="p-4 bg-white rounded mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200"
    style="box-shadow: 0 4px 12px 0 rgb(111 111 111 / 15%)">
    <h4 class="pb-2"
        style="letter-spacing: 0px; text-transform: initial; font-weight: 700; font-size: 18px; border-bottom: 1.5px solid #4FC0E8;">
        <span style="color: #4FC0E8">Sosial Media </span>Disdukcapil Sumsel
    </h4>
    <ul>
        @foreach ($social_media as $item)
            <a class="rounded mt-3" href="{{ $item->url }}" title="{{ $item->name_brands }}" target="_blank"
                style="background-color: {{ $item->background }}; width: 100%" data-aos="fade-up" data-aos-delay="400">
                <li class="px-3 py-1 text-white">
                    <i class="{{ $item->icon }}"></i>
                    <span class="px-2">{{ $item->name_brands }}</span>
                </li>
            </a>
        @endforeach
        {{-- <a class="rounded mt-2" href="https://www.instagram.com/dinaspmdsumsel/" title="instagram" target="_blank" style="background-color: #C13282; width: 100%" data-aos="fade-up" data-aos-delay="400">
            <li class="px-3 py-1 text-white">
                <i class="fa fa-instagram"></i>
                <span class="px-2">Instagram</span>
            </li>
        </a>
        <a class="rounded mt-2" href="https://www.youtube.com/@dinaspemberdayaanmasyaraka3734" title="youtube" target="_blank" style="background-color: #DE4B39; width: 100%" data-aos="fade-up" data-aos-delay="400">
            <li class="px-3 py-1 text-white">
                <i class="fa fa-youtube-play"></i>
                <span class="px-2">Youtube</span>
            </li>
        </a> --}}
    </ul>
</div>
