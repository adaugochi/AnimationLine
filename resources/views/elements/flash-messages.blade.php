@if (session()->has('success'))
    <div class="alert alert-success animated fadeIn">
        <strong>
            {!! session()->get('success') !!}
        </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times&times;</span>
        </button>
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger animated fadeIn">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!! session()->get('error') !!}
        </strong>
    </div>
@endif