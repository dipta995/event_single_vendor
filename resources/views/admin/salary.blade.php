@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">
<form action="{{ url('admin/salary') }}" method="GET">
    <div class="form-group">
        <div class="form-control">
            <label for="">Month:</label>
            <input type="number" max="12" min="1"  name="month" >
            <label for="">Year:</label>
            <input type="number" min="1" max="<?php echo date('Y')?>" name="year" >

            <input class="btn btn-success" type="submit">
        </div>
    </div>
</form>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>designation</th>
                        <th>Salary</th>

                    </tr>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>designation</th>
                    <th>Salary</th>


                </tfoot>
                <tbody>
                   @foreach ($salary_sheet as $key =>   $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->designation }}</td>
                        <td>{{ $item->paid_balance }}</td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
    </div>
</div>


@endsection
