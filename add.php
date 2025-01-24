<html>
<head>
	<title>Add Users</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
 
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand px-5" href="index.php">Website XI TKJ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home<span class="sr-only"></span></a>
            </li>  
            <li class="nav-item">
                <a class="nav-link" href="add.php">Add</a>
            </li>
            </ul>
        </div>
    </nav>
 
	<div class="href-target" id="input-types">
		<h1 class="text-center py-3">Add New User Form</h1>

		<form action="add.php" method="post" name="form1">
			<div class="form-group px-5">
				<label for="exampleInputName">Full Name</label>
				<input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter your full name">
			</div>

			<div class="form-group px-5">
				<label for="exampleInputEmail">Email Address</label>
				<input type="text" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter your email address">
			</div>

			<div class="form-group px-5">
				<label for="exampleInputMobile">Phone Number</label>
				<input type="text" name="mobile" class="form-control" id="exampleInputMobile" placeholder="Enter your phone number">
			</div>

			<div class="form-group px-5">
				<label for="exampleFormControlFile">Upload Your Photo</label>
				<input type="file" class="form-control-file py-2" id="exampleFormControlFile" name="foto">
			</div>

			<div class="form-group px-5">
				<input type="submit" name="Submit" value="Add" class="btn btn-outline-primary">
			</div>
			
		</form>
	</div>
	
	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$foto = $_POST['foto'];
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO users(name,email,mobile,foto) VALUES('$name','$email','$mobile','$foto')");
		
		// Show message when user added
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>