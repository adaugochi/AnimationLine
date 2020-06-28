<div class="form-group col-md-6">
    <label class="card-form__label">
        Full Name<span class="text-danger">*</span>
    </label>
    <input type="text" class="form-control card-form__input"
           readonly value="{{ auth()->user()->getFullName() }}">
</div>
<div class="form-group col-md-6">
    <label class="card-form__label">
        Email Address<span class="text-danger">*</span>
    </label>
    <input type="text" class="card-form__input form-control"
           readonly value="{{ auth()->user()->email }}">
</div>
<div class="form-group col-md-6">
    <label class="card-form__label">
        Company's Name<span class="text-danger">*</span>
    </label>
    <input type="text" name="company_name" class="card-form__input form-control"
           value="{{ $isEdit ? $brief->company_name : old('company_name') }}">
</div>
<div class="form-group col-md-6">
    <label class="card-form__label">Company's Website</label>
    <i class="fa fa-link url-icon"></i>
    <input type="text" name="company_website" class="card-form__input form-control"
           value="{{ $isEdit ? $brief->company_website : old('company_website') }}" placeholder="URL">
</div>