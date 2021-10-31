<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
    <?php
    include 'config/config.php';
    include 'helpers/auth.php';
    include 'styles/styles.php';?>

</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" action="" class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
                    <div>
                        <?php if (!empty($msg)): ?>
                            <div class="alert <?php echo $msg_class ?>"><?php echo $msg; ?>
                            </div>
                        <?php endif; ?>
                    </div>
					
					<div class="wrap-input100 validate-input">
						<input class="input100" value="<?= $_POST['usemail'] ?? ''; ?>" type="text" name="usemail">
						<span class="focus-input100"></span>
						<span class="label-input100">Username or Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" id="pass" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">


						<div>
                            <input type="checkbox" onclick="showpassword()">
                            Show password
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<input type="submit" value="Login" name="login" class="login100-form-btn">

					</div>

					<div class="text-center p-t-46 p-b-20">
						<span class="txt4">
							or
						</span>

					</div>
                    <div class="text-center p-t-46 p-b-20">

                        <a type="button" href="register.php" class="login100-form-btn">
                            Register
                        </a>
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

            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

        }
    </script>
</body>
</html>