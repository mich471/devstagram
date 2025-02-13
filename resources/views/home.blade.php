@extends('layouts.app')

@section('titulo')
    Pagina Principal
@endsection

@section('contenido')
    {{-- Componenete --}}
   <x-listar-post :posts="$posts" />
@endsection
