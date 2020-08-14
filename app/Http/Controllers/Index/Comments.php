<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Comments extends Controller
{
    public function cate(Request $request){
        $data=$request->post('neirong');
        
        print_r($data);die;
    }
}
