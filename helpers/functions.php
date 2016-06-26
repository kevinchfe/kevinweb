<?php
/**
 * Author: Kevin
 * Date: 2016/4/19
 * Time: 15:18
 */

if (!function_exists('viewInit')) {
    /**
     * 视图函数
     */
    function viewInit(){
        $articles = app('App\Model\Article');
        $cates    = app('App\Model\Category');

        /*-------------- 李潘潘 ---------------*/
        $start = strtotime('2016-05-15 12:00:00');
        $end   = time();
        $days  = round(($end - $start)/86400+1);
        view()->share('days',$days);
        /*-------------- 李潘潘 ---------------*/

        //dd($cates::getFirstLevelCategory());
        view()->share('newArticles',$articles::getNewArticle());
        view()->share('cates',$cates::getFirstLevelCategory());
    }
}

if (!function_exists('tree')) {
    /*
     * 树形结构无限分类
     */
    function tree($model, $parentId = 0, $level = 0, $html = '-') {
        $data = array();
        foreach ($model as $K => $v) {
            if ($v->parent_id == $parentId) {
                if ($level != 0) {
                    $v->html = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level);
                    $v->html .= "|";
                }
                $v->html .= str_repeat($html, $level);
                $data[] = $v;
                $data = array_merge($data, tree($model, $v->id, $level + 1));
            }
        }
        return $data;
    }
}

if(!function_exists('conversionMarkdown')){
    /*
     * markdown 语法转换
     */
    function conversionMarkdown($markdownContent){
        $endaEditor = app('YuanChao\Editor\Facade\EndaEditorFacade');
        return !empty($endaEditor) ? $endaEditor::MarkDecode($markdownContent) : '';
    }
}
