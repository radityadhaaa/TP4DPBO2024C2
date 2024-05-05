<?php
  class GroupAddView{
    public function render(){
        
        $tpl = new Template("templates/addGroup.html");
        $tpl->write();
    }
}

?>
