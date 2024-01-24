@if (Session::has('error'))
    <div class="alert alert-danger">
        <span>
            {{ Session::get('error') }}
        </span>
    </div>
@endif
