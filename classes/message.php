<?php
class Message{

    public function __constuction(){
        echo "string";
    }
    public function errorMessage($errormessage){
        if(!empty($errormessage)) {
            return '<div class="alert alert-danger mb-2"><span class="fas fa-ban"></span> '.$errormessage .'</div>';    
        }
          
    }

    public function successMessage($message){
        if (!empty($message)) {
            echo '<div class="alert alert-success mb-2"><span class="icon-ok-sign"></span> '.$message .'</div>';    
        }
    }

    public function infoMessage($message){
        if (!empty($message)) {
            echo '<div class="alert alert-info mb-2"><span class="icon-envelope"></span> '.$message .'</div>';    
        }
    }


}

$Message = new Message;
