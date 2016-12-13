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
          //  alert(row.name);  //ชื่อ
          $('#id_name').textbox('setValue',row.name);
         //  alert(row.surname);  //นามสกุล
          $('#id_surname').textbox('setValue',row.surname);
           var d=new Date();
           var  curY=d.getFullYear();
           var  age_cal= curY - year_brd;
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
           var  power=$('#H').numberbox('getValue')*$('#H').numberbox('getValue');
           var  cal=$('#w').numberbox('getValue')/power;
           $('#calBMI').textbox('setValue',cal.toFixed(3));
        }
                         );
    });
    
    
    
    
    
   
</script>


<div id="win_analy1" class="easyui-window" title="เพิ่มข้อมูล อายุ/น้ำหนัก/ส่วนสูง" data-options="modal:true,closed:true,iconCls:'icon-add'" style="width:680px;height:500px;padding:10px;">
        
    <form id="fr_analy1"  method="post"  enctype="multipart/form-data">
        <table>
            
            <tr>
                <td>ID : </td>
                <td>
                    
                    <input class="easyui-textbox" readonly="true" style="width:50px;height: 30px" id="id_emp"  name="id_emp" />
                       ชื่อ : <input class="easyui-textbox"   id="id_name" name="id_name"   style="width: 80px;height: 30px;" readonly="true"  />
                       นามสกุล : <input class="easyui-textbox"   id="id_surname" name="id_surname"   style="width: 90px;height: 30px;" readonly="true"  />
                    
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
                <input class="f1 easyui-textbox" style="width: 280px;height: 30px" id="diag_detail" name="diag_detail" data-options="iconCls:'icon-edit' " ></input> 
                  
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
                        บางครั้ง
                       <input  class="easyui-switchbutton"  id="use_sometimes" name="use_sometimes" data-options="onText:'ใช่',offText:'ไม่ใช่', value:1 "></input> 
                        สม่ำเสมอ
                       <input  class="easyui-switchbutton"  id="use_always" name="use_always" data-options="onText:'ใช่',offText:'ไม่ใช่', value:1 "></input> 
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