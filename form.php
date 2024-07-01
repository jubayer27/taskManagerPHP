<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php 
        if($_SERVER["REQUEST_METHOD"]== "POST"){
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $feedback = $_POST['feedback'];


            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "utm";

            $conn = mysqli_connect($servername, $username, $password, $database);
            if(!$conn){
                die("Connection failed: ". mysqli_connect_error());

            }
            else{
                echo "Connection successful";
                
                
                $sql = "INSERT INTO `feedback` (`Name`, `Phone`, `Email`, `Feedback`, `Date`) VALUES ('$name', '$phone', '$email', '$feedback', current_timestamp())";
$result = mysqli_query($conn, $sql);

                if($result){
                    echo'<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Aww yeah, you successfully submit the form.</p>
</div>';
                }
                else {
                    echo '<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Aww yeah, you successfully submit the form.</p>
</div>';
                }
            }
        }
        
        ?>
    <form action="/php/form.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input  type="text" name= "name"class="form-control" id="name" >
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="number" name="phone" class="form-control" id="phone">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name = "email" class="form-control" id="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="feedback" class="form-label">Feedback</label>
            <input type="text" name = "feedback" class="form-control" id="feedback">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>

    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>