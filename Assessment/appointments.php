
<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="table-container">
        <h2>appointments</h2>
        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>phone</th>
                <th>Email</th>
                <th>date</th>
                <th>time</th>
            </tr>
            <?php


            $sql="SELECT * FROM  tbl_ap ORDER BY date ASC,time ASC";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                echo"
                    <tr>

                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['department']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['time']}</td>
                        
                    </tr> ";              
    
            }
            ?>
        </table>
<br>
<a href="index.php">book another Appointment</a>
    </div>
</body>
</html>