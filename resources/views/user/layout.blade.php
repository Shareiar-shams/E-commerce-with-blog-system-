<!DOCTYPE html>
<html lang="en">

@include('user.include.head')

<body onload="myFunction()">
    <!--================ Page Loading Area ================ -->
    <div id="loa"></div>
    <div class="catagories-side-menu">
        @include('user.include.sidebar')
    </div>

    <div id="wrapper">

        <!-- ****** Header Area Start ****** -->
        @include('user.include.header')
        <!-- ****** Header Area End ****** -->

        @section('main_content')
            @show

        <!-- ****** Footer Area Start ****** -->
        @include('user.include.footer')
        <!-- ****** Footer Area End ****** -->
    </div>
    @include('user.include.js')

</body>

</html>