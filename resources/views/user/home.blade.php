@extends('layouts.user.master')
@section('content')
<div class="banner-area banner-3">
    <div class="overlay dark-overlay"></div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                        <div class="banner-content content-padding">
                            <h5 class="subtitle">A creative agency</h5>
                            <h1 class="banner-title">We craft seo and digital markting services</h1>
                            <p>We provide marketing services to startups and small businesses to looking for a partner for their digital media, design-area.We are a a startup company to be commited to work and time management.</p>

                            <a href="{{ url('contact-us') }}" class="btn btn-white btn-circled">ontact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MAIN HEADER AREA END -->
<!-- PRICE AREA START  -->
<section id="pricing" class="section-padding bg-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 m-auto">
                <div class="section-heading">
                    <h4 class="section-title">Affordable pricing plan for you</h4>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($packages as $pack)
            <div class="col-lg-4 col-sm-6">
                <div class="pricing-block ">
                    <div class="price-header">
                        <img style="max-width: 320px; max-height: 180px;" src="{{ url('images/'.$pack->image ) }}" alt="">

                        <h4>{{ $pack->pr_title }}</h4>
                        <p style="font-size:18px;" class="price"><small>৳</small><del> {{ $pack->price }} </del></p>
                        <p style="font-size:18px;" class="price"><small>৳</small> {{ $pack->price-(($pack->price*$pack->discount)/100)}}</p>
                    </div>
                    <div class="line"></div>
                    <ul>
                       @php
                           echo $pack->short_description;
                       @endphp
                    </ul>

                    <a href="{{ url('package-details/'.$pack->slug) }}" class="btn btn-hero btn-circled">Check details</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- PRICE AREA END  -->




<!--  SERVICE PARTNER START  -->
<section id="service-head" class=" bg-feature">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 m-auto">
                <div class="section-heading text-white">
                    <h4 class="section-title">Full stack digital marketing solution</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  SERVICE PARTNER END  -->

<!--  SERVICE AREA START  -->
    <section id="service">
        <div class="container">
            <div class="row">
                @foreach ($gallery as $item)
                    <div class="col-lg-4 col-sm-6 col-md-6">
                        <div class="service-box">
                                <img src="{{ url('images/'.$item->image ) }}" alt="service-icon" class="img-fluid">
                            <div class="service-inner">
                                <h4>{{ $item->title }}</h4>
                                {{-- <p>Reach a huge area of users and get a publicty of your product and service ,<span>video marketing</span> solution.</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>
   
@endsection
