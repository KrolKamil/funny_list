<?php

class Quests extends DatabaseConnection
{
    function __construct()
    {
        parent::__construct();
    }

    //-------------CREATING NEW QUEST-------------

    private function getData()
    {
        if(!empty($_POST['data']))
        {
            return $_POST['data'];
        }
        return false;
    }

    private function getMark()
    {
        if(!empty($_POST['mark']))
        {
            return $_POST['mark'];
        }
        return false;
    }

    private function newQuest($data, $mark)
    {
        $user_id = $_SESSION['id'];

        $sql = "INSERT INTO quests VALUES('','$data','$mark', NULL )";
        $this->connection()->query($sql);

        $quest_id = $this->connection()->insert_id;

        $sql = "INSERT INTO quests_owners VALUES('','$user_id','$quest_id')";
        $this->connection()->query($sql);

        $sql = "INSERT INTO quests_status VALUES('','$quest_id',1)";
        $this->connection()->query($sql);

    }

    public function createQuest()
    {
        if(($data = $this->getData()) && ($mark = $this->getMark()))
        {

            $this->newQuest($data, $mark);

            header("Location: index.php");
            exit;

        }
    }

    //-------------SHOWING QUESTS-------------

    private function getQuestsFromDB($mark)
    {
        $sql = "SELECT quests.id, quests.content, quests_owners.user_id
                FROM quests
                INNER JOIN quests_owners
                ON quests.id=quests_owners.quest_id
                INNER JOIN quests_status
                ON quests.id=quests_status.quest_id
                INNER JOIN users
                ON quests_owners.user_id=users.id
                WHERE quests_status.enable=1 AND quests.mark='$mark'";

        $result = $this->connection()->query($sql);

        return $result;
    }

    public function showQuests($mark)
    {
        $quests = $this->getQuestsFromDB($mark);

            while($quest = $quests->fetch_array())
            {
                echo '<form action="delete.php" method="get">';
                echo '<input type="hidden" name="quest_id" value="' . $quest[0] . '">';
                echo '<button type="submit" class="btn btn-dark btn-lg btn-block">';
                echo $quest[1];
                echo '</button>';
                echo '</form> <br>';

            }
    }


    //-------------Move Quest To History-------------

    private function getQuestId()
    {
        if(!empty($_GET['quest_id']))
        {
            return $_GET['quest_id'];
        }
        return false;
    }

    private function moveQuestToHistory($quest_id)
    {
        $sql = "UPDATE quests_status SET enable = FALSE WHERE quest_id='$quest_id'";
        $this->connection()->query($sql);

        $sql = "UPDATE quests SET date = now() WHERE id = '$quest_id'";
        $this->connection()->query($sql);
    }

    public function moveQuest()
    {
        if($quest_id = $this->getQuestId())
        {
            $this->moveQuestToHistory($quest_id);
        }

        header("Location: index.php");
        exit;
    }

    //-------------Show History-------------

    private function getHistoryFromDB()
    {
        $sql = "SELECT quests.content, quests.date, users.name
                FROM quests
                INNER JOIN quests_owners
                ON quests.id = quests_owners.quest_id
                INNER JOIN users
                ON quests_owners.user_id = users.id
                INNER JOIN quests_status
                ON quests_status.quest_id = quests.id
                WHERE quests_status.enable = 0";

        $result = $this->connection()->query($sql);

        return $result;
    }

    public function showHistory()
    {
        $quests = $this->getHistoryFromDB();

        $i = 1;

        while($quest = $quests->fetch_array())
        {
            echo '<div class="alert alert-dark" role="alert">';
            echo "$i //$quest[0] // $quest[1] ";
            echo '</div>';

            $i++;
        }

    }

    //-------------Delete Quest-------------
    public function deleteQuest()
    {
        $id = $_GET['quest_id'];

        //$sql = "UPDATE quests_status SET enable = FALSE WHERE quest_id='$quest_id'";
        //$this->connection()->query($sql);

        //var_dump($id);


        /*
        $sql = "DELETE FROM quests WHERE id = '$id'";
        $this->connection()->query($sql);

        $sql = "DELETE FROM quests_owners WHERE quest_id = '$id'";
        $this->connection()->query($sql);

        $sql = "DELETE FROM quests_status WHERE quest_id = '$id'";
        $this->connection()->query($sql);
        */
    }




}