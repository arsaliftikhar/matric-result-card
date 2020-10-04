<?php
session_start();
include 'connection.php';
require ('pdf/fpdf.php');


$roll_no =$_SESSION['roll_num'];
$greeting='Congrats You Are Passed';
$total =$_SESSION['total'];
$grade =$_SESSION['grade'];

$q="SELECT id,std_reg,std_roll,std_name,std_father,std_school,std_district,std_dob,exam_month,exam_year,exam_category,exam_sitting,std_group,std_image FROM student_data WHERE std_roll='$roll_no'";
$result=$con->query($q);
if($result->num_rows>0)
{
    while ($row = $result->fetch_assoc())
    {
        $id=$row['id'];
        $reg_no = $row['std_reg'];
        $std_name = $row['std_name'];
        $std_father = $row['std_father'];
        $std_school = $row['std_school'];
        $std_district = $row['std_district'];
        $std_dob = $row['std_dob'];
        $exam_month = $row['exam_month'];
        $exam_year = $row['exam_year'];
        $exam_category = $row['exam_category'];
        $exam_sitting = $row['exam_sitting'];
        $std_group = $row['std_group'];
        $std_image = $row['std_image'];
    }
}
else
{
    echo "<script>alert('Problem in record');</script>";
}
$qy="SELECT urdu,english,islamiat,ps,math,physics,chemistry,biology FROM student_result WHERE std_roll='$roll_no'";
$qy_result=$con->query($qy);
if ($qy_result->num_rows>0) {
    while ($row_result = $qy_result->fetch_assoc()) {
        $urdu = $row_result['urdu'];
        $english = $row_result['english'];
        $islamiat = $row_result['islamiat'];
        $ps = $row_result['ps'];
        $math = $row_result['math'];
        $physics = $row_result['physics'];
        $chemistry = $row_result['chemistry'];
        $biology = $row_result['biology'];
    }
}
if ($urdu<50)
{
    $urdu=$urdu.'(Fail)';
}
if ($english<50)
{
    $english=$english.'(Fail)';
}
if ($islamiat<25)
{
    $islamiat=$islamiat.'(Fail)';
}
if ($ps<25)
{
    $ps=$ps.'(Fail)';
}
if ($math<50)
{
    $math=$math.'(Fail)';
}
if ($physics<50)
{
    $physics=$physics.'(Fail)';
}
if ($chemistry<50)
{
    $chemistry=$chemistry.'(Fail)';
}
if ($biology<50)
{
    $biology=$biology.'(Fail)';
}
$date=$std_dob;
$date_break = explode('-',$date);
$year= $date_break[0];
$month=$date_break[1];
$day=$date_break[2];

$year_0=$year[0];
$year_1=$year[1];
$year_2=$year[2];
$year_3=$year[3];

//DAY VALIDATION

if($day=='1' || $date=='01')
{
    $day="FIRST ";
}
if($day=='2' || $date=='02')
{
    $day="SECOND ";
}
if($day=='3' || $date=='03')
{
    $day="THIRD ";
}
if($day=='4' || $date=='04')
{
    $day="FOURTH ";
}
if($day=='5' || $date=='05')
{
    $day="FIFTH ";
}
if($day=='6' || $date=='06')
{
    $day="SIXTH ";
}
if($day=='7' || $date=='07')
{
    $day="SEVENTH ";
}
if($day=='8' || $date=='08')
{
    $day="EIGHT ";
}
if($day=='9' || $date=='09')
{
    $day="NINE ";
}
if($day=='10')
{
    $day="TEN ";
}
if($day=='11')
{
    $day="ELEVEN ";
}
if($day=='12')
{
    $day="TWELVE ";
}
if($day=='13')
{
    $day="THIRTEEN ";
}
if($day=='14')
{
    $day="FOURTEEN ";
}
if($day=='15')
{
    $day="FIFTEEN ";
}
if($day=='16')
{
    $day="SIXTEEN ";
}
if($day=='17')
{
    $day="SEVENTEEN ";
}
if($day=='18')
{
    $day="EIGHTEEN ";
}
if($day=='19')
{
    $day="NINETEEN ";
}
if($day=='20')
{
    $day="TWENTY ";
}
if($day=='21')
{
    $day="TWENTY ONE ";
}
if($day=='22')
{
    $day="TWENTY TWO ";
}
if($day=='23')
{
    $day="TWENTY THREE ";
}
if($day=='24')
{
    $day="TWENTY FOUR ";
}
if($day=='25')
{
    $day="TWENTY FIVE ";
}
if($day=='26')
{
    $day="TWENTY SIX ";
}
if($day=='27')
{
    $day="TWENTY SEVEN ";
}
if($day=='28')
{
    $day="TWENTY EIGHT ";
}
if($day=='29')
{
    $day="TWENTY NINE ";
}
if($day=='30')
{
    $day="THIRTY ";
}
if($day=='31')
{
    $day="THIRTY ONE ";
}

