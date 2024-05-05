<?php

class Groups extends DB
{
    function getGroups()
    {
        $query = "SELECT * FROM groups";
        return $this->execute($query);
    }

    function getGroupsByID($id)
    {
        $query = "SELECT * FROM groups WHERE group_id=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['group_name'];

        $query = "INSERT INTO groups (group_name) VALUES ('$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($data)
    {
        $id = $data['group_id'];
        $name = $data['group_name'];

        $query = "UPDATE groups SET group_name = '$name' WHERE group_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM groups WHERE group_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
