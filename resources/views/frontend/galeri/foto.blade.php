@extends('frontend.layouts.appcontent')

@section('title', 'Foto')
@section('content')

    <div class="section-title" data-aos="fade-right" data-aos-delay="200">
        <h6 class="mb-0 mb-lg-3 sub-title" style="letter-spacing: 0px; text-transform: initial; font-weight: 600">Galeri - Foto</h6>
    </div>
    <div class="blog-items">
        <div class="row">
            @foreach ($foto as $item)
            <div class="col-lg-4 col-md-6">
                <div class="single-blog" data-aos="fade-up" data-aos-delay="200" type="button" data-bs-toggle="modal" data-bs-target="#modal_{{ $item->id }}">
                    <div class="blog-image rounded-3"
                        style="height: 200px;
                                background-size: cover;
                                background-repeat: no-repeat;
                                background-position: center;
                                background-image: url({{ asset('storage/gallery/images/') . '/' . $item->image }});">
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <img src="{{ asset('storage/gallery/images/') . '/' . $item->image }}" style="width: 100%" alt="">
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

@endsection
