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
                            <li class="breadcrumb-item active">Employee Privillage</li>
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

                <div class="col-lg-6">
                    <div class="card">
                         <div class="header">
                            <h2>Privillage List </h2>
                            <div class="pull-right">
                                <a href="<?php echo base_url("admin/all_employee"); ?>" class="btn btn-primary btn-sm"><i class="icon-logout">Back</i></a>
                            </div>    
                             </div>
                          <div class="body">
                            <div class="table-responsive">

                                
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>S/No.</th>
                                            <th>Privillage</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php $no = 1; ?>
                                       <?php foreach ($position as $positions): ?>

                                        
                                        <tr>
                                            <td><?php echo $no++; ?>.</td>
                                            <td><?php echo $positions->position; ?></td>
                                            <td><a href="<?php echo base_url("admin/add_privillage/{$positions->position_id}/{$emply->empl_id}/{$emply->comp_id}") ?>" class="btn btn-primary btn-sm"><i class="icon-pencil">Add</i></a></td>
                                          
                                        </tr>
    
                                         <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div> 



                <div class="col-lg-6">
                    <div class="card">
                         <div class="header">
                            <h2>Privillage For (<?php echo $emply->empl_name; ?>) </h2>    
                             </div>
                          <div class="body">
                            <div class="table-responsive">

                                
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>S/No.</th>
                                            <th>Privillage</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php $no = 1; ?>
                                       <?php foreach ($my_priv as $my_privs): ?>

                                        
                                        <tr>
                                            <td><?php echo $no++; ?>.</td>
                                            <td><?php echo $my_privs->position; ?></td>
                                            <td><a href="<?php echo base_url("admin/delete_priv/{$my_privs->priv_id}") ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')"><i class="icon-trash"></i></a></td>
                                          
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

<?php include('incs/footer.php'); ?>


