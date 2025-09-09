<!DOCTYPE html>
<html lang="en">
<head>
@yield('head')
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    @include('admin.partial.topbar')
    @yield('content')
@yield('footer')
@yield('script')
</body>
</html>
