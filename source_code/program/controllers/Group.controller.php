<?php
include_once("conf.php");
include_once("models/Group.class.php");
include_once("views/Group.view.php");
include_once("views/Group.add.php");
include_once("views/Group.edit.php");

class GroupController {
  private $group;

  function __construct(){
    $this->group = new Groups(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->group->open();
    $this->group->getGroups();
    $data = array();
    while($row = $this->group->getResult()){
      array_push($data, $row);
    }

    $this->group->close();

    $view = new GroupView();
    $view->render($data);
  }

  
  function add($data){
    $this->group->open();
    $this->group->add($data);
    $this->group->close();
    
    header("location:group.php");
  }

  function viewAdd(){
    $view = new GroupAddView();
    $view->render();
  }

  function viewEdit($id){
    $this->group->open();
    $this->group->getGroupsByID($id);
    $data = array();
    
    array_push($data, $this->group->getResult());


    $this->group->close();

    $view = new GroupEditView();
    $view->render($data);
  }
  function edit($data){
    $this->group->open();
    $this->group->edit($data);
    $this->group->close();
    
    header("location:group.php");
  }

  function delete($id){
    $this->group->open();
    $this->group->delete($id);
    $this->group->close();
    
    header("location:group.php");
  }


}