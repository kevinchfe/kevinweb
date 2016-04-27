@extends('home.layout')

@section('content')
    <section class="container">
        <div class="col-lg-8">
            @if(!empty($article))
                <div class="article-detail">
                    <div class="article-date">2016<br>02-18</div>
                    <div class="article-title">
                        <h1>{{ $article->title }}</h1>
                    </div>
                    <div class="clearfix"></div>
                    <div class="article-content">
                        {!! conversionMarkdown($article->content) !!}
                    </div>


                </div>
            @endif
        </div>

        @include('home.right')

        <div class="clearfix"></div>
    </section>

@endsection