<!DOCTYPE html>
<html lang="en">
        @include('frontend.layouts.head')
    <body>
       <!--Header-->
        <header>
                @include('frontend.layouts.header')

                @include('frontend.layouts.navbar')
        </header>

        @yield('content_front')

        <!--Footer-section-->
        @include('frontend.layouts.footer')
        <!-- end Footer-section -->
        @include('frontend.layouts.scripts')

    </body>
</html>
