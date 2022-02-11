@extends('layouts.admin.master')
@section('content')
@include('layouts.admin.message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-body">
                    <form method="POST" action="{{ url('add_multiple_image') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                   <select class="form-control" name="package_id" id="">
                                       @foreach ($packages as $pack)
                                       <option value="{{ $pack->id }}">{{ $pack->pr_title }}</option>
                                       @endforeach
                                   </select>
                                    <label for="inputFirstName">Package name</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="image[]" id="inputFirstName" type="file" multiple />
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
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>image</th>
                    <th>Action</th>
                </tfoot>
                <tbody>
                    <tr>
                        @foreach ($images as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><img class="micro-image" src="{{ url('images/'.$item->image ) }}" alt=""></td>
                            <td><a href="{{ url('/admin/multipleimage/delete/'.$item->id) }}" class="btn btn-danger m-2"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
