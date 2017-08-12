<?php
require("../config.php");

header("Content-Type: application/vnd.ms-excel");

header("Content-Type: ttf=application/font-sfnt");
        
header("Content-Type: CONTENT= text/html; charset=UTF-8");
            
header('Content-Disposition: attachment; filename="servey.xls"');#ชื่อไฟล์

$cur_year=date("Y");
$cur_year_ph = $cur_year + 543;
//2016-04-10
$b_year= $cur_year."-01-01";
$e_year= $cur_year."-12-31";



//$b_year= $cur_year_ph."-01-01";
    //$e_year= $cur_year_ph."-12-31";
    //left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`    and   `tb_record1`.`dmy_insert`   between  $b_year   and  $e_year  "; 
   

?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">

<HTML>

<HEAD>

<meta http-equiv="Content-type" content="text/html;charset=utf-8" />

</HEAD><BODY>

<TABLE  x:str BORDER="1" >

    <TR>
        <TD colspan="4" width="600" align="center"><h1>รายงานผลการสำรวจพฤติกรรมสุขภาพบุคลากร โรงพยาบาลขอนแก่นและเครือข่าย <?php echo $cur_year_ph; ?></h1></TD>
    </TR>   
<TR>

    <!--
<TD><b>AAA</b></TD>

<TD><b>AAA</b></TD>

<TD><b>AAA</b></TD>
-->

<td height="30" align="center" rowspan="2" valign="middle">ข้อมูล</td>
<td height="15" align="center" colspan="2" width="100">ผลการสำรวจ</td>
<td height="30" align="center" rowspan="2" valign="middle">หมายเหตุ</td>
</TR>

<TR>



<TD width="50" align="center">จำนวน</TD>

<TD width="50" align="center">ร้อยละ</TD>


</TR>

    <?php  //------- เพศ------------
    //$b_year= $cur_year_ph."-01-01";
    //$e_year= $cur_year_ph."-12-31";
    //left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`    and   `tb_record1`.`dmy_insert`   between  $b_year   and  $e_year  "; 
      $strsex="  SELECT   *   FROM    `tb_employee`   left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`    and   `tb_record1`.`dmy_insert`   between   '$b_year'   and  '$e_year'   ";   // `tb_employee`.`id_sex`  >  0
      $query_sex=mysql_query($strsex);  
      $num_sex=  mysql_num_rows($query_sex);//จำนวนเพศรวมทั้งหมด
    ?>
    
<TR>
    <td>เพศ (n = <?=$num_sex?>)</td>
    <td></td>
    <td></td>
    <td></td>
</TR>

    <?php //เพศชาย
    //$b_year= $cur_year_ph."-01-01";
    //$e_year= $cur_year_ph."-12-31";
    //left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`    and   `tb_record1`.`dmy_insert`   between  $b_year   and  $e_year  "; 
   //`tb_employee`
    
     $strsex_man=" SELECT * FROM `tb_employee`  left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`    where  `tb_employee`.`id_sex` = 1  and   `tb_record1`.`dmy_insert`   between    '$b_year'   and  '$e_year'   ";
      $query_sex_man=mysql_query($strsex_man);
      $num_sex_man=  mysql_num_rows($query_sex_man);
    ?>
    <?php
    //คิดเป็น % ของเพศชาย
    $m_percent= number_format(  ($num_sex_man/$num_sex)*100 ,2);
    ?>
    
<TR>

    <td>&nbsp; &nbsp; &nbsp; &nbsp; ชาย</td>
    <td align="center"><?=$num_sex_man?></td>
    <td align="center"><?=$m_percent?></td>
    <td></td>
        
