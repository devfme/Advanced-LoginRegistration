<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

$msg = "";
$msg_class = "";



if (isset($_POST['register'])) {






    $fnames = trim($_POST['fullname'],$characters = " \n\r\t\v\0");
    $username = trim($_POST['username'],$characters = " \n\r\t\v\0");
    $email = trim($_POST['email'],$characters = " \n\r\t\v\0");
    $pwd=trim($_POST['pass'],$characters = " \n\r\t\v\0");
    $cpwd = trim($_POST['pass2'],$characters = " \n\r\t\v\0");



    $user_token = rand(100000,999999);

    $user_registration_token = md5(rand());



    if (empty(trim($_POST['fullname'],$characters = " \n\r\t\v\0")) || empty(trim($_POST['username'],$characters = " \n\r\t\v\0")|| empty($_POST['pass']) || empty(trim($_POST['email'],$characters = " \n\r\t\v\0")))) {
        $msg = "inputs can not be empty";
        $msg_class="alert-danger";
    } else{
        if(!empty($_POST["email"])) {
            $email= $_POST["email"];
            if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

                $msg='invalid email';
                $msg_class='alert-danger';
            }else{


                $sql_e = "SELECT * FROM users WHERE email='$email'";

                $res_e = mysqli_query($conn, $sql_e);

                $sql_u = "SELECT * FROM users WHERE username='$username'";

                $res_u = mysqli_query($conn, $sql_u);


                if(strlen(trim($pwd)) <6)
                {
                    $msg = "password too short";
                    $msg_class = "alert-danger";
                }else{



// check if passwords match
                    if ($pwd !== $cpwd) {
                     $msg = "The passwords do not match";
                        $msg_class = "alert-danger";
                    } elseif ($pwd == $cpwd) {

                        if (mysqli_num_rows($res_e) > 0) {
                            $msg = "Email is already associated with an account";
                            $msg_class = "alert-danger";
                        }elseif (mysqli_num_rows($res_u)>0){
                            $msg = "username is taken";
                            $msg_class = "alert-danger";
                        } else {
                            $hash = password_hash($pwd, PASSWORD_DEFAULT);


                            if (empty($error)) {

                                $mail = new PHPMailer;
                                $mail->isSMTP();
                                $mail = new PHPMailer(true);


                                $mail->IsSMTP();
                                $mail->SMTPDebug = 4;
                                $mail->SMTPAuth = EMAIL_SMTP_AUTH;
                                $mail->SMTPSecure =EMAIL_SMTP_ENCRYPTION ;
                                $mail->Host = EMAIL_SMTP_HOST;
                                $mail->Port = EMAIL_SMTP_PORT; // or 587
                                $mail->IsHTML(true);
                                $mail->Username = EMAIL_SMTP_USERNAME;
                                $mail->Password = EMAIL_SMTP_PASSWORD;

                                $mail->addAddress($email);
                                $output = '<p>Dear '. $fnames.',</p>';
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



                                $sql = "INSERT INTO users SET username='$username',fullname='$fnames',email='$email',password='$hash',user_activation_hash='$user_registration_token'";
                                if (mysqli_query($conn, $sql)) {

                                    $msg="Registered successfully";
                                    $msg_class="alert-success";


                                }else {
                                    $msg = "There was an Error in the database";
                                    $msg_class = "alert-danger";
                                }
                            }




                        }
                    }
                }

            }}}}}
?>
