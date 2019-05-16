<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Page;

class HomeController extends Controller
{
    public function index(){
        $pages = Page::with('subpage')->where('page_id', 0)->orderBy('order')->get();
        $products = Product::with('category')->get();
        return view('FrontEnd/home/vodworks');
        //return view('FrontEnd/home/index', compact('products', 'pages'));
    }
}
