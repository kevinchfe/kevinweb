@extends('backend.user.common')
@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">修改用户</div>
            <div class="panel-body">
                {!! Form::open(['route'=>array('backend.user.update',$user->id),'class'=>'form-horizontal','method'=>'put']) !!}
                <div class="form-group">
                    <label for="" class="col-md-2 control-label">用户名</label>
                    <div class="col-md-3">
                        {!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Username']) !!}
                        <font color="red">{{ $errors->first('name') }}</font>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">邮箱</label>
                    <div class="col-md-3">
                        {!! Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'Email']) !!}
                        <font color="red">{{ $errors->first('email') }}</font>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">密码</label>
                    <div class="col-md-3">
                        {!! Form::password('password','',['class'=>'form-control','placeholder'=>'Password']) !!}
                        <br>
                        <font color="red">{{ $errors->first('password') }}</font>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">确认密码</label>
                    <div class="col-md-3">
                        {!! Form::password('password_confirmation','',['class'=>'form-control','placeholder'=>'Password']) !!}
                        <br>
                        <font color="red">{{ $errors->first('password_confirmation') }}</font>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 col-md-offset-2">
                        {!! Form::submit('修改',['class'=>'btn btn-success']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection