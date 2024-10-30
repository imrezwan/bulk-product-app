@extends('layout')

@section('content')
<div class="container" style="margin: 30px;">
    <x-dashui-button type="button" as="link" href="{{ URL::tokenRoute('products')}}">All Products</x-dashui-button>
</div>
@endsection
