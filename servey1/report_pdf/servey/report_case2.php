<?php

#  http://localhost/servey1/report_pdf/servey/report_case2.php
# http://localhost/servey1/report_pdf/servey/report_case2.php?y=2016
//require_once("../config.php");
require_once("pdf_class.php"); //class PDF
//require_once("query_diagnosis.php");
require_once("query_servey.php");

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

/*
##-- วันที่ วัน เดือน ปี
if( !empty($b)  && !empty($e)   )
{    
     //$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$b.' ถึง '.$e ));  ## formate date in table is  yyyy-mm-ddd
      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$pdf->date_thai_format($b).' ถึง '.$pdf->date_thai_format($e) ));  ## formate date in table is  yyyy-mm-ddd
      // ค่าที่ส่งมา 1-10-2557 
         // $str_query="SELECT * FROM ESN.`04-monitoring`where `MonitoringDate` between '1467-05-04' and '1990-1-1' ;    ";
      //   date_eng_format($begin)
} 
*/

/*
//---- ขีดเส้นยาว --------------------
$pdf->setXY( 10 , $y_absolute +  ($r*4)  );
$pdf->SetFont('angsana','B',18);
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , '' ),T,0,L,true     );
//---- ขีดเส้นยาว --------------------
*/

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

//----------- บรรทัดใหม่ -------------

$pdf->setXY( 10 , $y_absolute +  ($r*6.41)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'เพศ ( n = '.$num_rows_sex.' )' ),LRTB,1,'L',true);

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

