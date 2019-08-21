<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\PeriodicalPaper;
use App\Model\Periodical;
class SearchController extends Controller {
	public function search($key) {
	    $key = trim($key);
	    $papers = PeriodicalPaper::search($key)->paginate(10);
	    $periodical = Periodical::search($key)->first();
		return view('home.search.index',compact('papers','periodical','key'));
	}
}
