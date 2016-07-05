<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function Login()
{
    if(empty($_POST['username']))
    {
        $this->HandleError("UserName is empty!");
        return false;
    }
     
    if(empty($_POST['password']))
    {
        $this->HandleError("Password is empty!");
        return false;
    }
     
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
     
    if(!$this->CheckLoginInDB($username,$password))
    {
        return false;
    }
     
    session_start();
     
    $_SESSION[$this->GetLoginSessionVar()] = $username;
     
    return true;
}

