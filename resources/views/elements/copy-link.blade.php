<div class="form-group">
    <div class="mb-4">
        <button class="btn btn-brand-primary btn-link">
            <i class="fa fa-paperclip" aria-hidden="true"></i>
        </button>
        <label class="pl-2 fs-20 font-weight-bold">Get Link</label>
        <button class="btn btn-info btn-lg float-right btn-copy"
                data-toggle="popover" data-content="Copied!" data-placement="top">
            Copy Link
        </button>
    </div>
    <input type="text" class="form-control card-form__input copy-url"
           value="{{ $orderURL }}">
</div>