<?php
if ($_POST['username'] == 'admin' && $_POST['username'] != '')
{
	header('Location: page.htm');
	exit;
}
else
{
	header('Location: Tick8');
	exit;
}
?>