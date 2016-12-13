<script type="text/javascript">
    
    function  dg_analy1()
    {
        $('#dg_analy1').datagrid({
            
        });
    }
    function  add_fr2()
    {
       var  row=$('#dg_main').datagrid('getSelected');
       if( row )
       {   
           var id_employee = row.id_employee
           var birdthdate=row.birdthdate;
           //alert(birdthdate);
           var  spl_brd=birdthdate.split('-');
           var  year_brd=spl_brd[0];
           //alert(year_brd);
           var d=new Date();
           var  curY=d.getFullYear();
           var  age_cal= curY - year_brd;
           var  name=row.name; //ชื่อ
           $('#view_name').textbox('setValue',name);
           var  surname=row.surname;  //นามสกุล
           $('#view_surname').textbox('setValue',surname);
           //alert(name);
           //alert(surname);
          // alert(age_cal);
            $('#age').numberbox('setValue',age_cal);
           $('#win_analy1').window('open');
           $('#id_emp').textbox('setValue', id_employee );
           _url="<?=base_url()?>index.php/welcome/add_analysis1/" + id_employee ;
       }    
    }
    
   function save_anal1()
   {
       
       
       $('#fr_analy1').form('submit',{
           url:_url,
           //onSubmit:function(){ return  $(this).form('validate'); },
           success:function(result)
           { 
               //alert(result);
              
              
                var  ck=result;
                if( ck == 1 )
                {
                    $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลสำเร็จ','info');
                    $('#win_analy1').window('close');
                    $('#dg_analy1').datagrid('reload');
                   
                }
                else
                {
                    $.messager.aert('สถานะการบันทึกข้อมูล','ไม่สามารถบันทึกข้อมูลได้','error');
                }
                
           }
                   
       });
   }
  
</script>

<script type="text/javascript">
    $(function(){
        $('#btnBMI').bind('click',function()
        
        { 
           
           // var  w=$('#w').numberbox('getValue');
           // var  H=$('#H').numberbox('getValue');
           // var  cal= w/(H*H);
          
          // alert(w);
          // if( w >0  && H> 0)
          //  {
                //$('#calBMI').numberbox('setValue',cal.toFixed(3));
                // $('#calBMI').numberbox('setValue','3');
           // }
           var  power=( $('#H').numberbox('getValue')/100) *  ( $('#H').numberbox('getValue')/100) ;
           var  cal=$('#w').numberbox('getValue')/power;
           $('#calBMI').textbox('setValue',cal.toFixed(1));
        }
                         );
    });
    
    
    
    
    
   
</script>

<script type="text/javascript">
 //---------เพิ่ม่ข้อมูลโรคประจำตัว----------
   function  insert_disease(url)
   {
        // alert(url);
        $('#fr_disease').form('submit',{
            url:url,
            success:function(data)
            {
               // alert(data);
                
               
                if( data == 'f' )
                {
                    $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลซ้ำ','Err');
                    $('#dg_disease').datagrid('reload');
                    $('#add_disease').dialog('close');
                     $('#diag_detail').combobox('reload');
                }
                else if( data == '1' )
                {
                    $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลสำเร็จ','Info');
                    $('#dg_disease').datagrid('reload');
                    $('#add_disease').dialog('close');
                     $('#diag_detail').combobox('reload');
                }else if ( data == '0'    )
                {
                    $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลผิดพลาด','Err');
                    $('#dg_disease').datagrid('reload');
                    $('#add_disease').dialog('close');
                     $('#diag_detail').combobox('reload');
                }
                
            }
        }); 
   }
   
   function  update_disease(url)
   {
       //alert(url);
       $('#fr_disease').form('submit',{
          url:url,
          success:function(data)
          {
              //alert(data);
               if( data == '1' )
                {
                    $.messager.alert('สถานะการแก้ไขข้อมูล','แก้ไขข้อมูลสำเร็จ','Info');
                    $('#dg_disease').datagrid('reload');
                    $('#add_disease').dialog('close');
                     $('#diag_detail').combobox('reload');
                }else if ( data == '0'    )
                {
                    $.messager.alert('สถานะการแก้ไขข้อมูล','แก้ไขข้อมูลผิดพลาด','Err');
                    $('#dg_disease').datagrid('reload');
                    $('#add_disease').dialog('close');
                     $('#diag_detail').combobox('reload');
                }
          }
        });
      
   }
   
   function fnclear()
   {
       //id_disease
       //disease_detail
       $('#id_disease').textbox('setValue','');
       $('#disease_detail').textbox('setValue','');
   }
</script>


