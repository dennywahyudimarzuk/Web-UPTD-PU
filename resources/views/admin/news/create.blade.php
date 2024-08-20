@extends('admin.layouts.app')
@push('custom-style')
    <link href="{{ asset('admin/vendor/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet">
@endpush
@section('title-website', __('main.news'))
@section('title-content', __('main.news'))
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row d-flex justify-content-between page-titles gap-3 gap-xl-0">
                <div class="col-xl-6 col-xxl-6">
                    <h4> {{ __('main.create_news') }}</h4>
                </div>

            </div>
            <form name="frmNews" action="{{ route('dashboard.news.store') }}" class="needs-validation" novalidate method="post"
                enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif
                        <div class="mb-3">
                            @csrf
                            @isset($berita)
                                <input type="hidden" name="news_id" value="{{ $berita->id }}">
                            @endisset

                            <label for="name" class="form-label required">{{ __('main.title') }}</label>
                            <input class="form-control input-default" name="judul" id="judul" type="text"
                                autocomplete="off" placeholder="{{ __('main.title') }}"
                                @if (isset($berita)) value="{{ $berita->title }}" 
                                @else 
                                value="{{ old('title') }}" @endif>
                            @if ($errors->has('judul'))
                                <div class="invalid-feedback">
                                    Please enter a title.
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label required">{{ __('main.date') }}</label>
                            <input class="form-control input-default" name="tanggal" id="tanggal" type="datetime-local"
                                placeholder="{{ __('main.date') }}"
                                @if (isset($berita)) value="{{ $berita->publish_date }}"
                                @else
                                value="{{ old('tangggal') }}" @endif>
                            @if ($errors->has('tanggal'))
                                <div class="invalid-feedback">
                                    Please enter a date.
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label required">{{ __('main.news_category') }}</label>

                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">-Pilih-</option>
                                @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id }}"
                                        @if (isset($berita)) @if ($berita->news_categories_id == $kat->id) selected @endif
                                        @endif
                                        >{{ $kat->name }}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('kategori'))
                                <div class="invalid-feedback">
                                    Please select a category.
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label required">{{ __('main.content') }}</label>
                            <textarea class="form-control input-default" name="isi" id="isi" autocomplete="off"
                                placeholder="{{ __('main.content') }}">
                                @if (isset($berita))
                                {!! $berita->content !!}
@else
{{ old('content') }}
                                @endif
                                </textarea>

                            @if ($errors->has('isi'))
                                <div class="invalid-feedback">
                                    Please enter content.
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('main.news_tags') }}</label>
                            <input class="form-control inputtags" name="tag" id="tag"
                                placeholder="{{ __('main.news_tags') }}"
                                @isset($berita) value="{{ $berita->tags }}" @endisset>
                            @if ($errors->has('tag'))
                                <div class="invalid-feedback">
                                    Please enter a tag.
                                </div>
                            @endif
                        </div>


                        <div class="mb-3">
                            <label for="gambar" class="form-label">{{ __('main.file') }}</label>
                            @if (isset($berita->gambar))
                                <div class="mb-3">
                                    @foreach ($berita->gambar as $newsimage)
                                        <img src="{{ asset('storage/news/' . $newsimage->image) }}" width="200px" />
                                    @endforeach
                                </div>
                            @endif
                            <input class="form-control input-default" name="gambar[]" id="gambar" type="file" multiple
                                accept="image/*">
                            @if ($errors->has('gambar'))
                                <div class="invalid-feedback">
                                    Please enter images.
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary save">{{ __('main.save') }}</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    </div>

@endsection

@push('custom-scripts')
    <script src="{{ asset('admin/vendor/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
    {{-- <script src="https://cdn.tiny.cloud/1/44xyhlongatmcm2923zshq8tyzqvmoebpu93ol35eziwnona/tinymce/6/tinymce.min.js" --}}
    <script src="https://cdn.tiny.cloud/1/kwzno5v4vfc1r4zubklqwd5hc6r4malhfo5kcu4wnccl3e1n/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script type="text/javascript">
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
        $("#tag").tagsinput('items');


        tinymce.init({
            selector: 'textarea',
            //  plugins: 'mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',


        });
        response.tag.split(',').forEach(function(item) {
            $("#tag").tagsinput('add', item);
        });
    </script>
@endpush
