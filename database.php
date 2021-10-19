<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>HTML5</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
    <?php 
      /* Example of reading and writing to a MariaDB database in PHP */
      /* It's assumed that a database named "test" containing a "users" table has already been created. */

      $hostname = "localhost";
      $username = "saeid";
      $password = "1234";
      $db = "test";

      $dbconnect=mysqli_connect($hostname,$username,$password,$db);

      if ($dbconnect->connect_error) {
        die("Database connection failed: " . $dbconnect->connect_error);
      }

      if (isset($_POST['firstname'])) {
        $name=$_POST['firstname'];
        $query = "INSERT INTO users (name) VALUES ('$name')";
        if (!mysqli_query($dbconnect, $query)) {
          die('An error occurred when submitting your review.');
        } else {
          echo "<p>Thanks for your review.</p>";
        }
      } 

      $query = mysqli_query($dbconnect, "SELECT * FROM users")
        or die (mysqli_error($dbconnect));

      while ($row = mysqli_fetch_array($query)) {
        echo '<p>' . $row['name'] . '</p>';
      }
    ?>
  </body>
</html>
