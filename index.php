<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>
 
<html>
    <head>    
        <title>Homepage</title>
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
    
<section>
    <div class="d-flex min-vh-100" lc-helper="background" style="background:url(https://blogger.googleusercontent.com/img/a/AVvXsEjvYU_aLab6emql5YroXL-7kxA9paGB6F02uPalDca3O-XWPXZJv8kZSvpnwDYQRH19iV5WP3mX-wvBqmgn7FckMeeWSYy9RBB2wtTzmpor3gOu_EzU5W8eA5yO3M2ScwOGxEpUBohYMmLZbiplpy3IujpB3gztzjXrN4H8ei01FL7zll5QDJTshRyWHQ=w640-h386)  center / cover no-repeat; background-color:#444; background-blend-mode: overlay;">
        <div class="align-self-center text-center text-light col-md-8 offset-md-2">
            <div class="lc-block mb-4">
                <div editable="rich">
                    <h1 class="display-1 fw-bolder">Welcome to Our Website</h1>
                </div>
            </div>

            <div class="lc-block">
                <div editable="rich">
                    <p class="lead">This website is for student data management at SMK Setiabudhi Semarang</p>

                </div>
            </div>

            <div class="lc-block">
                <svg onclick="if (!document.querySelector('body').classList.contains('livecanvas-is-editing') ) this.closest('section').nextElementSibling.scrollIntoView({ behavior: 'smooth'  });" width="4em" height="4em" viewBox="0 0 16 16" class="text-light" fill="currentColor" xmlns="http://www.w3.org/2000/svg" lc-helper="svg-icon">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"></path>
                </svg>

            </div>
        </div>
    </div>



    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</section>

<section>
        <div class="py-4">
            <img src="./logo.jpeg" alt="logo" class="mx-auto d-block">
            <h1 class="text-center">Dashboard Manajemen Users</h1><br>
        </div>
        
        <table border=1  class="table">
    
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Mobile</th>
            <th class="text-center">Email</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Update</th>
        </tr>
        <?php  
        while($user_data = mysqli_fetch_array($result)) {  
            $foto_path = "uploads/" . $user_data['foto'];
            if (file_exists($foto_path)) {
                $foto_html = "<img src='$foto_path' alt='User Photo' width='50px' height='50px'>";
            } else {
                // Gambar default jika foto tidak ditemukan
                $foto_html = "<img src='default.jpg' alt='No Photo' width='50px' height='50px'>";
            }

            echo "<tr class='text-center'>";
                echo "<td>".$user_data['name']."</td>";
                echo "<td>".$user_data['mobile']."</td>";
                echo "<td>".$user_data['email']."</td>";
                echo "<td>".$foto_html."</td>";
                echo "<td><a href='edit.php?id=$user_data[id]' class='btn btn-outline-warning'>Edit</a> | <a href='delete.php?id=$user_data[id]' class='btn btn-outline-danger'>Delete</a></td></tr>";        
        }
        ?>
        </table>
        <div class="py-2 px-5">
            <a href="add.php" class="btn btn-outline-primary">Add New User</a>
        </div> 
</section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    <footer>
        <div class="py-4 px-5">
            <p>Dibuat oleh Pak Raja</p>
        </div>
    </footer>
</html>
