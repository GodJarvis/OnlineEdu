<?php

use Illuminate\Database\Seeder;

class ProtypeAndProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //创建两个数据表的模拟数据
        DB::table('profession') -> insert([
            'pro_name'		=>	'php基础班',
            'protype_id'	=>	'1',
            'teachers_ids'	=>	'49,51,53,56',
            'created_at'	=> 	date('Y-m-d H:i:s'),
            'duration'		=>	18,
            'cover_img'		=>	'/statics/demo.jpg',
            'price'			=>	'100.00'
        ]);
        DB::table('profession') -> insert([
            'pro_name'		=>	'php就业班',
            'protype_id'	=>	'1',
            'teachers_ids'	=>	'2,8,14,24',
            'created_at'	=> 	date('Y-m-d H:i:s'),
            'duration'		=>	98,
            'cover_img'		=>	'/statics/demo.jpg',
            'price'			=>	'200.00'
        ]);
        DB::table('profession') -> insert([
            'pro_name'		=>	'前端基础班',
            'protype_id'	=>	'2',
            'teachers_ids'	=>	'80,81,82,83',
            'created_at'	=> 	date('Y-m-d H:i:s'),
            'duration'		=>	90,
            'cover_img'		=>	'/statics/demo.jpg',
            'price'			=>	'100.00'
        ]);
    }
}
