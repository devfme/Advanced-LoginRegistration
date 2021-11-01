<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

if(isset($_GET['action'])){
if ($_GET['action']=="resend") {
    $email = $_SESSION['lr_email'];
    $uid=$_SESSION['lr_id'];
$checkrequests=mysqli_query($conn,"select count (*) as requests from resend where user_id='$uid'");
    $rowreq=mysqli_fetch_assoc($checkrequests);
if ($rowreq['requests']>2){
    echo "<script>
alert('Reached maximum trials of Verification request.Try again later');
 window.location.href='index.php';
</script>";
}else{
    $user_token = rand(100000,999999);

    $user_registration_token = md5(rand());

    $checkstatus=mysqli_query($conn,"select * from users where email='$email' and user_id='$uid'");

    $rowres=$checkstatus->fetch_assoc();


    if ($rowres['user_active']==0){

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail = new PHPMailer(true);


        $mail->IsSMTP();
        $mail->SMTPDebug = false;
        $mail->SMTPAuth = EMAIL_SMTP_AUTH;
        $mail->SMTPSecure =EMAIL_SMTP_ENCRYPTION ;
        $mail->Host = EMAIL_SMTP_HOST;
        $mail->Port = EMAIL_SMTP_PORT; // or 587
        $mail->IsHTML(true);
        $mail->Username = EMAIL_SMTP_USERNAME;
        $mail->Password = EMAIL_SMTP_PASSWORD;

        $mail->addAddress($email);
        $output = '<p>Dear '. $_SESSION['lr_name'].',</p>';
        $output .= '<p>'.EMAIL_VERIFICATION_CONTENT.'</p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p><a href="'.EMAIL_VERIFICATION_URL.'?token=' . $user_registration_token . '&email=' . $email . '" target="_blank">
Verify</a></p><br>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please be sure to copy the entire link into your browser.
The link will expire after 24hours for security reason.</p>';

        $output.='<p>Thanks,</p>';
        $output.='<p>'.EMAIL_VERIFICATION_FROM_NAME.'</p>';
        $body = $output;
        $subject = EMAIL_VERIFICATION_SUBJECT;
        $body = $output;
        $mail->Subject= $subject;
        $mail->Body = $body;


//        $headers = array ('From' => $from, 'To' => $to,'Subject' => $subject, 'MIME-Version' => 1,
//            'Content-type' => 'text/html;charset=iso-8859-1');
        if (!$mail->send()) {
            $msg="ERROR: " . $mail->ErrorInfo;
            $msg_class="alert-danger";
        } else {



            $sql = "update users SET user_activation_hash='$user_registration_token' where user_id='$uid'";
            if (mysqli_query($conn, $sql)) {
            $res=mysqli_query($conn,"insert into resend set user_id='$uid'");
                echo"<script>
alert('Activation link sent successfully');

                                    window.location.href='index.php';

</script>";



            }else {
                $msg = "There was an Error in the database";
                $msg_class = "alert-danger";
            }
        }




    }else{
        $_SESSION['active']=$rowres['user_active'];
        echo"<script>
alert('Your account is active');
 window.location.href='index.php';
</script>";

    }


}}else{
    header("location:index.php");
}


}