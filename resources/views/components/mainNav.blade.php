<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<style>
    .card-fixed-size {
        height: 300px; 
    }
    .card-image {
    object-fit: cover; 
    width: 100%; 
    height: 100%; 
}
</style>

<body>

    @can('isAdmin')
        @include('./components/AdminNav')
    @else
        @can('isUser')
            @include('./components/UserNav')
        @else
            @include('./components/GuestNav')
        @endcan
    @endcan
    
    @yield('error')
    @yield('banner')
    @yield('content')
    @yield('footer')

</body>
</html>