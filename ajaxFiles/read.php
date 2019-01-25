<?php

$result = '';

include '../funcs/connection.php';
$db = new db();

if (isset($_POST['type']) && $_POST['type'] == 'Know')
{
	$sql = 'UPDATE words SET repeated = repeated+1 WHERE id="'.$_POST['record_id'].'"';
	$db->run_query($sql);
}

if (isset($_POST['type']) && $_POST['type'] == 'Reset')
{
	$sql = 'UPDATE words SET repeated = "0" WHERE id="'.$_POST['record_id'].'"';
	$db->run_query($sql);
}

ob_clean();
echo json_encode($result);
exit();