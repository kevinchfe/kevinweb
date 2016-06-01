@extends('app')
@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">登录</div>
                    <div class="panel-body">
                        <form action="{{ url('/password/reset') }}" method="post" class="form-horizontal" role="form">
                            {!! csrf_field() !!}

                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label class="control-label col-md-4">邮箱</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-4">密码</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-4">确认密码</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit">
                                        重置密码
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection