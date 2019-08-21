<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PeriodicalCategory;
use Illuminate\Http\Request;
use App\Model\Periodical;


class PeriodicalCategoryController extends Controller {
	public function index() {
//		$cas = PeriodicalCategory::where('pid','=',0)->orderByDesc('sortcode')->get();
//		$categorys = [];
//		foreach ($cas as $c){
//		    $categorys [] = $c;
//		    $childs = PeriodicalCategory::where('pid','=',$c->id)->orderByDesc('sortcode')->get();
//		    foreach ($childs as $child){
//            $categorys[]  = $child;
//            }
//        }

        $categorys = PeriodicalCategory::orderby('typestr')->orderByDesc('sortcode')->get();
		$total =PeriodicalCategory::count();
		return view('admin.periodicalCategory.index', compact('categorys','total'));
	}

	public function add(Request $request) {
		if ($request->method() == 'POST') {

			$res = PeriodicalCategory::addData($request->all());
			return $res ? '1' : '0';
		}
		// $categorys = PeriodicalCategory::getTree();
		$categorys = PeriodicalCategory::select('id', 'name', 'level')->orderby('typestr')->get();
		return view('admin.periodicalCategory.add', compact('categorys'));
	}

	public function edit($id,Request $request) {
		if ($request->method() == 'POST') {
			$res = PeriodicalCategory::update($request->all());

			return $res ? '1' : '0';
		}
		$curCategory = PeriodicalCategory::find($id);
		$categorys = PeriodicalCategory::getTree();
		return view('admin.periodicalCategory.edit', compact('categorys','curCategory'));

	}

	public function stop($id){
	   $res =  PeriodicalCategory::where('id',$id)->update(['is_nav'=>1]);
	   return $res ? '1' :'0';
    }

    public function start($id){
        $res =  PeriodicalCategory::where('id',$id)->update(['is_nav'=>2]);
        return $res ? '1' :'0';
    }

    public function delete($id){
        $periodical = Periodical::select('id')->where('typestr',PeriodicalCategory::where('typestr','=','0')->value('id'))->first();

        if ($periodical){
            return response()->json(['code'=>'0','message'=>'该类下有期刊']);
        }

        $category = PeriodicalCategory::select('id')->where('pid',$id)->first();
        if ($category){
            return response()->json(['code'=>0,'message'=>'该类下有子分类，不可删除']);
        }

        $res = PeriodicalCategory::find($id)->delete();
        if ($res){
            return response()->json(['code'=>1,'message'=>'删除成功']);
        }else{
            return response()->json(['code'=>0,'message'=>'删除失败']);
        }

    }

    public function update(Request $request,$id){
        $cur = PeriodicalCategory::find($id);
        $curStr = $cur->typestr;
	    if ($request->pid == 0){
	        $typestr = '<'.$id.'<';
	        $cha = $cur->level-1;
            $childs = PeriodicalCategory::where('typestr','like',"$cur->typestr%")->get();
            if ($childs->count()>0){
                foreach ($childs as $child){
                    if ($child->typestr==$cur->typestr){
                        continue;
                    }
                    $childStr = $child->typestr;
                    $child->typestr = str_replace($cur->typestr,$typestr,$childStr);
                    Periodical::where('typestr',$childStr)->update(['typestr'=>$child->typestr]);
                    $child->level -= $cha;
                    $child->save();
                }
            }
	        $cur->typestr = $typestr;
            Periodical::where('typestr',$curStr)->update(['typestr'=>$typestr]);
	        $cur->level = 1;
	        $cur->pid = 0;
	        $cur->description = $request->description;
	        $cur->name = $request->name;
	        $cur->is_nav=$request->is_nav;
	        return $cur->save() ? '1' :'0';
        }

	    $parent = PeriodicalCategory::find($request->pid);
        $typestr = $parent->typestr . $id .'<';
        $cha = $parent->level+1-$cur->level;

        $childs = PeriodicalCategory::where('typestr','like',"$cur->typestr%")->get();
        if ($childs->count()>0){
            foreach ($childs as $child){
                if ($child->typestr==$cur->typestr){
                    continue;
                }
                $childStr = $child->typestr;
                $child->typestr = str_replace($cur->typestr,$typestr,$child->typestr);
                Periodical::where('typestr',$childStr)->update(['typestr'=>$child->typestr]);
                $child->level += $cha;
                $child->save();
            }
        }

        $cur->name = $request->name;
        $cur->level = $parent->level+1;
        $cur->typestr = $typestr;
        Periodical::where('typestr',$curStr)->update(['typestr'=>$typestr]);
        $cur->description = $request->description;
        $cur->is_nav = $request->is_nav;
        $cur->pid=$request->pid;
        return $cur->save() ? '1' :'0';
    }

}
