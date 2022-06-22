@extends('layouts.user.master')
@section('content')
<section id="service-head" class=" bg-feature">

</section>
<section id="service">
    <div class="container">
        <div class="row">
            @foreach ($packages as $pack)


            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="service-box ">
                    <div class="">
                        <img style="max-width: 320px; max-height: 180px;" src="{{ url('images/'.$pack->image ) }}" alt="service-icon" class="img">
                    </div>
                    <div class="service-inner">
                        <h4>{{ $pack->pr_title }}</h4>
                        <p style="font-size:18px;" class="price"><small>৳</small> <del> {{ $pack->price }} </del></p>
                        <p style="font-size:18px;" class="price"><small>৳</small> {{ $pack->price-(($pack->price*$pack->discount)/100)}}</p>
                        <ul>
                            @php
                                echo $pack->short_description;
                            @endphp
                        </ul>
                    </div>
                    <hr>
                    <a href="{{ url('package-details/'.$pack->slug) }}" class="btn btn-hero btn-circled">Check details</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
