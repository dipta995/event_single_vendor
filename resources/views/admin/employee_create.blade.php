@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/employee_create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select name="customer_id" class="form-control" id="">
                                        @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                <label for="inputFirstName">Name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select name="flag" class="form-control" id="">
                                       <option value="1">Admin</option>
                                       <option value="2">Editor</option>
                                       <option value="3">Employee</option>
                                    </select>
                                <label for="inputFirstName">Role</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="salary" id="inputFirstName" type="number" min="0" placeholder="Enter your category name" />
                                    <label for="inputFirstName">Salary</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="phone" id="inputFirstName" type="number" min="0" placeholder="Enter your category name" />
                                    <label for="inputFirstName">Phone no</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <textarea class="form-control" name="designation" id="inputFirstName" rows="20" cols="10"></textarea>
                                    <label for="inputFirstName">designation</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <textarea class="form-control" name="address" id="inputFirstName" rows="20" cols="10"></textarea>
                                    <label for="inputFirstName">Address</label>
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


    </div>
</div>


@endsection
