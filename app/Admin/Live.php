<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    //
    protected $table='live';

    //关联专业，一对一
    public function profession()
    {
        return $this->hasOne('App\Admin\Profession','id','profession_id');
    }
    //关联直播流，一对一、
    public function stream()
    {
        return $this->hasOne('App\Admin\Stream','id','stream_id');
    }
}
