@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/add_new_gallery') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="title" id="inputFirstName" type="text" placeholder="Enter your gallery name" />
                                    <label for="inputFirstName">Title</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="image" id="inputFirstName" type="file" placeholder="Enter your gallery name" />
                                    <label for="inputFirstName">Gallery</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><button class="btn btn-primary btn-block">Create</button></div>
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
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>


                </tfoot>
                <tbody>
                    <tr>
                        @foreach ($gallery as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td><img class="micro-image" src="{{ url('images/'.$item->image ) }}" alt=""></td>
                            <td><a href="{{ url('/admin/gallery/delete/'.$item->id) }}" class="btn btn-danger m-2"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
