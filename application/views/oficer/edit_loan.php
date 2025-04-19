
<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

<div id="main-content" class="profilepage_2 blog-page">
<div class="container-fluid">
<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url("oficer/index"); ?>"><i class="icon-home"></i></a></li>
                
                <li class="breadcrumb-item active">loan</li>
                <li class="breadcrumb-item active">view Loan</li>
            </ul>
        </div>            
     
    </div>
</div>

<?php if ($das = $this->session->flashdata('massage')): ?> 
        <div class="row"> 
            <div class="col-md-12"> 
                <div class="alert alert-dismisible alert-success"> <a href="" class="close">&times;</a> 
                        <?php echo $das;?> </div> 
                </div> 
            </div> 
        <?php endif; ?>
         <?php if ($das = $this->session->flashdata('error')): ?> 
        <div class="row"> 
            <div class="col-md-12"> 
                <div class="alert alert-dismisible alert-danger"> <a href="" class="close">&times;</a> 
                        <?php echo $das;?> </div> 
                </div> 
            </div> 
        <?php endif; ?>



      

       <?php //include('incs/profile_nav.php'); ?>

 <div class="tab-content padding-0">
         <div class="tab-pane active" id="Basic">
           <div class="card">
            <div class="body">
    <?php echo form_open("oficer/modify_loan_aplication/{$loan_data->loan_id}/"); ?>
<h6>(1).Loan Aplication Form</h6>

                <div class="row">
                    <div class="col-lg-4 col-6">
                         <span>Loan Category:</span>
                          <select type="number" name="category_id" id="category" class="form-control select2" required>
                            <option value="<?php echo $loan_data->category_id; ?>"><?php echo $loan_data->loan_name; ?> / <?php echo $loan_data->loan_price; ?> - <?php echo $loan_data->loan_perday; ?></option>
                            <?php foreach ($loan_category as $loan_categorys): ?>
                            <option value="<?php echo $loan_categorys->category_id; ?>"><?php echo $loan_categorys->loan_name; ?> / <?php echo $loan_categorys->loan_price; ?> - <?php echo $loan_categorys->loan_perday; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                    <input type="hidden" name="loan_status" value="open">

                        <input type="hidden" name="comp_id" value="<?php echo $comp_id; ?>">
                        <!-- <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>"> -->
                        <!-- <input type="hidden" name="blanch_id" value="<?php echo $blanch_id; ?>"> -->

                        <div class="col-lg-4 col-6">
                            <span>Loan Amount:</span>
                            <input type="number" name="how_loan" placeholder="Loan Amount" value="<?php echo $loan_data->how_loan; ?>" autocomplete="off" class="form-control input-sm" required style="border-color: green;color: green;">
                        </div>

                    <div class="col-lg-4 col-6">
                    <span>Restoration type</span>
                    <select type="number" readonly name="day" id="duration" class="form-control" required class="form-control input-sm">
                        <option value="<?php echo $loan_data->day; ?>">
                            <?php if ($loan_data->day == '1') {
                                echo "Daily";
                            }elseif ($loan_data->day == '7') {
                                echo "Weekly";
                            }elseif ($loan_data->day == '30') {
                                echo "Monthly";
                            } ?>
                            
                                
                            </option>
                        
                    </select>
                    </div>

                        <div class="col-lg-4 col-6">
                            <span>Number of Repayments:</span>
                    <input type="number" style="border-color: orange;color: orange;" name="session" placeholder="Number of Repayments" value="<?php echo $loan_data->session; ?>" autocomplete="off" class="form-control input-sm" required>
                        </div>
                     
                     <div class="col-lg-4 col-6">
                            <span><b>Interest Formular:</b></span>
                            <select type="number" readonly name="rate" class="form-control" id="formular" required>
                                <option value="<?php echo $loan_data->rate; ?>"><?php echo $loan_data->rate; ?></option>
                                
                            </select>
                        </div>
                    

                   <div class="col-lg-4 col-6">
                            <span>Deducted fee:</span>
                        <select type="text" name="fee_status" class="form-control" id="fee" required readonly>
                         <option value="<?php echo $loan_data->fee_status; ?>"><?php echo $loan_data->fee_status; ?></option>
                        </select>
                        </div>

                        <input type="hidden" name="empl_id" value="<?php echo $loan_data->empl_id; ?>">


                        <!-- <div class="col-lg-6 col-12">
                        <span>Mkopeshaji:</span>
                    <input type="text" readonly name="" value="<?php //echo $zone_aproval->empl_name; ?>" autocomplete="off" class="form-control input-sm" required>
                    <input type="hidden" name="aprover_zone" value="<?php //echo $zone_aproval->empl_id; ?>">
                        </div> -->

                    
                    
                    <!-- <?php foreach ($fee_company as $fee_companys): ?>
                        <?php if ($fee_companys == FALSE) {
                         ?>
                        <div class="col-lg-12 col-12">
                       <span>Loan Fee</span>
                        <input type="number" name="fee[]" class="form-control" value="0" required>
                        </div>
                     <?php }else{ ?>
                       <div class="col-lg-6 col-6">
                        <span><?php echo $fee_companys->description; ?>:</span>
                        <input type="hidden" name="inc_id[]" value="<?php echo $fee_companys->fee_id; ?>">
                        <input type="number" name="receve_amount[]" class="form-control" required>
                        </div>
                        <?php } ?>
                        <?php endforeach; ?> -->
                        <div class="col-lg-12 col-12">
                            <span>Reason of Applying Loan:</span>
                       <textarea type="text" name="reason" rows="3" autocomplete="off"   class="form-control input-sm" placeholder="Reason of Applying Loan" required><?php echo $loan_data->reason; ?></textarea>
                        </div> 
                  </div>
                 
               </div>
                

            <div class="text-center">
             <?php if ($loan_pendings->loan_status == 'open' || $loan_pendings->loan_status == 'reject') {
              ?>
            <button type="submit" class="btn btn-primary"><i class="icon-pencil">Update</i></button>
            <a href="<?php echo base_url("oficer/loan_pending"); ?>" class="btn btn-primary"><i class="icon-arrow-left"></i></a>
        <?php }else{ ?>
        <a href="<?php echo base_url("oficer/all_loans_details/{$customer_id}"); ?>" class="btn btn-primary"><i class="icon-arrow-left"></i></a>
            <?php } ?>
            </div>
                <?php echo form_close();  ?>
                    </div>
                </div>
            </div>


            <div class="tab-content padding-0">
         <div class="tab-pane active" id="Basic">
           <div class="card">
            <div class="body">
    