<div id="win_analy1" class="easyui-window" title="เพิ่มข้อมูล อายุ/น้ำหนัก/ส่วนสูง" data-options="modal:true,closed:true,iconCls:'icon-add'" style="width:680px;height:500px;padding:10px;">
        
    <form id="fr_analy1"  method="post"  enctype="multipart/form-data">
        <table>
            
            <tr>
                <td>ชื่อ - นามสกุล :</td>
                <td><input class="easyui-textbox" readonly="true" style="width:100px;height: 30px"  name="view_name"  id="view_name"  /> - <input class="easyui-textbox" readonly="true" style="width:100px;height: 30px"  id="view_surname"  name="view_surname"   /></td>
            </tr>
            
            <tr>
                <td>ID : </td>
                <td>
                    
                    <input class="easyui-textbox" readonly="true" style="width:50px;height: 30px" id="id_emp"  name="id_emp" />
                    
                    
                </td>
            </tr>
            
            
            <tr>
                <td>อายุ : </td>
                <td>
                    <input class="f1 easyui-numberbox" style="width: 50px;height: 30px" id="age" name="age" data-options="iconCls:'icon-man' " readonly="true" ></input> </td>
            </tr>
            <tr>
                <td>น้ำหนัก</td>
                <td>
                     <input class="f1 easyui-numberbox" style="width: 100px;height: 30px" id="w" name="w" data-options="iconCls:'icon-add' " ></input> 
                <?=nbs(1)?>   
                (kg)
                </td>
            </tr>
            <tr>
                <td>ส่วนสูง</td>
                <td>
                     <input class="f1 easyui-numberbox" style="width: 100px;height: 30px" id="H" name="H" data-options="iconCls:'icon-add' " ></input> 
                <?=nbs(1)?>   
                (เซนติเมตร)
                </td>
            </tr>
            
            
          
            
            
             <tr>
                 <td>BMI  <a href="#" class="f1 easyui-linkbutton" data-options=" iconCls:'icon-print' "  id="btnBMI" >คำนวณ</a> </td>
                <td><input class="f1 easyui-textbox" style="width: 100px;height: 30px"  id="calBMI" name="calBMI" data-options=" readonly:true " >
                (kg/เมตร<sup>2</sup>)
                </td>
            </tr>
            
           
           <tr>
                <td>รอบเอว</td>
                <td>
                     <input class="f1 easyui-numberbox" style="width: 100px;height: 30px" id="AR" name="AR" data-options="iconCls:'icon-add' " ></input> 
                <?=nbs(1)?>   
                (เซนติเมตร)
                </td>
            </tr> 
            
           
            
            <tr>
                <td>โรคประจำตัว </td>
                <td>
                    <input  class="easyui-switchbutton"  id="use_diag" name="id_diag" data-options="onText:'มี',offText:'ไม่มี', value:1 "></input> 
                    
                    <?=nbs(2)?> 
                ระบุโรคประจำตัว :
                
                <!--
                <input class="f1 easyui-textbox" style="width: 100px;height: 30px" id="diag_detail" name="diag_detail" data-options="iconCls:'icon-edit' " ></input> 
                -->
                
                <input class="easyui-combobox" id="diag_detail" name="diag_detail" style="width:200px;height: 40px;" data-options="
                                 url:'<?=base_url()?>index.php/welcome/tb_disease',
                                 valueField:'id_disease',
                                 textField:'disease_detail',
                                 mode:'remote',
                                 method:'get',
                                 /*
                                 onSelect:function(rec)
                                 {
                                    var  id_disease=rec.id_disease;
                                    //alert(sr_id_disease);
                                    var  url='<?=base_url()?>index.php/welcome/select_disease/' + id_disease;
                                    //alert(url);
                                    $('#dg_disease').datagrid({
                                     url:url,
                                     
                                    });
                                    
                                 },
                                 */
                                    "  />
                
                <a href="javascript:void(0)"  class="easyui-linkbutton" iconCls="icon-man"  style="width:80px;height: 30px;" onclick=" $('#dia_disease').dialog('open'); " >เพิ่ม</a>
                
                </td>
            </tr>
            <tr>
                <td>สูบบุหรี่  </td>
                <td>
                    <input  class="easyui-switchbutton"  id="use_smoke" name="smoke" data-options="onText:'สูบ',offText:'ไม่สูบ', value:1 " ></input> 
                   
                    
                </td>   
            </tr>
             <tr>
                <td>ดื่มสุรา  </td>
                <td>
                     <input  class="easyui-switchbutton"  id="use_alh" name="alh" data-options="onText:'ดื่ม',offText:'ไม่ดื่ม', value:1 " ></input> 
                    
                </td>   
            </tr>
             <tr>
                <td>ออกกำลังกาย  </td>
                <td>
                      <input  class="easyui-switchbutton"  id="use_ex" name="ex" data-options="onText:'ออก',offText:'ไม่ออก', value:1 "></input> 
                   
                    
                </td>   
            </tr>
             <tr>
                <td>สวมหมวกกันน็อค  </td>
                <td>
                     <input  class="easyui-switchbutton"  id="use_head" name="head" data-options="onText:'สวม',offText:'ไม่สวม', value:1 "></input> 
                    
                </td>   
            </tr>
            <tr>
                <td>คาดเข็มขัดนิรภัย  </td>
                <td>
                    <input  class="easyui-switchbutton"  id="use_belt" name="belt" data-options="onText:'คาด',offText:'ไม่คาด', value:1 "></input> 
                   
                </td>   
            </tr>
            
            <tr>
                <td>
                    วัน/เดือน/ปี  บันทึกข้อมูล
                </td>
                <td>
                    <input class="f1 easyui-datebox" required="true" id="dmy_insert" name="dmy_insert" ></input>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    
                    <!--
                    <input type="submit" onclick="
                           $('#fr_analy1').form({
                               url:'<?=base_url()?>index.php/welcome/add_analysis1/',
                               success:function(data)
                                    { 
                                        //alert(data); 
                                        if( data == '1' )
                                        {
                                            $.messager.alert('สถานะการบันทึกข้อมูล','สำเร็จ','Info');
                                            $('#win_analy1').window('close');
                                            $('#dg_analy1').datagrid('reload');
                                            
                                        }else if(data=='0')
                                        {   
                                            $.messager.alert('สถานะการบันทึกข้อมูล','ล้มเหลว','Err');
                                        }
                                    }
                               
                           });
                                                      "  value="บันทึกมูล" />
                    -->
                    <?=nbs(50)?>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls='icon-save' onclick="
                           $('#fr_analy1').form('submit',{
                               url:'<?=base_url()?>index.php/welcome/add_analysis1/',
                               success:function(data)
                                    { 
                                        //alert(data); 
                                        if( data == '1' )
                                        {
                                            $.messager.alert('สถานะการบันทึกข้อมูล','สำเร็จ','Info');
                                            $('#win_analy1').window('close');
                                            $('#dg_analy1').datagrid('reload');
                                            
                                            $('#diag_detail').combobox('reload');
                                            
                                        }else if(data=='0')
                                        {   
                                            $.messager.alert('สถานะการบันทึกข้อมูล','ล้มเหลว','Err');
                                        }
                                    }
                               
                           });
                                                                                                            "  style="width:100px;height: 30px;" /> Save </a>
                    
                    <!-- <a href="#" class="f1 easyui-linkbutton"  data-options=" iconCls:'icon-add'  " onclick="save_anal1()" >บันทึกข้อมูล</a> -->
                     <a href="#" class="f1 easyui-linkbutton"  data-options=" iconCls:'icon-cancel'  " onclick="$('#win_analy1').window('close');" style="width:100px;height: 30px;">Close</a>
                   
                </td>
            </tr>
            
        </table>
    </form>
    
