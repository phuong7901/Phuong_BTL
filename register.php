<?php 
  session_start();

  if (!isset($_SESSION['email'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trang Đăng Kí</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" 
	      href="Log$RE.css">
	<link rel="icon" href="img/4990614.png">
</head>
<body class="d-flex
             justify-content-center
             align-items-center
             vh-100">
	 <div class="w-400 p-5 shadow rounded">
	 	<form method="post" 
	 	      action="processregister.php"
	 	      enctype="multipart/form-data">
	 		<div class="d-flex
	 		            justify-content-center
	 		            align-items-center
	 		            flex-column">

	 		<img src="img/tải xuống2.png" 
	 		     class="w-25">
                  <h3 class="fw-bold mb-2 text-uppercase">
	 			       Đăng Kí</h3>   
	 		</div>

	 		<?php if (isset($_GET['error'])) { ?>
	 		<div class="alert alert-warning" role="alert">
			  <?php echo htmlspecialchars($_GET['error']);?>
			</div>
			<?php } 
              
              if (isset($_GET['name'])) {
              	$name = $_GET['name'];
              }else $name = '';

              if (isset($_GET['email'])) {
              	$email = $_GET['email'];
              }else $email = '';
			?>

	 	  <div class="mb-3">
		    <label class="form-label fw-bold mb-2 text-uppercase">
		           Tên</label>
		    <input type="text"
		           name="name"
		           value="<?=$name?>" 
		           class="form-control">
		  </div>

		  <div class="mb-3">
		    <label class="form-label fw-bold mb-2 text-uppercase">
		           Email</label>
		    <input type="text" 
		           class="form-control"
		           value="<?=$email?>" 
		           name="email">
		  </div>


		  <div class="mb-3">
		    <label class="form-label fw-bold mb-2 text-uppercase">
		           Mật khẩu</label>
		    <input type="password" 
		           class="form-control"
		           name="password">
		  </div>
		  
		  <button type="submit" 
		          class="btn btn-primary">
		          Đăng kí </button>
		  <a href="login.php">Đăng nhập</a>
		</form>
	 </div>
</body>
</html>
<?php
  }else{
  	header("Location: index.php");
   	exit;
  }
 ?>