 

<script type="text/javascript">
    
    //http://localhost/servey1/index.php/welcome/fetch_employee
                   
   function  remove_emp()
   {
       var  row=$('#dg_main').datagrid('getSelected');
       if( row )
       {
           //alert(row.id_employee);
           $.post('<?=base_url()?>index.php/welcome/del_emp',{ id_employee: row.id_employee },function(data)
           { 
               //alert(data.success); 
               if( data.success == 1 )
               {
                   $.messager.alert('Status','ลบข้อมูลสำเร็จ','info');
                   $('#dg_main').datagrid('reload');
               }
               else if(  data.success == 0 )
               {
                   $.messager.alert('Status','ไม่สามารถลบข้อมูลได้','error');
                   $('#dg_main').datagrid('reload');
               }
           },'json');
       }
   }
    
   function save_fr1()
   {
       
       
       $('#fr_inst1').form('submit',{
           url:_url,
           //onSubmit:function(){ return  $(this).form('validate'); },
           success:function(result)
           { 
              // alert(result);
                var  ck=result;
                if( ck == 1 )
                {
                    $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลสำเร็จ','info');
                    $('#win_inst1').window('close');
                    $('#dg_main').datagrid('reload');
                   
                }
                else
                {
                    $.messager.aert('สถานะการบันทึกข้อมูล','ไม่สามารถบันทึกข้อมูลได้','error');
                }
           }
                   
       });
   }
</script>


