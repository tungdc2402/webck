<?php
// model/CategoryModel.php
include_once("connect.php");

class CategoryModel {
    public function getAll(){
        include("connect.php");
        $sql = "SELECT * FROM categories ORDER BY IDCategory DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function insert($name){
        include("connect.php");
        $name = mysqli_real_escape_string($conn, $name);
        $sql = "INSERT INTO categories (NameCategory) VALUES ('$name')";
        return mysqli_query($conn, $sql);
    }

    public function update($id, $name){
        include("connect.php");
        $name = mysqli_real_escape_string($conn, $name);
        $id = (int)$id;
        $sql = "UPDATE categories SET NameCategory='$name' WHERE IDCategory='$id'";
        return mysqli_query($conn, $sql);
    }

    public function delete($id){
        include("connect.php");
        $id = (int)$id;
        $sql = "DELETE FROM categories WHERE IDCategory='$id'";
        return mysqli_query($conn, $sql);
    }

    public function getById($id){
        include("connect.php");
        $id = (int)$id;
        $sql = "SELECT * FROM categories WHERE IDCategory='$id'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_array($result);
    }
}
?>