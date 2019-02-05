<?php

class User extends DatabaseConnection
{
    function __construct()
    {
        parent::__construct();
    }

    private function getPassword()
    {
        if(!empty($_POST['password']))
        {
            return $_POST['password'];
        }
        return false;
    }

    private function getUsers()
    {
        $sql = "SELECT * FROM users";

        $users = $this->connection()->query($sql);

        return $users;
    }

    private function verifyPassword($users, $password)
    {
        while ($row = $users->fetch_array(MYSQLI_NUM))
        {
            if (password_verify($password, $row[2]))
            {
                return $row[0];
            }
        }
        return false;
    }

    public function getUserId()
    {
        if(!$password = $this->getPassword())
        {
            return false;
        }

        $users = $this->getUsers();

        return $this->verifyPassword($users, $password);

    }

}