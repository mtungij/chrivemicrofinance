<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>
<?php $comp_id = $this->session->userdata('comp_id'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">

                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a><?php echo $_SESSION['comp_name']; ?> / <?php echo $blanch_data->blanch_name; ?></h2>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("admin/index"); ?>"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("dashboard_menu"); ?></li>  

                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                        <?php foreach ($account_capital as $account_capitals): ?>
                        <div class="bh_chart hidden-xs">
                            <div class="float-left m-r-15">
                                <small><?php echo $account_capitals->account_name; ?></small>
                                <h6 class="mb-0 mt-1"><i class="icon-wallet"></i><?php echo number_format($account_capitals->blanch_capital); ?></h6>
                            </div>
                            
                        </div>
                       <?php endforeach; ?>
                       
                    </div>
                </div>
            </div>
           <?php if ($das = $this->session->flashdata('massage')): ?> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                                <div class="alert alert-dismisible alert-success"> <a href="" class="close">&times;</a> <?php echo $das;?> </div> 
                            </div> 
                        </div> 
                    <?php endif; ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $this->lang->line("revenue_menu"); ?></h2>
                            <ul class="header-dropdown">
                                <a href="" class="btn btn-sm btn-secondary"
                            data-toggle="modal" data-target="#addcontact2" data-original-title="Edit"><i class="icon-list"></i>Branch`s</a>
                                
                                
                                
                            </ul>

                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="body bg-success text-light">
                                        <h4><i class="icon-wallet"></i><?php echo number_format($blanch_balance->blanch_balance); ?></h4>
                                        <span>Branch Account</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="body bg-warning text-light">
                                        <h4><i class="icon-wallet"></i><?php echo number_format($disbursed->total_disbursed); ?></h4>
                                        <span>Withdrawal Loan</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="body bg-primary text-light">
                                        <h4><i class="icon-wallet"></i><?php echo number_format($disbursed->total_with); ?></h4>
                                        <span>Principal + interest</span>
                                    </div>
                                </div>
                                 <div class="col-md-3">

                                <?php $loan_out = $this->queries->get_total_outStand_blanch_datas($blanch_id); ?>
                                <?php //print_r($loan_out); ?>
                                    <div class="body bg-danger text-light">
                                        <h4><i class="icon-wallet"></i> <?php echo number_format($loan_out->total_remain); ?></h4>
                                        <span>Default Loan</span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div id="total_revenue" class="ct-chart m-t-20"></div> -->
                        </div>
                    </div>
                </div>
            </div>


<?php 
$total_male = $this->db->query("SELECT * FROM tbl_customer WHERE gender = 'MALE' AND blanch_id = '$blanch_id'");
$total_female = $this->db->query("SELECT * FROM tbl_customer WHERE gender = 'FEMALE' AND blanch_id = '$blanch_id'");
$employee = $this->db->query("SELECT * FROM tbl_employee WHERE blanch_id = '$blanch_id'");

$daily_deposit = $this->queries->get_deposi_category_daily_blanch($blanch_id);
$weekly_deposit = $this->queries->get_deposi_category_weekly_blanch($blanch_id);
$monthly_deposit = $this->queries->get_deposi_category_monthly_blanch($blanch_id);

$agent = $this->queries->get_total_miamala_blanch($blanch_id);

$with_daily = $this->queries->get_daily_withdrawal_blanch($blanch_id);
$weekly_with = $this->queries->get_weekly_withdrawal_blanch($blanch_id);
$monthly_with = $this->queries->get_monthly_withdrawal_blanch($blanch_id);

$faini = $this->queries->get_faini_data_blanch($blanch_id);
$loan_fee = $this->queries->get_total_deducted_income_blanch($blanch_id);
$expenses = $this->queries->get_sum_expences_blanch($blanch_id);


$loan_pending = $this->queries->get_total_pend_loan_company($comp_id);
$receivable = $this->queries->get_total_recevable($comp_id);
$received = $this->queries->get_sumReceived_amount($comp_id);
$with_today = $this->queries->get_today_loan_withdrawal_loan($comp_id);

$loan_request = $this->db->query("SELECT * FROM tbl_loans WHERE comp_id = '$comp_id' AND loan_status = 'open'");
$aproved = $this->db->query("SELECT * FROM tbl_loans WHERE comp_id = '$comp_id' AND loan_status = 'disbarsed'");
$rejected = $this->db->query("SELECT * FROM tbl_loans WHERE comp_id = '$comp_id' AND loan_status = 'reject'");
$saving_remain = $this->queries->get_total_miamala_total($comp_id);
  //print_r($saving_remain);



 ?>
   


<div class="row clearfix">
 <div class="col-md-12 col-12">
   <div class="card">
       <!--  <div class="header">
            <h2>All Customer & Employee</h2>
        </div> -->
        <div class="body">
             <div class="table-responsive">
            <table class="table table-bordered -basic-example dataTable table-custom">
                <tbody>
                    <tr style="background-color: #dddddd">
                        <th class="c">Customer & Staff</th>
                        <th class="c">Today Deposit</th>
                        <th class="c">Today withdrawal</th>
                        <th class="c">Today Income</th>
                        <th class="c">Today Expenses</th>
                        
                    </tr>
                    <tr>
                       <td>Male <span class="badge badge-success"><?php echo $total_male->num_rows(); ?></span></td> 
                       <td>Monthly Deposit <span class="badge badge-success"><?php echo number_format($monthly_deposit->total_monthly); ?></span></td> 
                       <td>Monthly Withdrawal <span class="badge badge-success"><?php echo number_format($monthly_with->withdrawal_monthly); ?></span></td> 
                       <td>Penarty <span class="badge badge-success"><?php echo number_format($faini->total_faini); ?></span></td> 
                       <td>Expenses <span class="badge badge-danger"><?php echo number_format($expenses->total_expences); ?></span></td> 
                    </tr>

                    <tr>
                       <td>Female <span class="badge badge-success"><?php echo $total_female->num_rows(); ?></span></td> 
                       <td>Weekly Deposit <span class="badge badge-success"><?php echo number_format($weekly_deposit->total_weekly);  ?></span></td> 
                       <td>Weekly Withdrawal <span class="badge badge-success"><?php echo number_format($weekly_with->withdrawal_weekly); ?></span></td> 
                       <td>Loan fee <span class="badge badge-success"><?php echo number_format($loan_fee->total_deducted); ?></span></td> 
                       <td>-</td> 
                    </tr>

                     <tr>
                       <td>Staff <span class="badge badge-success"><?php echo $employee->num_rows(); ?></span></td> 
                       <td>Daily Deposit <span class="badge badge-success"><?php echo number_format($daily_deposit->total_daily); ?></span></td> 
                       <td>Daily Withdrawal <span class="badge badge-success"><?php echo number_format($with_daily->withdrawal_daily); ?></span></td> 
                       <td>Capital<span class="badge badge-success"><?php  //echo number_format($trans_cap->total_trans_amount + $total_charger->total_trans); ?></td> 
                       <td>-</td> 
                    </tr>

                        
                    <tr>
                        <td>-</td>
                        <td>Agent <span class="badge badge-success"><?php echo number_format($agent->total_amount_saving); ?></span></td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</span></td>
                    </tr>

                    <tr style="background-color: #ddddd4">
                       <th>All customer: <?php echo $total_male->num_rows() + $total_female->num_rows(); ?> ,Staff : <?php echo $employee->num_rows(); ?></th> 
                       <th>Total: <?php echo number_format($monthly_deposit->total_monthly + $weekly_deposit->total_weekly + $daily_deposit->total_daily + $agent->total_amount_saving); ?> </th> 
                       <th>Total: <?php echo number_format($weekly_with->withdrawal_weekly + $with_daily->withdrawal_daily + $monthly_with->withdrawal_monthly); ?> </th> 
                       <th>Total : <?php echo number_format($loan_fee->total_deducted + $faini->total_faini); ?> </th> 
                       <th>Total: <?php echo number_format($expenses->total_expences); ?> </th> 
                    </tr>
                                                 
                </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>


    </div>
    </div>
    
</div>

<?php include('incs/footer.php'); ?>



<div class="modal fade" id="addcontact2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #01b2c6;color: white;">
                <h6 class="title" id="defaultModalLabel">Branch List</h6>
            </div>
            <div class="modal-body">
                         <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover j-basic-example dataTable table-custom">
                                    <thead class="thead-secondary">
                                        <tr>
                                            <!-- <th>S/No.</th> -->
                                            <th>Branch Name</th>
                                            <th>Balance</th>
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                              <?php $no = 1; ?>
                                    <?php foreach ($blanch_capital as $blanchs): ?>
                                     
                                              <tr>
                                    <!-- <td><?php //echo $no++; ?>.</td> -->
                                    <td class="c" style="font-size:15px"><a href="<?php echo base_url("admin/view_blanch_panel/{$blanchs->blanch_id}"); ?>"><?php echo $blanchs->blanch_name; ?></a></td>
                                    <td><?php echo number_format($blanchs->total_balance); ?></td>
                                                                                                                     
                                    </tr>
  
                                         <?php endforeach; ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div> 
                
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-close"></i></button>
            </div>
           
        </div>
    </div>
</div>