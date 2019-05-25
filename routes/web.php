<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'welcome';
});

// 后台路由  不需要进行权限判断
Route::group(['prefix' => 'admin'], function() {
        //后台登录页面  在路由保护的自动跳转中，默认使用的是login，所以需要给login页面起一个别名，在跨路由访问的时候才能实现自动跳转到login页面
        Route::get('public/login','Admin\PublicController@login')->name('login');
        //后台退出页面
        Route::get('public/logout','Admin\PublicController@logout');
        //后台登录处理页面
        Route::post('public/check','Admin\PublicController@check');

});

// 后台路由  需要进行权限判断
Route::group([
                'prefix'     => 'admin',
                'middleware' => ['auth:admin','checkrbac']
             ],
function() {
        // 后台首页路由  使用auth中间件(middleware)进行路由保护
        route::get('index/index','Admin\IndexController@index');
        route::get('index/welcome','Admin\IndexController@welcome');
        //管理员管理页面
        route::get('manager/index','Admin\ManagerController@index');

        // 后台权限管理模块
        route::get('auth/index','Admin\AuthController@index');
        route::any('auth/add','Admin\AuthController@add');

        // 后台角色管理模块
        route::get('role/index','Admin\RoleController@index');
        route::any('role/add','Admin\RoleController@add');
        route::any('role/assign','Admin\RoleController@assign');

        //会员管理模块
        route::get('member/index','Admin\MemberController@index');//列表
        route::any('member/add','Admin\MemberController@add');//添加
        route::post('uploader/webuploader','Admin\UploaderController@webUpLoader');//异步上传
        route::post('uploader/qiniu','Admin\UploaderController@qiniu');//七牛云上传
        route::get('member/getareabyid','Admin\MemberController@getAreaById');//ajax联动

        // 专业分类和专业列表
        route::get('protype/index','Admin\ProtypeController@index');//专业分类
        route::get('profession/index','Admin\ProfessionController@index');//专业列表

        //课程与点播课程
        route::get('course/index','Admin\CourseController@index');//课程列表
        route::get('lesson/index','Admin\LessonController@index');//点播列表
        route::get('lesson/play','Admin\LessonController@play');//播放页面

        //试卷试题管理模块
        route::get('paper/index','Admin\PaperController@index');//试卷列表
        route::get('question/index','Admin\QuestionController@index');//试题列表
        route::any('question/import','Admin\QuestionController@import');//导入试题
        route::get('question/export','Admin\QuestionController@export');//导出试题

        //直播流管理模块
        route::get('stream/index','Admin\StreamController@index');//直播流列表
        route::any('stream/add','Admin\StreamController@add');//试直播流添加
        route::get('live/index','Admin\LiveController@index');//直播列表
});