<h6>(2).Guarantors</h6>
  <div class="pull-right">
                             <?php if ($loan_pendings->loan_status == 'open') {
                              ?>
                                        <a href="" data-toggle="modal" data-target="#addcontact2" class="btn btn-primary btn-sm"><i class="icon-plus"></i></a>
                                    <?php }else{ ?>
                                        <?php } ?>
                                    </div>
                         <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>S/No.</th>
                                            <th>Full name</th>
                                            <th>Phone Number</th>
                                            <th>Relationship</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($sponser as $sponsers): ?>

                                    <?php if ($sponsers->sp_name == FALSE) {
                                    }else{  ?>
                                        <tr>
                                            <td><?php echo $no++; ?>.</td>
                                            <td><?php echo $sponsers->sp_name; ?></td>
                                            <td><?php echo $sponsers->sp_phone_no; ?></td>
                                            
                                             <td><?php echo $sponsers->sp_relation; ?></td>
                                             
                                             <td><?php echo $sponsers->sp_district; ?></td>
                                             
                                             
                                             <td>
                        <a href="" data-toggle="modal" data-target="#addcontact2<?php echo $sponsers->sp_id; ?>" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
                        <a href="<?php echo base_url("oficer/delete_sponser_edit_loan/{$sponsers->sp_id}/{$customer_id}/{$loan_data->loan_id}"); ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="icon-trash"></i></a>
                                             </td>
                                        </tr>
                                        <?php } ?>

                                
    <div class="modal fade" id="addcontact2<?php echo $sponsers->sp_id; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Update Guarantor Information</h6>
            </div>
            <?php echo form_open("oficer/modify_sponser_edit_loan/{$sponsers->sp_id}/{$customer_id}/{$loan_data->loan_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                   
                    
    <div class="col-lg-6 col-6">
      <span>Full Name:</span>
        <input type="text" class="form-control" id="sp_name" value="<?php echo $sponsers->sp_name; ?>" placeholder="First name" name="sp_name" autocomplete="off">
    </div>

    

  <!--   <input type="hidden" name="customer_id"  id="customer_id" value="<?php echo $customer_id; ?>">
    <input type="hidden" name="comp_id" id="comp_id" value="<?php //echo $_SESSION['comp_id']; ?>"> -->

    
    <div class="col-lg-6 col-6">
      <span>Phone number:</span>  
        <input type="number" class="form-control" readonly value="<?php echo $sponsers->sp_phone_no; ?>" id="sp_phone_no" placeholder="Enter Phone number" name="sp_phone_no" autocomplete="off">
    </div>
   
     <div class="col-lg-6 col-12">
      <span>Reationship with Customer:</span>  
        <input type="text" class="form-control" id="sp_relation" value="<?php echo $sponsers->sp_relation; ?>" placeholder="Enter Reationship With Customer" name="sp_relation" autocomplete="off">
    </div>

    <div class="col-lg-6 col-12">
      <span>Location:</span>  
        <input type="text" class="form-control" value="<?php echo $sponsers->sp_district; ?>"  placeholder="Enter District" name="sp_district" autocomplete="off">
    </div>     
            </div>
        </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              <!--  <a href="" class="btn btn-primary">Resend Code</a> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

  
                                         <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                 
 </div>
                

          
                
                    </div>
                </div>
            </div>


            <div class="tab-content padding-0">
         <div class="tab-pane active" id="Basic">
           <div class="card">
            <div class="body">
    
<h6>(3).Collateral</h6>
  <div class="pull-right">
    <?php if ($loan_pendings->loan_status == 'open') {
     ?>
            <a href="" data-toggle="modal" data-target="#addcontact3" class="btn btn-primary btn-sm"><i class="icon-plus"></i></a>
        <?php }else{ ?>
            <?php } ?>
                                    </div>
                             <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                    <th>S/No.</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       
                                               <?php $no = 1; ?>
                          <?php foreach ($collateral as $collaterals): ?>
                            <?php if ($collaterals->description == FALSE) {
                             ?>
                         <?php }else{ ?>
                                    <tr>
                                    <td><?php echo $no++; ?>.</td>
                                    <td><?php echo $collaterals->description; ?></td>
                                   
                                       <!--  <td>
                                    <img src="<?php //echo base_url().$collaterals->file_name; ?>" class="img-thumbnail" style="width: 70px;height: 70px;">
                                        </td> -->
                                        <td>
               
             
                
                  
                  <a href="javascript:;" title="Edit" data-toggle="modal" data-target="#addcontact1<?php echo $collaterals->col_id; ?>" class="btn btn-info btn-sm"><i class="icon-pencil"></i></a>
                  <a href="<?php echo base_url("oficer/delete_colateral_edit_loan/{$collaterals->col_id}/{$loan_data->loan_id}"); ?>" onclick="return confirm('Are You Sure?')" title="Delete" class="btn btn-danger btn-sm"><i class="icon-trash"></i></a>

                                            </td>
                                        </tr>
                                        <?php } ?>
    <div class="modal fade" id="addcontact1<?php echo $collaterals->col_id; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Edit Collateral</h6>
            </div>
    <?php echo form_open("oficer/modify_collateral_edit_loan/{$collaterals->col_id}/{$loan_data->loan_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
             <div class="col-lg-12 col-12">
        <div class="form-group">
          <span>Name:</span>
            <input type="text" class="form-control" value="<?php echo $collaterals->description; ?>"  placeholder="Enter Name" name="description" autocomplete="off">
        </div>
        </div>
            
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
     <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                 
 </div>
                

          
                
                    </div>
                </div>
            </div>



      <div class="tab-content padding-0">
         <div class="tab-pane active" id="Basic">
           <div class="card">
            <div class="body">
    
<h6>(4).Local government</h6>
  <div class="pull-right">
            <!-- <a href="" data-toggle="modal" data-target="#addcontact3" class="btn btn-primary btn-sm"><i class="icon-plus"></i></a> -->
                                    </div>
                             <div class="table-responsive">
                                 <table class="table table-hover j-basic-example dataTable table-custom">
                            <thead class="thead-primary">
                                <tr>
                                    
                                    <th>Oficer Name</th>
                                    <th>phone number</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                <?php $no = 1; ?>
                                <?php if ($local_oficer->oficer == FALSE) {
                                 ?>
                             <?php }else{ ?>
                                <tr>
                                    <td> 
                                   <?php echo @$local_oficer->oficer; ?> 
                                    </td>
                                    <td><?php echo @$local_oficer->phone_oficer; ?></td>
                                    <td><?php echo @$local_oficer->district_oficer ?></td>
                                    <td><a href="javascript:;" title="Edit" data-toggle="modal" data-target="#addcontact1<?php echo $local_oficer->attach_id; ?>" class="btn btn-info btn-sm"><i class="icon-pencil"></i></a></td>
                                    </tr>
                                    <?php } ?>
  <div class="modal fade" id="addcontact1<?php echo $local_oficer->attach_id ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Edit Local government information</h6>
            </div>
    <?php echo form_open("oficer/modify_localgovernment/{$local_oficer->attach_id}/{$loan_data->loan_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
             <div class="col-lg-6 col-6">
        <div class="form-group">
          <span>oficer Name:</span>
            <input type="text" class="form-control" value="<?php echo $local_oficer->oficer; ?>"  placeholder="Enter Name" name="oficer" autocomplete="off">
        </div>
        </div>
         <div class="col-lg-6 col-6">
        <div class="form-group">
          <span>Phone number:</span>
            <input type="number" class="form-control" value="<?php echo $local_oficer->phone_oficer; ?>"  placeholder="Enter Name" name="phone_oficer" autocomplete="off">
        </div>
        </div>
        <div class="col-lg-12 col-12">
        <div class="form-group">
          <span>Location:</span>
            <input type="text" class="form-control" value="<?php echo $local_oficer->district_oficer; ?>"  placeholder="Enter Name" name="district_oficer" autocomplete="off">
        </div>
        </div>
            
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>                          


                            </tbody>
                        </table>
                            </div>

                 
 </div>
                

          
                
                    </div>
                </div>
            </div>





    </div>
</div>
</div>
</div>
</div>

<?php include('incs/footer.php'); ?>

<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
$('#add').click(function(){  
i++;             
$('#dynamic_field').append('<div id="row'+i+'">                     <hr>                                                                <div class="row">                                                       <div class="col-md-4 col-6">                                                  <div class="form-group">                                                <span>Full name:</span>                                                                                                    <input type="text" class="form-control" id="full_name"placeholder="" name="sp_name[]" autocomplete="off" required>                                                                                                                                                                        </div>                                                          </div>                                                               <div class="col-md-4 col-6">                                             <div class="form-group"><span>Phone number:</span>                                                                                           <input type="number" class="form-control" id="phone_number" placeholder="" name="sp_phone_no[]" autocomplete="off" required>                                                                                                        </div>                                                              </div>                                                                                          <div class="col-md-4 col-12">                                                          <div class="form-group">                                              <span>Relationship with customer:</span>                                                 <input type="text" class="form-control" placeholder="" name="sp_relation[]" id="relation" autocomplete="off" required>                                                                                                                                                                    </div>                                                          </div>                                                              <div class="col-md-6 col-10">                                                         <div class="form-group">                                                <span>Adress:</span>                                                <input type="text" class="form-control" id="location" placeholder="" name="sp_district[]" autocomplete="off" required>                                                                                                                                                                                                     </div>                                                             </div>                                                                                                                                                                                                                                                                                                                                                                                           <div class="col-md-6 col-2">                                             <br>                                                                <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="icon-trash"></i></button>                   </div>                                                    </div>                                                          </div>                                                           </div>');
     });
     
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           var res = confirm('Are you sure you want to remove this?');
           if(res==true){
           $('#row'+button_id+'').remove();  
           $('#'+button_id+'').remove();  
           }
      });  
  
    });  
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
$('#adds').click(function(){  
i++;             
$('#dynamic_fields').append('<div id="row'+i+'">                     <hr>                                                                <div class="row">                                                       <div class="col-md-6 col-10">                                                                             <div class="form-group">                                                <span>Collateral name:</span>                                                                                                    <input type="text" class="form-control" id="col_name"placeholder="" name="description[]" autocomplete="off" required>                                                                                                                                                                        </div>                                                          </div>                                                                                                                                                                                                                                                                          <div class="col-md-6 col-2">                                             <br>                                                                <button type="button" name="removes" id="'+i+'" class="btn btn-danger btn_removed"><i class="icon-trash"></i></button>                   </div>                                                    </div>                                                          </div>                                                           </div>');
     });
     
     $(document).on('click', '.btn_removed', function(){  
           var button_id = $(this).attr("id"); 
           var resy = confirm('Are you sure you want to remove this?');
           if(resy==true){
           $('#row'+button_id+'').remove();  
           $('#'+button_id+'').remove();  
           }
      });  
  
    });  
