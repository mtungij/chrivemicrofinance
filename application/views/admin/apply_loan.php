
 <?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

<div id="main-content" class="profilepage_2 blog-page">
<div class="container-fluid">
<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url("admin/index"); ?>"><i class="icon-home"></i></a></li>
                
                <li class="breadcrumb-item active">Customer</li>
                <li class="breadcrumb-item active">customer profile</li>
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

<div class="row clearfix">
    <div class="col-lg-12 col-md-12">

        <div class="card">
            <div class="row profile_state">
                 <div class="col-lg-2 col-2">
                    <!-- <div class="body"> -->
                        <!-- <i class="fa fa-star"></i> -->
                    <!--    <div class="profile-image"> <img src="<?php echo base_url().'assets/img/sig.jpg'; ?>" class="rounded-circle" alt="Gualantors image" style="width: 135px;height: 135px;">
                          </div>
                        <small>Signature</small> -->
                    <!-- </div> -->
                </div>
                <div class="col-lg-8 col-8">
                    <div class="body">
                       <!--  <i class="fa fa-thumbs-up"></i> -->
                         <div class="profile-image"> 
                           <?php if ($customer_profile->passport == TRUE) {
                              ?>
                               <img src="<?php echo base_url().$customer_profile->passport; ?>" class="img-thumbnail" alt="customer image" style="width: 130px;height: 130px;">
                              <?php }else{ ?> 
                                <img src="<?php echo base_url().'assets/img/male.jpeg'; ?>" class="img-thumbnail" alt="customer image" style="width: 130px;height: 130px;">
                                <?php } ?>
                          </div>
                        <small><?php echo $customer_profile->f_name; ?> <?php echo $customer_profile->m_name; ?> <?php echo $customer_profile->l_name; ?></small>
                    </div>
                </div>
                <div class="col-lg-2 col-2">
                    <!-- <div class="body"> -->
                        <!-- <i class="fa fa-star"></i> -->
                    <!--    <div class="profile-image"> <img src="<?php echo base_url().'assets/img/sig.jpg'; ?>" class="rounded-circle" alt="Gualantors image" style="width: 135px;height: 135px;">
                          </div>
                        <small>Signature</small> -->
                    <!-- </div> -->
                </div>
               
                
            </div>
        </div>

      

       <?php include('incs/nav_profile.php'); ?>
