@extends('frontend.layouts.appcontent')

@section('title', $data->page->title)
@section('content')

    <div class="section-title" data-aos="fade-right" data-aos-delay="200">
        <h6 class="mb-0 mb-lg-3 sub-title" style="letter-spacing: 0px; text-transform: initial; font-weight: 600">
            @if ($data->menu)
                {{ $data->menu->name }} -
            @endif
            {{ $data->page->title ?? '' }}
        </h6>
    </div>
    @if ($data->page->title == 'Struktur Organisasi')
        <div class="blog-items p-0" data-aos="fade-up" data-aos-delay="200">
            <div class="blog-details-content">
                <div type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="{{ asset('frontend') . '/' . 'struktur.png' }}" alt="">
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content p-3">
                    <img src="{{ asset('frontend') . '/' . 'struktur.png' }}" alt="">
                </div>
            </div>
        </div>
    @else
        <div class="blog-items p-0" data-aos="fade-up" data-aos-delay="200">
            <div class="blog-details-content">
                <div type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="{{ asset('frontend') . '/' . $data->page->content }}" alt="">
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content p-3">
                    <img src="{{ asset('frontend') . '/' . $data->page->content }}" alt="" style="">
                </div>
            </div>
        </div>
    @endif

@endsection
