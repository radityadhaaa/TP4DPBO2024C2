<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Group.controller.php");

$group = new GroupController();
$id = $_GET['group_id'];

    $group->viewEdit($id);