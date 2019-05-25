<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

//需要实现下面的接口才能实现请求的数据与数据库中的数据的验证，而实现这个接口后，还需要实现接口的所有抽象方法，所以
// 先 引入trait
use Illuminate\Auth\Authenticatable;

class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //定义当前模型需要关联的数据表
    protected $table='manager';

    //使用trait，就相当于将整个trait代码段复制到这个位置
    use Authenticatable;

    //定义与角色模型的关联操作(一对一)
    public function role()
    {
        return $this->hasOne('App\Admin\Role','id','role_id');
    }
}