<div id="win_inst1" class="easyui-dialog" title=" เพิ่มข้อมูลบุคคล " 
     data-options="
          modal:true,
          closed:true,
          iconCls:'icon-man',
          toolbar:[ 
             { text:'Save',iconCls:'icon-save',
                handler:function()
                 { 
                    //alert('t'); 
                      var   url='<?=base_url()?>index.php/welcome/insert_employee';
                     $('#fr_inst1').form('submit',{
                         url:url,
                         success:function(data)
                           {
                                //alert(data);
                                if( data == '1' )
                                {
                                   $.messager.alert('สถานะการบันทึก','บันทึกสำเร็จ','Info');
                                   $('#win_inst1').dialog('close');
                                   $('#dg_main').datagrid('reload');
                                }
                                else
                                {
                                    $.messager.alert('สถานะการบันทึก','บันทึกล้มเหลว','Err');
                                    $('#win_inst1').dialog('close');
                                    $('#dg_main').datagrid('reload');
                                }
                                
                           }
                     });
                 }   
             },
             {
                text:'Update',
                iconCls:'icon-ok',
                handler:function()
                {
                   
                     var  id_employee=$('#id_employee').textbox('getValue');
                    // alert(id_employee);
                    var  url='<?=base_url()?>index.php/welcome/update_emp';
                    $('#fr_inst1').form('submit',{
                        url:url,
                        success:function(data)
                          {
                              //alert(data);
                              if( data == '1' )
                              {
                                 $.messager.alert('สถานะการแก้ไขข้อมูล','แก้ไขข้อมูลสำเร็จ','Info');
                                 $('#win_inst1').dialog('close');
                                 $('#dg_main').datagrid('reload');
                              }else
                              {
                                 $.messager.alert('สถานะการแก้ไขข้อมูล','แก้ไขข้อมูลสำเร็จ','Info');
                                 $('#win_inst1').dialog('close');
                                 $('#dg_main').datagrid('reload');
                              }
                          }
                    });
                   
                }
             }
                  ],
          buttons:[ { text:'Close',iconCls:'icon-cancel',handler:function(){ $('#win_inst1').dialog('close');  }   }   ] 
     
     
     " 
     style="width:700px;height:350px;padding:20px 10px;">
        
    <form id="fr_inst1" action="<?=base_url()?>index.php/servey1/welcome/insert_employee/" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        ID :
                    </td>
                    <td>
                        <input class="easyui-numberbox"  id="id_employee" name="id_employee" style="width:100px;height: 30px;" readonly="true"  />
                    </td>
                </tr>
                <tr>
                    <td>เพศ :</td>
                    <td>
                         <input type="radio" id="m" name="id_sex" value="1" /> ชาย
                        <input type="radio" id="wsex" name="id_sex" value="2" /> หญิง
                    </td>
                </tr>
                <tr>
                    <td>ชื่อ - นามสกุล :</td>
                    <td>
                        
                        <!--
                        <select class="easyui-combobox" name="id_title" id="id_title" style="width:100px;height: 30px"  >
        <option value=""> :: เลือก :: </option>
        <option value="1">นาย</option>
        <option value="2">นางสาว</option>
        <option value="3">นาง</option>
        <option value="4">อื่นๆ</option>
                        </select>
                        -->
                        
                       
                       
                         <?=nbs(2)?>
                        <input  class="f1 easyui-textbox" id="firstname" name="firstname" data-options=" iconCls:'icon-man' " required="required" style="width:150px;height: 30px;"></input>
                        <?=nbs(2)?>
                        <input name="lastname" id="lastname" class="f1 easyui-textbox" data-options="iconCls:'icon-man' " required="required" style="width:200px;height: 30px;"></input>
                    </td>
                </tr>
                
                <!--
                <tr>
                    <td> วัน/เดือน/ปี เกิด : </td>
                    <td>
                        <input class="f1 easyui-datebox" id="birthdate" name="birthdate" style=" height:30px; width: 150px;" ></input>
                    </td>
                </tr>
                -->
                
                <tr>
                    <td> Department(แผนก) :</td>
                    <td> 
                                              
                        <!--
                        <input class="f1 easyui-textbox" id="department"  required="required"  name="department" style="width:200px;height: 30px;"  ></input>
                        -->
                        
                        <input class="easyui-combobox" id="id_department"  name="id_department"  style="width:200px;height: 30px;"
                               data-options="
                                 url:'<?=base_url()?>index.php/welcome/tb_department',
                                 valueField:'id_department',
                                 textField:'department_detail',
                                 mode:'remote',
                                 method:'get',
                                 
                               "
                               />
                        
                        
                        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="false" onclick=" $('#dia_department').dialog('open');  " style="width:80px;height: 30px"  >เพิ่ม</a>
                    </td>    
                </tr>
                
                <!--
                <tr>
                    <td>Email:</td>
                    <td><input name="email" class="f1 easyui-textbox"></input></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input name="phone" class="f1 easyui-textbox"></input></td>
                </tr>
                <tr>
                    <td>File:</td>
                    <td><input name="file" class="f1 easyui-filebox"></input></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit"></input></td>
                </tr
                -->
                
                <tr>
                    <td>
                        
                            อาชีพ : 
                                           
                        
                    </td>
                    <td>
                        
                        <input class="easyui-combobox" id="cmb_vocation_detail" name="cmb_vocation_detail" style="width:200px;height: 30px;"  data-options="
                                              url:'<?=base_url()?>index.php/welcome/tb_vocation',
                                              mode:'remote',
                                              method:'get',
                                              valueField:'id_vocation',
                                              textField:'vocation_detail',
                                              
                                              "  />
                       <!-- 
                        <input class="easyui-combobox"  style="width:200px;height: 30px;"  data-options="
                               valueField:'value',
                               textField:'text',
                               data:[ 
                                            {  value:1,text:''  },
                                            {  value:2,text:'' },
                                            
                                           ]
                                           "   />
                        -->
                        
                        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" style="width:80px;height: 30px;" onclick=" 
                            $('#dg_vacation').datagrid('reload');
                            $('#dia_vocation').dialog('open');" 
                            >เพิ่ม</a>
                        
                        
                    </td>
                </tr>
               
                <tr>
                    <td>
                        วัน-เดือน-ปี เกิด : 
                    </td>
                    <td>
                        <input class="easyui-datebox"  id="birdthdate" name="birdthdate" style="width:200;height: 40px;" />
                    </td>
                </tr>
                
                <!--
                <tr>
                    <td colspan="2">
                        <?=nbs(40)?>
                        <a href="#" class="f1 easyui-linkbutton"  data-options=" iconCls:'icon-add'  " onclick="save_fr1()" >บันทึกข้อมูล</a>
                        <a href="#" class="f1 easyui-linkbutton"  data-options=" iconCls:'icon-remove'  " onclick="$('#win_inst1').window('close');" >Close</a>
                   
                    <td>
                        
                </tr>
                -->
                
                
            </table>
        </form>
</div>



