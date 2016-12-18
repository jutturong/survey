<?php
 #http://localhost/servey1/report_pdf/servey/query_servey.php?y=2016
 require_once("../config.php");
 //require_once("report_case2.php");
 
 $Y=$_REQUEST['y']; //1969-02-28
 //$Y=date('Y');
 $Y_begin=$Y."-1-1";
 $Y_end=$Y."-12-31";


 $tb="`tb_record1`";
 $tbj1="`tb_employee`";



 $sql="  select  *  from  $tb  
     left join  $tbj1  on  $tb.`id_employee_main`= $tbj1.`id_employee`
     where   $tb.`dmy_insert`   between   $Y_begin   and  $Y_end
 ;";
 $result=mysql_query($sql);
 $num_rows=mysql_num_rows($result);

/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
*/

//----- จำนวนเทศทั้งหมด
 //$sex="  select  *  from   $tbj1  right  join   $tb   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where  $tbj1.id_sex > 0    ;";
 // $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '2016-1-1'  and   '2016-12-1'  
 $sex="  select  *  from   $tb    inner    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
 
 /*
  SELECT * FROM `tb_employee` RIGHT JOIN `tb_record1` ON `tb_employee`.`id_employee`=`tb_record1`.`id_employee_main` WHERE `tb_employee`.`id_sex` > 0 AND `tb_record1`.`dmy_insert` BETWEEN 2016-1-1 AND 2016-12-1
  */
 
 $result_sex=mysql_query($sex);
 $num_rows_sex=mysql_num_rows($result_sex);



/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
*/
 
//------ ชาย
  $sex_m="  select  *  from   $tb    left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
 //$sex_m="  select  id_sex from   $tbj1  join  $tbj1   where  id_sex = 1 ";
 $result_sex_m=mysql_query($sex_m);
 $num_rows_sex_m=mysql_num_rows($result_sex_m);

 $percen_m=  number_format($num_rows_sex_m/$num_rows_sex,1);


//------ หญิง
  $sex_w="  select  *  from   $tb    left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 2   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
 
 //$sex_w="  select  id_sex  from   $tbj1  where   id_sex = 2 ";
 
 $result_sex_w=mysql_query($sex_w);
 $num_rows_sex_w=mysql_num_rows($result_sex_w);

 $percen_w= number_format($num_rows_sex_w/$num_rows_sex,1);

 

/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/
 
 //------ อายุ -------
 $str_age="  select   birdthdate   from   $tbj1   left    join   $tb  on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'     ";
 $query_age=mysql_query($str_age);
 $array_date=array();
 while($result=mysql_fetch_row($query_age))
 {
 	    $result[0];
 	  //echo "<br>";
 	    $ex=explode("-",$result[0]);
 	  //echo  $ex[0];
 	  //echo "<br>";
        $calY=$Y_begin - $ex[0];
      //echo "<br>";
       
        array_push($array_date,$calY);
         $total_age += $calY;
 }
 
 