</div> 

<!-- โรคประจำตัว--->
<div class="easyui-dialog" id="dia_disease" style="top:10px;left: 10px; width:370px;height: 400px;"
     data-options="
      closed:true,
      title:'เพิ่มข้อมูลโรคประจำตัว',
      iconCls:'icon-man',
      
     "
     >
   
           
       
            <div class="easyui-datagrid" id="dg_disease" data-options="
                 
                 url:'<?=base_url()?>index.php/welcome/tb_disease',
                
                 
                 toolbar:[ 
                  {
                     text:'Reload',iconCls:'icon-reload',handler:function()
                     {
                        $('#dg_disease').datagrid('reload');
                     }
                  },
                  {
                     text:'Search',iconCls:'icon-search',handler:function()
                        {
                           $('#sr_disease').dialog('open');
                        }
                  },
                  {  text:'เพิ่ม ',iconCls:'icon-man',handler:function()
                      {
                          $('#add_disease').dialog('open');
                      }  
                   },
                   {
                     text:'แก้ไข',iconCls:'icon-edit',handler:function()
                     {
                         var  row=$('#dg_disease').datagrid('getSelected');
                         if( row )
                         {                                                     
                            id=row.id_disease;                           
                            var  url='<?=base_url()?>index.php/welcome/fetch_disease/' +  id; 
                            //alert(url);
                            $.getJSON(url,function(data)
                              {
                                  //alert(data);
                                  $.each(data,function(v,k)
                                      {
                                          var  disease_detail=k.disease_detail;
                                          //alert(disease_detail);
                                          var  id_disease=k.id_disease;
                                          //alert(id_disease);
                                          $('#add_disease').dialog('open');
                                          $('#fr_disease').form('load',
                                          {
                                              disease_detail:disease_detail,
                                              id_disease:id_disease,
                                              
                                          });
                                      });
                              });                       
                         }
                     }
                   },
                   {
                     text:'ลบ',iconCls:'icon-cancel',handler:function()
                     {
                        var  row=$('#dg_disease').datagrid('getSelected');
                        if( row )
                        {
                            
                        $.messager.confirm('สถานะการลบข้อมูล','คุณต้องการลบข้อมูลหรือไม่',function(r){
                           
                             if( r )
                             {
                        
                                        id=row.id_disease;
                                      //alert(id);
                                      var  url= '<?=base_url()?>index.php/welcome/del_disease/' + id;
                                      //alert(url);
                                      $.post(url,function(data)
                                      {
                                          //alert(data);
                                           if( data == '1' )
                                           {
                                               $.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลสำเร็จ','Info');
                                               $('#dg_disease').datagrid('reload');

                                           }else
                                           {
                                                $.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลล้มเหลว','Err');
                                                $('#dg_disease').datagrid('reload');
                                           }
                                      });
                            
                        
                        
                             }
                        });
                        
                       
                            
                            
                            
                        }   
                     }
                   }
                  ],
                 rownumbers:true,
                 singleSelect:true,
                 fitColumns:true,
                 columns:[[
                 {  field:'disease_detail',title:'โรคประจำตัว' },
                 ]]
                 
                 ">
                
            
        
        
       
    </div>