</TR>
<?php //เพศหญิง
//$b_year= $cur_year_ph."-01-01";
    //$e_year= $cur_year_ph."-12-31";
    //left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`    and   `tb_record1`.`dmy_insert`   between  $b_year   and  $e_year  "; 
   //`tb_employee`
       
     $strsex_w=" SELECT * FROM `tb_employee`   left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`   where  `tb_employee`.`id_sex` = 2   and   `tb_record1`.`dmy_insert`   between   '$b_year'   and  '$e_year'   ";
      $query_sex_w=mysql_query($strsex_w);
      $num_sex_w=  mysql_num_rows($query_sex_w);
    ?>
    <?php
    //คิดเป็น % ของเพศหญิง
    $w_percent= number_format(  ($num_sex_w/$num_sex)*100 ,2);
    ?> 
    
    <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp; หญิง</td>
        <td align="center"><?=$num_sex_w?></td>
        <td align="center"><?=$w_percent?></td>
        <td></td>
    </tr>
    <?php //อายุทั้งหมด
    //$b_year= $cur_year_ph."-01-01";
    //$e_year= $cur_year_ph."-12-31";
    //left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`    and   `tb_record1`.`dmy_insert`   between  $b_year   and  $e_year  "; 
   //`tb_employee`
       $str_age="  SELECT *  FROM `tb_record1` left  join  `tb_employee`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`  where  `tb_record1`.`dmy_insert`   between    '$b_year'   and  '$e_year'   ";
       $query_age=mysql_query($str_age);
        $c_age=0;
       while($row=  mysql_fetch_object($query_age))
       {
            $c_age += $row->age;  //อายุรวมทั้งหมด
       }
    ?>
    <tr>
        <td>อายุ (n=<?=$c_age?>)</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
     <?php //อายุทั้งหมดของเพศชาย
     //$b_year= $cur_year_ph."-01-01";
    //$e_year= $cur_year_ph."-12-31";
    //left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`    and   `tb_record1`.`dmy_insert`   between  $b_year   and  $e_year  "; 
   //`tb_employee`
       $str_age="  SELECT *  FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main` where   `tb_employee`.`id_sex` =1  and  `tb_record1`.`dmy_insert`   between    '$b_year'   and  '$e_year'    ";
       $query_age=mysql_query($str_age);
        $c_age=0;
       while($row=  mysql_fetch_object($query_age))
       {
            $c_age += $row->age;  //อายุรวมทั้งหมด
             
       }
    ?>
    
    
    <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp; ชาย (n=<?=$c_age?>)</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    
    <?php  //เพศชายอายุน้อยกว่า 21 ปี
    //$b_year= $cur_year_ph."-01-01";
    //$e_year= $cur_year_ph."-12-31";
    //left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`    and   `tb_record1`.`dmy_insert`   between  $b_year   and  $e_year  "; 
   //`tb_employee`
    // $c_age += $row->age;  //อายุรวมทั้งหมด
      $str_age21="  SELECT *  FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main` where   `tb_employee`.`id_sex` =1  and  `tb_record1`.`age` <= 21   and   `tb_record1`.`dmy_insert`   between   '$b_year'   and  '$e_year'  ";
      $query_age21=mysql_query($str_age21);
      $c_age21=0; 
      while($row=  mysql_fetch_object($query_age21))
       {
            $c_age21 += $row->age;  //อายุรวมทั้งหมด   
       }
       if( $c_age21 == 0  )
       {
           $m_percent21=0;
       }
       else
       {
            $m_percent21= number_format( ($c_age21/$c_age)*100 ,2 );         
       }
    ?>
    
     <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; น้อยกว่า 21 ปี </td>
        <td align="center" ><?=$c_age21?></td>
        <td align="center" ><?=$m_percent21?></td>
        <td></td>
    </tr>
    
     <?php  //เพศชายอายุน้อยกว่า 21-30 ปี
     //$b_year= $cur_year_ph."-01-01";
    //$e_year= $cur_year_ph."-12-31";
    //left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`    and   `tb_record1`.`dmy_insert`   between  $b_year   and  $e_year  "; 
   //`tb_employee`
      $str_age2="  SELECT *  FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main` where   `tb_employee`.`id_sex` =1  and  `tb_record1`.`age` between  21 and 30   and   `tb_record1`.`dmy_insert`   between    '$b_year'   and  '$e_year'   ";
      $query_age2=mysql_query($str_age2);
      $c_age3=0; 
      while($row=  mysql_fetch_object($query_age2))
       {
            $c_age3 += $row->age;  //อายุรวมทั้งหมด   
       }
       if( $c_age3 == 0  )
       {
           $m_percent3=0;
       }
       else
       {
           $m_percent3= number_format( ($c_age3/$c_age)*100 ,2 );      
       }
       
       
    ?>
     <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 21 - 30 ปี </td>
        <td align="center" ><?=$c_age3?></td>
        <td align="center" ><?=$m_percent3?></td>
        <td></td>
    </tr>
    
    <?php // 31-40
      $str_age3="  SELECT *  FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main` where   `tb_employee`.`id_sex` =1  and  `tb_record1`.`age` between  31 and 40   and   `tb_record1`.`dmy_insert`   between   '$b_year'   and  '$e_year'  ";
      $query_age3=mysql_query($str_age3);
      $c_age4=0; 
      while($row=  mysql_fetch_object($query_age3))
       {
            $c_age4 += $row->age;  //อายุรวมทั้งหมด   
       }
       if( $c_age4 == 0  )
       {
           $m_percent4=0;
       }
       else
       {
           $m_percent4= number_format( ($c_age4/$c_age)*100 ,2 );      
       }
    ?>   
    
    <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 31 - 40 ปี </td>
        <td align="center" ><?=$c_age4?></td>
        <td align="center" ><?=$m_percent4?></td>
        <td></td>
    </tr>
   
    <!----------    เพศชาย 41-50 ------------------->
    <?php // 41-50
      $str_age4="  SELECT *  FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main` where   `tb_employee`.`id_sex` =1  and  `tb_record1`.`age` between  41 and 50   and   `tb_record1`.`dmy_insert`   between   '$b_year'   and  '$e_year'   ";
      $query_age4=mysql_query($str_age4);
      $c_age5=0; 
      while($row=  mysql_fetch_object($query_age4))
       {
            $c_age5 += $row->age;  //อายุรวมทั้งหมด   
       }
       if( $c_age5 == 0  )
       {
           $m_percent5=0;
       }
       else
       {
           $m_percent5= number_format( ($c_age5/$c_age)*100 ,2 );      
       }
    ?>   
     <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 41 - 50 ปี </td>
         <td align="center" ><?=$c_age5?></td>
        <td align="center" ><?=$m_percent5?></td>
        <td></td>
    </tr>
    <!----------    เพศชาย 41-50 ------------------->
    
    
     <?php // 51-60
      $str_age5="  SELECT *  FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main` where   `tb_employee`.`id_sex` =1  and  `tb_record1`.`age` between  51 and 60   and   `tb_record1`.`dmy_insert`   between   '$b_year'   and  '$e_year'   ";
      $query_age5=mysql_query($str_age5);
      $c_age6=0; 
      while($row=  mysql_fetch_object($query_age5))
       {
            $c_age6 += $row->age;  //อายุรวมทั้งหมด   
       }
       if( $c_age6 == 0  )
       {
           $m_percent6=0;
       }
       else
       {
           $m_percent6= number_format( ($c_age6/$c_age)*100 ,2 );      
       }
    ?>   
    
    <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  51 - 60 ปี </td>
         <td align="center" ><?=$c_age6?></td>
        <td align="center" ><?=$m_percent6?></td>
        <td></td>
    </tr>
   
    <?php //อายุทั้งหมดของเพศหญิง
     //$b_year= $cur_year_ph."-01-01";
    //$e_year= $cur_year_ph."-12-31";
    //left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`    and   `tb_record1`.`dmy_insert`   between  $b_year   and  $e_year  "; 
   //`tb_employee`
       $str_age_w="  SELECT *  FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main` where   `tb_employee`.`id_sex` =2  and  `tb_record1`.`dmy_insert`   between    '$b_year'   and  '$e_year'    ";
       $query_age_w=mysql_query($str_age_w);
        $c_age_w=0;
       while($row=  mysql_fetch_object($query_age_w))
       {
            $c_age_w += $row->age;  //อายุรวมทั้งหมด
             
       }
    ?>
    
     <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp; หญิง (n=<?=$c_age_w?>)</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
  <!-- หญิง น้อยกว่า 21 ปี -->
   <?php  //เพศชายอายุน้อยกว่า 21 ปี
    //$b_year= $cur_year_ph."-01-01";
    //$e_year= $cur_year_ph."-12-31";
    //left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`    and   `tb_record1`.`dmy_insert`   between  $b_year   and  $e_year  "; 
   //`tb_employee`
    // $c_age += $row->age;  //อายุรวมทั้งหมด
      $str_age21w="  SELECT *  FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main` where   `tb_employee`.`id_sex` =2  and  `tb_record1`.`age` <= 21   and   `tb_record1`.`dmy_insert`   between   '$b_year'   and  '$e_year'   ";
      $query_age21w=mysql_query($str_age21w);
      $c_age21w=0; 
      while($row=  mysql_fetch_object($query_age21w))
       {
            $c_age21w += $row->age;  //อายุรวมทั้งหมด   
       }
       if( $c_age21w == 0  )
       {
           $m_percent21w=0;
       }
       else
       {
            $m_percent21w= number_format( ($c_age21w/$c_age_w)*100 ,2 );         
       }
    ?>
    
     <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; น้อยกว่า 21 ปี </td>
        <td align="center" ><?=$c_age21w?></td>
        <td align="center" ><?=$m_percent21w?></td>
        <td></td>
    </tr>
 <!-- หญิง น้อยกว่า 21 ปี --> 
 
 <!--  //เพศชายอายุน้อยกว่า 21-30 ปี  -->
 <?php  //เพศชายอายุน้อยกว่า 21-30 ปี
     //$b_year= $cur_year_ph."-01-01";
    //$e_year= $cur_year_ph."-12-31";
    //left  join  `tb_record1`   on  `tb_record1`.`id_employee_main` =`tb_employee`.`id_employee`    and   `tb_record1`.`dmy_insert`   between  $b_year   and  $e_year  "; 
   //`tb_employee`
      $str_age2w="  SELECT *  FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main` where   `tb_employee`.`id_sex` =2  and  `tb_record1`.`age` between  21 and 30   and   `tb_record1`.`dmy_insert`   between    '$b_year'   and  '$e_year'   ";
      $query_age2w=mysql_query($str_age2w);
      $c_age3w=0; 
      while($row=  mysql_fetch_object($query_age2w))
       {
            $c_age3w += $row->age;  //อายุรวมทั้งหมด   
       }
       if( $c_age3w == 0  )
       {
           $m_percent3w=0;
       }
       else
       {
           $m_percent3w= number_format( ($c_age3w/$c_age_w)*100 ,2 );      
       }
       
       
    ?>
     <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 21 - 30 ปี </td>
        <td align="center" ><?=$c_age3w?></td>
        <td align="center" ><?=$m_percent3w?></td>
        <td></td>
    </tr>
 <!--  //เพศชายอายุน้อยกว่า 21-30 ปี  -->
 
 
 <!-- หญิง น้อยกว่า 31-40 ปี --> 
 <?php // 31-40
      $str_age3w="  SELECT *  FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main` where   `tb_employee`.`id_sex` =2  and  `tb_record1`.`age` between  31 and 40   and   `tb_record1`.`dmy_insert`   between   '$b_year'   and  '$e_year'   ";
      $query_age3w=mysql_query($str_age3w);
      $c_age4w=0; 
      while($row=  mysql_fetch_object($query_age3w))
       {
            $c_age4w += $row->age;  //อายุรวมทั้งหมด   
       }
       if( $c_age4w == 0  )
       {
           $m_percent4w=0;
       }
       else
       {
           $m_percent4w= number_format( ($c_age4w/$c_age_w)*100 ,2 );      
       }
    ?>   
    
    <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 31 - 40 ปี </td>
        <td align="center" ><?=$c_age4w?></td>
        <td align="center" ><?=$m_percent4w?></td>
        <td></td>
    </tr>
   <!-- หญิง น้อยกว่า 31-40 ปี --> 
  
   
   <!----------    เพศหญิง 41-50 ------------------->
    <?php // 41-50
      $str_age4="  SELECT *  FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main` where   `tb_employee`.`id_sex` =1  and  `tb_record1`.`age` between  41 and 50   and   `tb_record1`.`dmy_insert`   between   '$b_year'   and  '$e_year'  ";
      $query_age4=mysql_query($str_age4);
      $c_age5=0; 
      while($row=  mysql_fetch_object($query_age4))
       {
            $c_age5 += $row->age;  //อายุรวมทั้งหมด   
       }
       if( $c_age5 == 0  )
       {
           $m_percent5=0;
       }
       else
       {
           $m_percent5= number_format( ($c_age5/$c_age_w)*100 ,2 );      
       }
    ?>   
     <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 41 - 50 ปี </td>
         <td align="center" ><?=$c_age5?></td>
        <td align="center" ><?=$m_percent5?></td>
        <td></td>
    </tr>
    <!----------    เพศชาย 41-50 ------------------->
    
    
    
     <?php // 51-60
      $str_age5w="  SELECT *  FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main` where   `tb_employee`.`id_sex` =2  and  `tb_record1`.`age` between  51 and 60   and   `tb_record1`.`dmy_insert`   between   '$b_year'   and  '$e_year'   ";
      $query_age5w=mysql_query($str_age5w);
      $c_age6w=0; 
      while($row=  mysql_fetch_object($query_age5w))
       {
            $c_age6w += $row->age;  //อายุรวมทั้งหมด   
       }
       if( $c_age6w == 0  )
       {
           $m_percent6w=0;
       }
       else
       {
           $m_percent6w= number_format( ($c_age6w/$c_age_w)*100 ,2 );      
       }
    ?>   
    
    <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  51 - 60 ปี </td>
         <td align="center" ><?=$c_age6w?></td>
        <td align="center" ><?=$m_percent6w?></td>
        <td></td>
    </tr>
   
    <?php // มากกว่า 60 ปี
      $str_age6w="  SELECT *  FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main` where   `tb_employee`.`id_sex` =2  and  `tb_record1`.`age` >  60   and   `tb_record1`.`dmy_insert`   between   '$b_year'   and  '$e_year'  ";
      $query_age6w=mysql_query($str_age6w);
      $c_age7w=0; 
      while($row=  mysql_fetch_object($query_age6w))
       {
            $c_age7w += $row->age;  //อายุรวมทั้งหมด   
       }
       if( $c_age7w == 0  )
       {
           $m_percent7w=0;
       }
       else
       {
           $m_percent7w= number_format( ($c_age7w/$c_age_w)*100 ,2 );      
       }
    ?>   
    
    <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  มากกว่า 60 ปี </td>
         <td align="center" ><?=$c_age7w?></td>
        <td align="center" ><?=$m_percent7w?></td>
        <td></td>
    </tr>
    
    <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  มากกว่า 60 ปี </td>
         <td align="center" ><?=$c_age7w?></td>
        <td align="center" ><?=$m_percent7w?></td>
        <td></td>
    </tr>
    
    <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  ไม่ระบุ </td>
         <td align="center" ></td>
        <td align="center" ></td>
        <td></td>
    </tr>
    
    
    <!--  ดัชนีมวลกาย -->
     <?php
      $str_bmi="  SELECT   *   FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where      `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
    
      
      $query_bmi = mysql_query( $str_bmi );
      $c_bmi=0; 
      while($row=  mysql_fetch_object($query_bmi))
       {
            $c_bmi += $row->BMI;  //อายุรวมทั้งหมด   
       }
       
    ?>   
      <tr>
        <td>ดัชนีมวลกาย (n=<?=$c_bmi?>) </td>
         <td align="center" ></td>
        <td align="center" ></td>
        <td></td>
    </tr>
   <!--  ดัชนีมวลกาย -->
   
 <!--  ดัชนีมวลกาย  ผอม น้อยกว่า 18.5 --> 
 <?php
    $str_bmi1="  SELECT   *   FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where    `tb_record1`.`BMI`  < 18.5    and     `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
    
      
      $query_bmi1 = mysql_query( $str_bmi1 );
      $c_bmi1=0; 
      while($row=  mysql_fetch_object($query_bmi1))
       {
            $c_bmi1 += $row->BMI;  //อายุรวมทั้งหมด   
       }
       if(  $c_bmi1  =  0 )
       {
            $percen_bmi1=0;
       }
       else
       {
           $percen_bmi1 = number_format( ($c_bmi1/$c_bmi)*100 );
       }
