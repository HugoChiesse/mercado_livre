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
            <li class="breadcrumb-item">
                <a href="{{ route('products.index') }}">{{ $title }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $subtitle }}</li>
        </ol>
    </nav>

    @include('layouts._partials.alerts')
@stop

@section('content')

    <form action="{{ route('products.store') }}" id="product" method="POST" enctype="multipart/form-data">

        @csrf
        @include('admin.pages.products._partials.form')

        <br>
        <button class="btn btn-info " id="btn-enviar" type="submit">Enviar</button>
    </form>

@stop

@section('js')

@stop
