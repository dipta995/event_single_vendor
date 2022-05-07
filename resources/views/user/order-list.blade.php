@extends('layouts.user.master')
@section('content')

<div class="page-banner-area page-contact" id="page-banner">

</div>
<section class="section blog-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12">
                            <table style="color: #000;" class="table table-info">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Name</th>

                                        <th>Price</th>
                                        <th>Discount</th>
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
                                            <td>{{ $item->package_price }}</td>
                                            <td>{{ $item->package_price-(($item->package_price*$item->discount)/100) }}</td>
                                            <td>{{ $item->offer_price }}</td>
                                            <td>
                                                @php
                                                    if ($item->active_check==0) {
                                                       echo "<span class='btn-danger'>Pending</span>";
                                                    }
                                                    elseif ($item->active_check==1) {
                                                       echo "<span class='btn-info'>Running</span>";
                                                    }else {
                                                        echo "<span class='btn-success'>Finish</span>";
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
