<?php  
session_start();

# check if username & password  submitted
if(isset($_POST['email']) &&
   isset($_POST['password'])){

   # database connection file
   include 'connect.php';
   
   # get data from POST request and store them in var
   $password = md5($_POST['password']);
   $email = $_POST['email'];
   
   #simple form Validation
   if(empty($email)){
      # error message
      $em = "Bạn chưa nhập email";

      # redirect to 'index.php' and passing error message
      header("Location: login.php?error=$em");
   }else if(empty($password)){
      # error message
      $em = "Bạn chưa nhập mật khẩu";

      # redirect to 'login.php' and passing error message
      header("Location: login.php?error=$em");
   }else {
      $sql  = "SELECT * FROM 
               users WHERE email=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$email]);

      # if the email is exist
      if($stmt->rowCount() === 1){
        # fetching email data
        $mail = $stmt->fetch();

        # if both email are strictly equal
        if ($mail['email'] === $email) {
           
           # verifying the encrypted password
          if (md5($password, $mail['password'])) {           
            # successfully logged in
            # creating the SESSION
            $_SESSION['email'] = $mail['email'];
            $_SESSION['name'] = $mail['name'];
            $_SESSION['user_id'] = $mail['user_id'];
            $_SESSION['type'] = $mail['type'];
            if($_SESSION['type']==1)
            {            
                header("location:admin");
            }
            else{
                header("Location: users");
            }
        }
        
        }
        else {
          # error message
          $em = "Bạn nhập sai tài khoản hoặc mật khẩu";

          # redirect to 'index.php' and passing error message
          header("Location: login.php?error=$em");
        }
      }
   }
}