<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Periodical;
use App\Model\PeriodicalCategory;
use App\Model\PeriodicalDb;
use App\Model\PeriodicalPaper;
use Illuminate\Http\Request;

class JournalController extends Controller {


	public function index(Request $request) {
		$categorys = PeriodicalCategory::select('id', 'name')->where([['pid', '=', 0],['status','=',2],['is_nav','=',2]])->orderByDesc('sortcode')->get();
		$menus = [];
		foreach ($categorys as $value) {
			$childs = PeriodicalCategory::select('id', 'name')->where([['pid', '=', $value->id],['status','=',2],['is_nav','=',2]])->orderByDesc('sortcode')->get();
			$menus[] = ['parent' => $value, 'childs' => $childs];
		}
		$pos = '>全部';
		$pkuCounts = PeriodicalDb::where('db_id',1)->count();
		$cstpcdCounts = PeriodicalDb::where('db_id',2)->count();
		$cssciCounts = PeriodicalDb::where('db_id',3)->count();
		$cscdCounts = PeriodicalDb::where('db_id',4)->count();

		$periodicals = Periodical::select('id', 'title', 'image', 'cycle')->where('status', '=', 2);
		if ($request->has('db')){
		    $ids = PeriodicalDb::where('db_id',$request->get('db'))->pluck('periodical_id');
            $periodicals =  $periodicals->whereIn('id',$ids);
        }
		if ($request->has('journal_key')){
		    $journalKey = $request->get('journal_key');
            $issnpat = '#^[0-9]{4}[\s-\*]{1}[0-9]{4}$#';
            $cnpat = '#^[0-9]{2}[\s-\*]{1}[0-9]{4}/[a-z0-9]{1,2}$#i';
            if (preg_match($issnpat, $journalKey)) {
                $periodicals->where('issn','=',$journalKey);
            } else if (preg_match($cnpat, $journalKey)) {
                $periodicals->where('cn','=',$journalKey);
            } else {
                $periodicals->where('title','=',$journalKey);
            }
        }
		$periodicals = $periodicals->paginate(10);
		return view('home/journal/index', compact('menus', 'periodicals','pos','pkuCounts','cstpcdCounts','cssciCounts','cscdCounts'));
	}

	public function detail($id) {
	    $periodical = Periodical::find($id);
	    if ($periodical){
	       $papers =  PeriodicalPaper::select('id','code','title','authors')->where([['is_rm','=',1],['status','=','2'],['periodical_id','=',$id]])->orderBy('created_at','desc')->limit(5)->get();

            $arr = PeriodicalPaper::select('year', 'phase')->where([['periodical_id', '=', $id],['is_rm','=',1],['status','=',2]])->orderByDesc('year')->orderBy('phase')->distinct()->get()->toArray();
            $yearAndPhases = [];
            foreach ($arr as $v) {
                $yearAndPhases[$v['year']][] = $v;
            }

            return view('home/journal/detail',compact('periodical','papers','yearAndPhases'));
        }
		else{
            return view('errors/404');
        }
	}

	public function category(Request $request,$id){

        $categorys = PeriodicalCategory::select('id', 'name')->where([['pid', '=', 0],['status','=','2'],['is_nav','=',2]])->orderByDesc('sortcode')->get();
        $menus = [];
        foreach ($categorys as $value) {
            $childs = PeriodicalCategory::select('id', 'name')->where([['pid', '=', $value->id],['status','=','2'],['is_nav','=',2]])->orderByDesc('sortcode')->get();
            $menus[] = ['parent' => $value, 'childs' => $childs];
        }
        $pos = '>'.PeriodicalCategory::where('id',$id)->value('name');
        $periodicalIDs = Periodical::where([['status', '=', 2],['typestr','like',PeriodicalCategory::where('id',$id)->value('typestr').'%']])->pluck('id');
        $pkuCounts = PeriodicalDb::where('db_id',1)->whereIn('periodical_id',$periodicalIDs)->count();
        $cstpcdCounts = PeriodicalDb::where('db_id',2)->whereIn('periodical_id',$periodicalIDs)->count();
        $cssciCounts = PeriodicalDb::where('db_id',3)->whereIn('periodical_id',$periodicalIDs)->count();
        $cscdCounts = PeriodicalDb::where('db_id',4)->whereIn('periodical_id',$periodicalIDs)->count();
        $periodicals = Periodical::select('id', 'title', 'image', 'cycle')->where([['status', '=', 2],['typestr','like',PeriodicalCategory::where('id',$id)->value('typestr').'%']]);
        if ($request->has('db')){
            $ids = PeriodicalDb::where('db_id',$request->get('db'))->pluck('periodical_id');
            $periodicals =  $periodicals->whereIn('id',$ids);
        }
        $periodicals = $periodicals->paginate(14);
        return view('home/journal/index', compact('menus', 'periodicals','pos','pkuCounts','cstpcdCounts','cssciCounts','cscdCounts'));
    }


}
