<?php
namespace App\Components;
//use App\Menu;
use App\Product_category;
class Recusive{
    private $data;
    private $htmlSelect='';
    private $html;
    public function __construct($data)
    {
        $this->data =$data;
        $this->html='';
    }

    public function product_categoryRecusive($parentID, $id=0, $text='')
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                if(!empty($parentID) && $parentID == $value['id']){
                    $this->htmlSelect .= "<option selected value='".$value['id']."'>" . $text . $value['name_vie'] . "</option>";
                }
                else{
                    $this->htmlSelect .= "<option value='".$value['id']."'>" . $text . $value['name_vie'] . "</option>";

                }
                $this->product_categoryRecusive($parentID, $value['id'], $text . '--');
            }
        }
        return $this->htmlSelect;
    }
    public function pd_cate($parentId =0,$subMark=''){
        $data1 =Product_category::where('parent_id', $parentId)->get();
        foreach ($data1 as $dataItem){
            $this->html.='<option value="'.$dataItem->id.'">'.$subMark.$dataItem->name_vie.'</option>';
            $this->pd_cate($dataItem->id,$subMark.'--');
        }
        return $this->html;
    }
}
