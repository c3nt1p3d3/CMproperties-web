<?php


include 'connect.php';

mysql_select_db("cmproperties", $db);

$user = $_POST['user'];

$query = mysql_query("SELECT * FROM `Login` WHERE `user` LIKE '" . $user . "'");

$login = mysql_fetch_array($query);


session_start();
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

if (isset($_POST['password'])) {
    if (md5($_POST['password']) == $login['pass']) {
        $_SESSION['loggedIn'] = true;
    } else {
      ?>
      <script type="text/javascript">
        //************************URL FETCH************************
        <?php
        $url=$_SERVER['REQUEST_URI'];
        $url = str_replace('/', '', $url);
        ?>
        var url = <?php echo $url; ?>
        //************************/URL FETCH************************
        
        function redirectingfail(){
          window.location = "change.php";
        }
      </script>
      <html>
      <body onLoad="setTimeout('redirectingfail()', 5000)">
      </body>
      </html>
      <?php
      die('Incorrect password');
    }
}

if (!$_SESSION['loggedIn']): ?>





<html><head><title>Login</title></head>
  <body>
    <p>You need to login</p>
    <form method="post">
      User: <input type="text" name="user"> <br />
      Password: <input type="password" name="password"> <br />
      <input type="submit" name="submit" value="Login">
    </form>
  </body>
</html>






<?php
exit();
endif;
?>
