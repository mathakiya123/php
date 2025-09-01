<?php
        require_once('config.php');
?>

<?php
if(isset($_POST['submit'])){

    $name=mysqli_real_escape_string($con,$_POST['name']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $emai=mysqli_real_escape_string($con,$_POST['email']);
    $department=mysqli_real_escape_string($con,$_POST['deprtment']);
    $date=$_POST['date'];
    $time=$_POST['time'];

    $check="SELECT * FROM  tbl_ap  WHERE data='$date'AND time='$time'";
        $res=mysqli_query($con,$check);

        if(mysqli_num_rows($res)>0){
            echo "<script>
            alert('appointment slot is already book. please choise other slot');
            window.location='index.php';
            </script>";
        }
        else{
            $sql="INSERT INTO tbl_ap(name,phone,email,department,date,time)values('$name','$phone','$emai','$department','$date','$time')";

            if(mysqli_query($con,$sql)){
                echo "<script>
                alert('appointmet book sussesfuly');
                window.location='appointments.php';
                </script>";
            }
            else{
                echo "Error".mysqli_error($con);
            }
        }
    }
        else
        {
                header("location: index.php");
        }


?>