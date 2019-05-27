<?php
include 'dbcon.php';
$id=$_GET['id'];
$qry="DELETE FROM `category` WHERE  cat_id='$id'";
$run= mysqli_query($con, $qry);

if($run==TRUE){
    ?>
<script>
    window.alert("Deleted");
    window.open('test.php','_self');
</script>
<?php
}

?>

