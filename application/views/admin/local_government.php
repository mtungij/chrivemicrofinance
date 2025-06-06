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
                            <li class="breadcrumb-item active">Loan</li>
                            <li class="breadcrumb-item active">Localgoverment officer</li>
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
                <?php if ($local_gov == TRUE) {
            ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Local Government Information</h2>
                        </div>
                        <div class="body">
                            <?php echo form_open_multipart("admin/Update_local_govDetails/{$loan_attach->loan_id}/{$local_gov->attach_id}") ?>
                            <div class="row">
                            <div class="col-lg-6 form-group-sub">
                                    <label class="form-control-label">*Name of Officer:</label>
                            <input type="text" name="oficer" placeholder="Name of Officer" autocomplete="off" class="form-control input-sm" value="<?php echo $local_gov->oficer; ?>" required >
                                </div>
                                
                                    <div class="col-lg-6 form-group-sub">
                                    <label class="form-control-label">*Officer Phone Number:</label>
                            <input type="number" name="phone_oficer" placeholder="Officer Phone Number" autocomplete="off" class="form-control input-sm" value="<?php echo $local_gov->phone_oficer; ?>" required>
                                </div>

                        <input type="hidden" name="loan_id" value="<?php echo $loan_attach->loan_id; ?>">
                               
                                </div>
                                 <br>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="icon-drawer">Update</i></button>
                                <a href="<?php echo base_url("admin/loan_pending"); ?>" class="btn btn-primary">Finish</a>
                                </div>
                            <?php echo form_close();  ?>
                        </div>
                    </div>
                </div>

            <?php }elseif ($local_gov == FALSE) {
             ?>

             <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Local Government Information</h2>
                        </div>
                        <div class="body">
                            <?php echo form_open_multipart("admin/create_local_govDetails/{$loan_attach->loan_id}") ?>
                            <div class="row">
                            <div class="col-lg-6 form-group-sub">
                                    <label class="form-control-label">*Name of Officer:</label>
                            <input type="text" name="oficer" placeholder="Name of Officer" autocomplete="off" class="form-control input-sm"  required >
                                </div>
                                
                                    <div class="col-lg-6 form-group-sub">
                                    <label class="form-control-label">*Officer Phone Number:</label>
                            <input type="number" name="phone_oficer" placeholder="Officer Phone Number" autocomplete="off" class="form-control input-sm"  required>
                                </div>

                           <input type="hidden" name="loan_id" value="<?php echo $loan_attach->loan_id; ?>">
                               
                                </div>
                                 <br>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="icon-drawer">Submit</i></button>
                                </div>
                            <?php echo form_close();  ?>
                        </div>
                    </div>
                </div>

             <?php } ?>


             
            </div>
        </div>
    </div>
</div>

<?php include('incs/footer.php'); ?>


