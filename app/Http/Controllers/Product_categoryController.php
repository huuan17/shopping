<?php

namespace App\Http\Controllers;

use App\Product_category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;

class Product_categoryController extends Controller
{
    private $product_category;
    public function __construct(Product_category $product_category)
    {
        $this->product_category= $product_category;
    }

    public function index()
    {
        $productcategories= $this ->product_category->latest()->paginate(25);
        return view('product_category.index',compact('productcategories'));
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parentID='');
        return view('product_category.add',compact('htmlOption'));
    }
    public function store (Request $request)
    {
        $slug_r= $request->slug;
        if($slug_r==''){
            $slug_r=Str::slug($request->name_vie, '-');
        }
        $this->product_category->create([
            'name_vie'=>$request->name_vie,
            'parent_id'=>$request->parent_id,
            'order'=>$request->order,
            'active'=>$request->active,
            'home_page'=>$request->home_page,
            'title'=>$request->title,
            'description'=>$request->description,
            'keyword'=>$request->keyword,
            'introduction_vie'=>$request->introduction_vie,
            'slug'=> $slug_r
        ]);
        return redirect() -> route('product_categories.index');

    }
    public function getCategory($parentID){
        $data= $this->product_category->all();
        $recusive = new Recusive($data);
        $htmlOption= $recusive -> product_categoryRecusive($parentID);
        return $htmlOption;
    }
    public function delete($id){
        $this->product_category ->find($id)->delete();
        return redirect() -> route('product_categories.index');

    }
    public function edit($id){
        $productcate = $this->product_category->find($id);
        $htmlOption= $this->getCategory($productcate->parent_id);

        return view('product_category.edit',compact('productcate','htmlOption'));
    }
    public function update($id, Request $request){
        $slug_r= $request->slug;
        if($slug_r==''){
            $slug_r=Str::slug($request->name_vie, '-');
        }
        $this->product_category->find($id)->update([
            'name_vie'=>$request->name_vie,
            'parent_id'=>$request->parent_id,
            'order'=>$request->order,
            'active'=>$request->active,
            'home_page'=>$request->home_page,
            'title'=>$request->title,
            'description'=>$request->description,
            'keyword'=>$request->keyword,
            'introduction_vie'=>$request->introduction_vie,
            'slug'=> $slug_r
        ]);
        return redirect() -> route('product_categories.index');

    }

}
