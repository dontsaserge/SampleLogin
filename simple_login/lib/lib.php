<?php
/**
 * Created by PhpStorm.
 * User: serge
 * Date: 11/29/2017
 * Time: 8:46 AM
 */
include_once 'mysql_connect_db.php';
include_once 'createAccount.php';
$result ="";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$error = array();

	$first_name = $last_name = $email = $password = "";

	//Validate the first name

	if(empty($_POST['first_name']))
	{
		$error[]="Your first name is required";
	}else{
		$first_name = $_POST['first_name'];
	}

	//Validate the last name

	if(empty($_POST['last_name']))
	{
		$error[] = "Your last name is required";
	}else{
		$last_name = $_POST['last_name'];
	}

	//Validate the email address and its format

	if(empty($_POST['email']))
	{
		$error[] = "Your email addres is required";
	}else{
		$email = $_POST['email'];

		if(checkEmailFormat($email) == TRUE)
		{

			if ( checkAccountExist($email) == false )
			{
				$error[] = 'User already exist';
			} else {
				$email = $_POST['email'];
			}
		}else{
			$error[] = "You have entered an invalid email address ";
		}

	}

	//Validate the password
			//Validate the create password

	if(empty($_POST['create_password']))
	{
		$error[] = "Please create your password";
	}else{
		$password_create = $_POST['create_password'];
	}

			//Check if the user confirm the password created
	if(empty($_POST['confirm_password']))
	{
		$error[] = "Please confirm your password";
	}else{
		$confirm_password = $_POST['confirm_password'];
	}

	//if $_POST['create_password'] and $_POST['confirm_password'] are not empty then check
	//the equality

	if(!empty($_POST['create_password']) && !empty($_POST['confirm_password']))
	{
		if($_POST['create_password']!= $_POST['confirm_password'])
		{
			$error[] = "Your password does not match";
		}else{
			$password = $_POST['create_password'];
		}
	}

	//if there is no error
	if(empty($error))
	{
		$Account = new createAccount($first_name, $last_name, $email, $password);

		$sql = $Account->Query_Account_Create();
		$result = $Account->Query_Result();



	}
}