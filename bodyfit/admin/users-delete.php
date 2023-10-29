<?php

require '../config/function.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult)){

    $userId = mysqli_real_escape_string($conn, $paramResult);

    // Checking user exists or not
    $user = getById('users',$userId);
    if($user['status'] == 200){

        $response = deleteQuery('users',$userId);

        if($response){

            redirect('users.php','User Delete Successfully');
        }else{
            redirect('users.php','Something Went Wrong!');
        }
    }else{
        redirect('users.php',$user['message']);
    }

}else{
    redirect('users.php',$paramResult);
}


?>