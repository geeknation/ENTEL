<?php
session_start();
require_once ("EntelDB.php");

class EntelAuth extends EntelDB {
	//one minute
	private $loginDuration = "1 minute";
	public $loginQuery = "SELECT userId,username,password FROM login WHERE username=? AND password=?";
	//the page to redirect once the login has failed
	private $failLoginRedir;
	//the page to redirect once the login has succeeded.
	private $loginpassRedir;
	static $conn;

	//constructor takes two parameters, Login fail Page url[$failRedir] and Login pass url[$loginpassRedir]
	public function __construct($failRedir, $loginpassRedir) {
		//instantiate a database.
		$db = new EntelDB("test", "root", "");
		$this -> conn = $db -> conn;
		$this -> failLoginRedir = $failRedir;
		$this -> loginpassRedir = $loginpassRedir;
	}

	//function to login the user.
	function login($username, $password, $ajax = TRUE) {
		$_SESSION['user_allow'] = FALSE;
		$_SESSION['user'] = '';
		$_SESSION['userId'] = '';
		$_SESSION['loggedInTime'] = '';
		$_SESSION['SessionExpires'] = '';
		$query = $this -> loginQuery;

		$stmt = $this -> conn -> prepare($query);
		$Qdata = array($username, $password);
		$stmt -> execute($Qdata);
		$feedback = '';

		if ($stmt -> rowCount() == 0 or $stmt -> rowCount() == null) {
			$_SESSION['user_allow'] = FALSE;
			if ($ajax) {
				$feedback = array("login" => "fail", "message" => "Login Failed, Enter correct Username/Password");
				echo json_encode($feedback);
			} else {
				header("Location:" . $this -> failLoginRedir);
			}

		} else {
			$userDB = '';
			$userID = '';
			while ($rows = $stmt -> fetch()) {
				$userDB = $rows['username'];
				$userID = $rows['userId'];
			}
			//set sessions
			$_SESSION['user_allow'] = TRUE;
			$_SESSION['user'] = $userDB;
			$_SESSION['userId'] = $userID;
			$_SESSION['loggedInTime'] = time();
			$_SESSION['SessionExpires'] = $this -> setSessionExpiry();
			if ($ajax) {
				$feedback = array("login" => "success", "message" => "Login successful");
				echo json_encode($feedback);
			} else {
				header("Location:" . $this -> loginpassRedir);
			}

		}

		// $this->logout("EntelUI.php");
	}

	function logout() {
		if (isset($_SESSION['user_allow']) and isset($_SESSION['user']) and isset($_SESSION['userId'])) {
			session_unset();
			session_destroy();
			header("Location:" . $this -> failLoginRedir);
		} else {
			header("Location:" . $this -> failLoginRedir);
		}
	}

	function checkSession() {
		if (!isset($_SESSION['user_allow']) and !isset($_SESSION['user']) and !isset($_SESSION['userId'])) {
			//CHECK IF ITS THE LOGIN PAGE
			$fURI = $_SERVER['REQUEST_URI'];
			$sNAME = $_SERVER['SERVER_NAME'];
			$URL = $sNAME . $fURI;
			$exp = explode("/", $URL);
			$currentPage = "" . end($exp);

			if ($this -> failLoginRedir != $currentPage) {
				header("location:" . $this -> failLoginRedir . "?redir=" . $_SERVER['SERVER_NAME'] . "/" . $redirectUrl);
			}

		} else {
			$fURI = $_SERVER['REQUEST_URI'];
			$sNAME = $_SERVER['SERVER_NAME'];
			$URL = $sNAME . $fURI;
			$exp = explode("/", $URL);
			$currentPage = "" . end($exp);

			$passloginpage = $this -> loginpassRedir;
			if ($currentPage != $passloginpage) {
				header("Location:" . $this -> loginpassRedir);

			}

		}

	}

	//check if the user session has expired
	function checkSessionExpiry() {
		$expirytime = $_SESSION['SessionExpires'];

		if (time()>=$expirytime) {
			$this -> logout();
		}


	}

	//set the time the session of the user expires.
	function setSessionExpiry() {
		$duration = 1 * 60;
		$expires = time() + $duration;
		return $expires;
	}

	//always update the time session will expire upon user activity
	function updateSessionExpiry() {
		$expirytime = $this -> setSessionExpiry();
		$_SESSION['SessionExpiry'] = $expirytime;
		return true;
	}

	//check how long the user has been logged in.
	function checkLoginDuration() {
		$loggedInTime = $_SESSION['loggedInTime'];
		$time = time();
		$loginduration = $this -> getLoginDuration($loggedInTime, $time);
		return $loginduration;
	}

	function getLoginDuration($time1, $time2, $precision = 6) {
		//check how long the user has been logged in.
		$loggedIn = $_SESSION['loggedInTime'];
		$time = time();

		if (!is_int($time1)) {
			$time1 = strtotime($time1);
		}
		if (!is_int($time2)) {
			$time2 = strtotime($time2);
		}

		// If time1 is bigger than time2
		// Then swap time1 and time2
		if ($time1 > $time2) {
			$ttime = $time1;
			$time1 = $time2;
			$time2 = $ttime;
		}

		// Set up intervals and diffs arrays
		$intervals = array('year', 'month', 'day', 'hour', 'minute', 'second');
		$diffs = array();

		// Loop thru all intervals
		foreach ($intervals as $interval) {
			// Create temp time from time1 and interval
			$ttime = strtotime('+1 ' . $interval, $time1);
			// Set initial values
			$add = 1;
			$looped = 0;
			// Loop until temp time is smaller than time2
			while ($time2 >= $ttime) {
				// Create new temp time from time1 and interval
				$add++;
				$ttime = strtotime("+" . $add . " " . $interval, $time1);
				$looped++;
			}

			$time1 = strtotime("+" . $looped . " " . $interval, $time1);
			$diffs[$interval] = $looped;
		}

		$count = 0;
		$times = array();
		// Loop thru all diffs
		foreach ($diffs as $interval => $value) {
			// Break if we have needed precission
			if ($count >= $precision) {
				break;
			}
			// Add value and interval
			// if value is bigger than 0
			if ($value > 0) {
				// Add s if value is not 1
				if ($value != 1) {
					$interval .= "s";
				}
				// Add value and interval to times array
				$times[] = $value . " " . $interval;
				$count++;
			}
		}

		// Return string with times
		return implode(", ", $times);
	}
	
	function displayUserNavbar()
	{
		
	}
}
?>