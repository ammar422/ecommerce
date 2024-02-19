@extends('layouts.admin.admin')
@section('tittle', 'Edit Vendor')
@section('content')
    @include('includes.sidebars.adminSidebar')
    @include('includes.navbars.adminNavbar')
    {{-- start edit vendor in Default lang --}}
    <div class="container-fluid pt-5 px-5">
        <div class="row g-4">
            <div class="col-sm-20 col-xl-50">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Edit Vendor ({{ $vendor->name }})</h6>
                    @include('includes.alerts.success')
                    @include('includes.alerts.errors')
                    <form method="post" action="{{ route('vendor.update', $vendor->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="id" value="{{ $vendor->id }}">
                        @csrf

                        <div class="form-group">
                            <div class="text-center">
                                <label class="form-label"> Current logo </label>
                                <br>
                                <img style="height: 500px ;width: 500px" src="{{ $vendor->logo }}" alt="Photo">

                            </div>
                        </div>
                        <br>
                        <div>
                            <label class="form-label"> Vendor Image </label>
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



                        <div class="mb-3">
                            <label class="form-label">vendor Nmae</label>
                            <input type="text" value="{{ $vendor->name }}" name="name"
                                class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Vendor Main Category</label><br>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                @foreach ($Categories as $Category)
                                    <option value="{{ $Category->id }}"
                                        @if ($vendor->category_id == $Category->id) @selected(true) @endif>
                                        {{ $Category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label class="form-label">vendor mobile</label>
                            <input type="text" value="{{ $vendor->phone }}" name="phone"
                                class="form-control @error('phone') is-invalid @enderror">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label class="form-label">vendor email</label>
                            <input type="text" value="{{ $vendor->email }}" name="email"
                                class="form-control @error('email') is-invalid @enderror">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label class="form-label">vendor address</label>
                            <input type="text" value="{{ $vendor->google_map_address }}" name="google_map_address"
                                class="form-control @error('google_map_address') is-invalid @enderror">

                            @error('google_map_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>





                        <div class="mb-3">
                            <label class="form-label">Active vendor ?</label>
                            <div>
                                <input type="radio" name="active" value=1
                                    @if ($vendor->active == 'Active') checked @endif
                                    class="@error('active') is-invalid @enderror">
                                <label for="html">Active Now</label><br>
                                <input type="radio" name="active" value=0
                                    @if ($vendor->active == 'Not Active') checked @endif
                                    class="@error('active') is-invalid @enderror">
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
    {{-- end edit vendor in Default lang --}}



@endsection