</script>



<script>
function getDate(data){
let now = new Date();
let bod = (new Date(data));

let age = now.getFullYear() - bod.getFullYear();
let _age = document.querySelector("#age");
_age.value = age;
//alert(age)
}
</script>


<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_employee_blanch",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#empl').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#empl').html('<option value="">Select Employee</option>');
//$('#district').html('<option value="">All</option>');
}
});



// $('#customer').change(function(){
// var customer_id = $('#customer').val();
//  //alert(customer_id)
// if(customer_id != '')
// {
// $.ajax({
// url:"<?php echo base_url(); ?>admin/fetch_data_vipimioData",
// method:"POST",
// data:{customer_id:customer_id},
// success:function(data)
// {
// $('#loan').html(data);
// //$('#malipo_name').html('<option value="">select center</option>');
// }
// });
// }
// else
// {
// $('#loan').html('<option value="">Select Active loan</option>');
// //$('#malipo_name').html('<option value="">chagua vipimio</option>');
// }
// });

// $('#social').change(function(){
//  var district_id = $('#social').val();
//  if(district_id != '')
//  {
//   $.ajax({
//    url:"<?php echo base_url(); ?>user/fetch_data_malipo",
//    method:"POST",
//    data:{district_id:district_id},
//    success:function(data)
//    {
//     $('#malipo_name').html(data);
//     //$('#malipo').html('<option value="">chagua malipo</option>');
//    }
//   });
//  }
//  else
//  {
//   //$('#vipimio').html('<option value="">chagua vipimio</option>');
//   $('#malipo_name').html('<option value="">chagua vipimio</option>');
//  }
// });


});
</script>



