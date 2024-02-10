@extends('layouts.admin.admin')
@section('tittle', 'All Vendors')
@section('content')
    @include('includes.sidebars.adminSidebar')
    @include('includes.navbars.adminNavbar')

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            @include('includes.alerts.errors')
            @include('includes.alerts.success')
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Vendors</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Main Category</th>
                                    <th scope="col">email</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">logo</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">locatiopn</th>
                                    <th scope="col">opreations</th>


                                </tr>
                            </thead>
                            <tbody>
                                @isset($vendors)
                                    @foreach ($vendors as $vendor)
                                        <tr>
                                            <th scope="row">{{ $vendor->id }}</th>
                                            <td>{{ $vendor->name }}</td>
                                            <td>{{ $vendor->category->name }}</td>
                                            <td>{{ $vendor->email }}</td>
                                            <td>{{ $vendor->phone }}</td>
                                            {{-- <td>{{ $category->photo }}</td> --}}
                                            <td><img style="height: 130px ;width: 100px" src="{{ $vendor->logo }}"
                                                    alt="logo"></td>
                                            <td>{{ $vendor->active }}</td>
                                            <td>{{ $vendor->google_map_address }}</td>


                                            <td>
                                                <div class="col-sm-2 col-xl-2">
                                                    <div class="bg-secondary rounded h-5 p-1">
                                                        <div class="btn-group" role="group">
                                                            <a href="" type="button" class="btn btn-danger">delete</a>
                                                            <a href="" type="button" class="btn btn-warning">edit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
    

@endsection