/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/

 //-------- ชาย อายุ ------
 $str_age_m="  select  birdthdate   from   $tbj1   right    join   $tb   on    $tb.`id_employee_main`=$tbj1.`id_employee`     where  $tbj1.`id_sex` =1  and   $tb.`dmy_insert`    between   '$Y_begin'  and   '$Y_end' ";
 $query_age_m=mysql_query($str_age_m);
 $array_date_m=array();
 while($result=mysql_fetch_row($query_age_m))
 {
 	    $result[0];
 	  //echo "<br>";
 	    $ex=explode("-",$result[0]);
 	  //echo  $ex[0];
 	  //echo "<br>";
        $calY_m=$Y_begin - $ex[0];
      //echo "<br>";
       
        array_push($array_date_m,$calY);
         $total_age_m += $calY_m;
        
         //------ 21-31 ปี 
         if( $calY_m >= 21  && $calY_m <= 30 )
         {
            //$total_age_m1 += $calY_m;
            
/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/

          //------ ชาย
             $sex_m1="  select  id_sex  from   $tbj1  right    join   $tb   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where      $tbj1.`id_sex` = 1  and   $tb.`dmy_insert`    between   '$Y_begin'  and   '$Y_end' ";
             $result_sex_m1=mysql_query($sex_m1);
             $num_rows_sex_m1=mysql_num_rows($result_sex_m1);
             //$num_rows_sex_m
             $percen_m1=$num_rows_sex_m1/$num_rows_sex_m1;
             //$percen_m= $num_rows_sex_m/$num_rows_sex;         
         }
        elseif( $calY_m >= 31  && $calY_m <= 40 )
            {
                    $sex_m2="  select  id_sex  from   $tbj1   right    join   $tb   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where  $tbj1.`id_sex` = 1  and   $tb.`dmy_insert`    between   '$Y_begin'  and   '$Y_end'  ";
                    $result_sex_m2=mysql_query($sex_m2);
                    $num_rows_sex_m2=mysql_num_rows($result_sex_m2);
                    //$num_rows_sex_m
                    $percen_m2=$num_rows_sex_m2/$num_rows_sex_m2;
                    //$percen_m= $num_rows_sex_m/$num_rows_sex;
            }
      elseif( $calY_m >= 41  && $calY_m <= 50 )
            {
                    $sex_m3="  select  id_sex  from   $tbj1  right    join   $tb   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where  $tbj1.`id_sex` = 1    and   $tb.`dmy_insert`    between   '$Y_begin'  and   '$Y_end'   ";
                    $result_sex_m3=mysql_query($sex_m3);
                    $num_rows_sex_m3=mysql_num_rows($result_sex_m3);
                    //$num_rows_sex_m
                    $percen_m3=$num_rows_sex_m3/$num_rows_sex_m3;
                    //$percen_m= $num_rows_sex_m/$num_rows_sex;
            }
             elseif( $calY_m >= 51  && $calY_m <= 60 )
            {
                    $sex_m4="  select  id_sex  from   $tbj1   right    join   $tb   on    $tb.`id_employee_main`=$tbj1.`id_employee`    where  $tbj1.`id_sex` = 1    and  $tb.`dmy_insert`    between   '$Y_begin'  and   '$Y_end' ";
                    $result_sex_m4=mysql_query($sex_m4);
                    $num_rows_sex_m4=mysql_num_rows($result_sex_m4);
                    //$num_rows_sex_m
                    $percen_m4=$num_rows_sex_m4/$num_rows_sex_m4;
                    //$percen_m= $num_rows_sex_m/$num_rows_sex;
            }
            
            

 }//end while
             
