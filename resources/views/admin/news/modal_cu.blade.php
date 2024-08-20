<div class="modal fade" id="modal_cu">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form id="newsForm">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger modal-error" role="alert" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label required">{{ __('main.title') }}</label>
                        <input class="form-control input-default" name="judul" id="name" type="text"
                            autocomplete="off" placeholder="{{ __('main.enter_name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label required">{{ __('main.email') }}</label>
                        <input class="form-control input-default" name="email" id="email" type="email"
                            autocomplete="off" placeholder="{{ __('main.enter_email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label required">{{ __('main.password') }}</label>
                        <div class="input-group">
                            <input id="password" class="form-control" name="password" type="password"
                                placeholder="......" autocomplete="off">
                            <a href="javascript:;" class="input-group-text hide"><i id="eye"
                                    class='fa fa-eye-slash'></i></a>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ __('main.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