<script>

$(document).ready(function(){
$('#category').change(function(){
var category_id = $('#category').val();
//alert(category_id)
if(category_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>oficer/fetch_category_interest",
method:"POST",
data:{category_id:category_id},
success:function(data)
{
$('#formular').html(data);
//$('#district').html('<option value="">All</option>');
}
});

$.ajax({
url:"<?php echo base_url(); ?>oficer/fetch_duration",
method:"POST",
data:{category_id:category_id},
success:function(data)
{
$('#duration').html(data);
//$('#duration').html('<option value="">All</option>');
}
});


$.ajax({
url:"<?php echo base_url(); ?>oficer/fetch_deduct_fee",
method:"POST",
data:{category_id:category_id},
success:function(data)
{
$('#fee').html(data);
//$('#duration').html('<option value="">All</option>');
}
});

$.ajax({
url:"<?php echo base_url(); ?>oficer/fetch_loan_fee_data",
method:"POST",
data:{category_id:category_id},
success:function(data)
{
$('#fee_value').html(data);
//$('#duration').html('<option value="">All</option>');
}
});

}
else
{
$('#formular').html('<option value="">Select Formular</option>');
//$('#formular').html('<option value="">All</option>');
}
});




// $(document).ready(function(){
// $('#category').change(function(){
// var category_id = $('#category').val();
// //alert(category_id)
// if(category_id != ''){

