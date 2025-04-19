<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("oficer/index"); ?>"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Saving Deposit</li>
                             <li class="breadcrumb-item active">Deposit Amount</li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Deposit </h2>
                            
                        </div>
                        <div class="text-center">
                                        <img id="loaderIcon" style="visibility:hidden; display:none;width: 100px; height: 100px;"
                                    src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" alt="Please wait" />
                                </div>
                        <div class="body">
                            <?php echo form_open_multipart("oficer/deposit_loan_saving/{$data_saving->id}",['id'=>'login_form']); ?>
                            <div class="row">
                                 <div class="col-lg-4 col-12"> 
                                 <span>Search Customer</span> 
                                 <select type="number" class="form-control select2" name="customer_id" id="customer" required>
                                     <option value="">Search Customer</option>
                                     <?php foreach ($customer as $customers): ?>
                                     <option value="<?php echo $customers->customer_id; ?>"><?php echo $customers->f_name; ?> <?php echo $customers->m_name; ?> <?php echo $customers->l_name; ?> / <?php echo $customers->customer_code; ?></option>
                                 <?php endforeach; ?>
                                 </select>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <span>Active loan</span>
                                    <select type="number" class="form-control" name="loan_id" id="loan" required>
                                        <option value="">loan</option>
                                    </select>
                                </div>



                                 <div class="col-lg-4 col-6">
                                    <span>Amount</span>
                                    <input type="number" name="" value="<?php echo $data_saving->amount; ?>" class="form-control" readonly required>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <span>Provider</span>
                                    <input type="text" name="" value="<?php echo $data_saving->account_name; ?>" class="form-control" readonly required>
                                </div>
                                <input type="hidden" name="p_method" value="<?php echo $data_saving->provider; ?>">
                                <input type="hidden" name="blanch_id" value="<?php echo $data_saving->blanch_id; ?>">
                                <input type="hidden" name="comp_id" value="<?php echo $data_saving->comp_id; ?>">
                                <input type="hidden" name="p_method" value="<?php echo $data_saving->provider; ?>">
                                 <input type="hidden" value="LOAN RETURN" name="description">
                                  <input type="hidden" name="double" value="NO" class="form-control">
                                  <?php $date = date("Y-m-d"); ?>
                                 
                                 <div class="col-lg-4 col-6">
                                    
                                    <span>Deposit Amount</span>
                                    <input type="number" name="depost" placeholder="Enter Amount" class="form-control" required>
                                </div>

                            <div class="col-lg-4 col-6">
                            <span>Deposit Date</span>
                            <input type="date" name="deposit_date" class="form-control" value="<?php echo $date; ?>" required>
                                </div>
                                </div>
                                
                            </div>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="icon-pencil">Deposit</i></button>

                                
                             <a href="<?php echo base_url("oficer/saving_deposit"); ?>" class="btn btn-primary"><i class="icon-arrow-left"></i></a>
                             
                                </div>
                            
                            <?php echo form_close();  ?>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</div>

<?php include('incs/footer.php'); ?>

<script>
    $(document).ready(function(){
        $('#login_form').submit(function() {
            $('#loaderIcon').css('visibility', 'visible');
            $('#loaderIcon').show();
        });
    })
</script>


<script>
$(document).ready(function(){

$('#customer').change(function(){
var customer_id = $('#customer').val();
 //alert(customer_id)
if(customer_id != '')
{
$.ajax({
url:"<?php echo base_url(); ?>oficer/fetch_data_loanActive_data_loanwithdrawal",
method:"POST",
data:{customer_id:customer_id},
success:function(data)
{
$('#loan').html(data);
//$('#malipo_name').html('<option value="">select center</option>');
}
});
}
else
{
$('#loan').html('<option value="">Select Active loan</option>');
//$('#malipo_name').html('<option value="">chagua vipimio</option>');
}
});



$('#blanch').change(function(){
 var blanch_id = $('#blanch').val();
 //alert (blanch_id)
 if(blanch_id != '')
 {
  $.ajax({
   url:"<?php echo base_url(); ?>oficer/fetch_blanch_account",
   method:"POST",
   data:{blanch_id:blanch_id},
   success:function(data)
   {
    $('#account').html(data);
    //$('#malipo').html('<option value="">chagua malipo</option>');
   }
  });
 }
 else
 {
  //$('#vipimio').html('<option value="">chagua vipimio</option>');
  $('#account').html('<option value="">Select Account</option>');
 }
});


});
</script>








