@extends('frontend.layouts.appcontent')

@section('title', $data->name)
@section('content')

    <div class="section-title" data-aos="fade-right" data-aos-delay="200">
        <h6 class="mb-0 mb-lg-3 sub-title" style="letter-spacing: 0px; text-transform: initial; font-weight: 600">
            {{ $data->name }}
            {{-- @if ($data->menu)
                {{ $data->menu->name }} -
            @endif
            {{ Str::substr($data->name, 10) ?? '' }} --}}
        </h6>
    </div>
    <div class="blog-items p-0" data-aos="fade-up" data-aos-delay="200">
        <div class="blog-details-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px">Tanggal</th>
                            <th class="text-center">Nama File</th>
                            <th style="width: 20px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($informasi as $item)
                            <tr>
                                <td class="py-3" style="color: #203469">
                                    <p>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('DD/MM/Y') }}
                                </td>
                                <td class="py-3">{{ $item->name }}</td>
                                <td class="py-3">
                                    <div class="blog-btn m-0 col">
                                        <a href="{{ $linkfile }}/{{ $item->path }}" target="_blank"
                                            class="btn-custom-01 px-2 rounded"><i class="icofont-papers"></i></a>
                                        {{-- <a href="" target="_blank" class="btn-custom-01 px-2 rounded"><i
                                                    class="icofont-papers"></i></a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