// $.ajax({
// url:"<?php echo base_url(); ?>admin/fetch_duration",
// method:"POST",
// data:{category_id:category_id},
// success:function(data)
// {
// $('#duration').html(data);
// //$('#district').html('<option value="">All</option>');
// }
// });
// }
// else
// {
// $('#duration').html('<option value="">Select Duration</option>');
// //$('#district').html('<option value="">All</option>');
// }
// });



});
</script>


<div class="modal fade" id="addcontact2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Guarantors Information</h6>
            </div>
            <?php echo form_open("oficer/create_sponser_edit_loan/{$customer_id}/{$loan_data->loan_id}"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                   
                    
        <div class="col-lg-6 col-6">
      <span>Full Name:</span>
        <input type="text" class="form-control" id="sp_name" placeholder="Full name" name="sp_name" autocomplete="off">
    </div>

   

    <input type="hidden" name="customer_id"  id="customer_id" value="<?php echo $customer_id; ?>">
    <input type="hidden" name="comp_id" id="comp_id" value="<?php echo $comp_id; ?>">

    
    <div class="col-lg-6 col-6">
      <span>Phone number:</span>  
        <input type="number" class="form-control" id="sp_phone_no" placeholder="Enter Phone number" name="sp_phone_no" autocomplete="off">
    </div>
   
     <div class="col-lg-6 col-12">
      <span>Reationship with Customer:</span>  
        <input type="text" class="form-control" id="sp_relation" placeholder="Enter Reationship With Customer" name="sp_relation" autocomplete="off">
    </div>
        
       
    
    <div class="col-lg-6 col-12">
      <span>Location:</span>  
        <input type="text" class="form-control"  placeholder="Enter loacation" name="sp_district" autocomplete="off">
    </div>
            </div>
        </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">save</button>
              <!--  <a href="" class="btn btn-primary">Resend Code</a> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>






<div class="modal fade" id="addcontact3" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Collatearl form</h6>
            </div>
 <?php echo form_open("oficer/create_collateral_edit_loan/{$loan_data->loan_id}"); ?>
      <div class="modal-body">
        <div class="row clearfix">    
        <div class="col-lg-12">
        <div class="form-group">
          <span>Collateral Name:</span>
            <input type="text" class="form-control" id="description" placeholder="Enter Collateral Name" name="description" autocomplete="off">
        </div>
        </div>
    <input type="hidden" value="<?php echo $loan_data->loan_id; ?>" name="loan_id" id="id">        
            </div>
        </div>
            <div class="modal-footer">
        <button type="submit" class="btn btn-primary">save</button>
              <!--  <a href="" class="btn btn-primary">Resend Code</a> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

    