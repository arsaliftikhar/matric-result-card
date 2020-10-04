<?php
session_start();
include 'connection.php';
if (isset($_POST['submit']))
{
    $roll_no =$_POST['roll_no'];
    $q="select * from student_result where std_roll='$roll_no'";
    $result=$con->query($q);

    if ($roll_no=='')
    {
        echo "<script>alert('Enter roll no please')</script>";
    }
    elseif ($result->num_rows>0)
    {
        $_SESSION['roll_num']=$roll_no;
        header('location:result-card.php');
    }
    else
    {
        echo "<script>alert('Invalid Roll No');</script>";
    }
}




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Find result</title>
</head>
<body>
<style>
    body
    {
        background: whitesmoke;
        margin: 0;
        padding: 0;
        font-family: Montserrat;
    }
    h1
    {
        text-align: center;
        margin-top: 50px;
        font-variant: small-caps;
    }
    .main
    {
        margin: 0 auto;
        width: 250px;
        margin-top: 100px;

    }
    form
    {

    }
    label
    {
        font-size: 20px;
    }
    input[type=text]
    {
        font-size: 20px;
        border-radius: 5px;
        padding: 5px;
        border: 1px solid gray;
    }
    input[type=text]:focus
    {
        outline: none;
    }
    input[type=submit]
    {
        background-color: #266cb4;
        font-size: 22px;
        color: white;
        border: none;
        padding: 5px;
        border-radius: 5px;
        margin-left: 175px;
        margin-top: 20px;
        cursor: pointer;
    }
    input[type=submit]:hover
    {
        box-shadow: gray 0px 0px 10px 0px;
        background-color: #2d52b4;
    }

</style>

<h1>Find Result</h1>
<div class="main">
    <form action="" method="post">
        <label for="">Roll No</label>
        <br>
        <input type="text" name="roll_no">
        <br>
        <input type="submit" name="submit" value="Search">
    </form>
</div>


</body>
</html>