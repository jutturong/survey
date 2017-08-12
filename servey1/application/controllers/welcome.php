<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

        var  $title=" โปรแกรมสำรวจพฤติกรรมสุขภาพบุคลากรโรงพยาบาลขอนแก่น ";
        var  $tb_main="tb_employee";
        var  $tb_analy="tb_record1";
        public function __construct()
        {

             parent::__construct();
             $this->load->helper('html');
            // $this->load->library('database');
        }

	public function index()
	{
            
                         date_default_timezone_set("Asia/Bangkok");    
                          $sess_timerecord=date("Y-m-d H:s:00");
                        // echo br();
                        $data["year_cur"]=date("Y");
                       // echo br();
     
		//$this->load->view('welcome_message');
             $data['title']=$this->title;
             $this->load->view('home',$data);
	}

        public  function  insert_employee() //เพิ่มข้อมูล
        {
            // http://localhost/servey1/index.php/welcome/insert_employee

            //echo json_encode(array("status"=>"บันทึกข้อมูลแล้ว"));
          //  $id_title=trim($this->input->get_post('id_title'));
            //echo "<br>";
            $firstname=trim($this->input->get_post('firstname'));
            //echo "<br>";
             $lastname=trim($this->input->get_post('lastname'));
            //echo '<br>';



            $id_department=trim($this->input->get_post("id_department"));
            //echo "<br>";
            $cmb_vocation_detail=trim($this->input->get_post("cmb_vocation_detail"));
            //echo "<br>";

            $id_sex=trim($this->input->get_post("id_sex"));
            $birdthdate=trim($this->input->get_post("birdthdate"));
            if( strlen($birdthdate) > 0  )
            {
                $ex=explode("/",$birdthdate);
                $conv_brd=$ex[2]."-".$ex[0]."-".$ex[1];
            }

            $tb=$this->tb_main;
            $data=array(
               // "id_title"=>$id_title,
                "name"=>$firstname,
                "surname"=>$lastname,
               "id_department"=>$id_department,
               "id_vocation"=>$cmb_vocation_detail,
                "id_sex"=>$id_sex,
               //"birdthdate"=>$birdthdate,
                "birdthdate"=>$conv_brd,
            );
             $ck=$this->db->insert($tb,$data);
             if( $ck )
             {
                 echo "1";
             }else
             {
                 echo "0";
             }





            }

            //
            public function  auto_emp()
            {
                // http://localhost/servey1/index.php/welcome/auto_emp
               $q = isset($_POST['q']) ? $_POST['q'] : '';
               $this->db->like("name",$q);
               $query=$this->db->get($this->tb_main);
               foreach($query->result() as $row)
               {
                   $rows[]=$row;
               }
               echo json_encode($rows);
            }

            public  function id_emp() //search  by  รายชื่อ employee
            {
               // http://localhost/servey1/index.php/welcome/id_emp/22
                $id=trim($this->uri->segment(3));
                if( $id > 0 )
                {
                    $q=$this->db->get_where($this->tb_main,array("id_employee"=>$id));
                    foreach($q->result() as $row )
                    {
                        $rows[]=$row;
                    }
                    echo  json_encode($rows);
                }

            }

            public function update_emp()
            {
               // http://localhost/servey1/index.php/welcome/update_emp
                    $id_employee=trim($this->input->get_post('id_employee'));

                  //  $id_title=trim($this->input->get_post('id_title'));
            //echo "<br>";
                    $firstname=trim($this->input->get_post('firstname'));
                    //echo "<br>";
                     $lastname=trim($this->input->get_post('lastname'));
                    //echo '<br>';



                    $id_department=trim($this->input->get_post("id_department"));
                    //echo "<br>";
                    $cmb_vocation_detail=trim($this->input->get_post("cmb_vocation_detail"));
                    //echo "<br>";

                      $id_sex=trim($this->input->get_post("id_sex"));
            $birdthdate=trim($this->input->get_post("birdthdate"));
            if( strlen($birdthdate) > 0  )
            {
                $ex=explode("/",$birdthdate);
                $conv_brd=$ex[2]."-".$ex[0]."-".$ex[1];
            }


                    $tb=$this->tb_main;
                    $data=array(
                     //   "id_title"=>$id_title,
                        "name"=>$firstname,
                        "surname"=>$lastname,
                       "id_department"=>$id_department,
                       "id_vocation"=>$cmb_vocation_detail,
                           "id_sex"=>$id_sex,
               //"birdthdate"=>$birdthdate,
                "birdthdate"=>$conv_brd,
                    );
                    $this->db->where("id_employee",$id_employee);
                    $ck=$this->db->update($tb,$data);
                    if( $ck )
                    {
                        echo "1";
                    }
                    else
                    {
                        echo "0";
                    }

            }
            public  function  id_analy() //search by  การวิเคราะห์ผล
            {
               // http://localhost/servey1/index.php/welcome/id_analy/22
                $id=trim($this->uri->segment(3));
                if( $id > 0 )
                {
                    $q=$this->db->get_where($this->tb_analy,array("id_employee_main"=>$id));
                    foreach($q->result() as $row )
                    {
                        $rows[]=$row;
                    }
                    echo  json_encode($rows);
                }

            }

            public  function  fetch_employee()
            {

                 // http://localhost/servey1/index.php/welcome/fetch_employee
                $tb=$this->tb_main;
                $tbj1="tb_vocation";
                $tbj2="tb_department";
                $tbj3="tb_sex";

                $this->db->order_by($tb.".id_employee","desc");
                $this->db->join($tbj1,$tb.".id_vocation=".$tbj1.".id_vocation","left");
                $this->db->join($tbj2,$tb.".id_department=".$tbj2.".id_department","left");
                $this->db->join($tbj3,$tb.".id_sex=".$tbj3.".id_sex","left" );
                $obj=$this->db->get($tb,15);

                $va_arr = array();
                        foreach($obj->result() as $row )
                        {
                            $va_arr[]=$row;
                        }
                        echo json_encode($va_arr);


            }
           //http://localhost/servey1/index.php/welcome/fetch_vocation
            public function fetch_vocation()
            {
                  $tb="tb_vocation";
                $q=$this->db->get($tb);
                foreach($q->result() as $row)
                {
                    $rows[]=$row;
                }
                echo json_encode($rows);
            }
           //http://localhost/servey1/index.php/welcome/fetch_department
            public  function  fetch_department()  // เลือกแผนกการทำงาน
            {
                 // http://localhost/servey1/index.php/welcome/fetch_department
               // $q=$this->db->query(" select  distinct department from  `tb_employee` ");
                $tb="tb_department";
                $q=$this->db->get($tb);
                foreach($q->result() as $row)
                {
                    $rows[]=$row;
                }
                echo json_encode($rows);
            }

            function  del_emp()
            {
                $id_employee=trim($this->input->get_post('id_employee'));
                if( $id_employee > 0 )
                {
                            $tb=$this->tb_main;
                            $this->db->where('id_employee', $id_employee );
                            $ck=$this->db->delete($tb);
                            if( $ck )
                            {
                                echo json_encode(array("success"=>1));
                            }
                            else
                            {
                                echo json_encode(array("success"=>0));
                            }
                }
                else
                {
                    echo json_encode(array("success"=>0));
                }

            }

            #----- TABLE สำหรับการวิเคราะห์ผล -------------
            function  add_analysis1()
            {
                 //echo json_encode(array("success"=>1));
                $id_employee=$this->input->get_post("id_emp");
               //echo "<br>";
               // $id_employee=trim($this->uri->segment(3));
                //echo "<br>";
               $age=$this->input->get_post('age');
                //echo "<br>";
                 $w=$this->input->get_post('w');
               // echo "<br>";
                 $H=$this->input->get_post('H');
               // echo "<br>";
                 $AR=$this->input->get_post('AR');

                $BMI=$this->input->get_post("calBMI");
               //echo "<br>";
                $id_diag=$this->input->get_post('id_diag');
               // echo  "<br>";
                 $diag_detail=$this->input->get_post('diag_detail');
                //echo "<br>";
                 $smoke=$this->input->get_post('smoke');
                //echo "<br>";
                 $alh=$this->input->get_post('alh');
                //echo "<br>";
                 $exer=$this->input->get_post("ex");
               // echo "<br>";
                  $head=$this->input->get_post('head');
                //echo "<br>";
                 $belt=$this->input->get_post('belt');
                //echo  "<br>";
                  $dmy_insert=$this->input->get_post('dmy_insert');

                     if(  $dmy_insert   !=  ""  )
                     {
                         $ex=explode("/",$dmy_insert);
                         $conv=$ex[2]."-".$ex[0]."-".$ex[1];
                     }

                   $use_sometimes=$this->input->get_post("use_sometimes"); //การออกกำลังกาย     บางครั้ง
									 if($use_sometimes == '' ){ $use_sometimes=0; }
									// echo $use_sometimes;

                  $use_always=$this->input->get_post("use_always");   // การออกกำลังกาย   สม่ำเสมอ

                     $data=array(
                         "id_employee_main"=>$id_employee,
                        "age"=>$age,
                        "w"=>$w,
                         "H"=>$H,
                         "BMI"=>$BMI,
                        "id_diag"=>$id_diag,
                      "diag_detail"=>$diag_detail,
                        "smoke"=>$smoke,
                         "alh"=>$alh,
                       "exer"=>$exer,
                        "head"=>$head,
                       "belt"=>$belt,
                        "dmy_insert"=>$conv,
                         "AR"=>$AR,
                         "use_sometimes"=>$use_sometimes,
                    //    "use_always"=>$use_always,
                     );

                     $tb="tb_record1";


                     $ck= $this->db->insert($tb,$data);

                     if( $ck )
                                {
                                    echo "1";
                                }else
                                {
                                    echo "0";
                                }



                       }


           public  function  fetch_analy1()
            {

                // http://localhost/servey1/index.php/welcome/fetch_analy1
                $this->db->order_by("id_record","desc");
                $tb="tb_record1";
                $tb_main=$this->tb_main;
                $this->db->join($this->tb_main,$tb.".id_employee_main=".$tb_main.".id_employee" ,"left");
                $this->db->order_by("id_record","DESC");
                $obj=$this->db->get($tb,15);



                $va_arr = array();
                        foreach($obj->result() as $row )
                        {
                            $va_arr[]=$row;
                        }
                        echo json_encode($va_arr);


            }

            function  del_analy()
            {
                $id_record=trim($this->input->get_post('id_record'));
                if( $id_record > 0 )
                {
                            $tb=$this->tb_main;
                            $this->db->where('id_record', $id_record );
                            $ck=$this->db->delete("tb_record1");
                            if( $ck )
                            {
                                echo json_encode(array("success"=>1));
                            }
                            else
                            {
                                echo json_encode(array("success"=>0));
                            }
                }
                else
                {
                    echo json_encode(array("success"=>0));
                }

            }

           #----- อาชีพ ----------------
     #SELECT * FROM `tb_vocation`
     # http://localhost/servey1/index.php/welcome/tb_vocation
     function  tb_vocation()
     {
         $q=trim($this->input->get_post('q'));
         $tb="tb_vocation";
         $this->db->like('vocation_detail',$q);
       //  $this->db->order_by('id_vocation','desc');
         $q=$this->db->get($tb);
         foreach($q->result() as $row)
         {
             $rows[]=$row;
         }
         echo  json_encode($rows);
     }
      # http://localhost/servey1/index.php/welcome/insert_vocation
     function insert_vocation()
     {
           $vocation_detail=trim($this->input->get_post('add_vocation_detail'));
         //echo "<br>";

         $data=array(
             "vocation_detail"=>$vocation_detail,
         );
         $tb="tb_vocation";
         $ck=$this->db->insert($tb,$data);
         if( $ck )
         {
             echo "1";
         }else
         {
             echo "0";
         }
     }
      # http://localhost/servey1/index.php/welcome/del_vocation
     function del_vocation()
     {
         $id_vocation=trim($this->uri->segment(3));
         //echo $id_vocation;

         $tb="tb_vocation";
          $this->db->where("id_vocation",$id_vocation);
          $ck=$this->db->delete($tb);
          if( $ck )
         {
             echo "1";
         }else
         {
             echo "0";
         }
     }
     # http://localhost/servey1/index.php/welcome/update_vocation
     function update_vocation()
     {
           $tb="tb_vocation";
          // $id_vocation=trim($this->uri->segment(3));
          $id_vocation=trim($this->input->get_post("id_vocation"));
           //echo "<br>";
          $add_vocation_detail=trim($this->input->get_post("add_vocation_detail"));
          //echo "<br>";
          $data=array( "vocation_detail"=>$add_vocation_detail );
          $this->db->where("id_vocation",$id_vocation);
          $ck=$this->db->update($tb,$data);
          if( $ck )
         {
             echo "1";
         }else
         {
             echo "0";
         }
     }

     # Depart ment
     # SELECT * FROM `tb_department`
     # http://localhost/servey1/index.php/welcome/tb_department
     function tb_department()
     {
         $q=trim($this->input->get_post('q'));
         $tb="tb_department";
         $this->db->like('department_detail',$q);
       //  $this->db->order_by('id_vocation','desc');
         $q=$this->db->get($tb);
         foreach($q->result() as $row)
         {
             $rows[]=$row;
         }
         echo  json_encode($rows);
     }
      # http://localhost/servey1/index.php/welcome/insert_department
     function insert_department()
     {
         $department_detail=trim($this->input->get_post("department_detail"));
         $tb="tb_department";
         $data=array("department_detail"=>$department_detail);
         $ck=$this->db->insert($tb,$data);
          if( $ck )
         {
             echo "1";
         }else
         {
             echo "0";
         }
     }
      # http://localhost/servey1/index.php/welcome/update_department
     function update_department()
     {
         $id_department=trim($this->input->get_post("id_department"));
        //echo "<br>";
         $department_detail=trim($this->input->get_post("department_detail"));
        $tb="tb_department";
         /*
            department_detail:department_detail,
            id_department:id_department,
          */
         $data=array("department_detail"=>$department_detail);
         $this->db->where("id_department",$id_department);
         $ck=$this->db->update($tb,$data);
         if( $ck )
         {
             echo "1";
         }else
         {
             echo "0";
         }
     }
     # http://localhost/servey1/index.php/welcome/del_department
     function del_department()
     {
         $id_department=trim($this->uri->segment(3));
         //echo $id_vocation;

         $tb="tb_department";
          $this->db->where("id_department",$id_department);
          $ck=$this->db->delete($tb);
          if( $ck )
         {
             echo "1";
         }else
         {
             echo "0";
         }
     }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
