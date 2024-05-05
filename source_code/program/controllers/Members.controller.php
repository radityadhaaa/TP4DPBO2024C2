<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Group.class.php");
include_once("views/Members.view.php");
include_once("views/Members.add.php");
include_once("views/Members.edit.php");

class MembersController {
  private $members;
  private $group;

  function __construct(){
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->group = new Groups(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->group->open();
    $this->members->getMembers();
    $this->group->getGroups();
    
    $data = array(
      'members' => array(),
      'group' => array()
    );
    while($row = $this->members->getResult()){
      // echo "<pre>";
      // print_r($row);
      // echo "</pre>";
      array_push($data['members'], $row);
    }
    while($row = $this->group->getResult()){
      array_push($data['group'], $row);
    }
    $this->members->close();
    $this->group->close();

    $view = new MembersView();
    $view->render($data);
  }

  
  function add($data){
    $this->members->open();
    $this->members->add($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function viewAdd(){
    $this->group->open();
    $this->group->getGroups();
    $data = array();
    while($row = $this->group->getResult()){
      array_push($data, $row);
    }

    $this->group->close();
    $view = new MembersAddView();
    $view->render($data);
  }

  function viewEdit($id){
    $this->members->open();
    $this->members->getMembersByID($id);
    $data = array();
    
    array_push($data, $this->members->getResult());


    $this->members->close();
    $this->group->open();
    $this->group->getGroups();
    $dataGrup = array();
    while($row = $this->group->getResult()){
      array_push($dataGrup, $row);
    }

    $this->group->close();

    $view = new MembersEditView();
    $view->render($data, $dataGrup);
  }

  function edit($data){
    $this->members->open();
    $this->members->edit($data);
    $this->members->close();

    header("location:index.php");
  }

  function delete($id){
    $this->members->open();
    $this->members->delete($id);
    $this->members->close();

    header("location:index.php");
  }

}