<?php


define("DB_HOST", "localhost");
define("DB_NAME", "login");
define("DB_USER", "root");
define("DB_PASS", "");

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

define("COOKIE_RUNTIME", 1209600);
define("COOKIE_DOMAIN", ".localhost");
define("COOKIE_SECRET_KEY", "1gp@ftertu656TMPS{+$78sfpMJFe-92s");


define("EMAIL_USE_SMTP", true);
define("EMAIL_SMTP_HOST", "ssl://mail.developforme.co.ke");
define("EMAIL_SMTP_AUTH", true);
define("EMAIL_SMTP_USERNAME", "advancedlr@developforme.co.ke");
define("EMAIL_SMTP_PASSWORD", "fakepassword2");
define("EMAIL_SMTP_PORT", 465);
define("EMAIL_SMTP_ENCRYPTION", "ssl");

define("EMAIL_PASSWORDRESET_URL", "http://localhost/advancedLR/password_reset.php");
define("EMAIL_PASSWORDRESET_FROM", "info@developforme.co.ke");
define("EMAIL_PASSWORDRESET_FROM_NAME", "My Project");
define("EMAIL_PASSWORDRESET_SUBJECT", "Password reset for PROJECT XY");
define("EMAIL_PASSWORDRESET_CONTENT", "Please click on this link to reset your password:");

define("EMAIL_VERIFICATION_URL", "http://localhost/advancedLR/verify.php");
define("EMAIL_VERIFICATION_FROM", "info@developforme.co.ke");
define("EMAIL_VERIFICATION_FROM_NAME", "My Project");
define("EMAIL_VERIFICATION_SUBJECT", "Account activation for PROJECT XY");
define("EMAIL_VERIFICATION_CONTENT", "Please click on this link to activate your account:");



