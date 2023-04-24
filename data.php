<!DOCTYPE html>
<html>
<head>
	<title>Loan Data</title>
</head>
<body>
	<h1>Loan Data Table</h1>
	<table border="1">
		<tr>
			<th>Book ID</th>
			<th>Member ID</th>
			<th>Date Borrowed</th>
			<th>Date Due</th>
			<th>Date Returned</th>
			<th>Book Title</th>
			<th>First Name</th>
			<th>Last Name</th>
		</tr>
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

			// select data from the SQL table
			$sql = "SELECT loan.book_id, loan.member_id, loan.date_borrowed, loan.date_due, loan.date_returned, book.title, member.fname, member.lname 
					FROM loan 
					INNER JOIN book ON loan.book_id = book.id 
					INNER JOIN member ON loan.member_id = member.id";
			$result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			        echo "<tr>";
			        echo "<td>" . $row["book_id"] . "</td>";
			        echo "<td>" . $row["member_id"] . "</td>";
			        echo "<td>" . $row["date_borrowed"] . "</td>";
			        echo "<td>" . $row["date_due"] . "</td>";
			        echo "<td>" . $row["date_returned"] . "</td>";
			        echo "<td>" . $row["title"] . "</td>";
			        echo "<td>" . $row["fname"] . "</td>";
			        echo "<td>" . $row["lname"] . "</td>";
			        echo "</tr>";
			    }
			} else {
			    echo "0 results";
			}

			// close database connection
			mysqli_close($conn);
		?>
	</table>
    <h1>Books Borrowed More Than Once</h1>
	<table border="1">
		<tr>
			<th>Book Title</th>
            <th>Times Borrowed</th>
            <th>Days Borrowed</th>
		</tr>
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

			// select data from the SQL table
            $sql = "SELECT l.book_id, l.member_id, l.date_borrowed, l.date_due, l.date_returned, b.title, m.fname, m.lname, 
            COUNT(l.book_id) AS `Times Borrowed`, SUM(DATEDIFF(l.date_returned, l.date_borrowed)) AS `Total Days Borrowed`
            FROM loan l
            INNER JOIN book b ON l.book_id = b.id 
            INNER JOIN member m ON l.member_id = m.id
            GROUP BY l.book_id, b.title
            HAVING COUNT(l.book_id) > 1";
    
			$result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			        echo "<tr>";
			        echo "<td>" . $row["title"] . "</td>";
			        echo "<td>" . $row["Times Borrowed"] . "</td>";
			        echo "<td>" . $row["Total Days Borrowed"] . "</td>";
			        echo "</tr>";
			    }
			} else {
			    echo "0 results";
			}

			// close database connection
			mysqli_close($conn);
		?>



</body>
</html>
