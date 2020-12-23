<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'a_article';

    /**
     * 获取博客文章的评论
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

}
