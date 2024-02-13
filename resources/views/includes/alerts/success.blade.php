@if(Session::has('success'))
<div id="success-msg" class="alert alert-success">
        <span>
            {{ Session::get('success') }}
        </span>
    </div>
@endif