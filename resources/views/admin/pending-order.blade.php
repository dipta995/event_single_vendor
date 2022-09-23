@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">

<a class="btn btn-success" href="{{ url('/admin/running-order') }}">Running order</a>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Package Name</th>
                        <th>Customer</th>
                        <th>Price/discount</th>
                        <th>offer</th>
                        <th>details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Package Name</th>
                        <th>Customer</th>
                        <th>Price/discount</th>
                        <th>offer</th>
                        <th>details</th>
                        <th>Action</th>
                    </tr>

                </tfoot>
                <tbody>
                    <tr>
                        @foreach ($packages as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->pr_title }}</td>
                            <td>{{ $item->name }}<br>{{ $item->email }}</td>
                            <td>{{ $item->package_price }}<br>{{ $item->package_price-(($item->package_price*$item->discount)/100) }}</td>
                            <td>{{ $item->offer_price }}</td>
                            <td>{{ $item->message }}</td>
                            <td><a href="{{ url('/admin/order/approve/'.$item->id) }}" class="btn btn-info m-2"><i class="fas fa-hourglass"></i></a>
                                <a class="btn btn-danger" href="{{ url('/admin/order/delete/'.$item->id) }}"><i class="fas fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
    </div>
</div>


@endsection
