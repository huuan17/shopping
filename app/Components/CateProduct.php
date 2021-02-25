<?php
namespace App\Components;
//use App\Menu;
use App\Product_category;

class CateProduct{
    private $html;
    public function __construct()
    {
        $this->html='';
    }
    public function menuProductRecusive($parentId =null,$subMark=''){
        $data =Product_category::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem){
            $this->html.='<option value="'.$dataItem->id.'">'.$subMark.$dataItem->name_vie.'</option>';
            $this->menuProductRecusive($dataItem->id,$subMark.'--');
        }
        return $this->html;
    }
}
