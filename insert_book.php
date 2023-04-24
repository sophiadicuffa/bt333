<?php
// establish connection to the database
$host = "localhost";
$username = "root";
$password = "";
$database = "bt333";

$conn = mysqli_connect($host, $username, $password, $database);

// check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// handle form submission
if (isset($_POST['title'])) {
    // get form data
    $title = $_POST['title'];
    $author = $_POST['author'];
    $pub = $_POST['pub'];
    $isbn = $_POST['isbn'];
    $pub_date = $_POST['pub_date'];

    // insert data into the SQL table
    $sql = "INSERT INTO book (title, author, pub, isbn, pub_date) 
            VALUES ('$title', '$author', '$pub', '$isbn', '$pub_date')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header('Location: book.php');
        exit;

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// close database connection
mysqli_close($conn);
?>
