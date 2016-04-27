<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>backend</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Kevin</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class=""><a href="{{ url('/backend/home') }}">后台主页</a></li>
                <li class=""><a href="{{ url('/backend/content') }}">内容管理</a></li>
                <li class=""><a href="#">系统设置</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/') }}">网站主页</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">username <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('modules')

</body>
</html>