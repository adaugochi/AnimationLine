<div class="bg-darker">
    <div class="container">
        <div class="copyright-footer text-center {{ $isPortal ? 'd-md-flex justify-content-between text-md-left' : '' }}">
            <p>
                <span class="text-white">© Copyright <?= date('Y'); ?> AnimationLine. All rights reserved.</span>
                <a class="text-brand-primary" href="https://animationline.com">www.animationline.com</a>
            </p>
            @if($isPortal)
                <div class="mt-3 mt-md-0">
                    @include('elements.social')
                </div>
            @endif
        </div>
    </div>
</div>