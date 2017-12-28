<?php
/**
 * Created by PhpStorm.
 * User: serge
 * Date: 11/29/2017
 * Time: 8:11 AM
 */
class mysql_connect_db
{
	private $_dbHost;               //hold the host name
	private $_dbUser;               //host the user
	private $_dbPass;               //hold the password
	private $_dbName;               //hold the database's name

	public function __construct($dbHost, $dbUser, $dbPass, $dbName)
	{
		$this->_dbHost = $dbHost;
		$this->_dbUser = $dbUser;
		$this->_dbPass = $dbPass;
		$this->_dbName = $dbName;
	}

	public function dbConnect()
	{
		return mysqli_connect($this->_dbHost, $this->_dbUser, $this->_dbPass, $this->_dbName);
	}
}