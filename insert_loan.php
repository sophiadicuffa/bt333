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
if (isset($_POST['book_id']) ) {

    echo "handling submission!";
    // get form data
    $book_id = $_POST['book_id'];
    $member_id = $_POST['member_id'];
    $date_borrowed = $_POST['date_borrowed'];
    $date_due = $_POST['date_due'];
    $date_returned = $_POST['date_returned'];

    // check if date_returned is empty and set to NULL
    if (empty($date_returned)) {
        $date_returned = "NULL";
    } else {
        $date_returned = "'$date_returned'";
    }

    // insert data into the SQL table
    $sql = "INSERT INTO loan (book_id, member_id, date_borrowed, date_due, date_returned) 
            VALUES ('$book_id', '$member_id', '$date_borrowed', '$date_due', $date_returned)";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header('Location: data.php');
        exit;

    } else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
}

// close database connection
mysqli_close($conn);
?>
