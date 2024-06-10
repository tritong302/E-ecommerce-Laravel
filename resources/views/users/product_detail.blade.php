@extends('layouts.app')
@section('title','Register TH21')

@section('content')
    <livewire:users.product.view :product_id="$product->id" :product="$product"/>
@endsection
