<!DOCTYPE html>
<html lang="en">

@include('front.layout.head')

<body>
    <!-- Topbar Start -->

    <!-- Topbar End -->

    @include('front.layout.topbar')
    <!-- Navbar Start -->
    @include('front.layout.navbar')
    <!-- Navbar End -->

    {{$slot}}

    <!-- Footer Start -->
    @include('front.layout.footer')
    <!-- Footer End -->

    @include('front.layout.footer_scripts')




</body>

</html>
