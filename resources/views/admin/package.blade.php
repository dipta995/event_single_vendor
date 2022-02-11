@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">

<a class="btn btn-success" href="{{ url('/admin/package/create') }}">Create New</a>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Image</th>
                    <th>Action</th>

                </tfoot>
                <tbody>
                    <tr>
                        @foreach ($packages as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->pr_title }}</td>
                            <td>{{ $item->cat_title }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->discount }}</td>
                            <td><img class="micro-image" src="{{ url('images/'.$item->image ) }}" alt=""></td>
                            <td><a href="{{ url('/admin/package/delete/'.$item->id) }}" class="btn btn-danger m-2"><i class="fas fa-trash-alt"></i></a><a class="btn btn-info" href="{{ url('/admin/package/'.$item->id) }}"><i class="fas fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
    </div>
</div>


@endsection
