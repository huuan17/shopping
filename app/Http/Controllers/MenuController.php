<?php

namespace App\Http\Controllers;
use App\Components\CateProduct;
use App\Menu;
use App\Components\MenuRecusive;
use Illuminate\Http\Request;
//---------------

class MenuController extends Controller
{

    private $menuRecusive;
    private $menu;
    private $cateProduct;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu, CateProduct $cateProduct)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu=$menu;
        $this->cateProduct = $cateProduct;
    }

    public function index(){
        return view('menus.index');
    }
    public function create(){
        $optionSelect= $this->menuRecusive->menuRecusiveAdd();
        $optionSelect_cp = $this->cateProduct->menuProductRecusive();

        return view('menus.add', compact(['optionSelect','optionSelect_cp']));
    }
    public function store(Request $request){
        $type = $request->type;
        switch ($type){
            case (1):{
                $this->menu->create([
                    'name'=> $request->name_vie,
                    'type'=>$request->type,
                    'mega'=>$request->mega,
                    'active'=>$request->active,
                    'parent_id'=>$request->parent_id,
                    'order'=>$request->order,
                    'child'=>$request->childpro
                ]);
                break;
            }
            case (2):{
                $this->menu->create([
                    'name'=> $request->name_vie,
                    'type'=>$request->type,
                    'mega'=>$request->mega,
                    'active'=>$request->active,
                    'parent_id'=>$request->parent_id,
                    'order'=>$request->order,
                    'child'=>$request->childpost]);
                break;
            }
            case (3):{
                $this->menu->create([
                    'name'=> $request->name_vie,
                    'type'=>$request->type,
                    'mega'=>$request->mega,
                    'active'=>$request->active,
                    'parent_id'=>$request->parent_id,
                    'order'=>$request->order,
                    'child'=>$request->childpage
                ]);
                break;
            }
            case (4):{
                $this->menu->create([
                    'name'=> $request->name_vie,
                    'type'=>$request->type,
                    'mega'=>$request->mega,
                    'active'=>$request->active,
                    'parent_id'=>$request->parent_id,
                    'order'=>$request->order,
                    'clink'=>$request->clink
                ]);
                break;

            }

        }

        return redirect()->route('menus.index');
    }
}
