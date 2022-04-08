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
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Name</th>

                                        <th>Price/discount</th>
                                        <th>offer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        @foreach ($packages as $key=>$item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->pr_title }}</td>
                                            <td>{{ $item->package_price }}<br>{{ $item->package_price-(($item->package_price*$item->discount)/100) }}</td>
                                            <td>{{ $item->offer_price }}</td>
                                            <td>
                                                @php
                                                    if ($item->active_check==0) {
                                                       echo "pending";
                                                    }
                                                    elseif ($item->active_check==1) {
                                                       echo "running";
                                                    }else {

                                                    }
                                                @endphp
                                            </td>
                                            </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>



                        </div>
                    </div>
            </div>
            </div>

        </div>

</section>


@endsection
