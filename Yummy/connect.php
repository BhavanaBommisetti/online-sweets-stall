
<?php
$name = isset($_POST['name']) ? $_POST['name'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$review = isset($_POST['review']) ? $_POST['review'] : "";

//database connection
$conn = new mysqli('localhost','root','','test2');
if($conn->connect_error){
   die('Connection failed: ' . $conn->connect_error);
}
else{
   $stmt = $conn->prepare("INSERT INTO registration(name,email,review) VALUES(?,?,?)");
   $stmt->bind_param("sss", $name, $email, $review);
   $stmt->execute();
   echo "Registered successfully";
   $stmt->close();
   $conn->close();
   header('Location: thankyou.php');
   exit();
}
?>
