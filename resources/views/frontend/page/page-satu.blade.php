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
    <div class="blog-items p-0" data-aos="fade-up" data-aos-delay="200">
        <div class="blog-details-content">
            {{-- <p style="text-align: justify">{!! $data->page->content !!}</p> --}}
            {{-- @if ($data->page->title == 'Sejarah')
                <p class="card-text" style="text-align: justify" data-aos="fade-up" data-aos-delay="200"><strong>Sejarah Singkat Berdirinya Dinas Kependudukan dan Pencatatan Sipil Provinsi Sumatera Selatan</strong></p>
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Sebelum berdirinya Dinas Kependudukan dan Pencatatan Sipil Provinsi Sumatera Selatan, untuk memenuhi kebutuhan informasi kependudukan yang disajikan secara berkelanjutan yang memberikan gambaran tentang kependudukan di Provinsi Sumatera Selatan, selama ini berada pada Bagian Kependudukan Biro Pemerintahan Sekretariat Daerah Provinsi Sumatera Selatan.</p>
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Sesuai dengan Undang-undang Nomor 23 tahun 2014 tentang Pemerintahan  Daerah (Lembar Negara Repulik Indonesia Tahun 2014 Nomor 244, Tambahan Lembaran Negara Republik Indonesia Nomor 5587) sebagaimana telah diubah beberapa kali, terakhir dengan Undang-undang Nomor 9 tahun 2015 tentang perubahan kedua atas Undang-undang Nomor 23 tahun 2014 tentang Pemerintahan Daerah (Lembar Negara Repulik Indonesia Tahun 2015 Nomor 58, Tambahan Lembaran Negara Republik Indonesia Nomor 5679). Pada Pasal 11 dan 12 yang intinya bahwa urusan Pemerintahan Kongkuren yang menjadi kewenangan daerah terdiri atas Urusan Pemerintahan Wajib dan Urusan Pemerintahan Pilihan.</p>
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Urusan Pemerintahan Wajib terdiri atas urusan yang berkaitan dengan pelayanan dasar yang tidak berkaitan dengan pelayanan dasar administrasi kependudukan dan pencatatan sipil  termasuk Urusan Wajib Daerah Non Pelayanan Dasar sehingga harus berbentuk dinas. Undang-undang Nomor 23 tahun 2014 tentang Pemerintahan  Daerah  Pasal 217 Dinas dibentuk untuk melaksanakan Urusan Pemerintah yang menjadi kewenangan daerah.</p>
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Menindaklanjuti Undang-undang 23 tahun 2014 tentang Pemerintahan Daerah dan hasil Bimtek Pembentukan Type Dinas Kepedudukan dan Pencatatan Sipil Provinsi Sumatera Selatan  dan Kabupaten/Kota yang dihadiri Direktur Bina Aparatur Direktorat Jenderal Kependudukan dan Pencatatan Sipil Kementerian Dalam Negeri Republik Indonesia (Bpk. Joko Mursito, SH, MM ) pada tanggal 23 dan 24 Juni 2016 bertempat di Graha Bina Praja Provinsi Sumatera Selatan menjelaskan bahwa yang menangani urusan Kependudukan di Provinsi maupun di Kabupaten/Kota harus dibentuk Dinas dengan nomenklatur yang sama diseluruh Indonesia sesuai dengan Permendagri Nomor 76 tahun 2015. Sehubungan dengan hal tersebut Pemerintah Provinsi Sumatera Selatan mengeluarkan Peraturan Daerah Nomor 14 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Provinsi Sumatera Selatan serta Peraturan Gubernur Sumatera Selatan Nomor 49 tahun 2016 tentang Susunan Organisasi, Uraian Tugas dan Fungsi Dinas Kependudukan dan Pencatatan Sipil Provinsi Sumatera Selatan maka dibentuk  Dinas Kepedudukan dan Pencatatan Sipil Provinsi Sumatera Selatan  terdiri atas 1 (satu) Kepala Dinas, 1 (satu) Sekretariat  dan 4 (empat) Kepala Bidang  dengan masing-masing terdiri atas 2 (dua) Kepala Sub Bagian/ Seksi dengan type A pola minimal.</p>
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Hasil konsultasi dan koordinasi pada bulan Desember 2016 dengan Direktur Jenderal Kependudukan dan Pencatatan Sipil Kementerian Dalam Negeri Republik Indonesia menyarankan untuk Dinas Kependudukan dan Pencatatan Sipil Provinsi Sumatera Selatan agar membentuk struktur organisasi dengan Type A pola Maksimal.</p>
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Menindaklanjuti hasil konsultasi dan koordinasi tersebut maka keluarlah Peraturan Gubernur Sumatera Selatan Nomor 5 Tahun 2017 tentang Perubahan atas peraturan Gubernur Nomor 49 tahun 2016 tentang Susunan Organisasi, Uraian Tugas dan Fungsi Dinas Kependudukan dan Pencatatan Sipil Provinsi Sumatera Selatan yang terdiri atas 1 (satu) Kepala Dinas, 1 (satu) Sekretariat dan 4 (empat) Kepala Bidang  dengan masing-masing terdiri atas 3 (tiga) Kepala Sub Bagian/Seksi.</p> --}}
            @if ($data->page->title == 'Visi Misi')
                <p class="card-text" style="text-align: justify" data-aos="fade-up" data-aos-delay="200"><strong>Visi UPTD Laboratorium Bahan Konstruksi</strong></p>
                <p class="card-text" style="text-align: justify" data-aos="fade-up" data-aos-delay="200">“Menunjang visi Provinsi Sumatera Selatan "Sumsel Maju Untuk Semua" serta mendukung pengendalian mutu konstruksi di Provinsi Sumatera Selatan khususnya di Lingkungan Dinas Pekerjaan Umum Bina Marga dan Tata Ruang Provinsi Sumatera Selatan dengan menjadi laboratorium pengujian yang terakreditasi ISO 17025 : 2017 baik untuk pengujian mutu bahan aspal / campuran aspal, agregat, tanah, beton serta konstruksi jalan dan jembatan yang terpercaya."</p>
                <p class="card-text" style="text-align: justify" data-aos="fade-up" data-aos-delay="200"><strong>Misi UPTD Laboratorium Bahan Konstruksi</strong></p>
                <ul class="number ms-3" style="text-align: justify" data-aos="fade-up" data-aos-delay="200">
                    <li>Menunjang misi Provinsi Sumatera Selatan dalam membangun dan meningkatkan kualitas penyelenggaraan Pembangunan Infrastruktur Daerah;</li>
                    <li>Menjadikan UPTD Laboratorium Bahan Konstruksi sebagai laboratorium rujukan dalam rangka pemenuhan persyaratan teknis pengujian mutu bahan aspal / campuran aspal, agregat, tanah, beton serta konstruksi jalan dan jembatan.;</li>
                    <li>Meningkatkan kualitas sumber daya manusia dalam bidang pengujian dan pengendalian mutu bahan serta pelayanan kepada pengguna jasa.;</li>
                </ul>
            @else
                <p style="text-align: justify">{!! $data->page->content !!}</p>
            @endif
        </div>
    </div>

    <style>
        ul.number {
            list-style-type: decimal;
        }
    </style>

@endsection
