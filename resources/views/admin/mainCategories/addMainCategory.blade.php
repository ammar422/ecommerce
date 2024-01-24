@extends('layouts.admin.admin')
@section('tittle', 'Add New Main Category')
@section('content')
    @include('includes.sidebars.adminSidebar')
    @include('includes.navbars.adminNavbar')
    <!-- Form Start -->
    <div class="container-fluid pt-5 px-5">
        <div class="row g-4">
            <div class="col-sm-20 col-xl-50">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Add New Main Category</h6>
                    @include('includes.alerts.success')
                    @include('includes.alerts.errors')
                    <form method="post" action="{{ route('storeCategories') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="form-label"> Main Category Image </label>
                            <br>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        @if(activeLang()->count() > 0)

                            @foreach (activeLang() as $index=>$lang)
                                <div class="mb-3">
                                    <label class="form-label"> {{ $lang->name }} Main Category Nmae</label>
                                    <input type="text" name="category[{{ $index }}][name]"
                                        class="form-control @error("category.$index.name") is-invalid @enderror">

                                    @error("category.$index.name")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="mb-3" hidden >
                                    <label class="form-label">{{ $lang->name }} Abbreviation</label>
                                    <input  type="text" name="category[{{ $index }}][abbr]"
                                    value="{{ $lang->abbr }}"
                                        class="form-control @error("category.$index.abbr") is-invalid @enderror">
                                    @error("category.$index.abbr")
                                        <span class="invalid-feedback" role="alert">
                                            <strong> {{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endforeach
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Active Main Category ?</label>
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

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End --
@endsection
