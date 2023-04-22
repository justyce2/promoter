<?php include_once '../auth/startup.php';
$f = filter_input(INPUT_POST, 'f', FILTER_SANITIZE_STRING);
$e = filter_input(INPUT_POST, 'e', FILTER_SANITIZE_STRING);
$bank_name = filter_input(INPUT_POST, 'bank_name', FILTER_SANITIZE_STRING);
$account_name = filter_input(INPUT_POST, 'account_name', FILTER_SANITIZE_STRING);
$account_number = filter_input(INPUT_POST, 'account_number', FILTER_SANITIZE_STRING);
//update the values
$update_one = $mysqli->prepare("UPDATE ap_members SET fullname = ?, email = ?, bank_name = ?, account_name = ?, account_number = ? WHERE id=$owner"); 
$update_one->bind_param('sssss', $f, $e, $bank_name, $account_name, $account_number);
$update_one->execute();
$update_one->close();
	
$mysqli->close();
header('Location: ../profile');
?>