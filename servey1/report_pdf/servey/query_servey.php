<?php

 #http://localhost/servey1/report_pdf/servey/query_servey.php?y=2016


 require_once("../config.php");
 //require_once("report_case2.php");

 $Y=$_REQUEST['y']; //1969-02-28
 $Y_begin=$Y."-1-1";
 $Y_end=$Y."-12-31";


 $tb="`tb_record1`";
 //$tbj1="id_employee_main"
 $tbj1="`tb_employee`";



 $sql="  select  *  from  $tb  
     left join  $tbj1  on  $tb.`id_employee_main`= $tbj1.`id_employee`

 ;";
 $result=mysql_query($sql);
 $num_rows=mysql_num_rows($result);



//----- จำนวนเทศทั้งหมด
 $sex="  select  *  from   $tbj1  where  id_sex > 0   ;";
 $result_sex=mysql_query($sex);
 $num_rows_sex=mysql_num_rows($result_sex);



//------ ชาย
 $sex_m="  select  id_sex from   $tbj1  where  id_sex = 1 ";
 $result_sex_m=mysql_query($sex_m);
 $num_rows_sex_m=mysql_num_rows($result_sex_m);

 $percen_m= $num_rows_sex_m/$num_rows_sex;


//------ หญิง
 $sex_w="  select  id_sex  from   $tbj1  where   id_sex = 2 ";
 $result_sex_w=mysql_query($sex_w);
 $num_rows_sex_w=mysql_num_rows($result_sex_w);

 $percen_w= $num_rows_sex_w/$num_rows_sex;

 

 //------ อายุ -------
 $str_age="  select   birdthdate   from   $tbj1   ";
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
  // print_r($array_date);
  //  echo $array_date[0];
   //echo $total_age;

 //-------- ชาย อายุ ------
 $str_age_m="  select  birdthdate   from   $tbj1  where  id_sex=1 ";
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
          //------ ชาย
             $sex_m1="  select  id_sex  from   $tbj1  where  id_sex = 1 ";
             $result_sex_m1=mysql_query($sex_m1);
             $num_rows_sex_m1=mysql_num_rows($result_sex_m1);

             //$num_rows_sex_m
             $percen_m1=$num_rows_sex_m1/$num_rows_sex_m;
             //$percen_m= $num_rows_sex_m/$num_rows_sex;
             
         }

/*
         elseif( $calY_m >= 31  &&  $calY_m <= 40 ) //------- 31-40 ปี
         {
            //$total_age_m1 += $calY_m;
          //------ ชาย
            
             $sex_m2="  select  id_sex  from   $tbj1  where  id_sex = 1 ";
             $result_sex_m2=mysql_query($sex_m2);
             $num_rows_sex_m2=mysql_num_rows($result_sex_m2);

             //$num_rows_sex_m
             $percen_m2=$num_rows_sex_m2/$num_rows_sex_m;
             //$percen_m= $num_rows_sex_m/$num_rows_sex;
             
         }
*/

 }
 


?>