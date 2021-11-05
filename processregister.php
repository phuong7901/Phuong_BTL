<?php  

# check if username, password, name submitted
if(isset($_POST['email']) &&
   isset($_POST['password']) &&
   isset($_POST['name'])){

   # database connection file
   include 'connect.php';
   
   # get data from POST request and store them in var
   $name = $_POST['name'];
   $password = md5($_POST['password']);
   $email = $_POST['email'];

   # making URL data format
   $data = 'name='.$name.'&email='.$email;

   #simple form Validation
   if (empty($name)) {
   	  # error message
   	  $em = "Bạn chưa nhập tên";

   	  # redirect to 'signup.php' and passing error message
   	  header("Location: login.php?error=$em");
   	  exit;
   }else if(empty($email)){
      # error message
   	  $em = "Bạn chưa nhập Email";

   	  /*
    	redirect to 'signup.php' and 
    	passing error message and data
      */
   	  header("Location: login.php?error=$em&$data");
   	  exit;
   }else if(empty($password)){
   	  # error message
   	  $em = "Bạn chưa nhập mật khẩu";

   	  /*
    	redirect to 'signup.php' and 
    	passing error message and data
      */
   	  header("Location: login.php?error=$em&$data");
   	  exit;
   }else {
   	  # checking the database if the username is taken
   	  $sql = "SELECT email 
   	          FROM users
   	          WHERE email=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$email]);

      if($stmt->rowCount() > 0){
      	$em = "Email ($email) của bạn đã có người sử dụng";
      	header("Location: login.php?error=$em&$data");
   	    exit;
      }else {
            # inserting data into database
         $sql = "INSERT INTO users
        (name, email, password)
        VALUES (?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $email, $password]);
      }
        

      	// md5 pass
      	$password = md5($password, PASSWORD_DEFAULT);
      	# success message
      	$sm = "Bạn đã đăng kí thành công";

      	# redirect to 'index.php' and passing success message
      	header("Location: login.php?success=$sm");
     	exit;
      }

   }
else {
	header("Location: register.php");
   	exit;
}