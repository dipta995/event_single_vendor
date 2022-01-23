@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-body">
                    <form method="POST" action="{{ url('add_new_cat') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="cat_title" id="inputFirstName" type="text" placeholder="Enter your category name" />
                                    <label for="inputFirstName">Category name</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><button class="btn btn-primary btn-block" href="login.html">Create</button></div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>


                </tfoot>
                <tbody>
                    <tr>
                        @foreach ($category as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->cat_title }}</td>
                            <td><a href="{{ url('/admin/category/delete/'.$item->id) }}" class="btn btn-danger m-2"><i class="fas fa-trash-alt"></i></a><a class="btn btn-info" href="{{ url('/admin/category/'.$item->id) }}"><i class="fas fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
