 
<link href="<?php echo base_url();?>assets/admin/global_assets/style.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url();?>assets/admin/global_assets/js/demo_pages/form_layouts.js"></script>
 <!--   <script src="<?php //echo base_url();?>/assets/admin/global_assets/js/main/jquery.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/admin/global_assets/popper.min.js"></script>
<!--     <script src="<?php echo base_url();?>/assets/admin/global_assets/js/main/bootstrap.bundle.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/admin/global_assets/script.js"></script>
<!--   <script src="<?php echo base_url();?>assets/admin/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>  -->
    <script src="<?php echo base_url();?>assets/admin/global_assets/js/demo_pages/form_multiselect.js"></script>
    <script src="<?php echo base_url();?>assets/admin/global_assets/js/demo_pages/picker_date.js"></script>


<script src="<?php echo base_url();?>assets/admin/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>

    <script src="<?php echo base_url();?>assets/admin/global_assets/js/demo_pages/extra_sweetalert.js"></script>

<!-- Theme JS files -->
    <script src="<?php echo base_url();?>assets/admin/global_assets/js/plugins/forms/inputs/duallistbox/duallistbox.min.js"></script>

   
    <script src="<?php echo base_url();?>assets/admin/global_assets/js/demo_pages/form_dual_listboxes.js"></script>
    <!-- /theme JS files -->

<div class="content">
<!-- Wizard with validation -->
                <div class="card">
                    <div class="card-header bg-white header-elements-inline">
                        <h6 class="card-title">Business Details</h6>
                      <!--   <a href="<?php //echo base_url();?>Mvendor/update_bdata/<?php //echo $vendor; ?>">Edit <i class="icon-pencil7"></i></a> -->
                    </div>
   <div style="padding:30px;">
   
        <form action="<?php echo base_url();?>Mvendor/update_business_category" method="post" enctype="multipart/form-data">
   
            <div class="card-body">
          
            <br><br>
            <?php if(isset($business)){
                    
                ?>
              
           
                   <div class="row">
                          <div class="col-md-6">
                              <div class="form-group" style="overflow-y: scroll; height:400px;">
                                  <div class="navbar navbar-expand-xl navbar-light rounded">
                                      <ul class="navbar-nav" >
                                        <li class="nav-item dropdown" id='ulid'>
                                            <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                                              <i class="icon-cube3 mr-2"></i>
                                              Category
                                            </a>
                                                <input type="hidden" name="v_id" class="form-control" value="<?php echo $vendor; ?>">
                                            <div class="dropdown-menu">  <?php foreach($category as $row) { ?>
                                              <div class="dropdown-submenu">
                                               
                                                <a href="#" onclick="mOver('<?php echo $row->category_id; ?>')" class="dropdown-toggle dropdown-item" data-toggle="dropdown" id="drop"><i class="icon-plus-circle2"></i><option value="<?php echo $row->category_id; ?>">
                                                <?php echo $row->category_title; ?></option></a> 
                                              
                                                <div class="dropdown-menu" id="test<?php echo $row->category_id; ?>">
                                                  
                                                </div>
                                              </div>
                                              <?php  } ?>
                                            
                                            </div>
                                        </li>
                                      </ul> 
                                  </div> 
                              </div>
                          </div> 
                          
                          <div class="col-md-6">
                                   <textarea readonly id="sid_display" class="form-control " height="100px" width="200px"></textarea><br/>
                                   <select id="sid"  name ="sid[]"  class="form-control " multiple="multiple"  style='display:none' ></select>  
                              <div class="wizard-buttons">
                                
                                <!--<button type="button" class="btn btn-previous">Previous</button>-->
                             
                                <button type="submit" name="save" id="save" <?php if(!empty($business)) {echo 'style="display: none;"';}?> class="btn btn-primary btn-submit">Submit</button>

                                <button type="submit" onclick="hello()" name="update" id="update" <?php if(empty($business)) {echo 'style="display: none;"';}?> class="btn btn-primary btn-submit">Update</button>
                              </div>
                          </div>
                </div>            
           <?php } ?>


        </div>
        </form>
    </div>
    </div>
 </div>  