<!--  เพิ่มข้อมูลอาชีพ -->
<div class="easyui-dialog" id="dia_vocation" style="width:350px;height: 500px; left: 30px;top: 30px;" data-options="
     title:' เพิ่มข้อมูลอาชีพ ',
     iconCls:'icon-man',
     closed:true,
     buttons:[ { text:'Close',iconCls:'icon-cancel',handler:function(){ $('#dia_vocation').dialog('close'); }     }  ]
     " >
    <div class="easyui-tabs" id="vacation_tabs" >
        <div  title=" ข้อมูลทั้งหมด/เพิ่มข้อมูล ">
            
            <div class="easyui-datagrid" id="dg_vacation"  data-options="
                 url:'<?=base_url()?>index.php/welcome/tb_vocation',
                 singleSelect:true,
                 rownumbers:true,
                 fitColumns:true,
                 toolbar:[ 
                 { text:'Reload',iconCls:'icon-reload',handler:function()
                      { 
                          $('#dg_vacation').datagrid('reload');  
                          $('#add_vocation_detail').combobox('reload');
                      }  
                 },
                 {
                   text:'เพิ่ม',iconCls:'icon-add',handler:function(){  $('#dia_ad_vocation').dialog('open');  }
                 },
                 {
                   text:'ลบ',iconCls:'icon-cancel',handler:function()
                      {
                         var  row= $('#dg_vacation').datagrid('getSelected');
                         if(row)
                         {
                            var  id_vocation=row.id_vocation;
                            
                              //alert(id_vocation);
                             var  url='<?=base_url()?>index.php/welcome/del_vocation/' + id_vocation ;
                             $.post(url,function(data){
                                 //alert(data);
                                  if( data == '1' )
                                  {
                                     $.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลสำเร็จ','Info');
                                      $('#dg_vacation').datagrid('reload');
                                       $('#cmb_vocation_detail').combobox('reload');
                                  }
                                  else if( data == '0' )
                                  {
                                    $.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลล้มเหลว','Err');
                                     $('#dg_vacation').datagrid('reload');
                                      $('#cmb_vocation_detail').combobox('reload');
                                  }
                             });
                         }
                      }
                 },
                 {
                    text:'แก้ไข',iconCls:'icon-edit',handler:function()
                      {
                         var  row= $('#dg_vacation').datagrid('getSelected');
                         if(row)
                         {
                         $('#dia_ad_vocation').dialog('open');   
                         var  id_vocation=row.id_vocation;
                            var  vocation_detail=row.vocation_detail;
                              //alert(id_vocation);
                              $('#id_vocation').textbox('setValue',id_vocation);
                              $('#add_vocation_detail').textbox('setValue',vocation_detail);
                              $('#cmb_vocation_detail').combobox('reload');
                         }
                      }
                 }
                          ],
                 columns:[[
                 { field:'vocation_detail',title:'อาชีพ'  },
                 ]]
                 " >
                
            </div>
            
        </div>
        
        
        
    </div>
</div>
<!--  เพิ่มข้อมูลอาชีพ -->


