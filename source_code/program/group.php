<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Group.controller.php");

$groups = new GroupController();

if (isset($_POST['add'])) {
    $data = array(
        'group_name' => $_POST['group_name']
    );
    //memanggil add
    $groups->add($data);
}
//mengecek apakah ada group_id untuk dihapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['group_id'])) {
    //memanggil delete
    $id = $_GET['group_id'];
    $groups->delete($id);
}
else if (isset($_POST['update'])) {
    $data = array(
        'group_id' => $_POST['group_id'],
        'group_name' => $_POST['group_name']
    );
    //memanggil edit
    $groups->edit($data);
}
else{
    $groups->index();
}
