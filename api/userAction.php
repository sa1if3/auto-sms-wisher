<?php
//load and initialize database class
require_once 'db.class.php';
$db = new DB();

$tblName = 'customer_no';
//to reuse code $_POST['id'] is phone no and $_POST['uid'] is user id
if(($_POST['action'] == 'edit') && !empty($_POST['id'])){
    //update data
    $userData = array(
        'name' => $_POST['name'],
        'dob' => $_POST['dob'],
        'phone_no' => $_POST['phone_no']
    );
    $condition = array('phone_no' => $_POST['id'],'id' => $_POST['uid']);
    $update = $db->update($tblName, $userData, $condition);
    if($update){
        $returnData = array(
            'status' => 'ok',
            'msg' => 'User data has been updated successfully.',
            'data' => $userData
        );
    }else{
        $returnData = array(
            'status' => 'error',
            'msg' => 'Some problem occurred, please try again.',
            'data' => ''
        );
    }
    
    echo json_encode($returnData);
}elseif(($_POST['action'] == 'delete') && !empty($_POST['id'])){
    //delete data
    $condition = array('phone_no' => $_POST['id'],'id' => $_POST['uid']);
    $delete = $db->delete($tblName, $condition);
    if($delete){
        $returnData = array(
            'status' => 'ok',
            'msg' => 'User data has been deleted successfully.'
        );
    }else{
        $returnData = array(
            'status' => 'error',
            'msg' => 'Some problem occurred, please try again.'
        );
    }
    
    echo json_encode($returnData);
}
die();
?>