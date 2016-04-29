<div class="col-lg-4">
    @if(!empty($newArticles))
        <div class="title-index">
            <h4 class="">最新文章</h4>
            <div>
                <ul class="title-list">
                    @foreach($newArticles as $newArticle)
                        <li><a href="{{ action('ArticleController@show',['id'=>$newArticle->id]) }}">{{ $newArticle->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

</div>