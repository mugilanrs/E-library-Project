<?php
session_Start();
include "database.php"; 
if(!isset($_SESSION["ID"])){
    header("location:Ulogin.php");
  }?>

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
    <div class="try">
      
        <div class="form">

          <form id="login-form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <h3>Search</h3>
            <label >Title/Author/Subject/Published Date</label>
            <input type="text" name="name" required placeholder="Get Your Top 10 Results" />


            <button type="submit" name ="submit">Search</button>

          </form>
        </div>
      
      
        <?php 
$results_per_page = 10;

if (isset($_POST["submit"])) {
    $search_term = $_POST["name"];

    $sql_count = "SELECT COUNT(*) as count FROM books WHERE BNAME LIKE '%$search_term%' OR SUBJECT LIKE '%$search_term%' OR AUTHOR LIKE '%$search_term%' OR PDATE LIKE '%$search_term%'";
    $count_res = $db->query($sql_count);
    $count_row = $count_res->fetch_assoc();
    $total_results = $count_row["count"];

    $total_pages = ceil($total_results / $results_per_page);

    if (!isset($_GET["page"])) {
        $current_page = 1;
    } else {
        $current_page = $_GET["page"];
        if ($current_page < 1) {
            $current_page = 1;
        } else if ($current_page > $total_pages) {
            $current_page = $total_pages;
        }
    }

    $offset = ($current_page - 1) * $results_per_page;

    $sql = "SELECT * FROM books WHERE BNAME LIKE '%$search_term%' OR SUBJECT LIKE '%$search_term%' OR AUTHOR LIKE '%$search_term%' OR PDATE LIKE '%$search_term%'  LIMIT $results_per_page OFFSET $offset";
    $res = $db->query($sql);

    if ($res->num_rows > 0) {
        echo "<table>
            <tr>
            <th> SNO </th>
            <th> Book Title </th>
            <th> Subject </th>
            <th> Author </th>
            <th> Published Date </th>
            <th> Location </th>
            </tr>";

        $i = $offset + 1;
        while ($row = $res->fetch_assoc()) {
            echo "<tr>
                <td>{$i}</td>
                <td>{$row["BNAME"]}</td>
                <td>{$row["SUBJECT"]}</td>
                <td>{$row["AUTHOR"]}</td>
                <td>{$row["PDATE"]}</td>
                <td><a href='{$row["FILE"]}' target='_blank'>View</a></td>
                </tr>";
            $i++;
        }

        echo "</table>";

        echo "<div id='pagination'>";
        if ($current_page > 1) {
            echo "<a href='{$_SERVER['PHP_SELF']}?page=" . ($current_page - 1) . "&name=$search_term' class='prev'>Prev</a>";
        }

        for ($j = 1; $j <= $total_pages; $j++) {
            if ($j == $current_page) {
                echo "<a href='{$_SERVER['PHP_SELF']}?page=$j&name=$search_term' class='active'>$j</a>";
            } else {
                echo "<a href='{$_SERVER['PHP_SELF']}?page=$j&name=$search_term'>$j</a>";
            }
        }

        if ($current_page < $total_pages) {
            echo "<a href='{$_SERVER['PHP_SELF']}?page=" . ($current_page + 1) . "&name=$search_term' class='next'>Next</a>";
        }
        echo "</div>";

    } else {
        echo "<p class='error'>No Books Found</p>";
    }
}
?>
</div>
        

<!-- Middle Section -->
<div class="Snavbar">



  <ul>
<li><a href="Uhome.php">Home</a> </li>
<li><a href="Search.php">Search Books</a> </li>

<li><a href="Ureq.php"> Request</a> </li>
<li><a href="UchPass.php">Change Password</a> </li>
<li><a href="logout.php">logout</a> </li>

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
