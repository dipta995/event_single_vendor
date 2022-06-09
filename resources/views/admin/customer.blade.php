@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">

            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>Address</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>Address</th>
                    <th>Action</th>


                </tfoot>
                <tbody>
                    <tr>
                        @foreach ($data as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <a href="{{ url('admin/customer/delete',$item->id) }}" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                @endforeach
                    </tr>
                </tbody>
            </table>
    </div>
</div>


@endsection
