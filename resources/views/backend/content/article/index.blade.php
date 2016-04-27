@extends('backend.content.index')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">内容管理</div>
            <div class="panel-body">
                <a href="{{ route('backend.article.create') }}" class="btn btn-success">写文章</a>
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table table-top table-hover">
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>分类</th>
                        <th>作者</th>
                        <th>创建时间</th>
                        <th class="text-right">操作</th>
                    </tr>
                    @foreach($articles as $article)
                        <tr>
                            <th>{{ $article->id }}</th>
                            <td>{{ $article->title }}</td>
                            <td>{{ App\Model\Category::getCategoryNameByCatId($article->cat_id) }}</td>
                            <td>kevin</td>
                            <td>{{ $article->created_at }}</td>
                            <td class="text-right">
                                {!! Form::open(['action'=>array('backend\ArticleController@edit',$article->id),'method'=>'get','class'=>'btn-form']) !!}
                                <button class="btn btn-info" type="submit">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改
                                </button>
                                {!! Form::close() !!}

                                {!! Form::open(['action'=>array('backend\ArticleController@destroy',$article->id),'method'=>'delete','class'=>'btn-form']) !!}
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