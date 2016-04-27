<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cache;
use Input;

class Article extends Model
{
    const REDIS_NEW_ARTICLE_CACHE = 'redis_new_article_cache_';
    const REDIS_ALL_ARTICLE_CACHE = 'redis_all_article_cache_';
    const REDIS_ARTICLE_CACHE     = 'redis_article_cache_';

    static $cacheMinutes = 1;

    protected $fillable = [
        'cat_id',
        'content',
        'title',
    ];

    /**
     * 获取全部文章
     * @param int $limit 条数
     */
    public static function getAllArticle()
    {
        $articles = Input::get('page', 1);
        $cacheName = $articles;
        if (empty($model = Cache::get(self::REDIS_ALL_ARTICLE_CACHE . $cacheName))) {
            $model = self::orderBy('id', 'desc')->paginate(1);
            Cache::put(self::REDIS_ALL_ARTICLE_CACHE . $cacheName, $model, self::$cacheMinutes);
        }
        return $model;
    }

    /**
     * 获取最新文章
     * @param int $limit
     * @return mixed
     */
    public static function getNewArticle($limit=4)
    {
        $cacheName = $limit;
        if (empty($model = Cache::get(self::REDIS_NEW_ARTICLE_CACHE .$cacheName))){
            $model = self::select('id','title')->orderBy('id','desc')->get();
            Cache::put(self::REDIS_NEW_ARTICLE_CACHE .$cacheName,$model,self::$cacheMinutes);
        }
        return $model;
    }

    /**
     * 根据id获取文章
     * @param $articleId
     * @return mixed
     */
    public static function getArticleModelByArticleId($articleId)
    {
        if(empty($article = Cache::get(self::REDIS_ARTICLE_CACHE .$articleId))){
            $article = self::findOrFail($articleId);
            Cache::add(self::REDIS_ARTICLE_CACHE .$articleId,$article,self::$cacheMinutes);
        }
        return $article;
    }

}
