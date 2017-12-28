<?php
/**
 * Created by PhpStorm.
 * User: serge
 * Date: 11/30/2017
 * Time: 10:24 AM
 */

include_once 'mysql_connect_db.php';

			//function login take two parameter email addres and the password
function login($email, $password)
{
	$database = new mysql_connect_db('localhost', 'root', '', 'simpledb');

	$dbconn = $database->dbConnect();

				//The query to select the data from the table users
	$sql ="SELECT * FROM users WHERE email_address='$email'";

	$result = mysqli_query($dbconn, $sql);

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

				//call the function VerifyPassword to check if the password is valid
	if(VerifyPassword($password, $row['password']) == TRUE)
	{
		echo '<h3 class="text-info">You are now login</h3>';
		echo '<hr>';
		$_SESSION['first_name'] = $row['first_name'];
		$_SESSION['last_name'] = $row['last_name'];
		$_SESSION['email'] = $row['email_address'];
		$_SESSION['registration_date']= $row['registration_date'];

		echo 'First Name: <b>'.$_SESSION['first_name'].'</b>,<br>';
		echo 'Last Name: <b>'.$_SESSION['last_name'].'</b>, <br>';
		echo 'Email Address: <b>'.$_SESSION['email'].'</b>,<br>';
		echo 'Registration Date:<b> '.$_SESSION['registration_date'].'</b>,<br>';
	}else{
		echo 'The email and/or password are/is incorrect';
	}
}
				//Write the function that check the password and return true if the passwrod match else return false
function VerifyPassword($input, $rowPasswowrd)
{
	if(password_verify($input, $rowPasswowrd) == TRUE)
	{
		return TRUE;
	}else{
		return FALSE;
	}
}
				//Write the function that check the validity of the email address
function checkEmailFormat($email)
{
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		return FALSE;
	}else{
		return TRUE;
	}
}