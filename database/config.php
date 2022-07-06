<?php
include_once 'server.php';

if (isset($_POST['login'])) {
	$username = $_POST['email'];
	$password = md5($_POST['password']);
	$query = "SELECT * FROM `users` WHERE email = '$username' AND password = '$password'";
	$fetch = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$num_id = $fetch->num_rows;
	if ($num_id > 0) {
		$row = $fetch->fetch_assoc();
		$_SESSION['id'] = $row['id'];
        $_SESSION['sch_id'] = $row['sch_id'];
		$_SESSION['username'] = $row['email'];
        $_SESSION['name'] = $row['name'];
		$_SESSION['role'] = $row['role'];
		$success = 'Login successful!';
		header('Refresh: 2; URL = home.php');
	} else {
		$error = 'Query failed. Account does not exist.';
	}
}

if (isset($_POST['add-record'])){
    $sch_id = $_SESSION['sch_id'];
	$sr_no = "CN".date('ydhs');
	$guardian = $_POST['guardian'];
	$g_name = $_POST['g_name'];
	$g_grade = $_POST['g_grade'];
	$g_class = $_POST['g_class'];
	$date_issued = $_POST['date_issued'];
	$re_entry_date = $_POST['re_entry_date'];
    $manager = $_SESSION['name'];
	$query = "INSERT INTO `records` (`sch_id`, `sr_no`, `guardian`, `g_name`, `g_grade`, `g_class`, `date_issued`, `re_entry_date`, `manager`) VALUES ('$sch_id', '$sr_no', '$guardian', '$g_name', '$g_grade', '$g_class', '$date_issued', '$re_entry_date', '$manager')";
	$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
	if($insert_row){
		$success = 'Record added successfully!';
        header('Refresh: 1; URL = school-record.php');
	} else {
		$error = 'Query failed. Please try again later.';
	}
}