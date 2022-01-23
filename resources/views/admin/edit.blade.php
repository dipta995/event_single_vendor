@extends('layouts.admin.master')
@section('content')

@include('layouts.admin.message')


<form action="{{ route('author.update',$userinfo->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" value="{{ $userinfo->name }}" name="name">
    <input type="text" value="{{ $userinfo->user_id }}" name="user_id">
    <input type="text" value="{{ $userinfo->phone }}" name="phone">
    <input type="text" value="{{ $userinfo->address }}" name="address">

    <input type="submit" name="" id="">
</form>

@endsection
