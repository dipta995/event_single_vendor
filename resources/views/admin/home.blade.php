@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')

<form action="{{ route('author.store') }}" method="POST">
    @csrf
    <input type="text" placeholder="name" name="name">
    <input type="text" value="2" name="user_id">
    <input type="text" placeholder="name" name="phone">
    <input type="text" placeholder="name" name="address">

    <input type="submit" name="" id="">
</form>



@endsection
