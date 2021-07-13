<?php
require_once('pdo_connect.php');
class Database extends Connect
{
    public function insert($fname, $lname, $email, $phone)
    {
        $sql = "INSERT INTO oopcrud (first_name, last_name, email, phone) VALUES (:fname, :lname, :email, :phone)";
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone

        ]);
        return true;
    }



    //fetching all the data from database


    public function read()
    {
        $sql = "SELECT * FROM oopcrud WHERE deleted_at IS NULL ORDER BY id DESC";
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute();
        $result = $stmnt->fetchAll();
        return $result;
    }



    // fetching single user from database

    public function readOne($id)
    {
        $sql = "SELECT * FROM oopcrud WHERE id = :id";
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute(['id' => $id]);
        $result = $stmnt->fetch();
        return $result;
    }



    //update single user in database

    public function update($id, $fname, $lname, $email, $phone)
    {
        $sql = "UPDATE oopcrud SET first_name = :fname, last_name = :lname, email = :email, phone = :phone WHERE id = :id";
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone,
            'id' => $id
        ]);
        return true;
    }


    //soft delete user in database


    public function delete($id)
    {
        $deleted_at = date('Y-m-d H-i-s');
        $sql = "UPDATE oopcrud SET deleted_at = :deleted_at WHERE id = :id";
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute([
            'id' => $id,
            'deleted_at' => $deleted_at
        ]);

        return true;
    }
}