/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/

 //-------- หญิง อายุ ------
 $str_age_w="  select  `birdthdate`   from   $tbj1  right    join   $tb   on    $tb.`id_employee_main`=$tbj1.`id_employee`    where   $tbj1.`id_sex`=2    and  $tb.`dmy_insert`    between   '$Y_begin'  and   '$Y_end'   ";
 $query_age_w=mysql_query($str_age_w);
 $array_date_w=array();
 while($result=mysql_fetch_row($query_age_w))
 {//-------- หญิง อายุ ------
        $result[0];	
       $ex=explode("-",$result[0]);	
        $calY_w=$Y_begin - $ex[0];
        array_push($array_date_w, $calY_w);
        $total_age_w += $calY_w;
                //------ 21-30 ปี 
                   if( $calY_w >= 21  && $calY_w <= 30 )
                   {
                      //$total_age_m1 += $calY_m;
                    //------ ชาย
                       $sex_w1="  select  id_sex  from   $tbj1  where  id_sex = 2 ";
                       $result_sex_w1=mysql_query($sex_w1);
                       $num_rows_sex_w1=mysql_num_rows($result_sex_w1);
                       //$num_rows_sex_m
                       $percen_w1=$num_rows_sex_w1/$num_rows_sex_w1;
                       //$percen_m= $num_rows_sex_m/$num_rows_sex;         
                   }
                    //------ 31-40 ปี 
                  else if( $calY_w >= 31  && $calY_w <= 40 )
                   {
                      //$total_age_m1 += $calY_m;
                    //------ ชาย
                       $sex_w2="  select  id_sex  from   $tbj1  where  id_sex = 2 ";
                       $result_sex_w2=mysql_query($sex_w2);
                       $num_rows_sex_w2=mysql_num_rows($result_sex_w2);
                       //$num_rows_sex_m
                       $percen_w2=$num_rows_sex_w2/$num_rows_sex_w2;
                       //$percen_m= $num_rows_sex_m/$num_rows_sex;         
                   }
                    //------ 41-50 ปี 
                  else if( $calY_w >= 41  && $calY_w <= 50 )
                   {
                      //$total_age_m1 += $calY_m;
                    //------ ชาย
                       $sex_w3="  select  id_sex  from   $tbj1  where  id_sex = 2 ";
                       $result_sex_w3=mysql_query($sex_w3);
                       $num_rows_sex_w3=mysql_num_rows($result_sex_w3);
                       //$num_rows_sex_m
                       $percen_w3=$num_rows_sex_w3/$num_rows_sex_w3;
                       //$percen_m= $num_rows_sex_m/$num_rows_sex;         
                   }
 }

            
/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/

 // ดัชนีมวลกาย
 $str_bmi=" SELECT   *    FROM   $tb  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`    where       $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'  ";
 $query_bmi=mysql_query( $str_bmi );
//echo  mysql_num_rows($query_bmi);
 $total_bmi=0;
 while($result=  mysql_fetch_row($query_bmi))
 {
   
      $total_bmi  +=   $result[5]; //ดัชนีมวลกายรวม
     
      if( $result[5]  <=  18.5 ) //น้อยกว่า 18.5
      {
          $bmi_1 += $result[5];
      }  
      elseif(  $result[5]  >   18.5   &&    $result[5]   <=  22.9  )   //ปกติ 18.5-22.9
      {
           $bmi_2 += $result[5];
      }
      elseif(  $result[5]  >   23.0   &&    $result[5]   <=  24.9  )   
      {
           $bmi_3 += $result[5];
      }
       elseif(  $result[5]  >=   25.5   &&    $result[5]   <=  29.9  )   
      {
           $bmi_4 += $result[5];
      }
        elseif(  $result[5]  >=   30    )   
      {
           $bmi_5 += $result[5];
      }
      
 }
      $total_bmi = number_format($total_bmi,1) ; //ดัชนีมวลกายรวม
      
      $bmi_1=number_format($bmi_1);//น้อยกว่า 18.5
      $percent_bmi_1 = number_format(  ( $bmi_1/$total_bmi ) * 100 ,1) ; //น้อยกว่า 18.5 (ร้อยละ)
      
       $bmi_2=number_format($bmi_2);//น้อยกว่า 18.5
      $percent_bmi_2 = number_format(  ( $bmi_2/$total_bmi ) * 100 ,1) ; //น้อยกว่า 18.5 (ร้อยละ)
      
       $bmi_3=number_format($bmi_3);
      $percent_bmi_3 = number_format(  ( $bmi_3/$total_bmi ) * 100 ,1) ; 
      
       $bmi_4=number_format($bmi_4);
       $percent_bmi_4 = number_format(  ( $bmi_4/$total_bmi ) * 100 ,1) ; 
       
        $bmi_5=number_format($bmi_5);
       $percent_bmi_5 = number_format(  ( $bmi_5/$total_bmi ) * 100 ,1) ; 
       
     ##--------------รอบเอว  AR  ชาย
              
