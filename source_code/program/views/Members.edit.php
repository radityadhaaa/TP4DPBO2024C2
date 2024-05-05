<?php
class MembersEditView
{
    public function render($dataMember, $dataGroup)
    {
        $data = null;
        foreach ($dataMember as $val) {
            list($id, $name, $email, $phone, $join_date, $group_id) = $val;
            $data .= ' <input type="hidden" name="id" value="' . $id . '" class="form-control"> <br>

            <label> NAME: </label>
 <input type="text" name="name" value="' . $name . '" class="form-control"> <br>

 <label> EMAIL: </label>
 <input type="text" name="email" value="' . $email . '" class="form-control"> <br>

 <label> PHONE: </label>
 <input type="text" name="phone" value="' . $phone . '" class="form-control"> <br>

 <input type="hidden" name="join_date" value="' . $join_date . '" class="form-control"> <br>

 <label> GROUP: </label>
 <select name="group_id" class="form-control">';
            foreach ($dataGroup as $val) {
                list($group_id, $group_name) = $val;
                $data .= '<option value="' . $group_id . '">' . $group_name . '</option>';
            }
            $data .= '
 </select> <br>
            ';
        }
        $tpl = new Template("templates/editMember.html");
        $tpl->replace("EDIT_MEMBER", $data);
        $tpl->write();
    }
}
?>