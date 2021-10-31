<!DOCTYPE html>
<html lang="en">
<head>
    <title>Activate</title>
    <?php include 'config/config.php'  ?>
    <?php include 'styles/styles.php'?>
    <?php include 'helpers/verify.php'?>
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form method="post" action="" class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
					Activate your Account
					</span>
                <div>
                    <?php if (!empty($msg)): ?>
                        <div class="alert <?php echo $msg_class ?>"><?php echo $msg; ?>
                        </div>
                    <?php endif; ?>
                </div>


                <?php if (empty($_GET['token'])){ ?>

                <div class="text-center p-t-46 p-b-20">

                    <a href="register.php"  class="login100-form-btn">Register</a>


                </div>
                <?php }else{ ?>
    <div class="text-center p-t-46 p-b-20">

        <a href="login.php"  class="login100-form-btn">Login</a>


    </div>
                <?php } ?>
            </form>

            <div class="login100-more" style="background-image: url('images/bg-01.jpg');">



            </div>
        </div>
    </div>
</div>


<?php include 'styles/scripts.php'?>

</body>
</html>