/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/

     //SELECT * FROM `tb_record1` LEFT JOIN `tb_employee` ON `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee` where `tb_employee`.`id_sex`=1 
     $srt_ar=" SELECT * FROM  $tb  LEFT  JOIN  $tbj1  ON   $tb.`id_employee_main`=$tbj1.`id_employee`  where  $tbj1.`id_sex`=1  and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   ";
     $query_ar=  mysql_query($srt_ar);    
     //echo  mysql_num_fields($query_ar);
     while($result= mysql_fetch_object($query_ar))
     {
            $ar=$result->AR;
            $total_ar_m += $ar;
            //echo "<br>";    
              if(   $ar  >= 1   &&  $ar <= 89 )
              {
                    $ar_m1 += $result->AR;   
                      $percent_ar_m1=$ar_m1/$total_ar_m;
              }
              elseif(  $ar >=  90  )
              {
                   $ar_m2 += $result->AR;     
                    $percent_ar_m2=$ar_m2/$total_ar_m;
              }
     }
   //  echo $total_ar_m;
      
       
        
 ##--------------รอบเอว  AR  หญิง
              
/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/

     //SELECT * FROM `tb_record1` LEFT JOIN `tb_employee` ON `tb_record1`.`id_employee_main`=`tb_employee`.`id_employee` where `tb_employee`.`id_sex`=1 
     $srt_ar_w=" SELECT * FROM  $tb  LEFT  JOIN  $tbj1  ON   $tb.`id_employee_main`=$tbj1.`id_employee`  where  $tbj1.`id_sex`=2   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'  ";
     $query_ar_w=  mysql_query($srt_ar_w);    
     //echo  mysql_num_fields($query_ar);
     while($result= mysql_fetch_object($query_ar_w))
     {
            $ar=$result->AR;
            $total_ar_w += $ar;
            //echo "<br>";   
             if(   $ar  >= 1   &&  $ar <= 79 )
              {
                    $ar_w1 += $result->AR;      
                     $percent_ar_w1=$ar_w1/$total_ar_w;
              }
              elseif(  $ar >= 80 )
              {
                   $ar_w2 += $result->AR; 
                      $percent_ar_w2=$ar_w2/$total_ar_w; 
              }
     }
                  
