<div class="modal fade" id="keyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form id="passwordForm">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger modal-error" role="alert" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label required">New password</label>
                        <div class="input-group">
                            <input id="new_password" class="form-control" name="new_password" type="password"
                                placeholder="......">
                            <a href="javascript:;" class="input-group-text bg-transparent-new-password"><i
                                    id="eye_new_password" class='fa fa-eye-slash'></i></a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label required">Confirm password</label>
                        <div class="input-group">
                            <input id="new_password_confirmation" class="form-control" name="new_password_confirmation"
                                type="password" placeholder="......">
                            <a href="javascript:;" class="input-group-text bg-transparent-confirm-password"><i
                                    id="eye_new_password_confirmation" class='fa fa-eye-slash'></i></a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary save_password">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
