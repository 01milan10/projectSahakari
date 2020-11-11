<html>

<head>
    <title>
        Project Sahakari
    </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div id="app">
        @auth
        <App v-bind:is-auth="1" />
        @endauth

        @guest
        <App v-bind:is-auth="0" />
        @endguest
    </div>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="{{asset('js/gsap-public/minified/gsap.min.js')}}"></script>
    <script src="{{asset('js/animation/animation.js')}}"></script>
</body>

</html>