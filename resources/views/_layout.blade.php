
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Artesãos ZipCode ">
    <meta name="author" content="Fúlvio Cezar Canducci Dias">    
    <title>Artesãos ZipCode</title>
    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/starter-template.css') !!}" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="{!! asset('js/ie8-responsive-file-warning.js') !!}"></script><![endif]-->
    <script src="{!! asset('js/ie-emulation-modes-warning.js') !!}"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{!! asset('js/html5shiv.min.js') !!}"></script>
    <script src="{!! asset('js/respond.min.js') !!}"></script>
    <![endif]-->
    <script src="{!! asset('js/jquery.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('js/ie10-viewport-bug-workaround.js') !!}"></script>
    <script src="{!! asset('js/angular.min.js') !!}"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:;">Artesãos ZipCode</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="https://github.com/artesaos" target="_blank">Acesse: GitHub Artesãos</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
<script src="{!! asset('js/app.js') !!}"></script>
</body>
</html>
