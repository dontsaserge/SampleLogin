<?php
/**
 * Created by PhpStorm.
 * User: serge
 * Date: 11/29/2017
 * Time: 8:11 AM
 */
include_once 'mysql_connect_db.php';

class createAccount
{
	protected $_firstName;           //hold the value of the first name
	protected $_lastName;            //hold the value of the last name
    protected $_email;               //hold the value of the email address
	protected $_password;            //hold the value of the password
	private $_dbc;                 //hold the database connection
	private $_sql;

	public function __construct($fname, $lname, $email, $pass)
	{
		$this->_firstName = $fname;
		$this->_lastName = $lname;
		$this->_email = $email;
		$this->_password = $this->EncryptePass($pass);
								//Defining the database connecition

		$database = new mysql_connect_db('localhost', 'root', '', 'simpledb');

		$this->_dbc = $database->dbConnect();
	}


	//setter function to set the value of every variable



	public function setFirstName($fname)
	{
		$this->_firstName = $this->input_test($fname);
	}
	public function setLastName($lname)
	{
		$this->_lastName = $this->input_test($lname);
	}
	public function setEmail($email)
	{
		$this->_email = $this->input_test($email);
	}
	public function setPassword($pass)
	{
		$this->_password = $this->EncryptePass($pass);
	}

	//getter function

	public function getFirstName()
	{
		return $this->_firstName;
	}

	public function getLastName()
	{
		return $this->_lastName;
	}
	public function getEmail()
	{
		return $this->_email;
	}
	public function getPassword()
	{
		return $this->_password;
	}
				//a private function that encrypte the passowrd;

	private function EncryptePass($pass)
	{
		return password_hash($pass, PASSWORD_DEFAULT);
	}

	private function input_test($data)
	{
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripslashes($data);

		return $data;
	}


	public function Query_Account_Create()
	{
		$this->_sql = "INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email_address`, `password`, `registration_date`, `user_level`) VALUES 
			(NULL, '$this->_firstName', '$this->_lastName', '$this->_email', '$this->_password', NOW(), '0')";


		return $this->_sql;
	}

				//function that return the result to $this->_sql
	public function Query_Result()
	{
		return mysqli_query($this->_dbc, $this->_sql);
	}

}


			//function that check the existing of the user
			//checkAccountExist() return true if the user doesn't exist if else it returns true

function checkAccountExist($email)
{
			//create a database connection
	$database = new mysql_connect_db('localhost', 'root', '', 'simpledb');

	$dbconn = $database->dbConnect();

	$sql = "SELECT * FROM users WHERE email_address ='$email' ";

	$result = mysqli_query($dbconn, $sql);

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	//Count the number of row
	$numRow = mysqli_num_rows($result);

	if($numRow>0)
	{
		return false;
	}else {
		return true;
	}
}

			//function that check the validity of the email
			//if the email is an invalid formait it return false else return true
function checkEmailFormat($email)
{
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		return FALSE;
	}else{
		return TRUE;
	}
}