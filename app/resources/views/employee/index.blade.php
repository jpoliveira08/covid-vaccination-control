@extends('layout.layout')

@section('title')
    Employees
@endsection
@section('content')
    @section('page_title')
        Employees
    @endsection
    <x-employee.create-button/>
@endsection
