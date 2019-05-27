<?php
include 'dbcon.php';
$qry="select * from category";
$run= mysqli_query($con, $qry);
$row= mysqli_num_rows($run);
?>
<!DOCTYPE>
<html>
    <head>
        <style>
            table,tr,th,td{
                border: 1px solid black;
               
            }
            table{ margin: 40px;}
            a{ color: red;}
        </style>
    </head>
    <body><center>
        <table >
            <tr><th>Name</th><th>Description</th><th>Date</th><th>Action</th></tr>
            <?php while($data= mysqli_fetch_array($run)){?>
            <tr>
                <td><?php echo $data['cat_name'];?></td>
                <td><?php echo $data['cat_desc'];?></td>
                <td><?php echo $data['cat_date'];?></td>
                <td><a href="edit.php?id=<?php echo $data['cat_id'];?>">edit</a>&nbsp;<a href="delete.php?id=<?php echo $data['cat_id'];?>">delete</a></td>
            </tr><?php } ?>

        </table>
        <a href="index.php" style="text-decoration: none;background-color: ghostwhite;border: 1px solid grey; padding: 1.3px 5px;color: black;">Add More</a>

    </center>
    </body>
</html>
