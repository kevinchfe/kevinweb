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
    <div class="container">
        <div class="logo">
            <div class="kevin-logo pull-left"><a href="{{ url('/') }}">Kevin Blog</a></div>
            <div class="kevin-desc pull-left">野生码农 {{ $days }}</div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div>
        <nav class="navbar navbar-default kevin-navbar">
            <div class="container">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">首页</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand kevin-navbar-link" href="{{ url('/') }}">首页</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            @foreach($cates as $cate)
                                <li>
                                    <a href="" class="kevin-navbar-link">
                                        {{ $cate->cate_name }} <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <form method="post" action="./" role="search" class="navbar-form navbar-left">
                                <div class="form-group">
                                    <input name="s" type="text" class="form-control" placeholder="输入关键字搜索">
                                </div>
                                <button type="submit" class="btn btn-default">搜索</button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

@yield('content')

<div class="footer container">
    <div class="col-lg-12 kevin-footer">
        <span>
            Copyright© <a href="/" title="Kevin">Kevin</a> 2016, All Rights Reserved
        </span>
        <span><a href="http://www.miibeian.gov.cn/" title="Kevin">粤ICP备16035735号</a> </span>
    </div>
</div>

<script>
    $(function () {
        var urlstr = window.location;
        console.log(urlstr);
    })

</script>

</body>
</html>