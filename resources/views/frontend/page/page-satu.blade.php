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
            @if ($data->page->title == 'Sejarah')
                <p class="card-text" style="text-align: justify" data-aos="fade-up" data-aos-delay="200"><strong>Sejarah Singkat Berdirinya Dinas Kependudukan dan Pencatatan Sipil Provinsi Sumatera Selatan</strong></p>
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Sebelum berdirinya Dinas Kependudukan dan Pencatatan Sipil Provinsi Sumatera Selatan, untuk memenuhi kebutuhan informasi kependudukan yang disajikan secara berkelanjutan yang memberikan gambaran tentang kependudukan di Provinsi Sumatera Selatan, selama ini berada pada Bagian Kependudukan Biro Pemerintahan Sekretariat Daerah Provinsi Sumatera Selatan.</p>
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Sesuai dengan Undang-undang Nomor 23 tahun 2014 tentang Pemerintahan  Daerah (Lembar Negara Repulik Indonesia Tahun 2014 Nomor 244, Tambahan Lembaran Negara Republik Indonesia Nomor 5587) sebagaimana telah diubah beberapa kali, terakhir dengan Undang-undang Nomor 9 tahun 2015 tentang perubahan kedua atas Undang-undang Nomor 23 tahun 2014 tentang Pemerintahan Daerah (Lembar Negara Repulik Indonesia Tahun 2015 Nomor 58, Tambahan Lembaran Negara Republik Indonesia Nomor 5679). Pada Pasal 11 dan 12 yang intinya bahwa urusan Pemerintahan Kongkuren yang menjadi kewenangan daerah terdiri atas Urusan Pemerintahan Wajib dan Urusan Pemerintahan Pilihan.</p>
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Urusan Pemerintahan Wajib terdiri atas urusan yang berkaitan dengan pelayanan dasar yang tidak berkaitan dengan pelayanan dasar administrasi kependudukan dan pencatatan sipil  termasuk Urusan Wajib Daerah Non Pelayanan Dasar sehingga harus berbentuk dinas. Undang-undang Nomor 23 tahun 2014 tentang Pemerintahan  Daerah  Pasal 217 Dinas dibentuk untuk melaksanakan Urusan Pemerintah yang menjadi kewenangan daerah.</p>
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Menindaklanjuti Undang-undang 23 tahun 2014 tentang Pemerintahan Daerah dan hasil Bimtek Pembentukan Type Dinas Kepedudukan dan Pencatatan Sipil Provinsi Sumatera Selatan  dan Kabupaten/Kota yang dihadiri Direktur Bina Aparatur Direktorat Jenderal Kependudukan dan Pencatatan Sipil Kementerian Dalam Negeri Republik Indonesia (Bpk. Joko Mursito, SH, MM ) pada tanggal 23 dan 24 Juni 2016 bertempat di Graha Bina Praja Provinsi Sumatera Selatan menjelaskan bahwa yang menangani urusan Kependudukan di Provinsi maupun di Kabupaten/Kota harus dibentuk Dinas dengan nomenklatur yang sama diseluruh Indonesia sesuai dengan Permendagri Nomor 76 tahun 2015. Sehubungan dengan hal tersebut Pemerintah Provinsi Sumatera Selatan mengeluarkan Peraturan Daerah Nomor 14 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Provinsi Sumatera Selatan serta Peraturan Gubernur Sumatera Selatan Nomor 49 tahun 2016 tentang Susunan Organisasi, Uraian Tugas dan Fungsi Dinas Kependudukan dan Pencatatan Sipil Provinsi Sumatera Selatan maka dibentuk  Dinas Kepedudukan dan Pencatatan Sipil Provinsi Sumatera Selatan  terdiri atas 1 (satu) Kepala Dinas, 1 (satu) Sekretariat  dan 4 (empat) Kepala Bidang  dengan masing-masing terdiri atas 2 (dua) Kepala Sub Bagian/ Seksi dengan type A pola minimal.</p>
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Hasil konsultasi dan koordinasi pada bulan Desember 2016 dengan Direktur Jenderal Kependudukan dan Pencatatan Sipil Kementerian Dalam Negeri Republik Indonesia menyarankan untuk Dinas Kependudukan dan Pencatatan Sipil Provinsi Sumatera Selatan agar membentuk struktur organisasi dengan Type A pola Maksimal.</p>
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Menindaklanjuti hasil konsultasi dan koordinasi tersebut maka keluarlah Peraturan Gubernur Sumatera Selatan Nomor 5 Tahun 2017 tentang Perubahan atas peraturan Gubernur Nomor 49 tahun 2016 tentang Susunan Organisasi, Uraian Tugas dan Fungsi Dinas Kependudukan dan Pencatatan Sipil Provinsi Sumatera Selatan yang terdiri atas 1 (satu) Kepala Dinas, 1 (satu) Sekretariat dan 4 (empat) Kepala Bidang  dengan masing-masing terdiri atas 3 (tiga) Kepala Sub Bagian/Seksi.</p>
            @elseif ($data->page->title == 'Visi Misi')
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Setiap organisasi selalu memiliki cara pandang dan keinginan yang hendak diwujudkan. Cara pandang dan keinginan tersebut biasanya tertuang ke dalam visi organisasi. Namun demikian, visi masih bersifat umum yang harus dijabarkan ke dalam misi yang merupakan langkah-langkah operasional pencapaian visi. Hal ini sesuai dengan Instruksi Presiden (Inpres) Nomor 7 tahun 1999 Tentang Akuntabilitas Kinerja Instansi Pemerintah. Sehubungan dengan Inpres tersebut Dinas Kependudukann dan Pencatatan Sipil Provinsi Sumatera Selatan memiliki visi dan misi sebagai berikut;</p>
                <p class="card-text" style="text-align: justify" data-aos="fade-up" data-aos-delay="200"><strong>VISI</strong></p>
                <p class="card-text" style="text-align: justify" data-aos="fade-up" data-aos-delay="200"><strong>“ TERWUJUDNYA PENDUDUK YANG BERKUALITAS DAN BERTANGGUNGJAWAB MELALUI TERTIB ADMINISTRASI KEPENDUDUKAN “</strong></p>
                <p style="text-align: justify" data-aos="fade-up" data-aos-delay="200">Untuk mencapai harapan yang terkandung dalam visi tersebut,  Dinas Kependudukann dan Pencatatan Sipil Provinsi Sumatera Selatan harus menjadi lembaga pemerintahan yang handal agar mampu melaksanakan tugas pokok dan fungsinya. Untuk itu Dinas Kependudukann dan Pencatatan Sipil Provinsi Sumatera Selatan mempunyai <strong>MISI</strong> sebagai berikut:</p>
                <ul class="number ms-3" style="text-align: justify" data-aos="fade-up" data-aos-delay="200">
                    <li>Mewujudkan pelayanan yang optimal kepada masyarakat dalam bidang kependudukan dan pencatatan sipil;</li>
                    <li>Meningkatkan pengelolaan data kependudukan dan pencatatan sipil melalui Sistem Informasi Administrasi Kependudukan (SIAK);</li>
                    <li>Meningkatkan pembinaan penyelenggaraan administrasi kependudukan dan pencatatan sipil;</li>
                    <li>Mengembangkan kerjasama kelembagaan dalam mendukung administrasi kependudukan;</li>
                    <li>Meningkatkan peran serta masyarakat dalam memenuhi hak kepemilikan dokumen kependudukan dan pencatatan sipil guna memberikan kepastian dan perlindungan sesuai hak-hak penduduk.</li>
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
