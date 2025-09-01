<?php required_require_once('config.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>appointment booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container  mt-5 p-3 ">
       <h3>Appointment form  </h3>
        <form action="save_appointment.php" method="post" >
            <label for="name">name</label>
            <input type="text" name="name" placeholder="Enter your name" required><br><br>
             <label for="phone">phone</label>
            <input type="number" name="phone" placeholder="Enter your phone " required ><br><br>
             <label for="email">email</label>
            <input type="email" name="email" placeholder="Enter your email" required><br> <br>
             <label for="deprtment">deprtment</label>
             <select name="deprtment" required>
                <option value="">select </option>
               <option value="cardiology">cardiology</option>
               <option value="orthopedic">orthopedic</option>
               <option value="neurology">neurology</option>
               <option value="Dermatology">Dermatology</option>
              </select><br><br>
                <label for="email">date</label>
            <input type="date" name="date" placeholder="Enter your date" required><br><br>
              <label for="email">time</label>
            <input type=" time" name="time" placeholder="Enter your time" required> <br><br>
              
            <input type="submit" name="submit"   value="add appointment"    class="btn btn-primary  btn-lg"><br>


        </form>
        <a href="appointments.php">all appointment</a>
    </div>
</body>
</html>