<?php if ($loan_pendings == FALSE) {
 ?>
 <div class="tab-content padding-0">
         <div class="tab-pane active" id="Basic">
           <div class="card">
            <div class="body">
                <h6>(1).Gualantors information</h6>
    <?php echo form_open("admin/create_loanapplication/{$customer_profile->customer_id}/"); ?>
        
       <div id="dynamic_field">
        <div class="row">
         <div class="col-md-4 col-6">
    <div class="form-group">
      <span>Full name:</span>
       <input type="text" class="form-control" id="full_name" placeholder="" name="sp_name[]" autocomplete="off">
    </div>
    </div>
         <div class="col-md-4 col-6">
    <div class="form-group">
      <span>Phone number:</span>
         <input type="number" class="form-control" id="phone_number" placeholder="" name="sp_phone_no[]" autocomplete="off">
    </div>
    </div>

    <div class="col-md-4 col-12">
    <div class="form-group">
      <span>Relationship With customer:</span>
        <input type="text" class="form-control" id="relation" placeholder="" name="sp_relation[]" autocomplete="off">
    </div>
    </div>

     <div class="col-md-6 col-10">
    <div class="form-group">
      <span>Adress:</span>
        <input type="text" class="form-control" id="location" placeholder="" name="sp_district[]" autocomplete="off">
    </div>
    </div>
    
      <div class="col-md-6 col-2">
        <br>
        <button type="button" name="add" id="add" class="btn btn-primary"><i class="icon-plus"></i></button>
      </div>
    
  </div>
</div>
<hr>
<h6>(2).Loan Aplication Form</h6>

                <div class="row">
                    <div class="col-lg-4 col-12">
                         <span>Loan category:</span>
                          <select type="number" name="category_id" id="category" class="form-control select2" required>
                            <option value="">Select</option>
                            <?php foreach ($loan_category as $loan_categorys): ?>
                            <option value="<?php echo $loan_categorys->category_id; ?>"><?php echo $loan_categorys->loan_name; ?> / <?php echo $loan_categorys->loan_price; ?> - <?php echo $loan_categorys->loan_perday; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                    <input type="hidden" name="aprover_id" value="<?php echo $customer_profile->empl_id; ?>">

                        <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
                        <input type="hidden" name="customer_id" value="<?php echo $customer_profile->customer_id; ?>">
                        <input type="hidden" name="blanch_id" value="<?php echo $customer_profile->blanch_id; ?>">

                        <div class="col-lg-4 col-12">
                            <span>Loan Amount:</span>
                            <input type="number" name="how_loan" placeholder="Enter Loan Amount" autocomplete="off" class="form-control input-sm" required style="border-color: green;color: green;">
                        </div>

                    <div class="col-lg-4 col-12">
                    <span>Loan Duration</span>
                    <select type="number" readonly name="day" id="duration" class="form-control" required class="form-control input-sm">
                        <option value="">select</option>
                        
                    </select>
                    </div>

                        <div class="col-lg-4 col-12">
                            <span>Number of Repayments:</span>
                    <input type="number" style="border-color: orange;color: orange;" name="session" placeholder="Enter Number of Repayments" autocomplete="off" class="form-control input-sm" required>
                        </div>
                     
                     <div class="col-lg-4 col-12">
                            <span><b>Interest Formular:</b></span>
                            <select type="number" readonly name="rate" class="form-control" id="formular" required>
                                <option value="">Select</option>
                                
                            </select>
                        </div>
                    

                    <div class="col-lg-4 col-12">
                            <span>Deduction Fee:</span>
                        <select type="text" name="fee_status" class="form-control" id="fee" required  readonly>
                         <option value="">select</option>
                         
                                
                        </select>
                        </div>

                        <input type="hidden" name="empl_id" value="<?php echo $customer_profile->empl_id;?>">


                        <!-- <div class="col-lg-6 col-12">
                        <span>Mkopeshaji:</span>
                    <input type="text" readonly name="" value="<?php //echo $zone_aproval->empl_name; ?>" autocomplete="off" class="form-control input-sm" required>
                    <input type="hidden" name="aprover_zone" value="<?php //echo $zone_aproval->empl_id; ?>">
                        </div> -->

                    
                    
                    
                        <div class="col-lg-12 col-12">
                            <span>Reason of Applying Loan:</span>
                       <textarea type="text" name="reason" rows="3" autocomplete="off"   class="form-control input-sm" placeholder="Enter Reason of Applying Loan" required></textarea>
                        </div> 
                  </div>
                  <hr>
    <h6>(3).Collateral Form</h6>
        <div id="dynamic_fields">
        <div class="row">
         <div class="col-md-6 col-10">
    <div class="form-group">
      <span>Collateral name:</span>
       <input type="text" class="form-control" id="col_name" placeholder="" name="description[]" autocomplete="off">
    </div>
    </div>
      
    
      <div class="col-md-6 col-2">
        <br>
        <button type="button" name="add" id="adds" class="btn btn-primary"><i class="icon-plus"></i></button>
      </div>
    
  </div>
</div>
<hr>

  <h6>(4).Local government Information</h6>
        
        <div class="row">
         <div class="col-md-4 col-12">
    <div class="form-group">
      <span>Full name:</span>
       <input type="text" class="form-control"  placeholder="" name="oficer" autocomplete="off">
    </div>
    </div>
        <div class="col-md-4 col-12">
    <div class="form-group">
      <span>Phone number:</span>
       <input type="number" class="form-control"  placeholder="" name="phone_oficer" autocomplete="off">
    </div>
    </div>
      <div class="col-md-4 col-12">
    <div class="form-group">
      <span>Adress:</span>
       <input type="text" class="form-control"  placeholder="" name="district_oficer" autocomplete="off">
    </div>
    </div>
  </div>

               </div>
                

            <div class="text-center">
            <button type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" class="btn btn-primary"><i class="icon-arrow-right">Apply Loan</i></button>
            </div>
                <?php echo form_close();  ?>
                    </div>
                </div>
            </div>
<?php }elseif ($loan_pendings->loan_status == 'withdrawal') {
 ?>
 <p style="color: red;">customer Account is Claimed!!</p>
<?php }elseif ($loan_pendings->loan_status == 'done') {
 ?>
  <div class="tab-content padding-0">
         <div class="tab-pane active" id="Basic">
           <div class="card">
            <div class="body">
                <h6>(1).Gualantors information</h6>
    <?php echo form_open("admin/create_loanapplication/{$customer_profile->customer_id}/"); ?>
        
       <div id="dynamic_field">
        <div class="row">
         <div class="col-md-4 col-6">
    <div class="form-group">
      <span>Full name:</span>
       <input type="text" class="form-control" id="full_name" placeholder="" name="sp_name[]" autocomplete="off">
    </div>
    </div>
         <div class="col-md-4 col-6">
    <div class="form-group">
      <span>Phone number:</span>
         <input type="number" class="form-control" id="phone_number" placeholder="" name="sp_phone_no[]" autocomplete="off">
    </div>
    </div>

    <div class="col-md-4 col-12">
    <div class="form-group">
      <span>Relationship With customer:</span>
        <input type="text" class="form-control" id="relation" placeholder="" name="sp_relation[]" autocomplete="off">
    </div>
    </div>

     <div class="col-md-6 col-10">
    <div class="form-group">
      <span>Adress:</span>
        <input type="text" class="form-control" id="location" placeholder="" name="sp_district[]" autocomplete="off">
    </div>
    </div>
    
      <div class="col-md-6 col-2">
        <br>
        <button type="button" name="add" id="add" class="btn btn-primary"><i class="icon-plus"></i></button>
      </div>
    
  </div>
</div>
<hr>
<h6>(2).Loan Aplication Form</h6>

                <div class="row">
                    <div class="col-lg-4 col-12">
                         <span>Loan category:</span>
                          <select type="number" name="category_id" id="category" class="form-control select2" required>
                            <option value="">Select</option>
                            <?php foreach ($loan_category as $loan_categorys): ?>
                            <option value="<?php echo $loan_categorys->category_id; ?>"><?php echo $loan_categorys->loan_name; ?> / <?php echo $loan_categorys->loan_price; ?> - <?php echo $loan_categorys->loan_perday; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                    <input type="hidden" name="aprover_id" value="<?php echo $customer_profile->empl_id; ?>">

                        <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
                        <input type="hidden" name="customer_id" value="<?php echo $customer_profile->customer_id; ?>">
                        <input type="hidden" name="blanch_id" value="<?php echo $customer_profile->blanch_id; ?>">

                        <div class="col-lg-4 col-12">
                            <span>Loan Amount:</span>
                            <input type="number" name="how_loan" placeholder="Enter Loan Amount" autocomplete="off" class="form-control input-sm" required style="border-color: green;color: green;">
                        </div>

                    <div class="col-lg-4 col-12">
                    <span>Loan Duration</span>
                    <select type="number" readonly name="day" id="duration" class="form-control" required class="form-control input-sm">
                        <option value="">select</option>
                        
                    </select>
                    </div>

                        <div class="col-lg-4 col-12">
                            <span>Number of Repayments:</span>
                    <input type="number" style="border-color: orange;color: orange;" name="session" placeholder="Enter Number of Repayments" autocomplete="off" class="form-control input-sm" required>
                        </div>
                     
                     <div class="col-lg-4 col-12">
                            <span><b>Interest Formular:</b></span>
                            <select type="number" readonly name="rate" class="form-control" id="formular" required>
                                <option value="">Select</option>
                                
                            </select>
                        </div>
                    

                    <div class="col-lg-4 col-6">
                            <span>Deduction Fee:</span>
                        <select type="text" name="fee_status" class="form-control" id="fee" required  readonly>
                         <option value="">select</option>
                         
                                
                        </select>
                        </div>

                        <input type="hidden" name="empl_id" value="<?php echo $customer_profile->empl_id;?>">


                        <!-- <div class="col-lg-6 col-12">
                        <span>Mkopeshaji:</span>
                    <input type="text" readonly name="" value="<?php //echo $zone_aproval->empl_name; ?>" autocomplete="off" class="form-control input-sm" required>
                    <input type="hidden" name="aprover_zone" value="<?php //echo $zone_aproval->empl_id; ?>">
                        </div> -->

                    
                    
                    
                        <div class="col-lg-12 col-12">
                            <span>Reason of Applying Loan:</span>
                       <textarea type="text" name="reason" rows="3" autocomplete="off"   class="form-control input-sm" placeholder="Enter Reason of Applying Loan" required></textarea>
                        </div> 
                  </div>
                  <hr>
    <h6>(3).Collateral Form</h6>
        <div id="dynamic_fields">
        <div class="row">
         <div class="col-md-6 col-10">
    <div class="form-group">
      <span>Collateral name:</span>
       <input type="text" class="form-control" id="col_name" placeholder="" name="description[]" autocomplete="off">
    </div>
    </div>
      
    
      <div class="col-md-6 col-2">
        <br>
        <button type="button" name="add" id="adds" class="btn btn-primary"><i class="icon-plus"></i></button>
      </div>
    
  </div>
</div>
<hr>

  <h6>(4).Local government Information</h6>
        
        <div class="row">
         <div class="col-md-4 col-12">
    <div class="form-group">
      <span>Full name:</span>
       <input type="text" class="form-control"  placeholder="" name="oficer" autocomplete="off">
    </div>
    </div>
        <div class="col-md-4 col-12">
    <div class="form-group">
      <span>Phone number:</span>
       <input type="number" class="form-control"  placeholder="" name="phone_oficer" autocomplete="off">
    </div>
    </div>
      <div class="col-md-4 col-12">
    <div class="form-group">
      <span>Adress:</span>
       <input type="text" class="form-control"  placeholder="" name="district_oficer" autocomplete="off">
    </div>
    </div>
  </div>

               </div>
                

            <div class="text-center">
            <button type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" class="btn btn-primary"><i class="icon-arrow-right">Apply Loan</i></button>
            </div>
                <?php echo form_close();  ?>
                    </div>
                </div>
            </div>
 <?php }else{ ?>

    <p style="color: red;">Customer Account is Claimed!!</p>
    <?php } ?>
    
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
$('#dynamic_field').append('<div id="row'+i+'">                     <hr>                                                                <div class="row">                                                       <div class="col-md-4 col-6">                                                  <div class="form-group">                                                <span>Full name:</span>                                                                                                    <input type="text" class="form-control" id="full_name"placeholder="" name="sp_name[]" autocomplete="off">                                                                                                                                                                        </div>                                                          </div>                                                               <div class="col-md-4 col-6">                                             <div class="form-group"><span>Phone number:</span>                                                                                           <input type="number" class="form-control" id="phone_number" placeholder="" name="sp_phone_no[]" autocomplete="off">                                                                                                        </div>                                                              </div>                                                                                          <div class="col-md-4 col-12">                                                          <div class="form-group">                                              <span>Relationship with customer:</span>                                                 <input type="text" class="form-control" placeholder="" name="sp_relation[]" id="relation" autocomplete="off">                                                                                                                                                                    </div>                                                          </div>                                                              <div class="col-md-6 col-10">                                                         <div class="form-group">                                                <span>Adress:</span>                                                <input type="text" class="form-control" id="location" placeholder="" name="sp_district[]" autocomplete="off">                                                                                                                                                                                                     </div>                                                             </div>                                                                                                                                                                                                                                                                                                                                                                                           <div class="col-md-6 col-2">                                             <br>                                                                <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="icon-trash"></i></button>                   </div>                                                    </div>                                                          </div>                                                           </div>');
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
url:"<?php echo base_url(); ?>admin/fetch_category_interest",
method:"POST",
data:{category_id:category_id},
success:function(data)
{
$('#formular').html(data);
//$('#district').html('<option value="">All</option>');
}
});

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_duration",
method:"POST",
data:{category_id:category_id},
success:function(data)
{
$('#duration').html(data);
//$('#duration').html('<option value="">All</option>');
}
});


$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_deduct_fee",
method:"POST",
//alert(category_id)
data:{category_id:category_id},
success:function(data)
{
$('#fee').html(data);
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
