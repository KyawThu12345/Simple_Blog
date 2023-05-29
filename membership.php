<?php 
include_once "systemGeneration/DB_Hacker.php";
function loginUser($email,$password){
         if(emailCheck($email) && passwordCheck($password)){
            return userLogin($email,$password);
         }else{
            return "Authnication Fail";
         }
}
function registerUser($username,$email,$password){
         if(usernameCheck($username) && emailCheck($email) && passwordCheck($password)){
            return insertUser($username,$email,$password);
         }else{
            return "Fail";
         }
}
function usernameCheck($username){
         if(strlen($username)){
            $bol = preg_match('/^[\w]+$/',$username);
            return $bol;
         }else{
            return false;
         }
}
function emailCheck($email){
         if(strlen($email)){
            $bol = preg_match('/^[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,4}+$/',$email);
            return $bol;
         }else{
            return false;
         }
}
function passwordCheck($password){
        if(strlen($password) >=6){
           $bol = preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',$password);
           return $bol;
        }
        else{
            return false;
        }
}
?>