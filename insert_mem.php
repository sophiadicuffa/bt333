<?php
// establish connection to the database
$host = "localhost";
$username = "root";
$password = "";
$database = "bt333";

$conn = mysqli_connect($host, $username, $password, $database);
echo "connected!";

// check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// handle form submission
if (isset($_POST['fname']) ) {

    echo "handling submission!";
    // get form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];

    // insert data into the SQL table
    $sql = "INSERT INTO member (fname, lname, email, phone, dob) 
            VALUES ('$fname', '$lname', '$email', '$phone', '$dob')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header('Location: book.php');
        exit;

    } else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
}

// close database connection
mysqli_close($conn);
?>