@extends('layouts.app')

@section('dataLayout', 'horizonal')
@section('dataTopbar', 'light')
@section('dataSidebar', 'dark')
@section('dataLayoutMode', 'light')

@section('content')
    <div id="layout-wrapper">
        @include("layouts.components.header.index")

        @include("layouts.components.sidebar.index")

        @yield('content')
    </div>
@endsection
