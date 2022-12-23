<?php
class User extends Db
{
    public function checkLogin($username, $password)
    {
        $sql = self::$connection->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $password = md5($password); // ma hoa md5
        $sql->bind_param("ss", $username, $password);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getUserByUserId($user_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM user WHERE user_id = ?");
        $sql->bind_param("i", $user_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllUser()
    {
        $sql = self::$connection->prepare("SELECT * FROM user ORDER BY user_id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function insertUser($username, $password, $email)
    {
        $sql = self::$connection->prepare("INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `role_id`) VALUES (null, ?, MD5(?), ?, 0)");
        $sql->bind_param("sss", $username, $password, $email);
        $sql->execute(); //return an object
        $items = array();  
        return $items; //return an array
    }
}
?>
<!-- INSERT INTO `user` (`user_id`, `username`, `password`, `email`) VALUES (NULL, 'user3', MD5('user3'), 'user3@gmail.com');  -->