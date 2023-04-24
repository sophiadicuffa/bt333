<!DOCTYPE html>
<html>
<head>
	<title>Add Book</title>
</head>
<body>
	<h1>Add Book</h1>
	<form method="post" action="insert_book.php">
		<label>Title:</label>
		<input type="text" name="title" required>
		<br><br>
		<label>Author:</label>
		<input type="text" name="author" required>
		<br><br>
		<label>Publisher:</label>
		<input type="text" name="pub" required>
		<br><br>
		<label>ISBN:</label>
		<input type="text" name="isbn" required>
		<br><br>
		<label>Publication Date:</label>
		<input type="date" name="pub_date" required>
		<br><br>
		<input type="submit" value="Submit">
	</form>
</body>
<h2>Book List</h2>
<table>
	<tr>
		<th>ID</th>
		<th>Title</th>
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

		$query = "SELECT id, title FROM book";
		$result = mysqli_query($conn, $query);
		
		if (!$result) {
			echo "Error: " . mysqli_error($conn);
		} else {
			// Use mysqli_fetch_assoc() to retrieve the data
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['title'] . "</td>";
				echo "</tr>";
			}
		}
		
		mysqli_close($conn);
	?>
</table>


<head>
	<title>Add Member</title>
</head>
<body>
	<h1>Add Member</h1>
	<form method="post" action="insert_mem.php">
		<label>First Name:</label>
		<input type="text" name="fname" required>
		<br><br>
		<label>Last Name:</label>
		<input type="text" name="lname" required>
		<br><br>
		<label>Email:</label>
		<input type="text" name="email" required>
		<br><br>
		<label>Phone:</label>
		<input type="text" name="phone" required>
		<br><br>
		<label>Date of Birth:</label>
		<input type="date" name="dob" required>
		<br><br>
		<input type="submit" value="Submit">
	</form>
	
</body>
<h2>Member List</h2>
<table>
	<tr>
		<th>ID</th>
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

		$query = "SELECT id, fname, lname FROM member";
		$result = mysqli_query($conn, $query);
		
		if (!$result) {
			echo "Error: " . mysqli_error($conn);
		} else {
			// Use mysqli_fetch_assoc() to retrieve the data
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['fname'] . "</td>";
				echo "<td>" . $row['lname'] . "</td>";
				echo "</tr>";
			}
		}
		
		mysqli_close($conn);
	?>
</table>
<head>
	<title>Loan A Book</title>
</head>
<body>
	<h1>Insert Loan</h1>
	<form method="post" action="insert_loan.php">
		<label>Book ID:</label>
		<input type="number" name="book_id" required>
		<br><br>
		<label>Member ID:</label>
		<input type="number" name="member_id" required>
		<br><br>
		<label>Date Borrowed:</label>
		<input type="date" name="date_borrowed" required>
		<br><br>
		<label>Date Due:</label>
		<input type="date" name="date_due" required>
		<br><br>
		<label>Date Returned:</label>
		<input type="date" name="date_returned">
		<br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
