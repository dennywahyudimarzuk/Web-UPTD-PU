@extends('frontend.layouts.appcontent')

@section('title', 'Tugas Pokok dan Fungsi')
@section('content')

    <div class="section-title" data-aos="fade-right" data-aos-delay="200">
        <h6 class="mb-0 mb-lg-3 sub-title" style="letter-spacing: 0px; text-transform: initial; font-weight: 600">Profil -
            Tugas Pokok dan Fungsi </h6>
    </div>
    <div class="blog-items p-0" data-aos="fade-up" data-aos-delay="200">
        <div class="blog-details-content">
            {{-- <h2 class="title mb-3">Judul</h2> --}}
            <p style="text-align: justify">{!! $identity_website->history !!}</p>
        </div>
    </div>

@endsection
