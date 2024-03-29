<?php 
    include "../config/connection.php";
    include "functions.php";
    session_start();
    authorize();
    if(isset($_POST['sendRequest']))
    {
        $serverId = $_POST['website'];
        $request = $_POST['request'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];
        $uid = $_POST['uId'];
        $errors= [];
        $fullName = $_POST['fullName'];

        $fullName2 =$firstName." ".$lastName;

        if($serverId == 0)
        {
            array_push($errors,"You must select a website!");
        }
        if($fullName != $fullName2)
        {  
            array_push($errors,"The user has been changed");
        }
        if($request == "")
        {
            array_push($errors,"Cannot have an empty request");
        }


        if(count($errors) == 0)
        {
            $insert = newRequest($serverId,$request);
            if($insert)
            {
                logActionOrError("Submitted a new Web-Dev request!");
                $_SESSION['success'][]= "Your Request has been submitted!";
                redirect("../index.php?page=web-dev");
            }
            else
            {
                logActionOrError("Couldn't submit the Web Dev Request, didn't insert into the database.", true);
                $_SESSION['error'] []= "There was an error when submitting your request!";
                redirect("../index.php?page=web-dev");
            }
        }else 
        {
            logActionOrError("There was an error with the data that was sent for the Web Dev request.", true);
            $_SESSION['error'][] = $errors;
            redirect("../index.php?page=web-dev");
        }
    }
        