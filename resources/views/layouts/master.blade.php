<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin Dashboard')</title>
    @include('layouts.partial.style');
    @yield('styles')

    <!--[if lt IE 9]>
   <script src="{{ asset('assets') }}/js/html5shiv.min.js"></script>
   <script src="{{ asset('assets') }}/js/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <div class="main-wrapper">

        @include('layouts.partial.header')


        {{-- @include('layouts.partial.sidebar') --}}
        <div class="page-wrapper" style="margin-left:0px ">
            @yield('content')

        </div>
    </div>


    @include('layouts.partial.js')
    @yield('scripts')
</body>

</html>
