<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Stream;
class StreamController extends Controller
{
    //列表操作
    public function index(){
    	//查询
    	$data = Stream::orderBy('sort')->get();
    	//展示视图
    	return view('admin.stream.index',compact('data'));
    }
}
