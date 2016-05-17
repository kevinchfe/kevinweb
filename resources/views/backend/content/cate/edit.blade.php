@extends('backend.content.index')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">创建分类</div>

            @if ($errors->has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong>
                    {{ $errors->first('error', ':message') }}
                    <br/>
                    请联系开发者！
                </div>
            @endif
            <div class="panel-body">
                {!! Form::open(['route'=>['backend.cate.update',$cate->id],'method'=>'put','class'=>'form-horizontal']) !!}
                <div class="form-group">
                    <label for="" class="col-md-2 control-label">上级分类</label>
                    <div class="col-md-3">
                        {!! Form::select('parent_id',\App\Model\Category::getCategoryTree(),$cate->parent_id,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-2 control-label">分类名称</label>
                    <div class="col-md-3">
                        {!! Form::text('cate_name',$cate->cate_name,['class'=>'form-control','placeholder'=>'category_name']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::submit('更改', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection