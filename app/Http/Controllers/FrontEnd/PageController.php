<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Page;

class PageController extends Controller
{
    public function page($slug){
        $page = Page::where('slug', $slug)->first();
        dd($page);
        return view('FrontEnd/pages/index', compact('page'));
    }
}
