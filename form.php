<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <?php
        include("connection.php")

        ?>

    <!--Registration Form-->

    <form action="" method="POST">

    <table align="center" border="0" cellspacing="15">

        <tr>
            <td>Roll No</td>
                <td><input type="text" placeholder="Roll No" name="roll" required></td>
            </tr>

    <tr>
    <td>First Name</td>
        <td><input type="text" placeholder="First Name" name="fname" required></td>
    </tr>

    <tr>
    <td>Last Name</td>
        <td><input type="text" placeholder="Last Name" name="lname" required></td>
    </tr>

    <tr>
        <td>Email Address</td>
            <td><input type="email" placeholder="Email" name="email" required></td>
    </tr>

    <tr>
        <td>Password</td>
            <td><input type="password" placeholder="Password" name="password" required></td>
    </tr> 
    
     <tr>
        <td>Confirm Password</td>
            <td><input type="password" placeholder="Confirm Password" name="conpass" required></td>
    </tr> 

    <tr>
        <td>Gender</td>
        <td>Male<input type="radio" name="gender" value="male" required>
            Female<input type="radio" name="gender" value="female" required>
        </td>
    </tr>

    <tr>
        <td>Select City</td>
        <td>
            <select name="country">
                <option selected hidden value=""> Select Country</option>
                <option value="nepal">Nepal</option>
                <option value="india">India</option>
                <option value="china">China</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Choose Language</td>
        <td>
            <input type="checkbox" value="Nepali" name="language[]" >Nepali
            <input type="checkbox" value="English" name="language[]">English  <br>
            <input type="checkbox" value="Hindi" name="language[]">Hindi
            <input type="checkbox" value="Chinese" name="language[]">Chinese
        </td>
    </tr>
    <tr>
        <td align="center" colspan="2">
           <input id="btn" type="submit" name="save"></a>
        </td>
    </tr>
    </table>
        </form>

        </body>
        </html>

<?php

if(isset($_POST['save']))
{
    $rollname= $_POST['roll'];
    $firstname= $_POST['fname'];
    $lastname= $_POST['lname'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $confirmpassword = $_POST['conpass'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $language = $_POST['language'];

    //checbox insertion
    $chkstr = implode(",",$language);
    //echo "$chkstr";
    $sql = mysqli_query($conn,"SELECT * from register WHERE rollno='$rollname'");
    if(mysqli_num_rows($sql)>0)
    {
        echo "
        <h3>Roll No already exists</h3>
        ";
    }
    elseif($sql= mysqli_query($conn, "SELECT * from register WHERE email='$email'"))
    {
        echo "
        <h3>Email already exist</h3>
        ";
    }
    else{

        $query = "INSERT INTO register VALUES ('$rollname','$firstname','$lastname','$email','$password','$confirmpassword','$gender','$country','$chkstr')";
        
        $result = mysqli_query($conn,$query);

    if($result)
    {
        echo "Data Inserted into database";
    } 
    else{
        echo "Data not recorderd";
    }
}
}

?>