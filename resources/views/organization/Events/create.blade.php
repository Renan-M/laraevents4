@extends('layouts.panel')
@section('title', 'Novo evento')
@section('content')
    <form action="{{ route('organization.events.store') }}" method="POST" autocomplete="off">
        @include('organization.Events._partials.form')
    </form>
@endsection