//MONTH VALIDATION


if ($month=='1' || $month=='01')
{
    $month="JANUARY ";
}

if ($month=='2' || $month=='02')
{
    $month="FEBRUARY ";
}

if ($month=='3' || $month=='03')
{
    $month="MARCH ";
}

if ($month=='4' || $month=='04')
{
    $month="APRIL ";
}

if ($month=='5' || $month=='05')
{
    $month="MAY ";
}

if ($month=='6' || $month=='06')
{
    $month="JUNE ";
}

if ($month=='7' || $month=='07')
{
    $month="JULY ";
}

if ($month=='8' || $month=='08')
{
    $month="AUGUST ";
}

if ($month=='9' || $month=='09')
{
    $month="SEPTEMBER ";
}

if ($month=='10')
{
    $month="OCTOBER ";
}

if ($month=='11')
{
    $month="NOVEMBER ";
}

if ($month=='12')
{
    $month="DECEMBER ";
}



//YEAR VALIDATION

if($year_0=='1')
{
    $year_0="ONE THOUSAND ";
}
if($year_0=='2')
{
    $year_0="TWO THOUSAND ";
}
if($year_0=='3')
{
    $year_0="THREE THOUSAND ";
}
if($year_0=='4')
{
    $year_0="FOUR THOUSAND ";
}
if ($year_1=='0')
{
    $year_1="ZERO ";
}
if ($year_1=='1')
{
    $year_1="ONE HUNDRED ";
}
if ($year_1=='2')
{
    $year_1="TWO HUNDRED ";
}
if ($year_1=='3')
{
    $year_1="THREE HUNDRED ";
}
if ($year_1=='4')
{
    $year_1="FOUR HUNDRED ";
}
if ($year_1=='5')
{
    $year_1="FIVE HUNDRED ";
}
if ($year_1=='6')
{
    $year_1="SIX HUNDRED ";
}
if ($year_1=='7')
{
    $year_1="SEVEN HUNDRED ";
}
if ($year_1=='8')
{
    $year_1="EIGHT HUNDRED ";
}
if ($year_1=='9')
{
    $year_1="NINE HUNDRED ";
}
if ($year_2=='0')
{
    $year_2="ZERO ";
}
if ($year_2=='1')
{
    $year_2="ONE ";
}
if ($year_2=='2')
{
    $year_2="TWENTY ";
}
if ($year_2=='3')
{
    $year_2="THIRTY ";
}
if ($year_2=='4')
{
    $year_2="FORTY ";
}
if ($year_2=='5')
{
    $year_2="FIFTY ";
}
if ($year_2=='6')
{
    $year_2="SIXTY ";
}
if ($year_2=='7')
{
    $year_2="SEVENTY ";
}
if ($year_2=='8')
{
    $year_2="EIGHTY ";
}
if ($year_2=='9')
{
    $year_2="NINETY ";
}
if ($year_3=='0')
{
    $year_3="ZERO";
}
if ($year_3=='1')
{
    $year_3="ONE ";
}
if ($year_3=='2')
{
    $year_3="TWO ";
}
if ($year_3=='3')
{
    $year_3="THREE ";
}
if ($year_3=='4')
{
    $year_3="FOUR ";
}
if ($year_3=='5')
{
    $year_3="FIVE ";
}
if ($year_3=='6')
{
    $year_3="SIX ";
}
if ($year_3=='7')
{
    $year_3="SEVEN ";
}
if ($year_3=='8')
{
    $year_3="EIGHT ";
}
if ($year_3=='9')
{
    $year_3="NINE ";
}


$print_date=$day.$month.$year_0.$year_1.$year_2.$year_3;



$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('resutl-card-picture.png','0','0','210','300');
$pdf->Image($std_image,'155','15','37','40','','');
$pdf->SetFont('Arial','B','12');
$pdf->Cell('80','9','','0','1','C');
$pdf->Cell('80','9',$id,'0','1','C');
$pdf->Cell('80','9',$roll_no,'0','1','C');
$pdf->Cell('100','9',$reg_no,'0','1','C');

