<?php
namespace App\Components;

use App\Category;

class Recusive{
    private $data;
    private $htmlSelelect = '';
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecusive($parentId, $id = 0, $test='')
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                if( !empty($parentId) && $parentId == $value['id']){
                    $this->htmlSelelect.= "<option selected value='". $value['id']. "'> " .$test . $value['name'] . "</option>";
                }
                else{
                    $this->htmlSelelect.= "<option value='". $value['id']. "'> " .$test . $value['name'] . "</option>";
                }

                $this->categoryRecusive($parentId, $value['id'], $test.'-');
            }
        }

        return $this->htmlSelelect;
    }
}
