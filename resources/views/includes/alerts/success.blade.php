@if(Session::has('success'))
<div class="alert alert-success">
        <span>
            {{ Session::get('success') }}
        </span>
    </div>
@endif