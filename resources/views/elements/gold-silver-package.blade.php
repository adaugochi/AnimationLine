<div class="form-group col-md-6">
    <label class="card-form__label">
        Accent of the voice over artist<span class="text-danger">*</span>
    </label>
    <select name="artist_accent" class="card-form__input form-control"
            data-value="{{ $isEdit ? $brief->country_accent : '' }}" id="accent">
        <option value="">Which country accent will you prefer?</option>
        @foreach(\App\Country::getAllCountries() as $country)
            <option value="{{ $country->code }}">{{ $country->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-md-6">
    <label class="card-form__label">
        Gender of the artist<span class="text-danger">*</span>
    </label>
    <select name="artist_gender" class="card-form__input form-control"
            data-value="{{ $isEdit ? $brief->artist_gender : '' }}" id="gender">
        <option value="">Please choose a gender for voice over artist</option>
        <option value="female">Female</option>
        <option value="male">Male</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="card-form__label">
        Voice Type<span class="text-danger">*</span>
    </label>
    <select name="voice_type" class="card-form__input form-control"
            data-value="{{ $isEdit ? $brief->voice_type : '' }}" id="voice">
        <option value="">Please choose a voice type</option>
        <option value="thick">Thick</option>
        <option value="thin">Thin</option>
    </select>
</div>