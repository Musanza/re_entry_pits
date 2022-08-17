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

if(isset($_POST['update-record'])){
	$record_id = $_POST['sr_no'];
	$guardian = $_POST['guardian'];
	$g_name = $_POST['g_name'];
	$g_grade = $_POST['g_grade'];
	$g_class = $_POST['g_class'];
	$date_issued = $_POST['date_issued'];
	$re_entry_date = $_POST['re_entry_date'];
	$manager = $_SESSION['name'];
	$query = "UPDATE `records` SET `guardian` = '$guardian', `g_name` = '$g_name', `g_grade` = '$g_grade', `g_class` = '$g_class', `date_issued` = '$date_issued', `re_entry_date` = '$re_entry_date', `manager` = '$manager' WHERE `sr_no` = '$record_id'";
	$update_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
	if($update_row){
		$success = 'Record updated successfully!';
		header('Refresh: 1; URL = school-record.php');
	} else {
		$error = 'Query failed. Please try again later.';
	}
}

if(isset($_POST['add-commitment'])){
	$sch_id = $_SESSION['sch_id'];
	$sr_no = $_POST['sr_no'];
	$date = date('Y-m-d');
	$m_name = $_POST['m_name'];
	$address = empty($_POST['address']) ? 'N/A' : $_POST['address'];
	$dob = empty($_POST['dob']) ? 'N/A' : $_POST['dob'];
	$grade = empty($_POST['grade']) ? 'N/A' : $_POST['grade'];
	$sch_name = empty($_POST['sch_name']) ? 'N/A' : $_POST['sch_name'];
	$occupation = empty($_POST['occupation']) ? 'N/A' : $_POST['occupation'];
	$m_father = empty($_POST['m_father']) ? 'N/A' : $_POST['m_father'];
	$m_mother = empty($_POST['m_mother']) ? 'N/A' : $_POST['m_mother'];	
	$g_mother = empty($_POST['g_mother']) ? 'N/A' : $_POST['g_mother'];
	$g_mother_address = empty($_POST['g_mother_address']) ? 'N/A' : $_POST['g_mother_address'];
	$g_mother_occupation = empty($_POST['g_mother_occupation']) ? 'N/A' : $_POST['g_mother_occupation'];
	$g_father = empty($_POST['g_father']) ? 'N/A' : $_POST['g_father'];
	$g_father_address = empty($_POST['g_father_address']) ? 'N/A' : $_POST['g_father_address'];
	$g_father_occupation = empty($_POST['g_father_occupation']) ? 'N/A' : $_POST['g_father_occupation'];
	$actual_re_entry = empty($_POST['actual_re_entry']) ? 'N/A' : $_POST['actual_re_entry'];
	$transfered_sch = empty($_POST['transfered_sch']) ? 'N/A' : $_POST['transfered_sch'];
	$transfer_reason = empty($_POST['transfer_reason']) ? 'N/A' : $_POST['transfer_reason'];
	$m_p_address = empty($_POST['m_p_address']) ? 'N/A' : $_POST['m_p_address'];
	$other_info = empty($_POST['other_info']) ? 'N/A' : $_POST['other_info'];

	$query = "INSERT INTO `commitments` (`sch_id`, `sr_no`, `date`, `m_name`, `address`, `dob`, `grade`, `sch_name`, `occupation`, `m_father`, `m_mother`, `g_mother`, `g_mother_address`, `g_mother_occupation`, `g_father`, `g_father_address`, `g_father_occupation`, `actual_re_entry`, `transfered_sch`, `transfer_reason`, `m_p_address`, `other_info`) VALUES ('$sch_id', '$sr_no', '$date', '$m_name', '$address', '$dob', '$grade', '$sch_name', '$occupation', '$m_father', '$m_mother', '$g_mother', '$g_mother_address', '$g_mother_occupation', '$g_father', '$g_father_address', '$g_father_occupation', '$actual_re_entry', '$transfered_sch', '$transfer_reason', '$m_p_address', '$other_info')";
	$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
	if($insert_row){
		$success = 'Record added successfully!';
		header('Refresh: 2; URL = commitments.php');
	} else {
		$error = 'Query failed. Please try again later.';
	}
}

