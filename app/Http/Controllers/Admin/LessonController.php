<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin\Lesson;
use Input;

class LessonController extends Controller
{
    //列表
    public function index()
    {
        // 获取数据
        $data=Lesson::orderBy('sort','desc')->get();
        //展示视图
        return view('admin.Lesson.index',compact('data'));
    }

    public function play()
    {
        $id=Input::get('id');
        $addr=Lesson::where('id',$id)->value('video_addr');
        return "<video src='$addr' width='98%' controls='controls'>您的浏览器不支持 video标签！</video>";
    }
}
