<html>
    <body>
<?php
$name = $email = $major = $comments = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h1>Results</h1>";
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $major = test_input($_POST["major"]);
    $comment = test_input($_POST["comment"]);
    
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Major: $major <br>";
    echo "Comment: $comment <br>";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
    </body>
</html>