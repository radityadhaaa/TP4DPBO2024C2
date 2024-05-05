<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMembersByID($id)
    {
        $query = "SELECT * FROM members WHERE id = $id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = date('Y-m-d'); 
        $group_id = $data['group_id'];

        $query = "INSERT INTO members (name, email, phone, join_date, group_id) VALUES ('$name', '$email', '$phone', '$join_date', '$group_id')";

        // Execute the query
        return $this->execute($query);
    }

    function edit($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = date('Y-m-d'); 
        $group_id = $data['group_id'];

        $query = "UPDATE members SET name = '$name', email = '$email', phone = '$phone', join_date = '$join_date', group_id = '$group_id' WHERE id = '$id'";

        // Execute the query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM members WHERE id = '$id'";

        // Execute the query
        return $this->execute($query);
    }
}

?>
