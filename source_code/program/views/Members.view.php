<?php

  class MembersView {
    public function render($data){
      $no = 1;
      $dataMembers = null;
      $dataGroups = null;

      // Create an associative array to map group_id to group_name
      $groupMap = array();
      foreach($data['group'] as $val){
        list($group_id, $group_name) = $val;
        $groupMap[$group_id] = $group_name;
        $dataGroups .= "<option value='".$group_id."'>".$group_name."</option>";
      }

      foreach($data['members'] as $val){
        list($id, $name, $email, $phone, $join_date, $group_id) = $val;
        $groupName = isset($groupMap[$group_id]) ? $groupMap[$group_id] : 'N/A'; // Get the group name from the map
        $dataMembers .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>" . $groupName . "</td>" . 
                "<td>
        <a href='editMembers.php?id=" . $id . "' class='btn btn-success'>Edit</a>
        <a href='index.php?id=" . $id . "' class='btn btn-danger'>Delete</a>
        </td>
        </tr>";
      }

      $tpl = new Template("templates/index.html");

      $tpl->replace("OPTION", $dataGroups);
      $tpl->replace("DATA_TABEL_MEMBERS", $dataMembers);
      $tpl->write(); 
    }
  }
?>
