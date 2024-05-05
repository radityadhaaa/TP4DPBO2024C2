<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();

if (isset($_POST['add'])) {
    $data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'join_date' => $_POST['join_date'],
        'group_id' => $_POST['group_id']
    );
    //memanggil add
    $members->add($data);
}
//mengecek apakah ada id untuk dihapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id'])) {
    //memanggil delete
    $id = $_GET['id'];
    $members->delete($id);
}
else if (isset($_POST['update'])) {
    $data = array(
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'join_date' => $_POST['join_date'],
        'group_id' => $_POST['group_id']
    );
    //memanggil edit
    $members->edit($data);
}
else{
    $members->index();
}
