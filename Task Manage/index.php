<?php
//INSERT INTO `tasks` (`SN`, `Title`, `Description`, `Date`) VALUES ('', '', '', '2024-07-01 21:06:47.000000'), ('1', 'Task Demo', 'This is the demo task \r\n', '2024-07-01 21:06:47.000000');


$servername = "localhost";
$username = "root";
$password = "";
$database = "taskmnager";

$con = mysqli_connect($servername, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $title = $_POST['title'];
 $description = $_POST['description'];
 
    $sql = "INSERT INTO `tasks` (`Title`, `Description`) VALUES ('$title', '$description')";
    $result = mysqli_query($con, $sql);
}
?>













<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyManager</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://localhost/php/Task%20Manage/">Task Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>



    <div class="container">

        <h2 class="text-center my-4">Write a Note</h2>
        <form action = "/php/Task%20Manage/" method = "POST">
            <div class="mb-3">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>

            <div class="form-floating">
                <textarea class="form-control" placeholder="Write the Description" id="description" name="description"
                    style="height: 100px"></textarea>
                <label for="description">Description</label>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 1rem;">Submit</button>
            <button type="reset" class="btn btn-danger" style="margin-top: 1rem;">Reset</button>
        </form>
    </div>

<div class="contaiiner">

<table id="myTable" class="table">
  <thead>
    <tr>
      <th scope="col">S. No</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `tasks`";
    $result = mysqli_query($con, $sql);
    $snum = 1;
    if(mysqli_num_rows($result)>0){
       foreach($result as $row){
        echo "<tr>
        <th scope='row'>".$snum."</th>
        <td>".$row['Title']."</td>
        <td>".$row['Description']."</td>
        <td>Action</td>
        </tr>";
        $snum = $snum + 1;
       } 

    }
    
    


?>
    
  </tbody>
</table>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
   <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>


</body>

</html>














