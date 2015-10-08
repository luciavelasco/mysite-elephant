<?php
$servername = "192.168.20.56";
$username = "root";
$password = "";
$dbname = "blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
function GetLastTwoPosts($conn){
	for ($x = 0; $x <= 1; $x++) {
		$sql = "SELECT * FROM posts ORDER BY date_published LIMIT 1 OFFSET $x";
		
		$result = $conn->query($sql);

		$row = $result->fetch_row();

		$id = $row["id"];
		$storyline = $row["storyline"];
		$title = $row["title"];
		$date =  $row["date"];
		$author = $row["author"];
		$postpic = $row["postpic"];
		$content = $row["content"];
		
		include 'page-element/post-box.html';

	}
}

/*$sql = "SELECT * FROM posts ORDER BY date_published LIMIT 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["id"]. "<br>" . $row["author"]. " <br>" . $row["title"]. "<br>";
    }
} */

//$conn->close();

?>