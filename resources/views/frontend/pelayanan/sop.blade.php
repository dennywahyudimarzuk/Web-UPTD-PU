@extends('frontend.layouts.appcontent')

@section('title', 'SOP')
@section('content')

    <div class="section-title" data-aos="fade-right" data-aos-delay="200">
        <h6 class="mb-0 mb-lg-3 sub-title" style="letter-spacing: 0px; text-transform: initial; font-weight: 600">SOP Alur Pengujian Lapangan</h6>
    </div>
    <div class="blog-items p-0" data-aos="fade-up" data-aos-delay="200">
        <div class="blog-details-content">
            <div type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <img src="{{ asset('frontend') . '/' . 'sop.png' }}" alt="">
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <img src="{{ asset('frontend') . '/' . 'sop.png' }}" alt="" style="">
            </div>
        </div>
    </div>

@endsection