?>       
   <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;ผอม (น้อยกว่า 18.5)</td>
         <td align="center" ><?=$c_bmi1?></td>
        <td align="center" ><?=$percen_bmi1?></td>
        <td></td>
    </tr>
   <!--  ดัชนีมวลกาย  ผอม น้อยกว่า 18.5 -->  
   
   <!--  ดัชนีมวลกาย  ผอม น้อยกว่า 18.5-22.9 --> 
 <?php
    $str_bmi2="  SELECT   *   FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where    `tb_record1`.`BMI`  >= 18.5    and   `tb_record1`.`BMI` <= 22.9  and     `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
      $query_bmi2 = mysql_query( $str_bmi2 );
      $c_bmi2=0; 
      while($row=  mysql_fetch_object($query_bmi2))
       {
            $c_bmi2 += $row->BMI;  //อายุรวมทั้งหมด   
       }
       if(  $c_bmi2  =  0 )
       {
            $percen_bmi2=0;
       }
       else
       {
           $percen_bmi2 = number_format( ($c_bmi2/$c_bmi)*100 );
       }
?>       
   <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;ปกติ ( 18.5 - 22.9 )</td>
         <td align="center" ><?=$c_bmi2?></td>
        <td align="center" ><?=$percen_bmi2?></td>
        <td></td>
    </tr>
   <!--  ดัชนีมวลกาย  ผอม น้อยกว่า 18.5-22.9 -->  
   
    <!--  ดัชนีมวลกาย  ผอม น้อยกว่า 23.0-24.9 -->  
     <?php
    $str_bmi3="  SELECT   *   FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where    `tb_record1`.`BMI`  >= 23.0    and   `tb_record1`.`BMI` <= 24.9  and     `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
      $query_bmi3 = mysql_query( $str_bmi3 );
      $c_bmi3=0; 
      while($row=  mysql_fetch_object($query_bmi3))
       {
            $c_bmi3 += $row->BMI;  //อายุรวมทั้งหมด   
       }
       if(  $c_bmi3  =  0 )
       {
            $percen_bmi3=0;
       }
       else
       {
           $percen_bmi3 = number_format( ($c_bmi3/$c_bmi)*100 );
       }
