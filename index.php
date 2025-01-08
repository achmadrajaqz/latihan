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
        <br>
        <a href="add.php" class="btn btn-outline-primary">Add New User</a> 
        <div class="py-4">
            <p>Dibuat oleh Pak Raja</p>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
