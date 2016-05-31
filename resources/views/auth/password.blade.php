@extends('app')
@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">邮件</div>
                    <div class="panel-body">
                        <form action="{{ url('/password/email') }}" method="post" class="form-horizontal" role="form">

                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="control-label col-md-4">邮箱</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                   <div class="col-md-6 col-md-offset-4">
                                    <button type="submit">发送邮件</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection