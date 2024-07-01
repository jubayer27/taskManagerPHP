<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Details</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "utm";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        $sql = "SELECT * FROM `feedback`";
        $result = mysqli_query($conn, $sql);
    }
    ?>

    <table>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Feedback</th>
            <th>Date</th>
        </tr>
        <?php
        if (mysqli_num_rows($result)>0){
            foreach ($result as $value){
                echo "<tr>";
                echo "<td>".$value['Name']."</td>";
                echo "<td>".$value['Phone']."</td>";
                echo "<td>".$value['Email']."</td>";
                echo "<td>".$value['Feedback']."</td>";
                echo "<td>".$value['Date']."</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>