@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/employee_payment/'.$employee->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select name="employee_id" class="form-control" id="">


                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>

                                    </select>
                                <label for="inputFirstName">name</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="paid_balance" id="inputFirstName" type="number" min="0" value="{{ $employee->salary }}" />
                                    <label for="inputFirstName">Salary</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="month" id="inputFirstName" type="number" min="0" value="{{ date('m') }}" />
                                    <label for="inputFirstName">Month</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="year" id="inputFirstName" rows="20" cols="10" value="{{ date('Y') }}">
                                    <label for="inputFirstName">Year</label>
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
