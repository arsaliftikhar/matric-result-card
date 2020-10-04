<?php
error_reporting(0);
session_start();
$date='1997-10-29';
echo $date;

$date_break = explode('-',$date);
$year= $date_break[0];
$month=$date_break[1];
$day=$date_break[2];

$year_0=$year[0];
$year_1=$year[1];
$year_2=$year[2];
$year_3=$year[3];


echo "<br><br>";
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
    $year_3=" ";
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

echo $print_date;
?>