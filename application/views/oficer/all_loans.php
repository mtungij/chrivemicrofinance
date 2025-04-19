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
        
        <li class="breadcrumb-item active">Customer</li>
        <li class="breadcrumb-item active">All loans</li>
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

<div class="tab-content padding-0">

    <div class="tab-pane active" id="Basic">
        <div class="card">
<div class="body">
        <div class="table-responsive">
            <table class="table table-hover js-basic-example dataTable table-custom">
                <thead class="thead-primary">
                    <tr>
                    <th>S/no.</th>
                    <th>Loan Ac</th>
                    <th>Loan Product</th>
                    <th>Loan Interest</th>
                    <th>Loan Withdrawal</th>
                    <th>Principal + interest</th>
                    <th>Duration Type</th>
                    <th>Number of Repayment</th>
                    <th>Restoration</th>
                    <th>Status</th>
                    <th>Withdrawal Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                   <?php $no = 1 ?>        
            <?php foreach($loan_customer as $loan_aproveds): ?>
                    <tr>
                <td><?php echo $no++; ?>.</td>
                <td><?php echo $loan_aproveds->loan_code; ?></td>
                
                <td><?php echo $loan_aproveds->loan_name ?></td>
                <td><?php echo $loan_aproveds->interest_formular; ?>%</td>
                <td><?php echo number_format($loan_aproveds->loan_aprove); ?></td>
                <td><?php echo number_format($loan_aproveds->loan_int); ?></td>
                
                <td>
           <?php if ($loan_aproveds->day == 1) {
                             echo "Daily";
                         ?>
                        <?php }elseif($loan_aproveds->day == 7){
                              echo "Weekly";
                         ?>
                        
                    <?php }elseif($loan_aproveds->day == 30 || $loan_aproveds->day == 31 || $loan_aproveds->day == 29 || $loan_aproveds->day == 28){
                            echo "Monthly"; 
                        ?>
                        <?php } ?>
                </td>

                    
            <td><?php echo $loan_aproveds->session; ?> </td> 
            <td><?php echo number_format($loan_aproveds->restration); ?> </td>
            <td>
                <?php if ($loan_aproveds->loan_status == 'open') {
                     ?>
                    <a href="javascript:;" class="badge badge-warning">Pending</a>
                    <?php }elseif($loan_aproveds->loan_status == 'aproved'){ ?>
                      <a href="javascript:;" class="badge badge-info">Aproved</a>
                        <?php }elseif($loan_aproveds->loan_status == 'withdrawal'){ ?>
                         <a href="javascript:;" class="badge badge-primary">Active</a>
                            <?php }elseif($loan_aproveds->loan_status == 'done'){ ?>
                            <a href="javascript:;" class="badge badge-success">Done</a>
                                <?php }elseif ($loan_aproveds->loan_status == 'out') { ?>
                        <a href="javascript:;" class="badge badge-danger">Default</a>
                                    
                                <?php }elseif($loan_aproveds->loan_status == 'disbarsed'){ ?> 
                            <a href="javascript:;" class="badge badge-secondary">Disbursed</a>
                            <?php } ?>
            </td> 
            <td><?php echo $loan_aproveds->loan_stat_date; ?> </td>
            <td><?php echo substr($loan_aproveds->loan_end_date, 0,10); ?></td>
            <td> 
<a href="<?php echo base_url("oficer/edit_loan/{$loan_aproveds->loan_id}"); ?>" title="Loan collateral" class="btn btn-info"><i class="icon-list"></i></a></td> 
             </tr>

        <?php endforeach; ?>
           
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