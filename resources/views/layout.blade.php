@extends('shopify-app::layouts.default')
@section('styles')
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/tailwind.css'])
@endsection

@section('content')
    @yield('content')
@endsection

@section('scripts')
    @parent

    <script src="https://unpkg.com/codyhouse-framework/main/assets/js/util.js"></script>
    @vite(['resources/js/app.js'])
@endsection
