<div class="container">
    <div class="row mb-4">
        <div class="col-md-5 col-lg-4">
            <div class="navbar-brand">
                <img src="{{ asset('img/logo-white.png') }}" class="footer-logo">
            </div>
            <p class="text-left">
                AnimationLine is an online animation company that allows you to easily order for your
                professional animated videos for all industries in job roles like marketing, training,
                and eLearning.
            </p>
        </div>
        <div class="col-md-3 col-lg-4">
            <label class="footer-label fs-20">Quick Links</label>
            <p data-toggle="modal" data-target="#policyModal" class="cursor-pointer">
                <span>
                    <i class="fa fa-thumb-tack text-brand-primary mr-1"></i>
                    Privacy Policy
                </span>
                @include('modals.policy-terms-modal', [
                    'modalId' => 'policyModal',
                    'modalSize' => 'modal-lg',
                    'modalTitle' => 'Privacy Policy',
                    'modalBody' => \App\Contants\Message::POLICY_AND_PRIVACY
                ])
            </p>
            <p data-toggle="modal" data-target="#tcModal" class="cursor-pointer">
                <span>
                    <i class="fa fa-thumb-tack text-brand-primary mr-1"></i>
                    Terms of Service
                </span>
                @include('modals.policy-terms-modal', [
                    'modalId' => 'tcModal',
                    'modalSize' => 'modal-lg',
                    'modalTitle' => 'Terms of Service',
                    'modalBody' => \App\Contants\Message::TERMS_AND_CONDITIONS
                ])
            </p>
            <p class="cursor-pointer">
                <a href="{{ route('contact') }}" class="text-decoration-none text-white">
                    <i class="fa fa-thumb-tack text-brand-primary mr-1"></i> Help Center
                </a>
            </p>
            <p class="cursor-pointer">
                <a href="{{ route('blog') }}" class="text-decoration-none text-white">
                    <i class="fa fa-thumb-tack text-brand-primary mr-1"></i> Blog
                </a>
            </p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="footer-label fs-20">Contact Address</label>
            <p>
                <i class="fa fa-clock-o text-brand-primary mr-1"></i>
                Available anytime
            </p>
            <p>
                <i class="fa fa-globe text-brand-primary mr-1"></i>
                @include('elements.social')
            </p>
            <p>
                <i class="fa fa-envelope text-brand-primary mr-1"></i>
                support@animationline.com
            </p>
        </div>
    </div>
</div>