@extends('frontend.layouts.appcontent')

@section('title', 'Video')
@section('content')

    <div class="section-title" data-aos="fade-right" data-aos-delay="200">
        <h6 class="mb-0 mb-lg-3 sub-title" style="letter-spacing: 0px; text-transform: initial; font-weight: 600">Galeri -
            Video</h6>
    </div>
    <div class="blog-items p-0" data-aos="fade-up" data-aos-delay="200">
        <div class="row">
            @foreach ($video as $item)
                <div class="col-md-6 mb-6" data-aos="fade-up" data-aos-duration="200">
                    <div class="single-blog">
                        <video src="{{ asset('storage/gallery/videos/' . $item->image) }}" style="width: 100%"
                            controls></video>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