<!-- dialog เพิ่ม่ข้อมูลอาชีพ -->
 <div class="easyui-dialog" id="dia_ad_vocation" data-options=" closed:true,title:'  เพิ่มข้อมูลอาชีพ ',
      buttons:[ { text:'Close',iconCls:'icon-cancel',handler:function(){ $('#dia_ad_vocation').dialog('close'); }  }  ] 
      " style="left:40px;top: 10px;" >  
             <form id="fr_vacation" novalidate="novalidate" enctype="multipart/form-data" method="post" >

            <div style="padding: 20px 10px;"   >
                <input class="easyui-textbox" id='id_vocation' name="id_vocation" readonly="true"  style="width:50px;height: 30px;"   />
               
                <br>
                              
                    เพิ่มข้อมูลอาชีพ : 
                    
                    <!--
                    <input class="easyui-combobox" id="add_vocation_detail" name="add_vocation_detail" style="width:200px;height: 30px;"  data-options="
                                              url:'<?=base_url()?>index.php/welcome/tb_vocation',
                                              mode:'remote',
                                              method:'get',
                                              valueField:'id_vocation',
                                              textField:'vocation_detail',
                                              
                                              "  />
                    -->
                    
                    <input class="easyui-textbox" id="add_vocation_detail" name="add_vocation_detail"  style="width:220px;height: 30px;" required="true" data-options="
                            icons:[
                              {  
                                iconCls:'icon-remove',
                                handler:function(e)
                                {  
                                    $(e.data.target).textbox('clear'); 
                                    $('#id_vocation').textbox('clear');   
                                    
                                } 
                              }
                            ],
                            prompt:'เพิ่มข้อมูลอาชีพ',
                            
                           " />
                
                    <br>
                    <br>
                    <a href="javascript:void(0)"  class="easyui-linkbutton"  iconCls="icon-save" style="width:100px;height: 40px;"  onclick="
                   var  id_vocation=$('#id_vocation').textbox('getValue');
                  if( id_vocation > 0 )
                  {
                      //alert('test update ');
                      var  url='<?=base_url()?>index.php/welcome/update_vocation';
                        $('#fr_vacation').form('submit',{  
                                url:url,
                                success:function(data){
                                    //alert(url); 
                                    //alert(data);
                                    if( data == '1' )
                                 {
                                      //$('#vacation_tabs').tabs('selected',tabs[0]); 
                                      $.messager.alert('สถานะการปรับปรุงข้อมูล','ปรับปรุงข้อมูลสำเร็จ','Info');
                                      $('#dg_vacation').datagrid('reload');
                                     // $('#add_vocation_detail').combobox('reload');
                                      $('#cmb_vocation_detail').combobox('reload');
                                      $('#dia_ad_vocation').dialog('close');   
                                 }
                                 else if( data == '0')
                                 {
                                     $.messager.alert('สถานะการปรับปรุงข้อมูล','บันทึกปรับปรุงล้มเหลว','Err');
                                     $('#dg_vacation').datagrid('reload');
                                     // $('#add_vocation_detail').combobox('reload');
                                      $('#cmb_vocation_detail').combobox('reload');
                                      $('#dia_ad_vocation').dialog('close'); 
                                 }
                                },
                               });
                      
                  } else if( id_vocation == '' )
                  {    
                  //--------- บันทึก --------------------
                     $('#fr_vacation').form('submit',{
                         url:'http://localhost/servey1/index.php/welcome/insert_vocation',
                         success:function(data)
                           { 
                                 //alert(data); 
                                 if( data == '1' )
                                 {
                                      //$('#vacation_tabs').tabs('selected',tabs[0]); 
                                      $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลสำเร็จ','Info');
                                      $('#dg_vacation').datagrid('reload');
                                     // $('#add_vocation_detail').combobox('reload');
                                      $('#cmb_vocation_detail').combobox('reload');
                                     $('#dia_ad_vocation').dialog('close'); 
                                 }
                                 else if( data == '0')
                                 {
                                     $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลล้มเหลว','Err');
                                     $('#dg_vacation').datagrid('reload');
                                     // $('#add_vocation_detail').combobox('reload');
                                      $('#cmb_vocation_detail').combobox('reload');
                                      $('#dia_ad_vocation').dialog('close'); 
                                 }
                           }
                     });
                  //--------- บันทึก -------------------- 
                 }   
                     
                   " >บันทึก/แก้ไข</a>
                    
                        
                    
            </div>
              
                 
                  </form>
                
                
                
            </div>
           

<!-- dialog เพิ่ม่ข้อมูลอาชีพ -->



