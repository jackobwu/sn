<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Status;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
		if(Auth::check()){
			$statuses = Status::NotReply()->where(function($query){
				return $query->where('user_id', Auth::user()->id)
					->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
			})
			->latest()
			->paginate(10);
			
			return view('timeline.index')->with(compact('statuses'));
		}

		return view('home');
	}
}
