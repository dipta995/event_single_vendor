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
                          <!--  <h5 class="subtitle">A Art  Creation</h5> -->
                         <!--  <h1 class="banner-title">A happy marriage is a long conversation which always seems too short.</h1> -->
                          <p>We provide best wedding plan for the beautiful bride and grome and Make their wedding day unforagateble</p>

                            <a href="{{ url('contact-us') }}" class="btn btn-white btn-circled">Contact Us</a>
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
                    <h4 class="section-title">Affordable pricing plan for your Different Ocassion </h4>
                    <p>We have different type of pricing table to choose with your need. Check which one is most suitble for you and your wedding and other Ocassion purpose. </p>
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




<!--  SERVICE PARTNER START
<section id="service-head" class=" bg-feature">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 m-auto">
                <div class="section-heading text-white">
                    <h4 class="section-title">We Will be always ready for your different occasion </h4>
                    <p>It is a treasure that is outshined by what it means…eternal romance." -Theresa Ann Moore, "Engagement Ring".</p>
                </div>
            </div>
        </div>
    </div>
</section>
  SERVICE PARTNER END  -->

<!--  SERVICE AREA START -->
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