<!-- เพิ่ม แผนก -->
<div class="easyui-dialog" id="dia_department"  data-options="
     title:'เพิ่มหน่วยงาน',
     iconCls:'icon-man',
     closed:true,
     buttons:[ { text:'Close',iconCls:'icon-cancel',handler:function(e){   $('#dia_department').dialog('close');   }  }  ]
     "  style="width:400px;height: 600px;left:30px;top: 40px;">
    
    <div class="easyui-datagrid"  id="dg_department" data-options="
         url:'<?=base_url()?>index.php/welcome/tb_department',
         rownumbers:true,
         singleSelect:true,
         fitColumns:true,
         toolbar:[    
           { text:'Reload',iconCls:'icon-reload',handler:function()
              {  
                  $('#dg_department').datagrid('reload');   
              }
           },
           {
              text:'เพิ่ม',iconCls:'icon-add',handler:function()
                { 
                  // alert('t'); 
                  $('#add_depart').dialog('open');
                }
           },
           {
              text:'แก้ไข',iconCls:'icon-edit',handler:function()
                {
                   var  row=$('#dg_department').datagrid('getSelected');
                   if(row)
                   {
                
                        $('#add_depart').dialog('open');
                        var  id_department=row.id_department;
                        //alert(id_department);
                        var  department_detail=row.department_detail;
                        //alert(department_detail);
                        
                        $('#fr_department').form('load',
                        {    
                            department_detail:department_detail,
                            id_department:id_department,
                        
                        });
                        
                        
                    
                   } 
                   
                }
           },
           {
              text:'ลบ',iconCls:'icon-cancel',handler:function()
                {
                   var  row=$('#dg_department').datagrid('getSelected');
                   if(row)
                   {
                    var  id_department=row.id_department;
                    var  url='<?=base_url()?>index.php/welcome/del_department/' + id_department;
                    //alert(url);
                      $.post(url,function(data)
                        {  
                            
                               //alert(data);
                          if( data == '1' )
                          {
                              $.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลสำเร็จ','Info'); 
                              //$('#add_depart').dialog('close');
                              $('#dg_department').datagrid('reload');
                          }else
                          {
                              $.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลล้มเหลว','Info');  
                             // $('#add_depart').dialog('close');
                              $('#dg_department').datagrid('reload');
                          }
                        });
                        
                   }
                }
           }
         ],
         columns:[[
           { field:'department_detail',title:'หน่วยงาน'   }
         ]]
         " >
        
    </div>
    
</div>
<!-- เพิ่ม แผนก -->

<!-- dia  แผนก -->
<div class="easyui-dialog" id="add_depart" style="width:350px;height: 300px;left:40px;top: 30px;" data-options="
     title:' เพิ่มหน่วยงาน ',
     iconCls:'icon-man',
     closed:true,
     toolbar:[ 
       { 
          text:'save',iconCls:'icon-save',
          handler:function()
            {  
                $('#fr_department').form('submit',{
                     url:'<?=base_url()?>index.php/welcome/insert_department',
                     success:function(data)
                       {
                          //alert(data);
                          if( data == '1' )
                          {
                              $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลสำเร็จ','Info'); 
                              $('#add_depart').dialog('close');
                              $('#dg_department').datagrid('reload');
                          }else
                          {
                              $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลล้มเหลว','Info');  
                              $('#add_depart').dialog('close');
                              $('#dg_department').datagrid('reload');
                          }
                       }
                });
                
            }   
          
       },
       {
         text:'Update',iconCls:'icon-ok',handler:function()
           {   
              //alert('t');
              var  url='<?=base_url()?>index.php/welcome/update_department';
                        $('#fr_department').form('submit',{
                           url:url,
                           success:function(data)
                           {
                               //alert(data);
                               if( data=='1')
                               {
                                    $.messager.alert('สถานะการปรังปรุงข้อมุล','ปรับปรุงข้อมูลสำเร็จ','Info');
                                    $('#add_depart').dialog('close');
                                    $('#dg_department').datagrid('reload');
                               }
                               else
                               {
                                     $.messager.alert('สถานะการปรังปรุงข้อมุล','ปรับปรุงข้อมูลล้มเหลว','Err');
                                     $('#add_depart').dialog('close');
                                     $('#dg_department').datagrid('reload');
                               }
                           }
                        });
           }
       }
     ],
     buttons:[
        {  text:'Close',iconCls:'icon-cancel',handler:function(e){ $('#add_depart').dialog('close'); }   }
     ]
     "   >
    
    
     <form id="fr_department" novalidate="novalidate" enctype="multipart/form-data" method="post" >

    
    <div style="padding: 10px 10px" >
        
        
        <label>
            เพิ่มหน่วยงาน : 
            <input class="easyui-textbox" id="department_detail" name="department_detail" required="true" style="width: 200px;height: 30px;"
                                   data-options="
                                   icons:[
                                   {
                                     iconCls:'icon-cancel',
                                     handler:function(e)
                                       {
                                         $(e.data.target).textbox('clear');
                                         $('#id_department').textbox('clear');
                                       }
                                    }    
                                   ],
                                   prompt:'เพิ่มข้อมูลหน่วยงาน',
                                   
                                   "
                                   />
        </label>
    </div>
         
         <div style="padding: 10px 10px" >
        <label>
            <input class="easyui-textbox" readonly="true" name="id_department" id="id_department" style="width: 50px;height: 30px;"  />
        </label>
    </div>
    
     </form>
    
    
</div>
<!-- dia  เพิ่มแผนก -->

