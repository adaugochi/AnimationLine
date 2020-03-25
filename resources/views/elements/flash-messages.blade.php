@if (session()->has('success'))
    <div class="alert alert-success alert-animated fadeIn">
        <strong>
            {!! session()->get('success') !!}
        </strong>
        <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span>
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger alert-animated fadeIn">
        <strong>
            {!! session()->get('error') !!}
        </strong>
        <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span>
    </div>
@endif