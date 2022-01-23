@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-body">
                    <form method="POST" action="{{ url('update_cat/'.$category->id )}}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="cat_title" id="inputFirstName" type="text" value="{{ $category->cat_title }}" />
                                    <label for="inputFirstName">Category name</label>
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
