@extends('layout.layout')

@section('title')
    Vaccines
@endsection
@section('content')
    @section('page_title')
        Vaccines
    @endsection
    @section('content')
        <x-vaccine.buttons.new-button/>
        <x-vaccine.modals.create-modal/>
        <livewire:tables.vaccine-table/>
    @endsection
@endsection
