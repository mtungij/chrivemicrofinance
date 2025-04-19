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
                <li class="breadcrumb-item active">Customer Profile</li>
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
                
               
                
            </div>
        </div>

      

      <?php include('incs/nav_profile.php'); ?>

        <div class="tab-content padding-0">

            <div class="tab-pane active" id="Basic">
      <div class="card">
                    <div class="body">
                        <h6>Guarantors list</h6>
                        <!-- <div class="pull-right">
                            <a href="" data-toggle="modal" data-target="#addcontact2" class="btn btn-primary btn-sm"><i class="icon-plus"></i></a>
                        </div> -->
             <div class="table-responsive">
                    <table class="table table-hover js-basic-example dataTable table-custom">
                        <thead class="thead-primary">
                            <tr>
                                <th>S/No.</th>
                                <th>Full Name</th>
                                <th>Phone Number</th>
                                <th>Relationship</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($sponser as $sponsers): ?>
                            <tr>
                                <td><?php echo $no++; ?>.</td>
                                <td><?php echo $sponsers->sp_name; ?></td>
                                
                                <td><?php echo $sponsers->sp_phone_no; ?></td>
                                 <td><?php echo $sponsers->sp_relation; ?></td>
                                 
                                 <td><?php echo $sponsers->sp_district; ?></td>
                                 <td>
                                    <a href="" data-toggle="modal" data-target="#addcontact2<?php echo $sponsers->sp_id; ?>" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
                                    <!-- <a href="<?php echo base_url("admin/delete_sponser/{$sponsers->sp_id}/{$customer_id}"); ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="icon-trash"></i></a> -->
                                 </td>
                            </tr>

                    
<div class="modal fade" id="addcontact2<?php echo $sponsers->sp_id; ?>" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
    <h6 class="title" id="defaultModalLabel">Update Guarantor Information</h6>
</div>
<?php echo form_open("oficer/modify_sponser/{$sponsers->sp_id}/{$customer_id}"); ?>
<div class="modal-body">
    <div class="row clearfix">
       
        
    <div class="col-lg-6 col-6">
<span>First Name:</span>
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

<div class="col-lg-6 col-6">
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
        
    </div>
</div>
</div>
</div>

</div>

<?php include('incs/footer.php'); ?>

