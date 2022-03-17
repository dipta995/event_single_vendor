@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">

<a class="btn btn-success" href="{{ url('/admin/employee/create') }}">Create New</a>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>designation</th>
                        <th>Salary</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>designation</th>
                    <th>Salary</th>
                    <th>Action</th>


                </tfoot>
                <tbody>
                    <tr>
                        @foreach ($employee as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->designation }}</td>
                            <td>{{ $item->salary }}</td>
                            <td><a href="{{ url('/admin/employee/delete/'.$item->id) }}" class="btn btn-danger m-2"><i class="fas fa-trash-alt"></i></a><a class="btn btn-info" href="{{ url('/admin/employee/'.$item->id) }}"><i class="fas fa-edit"></i></a></td>
                            @php
                                $today = date("Y-m-d");
                                $month =date('m', strtotime($today));
                                $year = date('Y', strtotime($today));
                                $find = DB::table('employee_payments')->where('month',$month)->where('year',$year)->where('employee_id',$item->id)->get();
                            @endphp
                            @if ($find->count() > 0)
                            <td>
                                <a class="btn btn-success">paid</a>
                            </td>
                            @else
                            <td><a class="btn btn-info" href="{{ url('/admin/employee/pay/'.$item->id) }}"><i class="fa fa-credit-card"></i></a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
    </div>
</div>


@endsection
