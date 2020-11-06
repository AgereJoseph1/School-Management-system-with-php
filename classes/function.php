<?php
if(isset($_POST['function2call']) && !empty($_POST['function2call'])) {
    $function2call = $_POST['function2call'];
    switch($function2call) {
        case 'addWebmaster' : 
            addWebmaster();
            break;
        case 'editWebmaster' : 
            editWebmaster();
            break;
        case 'addStudent' : 
            addStudent();
            break;
        case 'editStudent' : 
            editStudent();
            break;
        case 'editProfile' : 
            editProfile();
            break;
        
    }
}


function addWebmaster(){
    $dateposted = date('Y-m-d');
    $name =  $_REQUEST['name'];
    $role = $_POST['role'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $staff_id = "ICT".rand(133,2999);

    $field = array("staff_id","type","department","name","role","password","dateposted");
    $value = array($staff_id,'webmaster',$department,$name,$role,$password,$dateposted);
    $insert = insert($field, $value, "webmasters");

    if($insert){
        $result = array('response' => 'success');
        echo json_encode($result);
    }
}

function addStudent(){
    $dateposted = date('Y-m-d');
    $name =  $_REQUEST['name'];
    $yEnter = $_POST['yEnter'];
    $yLeave = $_POST['yLeave'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $matirc = "STU".rand(133,2999);

    $field = array("matric","name","department","year_enter","year_leave","password","dateposted", "type");
    $value = array($matirc,$name,$department,$yEnter,$yLeave,$password,$dateposted,'student');
    $insert = insert($field, $value, "students");

    if($insert){
        $result = array('response' => 'success');
        echo json_encode($result);
    }
}

function editWebmaster(){
    require 'connect.php';
    $dateposted = date('Y-m-d');
    $name =  $_REQUEST['name'];
    $role = $_POST['role'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $sql = "UPDATE webmasters SET name = '$name', department = '$department', role = '$role', password = '$password', dateposted = '$dateposted'   where id = $id ";
    $update = $sonawap->query($sql);
    if($update){
        $result = array('response' => 'success');
        echo json_encode($result);
    }
}

function editStudent(){
    require 'connect.php';
    $dateposted = date('Y-m-d');
    $name =  $_REQUEST['name'];
    $yEnter = $_POST['yEnter'];
    $yLeave = $_POST['yLeave'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $sql = "UPDATE students SET name = '$name', department = '$department', password = '$password',year_enter = '$yEnter',year_leave = '$yLeave', password = '$password', dateposted = '$dateposted'   where id = $id ";

    $update = $sonawap->query($sql);
    if($update){
        $result = array('response' => 'success');
        echo json_encode($result);
    }
}

function editProfile(){
    require 'connect.php';
    $dateposted = date('Y-m-d');
    $name =  $_REQUEST['name'];
    $yEnter = $_POST['yEnter'];
    $yLeave = $_POST['yLeave'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $sql = "UPDATE students SET name = '$name', department = '$department', password = '$password',year_enter = '$yEnter',year_leave = '$yLeave', password = '$password', dateposted = '$dateposted'   where id = $id ";

    $update = $sonawap->query($sql);
    if($update){
        $result = array('response' => 'success');
        echo json_encode($result);
    }
}


function insert($field =array(), $value =array(), $table){
    ///Connect to network
    require 'connect.php';
    //set parameters and bind values
    $implodefield = implode(",", $field);
    $implodevalue = "'".implode("','", $value)."'";
    //insert records
    $insert ="INSERT INTO $table ($implodefield) VALUES ($implodevalue)";
    //execute query
    $run = $sonawap->query($insert) or die($sonawap->error.__LINE__);
    if ($run) {
        //end connection with network
        $sonawap->close();
        return true;
    }else{
        return false;
    }
}

function getWebmasters(){
    require_once('connect.php');
    $order = $sonawap->query("SELECT * FROM webmasters") or die($sonawap->error.__LINE__);
    return $order;
}

