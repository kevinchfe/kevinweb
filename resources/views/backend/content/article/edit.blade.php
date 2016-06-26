@extends('backend.content.index')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">编辑文章</div>
            <div class="panel-body">
                {!! Form::model($article,['route'=>['backend.article.update',$article->id],'method'=>'put','class'=>'form-horizontal']) !!}

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">标题</label>
                    <div class="col-md-6">
                        {!! Form::text('title',$article->title,['class'=>'form-control','placeholder'=>'title']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">所属分类</label>
                    <div class="col-md-6">
                        {!! Form::select('cat_id',$catArr,null,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">内容</label>
                    <div class="col-md-6">
                        <div class="editor">
                            @include('editor::head')
                            {!! Form::textarea('content',$article->content, ['class' => 'form-control','id'=>'myEditor']) !!}
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-2">
                        {!! Form::submit('修改',['class'=>'btn btn-success']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection