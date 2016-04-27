<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    static $catData = [
        0 => '顶级分类',
    ];

    /**
     * 根据分类id查找分类名称
     * @param $catId
     * @return string
     */
    public static function getCategoryNameByCatId($catId)
    {
        $cate = self::select('cate_name')->find($catId);
        $cateName = $cate['cate_name'];
        return !empty($cateName) ? $cateName : '分类不存在';
    }

    /**
     * 取得树状结构分类数组
     * @return array
     */
    public static function getCategoryTree()
    {
        $data = self::getCategoryDataModel();
        foreach($data as $k=>$v){
            self::$catData[$v->id] = $v->html . $v->cate_name;
        }
        return self::$catData;
    }

    /**
     *获取分类列表
     * @return array
     */
    public static function getCategoryDataModel()
    {
        $category = self::all();
        $data = tree($category);
        return $data;
    }

}
