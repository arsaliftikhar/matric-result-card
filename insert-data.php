<?php
include 'connection.php';

if(isset($_POST['submit']))
{
$reg_no =$_POST['reg-no'];
$roll_no =$_POST['roll-no'];
$std_name =$_POST['std-name'];
$std_father =$_POST['std-father'];
$std_school =$_POST['std-school'];
$std_district =$_POST['std-district'];
$std_dob =$_POST['std-dob'];
$exam_month =$_POST['exam-month'];
$exam_year =$_POST['exam-year'];
$exam_category =$_POST['exam-category'];
$exam_sitting =$_POST['exam-sitting'];
$std_group =$_POST['std-group'];
$files =$_FILES['std-image'];

/*strtoupper($reg_no);
strtoupper($std_name);
strtoupper($std_father);
strtoupper($std_school);
strtoupper($std_district);
strtoupper($exam_month);*/
//this is image validation code

    $filename = $files['name'];
    $fileerror = $files['error'];
    $filetemp = $files['tmp_name'];
    $size = $files['size'];
    $filetext = explode('.',$filename);
    $filecheck = strtolower(end($filetext));
    $fileextstore= array('png','jpg','jpeg');


    $q="select * from student_data";
    $result_query =$con->query($q);
    $fetch_row=mysqli_fetch_array($result_query);
    if($roll_no == $fetch_row['std_roll'] || $reg_no== $fetch_row['std_reg'])
    {
        echo "<script>alert('Record Already Present')</script>";
    }


    elseif ($reg_no==''
        || $roll_no==''
        || $std_name==''
        || $std_father==''
        || $std_school==''
        || $std_district==''
        || $std_dob==''
        || $exam_month==''
        || $exam_year==''
        || $exam_category==''
        || $exam_sitting==''
        || $std_group=='')
    {
        echo "Please insert all data";
    }
    elseif(in_array($filecheck,$fileextstore))
    {

            $destinationfile = 'uploadimages/'.md5(rand()).'-'.$filename;
            move_uploaded_file($filetemp,$destinationfile);
            $sql="INSERT INTO student_data(`std_reg`,`std_roll`,`std_name`,`std_father`,`std_school`,`std_district`,`std_dob`,`exam_month`,`exam_year`,`exam_category`,`exam_sitting`,`std_group`,`std_image`) 
                  VALUES ('$reg_no','$roll_no','$std_name','$std_father','$std_school','$std_district','$std_dob','$exam_month','$exam_year','$exam_category','$exam_sitting','$std_group','$destinationfile')";

            $result= $con->query($sql);

          if ($result)
          {
              echo "<script>alert('Record inserted')</script>";
              header('location:insert-data.php');
          }
          else
          {
              echo "<script>alert('something went wrong')</script>";
              header('location:insert-data.php');
          }
        }


/*echo $reg_no;
echo $roll_no;
echo $std_name;
echo $std_father;
echo $std_school;
echo $std_district;
echo $std_dob;
echo $exam_month;
echo $exam_year;
echo $exam_category;
echo $exam_sitting;
echo $std_group;
echo $std_image;*/




}


?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert data</title>
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
        margin-bottom: 50px;
    }
    .main
    {
        margin: 0 auto;
        width: 400px;
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
        border: 1px solid gray;
        width: 390px;
        padding: 5px;
        text-transform: uppercase;
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
        text-transform: uppercase;
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
        background-color: #266cb4;
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
        background-color: #2d52b4;
    }
    input[type=submit]:focus
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


</style>

