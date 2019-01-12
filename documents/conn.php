<?
       $servername = "shareddb-m.hosting.stackcp.net";
        $username = "studentdetainedlist-31303167de";
        $password = "rajput007";
        $dbname = "studentdetainedlist-31303167de";
        $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>