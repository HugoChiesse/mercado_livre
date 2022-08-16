@extends('adminlte::page')

@section('title', $title)

@section('css')

@stop

@section('content_header')
    <h1>{{ $title }}</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>

    @include('layouts._partials.alerts')
@stop

@section('content')

    @include('admin.pages.products._partials.table')

@stop

@section('js')

@stop
