@extends('layouts.user.master')
@section('content')

<div class="page-banner-area page-contact" id="page-banner">
    {{-- <div class="overlay dark-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                <div class="banner-content content-padding">
                    <h1 class="text-white">Blog Details</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, perferendis?</p>
                </div>
            </div>
        </div>
    </div> --}}
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


                                        @foreach ($package->images as $key=>$item)

                                        <div class="carousel-item {{ ($key == 0) ? 'active' : ''}}">
                                          <img class="d-block w-100" src="{{ url('images/'.$item->image ) }}" alt="First slide">
                                        </div>
                                        @endforeach

                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </div>



                                  {{ $package->description }}

                            </div>


                           <div class="comments my-4">
                                <h3 class="mb-5">Comments :</h3>
                            @foreach ($reviews as $value)
                                <div class="media mb-4">
                                    <img src="{{ asset('user/images/blog/2.jpg') }}" alt="" class="img-fluid d-flex mr-4 rounded">
                                    <div class="media-body">
                                        <h5>{{ $value->name }}</h5>
                                    <span class="text-muted">{{ $value->comment_at }}</span>
                                        <p class="mt-2">{{ $value->comment }}</p>

                                        {{-- <a href="#" class="reply">Reply <i class="fa fa-reply"></i></a> --}}
                                        @if ($value->replay !=null)
                                            <div class="media mt-5">
                                                <img src="{{ asset('user/images/blog/2.jpg') }}" alt="" class="img-fluid d-flex mr-4 rounded">
                                                <div class="media-body">
                                                    <span class="text-muted">{{ $value->replay_at }}</span>
                                                    <p class="mt-2">{{ $value->replay }}</p>

                                                    {{-- <a href="#" class="reply">Reply <i class="fa fa-reply"></i></a> --}}
                                                </div>
                                            </div>

                                        @endif
                                    </div>
                                </div>

                                @endforeach
                            </div>
                            @if (Route::has('login'))
                            @auth
                            <div class="mt-5 mb-3">
                                <h3 class="mt-5 mb-2">Leave a comment</h3>
                                {{-- <p class="mb-4">We don't spam at your inbox.</p> --}}
                                <form action="{{ url('send/comment') }}" method="POST" class="row">
                                    @csrf
                                    <div class="col-lg-12">
                                        <input type="hidden" value="{{ $package->id }}" name="package_id">
                                        <div class="form-group mb-3">
                                            <textarea name="comment" cols="30" rows="6" class="form-control" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-12">
                                        <input type="submit" name="submit" class="btn btn-hero btn-circled" value="Send a message">
                                    </div>
                                </form>
                            </div>
                            @endauth
                            @endif
                        </div>
                    </div>
            </div>
            <div class="col-lg-4">
                                    <div class="row">
                        {{-- <div class="col-lg-12">
                            <div class="sidebar-widget search">
                                <div class="form-group">
                                    <input type="text" placeholder="search" class="form-control">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-lg-12">
                            <div class="sidebar-widget about-bar">
                                <h5 class="mb-3">Pricing</h5>
                                <a href="{{ url('offer/'.$package->slug) }}" class="btn btn-info">Orde</a>
                                <p>Price : <del>{{ $package->price }} <small>৳</small></del>  {{ $package->price-(($package->price*$package->discount)/100) }} <small>৳</small></p>
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
