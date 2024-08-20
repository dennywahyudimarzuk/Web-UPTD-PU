@extends('frontend.layouts.appcontent')

@section('title', 'Agenda')
@section('content')

    <div class="section-title" data-aos="fade-right" data-aos-delay="200">
        <h6 class="mb-0 mb-lg-3 sub-title" style="letter-spacing: 0px; text-transform: initial; font-weight: 600">Agenda</h6>
    </div>
    <div class="blog-items p-0" data-aos="fade-up" data-aos-delay="200">
        <div class="blog-details-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 210px">Hari / Tanggal</th>
                            <th class="text-center" style="width: 550px">Nama Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="py-3" style="color: #203469">
                                    {{ \Carbon\Carbon::parse($item->activity_time)->isoFormat('dddd, D MMMM Y') }}</td>
                                <td class="py-3">{{ $item->title }}</td>
                            </tr>
                        @endforeach
                        {{-- <tr>
                            <td class="py-3" style="color: #203469">Sabtu, 18 November 2023</td>
                            <td class="py-3">Pelantikan Pengurus Forum Pemuda Gelumbang Raya Bersatu (FPGRB) Periode 2023-2028</td>
                        </tr>
                        <tr>
                            <td class="py-3" style="color: #203469">Rabu, 15 November 2023</td>
                            <td class="py-3">Penutupan Pelatihan Peningkatan Kapasitas Pemerintah Desa dan Pengurus Kelembagaan Desa</td>
                        </tr>
                        <tr>
                            <td class="py-3" style="color: #203469">Kamis, 9 November 2023</td>
                            <td class="py-3">Khataman Al-Quran Dan Tahlilan Bersama Pj. Gubernur Sumsel</td>
                        </tr>
                        <tr>
                            <td class="py-3" style="color: #203469">Rabu, 8 November 2023</td>
                            <td class="py-3">Pentupan Pelatihan Peningkatan Kapasitas Aparatur Desa Dan Pengurus Kelembagaan Desa</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
