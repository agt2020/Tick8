<?php

if ($_POST['page'] == '')
{
	header('Location: home.php');
	exit;
}

include 'funcs/connection.php';
$db = new db();

if ($_POST['page'] == 'settings')
{
	$settings = $db->settings();
	if ($settings['word_per_day'] == '')
	{
		$query = 'INSERT INTO settings(name, value) VALUES ("word_per_day","'.$_POST['word_per_day'].'")';
	}
	else
	{
		$query = 'UPDATE settings SET value="'.$_POST['word_per_day'].'" WHERE name="word_per_day"';
	}
	$db->run_query($query);
	header('Location: settings.php');
	die();
}

if ($_POST['page'] == 'add')
{
	$query = 'INSERT INTO words(id, date_entered, words, synonym, trans, repeated) VALUES ("'.IDC().'","'.date('Y-m-d H:i:s').'","'.$_POST['word'].'","'.$_POST['synonym'].'","'.$_POST['trans'].'",0)';
	$db->run_query($query);
	header('Location: add.php');
	die();
}

?>