/*
 $tb="`tb_record1`";
 $tbj1="`tb_employee`";
 where    $tbj1.id_sex > 0   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   
  left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where    $tbj1.id_sex = 1   and    $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'      ";
*/

   ##--------------- สูบบุหรี่------------------
     $strm=" select *  from  $tb   left    join   $tbj1   on    $tb.`id_employee_main`=$tbj1.`id_employee`   where      $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   ";
     $query_strm=mysql_query($strm);
     $row_tb_all=mysql_num_rows($query_strm); //จำนวนคนทั้งหมด
     //----------- สูบ---------------
     $str_m_call="select  *  from  $tb  where  smoke in (1)   and     $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'  ";
     $query_strm_call=mysql_query($str_m_call);
     $smoke_all=mysql_num_rows($query_strm_call); //จำนวนคนสูบบุหรี่ทั้งหมด
     $percent_smoke_all= ($smoke_all/$row_tb_all)*100;
    //echo "<br>";
      //----------- ไม่สูบ---------------
     $str_m_not="select  *  from  $tb  where  smoke not in (1)  and     $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'  ";
     $query_strm_not=mysql_query($str_m_not);
      $smoke_not_all=mysql_num_rows($query_strm_not); //จำนวนคนสูบบุหรี่ทั้งหมด
      $percent_smoke_not_all= ($smoke_not_all/$row_tb_all)*100;
      
      
      //---------- ดื่มสุรา------------------------------
     $str_alh_call="select  *  from  $tb  where  alh in (1)   and     $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'  ";
     $query_alh_call=mysql_query($str_alh_call);
     $alh_all=mysql_num_rows($query_alh_call); //จำนวนคนสูบบุหรี่ทั้งหมด
     $percent_alh_all= ($alh_all/$row_tb_all)*100;
     
     $str_alh_not="select  *  from  $tb  where  alh not in (1) ";
     $query_alh_not=mysql_query($str_alh_not);
      $alh_not_all=mysql_num_rows($query_alh_not); //จำนวนคนสูบบุหรี่ทั้งหมด
      $percent_alh_not_all= ($alh_not_all/$row_tb_all)*100;
      
      
      //------------- ออกกำลังกายประจำ------------------------
       $str_exer_call="select  *  from  $tb  where  exer  in (1)  and     $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'  ";
     $query_exer_call=mysql_query($str_exer_call);
     $exer_all=mysql_num_rows($query_exer_call); //จำนวนคนสูบบุหรี่ทั้งหมด
     $percent_exer_all= ( $exer_all/$row_tb_all)*100;
     
     //-------------ไม่ออกกำลังกาย---------------
       $str_not_exer="select  *  from  $tb  where  exer     in (0)   and     $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'  ";
     $query_not_exer=mysql_query($str_not_exer);
      $not_exer=mysql_num_rows($query_not_exer); //จำนวนคนสูบบุหรี่ทั้งหมด
      $percent_not_exer= ($not_exer/$row_tb_all)*100;
     
     
     //-------------การออกกำลังกายบางครั้ง---------------
       $str_use_sometimes="select  *  from  $tb  where  use_sometimes   in (1)   and     $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'  ";
     $query_use_sometimes=mysql_query($str_use_sometimes);
      $use_sometimes=mysql_num_rows($query_use_sometimes); //จำนวนคนสูบบุหรี่ทั้งหมด
      $percent_use_sometimes= ($use_sometimes/$row_tb_all)*100;
      
       //-------------การออกกำลังกายสม่ำเสมอ---------------
       $str_use_always="select  *  from  $tb  where  use_always   in (1)   and     $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'  ";
     $query_use_always=mysql_query($str_use_always);
      $use_always=mysql_num_rows($query_use_always); //จำนวนคนสูบบุหรี่ทั้งหมด
      $percent_use_always= ($use_always/$row_tb_all)*100;
      
      
      //-------- สวมหมวกกันน็อค---------------------------
     $str_head_call="select  *  from  $tb  where  head  in (1) ";
     $query_head_call=mysql_query($str_head_call);
     $head_all=mysql_num_rows($query_head_call); //จำนวนคนสูบบุหรี่ทั้งหมด
     $percent_head_all= ($head_all/$row_tb_all)*100;
      
      $str_head_not="select  *  from  $tb  where  head  not in (1) and     $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'  ";
     $query_head_not=mysql_query($str_head_not);
      $head_not_all=mysql_num_rows($query_head_not); //จำนวนคนสูบบุหรี่ทั้งหมด
      $percent_head_not_all= ($head_not_all/$row_tb_all)*100;
      
      //------------ คาดเข็มขัดนิรภัย---------------------------
     $str_belt_call="select  *  from  $tb  where  belt  in (1)   and     $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   ";
     $query_belt_call=mysql_query($str_belt_call);
     $belt_all=mysql_num_rows($query_belt_call); //จำนวนคนสูบบุหรี่ทั้งหมด
     $percent_belt_all= ($belt_all/$row_tb_all)*100;
     
      $str_belt_not="select  *  from  $tb  where  belt  not in (1)    and     $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'  ";
     $query_belt_not=mysql_query($str_belt_not);
      $belt_not_all=mysql_num_rows($query_belt_not); //จำนวนคนสูบบุหรี่ทั้งหมด
      $percent_belt_not_all= ($belt_not_all/$row_tb_all)*100;
      
      
      //------------โรคประจำตัวทั้งหมด-----------------------
      $str_dia="select *  from  $tb  where  diag_detail > 0    and     $tb.`dmy_insert`   between   '$Y_begin'  and   '$Y_end'   ";
      $query_dia=mysql_query($str_dia);
      $num_dia=mysql_num_rows($query_dia); //จำนวนคนที่มีโรคประจำตัว
      
?>