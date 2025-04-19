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
                            <li class="breadcrumb-item active">Report</li>
                            <li class="breadcrumb-item active">Agent transaction</li>
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
                <div class="col-lg-12">
                    <div class="card">
                         <div class="header">
                            <h2>Agent transaction </h2> 
                            <div class="pull-right">
              <a href="" class="btn btn-sm btn-icon btn-pure btn-success on-default m-r-5 button-edit"
                            data-toggle="modal" data-target="#addcontact2" data-original-title="Edit"><i class="icon-wallet"></i></a>
            <a href="" class="btn btn-sm btn-icon btn-pure btn-primary on-default m-r-5 button-edit"
                            data-toggle="modal" data-target="#addcontact1" data-original-title="Edit"><i class="icon-plus"></i></a>
            <a href="" class="btn btn-sm btn-icon btn-pure btn-primary on-default m-r-5 button-edit"
                            data-toggle="modal" data-target="#addcontact3" data-original-title="Edit"><i class="icon-magnifier"></i></a> 
            <a href="<?php echo base_url("oficer/deposit_lecord"); ?>" class="btn btn-primary"><i class="icon-list"></i></a> 
                            </div>   
                             </div>
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                                <th>S/no</th>
                                                <th>Branch</th>
                                                <th>Provider</th>
                                                <th>Agent</th>
                                                <th>Rec/amount </th>
                                                <th>Remain Amount </th>
                                                <th>Staff rec </th>
                                                <!-- <th>Time</th>    -->
                                                <th>Date</th>
                                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($saving_deposit as $saving_deposits): ?>
                                        <tr>
                                            <td><?php echo $no++; ?>.</td>
                                            <td><?php echo $saving_deposits->blanch_name; ?></td>
                                            <td><?php echo $saving_deposits->account_name; ?></td>
                                            <td><?php echo $saving_deposits->agent; ?></td>
                                            <td><?php echo number_format($saving_deposits->rec_amount); ?></td>
                                            <td><?php echo number_format($saving_deposits->amount); ?></td>
                                            <td><?php echo $saving_deposits->empl_name; ?></td>
                                            <!-- <td><?php echo $saving_deposits->time; ?></td> -->
                                         
                                            <td><?php echo $saving_deposits->date; ?></td>
                                            <td>
                                         
                                    
                                    <a href="<?php echo base_url("oficer/deposit_saving/{$saving_deposits->id}"); ?>" class="btn btn-primary btn-sm" onclick="return confirm('Are You Sure?')" title="depost"><i class="icon-pencil"></i></a>
                                    <a href="<?php echo base_url("oficer/remove_miamala_agent/{$saving_deposits->id}"); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Delete?')" title="Delete"><i class="icon-trash"></i></a>
                                
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tr>
                                        <td><b>TOTAL:</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b><?php echo number_format($total_saving->total_remain); ?></b></td>
                                        <td><b><?php echo number_format($total_saving->total_amount_saving); ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <!-- <td></td> -->
                                       
                                        
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div> 


             
            </div>
        </div>
    </div>
</div>

<?php include('incs/footer.php'); ?>


