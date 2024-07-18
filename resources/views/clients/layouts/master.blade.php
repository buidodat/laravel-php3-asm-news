<!DOCTYPE html>
<html lang="en-us">

    @include('clients.layouts.head')

<body>
    <!-- navigation -->
    @include('clients.layouts.header')
    <!-- /navigation -->

    <!-- start of banner -->
    @yield('banner')
    <!-- end of banner -->
    <main>
        @yield('content')
    </main>


    @include('clients.layouts.footer')

    <!-- JS Plugins -->
    @include('clients.layouts.libs-script')
</body>

</html>
