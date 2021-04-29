<a class="btn btn-brand-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
   document.getElementById('logout-form').submit();">
    {{ __('LOGOUT') }}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>