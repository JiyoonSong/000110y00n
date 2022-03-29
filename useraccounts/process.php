<?php
require_once('config.php');
?>
<?php
if(isset($_POST)){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phoneNo = $_POST['phoneNo'];
	$password = sha1($_POST['password']);

	$sql = "INSERT INTO user(firstname,lastname,email,phoneNo,password) VALUES(?,?,?,?,?)";
	$stmtinsert = $db->prepare($sql);
	$result = $stmtinsert->execute([$firstname, $lastname, $email, $phoneNo, $password]);
	if($result){
		echo 'Successfully saved.';
	}else{
		echo 'There were errors';
	}
}else{
	echo 'No data';

}
?>