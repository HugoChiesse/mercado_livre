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
                <a href="{{ route('products.index') }}">
                    Lista de Produtos
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>

    @include('layouts._partials.alerts')
@stop

@section('content')

<div class="card">
    <div class="card-header">
        
        @include('admin.pages.products.attributes._partials.form')

    </div>

    <div class="card-body">

        @include('admin.pages.products.attributes._partials.table')

    </div>
</div>


@stop

@section('js')

@stop