?>   
    <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;น้ำหนักเกิน ( 23.0 - 24.9 )</td>
         <td align="center" ><?=$c_bmi3?></td>
        <td align="center" ><?=$percen_bmi3?></td>
        <td></td>
    </tr>
    <!--  ดัชนีมวลกาย  ผอม น้อยกว่า 23.0-24.9 -->  
   
    
    <!--  ดัชนีมวลกาย  อ้วน ( 25.0 - 29.9 ) -->  
     <?php
    $str_bmi4="  SELECT   *   FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where    `tb_record1`.`BMI`  >= 25.0    and   `tb_record1`.`BMI` <= 29.9  and     `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
      $query_bmi4 = mysql_query( $str_bmi4 );
      $c_bmi4=0; 
      while($row=  mysql_fetch_object($query_bmi4))
       {
            $c_bmi4 += $row->BMI;  //อายุรวมทั้งหมด   
       }
       if(  $c_bmi4  =  0 )
       {
            $percen_bmi4=0;
       }
       else
       {
           $percen_bmi4 = number_format( ($c_bmi4/$c_bmi)*100 );
       }
?>  
    <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;อ้วน ( 25.0 - 29.9 )</td>
         <td align="center" ><?=$c_bmi4?></td>
        <td align="center" ><?=$percen_bmi4?></td>
        <td></td>
    </tr>
    
   <!-- อ้วนอันตราย ( มากกว่าหรือเท่ากับ 30 )  --> 
    <?php
    $str_bmi5="  SELECT   *   FROM `tb_record1`  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where    `tb_record1`.`BMI`  >= 30     and     `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
      $query_bmi5 = mysql_query( $str_bmi4 );
      $c_bmi5=0; 
      while($row=  mysql_fetch_object($query_bmi5))
       {
            $c_bmi5 += $row->BMI;  //อายุรวมทั้งหมด   
       }
       if(  $c_bmi5  =  0 )
       {
            $percen_bmi5=0;
       }
       else
       {
           $percen_bmi5 = number_format( ($c_bmi5/$c_bmi)*100 );
       }