<script>      //29 Dec 2018
    var subcat = <?php echo json_encode($allcatsubc); ?>;
    var curr_open=0;
      
    
   $( document ).ready(function() {        //28,29 Dec 2018

  
      var sel_disp = document.getElementById("sid_display");
      var disp_text ="";
      
            for ( var key in subcat){
              //alert(key);
              for (var i=0;i < subcat[key].length;i++) {
                if(subcat[key][i]['sel'] == 1){
                  var option = document.createElement("OPTION");
                  option.setAttribute('id',`${key},${subcat[key][i]['sub_category_id']}`);
                  
                  option.innerHTML ='('+ subcat[key][i]['category_title']+') '+subcat[key][i]['sub_category_title'];
                  var sel = document.getElementById("sid");
                  option.setAttribute('selected','');                  
                  option.setAttribute(`value` , `${key},${subcat[key][i]['sub_category_id']}`);
                  sel.appendChild(option);
                  disp_text+='('+ subcat[key][i]['category_title']+') '+subcat[key][i]['sub_category_title']+",";
                }
              }
              sel_disp.value=disp_text.replace(/,\s*$/, "");
            }
       });

function mOver(obj)
  {
    
     var id = obj;//cat id
     var data='';
         $('#test'+curr_open).css({display: "none"});
        $('#test'+id).html('');
        //data+= '<a href="#" class="dropdown-item  dropdown-toggle">';
            
            
        for (var i=0;i < subcat[id].length;i++) {
      
        if(subcat[id][i]['sel'] == 1){
         data+= '<div class="row" width=100% style="margin-left: 5px;"><i id="icon_" class="icon-checkbox-checked mr-2"></i><option id="'+id+'_'+subcat[id][i]['sub_category_id']+'" style="background-color:#2196f38c;" onclick="subclick(\''+id+','+subcat[id][i]['sub_category_id']+','+subcat[id][i]['category_title']+','+subcat[id][i]['sub_category_title']+'\')">'+subcat[id][i]['sub_category_title']+'</option></div><br>';   
         }
         else{
          data+= '<div class="row" width=100% style="margin-left: 5px;"><i id="icon_" class="icon-checkbox-unchecked mr-2"></i><option id="'+id+'_'+subcat[id][i]['sub_category_id']+'" onclick="subclick(\''+id+','+subcat[id][i]['sub_category_id']+','+subcat[id][i]['category_title']+','+subcat[id][i]['sub_category_title']+'\')">'+subcat[id][i]['sub_category_title']+'</option></div><br>'; 
        }
        }
      data+='</i></a>';
      $('#test'+id).html(data);
      //document.getElementById('test'+id).style.display = "block";

      $('#test'+id).toggle(function () { 
              
      $('#test'+id).css({display: "inline-block"});
      curr_open=id;
       });
   
  }


  function subclick(index)
  {
    var i;
    var sel = document.getElementById("sid");
    var sel_disp = document.getElementById("sid_display");
    var readstring='';
    //for (i = 0; i <= index.length; i++) {
      var option = document.createElement("OPTION");
      var fields = index.split(',');
      var cur_option = document.getElementById(`${fields[0]}_${fields[1]}`);
        for (j=0;j<subcat[fields[0]].length;j++){
          if (subcat[fields[0]][j]['sub_category_id']==fields[1]){
            if (subcat[fields[0]][j]['sel'] ==0){
              subcat[fields[0]][j]['sel'] =1;
              cur_option.style.backgroundColor="#2196f38c";
              cur_option.previousSibling.classList.remove("icon-checkbox-unchecked");
              cur_option.previousSibling.classList.add("icon-checkbox-checked");
              option.setAttribute('id',`${fields[0]},${fields[1]}`);
              option.setAttribute(`value` , `${fields[0]},${fields[1]}`);
              //option.innerHTML = index; 
              option.innerHTML = `(${fields[2]}) ${fields[3]}`;

              option.setAttribute('selected','');
              sel.appendChild(option);
            }else{
              subcat[fields[0]][j]['sel'] =0;
              cur_option.style.backgroundColor="#ffffff"; 
                cur_option.previousSibling.classList.remove("icon-checkbox-checked");
              cur_option.previousSibling.classList.add("icon-checkbox-unchecked");
              var element = document.getElementById(`${fields[0]},${fields[1]}`);            
              sel.removeChild(element);
            }
          }
        }

        for (k=0;k<sel.length;k++){
          readstring+=sel.options[k].text+",";
        }
        sel_disp.value=readstring.replace(/,\s*$/, "");
    //}
      
  }
    
   $("#country").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_state");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#state').html(data);
            },
        });
    });
   $("#state").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_city");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#city').html(data);
            },
            
        });
    });
   $("#category").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_sub_cat");?>',
            data: {id:id},
            success: function(data)
            {  
                $('#sub_category').html(data);
            },
        });
    });
   $("#sub_category").change(function(){
    var id = $(this).val();

         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_type");?>',
            data: {id:id},
            success: function(data)
            {   

               $('#brand').html(data);
                //$(".form-control multiselect-clickable-groups").html(data);

            },
            
        });
    });
   $("#type").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_sub_type");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#sub_type').html(data);
            },
            
        });
    });
