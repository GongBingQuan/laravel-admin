<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'a_banner';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    public function getSiteAttribute($value)
    {
        $site = explode(',', $value);
        return array_map(function ($item){
            if(!$item) return '';
            return [1 => '发现页 banner', 2 => '线路页 banner',3 => '发现页 icon'][$item];
        },$site);
    }
   

    public function setSiteAttribute($value)
    {
        $this->attributes['site'] = implode(',', $value);
    }
   
}
