<?php
include ($_SERVER['DOCUMENT_ROOT']."web-project/models/Person.php");
DEFINE("PEPPER", "jgiufjhswtigu43hg85gjfdsig");

?>
<!DOCTYPE html>
<html lang="bg-BG">
	<head>
		<meta charset="utf-8" />
		<title>Страница за регистрация в сайта</title>
	</head>
	<body>
    <?php
		
		session_start();
		$firstName = $lastName = $email = $password = $repeatPassword = $subject = $group = $stream = $graduation = "";
		if ($_SERVER["REQUEST_METHOD"] != "POST") {
			echo "Невалидна заявка!";
			echo '<a href='.$_SERVER['DOCUMENT_ROOT'].'register.php">Върнете се</a> и опитайте пак. </body></html>';
			exit;
		}
		$firstName = test_input($_POST['firstName']);
		if(!isset($_POST["firstName"]) || strlen($firstName) > 30){
			echo "Името е празно или съдържа повече от 30!";
			exit;
		}
		if(!preg_match("/^[A-Za-z-]+$/", $firstName)){
			echo "Името може да съдържа само букви и -!";
			exit;
		}
		$lastName = test_input($_POST['lastName']);
		if(!isset($_POST["lastName"]) || strlen($lastName) > 30){
			echo "Името е празно или съдържа повече от 30!";
			exit;
		}
		if(!preg_match("/^[A-Za-z-]+$/", $lastName)){
			echo "Името може да съдържа само букви и -!";
			exit;
		}
		$email = test_input($_POST['email']);
		if(!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+$/", $email)){
			echo "Email-a не е коректно зададен!";
			exit;
		}
		$password = test_input($_POST['password']);
		if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/", $password)){
			echo "Паролата трябва да съдържа поне една малка, поне една главна буква и поне една цифра!";
			exit;
		}
		$repeatPassword = test_input($_POST['repeatPassword']);
		if($password != $repeatPassword){
			echo "Паролите не съвпадат!";
			exit;
		}

		$subject = test_input($_POST["subject"]);
		if(!($subject == 'КН' || $subject == 'И'  || $subject == 'СИ' || $subject == 'ИС' || $subject == 'М' || $subject == 'СТ' ||
		$subject == 'МИ' || $subject == 'ПМ')){
			$subjectErr = "Специалността трябва да бъде една от следните опции:КН,И,СИ,ИС,М,СТ,МИ,ПМ!";
			exit;
		}

		$group = test_input($_POST['group']);
		$stream = test_input($_POST['stream']);
		$graduation = test_input($_POST['graduation']);
		$person = new Person($firstName, $lastName, $email, $password, $group, $stream, $subject, $graduation);
		$person->save();

		function test_input($data) {
			$data = trim($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>

<?php
	

	if($firstNameErr || $lastNameErr || $emailErr || $passwordErr || $repeatPasswordErr || $subjectErr){
			
		
		session_unset();
		session_destroy();
	}
?>
</html>  