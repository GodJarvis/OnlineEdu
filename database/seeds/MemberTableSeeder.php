<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //产生faker实例，用法参照packgist.org
        $faker=\Faker\Factory::create('zh_CN');
        // 通过访问faker具体的属性来获取数据，用法同上
        $data=[];
        for ($i=0; $i < 500; $i++) {
            $data[]=[
                'username'   =>  $faker->userName,//生成用户名
                'password'   =>  bcrypt('password'),//使用框架内置bcrypt方法加密密码
                'gender'     =>  rand(1,3),//性别随机
                'mobile'     =>  $faker->phoneNumber,//生成手机号
                'email'      =>  $faker->email,//生成邮箱
                'avatar'     =>  '/statics/avatar.jpg',//用户头像地址
                'created_at' =>  date('Y-m-d H:i:s',time()),//创建时间
                'type'       =>  rand(1,2),//用户类型
                'status'     =>  rand(1,2)//账号状态
            ];
        }
        // 写入到数据表
        DB::table('member')->insert($data);
    }
}
