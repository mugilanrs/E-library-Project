<?php 
include "database.php";


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Google fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,200&family=Roboto:ital,wght@0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
      <!-- Google fonts -->
          <!-- Bootstrap CSS -->
          <!-- CDN CSS -->
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <!-- STYLE CSS LINK -->
      <link rel="stylesheet" href="style.css">
      <!-- STYLE CSS LINK -->
      <!-- FONT AWESOME -->
      <script src="https://kit.fontawesome.com/62c6551fb6.js" crossorigin="anonymous"></script>
      <!-- FONT AWESOME -->
    <title>E-Library</title>
  </head>
  <body>
    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#917FB3">
        <a class="navbar-brand" href="#">E-Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">HOME</a>
              </li>
                    <a class="nav-link" href="Alogin.php">Admin</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Ulogin.php">Sign In</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Register.php">Register</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="About.php">About us</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End of Navbar Section -->
    <!-- <center section -->

    <div class="try">

            <h3 id="Aheader">Available Books</h3>
            <div id="centerpart">
            <?php 
            $sql="SELECT * FROM books";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                echo "<table>
                <tr>
                <th> SNO </th>
                <th> Book Title </th>
                <th> Author</th>
                <th> Subject </th>
                <th> Published Date </th>
                <th> Location </th>
                </tr>
                ";
                
                $i=0;
                while($row=$res->fetch_assoc()){
                    $i++;
                    echo"<tr>";
                    echo"<td>{$i}</td>";
                    echo"<td>{$row["BNAME"]}</td>";
                    echo"<td>{$row["AUTHOR"]}</td>";
                    echo"<td>{$row["SUBJECT"]}</td>";
                    echo"<td>{$row["PDATE"]}</td>";
                    echo"<td><a href='{$row["FILE"]}' target='_blank'>View</a></td>";
                    echo"</tr>";
                    
                }
                echo"</table>";

            }
            else{
                echo"<p class='error'> NO Books Available</p>";
            }
            ?>
             


            </div>
            </div>
<!-- Middle Section -->
<div class="Snavbar">



            <ul>
        <li><a href="Vusers.php">View USERS</a> </li>
        <li><a href="Ubooks.php">Upload Books</a> </li>
        <li><a href="Vbooks.php">View BOOKS</a> </li>
        <li><a href="Vreq.php">View Request</a> </li>
        <li><a href="AchPass.php">Change Password</a> </li>
        <li><a href="Logout.php">Logout</a> </li>

    </ul>
          </div>








<!-- footer -->
<div id="footer">
          <p>Made by &copy; Mugilan RS</p>

        </div>



  </body>
</html>
<!-- footer -->





<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
