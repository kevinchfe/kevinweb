@extends('backend.content.index')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">内容管理</div>
            <div class="panel-body">
                <a href="{{ route('backend.cate.create') }}" class="btn btn-success">创建分类</a>

                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table table-top table-hover">
                    <tr>
                        <th>#</th>
                        <th>分类名称</th>
                        <th>创建时间</th>
                        <th class="text-right">操作</th>
                    </tr>
                    @foreach($cates as $v)
                        <tr>
                            <th>{{ $v->id }}</th>
                            <td>{{ $v->html }}{{ $v->cate_name }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right">
                                {!! Form::open(['action'=>array('backend\CateController@edit',$v->id),'method'=>'get','class'=>'btn-form']) !!}
                                <button class="btn btn-info" type="submit">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改
                                </button>
                                {!! Form::close() !!}

                                {!! Form::open(['action'=>array('backend\CateController@destroy',$v->id),'method'=>'delete','class'=>'btn-form']) !!}
                                <button class="btn btn-danger" type="submit">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection