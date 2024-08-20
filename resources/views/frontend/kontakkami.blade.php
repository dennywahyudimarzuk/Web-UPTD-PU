@extends('frontend.layouts.appcontent')

@section('title', 'Kontak Kami')
@section('content')

    <div class="section-title" data-aos="fade-right" data-aos-delay="200">
        <h6 class="mb-0 mb-lg-3 sub-title" style="letter-spacing: 0px; text-transform: initial; font-weight: 600">Kontak Kami</h6>
    </div>
    <div class="blog-items p-0" data-aos="fade-up" data-aos-delay="200">
        <div class="blog-details-content">
            <div class="card card-lg p-4" style="border-radius: 10px">
                <h4 class="text-capitalize head-title">Silahkan hubungi kami :</h4>
                {{-- <form method="POST" action=""> --}}
                    <input type="hidden" name="" value="">
                    <div class="row justify-content-between mt-4">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input id="" type="" class="form-control" placeholder="Masukkan nama Anda" name="password" value="" required="">
                            </div>
                            <div class="form-group mt-4">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" value="" required="" class="form-control" placeholder="Masukan email Anda" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mt-4 mt-md-0">
                                <label for="">No. HP</label>
                                <input id="" type="" class="form-control" placeholder="Masukkan no. hp anda" name="password" value="" required="">
                            </div>
                            <div class="form-group mt-4">
                                <label for="">Perihal</label>
                                <input type="" name="" id="" value="" required="" class="form-control" placeholder="Masukkan perihal" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label for="">Keterangan</label>
                            <input id="" type="" class="form-control" placeholder="Masukkan keterangan" name="password" value="" required="">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4">
                            <button class="btn btn-primary" type="submit">Kirim</button>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>

@endsection
