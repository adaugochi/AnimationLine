@if (session()->has('success'))
    <div class="alert alert-success alert-animated fadeIn">
        {!! session()->get('success') !!}
        <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span>
    </div>
@elseif(session()->has('status'))
    <div class="alert alert-success alert-animated fadeIn">
        {!! session()->get('status') !!}
        <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span>
    </div>
@elseif(session()->has('email'))
    <div class="alert alert-danger alert-animated fadeIn">
        {!! session()->get('error') !!}
        <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span>
    </div>
@endif