<div class="modal fade" id="modal_cu">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form id="informationForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger modal-error" role="alert" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="information_id" id="information_id">
                        <label for="name" class="form-label required">{{ __('main.name') }}</label>
                        <input class="form-control input-default" name="name" id="name" type="text"
                            autocomplete="off" placeholder="{{ __('main.enter_name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label required">{{ __('main.file') }}</label>
                        <div class="mb-3">
                            <label for="file" id="filename"></label>
                        </div>
                        <div class="input-group">
                            <input id="file" class="form-control" name="file" type="file"
                                accept="application/pdf">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary save">{{ __('main.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
