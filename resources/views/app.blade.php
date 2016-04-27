<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>blog</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">KevinBlog</a>
            </div>
        </div>
    </nav>

</header>

@yield('content')

<div class="footer container">
    <div class="col-lg-12 kevin-footer">
        <span>
				Copyright© <a href="#" title="Kevin">Kevin</a> 2016, All Rights Reserved
        </span>
        <span><a href="http://www.miibeian.gov.cn/" title="Kevin">粤ICP备###号</a> </span>
    </div>
</div>

</body>
</html>