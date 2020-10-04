<?php
include 'connection.php';
error_reporting(0);
if (isset($_POST['get-data']))
{
    $getroll=$_POST['roll-no-get'];
    $reg_no = '';
    $std_name = '';
    $std_father = '';
    $error='';
    $msg_reg_no= "Reg no: &nbsp;&nbsp;&nbsp;";
    $msg_std_name="Student name: &nbsp;&nbsp;&nbsp;";
    $msg_std_father="Fathers name: &nbsp;&nbsp;&nbsp;";
    $sql ="select  std_roll,std_reg,std_name,std_father from student_data where std_roll='$getroll'";
    $result=$con->query($sql);
    if($result->num_rows>0)
    {
        while ($row = $result->fetch_assoc())
        {
            $reg_no = $row['std_reg'];
            $std_name = $row['std_name'];
            $std_father = $row['std_father'];
        }
    }
    else
    {
        $error = "<b style='color: red;font-size: 32px;margin-left: 100px;'>Record not found</b>";
        $msg_reg_no='';
        $msg_std_name='';
        $msg_std_father='';
    }

}

if (isset($_POST['submit']))
{
        $urdu=$_POST['urdu'];
        $english=$_POST['english'];
        $islamiat=$_POST['islamiat'];
        $ps=$_POST['ps'];
        $math=$_POST['math'];
        $physics=$_POST['physics'];
        $chemistry=$_POST['chemistry'];
        $biology=$_POST['biology'];
        $new_roll=$_POST['roll-no-get'];

    $qry="select * from student_data where std_roll='$new_roll'";
    $res=$con->query($qry);
    if ($res->num_rows>0)
    {
        $qy="select * from student_result where std_roll='$new_roll'";
        $resultt_query =$con->query($qy);
        if($resultt_query->num_rows>0)
        {
            echo "<script>alert('Record Already Present')</script>";
        }
        elseif($new_roll=='')
        {
            echo "<script>alert('Please firstly get roll no')</script>";
        }
        elseif($urdu=='' || $english=='' || $islamiat=='' || $ps=='' || $math=='' || $physics=='' || $chemistry=='' || $biology=='')
        {
            echo "<script>alert('Please fill all feilds')</script>";
        }
        else
        {
            $query="INSERT INTO student_result(std_roll,urdu,english,islamiat,ps,math,physics,chemistry,biology) 
             VALUES ('$new_roll','$urdu','$english','$islamiat','$ps','$math','$physics','$chemistry','$biology')";
            $result_query=$con->query($query);
            if ($result_query)
            {
                echo "<script>alert('Record inserted')</script>";

            }
            else
            {
                echo "<script>alert('something went wrong')</script>";
            }
        }

    }
    else
        {
            echo "<script>alert('Verify roll no please')</script>";
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
    <title>Result record</title>
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
        font-variant: small-caps;
        margin-bottom: 20px;
    }
    .main
    {
        margin: 0 auto;
        width: 500px;
    }
    .result
    {
        background-color: #b4b4b4;
        font-size: 18px;
        margin-top: 10px;
        padding: 10px;
    }
    form
    {

    }
    label
    {
        font-size: 20px;
    }
    #roll-no
    {
        font-size: 20px;
        border-radius: 5px;
        border: 1px solid gray;
        text-align: left;
        width: 310px;
        padding: 5px;
    }
    input[type=text]
    {
        font-size: 20px;
        border-radius: 5px;
        border: 1px solid gray;
        width: 100px;
        padding: 5px;
        text-align: center;
    }
    input[type=text]:focus
    {
        outline: none;
    }
    select
    {
        width: 400px;
        border-radius: 5px;
        padding: 5px;
        font-size: 20px;
    }
    select:focus
    {
        outline: none;
    }
    input[type=date]
    {
        width: 395px;
        border-radius: 5px;
        padding: 2px;
        font-size: 20px;
        border: 1px solid gray;

    }
    input[type=file]
    {
        font-size: 18px;
    }
    input[type=submit]
    {
        background-color: #13b432;
        font-size: 22px;
        color: white;
        border: none;
        padding: 5px;
        border-radius: 5px;
        margin-top: 20px;
        cursor: pointer;
    }
    input[type=submit]:hover
    {
        box-shadow: gray 0px 0px 10px 0px;
        background-color: #13b432;
    }
    input[type=submit]:focus
    {
        outline: none;
    }
    input[type=button]
    {
        background-color: #266cb4;
        font-size: 22px;
        color: white;
        border: none;
        padding: 5px;
        border-radius: 5px;
        margin-top: 20px;
        cursor: pointer;
    }
    input[type=button]:hover
    {
        box-shadow: gray 0px 0px 10px 0px;
        background-color: #2d52b4;
    }
    input[type=button]:focus
    {
        outline: none;
    }
    input[type=reset]
    {
        font-size: 22px;
        color: black;
        border: 1px solid gray;
        padding: 5px;
        border-radius: 5px;
        margin-top: 20px;
        cursor: pointer;
    }
    input[type=reset]:hover
    {
        box-shadow: gray 0px 0px 10px 0px;

    }
    input[type=reset]:focus
    {
        outline: none;
    }
    .right
    {
       text-align: center;
        width: 250px;
        float: left;
    }
    .left
    {

        width: 250px;
        margin-left: 250px;
        text-align: center;
    }

</style>

<h1>Insert OR Update Result</h1>
<div class="main">
    <form action="" method="post">
        <label for="">Roll no</label>
        <input name="roll-no-get" id="roll-no" value="<?php echo $getroll;?>" type="text">
        <input type="submit" name="get-data" value="Verify">
        <br>
        <div class="result">
            <b><?php echo $error;?></b>
            <b><?php echo $msg_reg_no;?></b><span><?php echo $reg_no;?></span>
            <br>
            <b><?php echo $msg_std_name;?></b><span style="text-transform: uppercase"><?php echo $std_name;?></span>
            <br>
            <b><?php echo $msg_std_father;?></b><span style="text-transform: uppercase"><?php echo $std_father;?></span>

        </div>
        <br>
        <div class="insert-main">
            <div class="right">
                <label for="">Urdu</label><br>
                <input name="urdu" type="text" placeholder="150" maxlength="3" ><br>
                <label for="">English</label><br>
                <input name="english" type="text" placeholder="150" maxlength="3" ><br>
                <label for="">Islamiat</label><br>
                <input name="islamiat" type="text" placeholder="75" maxlength="2" ><br>
                <label for="">P.S</label><br>
                <input name="ps" type="text" placeholder="75" maxlength="2" ><br>

            </div>
            <div class="left">
                <label for="">Math</label><br>
                <input name="math" type="text" placeholder="150" maxlength="3" ><br>
                <label for="">Physics</label><br>
                <input name="physics" type="text" placeholder="150" maxlength="3" ><br>
                <label for="">Chemistry</label><br>
                <input name="chemistry" type="text" placeholder="150" maxlength="3" ><br>
                <label for="">Biology</label><br>
                <input name="biology" type="text" placeholder="150" maxlength="3" ><br>
            </div>


        </div>
        <br>
        <div align="center">
            <input type="submit" name="submit">
            <input type="reset">
        </div>
        <br>
        <br>
    </form>
</div>






</body>
</html>