@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">

<a class="btn btn-success" href="{{ url('/admin/pending-order') }}">Pending order</a>
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
                    <th>#</th>
                    <th>Package Name</th>
                    <th>Customer</th>
                    <th>Price/discount</th>
                    <th>offer</th>
                    <th>details</th>
                    <th>Action</th>

                </tfoot>
                <tbody>
                    <tr>
                        @foreach ($packages as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->pr_title }}</td>
                            <td>{{ $item->name }}<br>{{ $item->email }}</td>
                            <td>{{ $item->price }}<br>{{ $item->price-(($item->price*$item->discount)/100) }}</td>
                            <td>{{ $item->offer_price }}</td>
                            <td></td>
                            <td><a href="javascript.void(0)" class="btn btn-info m-2"><i class="fas fa-clock"></i></a></td>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
    </div>
</div>


@endsection
