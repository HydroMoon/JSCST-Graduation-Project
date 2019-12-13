<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('extra.head')

<body>
    @include('extra.nav')
    @yield('main')


    <footer class="page-footer font-small bg-dark">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2019 Copyright:
            <a href="#"> HydroMoon Production</a>
        </div>
        <!-- Copyright -->
    </footer>
    @include('extra.script')
</body>

</html>
