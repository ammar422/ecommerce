@extends('layouts.admin.admin')
@section('tittle','Edit New Languages')
@section('content')
    @include('includes.sidebars.adminSidebar')
    @include('includes.navbars.adminNavbar')
    <!-- Form Start -->
    <div class="container-fluid pt-5 px-5">
        <div class="row g-4">
            <div class="col-sm-20 col-xl-50">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Edit New Languages</h6>
                    @include('includes.alerts.success')
                    <form method="post" action="{{ route('updateLanguage',$language->id) }}">
                        @csrf
                       
                        <div class="">
                            <label class="form-label">Language Nmae</label>
                            <input type="text" name="name" 
                            value="{{ $language->name }}" class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label class="form-label">ABBR</label>
                            <input type="text" name="abbr" 
                            value="{{ $language->abbr }}" class="form-control @error('abbr') is-invalid @enderror">
                            @error('abbr')
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Local</label>
                            <input type="text" name="local" 
                            value="{{ $language->local }} " class="form-control @error('local') is-invalid @enderror">
                            
                            @error('local')
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Direction Of Language</label>
                            <div>
                                <input type="radio" name="direction"  @if ($language->direction=='Lift To right') checked @endif value="ltr">
                                <label for="html">Lift To Right</label><br>
                                <input type="radio" name="direction"  @if ($language->direction=='Right To Lift') checked @endif value="rtl">
                                <label for="css">Right To Lift</label><br>

                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Active Language ?</label>
                            <div>
                                <input type="radio" name="active" @if ($language->active=='active') checked @endif value=1>
                                <label for="html">Active Now</label><br>
                                <input type="radio" name="active" @if ($language->active=='not active') checked @endif value=0>
                                <label for="css">Active Later</label><br>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-warning">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End --
@endsection
