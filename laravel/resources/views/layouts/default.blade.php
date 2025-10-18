<!DOCTYPE html>
<html lang="ja">

<head>
    @include('elements.meta')
</head>

<body>
    @include('elements.header')
    <main role="main" class="container">
        @yield('contents')
        @include('elements.footer')
    </main>
    @yield('script')
    @vite(['resources/js/app.js'])
</body>

</html>