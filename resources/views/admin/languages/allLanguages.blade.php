@extends('layouts.admin.admin')
@section('tittle', 'All Languages')
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
                    <h6 class="mb-4">Languages</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Abbr</th>
                                    <th scope="col">Local</th>
                                    <th scope="col">Direction</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">opreations</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($langs as $lang)
                                    <tr class="lang-row{{ $lang->id  }}">
                                        <th scope="row">{{ $lang->id }}</th>
                                        <td>{{ $lang->name }}</td>
                                        <td>{{ $lang->abbr }}</td>
                                        <td>{{ $lang->local }}</td>
                                        <td>{{ $lang->direction }}</td>
                                        <td>{{ $lang->active }}</td>

                                        <td>
                                            <div class="col-sm-2 col-xl-2">
                                                <div class="bg-secondary rounded h-5 p-1">
                                                    <div class="btn-group" role="group">
                                                        <button id="btn-delete" Lang-id="{{ $lang->id }}" type="button"
                                                            class="delete-btn btn-danger">delete</button>
                                                        <a href="{{ route('languages.edit', $lang->id) }}" type="button"
                                                            class="btn btn-warning">edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="success-msg" class="alert alert-success" style="display: none">
                            <span>
                                Language deleted successfauly
                            </span>
                        </div>
                        <div id="error-msg" class="alert alert-danger" style="display: none">
                            <span>
                                some thing went wrong try agien
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->

@endsection
@section('script')
    <script>
        $(document).on("click", ".delete-btn", function(e) {
            e.preventDefault();
            let langID = $(this).attr('Lang-id');
            $.ajax({
                type: "post",
                url: "{{ route('languages.delete') }}",
                data: {
                    '_token': " {{ csrf_token() }}",
                    'id': langID,
                },

                success: function(data) {
                    if (data.status == true) {
                        $("#success-msg").show()
                        $("#success-msg").hide(4000)
                    }
                    if (data.status == false) {
                        $("#error-msg").show()
                        $("#error-msg").hide(6000)
                    }

                    $(".lang-row"+data.id).remove()
                },
                error: function(reject) {},


            });
        })
    </script>
@endsection
