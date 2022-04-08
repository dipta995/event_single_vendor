@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-body">
                    <form method="POST" action="{{ url('add_new_product') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select name="cat_id" class="form-control" id="">
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->cat_title }}</option>
                                        @endforeach
                                    </select>
                                <label for="inputFirstName">Category name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="pr_title" id="inputFirstName" type="text" placeholder="Enter your category name" />
                                    <label for="inputFirstName">Package name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="price" id="inputFirstName" type="number" min="0" placeholder="Enter your category name" />
                                    <label for="inputFirstName">Price</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="discount" id="inputFirstName" type="number" min="0" value="0" placeholder="Enter your category name" />
                                    <label for="inputFirstName">discount</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="day" id="inputFirstName" type="number" min="0"  />
                                    <label for="inputFirstName">Day</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="image" id="inputFirstName" type="file" min="0" placeholder="Enter your category name" />

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <textarea class="form-control" name="short_description" id="inputFirstName" rows="20" cols="10"></textarea>
                                    <label for="inputFirstName">Short Description</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <textarea class="form-control" name="description" id="inputFirstName" rows="20" cols="10"></textarea>
                                    <label for="inputFirstName">Description</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select name="home_view" class="form-control" id="">

                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                <label for="inputFirstName">Home View</label>
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