</div>
 <!-- โรคประจำตัว---> 
 
 <!-- เพิ่มโรคประจำตัว -->
 <div id="add_disease"  class="easyui-dialog" data-options=" title:'เพิ่มข้อมูลโรคประจำตัว', iconCls:'icon-man',closed:true,  " style="width:500px;height:250px;left: 90px;top: 30px; " >
      <form id="fr_disease"   method="post"  enctype="multipart/form-data"  novalidate="novalidate" >
  
          <div style="padding:10px 10px;" >
              <lable>
                  ID : 
                  <input class="easyui-textbox"  id="id_disease" readonly="true" name="id_disease" style="width:50px;height: 30px;" />
              </lable>
          </div>     
     <div style="padding:10px 10px;" >
                <label>
                    เพิ่มข้อมูล : 
                    <input class="easyui-textbox" id="disease_detail" required="required" name="disease_detail" style="width:300px;height: 40px;" />
                </label>        
       </div>
     <div style="padding:10px 10px;" >
         <a href="javascript:void(0)" iconCls='icon-save' class="easyui-linkbutton" style="width:80px;height: 30px;" onclick="  
            var url='<?=base_url()?>index.php/welcome/insert_disease';
            insert_disease(url);
            
            " >Insert</a>
         
         <a href="javascript:void(0)"  class="easyui-linkbutton" iconCls='icon-man' style="width:80px;height: 30px;" onclick="
            var  url='<?=base_url()?>index.php/welcome/update_disease';
            update_disease(url);
            " >Update</a>
         
         <a href="javascript:void(0)" class="easyui-linkbutton" iconCls='icon-cancel'  style="width:80px;height: 30px;" onclick=" fnclear(); " >Clear</a>
        </div>
          
      </form>     
     
 </div>
 <!-- เพิ่มโรคประจำตัว -->
 
 <!--  ค้นหา -->
 <div class="easyui-dialog"  id="sr_disease" style="width: 400px;height: 100px;left: 40px;top:30px;" data-options="
      closed:true,
      
      " >
     <div style="padding: 10px 10px;">
         <label>
             โรคประจำตัว  :  <input class="easyui-combobox" id="sr_id_disease" style="width:200px;height: 40px;" data-options="
                                 url:'<?=base_url()?>index.php/welcome/tb_disease',
                                 valueField:'id_disease',
                                 textField:'disease_detail',
                                 mode:'remote',
                                 method:'get',
                                 onSelect:function(rec)
                                 {
                                    var  id_disease=rec.id_disease;
                                    //alert(sr_id_disease);
                                    var  url='<?=base_url()?>index.php/welcome/select_disease/' + id_disease;
                                    //alert(url);
                                    $('#dg_disease').datagrid({
                                     url:url,
                                     
                                    });
                                    
                                 },
                                    "  />
         </label>
     </div>
     
 </div>
 <!--  ค้นหา -->
 