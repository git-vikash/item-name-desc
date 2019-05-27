<?php 
include 'dbcon.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $desc=$_POST['desc'];
    $id=$_POST['id'];
    $date= date("y-m-d");
    $qry="UPDATE `category` SET `cat_name`='$name',`cat_desc`='$desc' WHERE cat_id='$id' ";
    $run= mysqli_query($con, $qry);
    if($run==TRUE)
  {    ?>
            <script>
                window.open('test.php','_self');
                window.alert("Updated");
            </script>
        <?php
    }
}

?>