<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PaperCollection;
use Auth;

class PaperCollectionController extends Controller
{
    public function collection(Request $request){
        $res = PaperCollection::create(['paper_id'=>$request->get('id'),'member_id'=>Auth::guard('member')->id()]);
        if ($res){
            return response()->json(['code'=>'1','pid'=>$res->id]);
        }else{
            return response()->json(['code'=>'0']);
        }

    }

    public function unCollection(Request $request){
        $res = PaperCollection::destroy($request->get('id'));
        return response()->json(['code'=>$res ? '1' :'0']);
    }

    public function removeCollected(Request $request) {
       $paperCollect =  PaperCollection::select('id')->where([['paper_id','=',$request->get('id')],['member_id','=',Auth::guard('member')->id()]]);
        if ($paperCollect){
           $res =  $paperCollect->delete();
           $code = $res ? '1' :'0';
        }else{
            $code = '0';
        }
        return response()->json(['code'=>$code]);
    }
}
