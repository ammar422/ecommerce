@extends('layouts.admin.admin')
@section('tittle', 'Add New Languages')
@section('content')
    @include('includes.sidebars.adminSidebar')
    @include('includes.navbars.adminNavbar')

    <!-- Form Start -->
    <div class="container-fluid pt-5 px-5">
        <div class="row g-4">
            <div class="col-sm-20 col-xl-50">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Add New Languages</h6>
                    @include('includes.alerts.success')
                    <form id="lang-form">
                        @csrf
                        <div class="">
                            <label class="form-label">Language Nmae</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label class="form-label">ABBR</label>
                            <input type="text" name="abbr" class="form-control @error('abbr') is-invalid @enderror">
                            @error('abbr')
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Local</label>
                            <input type="text" name="local" class="form-control @error('local') is-invalid @enderror">

                            @error('local')
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Direction Of Language</label>
                            <div>
                                <input type="radio" name="direction" value="ltr"
                                    class=" @error('direction') is-invalid @enderror">
                                <label for="html">Lift To Right</label><br>
                                <input type="radio" name="direction" value="rtl"
                                    class=" @error('direction') is-invalid @enderror">
                                <label for="css">Right To Lift</label><br>
                                @error('direction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Active Language ?</label>
                            <div>
                                <input type="radio" name="active" value=1 class="@error('active') is-invalid @enderror">
                                <label for="html">Active Now</label><br>
                                <input type="radio" name="active" value=0 class="@error('active') is-invalid @enderror">
                                <label for="css">Active Later</label><br>
                                @error('active')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" id="form-submit" class="btn btn-primary">Save</button>
                    </form>
                    <br>
                    <div id="success-msg" class="alert alert-success" style="display: none">
                        <span>
                            new language saved succeffuly
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).on('click', '#form-submit', function(e) {
            e.preventDefault();
            var formData = new FormData($("#lang-form")[0]);
            $.ajax({
                type: "post",
                url: "{{ route('languages.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    $("#success-msg").slideToggle()
                    $("#success-msg").slideToggle(4000)
                  

                },
                error: function(reject) {},
            });

        });
    </script>


@endsection
