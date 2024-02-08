@extends('layouts.admin.admin')
@section('tittle', 'Edit Main Category')
@section('content')
    @include('includes.sidebars.adminSidebar')
    @include('includes.navbars.adminNavbar')

    {{-- start edit category in Default lang --}}
    <div class="container-fluid pt-5 px-5">
        <div class="row g-4">
            <div class="col-sm-20 col-xl-50">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Edit Main Category ({{ $category->name }})</h6>
                    @include('includes.alerts.success')
                    @include('includes.alerts.errors')
                    <form method="post" action="{{ route('MainCategory.update', $category->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id }}">

                        <div class="form-group">
                            <div class="text-center">
                                <label class="form-label"> Current Image </label>
                                <br>
                                <img style="height: 500px ;width: 500px" src="{{ $category->photo }}" alt="Photo">

                            </div>
                        </div>
                        <br>
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



                        <div class="mb-3">
                            <label class="form-label"> Main Category Nmae</label>
                            <input type="text" value="{{ $category->name }}" name="category[0][name]"
                                class="form-control @error('category.0.name') is-invalid @enderror">

                            @error('category.0.name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="mb-3" hidden>
                            <label class="form-label"> Abbreviation</label>
                            <input type="text" value="{{ $category->translation_lang }}" name="category[0][abbr]"
                                value="" class="form-control @error('category.0.abbr') is-invalid @enderror">
                            @error('category.0.abbr')
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Active Main Category ?</label>
                            <div>
                                <input type="radio" name="active" value=1
                                    @if ($category->active == 'active') checked @endif
                                    class="@error('active') is-invalid @enderror">
                                <label for="html">Active Now</label><br>
                                <input type="radio" name="active" value=0
                                    @if ($category->active == 'not active') checked @endif
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
    {{-- end edit category in Default lang --}}

    {{-- start edit category in non Default langs --}}

    @if (isset($category->translatedCatrgories) && $category->translatedCatrgories->count())
        <div class="container-fluid pt-5 px-5">
            <div class="row g-4">
                <div class="col-sm-20 col-xl-50">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Edit Main Category ({{ $category->name }}) in translated languages</h6>
                        @foreach ($category->translatedCatrgories as $translatedCategory)
                            <form method="post" action="{{ route('MainCategory.update', $translatedCategory->id) }}"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">{{ $translatedCategory->translation_lang }} Main Category
                                        Nmae</label>
                                    <input type="text" value="{{ $translatedCategory->name }}" name="category[0][name]"
                                        class="form-control @error('category.0.name') is-invalid @enderror">

                                    @error('category.0.name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="mb-3" hidden>
                                    <label class="form-label"> Abbreviation</label>
                                    <input type="text" value="{{ $translatedCategory->translation_lang }}"
                                        name="category[0][abbr]" value=""
                                        class="form-control @error('category.0.abbr') is-invalid @enderror">
                                    @error('category.0.abbr')
                                        <span class="invalid-feedback" role="alert">
                                            <strong> {{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Active Main Category ?</label>
                                    <div>
                                        <input type="radio" name="active" value=1
                                            @if ($translatedCategory->active == 'active') checked @endif
                                            class="@error('active') is-invalid @enderror">
                                        <label for="html">Active Now</label><br>
                                        <input type="radio" name="active" value=0
                                            @if ($translatedCategory->active == 'not active') checked @endif
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif



    {{-- end edit category in non Default langs --}}


@endsection
