<html>
<body>
<?php
require 'includes/connect.php';
if (isset($_GET['id'])) {

    $id = $_GET['id'];
$sql1 = "SELECT * FROM librat WHERE id=$id";
$result1 = mysqli_query($conn, $sql1);
$bfile = mysqli_fetch_assoc($result1);
}
echo '<object data="'.$bfile['pdf'].'" width="100%" height="100%"></object>';
?>

</body>
</html>