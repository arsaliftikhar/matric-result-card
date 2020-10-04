<?php
session_start();
include 'connection.php';

if(!isset($_SESSION['roll_num'])){
    header('location:view-result.php');
}
else
{

    $roll_no =$_SESSION['roll_num'];
    $greeting='Congrats You Are Passed';

    $q="SELECT std_reg,std_roll,std_name,std_father,std_school,std_district,std_image FROM student_data WHERE std_roll='$roll_no'";
    $result=$con->query($q);
    if($result->num_rows>0)
    {
        while ($row = $result->fetch_assoc())
        {
            $reg_no = $row['std_reg'];
            $std_name = $row['std_name'];
            $std_father = $row['std_father'];
            $std_school = $row['std_school'];
            $std_district = $row['std_district'];
            $std_image = $row['std_image'];
        }
    }
    else
    {
        echo "<script>alert('Problem in record');</script>";
    }

    $qy="SELECT urdu,english,islamiat,ps,math,physics,chemistry,biology FROM student_result WHERE std_roll='$roll_no'";
    $qy_result=$con->query($qy);
    if ($qy_result->num_rows>0)
    {
        while ($row_result=$qy_result->fetch_assoc())
        {
            $urdu=$row_result['urdu'];
            $english=$row_result['english'];
            $islamiat=$row_result['islamiat'];
            $ps=$row_result['ps'];
            $math=$row_result['math'];
            $physics=$row_result['physics'];
            $chemistry=$row_result['chemistry'];
            $biology=$row_result['biology'];
        }
        $total=$urdu+$english+$islamiat+$ps+$math+$physics+$chemistry+$biology;

        if ($total<300)
        {
            $grade='C';
        }

        elseif ($total<500)
        {
            $grade='B';
        }

        elseif ($total<900)
        {
            $grade='A';
        }

        elseif ($total<1000)
        {
            $grade='A+';
        }
        $_SESSION['total']=$total;
        $_SESSION['grade']=$grade;
        header('result-pdf.php');
        if ($urdu<50)
        {
            $urdu=$urdu.'<b style="color: red">(F)</b>';
            $greeting='Supply';
        }
        if ($english<50)
        {
            $english=$english.'<b style="color: red">(F)</b>';
            $greeting='Supply';
        }
        if ($islamiat<25)
        {
            $islamiat=$islamiat.'<b style="color: red">(F)</b>';
            $greeting='Supply';
        }
        if ($ps<25)
        {
            $ps=$ps.'<b style="color: red">(F)</b>';
            $greeting='Supply';
        }
        if ($math<50)
        {
            $math=$math.'<b style="color: red">(F)</b>';
            $greeting='Supply';
        }
        if ($physics<50)
        {
            $physics=$physics.'<b style="color: red">(F)</b>';
            $greeting='Supply';
        }
        if ($chemistry<50)
        {
            $chemistry=$chemistry.'<b style="color: red">(F)</b>';
            $greeting='Supply';
        }
        if ($biology<50)
        {
            $biology=$biology.'<b style="color: red">(F)</b>';
            $greeting='Supply';
        }
    }
    else
    {
        echo "<script>alert('Something went wrong');</script>";
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
    <title>Result card</title>
</head>
<body>
<style>
    body
    {
        background-color: whitesmoke;
        font-family: Montserrat;
    }
    .main
    {
         margin: 0 auto;
    }
    img
    {
        box-shadow: gray 0px 0px 10px 0px;
    }
    table
    {
        margin: 0 auto;
        width: 500px;
    }
    table tr
    {

    }
    table tr td
    {
        border: 1px solid gray;
        font-size: 14px;
        padding: 5px;
    }
    input[type=submit]
    {
        font-size: 20px;
        background-color: #2d52b4;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 5px;
        cursor: pointer;
    }
    input[type=submit]:focus
    {
        outline: none;
    }
</style>

<div class="main">
    <form action="result-pdf.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td style="width:100px;"><b>Reg no</b></td>
                <td colspan="2" ><?php echo $reg_no;?></td>
                <td align="center" rowspan="4"><img src="<?php echo $std_image;?>" height="110px" width="110px" alt=""></td>
            </tr>
            <tr>
                <td ><b>Roll no</b></td>
                <td colspan="2" ><?php echo $roll_no;?></td>

            </tr>
            <tr>
                <td ><b>Student name</b></td>
                <td style="text-transform: uppercase"  colspan="2"><?php echo $std_name;?></td>

            </tr>
            <tr>
                <td><b>Father's name</b></td>
                <td style="text-transform: uppercase" colspan="2" ><?php echo $std_father;?></td>
            </tr>
            <tr>
                <td style="text-transform: uppercase" colspan="4">
                    <?php echo $std_school.",".$std_district.".";?>
                </td>
            </tr>
            <tr>
                <td rowspan="2" style="width:50px;text-align: center">Sr.</td>
                <td rowspan="2" style="width:300px;text-align: center">Subjects</td>
                <td colspan="2" style="text-align: center">Marks</td>
            </tr>
            <tr>
                <td style="text-align: center">Maximum</td>
                <td style="text-align: center">Obtained</td>
            </tr>
            <tr>
                <td style="text-align: center">1</td>
                <td>Urdu</td>
                <td style="text-align: center">150</td>
                <td style="text-align: center"><?php echo $urdu;?></td>
            </tr>
            <tr>
                <td style="text-align: center">2</td>
                <td>English</td>
                <td style="text-align: center">150</td>
                <td style="text-align: center"><?php echo $english;?></td>
            </tr>
            <tr>
                <td style="text-align: center">3</td>
                <td>Islamiat</td>
                <td style="text-align: center">75</td>
                <td style="text-align: center"><?php echo $islamiat;?></td>
            </tr>
            <tr>
                <td style="text-align: center">4</td>
                <td>Pakistan studies</td>
                <td style="text-align: center">75</td>
                <td style="text-align: center"><?php echo $ps;?></td>
            </tr>
            <tr>
                <td style="text-align: center">5</td>
                <td>Math</td>
                <td style="text-align: center">150</td>
                <td style="text-align: center"><?php echo $math;?></td>
            </tr>
            <tr>
                <td style="text-align: center">6</td>
                <td>Physics</td>
                <td style="text-align: center">150</td>
                <td style="text-align: center"><?php echo $physics;?></td>
            </tr>
            <tr>
                <td style="text-align: center">7</td>
                <td>Chemistry</td>
                <td style="text-align: center">150</td>
                <td style="text-align: center"><?php echo $chemistry;?></td>
            </tr>
            <tr>
                <td style="text-align: center">8</td>
                <td>Biology</td>
                <td style="text-align: center">150</td>
                <td style="text-align: center"><?php echo $biology;?></td>
            </tr>
            <tr>
                <td style="text-align: center" rowspan="2">
                    Grade: <b><?php echo $grade;?></b>
                </td>
                <td style="text-align: center">Total: <b>1050</b></td>
                <td style="text-align: center" rowspan="2">
                    <b><?php echo $greeting;?></b>
                </td>
                <td style="text-align: center" rowspan="2">
                    <input type="submit" name="print"  value="Print">
                </td>
            </tr>

            <tr>
                <td style="text-align: center" >Obtained: <b><?php echo $total;?></b></td>
            </tr>
        </table>
    </form>





</div>



</body>
</html>