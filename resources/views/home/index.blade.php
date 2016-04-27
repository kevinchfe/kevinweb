@extends('home.layout')

@section('content')

    <section class="container">
        <div class="col-lg-8">
            @if(!empty($articles))
                @foreach($articles as $article)
                    <div class="kevin-index">
                        <div class="title">
                            <a href="{{ action('ArticleController@show',['id'=>$article->id]) }}">{{ $article->title }}</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="description">
                            {!! conversionMarkdown($article->content) !!}
                        </div>
                        <div class="desc-link">
                            <div class="col-lg-6">
                                <span class="date">{{ $article->created_at }}</span>
                            </div>
                            <div class="col-lg-6" style="text-align: right">
                                <a href="{{ action('ArticleController@show',['id'=>$article->id]) }}">阅读全文-></a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
                {!! $articles->render() !!}
            @endif
        </div>

        @include('home.right')

        <div class="clearfix"></div>
    </section>

@endsection

