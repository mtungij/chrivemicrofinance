<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">

                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h7><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a><?php echo $manager_data->comp_name; ?> - <?php echo $manager_data->blanch_name; ?> </h7>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("oficer/index"); ?>"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("home_menu"); ?></li>                            
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("dashboard_menu"); ?></li>  

                        </ul>
                    </div>
                    <?php $blanch_id = $this->session->userdata('blanch_id'); ?>
                     <?php $blanch_account = $this->queries->get_Account_balance_blanch_data($blanch_id); ?>
                     <?php //print_r($blanch_account); ?>
                    <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                        <?php foreach ($blanch_account as $blanch_account): ?>
                        <div class="bh_chart hidden-xs">
                            <div class="float-left m-r-15">
                                <small><?php echo $blanch_account->account_name; ?></small>
                                <h6 class="mb-0 mt-1"><i class="icon-wallet"></i><?php echo number_format($blanch_account->blanch_capital); ?></h6>
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
                           
                        </div>
                        <?php $blanch_id = $this->session->userdata('blanch_id'); ?>
                        <?php 
                        $blanch_capital = $this->queries->get_blanch_capital_blanch($blanch_id);
                        $disburse_loan = $this->queries->get_total_loan_with($blanch_id);
                        $outstand = $this->queries->get_outstand_loanBranch($blanch_id);
                         ?>
                        <?php //print_r($blanch_capital); ?>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="body bg-success text-light">

                                        <h4><i class="icon-wallet"></i><?php echo number_format($blanch_capital->total_blanch_capital); ?></h4>
                                        <span><?php echo $this->lang->line("branch_balance_menu"); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="body bg-warning text-light">
                                        <h4><i class="icon-wallet"></i><?php echo number_format($disburse_loan->total_loanAprove); ?></h4>
                                        <span>Withdrawal loan</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="body bg-primary text-light">
                                        <h4><i class="icon-wallet"></i><?php echo number_format($disburse_loan->total_loanInt); ?></h4>
                                        <span>Principal + interest</span>
                                    </div>
                                </div>
                                 <div class="col-md-3">
                                    <div class="body bg-danger text-light">
                                        <h4><i class="icon-wallet"></i><?php echo number_format($outstand->total_outstand); ?></h4>
                                        <span><?php echo $this->lang->line("outstand_menu"); ?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div id="total_revenue" class="ct-chart m-t-20"></div> -->
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
 ?>

                
            </div>
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


           <div class="row clearfix w_social3">
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/customer"); ?>"><div class="card facebook-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/user.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color: black;"><?php echo $this->lang->line("registercustomer_menu") ?></div>
                            <!-- <div class="number">123</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/loan_application"); ?>"><div class="card instagram-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/request.jpg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;"><?php echo $this->lang->line("applyloan_menu") ?></div>
                            <!-- <div class="number">231</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/teller_dashboard") ?>"><div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/deposit.jpg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text"style="color:black;"><?php echo $this->lang->line("deposit_menu"); ?></div>
                            <!-- <div class="number">31</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/teller_dashboard") ?>"><div class="card google-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/withdrawal.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;"><?php echo $this->lang->line("withdrawal_menu"); ?></div>
                            <!-- <div class="number">254</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/daily_report"); ?>"><div class="card linkedin-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/daily.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black"><?php echo $this->lang->line("Daily_report_menu"); ?></div>
                            <!-- <div class="number">2510</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/expnses_requisition_form"); ?>"><div class="card behance-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/expenses.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black"><?php echo $this->lang->line("expenses_menu"); ?></div>
                            <!-- <div class="number">121</div> -->
                        </div>
                    </div></a>
                </div>
            </div>



            <div class="row clearfix w_social3">
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/cash_transaction"); ?>">
                        <div class="card facebook-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/transaction.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;"><?php echo $this->lang->line("transaction_menu"); ?></div>
                            <!-- <div class="number">123</div> -->
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/loan_pending_time"); ?>"><div class="card instagram-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/default.jpeg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;"><?php echo $this->lang->line("pending_menu") ?></div>
                            <!-- <div class="number">231</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/get_today_receivable"); ?>">
                        <div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/receivable.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;"><?php echo $this->lang->line("receivable_menu") ?></div>
                            <!-- <div class="number">31</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/today_received"); ?>">
                        <div class="card google-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/received.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;"><?php echo $this->lang->line("received_menu"); ?> &nbsp;&nbsp;&nbsp;</div>
                            <!-- <div class="number" style="color:green;">1,000,000,000</div> -->
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/get_loan_withdrawal_data"); ?>">
                        <div class="card linkedin-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/withdrawal.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;"><?php echo $this->lang->line("loanwithin_contract_menu"); ?></div>
                            <!-- <div class="number">2510</div> -->
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/oustand_loan"); ?>">
                        <div class="card behance-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/default.jpeg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;"><?php echo $this->lang->line("loanDefault_menu"); ?>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            <!-- <div class="number">121</div> -->
                        </div>
                    </div>
                    </a>
                </div>
            </div>

            <div class="row clearfix w_social3">
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/loan_pending"); ?>">
                        <div class="card facebook-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/aplication.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;"><?php echo $this->lang->line("loanRequest_menu"); ?></div>
                            <!-- <div class="number">123</div> -->
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/disburse_loan"); ?>">
                        <div class="card instagram-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/aproveds.jpg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black"><?php echo $this->lang->line("loanAproved_menu"); ?></div>
                            <!-- <div class="number">231</div> -->
                        </div>
                    </div>
                </a>
                </div>
               
               

                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/transfor_float_branch"); ?>"><div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/stoo.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black">Float</div>
                            <!-- <div class="number">1</div> -->
                        </div>
                    </div></a>
                </div>

                  <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/income_dashboard"); ?>">
                        <div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/income.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;"><?php echo $this->lang->line("income_menu") ?></div>
                            <!-- <div class="number">31</div> -->
                        </div>
                    </div>
                    </a>
                </div>
                

                 <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/loan_rejected"); ?>">
                        <div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/rejected.jpg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;"><?php echo $this->lang->line("rejectedloan_menu") ?></div>
                            <!-- <div class="number">31</div> -->
                        </div>
                    </div>
                    </a>
                </div>
                 <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php echo base_url("oficer/saving_deposit"); ?>">
                        <div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/saving.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Agent</div>
                            <!-- <div class="number">31</div> -->
                        </div>
                    </div>
                    </a>
                </div>
               
                
                
            </div>

           
        </div>
    </div>
    
</div>

<?php include('incs/footer.php'); ?>