?>
   
      <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;อ้วนอันตราย ( มากกว่าหรือเท่ากับ 30 )</td>
         <td align="center" ><?=$c_bmi5?></td>
        <td align="center" ><?=$percen_bmi5?></td>
        <td></td>
    </tr>
   
   <!-- อ้วนอันตราย ( มากกว่าหรือเท่ากับ 30 )  --> 
   
      <?php
      //  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`     where        `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year' 
    $str_AR="  SELECT   *   FROM `tb_record1`   left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where       `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
      $query_AR = mysql_query( $str_AR );
      $c_all_ar=0; 
      while($row=  mysql_fetch_object($query_AR))
       {
             $c_all_ar  += $row->AR;  
       }
      
      
?>
   <tr>
        <td>รอบเอว (n=<?=$c_all_ar?>)</td>
         <td align="center" ></td>
        <td align="center" ></td>
        <td></td>
    </tr>
   
   <?php
      //  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`     where        `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year' 
    $str_m="  SELECT   *   FROM `tb_record1`   left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where      `tb_employee`.`id_sex` = 1  and   `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
      $query_m = mysql_query( $str_m );
      $c_ar_m=0; 
      while($row=  mysql_fetch_object($query_m))
       {
             $c_ar_m  += $row->AR;  //อายุรวมทั้งหมด   
       }  // $c_all_ar  += $row->AR;  
       if(  $c_ar_m == 0 )
       {
           $percent_ar_m=   0;
       }
       else
       {
            $percent_ar_m=   ($c_ar_m/$c_all_ar)*100;
       }
      
