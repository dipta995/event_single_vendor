@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">
        <a class="btn btn-success" href="{{ url('/admin/package') }}">Pagkages</a>
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-body">
                    <form method="POST" action="{{ url('update_pack/'.$package->id )}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select name="cat_id" class="form-control" id="">
                                        @foreach ($category as $item)
                                        <option @php
                                            if ($item->id==$package->cat_id) {
                                                echo "selected";
                                            }
                                        @endphp value="{{ $item->id }}">{{ $item->cat_title }}</option>
                                        @endforeach
                                    </select>
                                <label for="inputFirstName">Category name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="pr_title" id="inputFirstName" type="text" value="{{ $package->pr_title }}" />
                                    <label for="inputFirstName">Package name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="price" id="inputFirstName" type="number" min="0" value="{{ $package->price }}" />
                                    <label for="inputFirstName">Price</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="discount" id="inputFirstName" type="number" min="0" value="{{ $package->discount }}" />
                                    <label for="inputFirstName">discount</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="image" id="inputFirstName" type="file" min="0" placeholder="Enter your category name" />

                                </div>
                                <img class="mini-image" src="{{ url('images/'.$package->image ) }}" alt="">
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <textarea class="form-control" name="description" id="inputFirstName" rows="20" cols="10">{{ $package->description }}</textarea>
                                    <label for="inputFirstName">Description</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><button class="btn btn-primary btn-block" >Update</button></div>
                        </div>
                    </form>
                </div>

            </div>
        </div>


    </div>
</div>


@endsection
