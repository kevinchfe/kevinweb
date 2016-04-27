@extends('backend.user.common')
@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">内容管理</div>
            <div class="panel-body">
                <a href="{{ action('backend\UserController@create') }}" class="btn btn-success">创建新用户</a><br>
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table table-top table-hover">
                    <tr>
                        <th>#</th>
                        <th>姓名</th>
                        <th>邮箱</th>
                        <th>创建时间</th>
                        <th class="text-right">操作</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td class="text-right">
                                {!! Form::open(['action'=>array('backend\UserController@edit',$user->id),'method'=>'get','class'=>'btn-form']) !!}
                                <button class="btn btn-info" type="submit">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改
                                </button>
                                {!! Form::close() !!}

                                {!! Form::open(['action'=>array('backend\UserController@destroy',$user->id),'method'=>'delete','class'=>'btn-form']) !!}
                                <button class="btn btn-danger" type="submit">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>

                    @endforeach
                </table>
            </div>
            {!! $users->render() !!}
        </div>
    </div>
@endsection