?>
   <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;ชาย (n=<?=$c_ar_m?>)</td>
         <td align="center" ></td>
        <td align="center" ></td>
        <td></td>
    </tr>
    
 <?php
      //  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`     where        `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year' 
    $str_m="  SELECT   *   FROM `tb_record1`   left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where      `tb_employee`.`id_sex` = 1  and   `tb_record1`.`AR` <= 90  and   `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
      $query_m = mysql_query( $str_m );
      $c_ar_m=0; 
      while($row=  mysql_fetch_object($query_m))
       {
             $c_ar_m  += $row->AR;  //อายุรวมทั้งหมด   
       }
      //  $percent_ar_m=   ($c_ar_m/$c_all_ar)*100;
       if( $c_ar_m  == 0 )
       {
           $percent_ar_m=0;
       }
       else
       {
           $percent_ar_m= number_format( ($c_ar_m/$c_all_ar)*100 ,2);
       }
?>  
     <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;ปกติ (น้อยกว่าหรือเท่ากับ 90  เซนติมเตร )</td>
         <td align="center" ><?=$c_ar_m?></td>
        <td align="center" ><?=$percent_ar_m?></td>
        <td></td>
    </tr>
   <?php
      //  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`     where        `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year' 
    $str_m2="  SELECT   *   FROM `tb_record1`   left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where      `tb_employee`.`id_sex` = 1  and   `tb_record1`.`AR` > 90  and   `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
      $query_m2 = mysql_query( $str_m2 );
      $c_ar_m2=0; 
      while($row=  mysql_fetch_object($query_m2))
       {
             $c_ar_m2  += $row->AR;  //อายุรวมทั้งหมด   
       } //$percent_ar_m= number_format( ($c_ar_m/$c_all_ar)*100 ,2);
      if( $c_ar_m2  == 0)
      {
          $percent_ar_m2=0;
      }else
      {
          $percent_ar_m2= number_format( ($c_ar_m2/$c_all_ar)*100 ,2);
      }
      
?>  
    <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;เกิน (มากกว่า 90  เซนติมเตร )</td>
         <td align="center" ><?=$c_ar_m2?></td>
        <td align="center" ><?=$percent_ar_m2?></td>
        <td></td>
    </tr>
  
        <?php
      //  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`     where        `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year' 
    $str_w="  SELECT   *   FROM `tb_record1`   left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where      `tb_employee`.`id_sex` = 2  and   `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
      $query_w = mysql_query( $str_w );
      $c_ar_w=0; 
      while($row=  mysql_fetch_object($query_w))
       {
             $c_ar_w  += $row->AR;  //อายุรวมทั้งหมด   
       }  // $c_all_ar  += $row->AR;  
       if(  $c_ar_w == 0 )
       {
           $percent_ar_w=   0;
       }
       else
       {
            $percent_ar_w=   ($c_ar_w/$c_all_ar)*100;
       }
      
