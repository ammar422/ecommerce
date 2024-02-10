@extends('layouts.admin.admin')
@section('tittle', 'Add New Vendor')
@section('content')
    @include('includes.sidebars.adminSidebar')
    @include('includes.navbars.adminNavbar')
    <!-- Form Start -->
    <div class="container-fluid pt-5 px-5">
        <div class="row g-4">
            <div class="col-sm-20 col-xl-50">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Add New Vendor</h6>
                    @include('includes.alerts.success')
                    @include('includes.alerts.errors')
                    <form method="post" action="{{ route('Vendor.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="form-label"> Vendor Logo </label>
                            <br>
                            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
                            @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                        <br>

                        @isset($main_Categories)

                        <div class="mb-3">
                            <label class="form-label">
                                Vendor Main Category</label><br>
                                <select name="Category_id" class="form-control">
                            @foreach ($main_Categories as $Category)
                                <option value="{{$Category->id}}">{{$Category->name}}</option>
                                
                                @endforeach
                            </select>
                            {{-- <input type="text" name="main_category"
                            class="form-control @error('main_category') is-invalid @enderror"> --}}

                            @error('main_category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    @endisset
                        <div class="mb-3">
                            <label class="form-label">
                                English Vendor Nmae</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                     
                        <div class="mb-3">
                            <label class="form-label">
                                Vendor Emial</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Vendor Phone Number </label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Vendor Location </label>
                            <input type="text" name="location"
                                class="form-control @error('location') is-invalid @enderror">

                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>


                        <div class="mb-3">
                            <label class="form-label">Active Vendor ?</label>
                            <div>
                                <input type="radio" name="active" value=1 class="@error('active') is-invalid @enderror">
                                <label for="html">Ask to Active Now</label><br>
                                <input type="radio" name="active" value=0 class="@error('active') is-invalid @enderror">
                                <label for="css">I will Active Later</label><br>
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
