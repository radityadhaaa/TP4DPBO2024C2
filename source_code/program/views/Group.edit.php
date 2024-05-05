<?php
class GroupEditView{
    public function render($dataGroup){
        $data = null;
        foreach($dataGroup as $val){
            list($group_id, $group_name) = $val;
            $data .= ' <input type="hidden" name="group_id" value="'.$group_id.'" class="form-control"> <br>

            <label> NAME GROUP: </label>
            <input type="text" name="group_name" value="'.$group_name.'" class="form-control"> <br>
            ';
        }
        $tpl = new Template("templates/editGroup.html");
        $tpl->replace("EDIT_GROUP", $data);
        $tpl->write();
    }
}
?>
