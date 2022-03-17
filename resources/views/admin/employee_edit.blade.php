@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/employee_update/'.$employee->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select name="customer_id" class="form-control" id="">


                                        <option value="{{ $employee->customer_id }}">{{ $employee->name }}</option>

                                    </select>
                                <label for="inputFirstName">name</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="salary" id="inputFirstName" type="number" min="0" value="{{ $employee->salary }}" />
                                    <label for="inputFirstName">Salary</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="phone" id="inputFirstName" type="number" min="0" value="{{ $employee->phone }}" />
                                    <label for="inputFirstName">Phone no</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <textarea class="form-control" name="designation" id="inputFirstName" rows="20" cols="10">{{ $employee->designation }}</textarea>
                                    <label for="inputFirstName">designation</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <textarea class="form-control" name="address" id="inputFirstName" rows="20" cols="10">{{ $employee->address }}</textarea>
                                    <label for="inputFirstName">Address</label>
                                </div>
                            </div>


                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><button class="btn btn-primary btn-block" href="login.html">Update</button></div>
                        </div>
                    </form>
                </div>

            </div>
        </div>


    </div>
</div>


@endsection
