@if ($data->active == 1)
    <button type="button" data-id="{{ Crypt::encrypt($data->id) }}" data-status="0"
        class="badge bg-success border-0 status"
        title="{{ __('main.change_to_inactive') }}"><span>{{ __('main.active') }}</span></button>
@else
    <button type="button" data-id="{{ Crypt::encrypt($data->id) }}" data-status="1" class="badge bg-danger border-0 status"
        title="{{ __('main.change_to_active') }}">
        <span>{{ __('main.not_active') }}</span>
    </button>
@endif
