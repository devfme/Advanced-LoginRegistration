<?php

$msg="";
$msg_class="";
if(isset($_GET['token']))
{
    $usertoken=$_GET['token'];
    $user=$_GET['email'];
    $query = "SELECT * FROM users WHERE user_activation_hash='$usertoken' and email ='$user'";
    $res_e = mysqli_query($conn, $query);


    if(mysqli_num_rows($res_e) > 0)
    {

        $row = $res_e->fetch_array(MYSQLI_ASSOC);
        {
            if($row['user_active'] == '0')
            {
                $update_query = "UPDATE users SET user_active = '1'  WHERE  user_id = '".$row['user_id']."'";
                $res_up = mysqli_query($conn, $update_query);


                if(isset($res_up))
                {
                    $msg = 'Account verified';
                    $msg_class='alert-success';
                }
            }
            else
            {
                $msg = 'Account Already Verified';
                $msg_class='alert-info';
            }
        }
    }
    else
    {
        $msg = 'Invalid Link';
        $msg_class='alert-danger';

    }
}else{
    $msg="Create an account to activate";
    $msg_class="alert-warning";
}

?>