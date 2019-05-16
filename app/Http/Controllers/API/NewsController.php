<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Page;

class NewsController extends Controller
{

    //List all news records
    public function index(){
        return response()->json(Page::with('subpage')->where('page_id', 0)->orderBy('order')->get());
    }

    //Get a single news record
    public function show($id){
        return response()->json(Page::find($id));
    }
}
