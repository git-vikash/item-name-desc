<?php
include 'dbcon.php';
if(isset($_GET['id'])){ // check if id send to edit page or not. if yes set it as session id, use it for update id. 
                                  //it will also let select qry run when id recieve via get method i.e. header and not the update qry
$id=$_GET['id'];
$_SESSION['id']=$id;                       //only two way to pass an id to other page or part of code.1-setting session. 2-input with hidden type
$qry="select * from category where cat_id='$id'";
$run= mysqli_query($con, $qry);
$row= mysqli_num_rows($run);
$data= mysqli_fetch_array($run);



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <center>
        <div style="margin:140px;">
            <form method="post" action="edit.php">
            <table>
            <tr><th style="text-align:left;">Name:</th>
                <td><input type="text" name="name" value="<?php echo $data['cat_name'];?>"></td></tr>
            <tr><th>Description:</th>
                <td><input type="text" name="desc" value="<?php echo $data['cat_desc'];?>">
                <!--input type="hidden" name="id" value="<?php echo $data['cat_id'];?>"--></td></tr>
            <tr><td></td>
                <td><input type="submit" name="submit" value="Update">
                </td></tr>
                </table>

            </form>
        </div></center>
    </body>
</html><?php }?>
<?php 
//include 'dbcon.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $desc=$_POST['desc'];
    //$id=$_POST['id'];         // use when input hidden used in form to send id
    $id=$_SESSION['id'];
    $date= date("y-m-d");
    $qry="UPDATE `category` SET `cat_name`='$name',`cat_desc`='$desc',cat_date='$date' WHERE cat_id='$id' ";
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