<?php
  class GroupView{
    public function render($data){
      $no = 1;
      $dataGroup = null;
      foreach($data as $val){
        list($group_id, $group_name) = $val;
        $dataGroup .= "<tr>
        <td>" . $no++ . "</td>
        <td>" . $group_name . "</td>
        <td>
        <a href='editGroup.php?group_id=" . $group_id . "' class='btn btn-success'>Edit</a>
        <a href='group.php?group_id=" . $group_id . "' class='btn btn-danger'>Delete</a>
        </td>
        </tr>";
      }

      $tpl = new Template("templates/group.html");
      $tpl->replace("DATA_TABEL_GROUP", $dataGroup);
      $tpl->write();
    }
  }

?>
