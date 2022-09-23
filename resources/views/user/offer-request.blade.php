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
                                        <form action="{{ url('send-order-offer') }}" method="post">
                                            @csrf

                                            <div class="form-control">
                                                <div class="form-group">
                                                    @include('layouts.admin.message')
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Request Date</label>
                                                    <input required name="request_date" min ='<?php echo date('Y-m-d');?>' type="date" placeholder="search" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Day</label>
                                                    <input required type="number" readonly name="day" min="{{ $package->day }}" max="{{ $package->day }}" value="{{ $package->day }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">offer_price</label>
                                                    <input type="number" name="offer_price" required value="{{ $price_main = $package->price-(($package->price*$package->discount)/100) }}" max="{{ $price_main }}" min="{{ round($package->price-($price_main*20)/100) }}"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">message</label>
                                                   <textarea name="message" id="" class="form-control" cols="6" rows="6"></textarea>
                                                </div>

                                                <input type="hidden" name="package_id" value="{{ $package->id }}">
                                                <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="package_price" value="{{ $package->price }}">
                                                <div class="form-group">
                                                    <input type="submit" value="Confirm" class="btn btn-success">
                                                </div>
                                            </div>
                                        </form>

                                    </div>






                            </div>


                        </div>
                    </div>
            </div>
            </div>
            <div class="col-lg-4">
                                    <div class="row">
                        <div class="col-lg-12">

                        </div>

                        <div class="col-lg-12">
                            <div class="sidebar-widget about-bar">
                                <h5 class="mb-3">Pricing</h5>
                                <a href="{{ url('offer/'.$package->slug) }}" class="btn btn-info">Order</a>
                                <p>Price : <del> {{ $package->price }} <small>৳</small></del>  {{ $package->price-(($package->price*$package->discount)/100) }} <small>৳</small></p>
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
