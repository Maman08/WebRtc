9c.


<?php
// Set the cookie with the current date-time
$expiration = time() + (60 * 60 * 24 * 30); // Cookie will expire in 30 days
if (!isset($_COOKIE['last_visited'])) {
setcookie('last_visited', date('Y-m-d H:i:s'), $expiration);
}
// Get the last visited date-time from the cookie
$lastVisitedDateTime = $_COOKIE['last_visited'] ?? 'Unknown';
?>
<!DOCTYPE html>
<html>
<head>
<title>Last Visited Date-Time</title>
</head>
<body>
<h2>Last Visited Date-Time</h2>
<p>
<?php
if ($lastVisitedDateTime !== 'Unknown') {
echo 'Last visited on: ' . $lastVisitedDateTime;
} else {
echo 'Welcome! This is your first visit.';
}
?>
</p>
</body>
</html>





9b.

<?php
session_start();
// Check if the 'views' session variable exists
if (!isset($_SESSION['views'])) {
$_SESSION['views'] = 1; // Initialize the 'views' session variable to 1 if it doesn't exist
} else {
$_SESSION['views']++; // Increment the 'views' session variable if it exists
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Views Counter</title>
</head>
<body>
<h2>Page Views Counter</h2>
<p>This page has been viewed <?php echo $_SESSION['views']; ?> times.</p>
<p>Refresh the page to see the count increase.</p>
</body>
</html>




9a>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chessboard</title>
    <style>
        .container {
            max-width: 70%;
            margin: auto;
        }
        .container-1 {
            align-items: center;
        }
        .container h1 {
            text-align: center;
        }
        .row {
            display: flex;
        }
        .white, .black {
            width: 50px;
            height: 50px;
            text-align: center;
            line-height: 50px;
        }
        .white {
            background-color: white;
            color: black;
        }
        .black {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Chessboard</h1>
        <div class="container-1">
            <?php
            for ($row = 1; $row <= 8; $row++) {
                echo "<div class='row'>";
                for ($col = 1; $col <= 8; $col++) {
                    $class = ($row + $col) % 2 == 0 ? "white" : "black";
                    echo "<div class='$class'>$row,$col</div>";
                }
                echo "</div>"; // Close the row
            }
            ?>
        </div>
    </div>
</body>
</html>



8>

<!DOCTYPE html>
<html>
<head>
<title>User Details Form</title>
</head>
<body>
<h2>User Details Form</h2>
<form method="post" action="display.php">
<label for="name">Name:</label>
<input type="text" name="name" required><br><br>
<label for="email">Email:</label>
<input type="email" name="email" required><br><br>
<label for="age">Age:</label>
<input type="number" name="age" required><br><br>
<label for="gender">Gender:</label>
<input type="radio" name="gender" value="Male" required> Male
<input type="radio" name="gender" value="Female" required> Female<br><br>
<br>
<input type="submit" value="Submit">
</form>
</body>
</html>
display.php
<!DOCTYPE html>
<html>
<head>
<title>User Details</title>
</head>
<body>
<h2>Submitted User Details</h2>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
$name = $_POST["name"];
$email = $_POST["email"];
$age = $_POST["age"];
$gender = $_POST["gender"];
echo "Name: " . $name . "<br><br>";
echo "Email: " . $email . "<br><br>";
echo "Age: " . $age . "<br><br>";
echo "Gender: " . $gender . "<br><br>";
}
?>
</body>
</html>
