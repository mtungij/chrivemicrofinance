<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

<div id="main-content">
<div class="container-fluid">
<div class="block-header">
<div class="row">
<div class="col-lg-6 col-md-8 col-sm-12">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url("admin/index"); ?>"><i class="icon-home"></i></a></li>                            
        <li class="breadcrumb-item active">Loan Category</li>
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
<div class="row clearfix">
<div class="col-md-12">
    
<div class="card">
    <div class="header">
        <h2>Loan Category/Product Form</h2>
    </div>
    <div class="body">
        <?php echo form_open("admin/create_loanCategory") ?>
        <div class="row">
           <div class="col-md-4">
            <div class="form-group">
                <span>Loan Product name</span>
                <input type="text" name="loan_name" autocomplete="off" class="form-control" placeholder="Enter Loan Product Name" required>
            </div>
            </div>
            <div class="col-md-2">
            <div class="form-group">
                <span>From</span>
                <input type="number" name="loan_price" autocomplete="off" class="form-control" placeholder="Eg.100000" required>
            </div>
            </div>
             <div class="col-md-2">
            <div class="form-group">
                <span>To</span>
                <input type="number" name="loan_perday" autocomplete="off" class="form-control" placeholder="Eg.1000000" required>
            </div>
            </div>
            <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
              <div class="col-md-2">
            <div class="form-group">
                <span>Laon Interest(%)</span>
                <input type="text" name="interest_formular" autocomplete="off" class="form-control" placeholder="Enter Loan Enterest(%)" required>
            </div>
            </div>
             <div class="col-md-2">
            <div class="form-group">
                <span>Restoration type</span>
                  <select type="number" name="duration" class="form-control" required class="form-control input-sm">
                <option value="">select Restoration type</option>
                <option value="1">Daily</option>
                <option value="7">Weekely</option>
                <?php 
                $month = date("m");
                 $year = date("Y");
                 $d = cal_days_in_month(CAL_GREGORIAN,$month,$year);
                 ?>
                <option value="30">Monthly</option>
            </select>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
                <span>From repayment</span>
                <input type="number" name="from_repayment" autocomplete="off" class="form-control" placeholder="Enter from Number of Repayments" required>
            </div>
            </div>
             <div class="col-md-3">
            <div class="form-group">
                <span>To repayment</span>
                <input type="number" name="to_repayment" autocomplete="off" class="form-control" placeholder="Enter to number of Repayments" required>
            </div>
            </div>
              <div class="col-md-3">
            <div class="form-group">
                <span>Interest Formular</span>
                <select type="number" name="formular" class="form-control" required>
                        <option value="">Select interest Formular</option>
                        <?php foreach ($interest_formular as $formulars): ?> 
                        <option value="<?php echo $formulars->formular_name; ?>"><?php if ($formulars->formular_name == 'SIMPLE') {
                             ?>
                             SIMPLE FORMULAR
                            <?php }elseif($formulars->formular_name == 'FLAT RATE'){ ?>
                             FLAT RATE FORMULAR
                                <?php }elseif ($formulars->formular_name == 'REDUCING') {
                                 ?>
                                 REDUCING FORMULAR
                                 <?php } ?>
                                    
                                 </option>
                        <?php endforeach; ?>
                    </select>
            </div>
            </div>
              <div class="col-md-3">
            <div class="form-group">
                <span>You allow Deduction?</span>
                <select type="text" name="deduct_fee" class="form-control" required>
                        <option value="">Select</option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
            </div>
            </div>
            <br>
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-primary"><i class="icon-drawer">Save</i></button>
            </div>
        
        <?php echo form_close();  ?>
    </div>
</div>
</div>


<div class="col-lg-12">
<div class="card">
     <div class="header">
        <h2>Loan Category/Product List </h2>    
         </div>
      <div class="body">
        <div class="table-responsive">
            <table class="table table-hover js-basic-example dataTable table-custom">
                <thead class="thead-primary">
                    <tr>
                        <th>S/No.</th>
                        <th>Loan Category/Product</th>
                        <th>Loan Level</th>
                        <th>Loan Interest</th>
                        <th>Restoration type</th>
                        <th>From no of Repayment</th>
                        <th>To no of Repayment</th>
                        <th>Interest Formular</th>
                        <th>Deduction</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($loan_category as $loan_categorys): ?>
                    <tr>
                        <td><?php echo $no++; ?>.</td>
                        <td><?php echo $loan_categorys->loan_name; ?></td>
                        <td><?php echo number_format($loan_categorys->loan_price); ?> - <?php echo  number_format($loan_categorys->loan_perday);  ?></td>
                        <td><?php echo $loan_categorys->interest_formular; ?>%</td>
                        <td><?php if ($loan_categorys->duration == '30') {
                     echo "Monthly";
                }elseif ($loan_categorys->duration == '7') {
                     echo "Weekly";
                }elseif ($loan_categorys->duration == '1') {
                    echo "Daily";
                } ?></td>
                <td><?php echo $loan_categorys->from_repayment; ?></td>
                <td><?php echo $loan_categorys->to_repayment; ?></td>
                <td>
                    <?php if ($loan_categorys->formular == 'SIMPLE') {
                             ?>
                             SIMPLE FORMULAR
                            <?php }elseif($loan_categorys->formular == 'FLAT RATE'){ ?>
                             FLAT RATE FORMULAR
                                <?php }elseif ($loan_categorys->formular == 'REDUCING') {
                                 ?>
                                 REDUCING FORMULAR
                                 <?php } ?></option>
                        
                             </td>
                             <td><?php echo $loan_categorys->deduct_fee; ?></td>
                        <td>
                        <a href="" class="btn btn-sm btn-icon btn-pure btn-primary on-default m-r-5 button-edit"
                        data-toggle="modal" data-target="#addcontact1<?php echo $loan_categorys->category_id; ?>" data-original-title="Edit"><i class="icon-pencil"></i></a>
                        <a href="<?php echo base_url("admin/delete_loancategory/{$loan_categorys->category_id}") ?>" class="btn btn-sm btn-icon btn-pure btn-danger on-default button-remove"
                        data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Are You Sure?')"><i class="icon-trash" aria-hidden="true"></i></a>
                    </td>
                    </tr>