<div class="modal fade" id="addcontact3" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Filter</h6>
            </div>
            <?php echo form_open("oficer/filter_miamala"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                <!-- <div class="col-lg-12 col-12">
                <span>*Branch:</span>
                <select type="number" class="form-control select2" name="blanch_id" id="blanch3"  required>
                <option value="">Select Branch </option>
                <?php foreach ($blanch as $blanchs): ?>
                <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?> </option>
                <?php endforeach; ?>
                <option value="all">ALL</option>
                    </select>
                 </div> -->

                 <input type="hidden" name="blanch_id" value="<?php echo $_SESSION['blanch_id']; ?>">

                 <!-- <div class="col-lg-6 col-6">
                 <span>*Staff:</span>
                <select type="number" class="form-control" name="empl_id"  required id="empl2">
                <option value="">Select Staff </option>
                
                    </select>
                 </div> -->
            <?php $date = date("Y-m-d"); ?>

                <div class="col-lg-6 col-6">
                <span>*From:</span>
            <input type="date" name="from" autocomplete="off" class="form-control" value="<?php echo $date; ?>" required>
                </div>
                
                    <div class="col-lg-6 col-6">
            <span>*To</span>
            <input type="date" name="to" autocomplete="off" value="<?php echo $date; ?>" class="form-control" required>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="icon-magnifier"></i></button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<div class="modal fade" id="addcontact1" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Record Agent Transaction</h6>
            </div>
            <?php echo form_open("oficer/create_saving_deposit"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                <!-- <div class="col-lg-4 col-6">
                <span>*Branch:</span>
                <select type="number" class="form-control select2" name="blanch_id" id="blanch"  required>
                <option value="">Select Branch </option>
                <?php foreach ($blanch as $blanchs): ?>
                <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?> </option>
                <?php endforeach; ?>
                    </select>
                 </div> -->
<!-- 
                 <div class="col-lg-4 col-6">
                 <span>*Staff:</span>
                <select type="number" class="form-control" name="empl_id"  required id="empl">
                <option value="">Select Staff </option>
                
                    </select>
                 </div> -->

                <div class="col-lg-6 col-6">
                 <span>*Provider:</span>
                <select type="number" class="form-control" name="provider"  required>
                <option value="">Select Provider </option>
                <?php foreach ($acount_trans as $acount_tran): ?>
                <option value="<?php echo $acount_tran->trans_id; ?>"><?php echo $acount_tran->account_name; ?> </option>
                <?php endforeach; ?>
                    </select>
                 </div>

                 <div class="col-lg-6 col-6">
                    <span>*Agent Name:</span>
                <input type="text" name="agent" autocomplete="off" class="form-control" placeholder="Enter Agent Name" required>
                 </div>


                <div class="col-lg-12 col-12">
                <span>*Amount</span>
            <input type="number" name="amount" autocomplete="off" class="form-control" placeholder="Enter Amount" required>
                </div>
                
            <input type="hidden" name="comp_id" value="<?php echo $comp_id; ?>">
            <input type="hidden" name="empl_id" value="<?php echo $_SESSION['empl_id']; ?>">
            <input type="hidden" name="blanch_id" value="<?php echo $_SESSION['blanch_id']; ?>">
             
                <?php $day = date("Y-m-d"); ?>
            <input type="hidden" name="date" value="<?php echo $day;?>">
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>



<div class="modal fade" id="addcontact2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Agent Balance</h6>
            </div>
            <div class="modal-body">
                         <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover j-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>S/No.</th>
                                            <th>Branch Name</th>
                                            <th>Balance</th>
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                              <?php $no = 1; ?>
                                    <?php foreach ($blanch_miamala as $blanchs): ?>
                                     
                                              <tr>
                                    <td><?php echo $no++; ?>.</td>
                                    <td><?php echo $blanchs->blanch_name; ?></td>
                                    <td><?php echo number_format($blanchs->total_blanch_miamala); ?></td>
                                                                                                                     
                                    </tr>
  
                                         <?php endforeach; ?>
                                    </tbody>
                                    <tr>
                                        <td><b>TOTAL</b></td>
                                        <td></td>
                                        <td><b><?php echo number_format($total_blanch_miamala->total_amount_saving); ?></b></td>
                                    </tr>
                                </table>
                            </div>
                        </div> 
                
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
           
        </div>
    </div>
</div>












<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//console.log(blanch_id);
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_employee_blanchdata",
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
$('#blanch3').change(function(){
var blanch_id = $('#blanch3').val();
alert($blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_employee_blanch",
method:"POST",
data:{blanch_id:blanch_id},

success:function(data)
{
$('#empl2').html(data);
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
//    method:"POST",public function fetch_employee_data($blanch_id)
 {
  $this->db->where('blanch_id', $blanch_id);
  $this->db->order_by('empl_id', 'ASC');
  $query = $this->db->get('tbl_employee');
  $output = '<option value="">Select staff</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->empl_id.'">'.$row->empl_name.'  </option>';
  }

  //$output .= '<option value="all">ALL</option>';
  return $output;
 }
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

