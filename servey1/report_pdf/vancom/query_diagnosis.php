<?php
  require_once("../config.php");
  require_once("pdf_class.php"); //class PDF

  require_once("report_case2.php"); // report pdf

#http://localhost/vancom/report_pdf/vancom/report_case2.php
#http://localhost/vancom/report_pdf/vancom/query_diagnosis.php

//echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";

   $id=trim($_GET["id"]);
  if( $id  > 0  )
  {
  		//echo $id;
   


  	  $tb1=" `tb_diagnosis` ";
  	  $tb2=" `tb_patient` ";
      $tb3="`tb_indication`"; //Reason for TDM 1 (Indication)     $tb1.indication1=$tb3.id_indication
      $tb4="`tb_disease`"; //Underllying disease 1 :   $tb1.underllyingdisease1=$tb4.id_disease
      $tb5="`reason_tdm`"; //Reason for TDM :
      $tb6="`tb_drug`";  //Drug level requested (Vancomycin)
      $tb7="tb_unit_measured_level";  //3. Measured level : หน่วย
      $tb8="`tb_vd`";  //Vd :

  	  $str=" select *  from  $tb1 
                 left  join  $tb2  on  $tb1.id_patient=$tb2.id_patient
                 left  join  $tb3  on  $tb1.indication1=$tb3.id_indication
                
                 left  join  $tb4  on  $tb1.underllyingdisease1=$tb4.id_disease
                 left  join  $tb5  on  $tb1.reason_for_TDM=$tb5.id_reason
                 left  join  $tb6  on  $tb1.vancomycin=$tb6.id_drug

                 left  join  $tb7  on   $tb1.measured_level_cmb=$tb7.id_unit

                 left  join  $tb8  on    $tb1.vd_index=$tb8.id_vd

  	              where  id_diagnosis=$id ; ";
  	  $result=mysql_query($str); 
  	  while ($row=mysql_fetch_object($result)) 
  	  {
  	  	  $Name=$row->Name;
  	  	  $ward_ = $row->ward_;
          $HN=$row->HN;
          $bodyweight=$row->bodyweight;
          $cb_conts=$row->cb_conts;
          $Sex=$row->Sex;
          if( $Sex == 1 )
           {   $sex_detail="ชาย";     }
          elseif( $Sex == 2 )  
            {  $sex_detail="หญิง";    }
          $height=$row->height;
          $indication1=$row->indication1;
          $indication_detail=$row->indication_detail;

          $indication2=$row->indication2;
          $str2=" select  *   from  $tb3  where   id_indication=$indication2 ; ";
          $result2=mysql_query($str2);
          $row2=mysql_fetch_row($result2);
          $indication_detail2=$row2[1];

          //$indication_detail2=$row->indication_detail;
          $underllyingdisease1=$row->underllyingdisease1;
          $disease_detail=$row->disease_detail;

          $underllyingdisease2=$row->underllyingdisease2;
          $str2=" select  *   from  $tb4  where  id_disease=$underllyingdisease2 ; ";
          $result2=mysql_query($str2);
          $row2=mysql_fetch_row($result2);
          $disease_detail2=$row2[1];

          $underllyingdisease3=$row->underllyingdisease3;
          $str3=" select  *   from  $tb4  where  id_disease=$underllyingdisease3 ; ";
          $result3=mysql_query($str3);
          $row3=mysql_fetch_row($result3);
          $disease_detail3=$row3[1];


          $underllyingdisease4=$row->underllyingdisease4;
          $str4=" select  *   from  $tb4  where  id_disease=$underllyingdisease4 ; ";
          $result4=mysql_query($str4);
          $row4=mysql_fetch_row($result4);
          $disease_detail4=$row4[1];

          $underllyingdisease5=$row->underllyingdisease5;
          $str5=" select  *   from  $tb4  where  id_disease=$underllyingdisease5 ; ";
          $result5=mysql_query($str5);
          $row5=mysql_fetch_row($result5);
          $disease_detail5=$row5[1];


          $underllyingdisease6=$row->underllyingdisease6;
          $str6=" select  *   from  $tb4  where  id_disease=$underllyingdisease6 ; ";
          $result6=mysql_query($str6);
          $row6=mysql_fetch_row($result6);
          $disease_detail6=$row6[1];

         
          $underllyingdisease7=$row->underllyingdisease7;
          $str6=" select  *   from  $tb4  where  id_disease=$underllyingdisease7 ; ";
          $result6=mysql_query($str6);
          $row6=mysql_fetch_row($result6);
          $disease_detail7=$row6[1];

          $underllyingdisease8=$row->underllyingdisease8;
          $str6=" select  *   from  $tb4  where  id_disease=$underllyingdisease8 ; ";
          $result6=mysql_query($str6);
          $row6=mysql_fetch_row($result6);
          $disease_detail8=$row6[1];

          $underllyingdisease9=$row->underllyingdisease9;
          $str6=" select  *   from  $tb4  where  id_disease=$underllyingdisease9 ; ";
          $result6=mysql_query($str6);
          $row6=mysql_fetch_row($result6);
          $disease_detail9=$row6[1];

          $underllyingdisease10=$row->underllyingdisease10;
          $str6=" select  *   from  $tb4  where  id_disease=$underllyingdisease10 ; ";
          $result6=mysql_query($str6);
          $row6=mysql_fetch_row($result6);
          $disease_detail10=$row6[1];


          $reason_for_TDM=$row->reason_for_TDM;
          $reason_detail=$row->reason_detail;

          $vancomycin=$row->vancomycin;
          $drug_detail=$row->drug_detail;

          $current_medications=$row->current_medications;
          $current_medications_weight=$row->current_medications_weight;

          $current_medications_date=$row->current_medications_date;

          $current_medications_date_format=dmy_format($current_medications_date);

          $laboratorydata5day=$row->laboratorydata5day;
          $laboratory_Data_mg=$row->laboratory_Data_mg;
          $Laboratory_Data_date=$row->Laboratory_Data_date;
          $Laboratory_Data_date_format=dmy_format($current_medications_date);

          $sampling_time=$row->sampling_time;
          $sampling_time_conv=dmy_date_format($sampling_time);

          $drugadministrationtime=$row->drugadministrationtime;
          $drugadministrationtime_conv=dmy_date_format($drugadministrationtime);

          $measured_level=$row->measured_level;
          $measured_level_cmb=$row->measured_level_cmb;

          $vd_index=$row->vd_index;
          $vd=$row->vd;
          $vd_detail=$row->vd_detail;

          $cl=$row->cl;
          $ke=$row->ke;
          $hl=$row->hl;

          $assessment=$row->assessment;
          $Interpretation_Recommendation=$row->Interpretation_Recommendation;

          $Note=$row->Note;

          $pharmacist1=$row->pharmacist1;
          $pharmacist2=$row->pharmacist2;

          $tel=$row->tel;

          $date_record=$row->date_record;
          $date_record_conv=dmy_format($date_record);

          $unit_detail=$row->unit_detail;



  	  }
  	  




  }

  function   dmy_format($dmy) // date
      {
          if( strlen($dmy) > 0 )
          {
             //return  $dmy;
              $ex=explode("-",$dmy);
              $Y=$ex[0]+543;
              //return  $ex[2]."/".$ex[1]."/".$ex[0];
              return  $ex[2]."/".$ex[1]."/".$Y;
          }
      }
  function   dmy_date_format($dmy)
  {
         if( strlen($dmy) > 0 )
         {
             $ex=explode(" ",$dmy);
             //return  $ex[0];
             if( strlen($ex[0]) > 0 )
             {
                    $s1=explode("-",$ex[0]);
                    $YY=$s1[0]+543;
                    return  $s1[2]."/".$s1[1]."/".$YY." ".$ex[1];

             }
         }
  }

?>