</script>

<script>
    $(document).ready(function(){

        // $(".dropdown-toggle").dropdown();
        //$('#category').click(function()
                 //$('#category').append("<button></button>");
          // });
     //var tax_name = document.getElementById("tax_name1").value;

    })
</script>
<script type="text/javascript">
    var id = $("#v_id").val(); 
   // $( "#update" ).click(function() {

            /*swal({
                title: 'Are you sure?',
                text: 'You will not be able to recover this Category file!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            });*/
       


        /*$.ajax({
            type: 'post', 
            url: '<?php //echo base_url("Mvendor/check_Vendor_Inquery");?>',
            data: {id:id},
            success: function(data)
            {   
                //$('#sub_type').html(data);
                //alert(data +'You cnat change the category');
            },
            
        });*/
  //  });
    
      // Warning alert
        $('#updated').on('click', function(event) {
            
            /*event.preventDefault();
             swal({
                title: 'Are you sure?',
                text: 'You will not be able to recover this imaginary file!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
             }),
              function (isConfirm) {
                if (isConfirm) {
                  swal("Deleted!", "Your imaginary file has been deleted!", "success");
                } else {
                  swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
              }*/
/*
                var id = $("#v_id").val(); 
                $.ajax({
                type: "POST",
                data: {id: id},
                url: '<?php// echo base_url("Mvendor/check_Vendor_Inquery");?>',
                success: function (data) {
                    if (data > 0)
                    {

                        swal("Deleted!", "Product has been deleted.", "success");
                        
                    } else {

                        swal("Oops...", "Error in delete product!", "error");
                        
                    }
                }
            });*/
            
        });

        
</script>
<script>
    function hello()
    {
        /* event.preventDefault();
         swal({
                title: 'Are you sure?',
                text: 'You will not be able to recover this imaginary file!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                closeOnConfirm: false
             });
          function (isConfirm) {
                if (isConfirm) {
                  swal("Deleted!", "Your imaginary file has been deleted!", "success");
                } else {
                  swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
              }*/
    } 
</script>
<script>
/*
    $('#update').on('click', function(event) {
        var id = $("#category").val(); 
        var Cid = $("#sub_category").val();
      
            $.ajax({
                type: "POST",
                data: {id:id,Cid:Cid},
                url: '<?php //echo base_url("Mvendor/checkCagegoryInTable");?>',
                success: function (data) {
                    if (data !=='')
                    {
                        event.preventDefault();
                        swal({
                        title: 'Are you sure?',
                        html: 'You will not be able to Submit Please Select the Sub Category of  '+ data +' !',
                        type: 'warning',
                        confirmButtonText: 'Ok',
                        closeOnConfirm: false
                           });
                           
                    } else {
                         alert('fail');
                        
                    }
                }
            });
        
             
       
         
    });   */

</script>

<script type="text/javascript">
  function selectIngredient(select)
{
  var option = select.options[select.selectedIndex];
  var ul = select.parentNode.getElementsByTagName('ul')[0];
     
  var choices = ul.getElementsByTagName('input');
  for (var i = 0; i < choices.length; i++)
    if (choices[i].value == option.value)
      return;
     
  var li = document.createElement('li');
  var input = document.createElement('input');
  var text = document.createTextNode(option.firstChild.data);
     
  input.type = 'hidden';
  input.name = 'ingredients[]';
  input.value = option.value;

  li.appendChild(input);
  li.appendChild(text);
  li.setAttribute('onclick', 'this.parentNode.removeChild(this);');     
    
  ul.appendChild(li);
}
</script>
 