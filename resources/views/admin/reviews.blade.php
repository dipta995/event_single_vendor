@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<div class="container">


    <div class="row justify-content-center">

            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Package Name</th>
                        <th>Customer</th>
                        <th>Review at</th>
                        <th>Review</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>Package Name</th>
                        <th>Customer</th>
                        <th>Review at</th>
                        <th>Review</th>
                        <th>Action</th>

                </tfoot>
                <tbody>
                    <tr>
                        @foreach ($reviews as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->pr_title }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->comment_at }}</td>
                            <td>{{ $item->comment }}</td>
                            <td>
                                <form class="from-group" action="{{ url('send/replay') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <textarea class="from-controll" type="text" name="replay"></textarea>
                                    <input class="btn btn-info" type="submit">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
    </div>
</div>


@endsection
