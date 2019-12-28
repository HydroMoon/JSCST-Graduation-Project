<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('extra.head')

<body class="Site">
    @include('extra.nav')
    @yield('main')


    <footer class="page-footer font-small bg-dark orange lighten-1">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2019 Copyright:
            <a href="#"> HydroMoon Production</a>
        </div>
        <!-- Copyright -->
    </footer>
    @include('extra.script')
</body>

</html>
