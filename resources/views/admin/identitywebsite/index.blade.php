@extends('admin.layouts.app')
@push('custom-style')
@endpush
@section('title-website', __('main.setting'))
@section('title-content', __('main.setting'))
@section('content')
    <div class="content-body">
        <div class="container-fluid">
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
                    <form name="formIdentity" action="{{ route('dashboard.setting.update', ['setting' => 1]) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="name_wesite" class="form-label required">{{ __('main.name_wesite') }}</label>
                            <input class="form-control input-default" name="name" id="name" type="text"
                                autocomplete="off" placeholder="{{ __('main.name_wesite') }}" value="{{ $data->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">{{ __('main.phone_number') }}</label>
                            <input class="form-control input-default" name="phone_number" id="phone_number" type="text"
                                autocomplete="off" placeholder="{{ __('main.phone_number') }}" value="{{ $data->no_tlp }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('main.email') }}</label>
                            <input class="form-control input-default" name="email" id="email" type="email"
                                autocomplete="off" placeholder="{{ __('main.email') }}" value="{{ $data->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">{{ __('main.address') }}</label>
                            <textarea class="form-control input-default h-auto" name="address" id="address" cols="30" rows="3">{{ $data->address }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="maps" class="form-label">{{ __('main.maps') }}</label>
                            <textarea class="form-control input-default h-auto" name="maps" id="maps" cols="30" rows="5">{{ $data->maps }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">{{ __('main.content') }}</label>
                            <textarea class="form-control input-default h-auto" name="content" id="content" cols="30" rows="7">{{ $data->content }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">{{ __('main.logo') }}</label>
                            @if (isset($data->logo))
                                <div class="mb-3">
                                    <img src="{{ asset('storage/identities/' . $data->logo) }}" width="200px" />
                                </div>
                            @endif
                            <input class="form-control input-default" name="logo" id="logo" type="file">
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">{{ __('main.icon') }}</label>
                            @if (isset($data->icon))
                                <div class="mb-3">
                                    <img src="{{ asset('storage/identities/' . $data->icon) }}" width="100px" />
                                </div>
                            @endif
                            <input class="form-control input-default" name="icon" id="icon" type="file">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ __('main.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
@endpush
