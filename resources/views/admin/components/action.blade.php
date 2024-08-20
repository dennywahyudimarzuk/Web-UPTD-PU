<button type="button" data-id="{{ Crypt::encrypt($data->id) }}" class="btn btn-warning btn-icon btn-sm edit"
    title="Edit"><i class="fa fa-edit"></i></button>
@if ($model == 'User')
    <button type="button" data-id="{{ Crypt::encrypt($data->id) }}" class="btn btn-info btn-icon btn-sm key"
        title="Change password"><i class="fa fa-key"></i></button>
@endif
<button type="button" data-id="{{ Crypt::encrypt($data->id) }}" class="btn btn-danger btn-icon btn-sm delete"
    title="Delete"><i class="fa fa-trash"></i></button>
