<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Title Undefined')</title>
    <!-- Page-specific CSS (Added by child views using @section('css')) -->
    @yield('css')
</head>
<body>
  @section('main')
  @show

  @yield('scripts')
</body>
</html>
