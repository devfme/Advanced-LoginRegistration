<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <?php include 'config/config.php'  ?>
    <?php include 'styles/styles.php'?>
    <?php include 'helpers/register.php'?>
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form method="post" action="" class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Create an account
					</span>
                <div>
                    <?php if (!empty($msg)): ?>
                        <div class="alert <?php echo $msg_class ?>"><?php echo $msg; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="wrap-input100">
                    <input class="input100" value="<?= $_POST['fullname'] ?? ''; ?>" type="text" name="fullname">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Full name</span>
                    <div id="uname_response" ></div>
                </div>
                <div class="wrap-input100">
                    <input class="input100" type="text" value="<?= $_POST['username'] ?? ''; ?>" name="username">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Username</span>
                    <div id="uname_response" ></div>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" value="<?= $_POST['email'] ?? ''; ?>" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="pass" id="pass">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Confirm Password is required">
                    <input class="input100" type="password" name="pass2" id="pass2">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Confirm Password</span>
                </div>

                <input type="checkbox" onclick="showpassword()">
                               Show password




                <div class="text-center p-t-46 p-b-20">

                    <input type="submit" value="Register" name="register" class="login100-form-btn">


                </div>
                <div class="flex-sb-m w-full p-t-3 p-b-32">

                    <div class="float-right">
                        <a href="login.php" class="txt1">
                            Already have an account?
                        </a>
                    </div>
                </div>

            </form>

            <div class="login100-more" style="background-image: url('images/bg-01.jpg');">
            </div>
        </div>
    </div>
</div>


<?php include 'styles/scripts.php'?>
<script>
    function showpassword() {
        var x = document.getElementById("pass");
        var y= document.getElementById("pass2")
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
</script>
</body>
</html>