
 <?php
 // Initialize variables to null.
 $nameError ="";
 $emailError ="";

  if(isset($_POST['submit'])){

    // Name validation and assign
    if (empty($_POST["name"])) {
    $nameError = "Name is required";
    } else {
    $name = $_POST["name"];
    // check name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    $nameError = "Only letters and white space allowed";
    }
    }
    //email validation and assign
    if (empty($_POST["email"])) {
    $emailError = "Email is required";
    } else {
    $email = $_POST["email"];
    // check if e-mail address syntax is valid or not
    if (!preg_match("/([w-]+@[w-]+.[w-]+)/",$email)) {
    $emailError = "Invalid email format";
    }
    }
    // Empty subject assign
    if (empty($_POST["subject"])) {
    $subject = "No subject";
    } else {
    $subject = $_POST["subject"];
    }
    // Empty comment assign
    if (empty($_POST["comment"])) {
    $comment = "No comments";
    } else {
    $comment = $_POST["comment"];
    }

 		$to=''; //The receiving email
 		$email_subject='Website Form Submission'." - ".$subject;
    $headers="MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $message="<b>Name: </b>".$name."<br><br>"."<b>Email: </b>".$email."<br><br>"."<b>Subject: </b>".$subject."<br><br>"."<b>Comment: </b>"."<br><br>".$comment;

 		if(mail($to, $email_subject, $message, $headers)){
      $successmsg = "Form submitted! Thank you for getting in touch,"." ".$name.".";
      echo "<script type='text/javascript'>alert('$successmsg');
      window.history.go(-1);
      </script>";

 		}
 		else{
      $failmsg = "Oops, something went wrong. Please try again.";
      echo "<script type='text/javascript'>alert('$failmsg');
      window.history.go(-1);
      </script>";

 		}
 	}
 ?>