?>
   <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;หญิง (n=<?=$c_ar_w?>)</td>
         <td align="center" ></td>
        <td align="center" ></td>
        <td></td>
    </tr>  
   
   <?php
      //  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`     where        `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year' 
    $str_w1="  SELECT   *   FROM `tb_record1`   left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where      `tb_employee`.`id_sex` = 2  and   `tb_record1`.`AR` <= 80  and   `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
      $query_w1 = mysql_query( $str_w1 );
      $c_ar_w1=0; 
      while($row=  mysql_fetch_object($query_w1))
       {
             $c_ar_w1  += $row->AR;  //อายุรวมทั้งหมด   
       }
      //  $percent_ar_m=   ($c_ar_m/$c_all_ar)*100;
       if( $c_ar_w1  == 0 )
       {
           $percent_ar_w1=0;
       }
       else
       {
           $percent_ar_w1= number_format( ($c_ar_w1/$c_all_ar)*100 ,2);
       }
?>  
     <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;ปกติ (น้อยกว่าหรือเท่ากับ 80  เซนติมเตร )</td>
         <td align="center" ><?=$c_ar_w1?></td>
        <td align="center" ><?=$percent_ar_w1?></td>
        <td></td>
    </tr>
  
     <?php
      //  left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`     where        `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year' 
    $str_w2="  SELECT   *   FROM `tb_record1`   left  join  `tb_employee`   on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where      `tb_employee`.`id_sex` = 2  and   `tb_record1`.`AR` > 80  and   `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
      $query_w2 = mysql_query( $str_w2 );
      $c_ar_w2=0; 
      while($row=  mysql_fetch_object($query_w2))
       {
             $c_ar_w2  += $row->AR;  //อายุรวมทั้งหมด   
       }
      //  $percent_ar_m=   ($c_ar_m/$c_all_ar)*100;
       if( $c_ar_w2  == 0 )
       {
           $percent_ar_w2=0;
       }
       else
       {
           $percent_ar_w2= number_format( ($c_ar_w2/$c_all_ar)*100 ,2);
       }
?>  
     <tr>
        <td>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;เกิน (มากกว่า 80  เซนติมเตร )</td>
         <td align="center" ><?=$c_ar_w2?></td>
        <td align="center" ><?=$percent_ar_w2?></td>
        <td></td>
    </tr>
   
  
    <TR>
        <TD colspan="4" width="600" align="center"><h1>โรคประจำตัว</h1></TD>
        
    </TR>  
   <tr>
       <td height="30" align="center" rowspan="2" valign="middle">ข้อมูล</td>
<td height="15" align="center" colspan="2" width="100">ผลการสำรวจ</td>
<td height="30" align="center" rowspan="2" valign="middle">หมายเหตุ</td>
   </tr>
   
   <TR>
<TD width="50" align="center">จำนวน</TD>
<TD width="50" align="center">ร้อยละ</TD>
</TR>

  <?php
       //id_disease
      //diag_detail
       $str_disease =" SELECT * FROM   `tb_record1`   left  join  `tb_disease`   on    `tb_record1`.`diag_detail`=`tb_disease`.`id_disease`  and   `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'   ";
       $query_disease=mysql_query($str_disease);
       $num_disease=  mysql_numrows($query_disease); //นับจำนวนโรคประจำ
      
      if(  $num_disease > 0 )
      {
          //--------- นับจำนวนโรคทั้งหมด-----------
          $str_all_dis=" SELECT  *    FROM `tb_record1`   where  `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'   ";
          $q_all_dis=mysql_query($str_all_dis);
          $num_all_dis=  mysql_num_rows($q_all_dis);
         //--------- นับจำนวนโรคทั้งหมด-----------
          while($row=  mysql_fetch_object( $query_disease))
          {
              ++$plus_dis;
             $id_disease=$row->id_disease;
              $disease_detail=$row->disease_detail;
              //tb_record1`.`diag_detail` = $id_disease   and
                $str_dis="  SELECT  *   FROM `tb_record1`    where    diag_detail =  $id_disease   and   `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'    ";
                $q_disease=  mysql_query($str_dis);
                $num_disease=  mysql_num_rows($q_disease); //นับจำนวนทั้งหมดของโรคใน table
                
                $percent_dis1= number_format ( ($num_disease / $num_all_dis)*100,2 );
              ?>
   <TR>
     <TD width="50" align="left"><?=$disease_detail?></TD>  
<TD width="50" align="center"><?=$num_disease?></TD>
<TD width="50" align="center"><?= $percent_dis1?></TD>
<TD width="50" align="center"></TD>
</TR>
   
             <?php
          }
      }
   ?>     
   
   
   
   
   
  
   
   
   
   
   
   
