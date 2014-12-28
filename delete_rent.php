<?php
require('login.php');
?>


	<script type="text/javascript">
function redirecting1(){
    window.location = "change_rent.php"
}
</script>


	<script type="text/javascript">
var ref = "<?php echo($_POST['reference']); ?>"
function redirecting2(){
    window.location = "modify_rent.php?ref="+ref
}
</script>


<?php

include 'connect.php';

mysql_select_db("db435736022", $db);

$ref = $_POST['reference'];
$sure = $_POST['sure'];

if ($sure == "yes"){

/*mysql_query("DELETE FROM Rental WHERE ref='".$ref."'");*/
mysql_query("DELETE FROM Rental WHERE ref LIKE '$ref'");

mysql_query("DELETE FROM RentalImages WHERE ref LIKE '$ref'");

$files = "uploads/" . $ref . "/*";
$folder = "uploads/".$ref."/";

system("rm -r ".$files."");
system("rmdir ".$folder."");

/*foreach($files as $file){
  if(is_file($file))
    unlink($file);*/
?>

<html><body onLoad="setTimeout('redirecting1()', 5000)"><h1>
DELETED SUCCESFULLY!!!!!!!!!</br></br>
automatically redirected in 5 seconds
</h1></body></html>

<?php
}

else {
?>

<html><body onLoad="setTimeout('redirecting2()', 5000)"><h1>
YOU ARE NOT SURE OR HAVE MISSCLICKED, THANK GOODNESS I HAVE MADE THIS OPTION!!!!!! </br> =)</br></br>
automatically redirected in 5 seconds
</h1></body></html>

<?php
}


?>
