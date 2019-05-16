<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Category;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
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
        $products = Product::with('category')->get();
        return view('BackEnd/products/index', compact('products'));
    }

    public function create(){
        $categories = Category::where('status', 1)->orderBy('name')->pluck('name', 'id');
        return view('BackEnd/products/add', compact('categories'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'picture' => 'required|mimes:jpg,jpeg,png', 
            'category_id' => 'required|numeric',
            'name' => 'required',
            'amount' => 'numeric',
            'unit_price' => 'numeric',
            'order' => 'numeric',
            'status' => 'required|numeric',
        ]);

        $input = $request->all();

        $product = Product::create($input);

        if ($request->file('picture') != null) {
            // Saving Filename
            $name = $product->slug.'.jpg';
            $file = $request->file('picture');
            $image_512 = Image::make($file->getRealPath());
            $image_512->resize(512, 'auto', function ($c) {
                $c->aspectRatio();
                $c->upsize();
            })->save('storage/products/512/'.$name);

            $image_256 = Image::make($file->getRealPath());
            $image_256->resize(256, 'auto', function ($c) {
                $c->aspectRatio();
                $c->upsize();
            })->save('storage/products/256/'.$name);
            
            $input['picture'] = $name;
        }

        $product->fill($input)->save();
        return redirect('/admin/product');
    }

    public function edit(Product $product){
        $categories = Category::where('status', 1)->orderBy('name')->pluck('name', 'id');
        return view('BackEnd/products/edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product){
        $this->validate($request, [
            'picture' => 'mimes:jpg,jpeg,png', 
            'category_id' => 'required|numeric',
            'name' => 'required',
            'amount' => 'numeric',
            'unit_price' => 'numeric',
            'order' => 'numeric',
            'status' => 'required|numeric',
        ]);

        $input = $request->all();
        if ($request->file('picture') != null) {
            // Saving Filename
            $name = $product->slug.'.jpg';
            $file = $request->file('picture');
            $image_512 = Image::make($file->getRealPath());
            $image_512->resize(512, 'auto', function ($c) {
                $c->aspectRatio();
                $c->upsize();
            })->save('storage/products/512/'.$name);

            $image_256 = Image::make($file->getRealPath());
            $image_256->resize(256, 'auto', function ($c) {
                $c->aspectRatio();
                $c->upsize();
            })->save('storage/products/256/'.$name);
            
            $input['picture'] = $name;
        }

        $product->fill($input)->save();
        return redirect('/admin/product');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/admin/product');
    }

    public function restore($id){
        $product = Product::withTrashed()->find($id);
        $product->restore();
        return redirect('/admin/product');
    }
}
