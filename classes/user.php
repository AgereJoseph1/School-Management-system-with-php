<?php

error_reporting(0);
session_start();
class User{

    public function login($type, $s_id, $password){
        require 'connect.php';
        
        switch ($type) {
            case 'director':
                $query ="SELECT * FROM directors where staff_id='$s_id' and password = '$password' ";
                $result = $sonawap->query($query) or die($sonawap->error.__LINE__);
                $getUser2 = $result->num_rows;
                if ($getUser2 < 1) {
                    header("Location: login.php?error=Authentication failed");
                }else{
                    if($row=mysqli_fetch_array($result)){
                        $_SESSION['user_id']=$row["id"];
                        $_SESSION['type']=$row["type"];
                        header("Location: dashboard.php");
                    }		
                    else{
                        header("Location: login.php?error=Authentication failed");
                    }  
                }
                    
                break;

            case 'student':
                $query ="SELECT * FROM students where matric='$s_id' and password = '$password' ";
                $result = $sonawap->query($query) or die($sonawap->error.__LINE__);
                $getUser2 = $result->num_rows;
                if ($getUser2 < 1) {
                    header("Location: login.php?error=Authentication failed");
                }else{
                    if($row=mysqli_fetch_array($result)){
                        $_SESSION['user_id']=$row["id"];
                        $_SESSION['type']=$row["type"];
                        header("Location: dashboard.php");
                    }		
                    else{
                        header("Location: login.php?error=Authentication failed");
                    }  
                }
                    
                break;

            case 'webmaster':
                $query ="SELECT * FROM webmasters where staff_id='$s_id' and password = '$password' ";
                $result = $sonawap->query($query) or die($sonawap->error.__LINE__);
                $getUser2 = $result->num_rows;
                if ($getUser2 < 1) {
                    header("Location: login.php?error=Authentication failed");
                }else{
                    if($row=mysqli_fetch_array($result)){
                        $_SESSION['user_id']=$row["id"];
                        $_SESSION['type']=$row["type"];
                        header("Location: dashboard.php");
                    }		
                    else{
                        header("Location: login.php?error=Authentication failed");
                    }  
                }
                    
                break;
            
            default:
                header("Location: login.php?error=Authentication failed");
                break;
        }   

        
    }
    public function logout(){
        session_destroy();
        header("Location: login.php");
        exit();
    }

    public function getInfo($table, $id){
        require 'connect.php';
        switch ($table) {
            case 'director':
                $query = "SELECT * FROM directors where id=$id";
                $result = $sonawap->query($query) or die($sonawap->error.__LINE__);
                return $rows = mysqli_fetch_array($result);
                break;
            
            case 'student':
                $query = "SELECT * FROM students where id=$id";
                $result = $sonawap->query($query) or die($sonawap->error.__LINE__);
                return $rows = mysqli_fetch_array($result);
                break;
            case 'webmaster':
                $query = "SELECT * FROM webmasters where id=$id";
                $result = $sonawap->query($query) or die($sonawap->error.__LINE__);
                return $rows = mysqli_fetch_array($result);
                break;
            
            default:
                return null;
                break;
        }
        
    }
}

$user = new User();