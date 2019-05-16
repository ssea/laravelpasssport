<?php

namespace App\Http\Controllers\BackEnd;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){  
        $categories = Category::orderBy('order')->get();
        return view('BackEnd/categories/index', compact('categories'));
    }

    public function create(){
        return view('BackEnd/categories/add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'order' => 'numeric',
            'status' => 'required|numeric',
        ]);

        Category::create($request->all());
        return redirect('/admin/category');
    }

    public function edit(Category $category){
        return view('BackEnd/categories/edit', compact('category'));
    }

    public function update(Request $request, Category $category){
        $this->validate($request, [
            'name' => 'required',
            'order' => 'numeric',
            'status' => 'required|numeric',
        ]);
        
        $category->fill($request->all())->save();
        return redirect('/admin/category');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/admin/category');
    }

    public function restore($id){
        $category = Category::withTrashed()->find($id);
        $category->restore();
        return redirect('/admin/category');
    }
}
