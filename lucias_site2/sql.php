<?php
$servername = getenv("OPENSHIFT_MYSQL_DB_HOST");
$username = "admin5PgQgMI";
$password = "w5TRkynrr1z4";
$dbname = "php";

/*Please make note of these MySQL credentials again:
  Root User: admin5PgQgMI
  Root Password: w5TRkynrr1z4
URL: https://php-luciavelasco.rhcloud.com/phpmyadmin/
*/
$mysql_host = getenv("OPENSHIFT_MYSQL_DB_HOST");
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

		$row = $result->fetch_assoc();

		$id = $row["id"];
		$storyline = $row["storyline"];
		$title = $row["title"];
		$date =  $row["date_published"];
		$author = $row["author"];
		$postpic = $row["postpic"];
		$content = $row["content"];

		$preview = true;
		
		include 'page-element/post-box.html';

	}
}

function GetAllThePosts($conn){
		$rows = $result->fetch_all();
		$number_of_posts = count($rows);
	for ($x = 0; $x <= $number_of_posts; $x++) {
		$sql = "SELECT * FROM posts ORDER BY date_published LIMIT 1 OFFSET $x";
		
		$result = $conn->query($sql);

		$row = $result->fetch_assoc();

		$id = $row["id"];
		$storyline = $row["storyline"];
		$title = $row["title"];
		$date =  $row["date_published"];
		$author = $row["author"];
		$postpic = $row["postpic"];
		$content = $row["content"];

		$preview = true;
		var_dump($row);
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