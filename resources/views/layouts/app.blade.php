@include('layouts.includes.head')
{{-- @include('layouts.includes.pre_loader') --}}
@include('layouts.includes.header')
@include('layouts.includes.sidebar')
@yield('content')
@include('layouts.includes.footer')|