if(isset($_POST['update-commitment'])){
	$sr_no = $_POST['sr_no'];
	$date = date('Y-m-d');
	$m_name = $_POST['m_name'];
	$address = empty($_POST['address']) ? 'N/A' : $_POST['address'];
	$dob = empty($_POST['dob']) ? 'N/A' : $_POST['dob'];
	$grade = empty($_POST['grade']) ? 'N/A' : $_POST['grade'];
	$sch_name = empty($_POST['sch_name']) ? 'N/A' : $_POST['sch_name'];
	$occupation = empty($_POST['occupation']) ? 'N/A' : $_POST['occupation'];
	$m_father = empty($_POST['m_father']) ? 'N/A' : $_POST['m_father'];
	$m_mother = empty($_POST['m_mother']) ? 'N/A' : $_POST['m_mother'];	
	$g_mother = empty($_POST['g_mother']) ? 'N/A' : $_POST['g_mother'];
	$g_mother_address = empty($_POST['g_mother_address']) ? 'N/A' : $_POST['g_mother_address'];
	$g_mother_occupation = empty($_POST['g_mother_occupation']) ? 'N/A' : $_POST['g_mother_occupation'];
	$g_father = empty($_POST['g_father']) ? 'N/A' : $_POST['g_father'];
	$g_father_address = empty($_POST['g_father_address']) ? 'N/A' : $_POST['g_father_address'];
	$g_father_occupation = empty($_POST['g_father_occupation']) ? 'N/A' : $_POST['g_father_occupation'];
	$actual_re_entry = empty($_POST['actual_re_entry']) ? 'N/A' : $_POST['actual_re_entry'];
	$transfered_sch = empty($_POST['transfered_sch']) ? 'N/A' : $_POST['transfered_sch'];
	$transfer_reason = empty($_POST['transfer_reason']) ? 'N/A' : $_POST['transfer_reason'];
	$m_p_address = empty($_POST['m_p_address']) ? 'N/A' : $_POST['m_p_address'];
	$other_info = empty($_POST['other_info']) ? 'N/A' : $_POST['other_info'];
	$query = "UPDATE `commitments` SET `date` = '$date', `m_name` = '$m_name', `address` = '$address', `dob` = '$dob', `grade` = '$grade', `sch_name` = '$sch_name', `occupation` = '$occupation', `m_father` = '$m_father', `m_mother` = '$m_mother', `g_mother` = '$g_mother', `g_mother_address` = '$g_mother_address', `g_mother_occupation` = '$g_mother_occupation', `g_father` = '$g_father', `g_father_address` = '$g_father_address', `g_father_occupation` = '$g_father_occupation', `actual_re_entry` = '$actual_re_entry', `transfered_sch` = '$transfered_sch', `transfer_reason` = '$transfer_reason', `m_p_address` = '$m_p_address', `other_info` = '$other_info' WHERE `sr_no` = '$sr_no'";
	$update_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
	if($update_row){
		$success = 'Record updated successfully!';
		header('Refresh: 2; URL = commitments.php');
	} else {
		$error = 'Query failed. Please try again later.';
	}
}

if(isset($_POST['add-school'])){
	$name = ucwords($_POST['name']);
	$address = $_POST['address'];
	$district = $_POST['district'];
	$province = $_POST['province'];
	$tel = $_POST['tel'];
	$type = $_POST['type'];

	$uppercase_pro = strtoupper($province);
	$uppercase_nam = strtoupper($name);
	$sch_id = mb_substr($uppercase_pro, 0, 3, "UTF-8").'_'.mb_substr($uppercase_nam, 0, 3, "UTF-8");

	$query = "INSERT INTO `schools` (`sch_id`, `name`, `address`, `district`, `province`, `tel`, `type`) VALUES ('$sch_id', '$name', '$address', '$district', '$province', '$tel', '$type')";

	$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
	if($insert_row){
		$success = 'Record added successfully!';
		header('Refresh: 1; URL = schools.php?#schoolsTable');
	} else {
		$error = 'Query failed. Please try again later.';
	}
}