$pdf->SetFont('Arial','B','14');
$pdf->Cell('100','16','','0','1','C');
$pdf->Cell('97','8','','0','0','C');
$pdf->Cell('30','8','ANNUAL','0','0','C');
$pdf->Cell('37','8','','0','0','C');
$pdf->Cell('18','8',$exam_year,'0','1','C');
$pdf->Cell('68','7','','0','0','C');
$pdf->Cell('28','7',$std_group,'0','1','C');
$pdf->Cell('30','10','','0','0','C');
$pdf->Cell('150','10',$std_name,'0','1','L');
$pdf->Cell('35','10','','0','0','C');
$pdf->Cell('150','10',$std_father,'0','1','L');
$pdf->SetFont('Arial','B','12');
$pdf->Cell('35','8','','0','0','C');
$pdf->Cell('150','8',$std_school." , ".$std_district,'0','1','L');
$pdf->SetFont('Arial','B','14');
$pdf->Cell('30','10','','0','0','C');
$pdf->Cell('150','10',$std_dob,'0','1','C');
$pdf->SetFont('Arial','B','11');
$pdf->Cell('25','9','','0','0','C');
$pdf->Cell('160','9',$print_date,'0','1','L');

$pdf->SetFont('Arial','B','14');
$pdf->Cell('90','9','','0','0','C');
$pdf->Cell('60','9',$exam_sitting,'0','0','C');
$pdf->Cell('35','9',$exam_category,'0','1','C');
$pdf->Cell('40','9','','0','0','C');
$pdf->Cell('90','9',$exam_month.",".$exam_year,'0','0','C');
$pdf->Cell('50','9',$total,'0','1','C');
$pdf->Cell('60','9','1050','0','0','C');
$pdf->Cell('70','9',$grade,'0','1','C');
$pdf->Cell('120','9',$grade,'0','1','C');
$pdf->Cell('120','9','','0','1','C');
$pdf->SetFont('Arial','','14');
$pdf->Cell('7','9','','0','0','C');
$pdf->Cell('15','18','S.No.','1','0','C');
$pdf->Cell('100','18','Subjects','1','0','C');
$pdf->Cell('60','9','Marks','1','1','C');
$pdf->Cell('122','9','','0','0','C');
$pdf->Cell('30','9','Maximum','1','0','C');
$pdf->Cell('30','9','Obtained','1','1','C');


$pdf->Cell('7','8','','0','0','C');
$pdf->Cell('15','8','1','1','0','C');
$pdf->Cell('100','8','  Urdu','1','0','L');
$pdf->Cell('30','8','150','1','0','C');
$pdf->Cell('30','8',$urdu,'1','1','C');

$pdf->Cell('7','8','','0','0','C');
$pdf->Cell('15','8','2','1','0','C');
$pdf->Cell('100','8','  English','1','0','L');
$pdf->Cell('30','8','150','1','0','C');
$pdf->Cell('30','8',$english,'1','1','C');

$pdf->Cell('7','8','','0','0','C');
$pdf->Cell('15','8','3','1','0','C');
$pdf->Cell('100','8','  Islamiat','1','0','L');
$pdf->Cell('30','8','75','1','0','C');
$pdf->Cell('30','8',$islamiat,'1','1','C');

$pdf->Cell('7','8','','0','0','C');
$pdf->Cell('15','8','4','1','0','C');
$pdf->Cell('100','8','  Pakistan Studies','1','0','L');
$pdf->Cell('30','8','75','1','0','C');
$pdf->Cell('30','8',$ps,'1','1','C');

$pdf->Cell('7','8','','0','0','C');
$pdf->Cell('15','8','5','1','0','C');
$pdf->Cell('100','8','  Math','1','0','L');
$pdf->Cell('30','8','150','1','0','C');
$pdf->Cell('30','8',$math,'1','1','C');

$pdf->Cell('7','8','','0','0','C');
$pdf->Cell('15','8','6','1','0','C');
$pdf->Cell('100','8','  Physics','1','0','L');
$pdf->Cell('30','8','150','1','0','C');
$pdf->Cell('30','8',$physics,'1','1','C');

$pdf->Cell('7','8','','0','0','C');
$pdf->Cell('15','8','7','1','0','C');
$pdf->Cell('100','8','  Chemistry','1','0','L');
$pdf->Cell('30','8','150','1','0','C');
$pdf->Cell('30','8',$chemistry,'1','1','C');

$pdf->Cell('7','8','','0','0','C');
$pdf->Cell('15','8','8','1','0','C');
$pdf->Cell('100','8','  Biology','1','0','L');
$pdf->Cell('30','8','150','1','0','C');
$pdf->Cell('30','8',$biology,'1','1','C');









$pdf->ln(1);





$pdf->Output();



?>