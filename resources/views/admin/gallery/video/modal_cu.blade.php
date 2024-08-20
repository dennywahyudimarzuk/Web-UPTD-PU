<div class="modal fade" id="modal_cu">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form id="galeriForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger modal-error" role="alert" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="galeri_id" id="galeri_id">
                        <label for="name" class="form-label required">{{ __('main.name') }}</label>
                        <input class="form-control input-default" name="name" id="name" type="text"
                            autocomplete="off" placeholder="{{ __('main.enter_name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="videofile" class="form-label">{{ __('main.file') }}</label>
                        <div class="mb-3">
                            <video src="" id="videolama" width="200px" height="200px" controls></video>
                        </div>
                        <div class="input-group">
                            <input id="file" class="form-control" name="videofile" type="file"
                                accept="video/mp4">
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
