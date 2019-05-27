<?php
include 'dbcon.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body><center>
        <div style="margin:140px;">
            <form method="post" action="index.php">
                <table>
                    <tr><th style="text-align:left;">Name:</th>
                        <td><input type="text" name="name" placeholder="Name please" required="require"></td></tr>
            <tr><th>Description:</th>
                <td><input type="text" name="desc" placeholder="Describe please" required="require"></td></tr>
            <tr><td></td>
                <td><input type="submit" name="submit" value="Add">&nbsp;&nbsp;<a href="test.php" style="text-decoration: none;background-color: ghostwhite;border: 1px solid grey; padding: 1.1px 5px;color: black;">Show</a>
                </td></tr>
                </table>

            </form>
        </div></center>
    </body>
</html>
<?php
if(isset($_POST['submit'])){$con= mysqli_connect('localhost', 'root', '', 'name_desc')or die(mysqli_error($con));
    $name=$_POST['name'];
    $desc=$_POST['desc'];
    $date= date("y-m-d");
    $qry_sel="select * from category where cat_name='$name' AND cat_desc='$desc'";
    $run_sel= mysqli_query($con, $qry_sel)or die(mysqli_error($con));
    $row_sel= mysqli_num_rows($run_sel);
    
    if($row_sel==0){        
    $qry="insert into category (cat_name,cat_desc,cat_date)values('$name','$desc','$date')";
    $run= mysqli_query($con, $qry);
        if($run==TRUE){?>
            <script>
                
                window.alert("Added");
            </script>
        <?php
        }
    }else{?>
            <script>
                window.alert("Item already avilable.");
            </script>
     <?php
    }
}

?>