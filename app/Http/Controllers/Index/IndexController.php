<?php

namespace App\Http\Controllers\Index;
 
use App\Http\Controllers\Controller;
use App\Model\ShopGoods;
use App\Model\ShopModel;
use Illuminate\Http\Request;
use App\Model\ShopGoods as model_shopgoods;
use App\Model\Cate as model_cate;
use App\Model\Video;

class IndexController extends Controller
{
    //首页
    public function index(){
        $dir=dirname(app_path()).'/resources/views/index';
        if(file_exists($dir.'/index.blade.php') && time()<filemtime($dir.'/index.blade.php')+20){
            $content1=file_get_contents($dir.'/index.blade.php');
            echo $content1;die;
        }
        //分类查询
        $data=model_cate::get()->toArray();
        //商品查询
        $res= model_shopgoods::where('is_new','1')->orderBy('goods_id','desc')->get()->toArray();
        ob_start();
        $content=view("index.index.index",['data'=>$data,'res'=>$res]);
        file_put_contents($dir.'/index.blade.php',$content);
        return $content;
    }
    //列表
    public function link(){
        //分类查询
        $data=model_cate::get()->toArray();
        //商品查询
        $res= model_shopgoods::orderBy('goods_id','desc')->get()->toArray();
        return view('index.index.link',['data'=>$data,'res'=>$res]);
    }
    //商品详情
    public function details($id){
        $dir=dirname(app_path()).'/resources/views/index';
        if(file_exists($dir.'/details.blade.php') && time()<filemtime($dir.'/details.blade.php')+20){
            $content1=file_get_contents($dir.'/details.blade.php');
            echo $content1;die;
        }
        $data= model_shopgoods::where('goods_id',$id)->find($id)->toArray();
        $aaa=Video::where('goods_id',$id)->get()->toArray();
        ob_start();
        if(empty($aaa)){
            $content=view('index.index.details',['data'=>$data]);
            file_put_contents($dir.'/details.blade.php',$content);
            return $content;
        }else{
            $data['m3u8']=$aaa[0]['m3u8'];
            $content=view('index.index.details',['data'=>$data]);
            file_put_contents($dir.'/details.blade.php',$content);
            return $content;
        }
    }
}
