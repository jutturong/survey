<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?=$title?></title>
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/demo/demo.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
    <script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
    
    <script type="text/javascript">
         function  step1() //เพิ่มข้อมูล
         {
             //$.messager.alert('test');
             //$('#w').window('close')
             //$('#w').window('open')
             //$('#fr_inst1').window('open');
             $('#win_inst1').dialog('open');
             //http://localhost/servey1/index.php/welcome/insert_employee
            _url="<?=base_url()?>index.php/welcome/insert_employee"; 
         }
         
         
         $('#dg_analy1').datagrid({
             //http://localhost/servey1/index.php/welcome/fetch_analy1
             url:'<?=base_url()?>index.php/welcome/fetch_analy1',
             columns:[ { field:'age',title:'age' } ]
         });
         
         function  reload_analy1()
         {
             $('#dg_analy1').datagrid('reload');
         }
    </script>
    
    
    
</head>
<body>
    
    
   
   
    <div style="margin:10px 0 10px 0;"></div>
    <div class="easyui-panel" title="<?=$title?>" style="width:1200px;height:500px;padding:10px;">
        <div class="easyui-layout" data-options="fit:true">
            <div data-options="region:'west',split:true" style="width:250px;padding:10px">
               
                <!--Left Content-->
                
                
                <div class="easyui-panel" title=" รายการหลัก " style="width:200px;">
        <div class="easyui-menu" data-options="inline:true" style="width:100%">
            <div onclick="step1()" data-options=" iconCls:'icon-man' " >
                เพิ่มข้อมูล ชื่อ-นามสกุล 
            </div>
            
          
          <!--  
            <div>
               โหลดประวัติรายชื่อ
            </div>
          -->
  
            <!--
            <div>
               แก้ไขข้อมูล
            </div>
            
            <div onclick="remove_emp()">
                ลบข้อมูล
            </div>
            -->
            
            <div class="menu-sep"></div>
            
            <div data-options=" iconCls:'icon-large-picture',size:'large' " onclick="add_fr2()">
                เพิ่มข้อมูล อายุ/น้ำหนัก/ส่วนสูง
            </div>
            
            <!--
            <div onclick="reload_analy1()">
                โหลดข้อมูล 
            </div>
            -->
            
           
            
            
            
            <!--
            <div>
                <span>Open</span>
                <div style="width:150px;">
                    <div><b>Word</b></div>
                    <div>Excel</div>
                    <div>PowerPoint</div>
                    <div>
                        <span>M1</span>
                        <div style="width:120px;">
                            <div>sub1</div>
                            <div>sub2</div>
                            <div>
                                <span>Sub</span>
                                <div style="width:80px;">
                                    <div onclick="javascript:alert('sub21')">sub21</div>
                                    <div>sub22</div>
                                    <div>sub23</div>
                                </div>
                            </div>
                            <div>sub3</div>
                        </div>
                    </div>
                    <div>
                        <span>Window Demos</span>
                        <div style="width:120px;">
                            <div data-options="href:'window.html'">Window</div>
                            <div data-options="href:'dialog.html'">Dialog</div>
                            <div><a href="http://www.jeasyui.com" target="_blank">EasyUI</a></div>
                        </div>
                    </div>
                </div>
            </div>
            -->
            
            <!--
            <div data-options="iconCls:'icon-save'">Save</div>
            <div data-options="iconCls:'icon-print',disabled:true">Print</div>
            <div class="menu-sep"></div>
            <div>Exit</div>
            -->
            
            
        </div>
    </div>
                
                
                
                
            </div>
            
            <!--
            <div data-options="region:'east'" style="width:100px;padding:10px">
                Right Content
            </div>
            -->
            
            <div data-options="region:'center'" style="padding:10px">
                <!--Center Content-->
                <?=$this->load->view("fr_inst1")?>
                
                <table id="dg_main" class="f1 easyui-datagrid" title="ตาราง ชื่อ-นามสกุล , หน่วยงาน " style="width:700px;" data-options=" 
                       iconCls:'icon-man',
                       url:'<?=base_url()?>index.php/welcome/fetch_employee', 
                       rownumbers:true,
                       singleSelect:true,
                       columns:[[ 
                                 //   { field:'id_title',title:'คำนำหน้า',width:80 }, 
                                    { field:'name',title:'ชื่อ',width:100 },
                                    { field:'surname', title:'นามสกุล',width:150  },
                                 //   { field:'department',title:'Department',width:200  },
                                     {  field:'department_detail',title:'แผนก'   },
                                     {  field:'vocation_detail', title:'อาชีพ'    },
                                  //  { field:'id_employee',title:'ID',width:50  }
                                    //  {  field:'id_sex', title:'เพศ'    },
                                      {  field:'sex_detail',title:'เพศ'   },
                                      {  field:'birdthdate', title:'วัน-เดือน-ปี เกิด'    },
                               ]],
                       toolbar:[ 
                       { iconCls:'icon-reload',text:'Reload data',handler:function(data){ $('#dg_main').datagrid('reload');  } },
                       { iconCls:'icon-edit',text:'แก้ไขข้อมูล',handler:function(data)
                             { 
                               // var  id=data.id_employee;  
                               // alert(id);  
                               var  row=$('#dg_main').datagrid('getSelected');
                               if( row )
                               {
                                    id=row.id_employee;
                                    //alert(id);                                
                                     $('#win_inst1').dialog('open');
                                     $('#id_employee').numberbox('setValue',row.id_employee);
                                     $('#id_title').combobox('setValue',row.id_title);
                                     $('#firstname').textbox('setValue',row.name);
                                     
                                    // $.messager.alert('',row.name);
                                     
                                     $('#lastname').textbox('setValue',row.surname);
                                    // $('#department').textbox('setValue',row.department);
                                     $('#id_department').combobox('setValue',row.id_department);
                                     $('#cmb_vocation_detail').combobox('setValue',row.id_vocation);
                                     
                                     //$('#id_sex').radio('setValue',row.id_sex);
                                     //alert( row.id_sex );
                                     if( row.id_sex == 1  )
                                     {
                                         $('#m').attr('checked',true);
                                     }
                                     else if( row.id_sex == 2  )
                                     {
                                        //alert( row.id_sex );
                                         $('#wsex').attr('checked',true);
                                     }
                                   
                                     var  birdthdate=row.birdthdate;
                                     
                                     if( birdthdate.length > 0 )
                                     {
                                        //alert(birdthdate);
                                        var  arr=birdthdate.split('-'); //1963-03-06
                                        //alert(arr[0]);
                                        var  totol_dmy=arr[1] + '/' + arr[2] + '/' + arr[0];
                                        //$('#birdthdate').datebox('setValue', '6/1/2012');
                                         $('#birdthdate').datebox('setValue', totol_dmy );
                                     }

                                      _url= '<?=base_url()?>index.php/welcome/update_emp/' ;
                               }
                                 
                             }   
                                 },
                       { iconCls:'icon-remove',text:'ลบข้อมูล',handler:function(data)
                       {  
                          remove_emp();
                       }  },
                       { iconCls:'icon-add',text:'เพิ่มข้อมูล',handler:function(){
                                       $('#win_inst1').window('open');
                                      //http://localhost/servey1/index.php/welcome/insert_employee
                                       _url='<?=base_url()?>index.php/welcome/insert_employee'; 
                                     $('#win_inst1').window('open');
                                     $('#id_employee').numberbox('setValue','clear');
                                     $('#id_title').combobox('setValue','');
                                    
                                     $('#firstname').textbox('setValue','');
                                     $('#lastname').textbox('setValue','');
                                     $('#department').textbox('setValue','');
                              }     
                       },
                       { text:'ค้นหา',iconCls:'icon-search',handler:function()
                           {
                                //alert('t');
                                $('#emp_search').dialog('open');
                           }   
                       }
                               ]        
                       " >
                    
                </table>
                
                <?=$this->load->view('fr_analy1')?>
                
                <div style="margin:20px 0;"></div>
                <table title="  ข้อมูลการแปรผล" id="dg_analy1" class="f1 easyui-datagrid" style="width:1000px;height: 500px" data-options="
                       iconCls:'icon-large-smartart',
                       size:'large',
                       rownumbers:true,
                       fitColumns:true,
                       singleSelect:true,
                       url:'<?=base_url()?>index.php/welcome/fetch_analy1',
                        columns:[[ 
                                    {  field:'name',title:' ชื่อ ' },
                                    {  field:'surname',title:' นามสกุล ' },
                                    { field:'age',title:'อายุ' },
                                    { field:'w',title:'น้ำหนัก' },
                                    { field:'H',title:'ส่วนสูง' },
                                     { field:'AR',title:'รอบเอว' },
                                     { field:'BMI',title:'BMI' },
                                     { field:'id_diag',title:'โรคประจำตัว' },
                                     { field:'diag_detail',title:'รายละเอียดโรคประจำตัว' },
                                     { field:'smoke',title:'สูบบุหรี่' },
                                     { field:'alh',title:'ดื่มสุรา' },
                                     { field:'exer',title:'ออกกำลังกาย' },
                                     { field:'use_sometimes',title:'ออกกำลังกาย บางครั้ง' },
                                      { field:'use_always',title:'ออกกำลังกาย สม่ำเสมอ' }, 
                                     { field:'head',title:'สวมหมวกกันน็อค' },
                                     { field:'belt',title:'คาดเข็มขัดนิรภัย' },
                                     { field:'dmy_insert',title:'วัน/เดือน/ปี ที่บันทึก' },
                                ]],
                         toolbar:[ 
                         {
                            iconCls:'icon-reload',text:'Reload ข้อมูล' , handler:function()
                            {
                                $('#dg_analy1').datagrid('reload');
                                $('#department').combobox('reload');
                            }
                         }
                         ,
                         {
                           text:'แก้ไขข้อมูล',iconCls:'icon-edit',handler:function()
                              {
                                 var  row=$('#dg_analy1').datagrid('getSelected');
                                 if( row )
                                 {
                                     var id_record=row.id_record;
                                     //alert( id_record );
                                 }
                              }
                         }
                         ,
                         { text:'ลบข้อมูล',iconCls:'icon-remove',handler:function()
                         {
                              var  row=$('#dg_analy1').datagrid('getSelected');
                              if( row )
                              {
                                  var  id_record=row.id_record;
                                 $.post('<?=base_url()?>index.php/welcome/del_analy',{ id_record : id_record },function(data)
                                        { 
                                            
                                            if( data.success == 1 )
                                            {
                                                $.messager.alert('Status','ลบข้อมูลสำเร็จ','info');
                                                $('#dg_analy1').datagrid('reload');
                                            }
                                            else if(  data.success == 0 )
                                            {
                                                $.messager.alert('Status','ไม่สามารถลบข้อมูลได้','error');
                                                $('#dg_analy1').datagrid('reload');
                                            }
                                        },'json');
                                  
                              }
                         }
                         
                         
                         } 
                         ,
                         { text:'ค้นหา',iconCls:'icon-search',handler:function()
                            {
                               //alert('t');
                               $('#emp_analy').dialog('open');
                            }   
                        },
                        {
                          text:'วิเคราะห์ผล(ประจำปี)',iconCls:'icon-large-clipart',handler:function()
                          { 
                            //alert('t'); 
                            //$('#dia_analysis').dialog('open');
                               var  d=new Date();
                               var n = d.getFullYear();
                               window.open('<?=base_url()?>report_pdf/servey/report_case2.php?y=' + n);
                          }
                        },
                         {
                          text:'วิเคราะห์ผลจากหน่วยงาน(ประจำปี)',iconCls:'icon-large-clipart',handler:function()
                          { 
                            //alert('t'); 
                            $('#dia_analysis').dialog('open');
                          }
                        },
                         {
                          text:'วิเคราะห์ผลจากอาชีพ(ประจำปี)',iconCls:'icon-large-clipart',handler:function()
                          { 
                            //alert('t'); 
                            $('#dia_analysis').dialog('open');
                          }
                        }
                        
                        
                         ]       
                       " >
                    
                </table>
                
            </div>
        </div>
    </div>
   
    <!-- ค้นหา ชื่อ-นามสกุลจากการกรอกข้อมูล-->
    <div class="easyui-dialog" id="emp_search"  title="ค้นหาข้อมูล " style="width:400px;height: 100px;padding: 10px; " 
         data-options=" 
         closed:true, 
         iconCls:'icon-man',
         ">
        <div>
            <label>
                ชื่อ - นามสกุล : <input class="easyui-combogrid" id="sr_employee" style="width:250px;height: 40px;" data-options="
                                      url:'<?=base_url()?>index.php/welcome/auto_emp',
                                      mode:'remote',
                                      method:'post',
                                      idField:'id_employee',
                                      textField:'name',
                                      fitColumns:true,
                                      panelHeight:'auto',
                                      panelWidth:300,
                                      columns:[[
                                      { field:'name',title:'ชื่อ' },
                                      { field:'surname',title:'นามสกุล'    },
                                      {  field:'department',title:'Department'    },
                                      ]],
                                      onSelect:function(data)
                                      {
                                          //alert(data.id_employee);
                                          var  id_emp=$('#sr_employee').combogrid('getValue');
                                          $('#dg_main').datagrid({
                                             url:'<?=base_url()?>index.php/welcome/id_emp/' + id_emp ,
                                             iconCls:'icon-large-smartart',
                                            size:'large',
                                            rownumbers:true,
                                            fitColumns:true,
                                            singleSelect:true,
                                              columns:[[ 
                                                    { field:'id_title',title:'คำนำหน้า',width:80 }, 
                                                    { field:'name',title:'ชื่อ',width:100 },
                                                    { field:'surname', title:'นามสกุล',width:150  },
                                                    { field:'department',title:'Department',width:200  },
                                                    { field:'id_employee',title:'ID',width:50  }
                                                ]],
                                            
                                          });
                                      }
                                        " />
            </label>
        </div> 
    </div>
     <!-- ค้นหา ชื่อ-นามสกุลจากการกรอกข้อมูล-->
     
     
     <!-- ค้นหาข้อมูลจากการวิเคราะห์ผล -->
     <div class="easyui-dialog" id="emp_analy"  title="ค้นหาข้อมูล " style="width:400px;height: 100px;padding: 10px; "  
          data-options=" 
         closed:true, 
         iconCls:'icon-man',
         "
          >
         
         <label >
              ชื่อ - นามสกุล : <input class="easyui-combogrid" id="id_analy" style="width:250px;height: 40px;" data-options="
                                      url:'<?=base_url()?>index.php/welcome/auto_emp',
                                      mode:'remote',
                                      method:'post',
                                      idField:'id_employee',
                                      textField:'name',
                                      fitColumns:true,
                                      panelHeight:'auto',
                                      panelWidth:300,
                                      columns:[[
                                      { field:'name',title:'ชื่อ' },
                                      { field:'surname',title:'นามสกุล'    },
                                      {  field:'department',title:'Department'    },
                                      ]],
                                      onSelect:function(data)
                                      {                                         
                                         var  id=  $('#id_analy').combogrid('getValue');                                        
                                         var  url='<?=base_url()?>index.php/welcome/id_analy/' + id;
                                         $('#dg_analy1').datagrid({
                                              iconCls:'icon-large-smartart',
                                              size:'large',
                                                rownumbers:true,
                                                fitColumns:true,
                                                singleSelect:true,
                                                url:url,
                                            columns:[[ 
                                                   {  field:'name',title:' ชื่อ ' },
                                                   {  field:'surname',title:' นามสกุล ' },
                                                   { field:'age',title:'อายุ' },
                                                   { field:'w',title:'น้ำหนัก' },
                                                   { field:'H',title:'ส่วนสูง' },
                                                    { field:'AR',title:'รอบเอว' },
                                                    { field:'BMI',title:'BMI' },
                                                    { field:'id_diag',title:'โรคประจำตัว' },
                                                    { field:'diag_detail',title:'รายละเอียดโรคประจำตัว' },
                                                    { field:'smoke',title:'สูบบุหรี่' },
                                                    { field:'alh',title:'ดื่มสุรา' },
                                                    { field:'exer',title:'ออกกำลังกาย' },
                                                    { field:'head',title:'สวมหมวกกันน็อค' },
                                                    { field:'belt',title:'คาดเข็มขัดนิรภัย' },
                                                    { field:'dmy_insert',title:'วัน/เดือน/ปี ที่บันทึก' },
                                               ]],
                                               
                                               
                                         });
                                      }
                                      
                                      " />
         </label>
         
     </div>
     <!-- ค้นหาข้อมูลจากการวิเคราะห์ผล -->
     
     <!-- วิเคราะห์ผล -->
     <div class="easyui-dialog" id="dia_analysis" title='การวิเคราะห์ผล' style="width:400px;height: 100px;padding: 10px;" data-options="
          iconCls:'icon-man',
          closed:true,
          
          ">
         <div style="padding: 10xp;">
             
        
             <a href="javascript:void(0)" class="easyui-linkbutton" style="height: 40px;" data-options=" iconCls:'icon-reload' " >ทั้งหมด</a>
         
         <input class="easyui-combobox" id="department"  style="width:200px;height: 40px;padding: 0px;" 
                 data-options="
                 url:'<?=base_url()?>index.php/welcome/fetch_department',
                 valueField:'department',
                 textField:'department',
                 "
                 
                 />
         
          </div>
        
     </div>
     <!-- วิเคราะห์ผล -->
     
     
</body>
</html>
﻿