$pdf->setXY( 10 , $y_absolute +  ($r*7.14)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         ชาย' ),LRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*7.14)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*7.14)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$percen_m ),LRTB,1,'C',true);



$pdf->setXY( 140 , $y_absolute +  ($r*7.14)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//----------- บรรทัดใหม่ -------------

$pdf->setXY( 10 , $y_absolute +  ($r*7.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         หญิง' ),LRB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*7.86)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5.3 , iconv( 'UTF-8','cp874' , $num_rows_sex_w ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*7.86)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5.3 , iconv( 'UTF-8','cp874' , $percen_w ),LRTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*7.86)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5.3 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//----------- บรรทัดใหม่ -------------

$pdf->setXY( 10 , $y_absolute +  ($r*8.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'อายุ ( n = '.$total_age.' )' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*8.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

$pdf->setXY( 115 , $y_absolute +  ($r*8.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

$pdf->setXY( 140 , $y_absolute +  ($r*8.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


//----------- บรรทัดใหม่ -------------

$pdf->setXY( 10 , $y_absolute +  ($r*9.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 105  , 5 , iconv( 'UTF-8','cp874' , '         ชาย (n ='.$total_age_m.')' ),LTRB,1,'L',true);


$pdf->setXY( 115 , $y_absolute +  ($r*9.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),RTB,1,'L',true);


//------------------ บรร่ทัดใหม่------------------------------

$pdf->setXY( 10 , $y_absolute +  ($r*9.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 105  , 5 , iconv( 'UTF-8','cp874' , '         ชาย ( n='.$total_age_m.")" ),LRTB,1,'L',true);



$pdf->setXY( 140 , $y_absolute +  ($r*9.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);


//#------------ ภายใน บรรทัด ---------------------------------
$pdf->setXY( 10 , $y_absolute +  ($r*10)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'21 - 30 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*10)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*10)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*10)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//#------------ ภายใน บรรทัด ---------------------------------

$pdf->setXY( 10 , $y_absolute +  ($r*10.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'31 - 40 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*10.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m2 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*10.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m2 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*10.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//-------------- บรรทัดใหม่---------------

$pdf->setXY( 10 , $y_absolute +  ($r*11.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'41 - 50 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*11.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m3 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*11.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m3 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*11.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);
//-------------- บรรทัดใหม่---------------


$pdf->setXY( 10 , $y_absolute +  ($r*12.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'51 - 60 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*12.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m4 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*12.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m4 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*12.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


//--------- บรรทัดใหม่------------


$pdf->setXY( 10 , $y_absolute +  ($r*12.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 105  , 5 , iconv( 'UTF-8','cp874' , '         หญิง ( n='.$total_age_w.")" ),LRTB,1,'L',true);

$pdf->setXY( 115 , $y_absolute +  ($r*12.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_w1 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*12.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//--------- บรรทัดใหม่------------

#------------ ภายใน บรรทัด ---------------------------------
$pdf->setXY( 10 , $y_absolute +  ($r*13.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'21 - 30 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*13.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_w1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*13.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_w1 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*13.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//------------ บรรทัดใหม่-----------------

//#------------ ภายใน บรรทัด ---------------------------------

$pdf->setXY( 10 , $y_absolute +  ($r*14.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'31 - 40 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*14.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_w2 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*14.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_w2 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*14.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//-------บรรทัดใหม่-----------

$pdf->setXY( 10 , $y_absolute +  ($r*14.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'41 - 50 ปี  ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*14.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_w3 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*14.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_w3 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*14.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);
//-------------- บรรทัดใหม่---------------

//
//$pdf->setXY( 10 , $y_absolute +  ($r*15.6)  );
//$pdf->SetFont('angsana','B',15); #------ set fonts-----------
//$pdf->SetFillColor(255,255, 255);
////$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
//$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'ดัชนีมวลกาย (n = '.$total_bmi.' )' ),LRTB,1,'L',true);
//
//$pdf->setXY( 90 , $y_absolute +  ($r*15.6)  );
//$pdf->SetFont('angsana','B',15); #------ set fonts-----------
//$pdf->SetFillColor(255,255, 255);
////$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
//$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);
//
//
//$pdf->setXY( 115 , $y_absolute +  ($r*15.6)  );
//$pdf->SetFont('angsana','B',15); #------ set fonts-----------
//$pdf->SetFillColor(255,255, 255);
////$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
//$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTB,1,'C',true);
//
//
//$pdf->setXY( 140 , $y_absolute +  ($r*15.6)  );
//$pdf->SetFont('angsana','B',15); #------ set fonts-----------
//$pdf->SetFillColor(255,255, 255);
////$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
//$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);
//------------------- บรรทัดใหม่ -------------------------


$pdf->setXY( 10 , $y_absolute +  ($r*15.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         ผอม (น้อยกว่า 18.5)' ),TLRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*15.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$bmi_1 ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*15.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$percent_bmi_1 ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*15.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

/*
$pdf->setXY( 10 , $y_absolute +  ($r*16.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         ผอม (น้อยกว่า 18.5)' ),TLRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*16.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$bmi_1 ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*16.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$percent_bmi_1 ),LRTB,1,'C',true);



$pdf->setXY( 140 , $y_absolute +  ($r*16.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);
*/

//----------------- บรรทัดใหม่--------------------

$pdf->setXY( 10 , $y_absolute +  ($r*16.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         ปกติ ( 18.5 - 22.9 )' ),LTRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*16.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$bmi_2 ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*16.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$percent_bmi_2 ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*16.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

/*
$pdf->setXY( 140 , $y_absolute +  ($r*17)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//---------- ขึ้นบรรทัดใหม่-----------
$pdf->setXY( 10 , $y_absolute +  ($r*17.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         น้ำหนักเกิน ( 23.0 - 24.9 )' ),LTRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*17.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$bmi_3 ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*17.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$percent_bmi_3 ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*17.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);
 
 */


$pdf->setXY( 140 , $y_absolute +  ($r*17)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//---------- ขึ้นบรรทัดใหม่-----------
$pdf->setXY( 10 , $y_absolute +  ($r*17)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         น้ำหนักเกิน ( 23.0 - 24.9 )' ),LTRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*17 )  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$bmi_3 ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*17)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$percent_bmi_3 ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*17)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);


//------------------ ขึ้นบรรทัดใหม่ ------------------------------
//18.4
$pdf->setXY( 10 , $y_absolute +  ($r*17.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         อ้วน ( 25.5 - 29.9 )' ),LTRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*17.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$bmi_4 ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*17.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$percent_bmi_4 ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*17.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);
//----------------- ขึ้นบรรทัดใหม่-----------------
//19.1
$pdf->setXY( 10 , $y_absolute +  ($r*18.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         อ้วนอันตราย ( มากกว่าหรือเท่ากับ 30 )' ),LTRB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*18.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$bmi_5 ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*18.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$percent_bmi_5 ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*18.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);
//-------------- ขึ้นบรรทัดใหม่---------------------------

//19.8
$pdf->setXY( 10 , $y_absolute +  ($r*19.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'รอบเอว' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*19.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*19.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*19.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//------------ขึ้นบรรทัดใหม่---------------------------------

//19.8
//20.5
$pdf->setXY( 10 , $y_absolute +  ($r*19.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         ชาย (n= '.$total_ar_m.')' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*19.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*19.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);



$pdf->setXY( 140 , $y_absolute +  ($r*19.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//------------ บรรทัดใหม่------------------

//20.5
//21.2

$pdf->setXY( 10 , $y_absolute +  ($r*20.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ปกติ  1 - 89 cm.' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*20.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$ar_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*20.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_ar_m1 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*20.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

$pdf->setXY( 140 , $y_absolute +  ($r*20.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);
//------ ขึ้นบรรทัดใหม่------------------------------

//21.2

$pdf->setXY( 10 , $y_absolute +  ($r*21.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'เกิน  90 cm. ขึ้นไป ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*21.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$ar_m2 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*21.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_ar_m2 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*21.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

$pdf->setXY( 140 , $y_absolute +  ($r*21.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//------------------ขึ้นบรรทัดใหม่--------------
//21.9
//22.6
$pdf->setXY( 10 , $y_absolute +  ($r*21.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '         หญิง (n= '.$total_ar_w. ')' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*21.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*21.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);



$pdf->setXY( 140 , $y_absolute +  ($r*21.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*21.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//-----------ขึ้นบรรทัดใหม่------------

//22.6
//23.3
//22.

$pdf->setXY( 10 , $y_absolute +  ($r*22.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ปกติ  1 - 79 cm.' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*22.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$ar_w1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*22.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_ar_w1 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*22.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);
//----------------- ขึ้นบรรทัดใหม่--------------

//23.3
//24
$pdf->setXY( 10 , $y_absolute +  ($r*23.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'เกิน  80 cm. ขึ้นไป' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*23.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$ar_w2 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*23.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_ar_w2 ),RTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*23.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);




//--############################# โรคประจำตัว##############################
//--------------------- ขึ้นบรรทัดใหม่------------
/*
$pdf->setXY( 10 , $y_absolute +  ($r*24.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'โรคประจำตัว (n=)' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*24.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*24.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*24.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//------------ ขึ้นบรรทัดใหม่---------------

$pdf->setXY( 10 , $y_absolute +  ($r*25.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ไม่มี' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*25.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*25.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*25.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//---------------------- ขึ้นบรรทัดใหม่------------

$pdf->setXY( 10 , $y_absolute +  ($r*26.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'มี' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*26.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*26.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*26.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


//--------- ขึ้นบรรทัดใหม่-----------------

$pdf->setXY( 10 , $y_absolute +  ($r*26.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'     '.'12 อันดับ  โรคประจำตัว' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*26.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*26.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*26.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);



//--------- ขึ้นบรรทัดใหม่----------------
$pdf->setXY( 10 , $y_absolute +  ($r*27.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'          '.'1. ภูมิแพ้' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*27.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*27.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*27.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//----------- ขึ้นบรรทัดใหม่--------------


$pdf->setXY( 10 , $y_absolute +  ($r*28.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'          '.'2. กระเพาะ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*28.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*28.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*28.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//----------- ขึ้นบรรทัดใหม่--------------

$pdf->setXY( 10 , $y_absolute +  ($r*28.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'          '.'3. ไทรอยด์' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*28.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*28.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*28.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//----------- ขึ้นบรรทัดใหม่--------------

$pdf->setXY( 10 , $y_absolute +  ($r*29.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'          '.'4. ความดันโลหิตสูง' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*29.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*29.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*29.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//----------- ขึ้นบรรทัดใหม่--------------

$pdf->setXY( 10 , $y_absolute +  ($r*30.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'          '.'5. ไมเกรน' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*30.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*30.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*30.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//----------- ขึ้นบรรทัดใหม่--------------


$pdf->setXY( 10 , $y_absolute +  ($r*31)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'          '.'6. หอบหืด' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*31)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*31)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*31)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//----------- ขึ้นบรรทัดใหม่--------------

$pdf->setXY( 10 , $y_absolute +  ($r*31.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'          '.'7. เบาหวาน' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*31.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*31.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*31.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


//----------- ขึ้นบรรทัดใหม่--------------

$pdf->setXY( 10 , $y_absolute +  ($r*32.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'          '.'8. ผ่าตัด C/S' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*32.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$num_rows_sex_m1 ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*32.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percen_m1 ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*32.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

*/
//--############################# โรคประจำตัว##############################




//----------------------- ขึ้นบรรทัดใหม่----------
$pdf->setXY( 10 , $y_absolute +  ($r*24.0)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'การสูบบุหรี่ ( n = '.$row_tb_all.' ) ' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*24.0)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*24.0)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*24.0)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

//----------- ขึ้นบรรทัดใหม่--------------
$pdf->setXY( 10 , $y_absolute +  ($r*24.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*24.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*24.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*24.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

 //----------- ขึ้นบรรทัดใหม่--------------

$pdf->setXY( 10 , $y_absolute +  ($r*25.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ไม่สูบ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*25.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$smoke_not_all ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*25.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_smoke_not_all ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*25.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//-------------- ขึ้นบรรทัดใหม่  สูบบุหรี่  ---------------------
$pdf->setXY( 10 , $y_absolute +  ($r*26.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'สูบ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*26.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$smoke_all ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*26.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_smoke_all ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*26.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


//---------------- ขึ้นบรรทัดใหม่--------------



$pdf->setXY( 10 , $y_absolute +  ($r*26.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'การดื่มสุรา (n='.$row_tb_all. ')' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*26.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*26.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*26.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);


//-------------- ขึ้นบรรทัดใหม่-------------------

$pdf->setXY( 10 , $y_absolute +  ($r*27.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ดื่ม' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*27.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$alh_all ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*27.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_alh_all ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*27.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//-------------- ขึ้นบรรทัดใหม่-------------------



$pdf->setXY( 10 , $y_absolute +  ($r*28.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ไม่ดื่ม' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*28.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$alh_not_all ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*28.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_alh_not_all ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*28.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);


//-------------- ขึ้นบรรทัดใหม่---------------

$pdf->setXY( 10 , $y_absolute +  ($r*28.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'ออกกำลังกาย ( n = '.$row_tb_all.' ) ' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*28.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*28.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*28.9)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);
//---------------- ขึ้นบรรทัดใหม่----------------



$pdf->setXY( 10 , $y_absolute +  ($r*29.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ไม่ออกกำลังกาย' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*29.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$not_exer ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*29.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_not_exer ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*29.6)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);
//---------------- ขึ้นบรรทัดใหม่----------------




$pdf->setXY( 10 , $y_absolute +  ($r*30.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ประจำ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*30.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$exer_all ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*30.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_exer_all),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*30.3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//----------------- ขึ้นบรรทัดใหม่--------ออกกำลังกายบางครั้ง-------------
$pdf->setXY( 10 , $y_absolute +  ($r*31)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ออกกำลังกายบางครั้ง' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*31)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$use_sometimes ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*31)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_use_sometimes ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*31)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

//------------------ ออกกำลังกายสม่ำเสมอ----------------------------
$pdf->setXY( 10 , $y_absolute +  ($r*31.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ออกกำลังกายสม่ำเสมอ' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*31.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$use_always ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*31.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_use_always ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*31.7)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);



//---------------- ขึ้นบรรทัดใหม่----------------


$pdf->setXY( 10 , $y_absolute +  ($r*32.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'สวมหมวกกันน็อค ( n = '.$row_tb_all.' )' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*32.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*32.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*32.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);
//---------------- ขึ้นบรรทัดใหม่----------------


$pdf->setXY( 10 , $y_absolute +  ($r*33.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ไม่สวม' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*33.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$head_not_all ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*33.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_head_not_all ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*33.1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);




 //------------- ขึ้นบรรทัดใหม่------------------------------
/*
$pdf->setXY( 10 , $y_absolute +  ($r*32.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'สวม' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*32.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$head_all ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*32.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_head_all ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*32.4)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);
*/

//---------- ขึ้นบรรทัดใหม่------------------------



$pdf->setXY( 10 , $y_absolute +  ($r*33.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'คาดเข็มขัดนิรภัย (n = '.$row_tb_all.' ) ' ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*33.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*33.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

$pdf->setXY( 140 , $y_absolute +  ($r*33.8)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);

 
 
 
 //---------------- ขึ้นบรรทัดใหม่----------------

$pdf->setXY( 10 , $y_absolute +  ($r*34.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'ไม่คาด' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*34.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$belt_not_all ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*34.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_belt_not_all ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*34.5)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);

   
  
  //---------------- ขึ้นบรรทัดใหม่----------------

$pdf->setXY( 10 , $y_absolute +  ($r*35.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '                  '.'คาด' ),LRTB,1,'L',true);


$pdf->setXY( 90 , $y_absolute +  ($r*35.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , ''.$belt_all ),LRTB,1,'C',true);


$pdf->setXY( 115 , $y_absolute +  ($r*35.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 5 , iconv( 'UTF-8','cp874' , $percent_belt_all ),RTBL,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*35.2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 5 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'L',true);
//---------------- ขึ้นบรรทัดใหม่----------------





/* ------Footer */
//$pdf->footer_(80,272,' Page 1 of 1  ');
/* ------Footer */


$pdf->AddPage();

##---- เลขหน้า ----------
    $pdf->SetFont('angsana','',12);
    $pdf->setXY( $x_absolute + 160 , $y_absolute - 10 );
    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'Page  2' )  );
##---- เลขหน้า ---------- 
  
  
    $pdf->setXY( 10 , $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 15 , iconv( 'UTF-8','cp874' , 'ข้อมูล' ),LRTB,1,'C',true);


$pdf->setXY( 90 , $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 50  , 10 , iconv( 'UTF-8','cp874' , 'ผลการสำรวจ' ),LRTB,1,'C',true);


$pdf->setXY( 90 , $y_absolute +  ($r*2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 10 , iconv( 'UTF-8','cp874' , 'จำนวน' ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*2)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 10 , iconv( 'UTF-8','cp874' , 'ร้อยละ' ),LRTB,1,'C',true);



$pdf->setXY( 140 , $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 15 , iconv( 'UTF-8','cp874' , 'หมายเหตุ' ),LRTB,1,'C',true);

                
/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/
 #id_disease 
 #diag_detail

$str=" SELECT * FROM `tb_disease`      ";
$result=mysql_query($str);
$h=2;
while($row=mysql_fetch_array($result))
{
    $h++;
    
    //diag_detail
    //id_disease
                   
/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/
 #id_disease 
 #diag_detail

    $id_disease_va=$row[0];
    $str_dia=" SELECT   *    FROM    `tb_record1`  where  `diag_detail` = $id_disease_va   and   `dmy_insert`   between   '$Y_begin'  and   '$Y_end'   ";
    $query_dia=  mysql_query($str_dia);
    $sum_dis=mysql_num_rows($query_dia);
    $percent_dis=  number_format( ($sum_dis/$row_tb_all)*100 ,1);
    
    $pdf->setXY( 10 , $y_absolute +  ($r*$h)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 80  , 7 , iconv( 'UTF-8','cp874' , $row[1] ),LRTB,1,'L',true);

$pdf->setXY( 90 , $y_absolute +  ($r*$h)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 7 , iconv( 'UTF-8','cp874' , $sum_dis ),LRTB,1,'C',true);

$pdf->setXY( 115 , $y_absolute +  ($r*$h)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 25  , 7 , iconv( 'UTF-8','cp874' , $percent_dis ),LRTB,1,'C',true);


$pdf->setXY( 140 , $y_absolute +  ($r*$h)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 40  , 7 , iconv( 'UTF-8','cp874' , '' ),LRTB,1,'C',true);


}


/*
#---- หน้า 2
$pdf->AddPage();

##---- เลขหน้า ----------
    $pdf->SetFont('angsana','',12);
    $pdf->setXY( $x_absolute + 160 , $y_absolute - 10 );
    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'Page  2/2' )  );
##---- เลขหน้า ---------- 


$pdf->setXY( 10 , $y_absolute +  ($r*1)  );
$pdf->MultiCell(0,0,iconv('UTF-8','cp874','Interpretation and Recommendation : '));

$pdf->setXY( 10 , $y_absolute +  ($r*2)  );
$pdf->MultiCell(0,0,iconv('UTF-8','cp874',$Interpretation_Recommendation ));

$pdf->setXY( 10 , $y_absolute +  ($r*4)  );
$pdf->MultiCell(0,0,iconv('UTF-8','cp874','NB : '));
$pdf->setXY( 10 , $y_absolute +  ($r*5)  );
$pdf->MultiCell(0,0,iconv('UTF-8','cp874','Pharmacist : '.$pharmacist1.'  /  '.$pharmacist2 ));

$pdf->setXY( 100 , $y_absolute +  ($r*5)  );
$pdf->MultiCell(0,0,iconv('UTF-8','cp874','Tel : '.$tel ));

$pdf->setXY( 140 , $y_absolute +  ($r*5)  );
$pdf->MultiCell(0,0,iconv('UTF-8','cp874','Date : '.$date_record_conv ));


/* ------Footer */
//$pdf->footer_(80,272,' Page 2 of 2  ');
/* ------Footer */



/*
##--หัวตาราง
$pdf->setXY($x_absolute , $y_absolute +  ($r*3.5)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตารางที่ 2 ปัญหาที่เกี่ยวข้องกับการใช้ยาของผู้ป่วย (Drug Related Problems; DRPs)' ));
$pdf->setXY($x_absolute , $y_absolute +  ($r*4)  );
$pdf->SetFont('angsana','B',14);
$pdf->SetFillColor(200, 200, 200);
$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , 'ข้อมูล' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนครั้ง (ครั้ง)' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนผู้ป่วย (ราย)' ) , 1 , 1 , 'C' , true );

##-- content --PAGE1
$pdf->SetFont('angsana','',13);
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , 'ให้บริการแก่ผู้ป่วย' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_sum ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_patien ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , 'พบ DRPs' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , 'ประเภทการเกิด DRPs' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'1. Non-compliance' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR, 0  ,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '           '.'- Over dosage' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,   $count_over_all.'/'.$cal_over_all.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_over.'/'.$cal_over.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' ,'           '.'- Under dosage' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count2_under_all.'/'.$cal_under_all.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_under.'/'.$cal_under.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '           '.'- Not compliance with the life style' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count3_non_all.'/'.$cal_non_all.'%' ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_non.'/'.$cal_non.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' ,  '           '.'- Incorrect technique' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_in_all.'/'.$cal_in_all.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_in.'/'.$cal_in.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '                 '.'- Preparation'  ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,   $count_Preparation_all.'/'.$cal_Preparation_all.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_Preparation.'2'.$cal_Preparation_.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' ,  '                 '.'- Inhalation' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_Inhalation_all.'/'.$cal_Inhalation_all.'%' ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_Inhalation.'/'.$cal_Inhalation_.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '                 '.'- Rinse' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_Rinse_all.'/'.$cal_Rinse_all.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_Rinse.'/'.$cal_Rinse_.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '                 '.'- EmptyTest' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_EmptyTest_all.'/'.$cal_EmptyTest.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_EmptyTest.'/'.$cal_EmptyTest_.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '           '.'- สาเหตุของปัญหา Non-compliance' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' ,  '                 '.'- สาเหตุจากตัวผู้ป่วย' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_Cause1_1_all.'/'. $cal_Cause1_1.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_Cause1_1.'/'.$cal_Cause1_1_.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' ,  '                 '.'- สาเหตุจากโรค' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $cal_Cause1_2.'/'.$cal_Cause1_2.'%'   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_Cause1_2.'/'.$cal_Cause1_2_.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' ,'                 '.'- สาเหตุจากยา' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_Cause1_3_all.'/'.$cal_Cause1_3.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_Cause1_3.'/'.$cal_Cause1_3_.'%'),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '                 '.'- สาเหตุจากผู้ดูแล' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_Cause1_4_all.'/'.$cal_Cause1_4.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_Cause1_4.'/'.$cal_Cause1_4_.'%' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '                 '.'- สาเหตุอื่น ๆ'  ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $count_Cause1_5_all.'/'.$cal_Cause1_5.'%'  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $count_Cause1_5.'/'.$cal_Cause1_5_.'%'  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' ,  '    '.'2. Adverse drug reactions (ADRs)'  ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  ''  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'3. Medication errors' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '                 '.'- Prescribing  error' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_DRP_all[1]  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_DRP_count[1] ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '                 '.'- Trancribing  error' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_DRP_all[2]  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_DRP_count[2] ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '                 '.'- Dispensing  error' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_DRP_all[3]  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_DRP_count[3] ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' ,  '                 '.'- Administration  error' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_DRP_all[4]  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_DRP_count[4] ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' ,  '                 '.'- Unclear order' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_DRP_all[5]  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_DRP_count[5] ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '    '.'4. Other DRPs' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , ''   ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  '' ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' ,  '                 '.'- Need for additional drug therapy' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $va_other[1]  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $va_other_[1]  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' ,  '                 '.'- Improper drug selection' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_other[2]  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $va_other_[2]  ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' ,  '                 '.'- Improper dosage regimen' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_other[3]  ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_other_[3]   ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '                 '.'- Failure to receive medication'),LRB,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_other[4]  ),LRB,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_other_[4] ),LRB,1,C,true     );
*/

//footer
//$pdf->footer_(25,272,'- คณะเภสัชศาสตร์ มข.  ');



/*
$pdf->AddPage();
##-- PAGE 2  
##---- เลขหน้า ----------
    $pdf->SetFont('angsana','',12);
    $pdf->setXY( $x_absolute + 160 , $y_absolute - 10 );
    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'หน้า  2' )  );
##---- เลขหน้า ---------- 

##-- head table -----
$pdf->head_table(70,20,25,'b'); //($x_absolute,$y_absolute,$fontSize,$b)   //หัวโปรแกรม
$pdf->SetFont('angsana','BU',20);
//$pdf->setXY( $x_absolute, $y_absolute +  ($r*1)  );
$pdf->setXY( 60, $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'คลินิคผู้ป่วยนอกโรคลมชัก โรงพยาบาลศรีนครินทร์' ));

$pdf->Image('../icon/px.jpeg',10,12,20,0,'','');//Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])

$pdf->setXY( 120 , $y_absolute +  ($r*2)  );
$pdf->SetFont('angsana','',13);

##-- วันที่ วัน เดือน ปี
if( !empty($b)  && !empty($e)   ) //ให้ convert จาก date thai เป็น Eng ก่อน แล้วค่อย convert กลับเป็น วัน-เดือน-ปี ไทย งงปะ 55555
{    
     //$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$b.' ถึง '.$e ));  ## formate date in table is  yyyy-mm-ddd
      $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระหว่างวันที่ '.$pdf->date_thai_format($b).' ถึง '.$pdf->date_thai_format($e) ));  ## formate date in table is  yyyy-mm-ddd
      // ค่าที่ส่งมา 1-10-2557 
         // $str_query="SELECT * FROM ESN.`04-monitoring`where `MonitoringDate` between '1467-05-04' and '1990-1-1' ;    ";
      //   date_eng_format($begin)
} 
##--หัวตาราง
$pdf->setXY($x_absolute , $y_absolute +  ($r*3.5)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตารางที่ 2 ปัญหาที่เกี่ยวข้องกับการใช้ยาของผู้ป่วย (Drug Related Problems; DRPs)' ));
$pdf->setXY($x_absolute , $y_absolute +  ($r*4)  );
$pdf->SetFont('angsana','B',14);
$pdf->SetFillColor(200, 200, 200);
$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , 'ข้อมูล' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนครั้ง (ครั้ง)' ) , 1 , 0 , 'C' , true );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , 'จำนวนผู้ป่วย (ราย)' ) , 1 , 1 , 'C' , true );

##-- content --PAGE2
$pdf->SetFont('angsana','',13);

$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '                 '.'- Drug interation' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $va_other[5] ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_other_[5] ),LR,1,C,true     );

$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '                 '.'- Unnecessary drug therapy' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $va_other[6] ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_other_[6] ),LR,1,C,true     );

$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '                 '.'- Duplication/Repeated' ),LR,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $va_other[7] ),LR,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_other_[7] ),LR,1,C,true     );

$pdf->Cell( 90  , 7 , iconv( 'UTF-8','cp874' , '                 '.'- Other' ),LRB,0,L,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' ,  $va_other[8]  ),LRB,0,C,true     );
$pdf->Cell( 35  , 7 , iconv( 'UTF-8','cp874' , $va_other_[8] ),LRB,1,C,true     );




// footer
$pdf->footer_(25,272,'- คลินิคผู้ป่วยนอกโรคลมชัก คณะเภสัชศาสตร์ มข.');
 * 
 */
 

##---- เลขหน้า ----------
    $pdf->AddPage();
    $pdf->SetFont('angsana','',12);
    $pdf->setXY( $x_absolute + 160 , $y_absolute - 10 );
    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'Page  3' )  );
    
##---- เลขหน้า ---------- 
 
 $pdf->setXY( 10 , $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
//$pdf->Cell( 80  , 15 , iconv( 'UTF-8','cp874' , 'โรคประจำตัว จำนวน '.$num_dia.' คน  ' ),LRTB,1,'C',true);
 $pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'โรคประจำตัว    จำนวน    '.$num_dia.'    คน  ' ));
    
 //-------------ขึ้นบรรทัดใหม่----------------------------------
 $pdf->setXY( 10 , $y_absolute +  ($r*3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 60  , 15 , iconv( 'UTF-8','cp874' , ' ชื่อ - นามสกุล ' ),LRTB,1,'C',true);

 $pdf->setXY( 70 , $y_absolute +  ($r*3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 70  , 15 , iconv( 'UTF-8','cp874' , ' โรคประจำตัวใหม่ ' ),LRTB,1,'C',true);
 
$pdf->setXY( 140 , $y_absolute +  ($r*3)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
$pdf->Cell( 60  , 15 , iconv( 'UTF-8','cp874' , ' หน่วยงาน ' ),LRTB,1,'C',true);


                  
/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/
 #id_disease 
 #diag_detail

//----------------- ขึ้นบรรทัดใหม่----------------------------------
$str_dia="SELECT * FROM `tb_record1`    "
        . "LEFT  JOIN  `tb_employee`   "
        . "ON   `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  "
        ." LEFT  JOIN   `tb_disease`     "
        ."ON    `tb_record1`.`diag_detail`=`tb_disease`.`id_disease`        "
        ." LEFT  JOIN  `tb_department`   "
        ." ON    `tb_employee`.`id_department`=`tb_department`.`id_department`  "
        . "WHERE   `tb_record1`.`diag_detail`  > 0  AND    `tb_record1`.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'    ";
$query_dia=mysql_query($str_dia);
$i=5;
while($result=mysql_fetch_object($query_dia))
{
    
    $name=$result->name;
    $surname=$result->surname;
    $disease_detail=$result->disease_detail;
    $department_detail=$result->department_detail;
    
    $pdf->setXY( 10 , $y_absolute +  ($r*$i)  );
    $pdf->SetFont('angsana','',15); #------ set fonts-----------
    $pdf->SetFillColor(255,255, 255);
     //$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
     $pdf->Cell( 60  , 10 , iconv( 'UTF-8','cp874' , '   '.$name.'   '.$surname ),LRTB,1,'L',true);
  
      $pdf->setXY( 70 , $y_absolute +  ($r*$i)  );
    $pdf->SetFont('angsana','',15); #------ set fonts-----------
    $pdf->SetFillColor(255,255, 255);
     //$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
     $pdf->Cell( 70  , 10 , iconv( 'UTF-8','cp874' , '  '.$disease_detail ),LRTB,1,'L',true);
  
    $pdf->setXY( 140 , $y_absolute +  ($r*$i)  );
    $pdf->SetFont('angsana','',15); #------ set fonts-----------
    $pdf->SetFillColor(255,255, 255);
     //$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
     $pdf->Cell( 60  , 10 , iconv( 'UTF-8','cp874' , '  '.$department_detail ),LRTB,1,'L',true);
  
     
     
     ++$i;
}
//---------- end while1---------------
                
/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/
 #id_disease 
 #diag_detail

//-------สูบบุหรี่----------------------------
$str_dia2="  SELECT * FROM `tb_record1` "
        ."LEFT  JOIN  `tb_employee`  ON   `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  "
        ." where   `tb_record1`.`smoke` =1  and    `tb_record1`.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   ";
$query_dia2=mysql_query($str_dia2);
$num_smoke=mysql_num_rows($query_dia2);

$i_plus=$i+1;
 $pdf->setXY( 10 , $y_absolute +  ($r*$i_plus)  );
$pdf->SetFont('angsana','B',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
//$pdf->Cell( 80  , 15 , iconv( 'UTF-8','cp874' , 'โรคประจำตัว จำนวน '.$num_dia.' คน  ' ),LRTB,1,'C',true);
 $pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , 'สูบบุหรี่  จำนวน    '.$num_smoke.'    คน  ' ));
  $i_plus2=$i_plus+1;
  $rownumber1=1;
while($result2=mysql_fetch_object($query_dia2))
{
     $name=$result2->name;
     $surname=$result2->surname;
     $pdf->setXY( 10 , $y_absolute +  ($r*$i_plus2)  );
$pdf->SetFont('angsana','',15); #------ set fonts-----------
$pdf->SetFillColor(255,255, 255);
//$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , 'Patient \'s name : '  . $Name  .'                                     HN : '  . $HN  )   . '                           Ward : ' . $ward_  );
//$pdf->Cell( 80  , 15 , iconv( 'UTF-8','cp874' , 'โรคประจำตัว จำนวน '.$num_dia.' คน  ' ),LRTB,1,'C',true);
 $pdf->Cell( 80  , 5 , iconv( 'UTF-8','cp874' , '   '.$rownumber1."   ".$name."            ".$surname ));
 $i_plus2++;
 $rownumber1++;
}

//--------------- ดัชนีมวลกาย อ้วนอันตราย 
/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/

$str_bmi="  SELECT * FROM  `tb_record1` "
        ."LEFT  JOIN  `tb_employee`  ON   `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  "
        ."LEFT  JOIN   `tb_department`  ON    `tb_employee`.`id_department`=`tb_department`.`id_department`  "
        ."  where   BMI   >  25.0   AND   BMI  <= 29.9     and    `tb_record1`.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";

 
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

//$query_bmi2=  mysql_query( " SELECT * FROM `tb_record1` WHERE `BMI` > 10  " );
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

/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/

$str_bmi2="  SELECT * FROM  `tb_record1` "
        ."LEFT  JOIN  `tb_employee`  ON   `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee`  "
        ."LEFT  JOIN   `tb_department`  ON    `tb_employee`.`id_department`=`tb_department`.`id_department`  "
        ."  where   BMI   >=  30.0      and    `tb_record1`.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'       ";

 
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