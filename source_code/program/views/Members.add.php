<?php
  class MembersAddView{
    public function render($data){
      $tampilkanGrup = null;
      foreach($data as $val){
        list($group_id, $group_name) = $val;
        $tampilkanGrup .= '<option value="'.$group_id.'">'.$group_name.'</option>';
      }
    
        $tpl = new Template("templates/addMember.html");
        $tpl->replace("DATA_GRUP", $tampilkanGrup);
        $tpl->write();
    }
}

?>
