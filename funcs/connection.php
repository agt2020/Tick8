<?php
/**
* FOR DB PROCCESS
*/
include 'Global_Funcs.php';
class db
{
	var $conn;
	var $message;
	function __construct()
	{
		include 'config.php';
		// Create connection
		$conn = new mysqli($db_config['db_host'], $db_config['db_username'], $db_config['db_password'], $db_config['db_name']);
		$conn->set_charset("utf8");
		// Check connection
		if ($conn->connect_error)
		{
		    $this->message = "Connection failed: " . $conn->connect_error;
		}
		else
		{
			$this->conn = $conn;
		}
	}

	public function login($username,$password)
	{
		$sql = "SELECT *
				FROM users
				WHERE deleted='0' AND status='1' AND username='".$username."' AND password='".md5($password)."'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();
		if (!empty($row['id']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	
	public function run_query($sql)
	{
		return $this->conn->query($sql); 
	}


	public function settings()
	{
		$sql = "SELECT *
				FROM settings";
		$result = $this->conn->query($sql);
		if ($result->num_rows)
		{
			$settings = array();
			while ($row = $result->fetch_assoc())
			{
				$settings[$row['name']] = $row['value'];
			}
			return $settings;
		}
		else
		{
			return array();
		}
	}

	public function GetUser($id)
	{
		if (empty($id))
			return array();
		$sql = "SELECT *
				FROM users
				WHERE id='".trim($id)."'";
		$result = $this->conn->query($sql);
		if ($result->num_rows == 1)
		{
			$row = $result->fetch_assoc();
			
			return $row;
		}
		else
		{
			return array();
		}
	}

	function Get_Word()
	{
		$word = array();
		$num_of_word = $this->settings();
		$word_per_day = $num_of_word['word_per_day'];
		$today = date('Y-m-d');

		$sql = 'SELECT id FROM days WHERE day_date="'.$today.'"';
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();
		if ($row['id'] != '')
		{
			$IDC = $row['id'];
			$sql = 'SELECT count(*) as count FROM day_word WHERE day_id="'.$IDC.'"';
			$result = $this->conn->query($sql);
			$row = $result->fetch_assoc();
			if ($row['count'] >= $word_per_day)
			{
				$word = 'Done';
			}
			else
			{
				$sql = '(SELECT word_id FROM day_word WHERE day_id="'.$IDC.'")';
				$query = 'SELECT *
						  FROM words
						  WHERE repeated < 9 AND id NOT IN '.$sql.'
						  ORDER BY RAND()
						  LIMIT 1';
				$result = $this->conn->query($query);
				$word = $result->fetch_assoc();
				if ($word == '')
				{
					$word = 'Done';
				}
			}
		}
		else
		{
			$IDC = IDC();
			$dayofweek = date('w', strtotime($date));
			$sql = 'INSERT INTO days(id, day_date, d_of_w) VALUES ("'.$IDC.'","'.$today.'","'.$dayofweek.'")';
			$this->conn->query($sql);

			$query = 'SELECT *
					  FROM words
					  WHERE repeated < 9
					  ORDER BY RAND()
					  LIMIT 1';
			$result = $this->conn->query($query);
			$word = $result->fetch_assoc();
		}
		return $word;
	}

	function Read_Word($id)
	{
		$today = date('Y-m-d');
		$sql = 'SELECT id FROM days WHERE day_date="'.$today.'"';
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();
		$sql = 'INSERT INTO day_word(day_id, word_id, status) VALUES ("'.$row['id'].'","'.$id.'","1")';
		$this->conn->query($sql);
	}
}