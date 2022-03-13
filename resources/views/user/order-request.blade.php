@extends('layouts.user.master')
@section('content')

<div class="page-banner-area page-contact" id="page-banner">

</div>

<section class="section blog-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                                <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <form action="">
                                            <div class="form-control">
                                                <div class="form-group">
                                                    <input type="text" placeholder="search" class="form-control">
                                                    <label for=""></label>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                            </div>


                        </div>
                    </div>
            </div>
            <div class="col-lg-4">
                                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-widget search">
                                <div class="form-group">
                                    <input type="text" placeholder="search" class="form-control">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="sidebar-widget about-bar">
                                <h5 class="mb-3">Pricing</h5>
                                <a href="{{ url('offer/'.$package->slug) }}" class="btn btn-info">Send An Offer</a>
                                <a href="{{ url('order/'.$package->slug) }}" class="btn btn-info">Send An Offer</a>
                                <p>Price :  {{ $package->price-(($package->price*$package->discount)/100) }}</p>
                                <ul>
                                    @php
                                        echo $package->short_description;
                                    @endphp
                                 </ul>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="sidebar-widget category">
                                <h5 class="mb-3">Category</h5>
                                <ul class="list-styled">
                                    @foreach ($category as $cat)

                                    <li><a href="{{ url('category/'.$cat->slug) }}">{{ $cat->cat_title }}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

</section>


@endsection