<div class="modal fade" id="addcontact1<?php echo $loan_categorys->category_id; ?>" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h6 class="title" id="defaultModalLabel">Edit Loan Product</h6>
</div>
<?php echo form_open("admin/update_loanCategory/{$loan_categorys->category_id}"); ?>
<div class="modal-body">
<div class="row clearfix">
<div class="col-md-4">
    <span>Loan Category Name</span>
    <input type="text" class="form-control" autocomplete="off" name="loan_name" value="<?php echo $loan_categorys->loan_name; ?>">
</div>
 <div class="col-md-4">
    <span>From</span>
    <input type="number" class="form-control" autocomplete="off" name="loan_price" value="<?php echo $loan_categorys->loan_price; ?>">
</div>
 <div class="col-md-4">
    <span>To</span>
    <input type="number" class="form-control" autocomplete="off" name="loan_perday" value="<?php echo $loan_categorys->loan_perday; ?>">
</div>
 <div class="col-md-3">
    <span>Loan Interest(%)</span>
    <input type="text" class="form-control" autocomplete="off" name="interest_formular" value="<?php echo $loan_categorys->interest_formular; ?>">
</div>
<div class="col-md-3">
            <div class="form-group">
                <span>Restoration type</span>
                  <select type="number" name="duration" class="form-control" required class="form-control input-sm">
                <option value="<?php echo $loan_categorys->duration; ?>"><?php if ($loan_categorys->duration == '30') {
                     echo "Monthly";
                }elseif ($loan_categorys->duration == '7') {
                     echo "Weekly";
                }elseif ($loan_categorys->duration == '1') {
                    echo "Daily";
                } ?></option>
                <option value="1">Daily</option>
                <option value="7">Weekely</option>
                <?php 
                $month = date("m");
                 $year = date("Y");
                 $d = cal_days_in_month(CAL_GREGORIAN,$month,$year);
                 ?>
                <option value="30">Monthly</option>
            </select>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
                <span>From repayment</span>
                <input type="number" name="from_repayment" autocomplete="off" value="<?php echo $loan_categorys->from_repayment; ?>" class="form-control" placeholder="Enter from Number of Repayments" required>
            </div>
            </div>
             <div class="col-md-3">
            <div class="form-group">
                <span>To repayment</span>
                <input type="number" name="to_repayment" autocomplete="off" value="<?php echo $loan_categorys->to_repayment; ?>" class="form-control" placeholder="Enter to number of Repayments" required>
            </div>
            </div>
              <div class="col-md-6">
            <div class="form-group">
                <span>Interest Formular</span>
                <select type="number" name="formular" class="form-control" required>
                        <option value="<?php echo $loan_categorys->formular; ?>"><?php if ($loan_categorys->formular == 'SIMPLE') {
                             ?>
                             SIMPLE FORMULAR
                            <?php }elseif($loan_categorys->formular == 'FLAT RATE'){ ?>
                             FLAT RATE FORMULAR
                                <?php }elseif ($loan_categorys->formular == 'REDUCING') {
                                 ?>
                                 REDUCING FORMULAR
                                 <?php } ?></option>
                        <?php foreach ($interest_formular as $formulars): ?> 
                        <option value="<?php echo $formulars->formular_name; ?>"><?php if ($formulars->formular_name == 'SIMPLE') {
                             ?>
                             SIMPLE FORMULAR
                            <?php }elseif($formulars->formular_name == 'FLAT RATE'){ ?>
                             FLAT RATE FORMULAR
                                <?php }elseif ($formulars->formular_name == 'REDUCING') {
                                 ?>
                                 REDUCING FORMULAR
                                 <?php } ?>
                                    
                                 </option>
                        <?php endforeach; ?>
                    </select>
            </div>
           </div>
             
              <div class="col-md-6">
            <div class="form-group">
                <span>You Allow Deduction</span>
                <select type="text" name="deduct_fee" class="form-control" required>
                        <option value="<?php echo $loan_categorys->deduct_fee; ?>"><?php echo $loan_categorys->deduct_fee; ?></option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                        
                    </select>
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
</div>
</div>
</div>

<?php include('incs/footer.php'); ?>


