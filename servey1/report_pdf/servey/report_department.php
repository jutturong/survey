<?php

#  http://localhost/servey1/report_pdf/servey/report_case2.php
# http://localhost/servey1/report_pdf/servey/report_case2.php?y=2016
require_once("../config.php");
////require_once("../config.php");
require_once("pdf_class.php"); //class PDF
//require_once("query_diagnosis.php");
//require_once("query_department.php");

//$cure_date=date("Y");
$cure_date=$_REQUEST["y"];
$date_begin=$cure_date."-1-1";
$date_end=$cure_date."-12-31";

// and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'      ";

//แยกตามแผนก=>id_department  SELECT * FROM `tb_employee`   
//http://localhost/servey1/report_pdf/servey/report_department.php?y=2016&id_department=9
$id_department=$_REQUEST['id_department'];
//  `tb_employee`.id_department=$id_department 
//join  `tb_employee`   on  `tb_record1`.id_employee_main=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department  ";  //730
    

##---- PDF ---
$pdf=new PDF('P','mm','A4');  //ของเดิม 
$pdf->SetMargins( 25,25,5 );
$pdf->AddPage();
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');

$x_absolute=25; //พิกัด X
$y_absolute=20; //พิกัด Y
$r=7;  //ระยะห่าง

##-- PAGE 1   
##---- เลขหน้า ----------
    $pdf->SetFont('angsana','',12);
    $pdf->setXY( $x_absolute + 160 , $y_absolute - 10 );
    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'Page  1' )  );
##---- เลขหน้า ---------- 
    
    
##-- head table -----
$pdf->head_table(70,20,25,'b'); //($x_absolute,$y_absolute,$fontSize,$b)   //หัวโปรแกรม
$pdf->SetFont('angsana','BU',20);
//$pdf->setXY( $x_absolute, $y_absolute +  ($r*1)  );
$pdf->setXY( 60, $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','B',13);
//$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'คลินิคผู้ป่วยนอกโรคลมชัก โรงพยาบาลศรีนครินทร์' ));
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "".'รายงานผลการสำรวจพฤติกรรมสุขภาพบุคลากร โรงพยาบาลขอนแก่นและเครือข่าย ' ));


$pdf->setXY( 60, $y_absolute +  ($r*2)  );
$pdf->SetFont('angsana','B',13);
//$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'คลินิคผู้ป่วยนอกโรคลมชัก โรงพยาบาลศรีนครินทร์' ));
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'จากผลสำรวจในเดือน เมษายน 2559 ' ));



$pdf->setXY( 60, $y_absolute +  ($r*3)  );
$pdf->SetFont('angsana','B',13);
//$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'คลินิคผู้ป่วยนอกโรคลมชัก โรงพยาบาลศรีนครินทร์' ));
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' ,""."วิเคราะห์ผล(ประจำปี) : 2558" ));


$pdf->Image('../icon/kkh.jpg',10,12,35,0,'','');//Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])

$pdf->setXY( 120 , $y_absolute +  ($r*2)  );
$pdf->SetFont('angsana','',13);

//------------------- หัวตาราง----------------------------------------------------------------
$pdf->setXY( 10 , $y_absolute +  ($r*5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 10 , iconv( 'UTF-8','cp874' , 'ข้อมูล' ),LRTB,1,'C',true);



$pdf->setXY( 90 , $y_absolute +  ($r*5)  );
$pdf->SetFont('angsana','B',13); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'ผลการสำรวจ' ),LRTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 10 , iconv( 'UTF-8','cp874' , 'หมายเหตุ' ),LRTB,1,'C',true);

//----------- บรรทัดใหม่ -------------

$pdf->setXY( 90 , $y_absolute +  ($r*5.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , 'จำนวน' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*5.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , 'ร้อยละ' ),LRTB,1,'C',true);

//--------------- สิ้นสุดหัวตาราง----------------------------------------------------------------

//----------- บรรทัดใหม่ -------------
##------------------เพศ รวม -------------------
  $str_all_sex="SELECT    *   FROM   `tb_employee`  left  join  `tb_record1`  on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`   where  `tb_employee`.id_department=$id_department   and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'   ";
  $query_all_sex=mysql_query($str_all_sex);
  $num_all_sex=mysql_num_rows($query_all_sex);
##------------------เพศ รวม -------------------
  
$pdf->setXY( 10 , $y_absolute +  ($r*6.41)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'เพศ ( n = '.$num_all_sex.' )' ),LRTB,1,'L',true);
//$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'เพศ ( n = '.$date_end.' )' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*6.41)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

