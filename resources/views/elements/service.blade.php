<div class="{{ $classWrap }}">
    <div class="py-0 py-md-4 {{ $addClass }}">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-md-6 text-md-left my-lg-3 service__text">
                        <h2 class="text-primary-color">
                            <label>{{ $header }}</label>
                        </h2>
                        <p>{{ $body }}</p>
                        <a href="{{ $link }}" class="btn-brand-white mt-3 py-3 btn px-5">Learn More</a>
                    </div>
                    <div class="col-md-6 text-md-left mt-5 mt-md-0">
                        <img src="{{ asset($img) }}" alt="logo design" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>