<?php
// You can hash the password in PHP to store securely in the database
$password_hash = password_hash("password123", PASSWORD_DEFAULT);
echo $password_hash;
?>