</TABLE>
    
    <table>
        
        <?php //โรคประจำตัวจำนวนทั้งหมด
      $str_dis_all2=" SELECT   *    FROM `tb_record1`  where    diag_detail > 0   and   `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'    ";
      $query_str_dis_all2=mysql_query( $str_dis_all2);
      $num_query_str_dis_all2=  mysql_num_rows($query_str_dis_all2);
   ?>
        <tr>
       <td  colspan="4" width="600" align="center" ><h3>โรคประจำตัว จำนวน  <?=$num_query_str_dis_all2?> คน</h3></td>
   </tr>
        
    
   <?php  //รายชื่อ  โรคประจำตัวจำนวนทั้งหมด
      $str_dis_name=" SELECT   *    FROM  `tb_record1`  "
              . "left   join   `tb_employee`   on   `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`    "
              ."  left  join  `tb_disease`   on    `tb_record1`.`diag_detail`=`tb_disease`.`id_disease`      "
              . "where    diag_detail > 0   and   `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'    ";
      $query_str_dis_name=mysql_query(  $str_dis_name );
       $num_query_name=  mysql_num_rows( $query_str_dis_name );
         if( $num_query_name > 0 )
         { 
             $rows_number=0;
                while( $row=  mysql_fetch_object($query_str_dis_name) )
                {
                    ++$rows_number;
                             $name=$row->name;
                             $surname=$row->surname;
                             $disease_detail=$row->disease_detail;
                       ?>
   <tr>
       <td><?=$rows_number?></td>
       <td><?=$name?></td>
       <td><?=$surname?></td>
       <td><?=$disease_detail?></td>
   </tr>
                      <?php
                }
   
         }
   ?>    
        
     <?php  //สูบบุหรี่จำนวนคน
      $str_smoke=" SELECT * FROM `tb_record1`  where   smoke > 0  and      `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
      $query_smoke=  mysql_query($str_smoke);
      $num_smoke=  mysql_num_rows($query_smoke);
   ?>
   
   <tr>
       <td ><h4>สูบบุหรี่ จำนวน  <?=$num_smoke?> คน</h4></td>
   </tr>   
        
        <?php  //  bmi  ค่าดัชนีมวลกาย อ้วน (25.0 - 29.9 กม./ม.<sup>2</sup> ) จำนวน 
     $str_bmi9="  SELECT * FROM `tb_record1`  "
             ."  left   join   `tb_employee`   on  `tb_record1`.`id_employee_main`=  `tb_employee`.`id_employee`    "
             . "where   `tb_record1`.`BMI`  >=  25   and  `tb_record1`.`BMI`  <=   29.9    and    `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
     $query_bmi9=mysql_query($str_bmi9);
     $num_bmi9=  mysql_num_rows( $query_bmi9 );
   ?>
   <tr>
       <td colspan="4"><h4>  ค่าดัชนีมวลกาย อ้วน (25.0 - 29.9 กม./ม.<sup>2</sup> ) จำนวน   <?=$num_bmi9?> คน</h4></td>
   </tr>
        
    </table>
    
    <table border="1">
        <tr>
            <td></td>
            <td>น้ำหนัก (กิโลกรัม)</td>
            <td>ส่วนสูง (เมตร)</td>
            <td>ค่าดัชนีมวลกาย</td>
        </tr>
        <?php
        $number_row=0;
         while($row=  mysql_fetch_object($query_bmi9))
         {
             $number_row++;
              $name=$row->name;
              $surname=$row->surname;
              $w=$row->w;
              $H=$row->H;
              $BMI=$row->BMI;
              ?>
        <tr>
              <td><?=$number_row?>.<?=$name?>  <?=$surname?></td>
              <td align="center" ><?=$w?></td>
              <td align="center" ><?=$H?></td>
               <td align="center" ><?=$BMI?></td>
        </tr>
              <?php
         }
        ?>
    </table>

    <?php  //  bmi  ค่าดัชนีมวลกาย อ้วน (25.0 - 29.9 กม./ม.<sup>2</sup> ) จำนวน 
     $str_bmi10="  SELECT * FROM `tb_record1`  "
             ."  left   join   `tb_employee`   on  `tb_record1`.`id_employee_main`=  `tb_employee`.`id_employee`    "
             . "where   `tb_record1`.`BMI`  >=  30       and    `tb_record1`.`dmy_insert`   between  '$b_year'   and  '$e_year'  ";
     $query_bmi10=mysql_query($str_bmi10);
     $num_bmi10=  mysql_num_rows( $query_bmi10 );
   ?>
    
    <table>
        <td colspan="4">ค่าดัชนีมวลกาย อ้วนอันตราย ( 30 กก./ม.<sup>2</sup>  ขึ้นไป ) จำนวน  <?=$num_bmi10?> คน </td>
         
    </table>
    
    <table border="1">
       <?php
        $number_row10=0;
         while($row=  mysql_fetch_object($query_bmi10))
         {
             $number_row10++;
              $name=$row->name;
              $surname=$row->surname;
              $w=$row->w;
              $H=$row->H;
              $BMI=$row->BMI;
              ?>
        <tr>
              <td><?=$number_row10?>.<?=$name?>  <?=$surname?></td>
              <td align="center" ><?=$w?></td>
              <td align="center" ><?=$H?></td>
               <td align="center" ><?=$BMI?></td>
        </tr>
              <?php
         }
        ?> 
    </table>
    
</BODY>

</HTML>