<?php
if ($_POST['username'] == 'agt' && $_POST['username'] != '')
{
	header('Location: home.php');
	exit;
}
else
{
	header('Location: index.htm');
	exit;
}
?>