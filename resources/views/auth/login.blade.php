@extends('app')
@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">登录</div>
                    <div class="panel-body">
                    <form action="{{ url('/auth/login') }}" method="post" class="form-horizontal" role="form">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="control-label col-md-4">邮箱</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-4">密码</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <label for="" class="control-label">
                                    <input type="checkbox" name="remember"> 记住我
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">登录</button>
                                <a href="{{ url('password/email') }}" class="btn btn-link">忘记密码?</a>
                            </div>
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection