<?php

class Session extends DatabaseConnection
{

    function __construct()
    {
        parent::__construct();
    }


    private function setSession($id)
    {
        $_SESSION['id'] = $id;
    }

    public function loginUser()
    {
        $myUser = new User();

        if($id = $myUser->getUserId())
        {
            $this->setSession($id);
        }
    }

    public function logout()
    {
        if(isset($_SESSION['id']))
        {
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            session_destroy();
            header("Location: index.php");
            exit;
        }

        header("Location: index.php");
        exit;
    }

}