if(isset($_POST['update-school'])){
	$id = $_POST['id'];
	$name = ucwords($_POST['name']);
	$address = $_POST['address'];
	$district = $_POST['district'];
	$province = $_POST['province'];
	$tel = $_POST['tel'];
	$type = $_POST['type'];
	$query = "UPDATE `schools` SET `name` = '$name', `address` = '$address', `district` = '$district', `province` = '$province', `tel` = '$tel', `type` = '$type' WHERE `id` = '$id'";
	$update_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
	if($update_row){
		$success = 'Record updated successfully!';
		header('Refresh: 1; URL = schools.php?#schoolsTable');
	} else {
		$error = 'Query failed. Please try again later.';
	}
}

if(isset($_POST['add-user'])){
	$sch_id = $_POST['sch_id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = md5($_POST['password']);
	$role = $_POST['role'];

	$query = "INSERT INTO `users` (`sch_id`, `name`, `email`, `phone`, `password`, `role`) VALUES ('$sch_id', '$name', '$email', '$phone', '$password', '$role')";

	$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
	if($insert_row){
		$success = 'User added successfully!';
		header('Refresh: 1; URL = users.php?#usersTable');
	} else {
		$error = 'Query failed. Please try again later.';
	}
}

if(isset($_POST['update-user'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	$sql = "SELECT `password` FROM `users` WHERE `id` = '$id'";
            $select = $mysqli->query($sql) or die($mysqli->error.__LINE__);
            $data = mysqli_fetch_assoc($select);
            $pass =  $data['password'];
	$password = empty($_POST['password']) ? $pass : md5($_POST['password']);

	$role = $_POST['role'];
	$query = "UPDATE `users` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$password', `role` = '$role' WHERE `id` = '$id'";
	$update_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
	if($update_row){
		$success = 'User updated successfully!';
		header('Refresh: 1; URL = users.php?#usersTable');
	} else {
		$error = 'Query failed. Please try again later.';
	}
}

if(isset($_POST['update-profile'])){
	$id = $_POST['id'];
	$sql = "SELECT * FROM `users` WHERE `id` = '$id'";
	$select = $mysqli->query($sql) or die($mysqli->error.__LINE__);
	$data = mysqli_fetch_assoc($select);

	$name = empty($_POST['name']) ? $data['name'] : $_POST['name'];
	$email = empty($_POST['email']) ? $data['email'] : $_POST['email'];
	$phone = empty($_POST['phone']) ? $data['phone'] : $_POST['phone'];
	$password = empty($_POST['password']) ? $data['password'] : md5($_POST['password']);

	$update_query = "UPDATE `users` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$password' WHERE `id` = '$id'";
	$update_row = $mysqli->query($update_query) or die($mysqli->error.__LINE__);
	if($update_row){
		$success = 'Profile updated successfully!';
		header('Refresh: 3; URL = logout.php');
	} else {
		$error = 'Query failed. Please try again later.';
	}
}


if (isset($_POST['add-counselling'])) {
	$sr_no = $_POST['sr_no'];
	$g_counselling_sessions = $_POST['g_counselling_sessions'];
	$m_counselling_sessions = $_POST['m_counselling_sessions'];
	$p_counselling_sessions = $_POST['p_counselling_sessions'];
	$query = "UPDATE `commitments` SET `g_counselling_sessions` = '$g_counselling_sessions', `m_counselling_sessions` = '$m_counselling_sessions', `p_counselling_sessions` = '$p_counselling_sessions' WHERE `sr_no` = '$sr_no'";
	$update_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
	if($update_row){
		$success = 'Counselling sessions added successfully!';
		header('Refresh: 3; URL = commitments.php');
	} else {
		$error = 'Query failed. Please try again later.';
	}
}