$pdf->setXY( 115 , $y_absolute +  ($r*6.41)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


$pdf->setXY( 140 , $y_absolute +  ($r*6.41)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//----------- บรรทัดใหม่ -------------
//---------- เพศชาย--รวมทั้งหมด-----------------
//  `tb_employee`.id_department=$id_department 
$str_sex_m="SELECT * FROM `tb_employee`  left  join  `tb_record1`  on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`    where  `id_sex`=1   and   `tb_employee`.id_department=$id_department   and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'   ";
$q_str_sex_m=mysql_query($str_sex_m);
$num_sex_m=mysql_num_rows($q_str_sex_m);
//$num_all_sex
if( $num_all_sex > 0 )
{
    $num_sex_m_percent= number_format( ($num_sex_m/$num_all_sex)*100 ,2 );
}
else
{
    $num_sex_m_percent=0;
}
        
$pdf->setXY( 10 , $y_absolute +  ($r*7.14)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         ชาย' ),LRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*7.14)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_sex_m ),LRB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*7.14)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_sex_m_percent ),LRB,1,'C',true);



$pdf->setXY( 140 , $y_absolute +  ($r*7.14)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRB,1,'C',true);

//--------- บรรทัดใหม่------------

//---------- เพศหญิง--รวมทั้งหมด-----------------
$str_sex_w="SELECT * FROM `tb_employee`  left  join  `tb_record1`  on   `tb_employee`.`id_employee`  =  `tb_record1`.`id_employee_main`    where  `tb_employee`.`id_sex`=2   and  `tb_employee`.id_department=$id_department    and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'   ";
$q_str_sex_w=mysql_query($str_sex_w);
$num_sex_w=mysql_num_rows($q_str_sex_w);
//$num_all_sex
if(  $num_all_sex  > 0 )
{
$num_sex_w_percent= number_format( ($num_sex_w/$num_all_sex)*100 ,2 );
}
else
{
    $num_all_sex=0;
}

$pdf->setXY( 10 , $y_absolute +  ($r*7.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         หญิง ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*7.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_sex_w ),LTRB,1,'C',true);



$pdf->setXY( 115 , $y_absolute +  ($r*7.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $num_sex_w_percent ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*7.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//--------- บรรทัดใหม่------------

//----------- บรรทัดใหม่ -------------
//  `tb_employee`.id_department=$id_department 
$str_age="SELECT * FROM `tb_record1`  join  `tb_employee`   on  `tb_record1`.id_employee_main=`tb_employee`.`id_employee`     where   `tb_employee`.id_department=$id_department  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_str_age=mysql_query($str_age);
//$num_all_ager=mysql_num_rows($q_str_age);
$count_age=0;
while($row=  mysql_fetch_object($q_str_age))
{
     $age=$row->age;
     $count_age += $age;
}


$pdf->setXY( 10 , $y_absolute +  ($r*8.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'อายุ ( n = '.$count_age.' )' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*8.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

$pdf->setXY( 115 , $y_absolute +  ($r*8.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

$pdf->setXY( 140 , $y_absolute +  ($r*8.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


//----------- บรรทัดใหม่ -------------
//---------- เพศชาชาย----------------
//join  `tb_employee`   on  `tb_record1`.id_employee_main=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department  ";  //730
$str_age_m="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`   where   `tb_employee`.`id_sex`=1   and  `tb_employee`.`id_department`  = $id_department  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_str_age_m=mysql_query($str_age_m);
//$num_all_ager=mysql_num_rows($q_str_age);
$count_age_m=0;
while($row=  mysql_fetch_object($q_str_age_m))
{
     $age=$row->age;
     $count_age_m += $age;
}
if( $count_age > 0 )
{
   $count_age_m_percen = number_format(  ($count_age_m/$count_age)*100 , 2 );
}
else{
    $count_age_m_percen =0;
}




$pdf->setXY( 10 , $y_absolute +  ($r*9.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         ชาย (n ='.$count_age_m.')' ),LTRB,1,'L',true);



$pdf->setXY( 90 , $y_absolute +  ($r*9.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LTRB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*9.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),RTB,1,'L',true);


$pdf->setXY( 140 , $y_absolute +  ($r*9.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


//#------------ ภายใน บรรทัด ---------------------------------
//join  `tb_employee`   on  `tb_record1`.id_employee_main=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department  ";  //730
$str_age_m1="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where   `tb_employee`.`id_sex`=1   and  `tb_employee`.id_department=$id_department  and  `tb_record1`.`age`  between  21  and  30   and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_str_age_m1=mysql_query($str_age_m1);
$count_age_m1=0;
while($row=  mysql_fetch_object($q_str_age_m1))
{
     $age=$row->age;
     $count_age_m1 += $age;
}

if( $count_age_m > 0 )
{
      $count_age_m1_percen = number_format( ($count_age_m1/$count_age_m)*100,2  );
}else
{
     $count_age_m1_percen=0;
}




$pdf->setXY( 10 , $y_absolute +  ($r*9.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'21 - 30 ปี  ' ),LRTB,1,'L',true);



$pdf->setXY( 90 , $y_absolute +  ($r*9.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_age_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*9.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $count_age_m1_percen ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*9.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


//#------------ ภายใน บรรทัด ---------------------------------
//join  `tb_employee`   on  `tb_record1`.id_employee_main=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department  ";  //730
$str_age_m2="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where   `tb_employee`.`id_sex`=1  and   `tb_record1`.`age`  between  31 and 40    and   `tb_employee`.id_department=$id_department   and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_str_age_m2=mysql_query($str_age_m2);

$count_age_m2=0;
while($row=  mysql_fetch_object($q_str_age_m2))
{
     $age=$row->age;
     $count_age_m2 += $age;
}
//$count_age_m2_percen = number_format(  ($count_age_m2/$count_age_m)*100 , 2 );
if( $count_age_m > 0 )
{
      $count_age_m2_percen = number_format( ($count_age_m2/$count_age_m)*100,2  );
}else
{
     $count_age_m2_percen=0;
}

 


$pdf->setXY( 10 , $y_absolute +  ($r*10.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'31 - 40 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*10.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_age_m2 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*10.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $count_age_m2_percen ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*10.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


//#------------ ภายใน บรรทัด ---------------------------------
//join  `tb_employee`   on  `tb_record1`.id_employee_main=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department  ";  //730
$str_age_m3="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where   `tb_employee`.`id_sex`=1  and   `tb_record1`.`age`  between  41 and 50    and   `tb_employee`.id_department=$id_department   and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_str_age_m3=mysql_query($str_age_m3);

$count_age_m3=0;
while($row=  mysql_fetch_object($q_str_age_m3))
{
     $age=$row->age;
     $count_age_m3 += $age;
}
//$count_age_m2_percen = number_format(  ($count_age_m2/$count_age_m)*100 , 2 );
if( $count_age_m > 0 )
{
      $count_age_m3_percen = number_format( ($count_age_m3/$count_age_m)*100,2  );
}else
{
     $count_age_m3_percen=0;
}


$pdf->setXY( 10 , $y_absolute +  ($r*11.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'41 - 50 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*11.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_age_m3 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*11.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $count_age_m3_percen ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*11.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//--------------- ขึ้นบรรทัดใหม่------------------------------
//join  `tb_employee`   on  `tb_record1`.id_employee_main=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department  ";  //730
$str_age_m4="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where   `tb_employee`.`id_sex`=1  and   `tb_record1`.`age`  between  51 and 60    and   `tb_employee`.id_department=$id_department   and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_str_age_m4=mysql_query($str_age_m4);

$count_age_m4=0;
while($row=  mysql_fetch_object($q_str_age_m4))
{
     $age=$row->age;
     $count_age_m4 += $age;
}
//$count_age_m2_percen = number_format(  ($count_age_m2/$count_age_m)*100 , 2 );
if( $count_age_m > 0 )
{
      $count_age_m4_percen = number_format( ($count_age_m4/$count_age_m)*100,2  );
}else
{
     $count_age_m4_percen=0;
}


$pdf->setXY( 10 , $y_absolute +  ($r*12.0)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'51 - 60 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*12.0)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_age_m4 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*12.0)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $count_age_m4_percen ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*12.0)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//------------------ ขึ้นบรรทัดใหม่--------------------------
//----------หญิง n---------------------------------------------
//---------- เพศชาชาย----------------
//join  `tb_employee`   on  `tb_record1`.id_employee_main=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department  ";  //730
$str_age_w="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`   where   `tb_employee`.`id_sex`=2   and  `tb_employee`.`id_department`  = $id_department  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_str_age_w=mysql_query($str_age_w);
//$num_all_age_w=mysql_num_rows($q_str_age);
$count_age_w=0;
while($row=  mysql_fetch_object($q_str_age_w))
{
     $age=$row->age;
     $count_age_w += $age;
}

//$count_age_m_percen = number_format(  ($count_age_w/$count_age)*100 , 2 );


$pdf->setXY( 10 , $y_absolute +  ($r*12.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 105  , 5 , iconv( 'UTF-8','cp874' , '         หญิง ( n='.$count_age_w.")" ),LRTB,1,'L',true);

$pdf->setXY( 115 , $y_absolute +  ($r*12.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_w1 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*12.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);
//---------------ขึ้นบรรทัดใหม่----------------------------------
//join  `tb_employee`   on  `tb_record1`.id_employee_main=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department  ";  //730
$str_age_w1="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where   `tb_employee`.`id_sex`=2   and  `tb_employee`.id_department=$id_department  and  `tb_record1`.`age`  between  21  and  30  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end' ";  //730
$q_str_age_w1=mysql_query($str_age_w1);
$count_age_w1=0;
while($row=  mysql_fetch_object($q_str_age_w1))
{
     $age=$row->age;
     $count_age_w1 += $age;
}
//$count_age_w
if( $count_age_w > 0 )
{
      $count_age_w1_percen = number_format( ($count_age_w1/$count_age_w)*100,2  );
}else
{
     $count_age_w1_percen=0;
}

#------------ ภายใน บรรทัด ---------------------------------
$pdf->setXY( 10 , $y_absolute +  ($r*13.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'21 - 30 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*13.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_age_w1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*13.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $count_age_w1_percen ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*13.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//-----------------ขึ้นบรรทัดใหม่---------------------------
//join  `tb_employee`   on  `tb_record1`.id_employee_main=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department  ";  //730
$str_age_w2="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where   `tb_employee`.`id_sex`=2   and  `tb_employee`.id_department=$id_department  and  `tb_record1`.`age`  between  31  and  40  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end' ";  //730
$q_str_age_w2=mysql_query($str_age_w2);
$count_age_w2=0;
while($row=  mysql_fetch_object($q_str_age_w2))
{
     $age=$row->age;
     $count_age_w2 += $age;
}
//$count_age_w
if( $count_age_w > 0 )
{
      $count_age_w2_percen = number_format( ($count_age_w2/$count_age_w)*100,2  );
}else
{
     $count_age_w2_percen=0;
}


$pdf->setXY( 10 , $y_absolute +  ($r*14.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'31 - 40 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*14.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_age_w2 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*14.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $count_age_w2_percen ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*14.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//----------------------ขึ้นบรรทัดใหม่---------------------------------
//join  `tb_employee`   on  `tb_record1`.id_employee_main=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department  ";  //730
$str_age_w3="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where   `tb_employee`.`id_sex`=2   and  `tb_employee`.id_department=$id_department  and  `tb_record1`.`age`  between  41  and  50  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_str_age_w3=mysql_query($str_age_w3);
$count_age_w3=0;
while($row=  mysql_fetch_object($q_str_age_w3))
{
     $age=$row->age;
     $count_age_w3 += $age;
}
//$count_age_w
if( $count_age_w > 0 )
{
      $count_age_w3_percen = number_format( ($count_age_w3/$count_age_w)*100,2  );
}else
{
     $count_age_w3_percen=0;
}

$pdf->setXY( 10 , $y_absolute +  ($r*14.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'41 - 50 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*14.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_age_w3 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*14.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $count_age_w3_percen ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*14.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);
//---------------- ขึ้นบรรทัดใหม่----------------------------
//join  `tb_employee`   on  `tb_record1`.id_employee_main=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department  ";  //730
$str_age_w4="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where   `tb_employee`.`id_sex`=2   and  `tb_employee`.id_department=$id_department  and  `tb_record1`.`age`  between  51  and  60  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_str_age_w4=mysql_query($str_age_w4);
$count_age_w4=0;
while($row=  mysql_fetch_object($q_str_age_w4))
{
     $age=$row->age;
     $count_age_w4 += $age;
}
//$count_age_w
if( $count_age_w > 0 )
{
      $count_age_w4_percen = number_format( ($count_age_w4/$count_age_w)*100,2  );
}else
{
     $count_age_w4_percen=0;
}

$pdf->setXY( 10 , $y_absolute +  ($r*14.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'51 - 60 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*14.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_age_w4 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*14.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $count_age_w4_percen ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*14.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//----------------ขึ้นบรรทัดใหม่ BMI  ดัชนีมวลกาย------------
//join  `tb_employee`   on  `tb_record1`.id_employee_main=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department  ";  //730
$str_bmi="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department   and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'   ";  //730
$q_bmi=mysql_query($str_bmi);
$count_bmi=0;
while($row=  mysql_fetch_object($q_bmi))
{
     $bmi=$row->bmi;
     $count_bmi += $bmi;
}

$pdf->setXY( 10 , $y_absolute +  ($r*15.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
////$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'ดัชนีมวลกาย (n = '.$count_bmi.' )' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*15.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
////$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*15.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
////$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*15.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
////$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//------------------ ขึ้นบรรทัดใหม่----------------------------
$str_bmi1="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department    and   `tb_record1`.`BMI` < 18.5  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end' ";  //730
$q_bmi1=mysql_query($str_bmi1);
$count_bmi1=0;
while($row=  mysql_fetch_object($q_bmi1))
{
     $bmi1=$row->bmi;
     $count_bmi1 += $bmi;
}
// $count_bmi += $bmi;
 
if( $count_bmi > 0 )
{
      $count_bmi1_percen = number_format( ($count_bmi1/$count_bmi)*100,2  );
}else
{
     $count_bmi1_percen=0;
}

$pdf->setXY( 10 , $y_absolute +  ($r*16.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         ผอม (น้อยกว่า 18.5)' ),TLRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*16.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_bmi1 ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*16.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_bmi1_percen ),LRTB,1,'C',true);



$pdf->setXY( 140 , $y_absolute +  ($r*16.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//----------------- บรรทัดใหม่--------------------
$str_bmi2="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department    and   `tb_record1`.`BMI`  between   18.5   and  22.9  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_bmi2=mysql_query($str_bmi2);
$count_bmi2=0;
while($row=  mysql_fetch_object($q_bmi2))
{
     $bmi2=$row->bmi;
     $count_bmi2 += $bmi2;
}
if( $count_bmi > 0 )
{
      $count_bmi2_percen = number_format( ($count_bmi2/$count_bmi)*100,2  );
}else
{
     $count_bmi2_percen=0;
}
$pdf->setXY( 10 , $y_absolute +  ($r*16.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         ปกติ ( 18.5 - 22.9 )' ),LTRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*16.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_bmi2 ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*16.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_bmi2_percen ),LRTB,1,'C',true);



$pdf->setXY( 140 , $y_absolute +  ($r*16.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);
//------------------- ขึ้นบรรทัดใหม่--------------------------

//---------- ขึ้นบรรทัดใหม่-----------
$str_bmi3="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department    and   `tb_record1`.`BMI`  between   23   and  24.9  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_bmi3=mysql_query($str_bmi3);
$count_bmi3=0;
while($row=  mysql_fetch_object($q_bmi3))
{
     $bmi3=$row->bmi;
     $count_bmi3 += $bmi3;
}
if( $count_bmi > 0 )
{
      $count_bmi3_percen = number_format( ($count_bmi3/$count_bmi)*100,2  );
}else
{
     $count_bmi3_percen=0;
}

$pdf->setXY( 10 , $y_absolute +  ($r*17.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         น้ำหนักเกิน ( 23.0 - 24.9 )' ),LTRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*17.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_bmi3 ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*17.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_bmi3_percen ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*17.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//------------------ ขึ้นบรรทัดใหม่ ------------------------------
$str_bmi4="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department    and   `tb_record1`.`BMI`  between   25.5   and  29.9  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_bmi4=mysql_query($str_bmi4);
$count_bmi4=0;
while($row=  mysql_fetch_object($q_bmi4))
{
     $bmi4=$row->bmi;
     $count_bmi4 += $bmi4;
}
if( $count_bmi > 0 )
{
      $count_bmi4_percen = number_format( ($count_bmi4/$count_bmi)*100,2  );
}else
{
     $count_bmi4_percen=0;
}
$pdf->setXY( 10 , $y_absolute +  ($r*18.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         อ้วน ( 25.5 - 29.9 )' ),LTRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*18.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_bmi4 ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*18.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_bmi4_percen ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*18.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);
//---------------------- ขึ้นบรรทัดใหม่--------------------
//----------------- ขึ้นบรรทัดใหม่-----------------
$str_bmi5="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department    and   `tb_record1`.`BMI` >= 30  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_bmi5=mysql_query($str_bmi5);
$count_bmi5=0;
while($row=  mysql_fetch_object($q_bmi5))
{
     $bmi5=$row->bmi;
     $count_bmi5 += $bmi5;
}
if( $count_bmi > 0 )
{
      $count_bmi5_percen = number_format( ($count_bmi5/$count_bmi)*100,2  );
}else
{
     $count_bmi5_percen=0;
}


$pdf->setXY( 10 , $y_absolute +  ($r*19.0)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         อ้วนอันตราย ( มากกว่าหรือเท่ากับ 30 )' ),LTRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*19.0)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''. $count_bmi5 ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*19.0)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_bmi5_percen ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*19.0)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);
//------------------ขึ้นบรรทัดใหม่-----------------------

$pdf->setXY( 10 , $y_absolute +  ($r*19.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'รอบเอว' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*19.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*19.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*19.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//----------------------ขึ้นบรรทัดใหม่-----------------------
$str_ar="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department   and    `tb_employee`.`id_sex`=1  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_ar=mysql_query($str_ar);
$num_ar=  mysql_num_rows($q_ar);
$count_ar=0;
while($row=  mysql_fetch_object($q_ar))
{
     $ar=$row->AR;
     $count_ar += $ar;
}


$pdf->setXY( 10 , $y_absolute +  ($r*20.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         ชาย (n= '.$count_ar.')' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*20.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*20.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);



$pdf->setXY( 140 , $y_absolute +  ($r*20.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);
//------------------------ ขึ้นบรรทัดใหม่---------------------------------

//------------ บรรทัดใหม่------------------
$str_ar1="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department   and    `tb_employee`.`id_sex`=1  and `tb_record1`.`AR`  between  1 and 89  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_ar1=mysql_query($str_ar1);
$num_ar1=  mysql_num_rows($q_ar1);
$count_ar1=0;
while($row=  mysql_fetch_object($q_ar1))
{
     $ar1=$row->AR;
     $count_ar1 += $ar1;
}
if( $count_ar > 0 )
{
      $count_ar1_percen = number_format( ($count_ar1/$count_ar)*100,2  );
}else
{
     $count_ar1_percen=0;
}

$pdf->setXY( 10 , $y_absolute +  ($r*21.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ปกติ  1 - 89 cm.' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*21.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_ar1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*21.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $count_ar1_percen ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*21.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//-------------------- ขึ้นบรรทัดใหม่---------------------




//------ ขึ้นบรรทัดใหม่------------------------------
$str_ar2="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department   and    `tb_employee`.`id_sex`=1  and `tb_record1`.`AR`  >= 90  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_ar2=mysql_query($str_ar2);
$num_ar2=  mysql_num_rows($q_ar2);
$count_ar2=0;
while($row=  mysql_fetch_object($q_ar2))
{
     $ar2=$row->AR;
     $count_ar2 += $ar2;
}
if( $count_ar > 0 )
{
      $count_ar2_percen = number_format( ($count_ar2/$count_ar)*100,2  );
}else
{
     $count_ar2_percen=0;
}

$pdf->setXY( 10 , $y_absolute +  ($r*21.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'เกิน  90 cm. ขึ้นไป ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*21.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_ar2 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*21.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $count_ar2_percen ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*21.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//------------------ขึ้นบรรทัดใหม่--------------
$str_ar_w="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department   and    `tb_employee`.`id_sex`=2  and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'  ";  //730
$q_ar_w=mysql_query($str_ar_w);
//$num_ar_w=  mysql_num_rows($q_ar_w);
$count_ar_w=0;
while($row=  mysql_fetch_object($q_ar_w))
{
     $ar=$row->AR;
     $count_ar_w += $ar;
}


$pdf->setXY( 10 , $y_absolute +  ($r*22.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         หญิง (n= '.$count_ar_w. ')' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*22.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*22.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);



$pdf->setXY( 140 , $y_absolute +  ($r*22.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//-----------ขึ้นบรรทัดใหม่------------
$str_ar_w2="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department   and    `tb_employee`.`id_sex`=2  and `tb_record1`.`AR`  between  1 and 79   and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'    ";  //730
$q_ar1_w2=mysql_query($str_ar_w2);
//$num_ar1=  mysql_num_rows($q_ar1_w2);
$count_ar1_w2=0;
while($row=  mysql_fetch_object($q_ar1_w2))
{
     $ar1_w2=$row->AR;
     $count_ar1_w2 += $ar1;
}
if( $count_ar > 0 )
{
      $count_ar_w2_percen = number_format( ($count_ar1_w2/$count_ar_w)*100,2  );
}else
{
     $count_ar_w2_percen=0;
}

$pdf->setXY( 10 , $y_absolute +  ($r*23.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ปกติ  1 - 79 cm.' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*23.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_ar1_w2 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*23.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $count_ar_w2_percen ),RTB,1,'C',true);



$pdf->setXY( 140 , $y_absolute +  ($r*23.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


//----------------- ขึ้นบรรทัดใหม่--------------
$str_ar_w3="SELECT * FROM `tb_record1`  left  join  `tb_employee`  on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  where     `tb_employee`.id_department=$id_department   and    `tb_employee`.`id_sex`=2  and `tb_record1`.`AR`  >=  80    and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'    ";  //730
$q_ar1_w3=mysql_query($str_ar_w3);
//$num_ar1=  mysql_num_rows($q_ar1_w2);
$count_ar1_w3=0;
while($row=  mysql_fetch_object($q_ar1_w3))
{
     $ar1_w3=$row->AR;
     $count_ar1_w3 += $ar1_w3;
}
if( $count_ar > 0 )
{
      $count_ar_w3_percen = number_format( ($count_ar1_w3/$count_ar_w)*100,2  );
}else
{
     $count_ar_w3_percen=0;
}

$pdf->setXY( 10 , $y_absolute +  ($r*23.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'เกิน  80 cm. ขึ้นไป' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*23.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$count_ar1_w3 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*23.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $count_ar_w3_percen ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*23.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


//---------ขึ้นหน้า 2---------------------------------
$pdf->AddPage();


//------------------- หัวตาราง----------------------------------------------------------------
$pdf->setXY( 10 , $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 10 , iconv( 'UTF-8','cp874' , 'ข้อมูล' ),LRTB,1,'C',true);

$pdf->setXY( 90 , $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','B',13); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'ผลการสำรวจ' ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 10 , iconv( 'UTF-8','cp874' , 'หมายเหตุ' ),LRTB,1,'C',true);

//----------- บรรทัดใหม่ -------------

$pdf->setXY( 90 , $y_absolute +  ($r*1.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , 'จำนวน' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*1.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , 'ร้อยละ' ),LRTB,1,'C',true);

//--------------- สิ้นสุดหัวตาราง----------------------------------------------------------------




//------------- ขึ้นบรรทัดใหม่---โรคประจำตัว----------------------------
$str_disease1=" SELECT  `id_diag`   FROM `tb_record1`  left  join  `tb_employee`  on   `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`    where   `tb_employee`.`id_department`=$id_department     and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'   ";
$query_disease1=  mysql_query($str_disease1);
$num_query_disease1 =  mysql_num_rows($query_disease1);

$pdf->setXY( 10 , $y_absolute +  ($r*2.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'โรคประจำตัว (n='.$num_query_disease1.')' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*2.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*2.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*2.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);


//-----------  โรคประจำตัว--------------------------- 


$str_diag=" SELECT * FROM `tb_record1` "
        . " left  join  `tb_employee`  on   `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  "
        . " left join   `tb_disease`   on     `tb_record1`.`diag_detail` = `tb_disease`.`id_disease`  "
        . "where  `tb_employee`.`id_department`=$id_department   and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'   ";
  $que_diag=mysql_query($str_diag);
  
  
  $str_countall="  SELECT * FROM `tb_disease`  ";
  $str_query=  mysql_query($str_countall);
 $count_diag= mysql_numrows($str_query); //----นับจำนวนของโรคประจำตัว

$h=3.1;
while($row=  mysql_fetch_object($que_diag))
{
   
    
       $diag_detail=$row->diag_detail;
       $disease_detail=$row->disease_detail;
       $id_department=$row->id_department;
       
       //---------- นับจำนวนต่อโรค----------------------------
       $str_count_dis=" SELECT * FROM `tb_record1`  where  diag_detail='$diag_detail'   and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'   ";
       $query_all_dise=mysql_query($str_count_dis);
       $num_deis=  mysql_numrows($query_all_dise);
       $percent_dis= number_format(  ($num_deis/$count_diag)*100 , 2 );
     //---------- นับจำนวนต่อโรค----------------------------
   
   
       //---------------- begin---------------------------------------
        $pdf->setXY( 10 , $y_absolute +  ($r*$h)  );
        $pdf->SetFont('angsana','B',15); #------ set fonts-----------
        $pdf->SetFillColor(255,255, 255);
        //$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
       //$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         '.$diag_detail ),LRTB,1,'L',true);
       //   $pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         '.$id_department ),LRTB,1,'L',true);
       $pdf->Cell( 80  , 7 , iconv( 'UTF-8','cp874' , '         '.$disease_detail ),LRTB,1,'L',true);

            $pdf->setXY( 90 , $y_absolute +  ($r*$h)  );
            $pdf->SetFont('angsana','B',15); #------ set fonts-----------
            $pdf->SetFillColor(255,255, 255);
            //$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
         
            $pdf->Cell( 25  , 7 , iconv( 'UTF-8','cp874' , $num_deis  ),LRTB,1,'C',true);
            
            $pdf->setXY( 115 , $y_absolute +  ($r*$h)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 7 , iconv( 'UTF-8','cp874' , $percent_dis ),LRTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*$h)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 7 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

 //---------------- end---------------------------------------

       ++$h;  
}
 

                   
               
//--------- ขึ้นหน้าใหม่--------------------         
   $pdf->AddPage();
   //-------------- จำนวนคนโรคประจำตัว--------------
   
   $str_dis2="  SELECT *  FROM `tb_record1` "
           . " left  join  `tb_employee`   on  `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`   "
           ."  left  join   `tb_department`  on    `tb_employee`.`id_department` =  `tb_department`.`id_department`   "
           ."  left  join   `tb_disease`      on    `tb_record1`.`diag_detail` = `tb_disease`.`id_disease`  "
           ."  where   `tb_employee`.`id_department`=$id_department   and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'    ";
   
   $query_dis2=mysql_query($str_dis2);
   $num_rows_dis2=mysql_numrows($query_dis2);
   
$pdf->setXY( 10 , $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
//$pdf->Cell( 80  , 15 , iconv( 'UTF-8','cp874' , 'โรคประจำตัว จำนวน '.$num_dia.' คน  ' ),LRTB,1,'C',true);
 $pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'โรคประจำตัว    จำนวน    '.$num_rows_dis2.'    คน  ' ));
   $pdf->setXY( 10 , $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
//$pdf->Cell( 80  , 15 , iconv( 'UTF-8','cp874' , 'โรคประจำตัว จำนวน '.$num_dia.' คน  ' ),LRTB,1,'C',true);

//-------------ขึ้นบรรทัดใหม่----------------------------------
 $pdf->setXY( 10 , $y_absolute +  ($r*2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 60  , 10 , iconv( 'UTF-8','cp874' , ' ชื่อ - นามสกุล ' ),LRTB,1,'C',true);

 $pdf->setXY( 70 , $y_absolute +  ($r*2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 70  , 10 , iconv( 'UTF-8','cp874' , ' โรคประจำตัวใหม่ ' ),LRTB,1,'C',true);
 
$pdf->setXY( 140 , $y_absolute +  ($r*2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 60  , 10 , iconv( 'UTF-8','cp874' , ' หน่วยงาน ' ),LRTB,1,'C',true);



$i=3;
 while($row=mysql_fetch_object($query_dis2))
 {
      $name=$row->name;
      $surname=$row->surname;
      $disease_detail=$row->disease_detail;
      $department_detail=$row->department_detail;
      //------------------- begin------------------------------
     
    $pdf->setXY( 10 , $y_absolute +  ($r*$i)  );
    $pdf->SetFont('angsana','',15); #------ set fonts-----------
    $pdf->SetFillColor(255,255, 255);
     //$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
     $pdf->Cell( 60  , 7 , iconv( 'UTF-8','cp874' , '   '.$name.'   '.$surname ),LRTB,1,'L',true);
  
      $pdf->setXY( 70 , $y_absolute +  ($r*$i)  );
    $pdf->SetFont('angsana','',15); #------ set fonts-----------
    $pdf->SetFillColor(255,255, 255);
     //$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
     $pdf->Cell( 70  , 7 , iconv( 'UTF-8','cp874' , '  '.$disease_detail ),LRTB,1,'L',true);
  
    $pdf->setXY( 140 , $y_absolute +  ($r*$i)  );
    $pdf->SetFont('angsana','',15); #------ set fonts-----------
    $pdf->SetFillColor(255,255, 255);
     //$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
     $pdf->Cell( 60  , 7 , iconv( 'UTF-8','cp874' , '  '.$department_detail ),LRTB,1,'L',true);
  
     
     
      //------------------- end --------------------------------
      ++$i;
 }
   
//------------- สูบบุหรี่จำนวน ------------------
 $str_smoke="SELECT  *   FROM `tb_record1`     ".
                     "  left  join    `tb_employee`    on   `tb_record1`.`id_employee_main`  =   `tb_employee`.`id_employee`    ".
                    "  where    `tb_employee`.`id_department`=$id_department   and    `tb_record1`.`smoke`=1   and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'   ";
 $count_smoke=mysql_query($str_smoke);
 $num_all_smoke=mysql_numrows($count_smoke);
 
$i_plus=$i+1;
 $pdf->setXY( 10 , $y_absolute +  ($r*$i_plus)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
//$pdf->Cell( 80  , 15 , iconv( 'UTF-8','cp874' , 'โรคประจำตัว จำนวน '.$num_dia.' คน  ' ),LRTB,1,'C',true);
 $pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'สูบบุหรี่  จำนวน    '.$num_all_smoke.'    คน  ' ));
  $i_plus2=$i_plus+1;
  $rownumber1=1;
  
  while($row=  mysql_fetch_object($count_smoke))
  {
      $name=$row->name;
     $surname=$row->surname;
     $pdf->setXY( 10 , $y_absolute +  ($r*$i_plus2)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
//$pdf->Cell( 80  , 15 , iconv( 'UTF-8','cp874' , 'โรคประจำตัว จำนวน '.$num_dia.' คน  ' ),LRTB,1,'C',true);
 $pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '   '.$rownumber1."   ".$name."            ".$surname ));
 $i_plus2++;
 $rownumber1++;
  }

  //-------------- ค่าดัชนีมวลกาย อ้วน -------------------------
  //// and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'      ";
  
$str_bmi="  SELECT * FROM  `tb_record1` "
        ."LEFT  JOIN  `tb_employee`  ON   `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  "
        ."LEFT  JOIN   `tb_department`  ON    `tb_employee`.`id_department`=`tb_department`.`id_department`  "
        ."  where      `tb_employee`.`id_department`=$id_department   and   BMI   >  25.0   AND   BMI  <= 29.9     and    `tb_record1`.`dmy_insert`   between   '$date_begin'  and   '$date_end'     ";



$query_bmi=mysql_query($str_bmi);
$num_bmi=mysql_num_rows($query_bmi);

  $i_plus3=$i_plus2+1;

$pdf->setXY( 10 , $y_absolute +  ($r*$i_plus3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
//$pdf->Cell( 80  , 15 , iconv( 'UTF-8','cp874' , 'โรคประจำตัว จำนวน '.$num_dia.' คน  ' ),LRTB,1,'C',true);
 $pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'ค่าดัชนีมวลกาย  อ้วน ( 25.0 - 29.9 กม./ตารางเมตร )  จำนวน    '.$num_bmi.'    คน  ' ));

 $i_plus4=$i_plus3+1;
  
 
 //---------- ขึ้นบรรทัดใหม่หัวตาราง------------------------------
 $pdf->setXY( 10 , $y_absolute +  ($r*$i_plus4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 60  , 15 , iconv( 'UTF-8','cp874' , ' ชื่อ - นามสกุล ' ),LRTB,1,'C',true);


 $pdf->setXY( 70 , $y_absolute +  ($r*$i_plus4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 60  , 15 , iconv( 'UTF-8','cp874' , ' หน่วยงาน ' ),LRTB,1,'C',true);


$pdf->setXY( 120 , $y_absolute +  ($r*$i_plus4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 15  , 15 , iconv( 'UTF-8','cp874' , ' น้ำหนัก ' ),LRTB,1,'C',true);

$pdf->setXY( 135 , $y_absolute +  ($r*$i_plus4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 20  , 15 , iconv( 'UTF-8','cp874' , ' ส่วนสูง (m) ' ),LRTB,1,'C',true);


$pdf->setXY( 155 , $y_absolute +  ($r*$i_plus4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 10  , 15 , iconv( 'UTF-8','cp874' , ' BMI ' ),LRTB,1,'C',true);


$pdf->setXY( 165 , $y_absolute +  ($r*$i_plus4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 20  , 15 , iconv( 'UTF-8','cp874' , ' รอบเอว (cm) ' ),LRTB,1,'C',true);
//---------- ขึ้นบรรทัดใหม่หัวตาราง------------------------------
$i_plus5=$i_plus4+2;
$query_bmi2=mysql_query($str_bmi);

while($r3=mysql_fetch_object($query_bmi2))
{
     $name=$r3->name;
     $surname=$r3->surname;
    $BMI=$r3->BMI;
    $department_detail=$r3->department_detail;
    $w=$r3->w;
    $H=$r3->H;
    $AR=$r3->AR;
    
  $pdf->setXY( 10 , $y_absolute +  ($r*$i_plus5)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
 $pdf->Cell( 60  , 10 , iconv( 'UTF-8','cp874' , $name.'  '.$surname ),LRTB,1,'L',true);
// $pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'test' ));
   
   
   
 $pdf->setXY( 70 , $y_absolute +  ($r*$i_plus5)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 50  , 10 , iconv( 'UTF-8','cp874' , $department_detail ),LRTB,1,'L',true);


$pdf->setXY( 120 , $y_absolute +  ($r*$i_plus5)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 15  , 10 , iconv( 'UTF-8','cp874' , $w ),LRTB,1,'C',true);


$pdf->setXY( 135 , $y_absolute +  ($r*$i_plus5)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 20  , 10 , iconv( 'UTF-8','cp874' , $H ),LRTB,1,'C',true);


$pdf->setXY( 155 , $y_absolute +  ($r*$i_plus5)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 10  , 10 , iconv( 'UTF-8','cp874' , $BMI ),LRTB,1,'C',true);


$pdf->setXY( 165 , $y_absolute +  ($r*$i_plus5)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 20  , 10 , iconv( 'UTF-8','cp874' , $AR ),LRTB,1,'C',true);
//---------- ขึ้นบรรทัดใหม่หัวตาราง------------------------------
$i_plus5=$i_plus4+2;

$i_plus5++;

}

//--------------ค่าดัชนีมวลกาย อ้วนอันตราย ( 30 กม./ตารางเมตร )--------------------
$str_bmi2="  SELECT * FROM  `tb_record1` "
        ."LEFT  JOIN  `tb_employee`  ON   `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  "
        ."LEFT  JOIN   `tb_department`  ON    `tb_employee`.`id_department`=`tb_department`.`id_department`  "
        ."  where    `tb_employee`.`id_department`=$id_department    and   BMI   >=  30.0      and    `tb_record1`.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'       ";

 
$query_bmi2=mysql_query($str_bmi2);
$num_bmi2=mysql_num_rows($query_bmi2);
$i_plus6=$i_plus5 + 2;

$pdf->setXY( 10 , $y_absolute +  ($r*$i_plus6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
//$pdf->Cell( 80  , 15 , iconv( 'UTF-8','cp874' , 'โรคประจำตัว จำนวน '.$num_dia.' คน  ' ),LRTB,1,'C',true);
 $pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'ค่าดัชนีมวลกาย  อ้วนอันตราย ( 30 กม./ตารางเมตร )  จำนวน    '.$num_bmi2.'    คน  ' ));

 $i_plus7=$i_plus6+1;
 //---------- ขึ้นบรรทัดใหม่หัวตาราง------------------------------
 $pdf->setXY( 10 , $y_absolute +  ($r*$i_plus7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 60  , 15 , iconv( 'UTF-8','cp874' , ' ชื่อ - นามสกุล ' ),LRTB,1,'C',true);


 $pdf->setXY( 70 , $y_absolute +  ($r*$i_plus7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 60  , 15 , iconv( 'UTF-8','cp874' , ' หน่วยงาน ' ),LRTB,1,'C',true);


$pdf->setXY( 120 , $y_absolute +  ($r*$i_plus7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 15  , 15 , iconv( 'UTF-8','cp874' , ' น้ำหนัก ' ),LRTB,1,'C',true);

$pdf->setXY( 135 , $y_absolute +  ($r*$i_plus7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 20  , 15 , iconv( 'UTF-8','cp874' , ' ส่วนสูง (m) ' ),LRTB,1,'C',true);


$pdf->setXY( 155 , $y_absolute +  ($r*$i_plus7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 10  , 15 , iconv( 'UTF-8','cp874' , ' BMI ' ),LRTB,1,'C',true);


$pdf->setXY( 165 , $y_absolute +  ($r*$i_plus7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 20  , 15 , iconv( 'UTF-8','cp874' , ' รอบเอว (cm) ' ),LRTB,1,'C',true);
//---------- ขึ้นบรรทัดใหม่หัวตาราง------------------------------
$i_plus7=$i_plus6+3;
while($r3=mysql_fetch_object($query_bmi2))
{
     $name=$r3->name;
     $surname=$r3->surname;
    $BMI=$r3->BMI;
    $department_detail=$r3->department_detail;
    $w=$r3->w;
    $H=$r3->H;
    $AR=$r3->AR;
    
  $pdf->setXY( 10 , $y_absolute +  ($r*$i_plus7)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
 $pdf->Cell( 60  , 10 , iconv( 'UTF-8','cp874' , $name.'  '.$surname ),LRTB,1,'L',true);
// $pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'test' ));
   
   
   
 $pdf->setXY( 70 , $y_absolute +  ($r*$i_plus7)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 50  , 10 , iconv( 'UTF-8','cp874' , $department_detail ),LRTB,1,'L',true);


$pdf->setXY( 120 , $y_absolute +  ($r*$i_plus7)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 15  , 10 , iconv( 'UTF-8','cp874' , $w ),LRTB,1,'C',true);


$pdf->setXY( 135 , $y_absolute +  ($r*$i_plus7)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 20  , 10 , iconv( 'UTF-8','cp874' , $H ),LRTB,1,'C',true);


$pdf->setXY( 155 , $y_absolute +  ($r*$i_plus7)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 10  , 10 , iconv( 'UTF-8','cp874' , $BMI ),LRTB,1,'C',true);


$pdf->setXY( 165 , $y_absolute +  ($r*$i_plus7)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 20  , 10 , iconv( 'UTF-8','cp874' , $AR ),LRTB,1,'C',true);
//---------- ขึ้นบรรทัดใหม่หัวตาราง------------------------------
$i_plus5=$i_plus4+2;

$i_plus7++;

}



//------------- print output ------------------------
$pdf->Output();
//------------- print output ------------------------  

?>