<h1>Insert Details</h1>
<div class="main">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Registration no</label>
        <br>
        <input name="reg-no" type="text" required>
        <br>
        <label for="">Roll no</label>
        <br>
        <input name="roll-no" type="text" required>
        <br>
        <label for="">Student name</label>
        <br>
        <input name="std-name" type="text" required>
        <br>
        <label for="">Father's name</label>
        <br>
        <input name="std-father" type="text" required>
        <br>
        <label for="">School name</label>
        <br>
        <input name="std-school" type="text" required>
        <label for="">District</label>
        <br>
        <select name="std-district" id="" required>
            <option value="" hidden>----</option>
            <option value="Islamabad">Islamabad</option>
            <option value="" disabled>Punjab Cities</option>
            <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
            <option value="Ahmadpur East">Ahmadpur East</option>
            <option value="Ali Khan Abad">Ali Khan Abad</option>
            <option value="Alipur">Alipur</option>
            <option value="Arifwala">Arifwala</option>
            <option value="Attock">Attock</option>
            <option value="Bhera">Bhera</option>
            <option value="Bhalwal">Bhalwal</option>
            <option value="Bahawalnagar">Bahawalnagar</option>
            <option value="Bahawalpur">Bahawalpur</option>
            <option value="Bhakkar">Bhakkar</option>
            <option value="Burewala">Burewala</option>
            <option value="Chillianwala">Chillianwala</option>
            <option value="Chakwal">Chakwal</option>
            <option value="Chichawatni">Chichawatni</option>
            <option value="Chiniot">Chiniot</option>
            <option value="Chishtian">Chishtian</option>
            <option value="Daska">Daska</option>
            <option value="Darya Khan">Darya Khan</option>
            <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
            <option value="Dhaular">Dhaular</option>
            <option value="Dina">Dina</option>
            <option value="Dinga">Dinga</option>
            <option value="Dipalpur">Dipalpur</option>
            <option value="Faisalabad">Faisalabad</option>
            <option value="Fateh Jhang">Fateh Jang</option>
            <option value="Ghakhar Mandi">Ghakhar Mandi</option>
            <option value="Gojra">Gojra</option>
            <option value="Gujranwala">Gujranwala</option>
            <option value="Gujrat">Gujrat</option>
            <option value="Gujar Khan">Gujar Khan</option>
            <option value="Hafizabad">Hafizabad</option>
            <option value="Haroonabad">Haroonabad</option>
            <option value="Hasilpur">Hasilpur</option>
            <option value="Haveli">Haveli</option>
            <option value="Lakha">Lakha</option>
            <option value="Jalalpur">Jalalpur</option>
            <option value="Jattan">Jattan</option>
            <option value="Jampur">Jampur</option>
            <option value="Jaranwala">Jaranwala</option>
            <option value="Jhang">Jhang</option>
            <option value="Jhelum">Jhelum</option>
            <option value="Kalabagh">Kalabagh</option>
            <option value="Karor Lal Esan">Karor Lal Esan</option>
            <option value="Kasur">Kasur</option>
            <option value="Kamalia">Kamalia</option>
            <option value="Kamoke">Kamoke</option>
            <option value="Khanewal">Khanewal</option>
            <option value="Khanpur">Khanpur</option>
            <option value="Kharian">Kharian</option>
            <option value="Khushab">Khushab</option>
            <option value="Kot Adu">Kot Adu</option>
            <option value="Jauharabad">Jauharabad</option>
            <option value="Lahore">Lahore</option>
            <option value="Lalamusa">Lalamusa</option>
            <option value="Layyah">Layyah</option>
            <option value="Liaquat Pur">Liaquat Pur</option>
            <option value="Lodhran">Lodhran</option>
            <option value="Malakwal">Malakwal</option>
            <option value="Mamoori">Mamoori</option>
            <option value="Mailsi">Mailsi</option>
            <option value="Mandi Bahauddin">Mandi Bahauddin</option>
            <option value="mian Channu">Mian Channu</option>
            <option value="Mianwali">Mianwali</option>
            <option value="Multan">Multan</option>
            <option value="Murree">Murree</option>
            <option value="Muridke">Muridke</option>
            <option value="Mianwali Bangla">Mianwali Bangla</option>
            <option value="Muzaffargarh">Muzaffargarh</option>
            <option value="Narowal">Narowal</option>
            <option value="Okara">Okara</option>
            <option value="Renala Khurd">Renala Khurd</option>
            <option value="Pakpattan">Pakpattan</option>
            <option value="Pattoki">Pattoki</option>
            <option value="Pir Mahal">Pir Mahal</option>
            <option value="Qaimpur">Qaimpur</option>
            <option value="Qila Didar Singh">Qila Didar Singh</option>
            <option value="Rabwah">Rabwah</option>
            <option value="Raiwind">Raiwind</option>
            <option value="Rajanpur">Rajanpur</option>
            <option value="Rahim Yar Khan">Rahim Yar Khan</option>
            <option value="Rawalpindi">Rawalpindi</option>
            <option value="Sadiqabad">Sadiqabad</option>
            <option value="Safdarabad">Safdarabad</option>
            <option value="Sahiwal">Sahiwal</option>
            <option value="Sangla Hill">Sangla Hill</option>
            <option value="Sarai Alamgir">Sarai Alamgir</option>
            <option value="Sargodha">Sargodha</option>
            <option value="Shakargarh">Shakargarh</option>
            <option value="Sheikhupura">Sheikhupura</option>
            <option value="Sialkot">Sialkot</option>
            <option value="Sohawa">Sohawa</option>
            <option value="Soianwala">Soianwala</option>
            <option value="Siranwali">Siranwali</option>
            <option value="Talagang">Talagang</option>
            <option value="Taxila">Taxila</option>
            <option value="Toba Tek  Singh">Toba Tek Singh</option>
            <option value="Vehari">Vehari</option>
            <option value="Wah Cantonment">Wah Cantonment</option>
            <option value="Wazirabad">Wazirabad</option>
            <option value="" disabled>Sindh Cities</option>
            <option value="Badin">Badin</option>
            <option value="Bhirkan">Bhirkan</option>
            <option value="Rajo Khanani">Rajo Khanani</option>
            <option value="Chak">Chak</option>
            <option value="Dadu">Dadu</option>
            <option value="Digri">Digri</option>
            <option value="Diplo">Diplo</option>
            <option value="Dokri">Dokri</option>
            <option value="Ghotki">Ghotki</option>
            <option value="Haala">Haala</option>
            <option value="Hyderabad">Hyderabad</option>
            <option value="Islamkot">Islamkot</option>
            <option value="Jacobabad">Jacobabad</option>
            <option value="Jamshoro">Jamshoro</option>
            <option value="Jungshahi">Jungshahi</option>
            <option value="Kandhkot">Kandhkot</option>
            <option value="Kandiaro">Kandiaro</option>
            <option value="Karachi">Karachi</option>
            <option value="Kashmore">Kashmore</option>
            <option value="Keti Bandar">Keti Bandar</option>
            <option value="Khairpur">Khairpur</option>
            <option value="Kotri">Kotri</option>
            <option value="Larkana">Larkana</option>
            <option value="Matiari">Matiari</option>
            <option value="Mehar">Mehar</option>
            <option value="Mirpur Khas">Mirpur Khas</option>
            <option value="Mithani">Mithani</option>
            <option value="Mithi">Mithi</option>
            <option value="Mehrabpur">Mehrabpur</option>
            <option value="Moro">Moro</option>
            <option value="Nagarparkar">Nagarparkar</option>
            <option value="Naudero">Naudero</option>
            <option value="Naushahro Feroze">Naushahro Feroze</option>
            <option value="Naushara">Naushara</option>
            <option value="Nawabshah">Nawabshah</option>
            <option value="Nazimabad">Nazimabad</option>
            <option value="Qambar">Qambar</option>
            <option value="Qasimabad">Qasimabad</option>
            <option value="Ranipur">Ranipur</option>
            <option value="Ratodero">Ratodero</option>
            <option value="Rohri">Rohri</option>
            <option value="Sakrand">Sakrand</option>
            <option value="Sanghar">Sanghar</option>
            <option value="Shahbandar">Shahbandar</option>
            <option value="Shahdadkot">Shahdadkot</option>
            <option value="Shahdadpur">Shahdadpur</option>
            <option value="Shahpur Chakar">Shahpur Chakar</option>
            <option value="Shikarpaur">Shikarpaur</option>
            <option value="Sukkur">Sukkur</option>
            <option value="Tangwani">Tangwani</option>
            <option value="Tando Adam Khan">Tando Adam Khan</option>
            <option value="Tando Allahyar">Tando Allahyar</option>
            <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
            <option value="Thatta">Thatta</option>
            <option value="Umerkot">Umerkot</option>
            <option value="Warah">Warah</option>
            <option value="" disabled>Khyber Cities</option>
            <option value="Abbottabad">Abbottabad</option>
            <option value="Adezai">Adezai</option>
            <option value="Alpuri">Alpuri</option>
            <option value="Akora Khattak">Akora Khattak</option>
            <option value="Ayubia">Ayubia</option>
            <option value="Banda Daud Shah">Banda Daud Shah</option>
            <option value="Bannu">Bannu</option>
            <option value="Batkhela">Batkhela</option>
            <option value="Battagram">Battagram</option>
            <option value="Birote">Birote</option>
            <option value="Chakdara">Chakdara</option>
            <option value="Charsadda">Charsadda</option>
            <option value="Chitral">Chitral</option>
            <option value="Daggar">Daggar</option>
            <option value="Dargai">Dargai</option>
            <option value="Darya Khan">Darya Khan</option>
            <option value="dera Ismail Khan">Dera Ismail Khan</option>
            <option value="Doaba">Doaba</option>
            <option value="Dir">Dir</option>
            <option value="Drosh">Drosh</option>
            <option value="Hangu">Hangu</option>
            <option value="Haripur">Haripur</option>
            <option value="Karak">Karak</option>
            <option value="Kohat">Kohat</option>
            <option value="Kulachi">Kulachi</option>
            <option value="Lakki Marwat">Lakki Marwat</option>
            <option value="Latamber">Latamber</option>
            <option value="Madyan">Madyan</option>
            <option value="Mansehra">Mansehra</option>
            <option value="Mardan">Mardan</option>
            <option value="Mastuj">Mastuj</option>
            <option value="Mingora">Mingora</option>
            <option value="Nowshera">Nowshera</option>
            <option value="Paharpur">Paharpur</option>
            <option value="Pabbi">Pabbi</option>
            <option value="Peshawar">Peshawar</option>
            <option value="Saidu Sharif">Saidu Sharif</option>
            <option value="Shorkot">Shorkot</option>
            <option value="Shewa Adda">Shewa Adda</option>
            <option value="Swabi">Swabi</option>
            <option value="Swat">Swat</option>
            <option value="Tangi">Tangi</option>
            <option value="Tank">Tank</option>
            <option value="Thall">Thall</option>
            <option value="Timergara">Timergara</option>
            <option value="Tordher">Tordher</option>
            <option value="" disabled>Balochistan Cities</option>
            <option value="Awaran">Awaran</option>
            <option value="Barkhan">Barkhan</option>
            <option value="Chagai">Chagai</option>
            <option value="Dera Bugti">Dera Bugti</option>
            <option value="Gwadar">Gwadar</option>
            <option value="Harnai">Harnai</option>
            <option value="Jafarabad">Jafarabad</option>
            <option value="Jhal Magsi">Jhal Magsi</option>
            <option value="Kacchi">Kacchi</option>
            <option value="Kalat">Kalat</option>
            <option value="Kech">Kech</option>
            <option value="Kharan">Kharan</option>
            <option value="Khuzdar">Khuzdar</option>
            <option value="Killa Abdullah">Killa Abdullah</option>
            <option value="Killa Saifullah">Killa Saifullah</option>
            <option value="Kohlu">Kohlu</option>
            <option value="Lasbela">Lasbela</option>
            <option value="Lehri">Lehri</option>
            <option value="Loralai">Loralai</option>
            <option value="Mastung">Mastung</option>
            <option value="Musakhel">Musakhel</option>
            <option value="Nasirabad">Nasirabad</option>
            <option value="Nushki">Nushki</option>
            <option value="Panjgur">Panjgur</option>
            <option value="Pishin valley">Pishin Valley</option>
            <option value="Quetta">Quetta</option>
            <option value="Sherani">Sherani</option>
            <option value="Sibi">Sibi</option>
            <option value="Sohbatpur">Sohbatpur</option>
            <option value="Washuk">Washuk</option>
            <option value="Zhob">Zhob</option>
            <option value="Ziarat">Ziarat</option>
        </select>
        <br>
        <label for="">Date of birth</label>
        <br>
        <input name="std-dob" type="date" required>
        <br>
        <label for="">Exam conducted month</label>
        <br>
        <select name="exam-month" id="" required>
            <option hidden value="">----</option>
            <option value="JAN-FEB">Jan-Feb</option>
            <option value="FEB-MARCH">Feb-March</option>
            <option value="MARCH-APRIL">March-April</option>
            <option value="APRIL-MAY">April-May</option>
            <option value="MAY-JUNE">May-June</option>
            <option value="JUNE-JULY">June-July</option>
            <option value="JULY-AUG">July-Aug</option>
            <option value="AUG-SEP">Aug-Sep</option>
            <option value="SEP-OCT">Sep-Oct</option>
            <option value="OCT-NOV">Oct-Nov</option>
            <option value="NOV-DEC">Nov-Dec</option>
            <option value="DEC-JAN">Dec-Jan</option>
        </select>
        <br>
        <label for="">Exam conducted Year</label>
        <br>
        <select name="exam-year" id="" required>
            <option hidden value="">----</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
            <option value="1984">1984</option>
            <option value="1983">1983</option>
            <option value="1982">1982</option>
            <option value="1981">1981</option>
            <option value="1980">1980</option>
            <option value="1979">1979</option>
            <option value="1978">1978</option>
            <option value="1977">1977</option>
            <option value="1976">1976</option>
            <option value="1975">1975</option>
            <option value="1974">1974</option>
            <option value="1973">1973</option>
            <option value="1972">1972</option>
            <option value="1971">1971</option>
            <option value="1970">1970</option>
            <option value="1969">1969</option>
            <option value="1968">1968</option>
            <option value="1967">1967</option>
            <option value="1966">1966</option>
            <option value="1965">1965</option>
            <option value="1964">1964</option>
            <option value="1963">1963</option>
            <option value="1962">1962</option>
            <option value="1961">1961</option>
            <option value="1960">1960</option>
            <option value="1959">1959</option>
            <option value="1958">1958</option>
            <option value="1957">1957</option>
            <option value="1956">1956</option>
            <option value="1955">1955</option>
            <option value="1954">1954</option>
            <option value="1953">1953</option>
            <option value="1952">1952</option>
            <option value="1951">1951</option>
            <option value="1950">1950</option>
            <option value="1949">1949</option>
            <option value="1948">1948</option>
            <option value="1947">1947</option>
            <option value="1946">1946</option>
            <option value="1945">1945</option>
            <option value="1944">1944</option>
            <option value="1943">1943</option>
            <option value="1942">1942</option>
            <option value="1941">1941</option>
            <option value="1940">1940</option>
            <option value="1939">1939</option>
            <option value="1938">1938</option>
            <option value="1937">1937</option>
            <option value="1936">1936</option>
            <option value="1935">1935</option>
            <option value="1934">1934</option>
            <option value="1933">1933</option>
            <option value="1932">1932</option>
            <option value="1931">1931</option>
            <option value="1930">1930</option>
            <option value="1929">1929</option>
            <option value="1928">1928</option>
            <option value="1927">1927</option>
            <option value="1926">1926</option>
            <option value="1925">1925</option>
            <option value="1924">1924</option>
            <option value="1923">1923</option>
            <option value="1922">1922</option>
            <option value="1921">1921</option>
            <option value="1920">1920</option>
            <option value="1919">1919</option>
            <option value="1918">1918</option>
            <option value="1917">1917</option>
            <option value="1916">1916</option>
            <option value="1915">1915</option>
            <option value="1914">1914</option>
            <option value="1913">1913</option>
            <option value="1912">1912</option>
            <option value="1911">1911</option>
            <option value="1910">1910</option>
            <option value="1909">1909</option>
            <option value="1908">1908</option>
            <option value="1907">1907</option>
            <option value="1906">1906</option>
            <option value="1905">1905</option>
        </select>
        <br>
        <label for="">Select category</label>
        <br>
        <select name="exam-category" id="" required>
            <option hidden value="">----</option>
            <option value="Regular">Regular</option>
            <option value="Private">Private</option>
        </select>
        <br>
        <label for="">Select sitting</label>
        <br>
        <select name="exam-sitting" id="" required>
            <option hidden value="">----</option>
            <option value="IN ONE SITTING">IN ONE SITTING</option>
            <option value="REVISION">REVISION</option>
        </select>
        <br>
        <label for="">Select group</label>
        <br>
        <select name="std-group" id="" required>
            <option hidden value="">----</option>
            <option value="SCIENCE">SCIENCE</option>
            <option value="ARTS">ARTS</option>
        </select>
        <br>
        <label for="">Student image</label>
        <br>
        <input type="file" name="std-image" required>
        <input type="submit" name="submit">
        <input type="reset">
        <br>
        <br>
        <br>
        <br>
    </form>
</div>






</body>
</html>