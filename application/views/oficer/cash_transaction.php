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
                            <li class="breadcrumb-item active">Cash Transaction</li>
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
                <div class="col-lg-12">
                    <div class="card">
                         <div class="header">
                            <h2>Today Cash Transaction </h2> 
                            <div class="pull-right">
                               <a href="" data-toggle="modal" data-target="#addcontact2" class="btn btn-primary"><i class="icon-calendar">Filter</i></a>  
                            </div>   
                             </div>
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                         <th>S/No.</th>
                                        <!--  <th>Branch</th> -->
                                         <th>Employee</th>
                                        <th>Customer Name</th>
                                        <th>Deposit</th>
                                        <th>Withdrawal</th>
                                        <th>Double Amount</th>
                                        <th>Date</th>
                                        <th>Date & Time</th>
                                       <!--  <th>Action</th> -->
                                    </thead>
                                   
                                    <tbody>
                                        <?php $no = 1; ?>
                                <?php foreach ($cash_transaction as $cashs): ?>
                                              <tr>
                                    <td><?php echo $no++; ?>.</td>
                                    <!-- <td><?php //echo $cashs->blanch_name; ?></td> -->
                                    <td><?php echo $cashs->empl_name; ?></td>
                                    <td><?php echo $cashs->f_name; ?> <?php echo $cashs->m_name; ?> <?php echo $cashs->l_name; ?></td>
                                    <td>    <?php if ($cashs->depost == TRUE) {
                                         ?>
                                        <?php echo number_format($cashs->depost); ?>
                                    <?php }elseif ($cashs->depost == FALSE) {
                                     ?>
                                     -
                                     <?php } ?></td>
                                    <td>
                                        <?php if ($cashs->withdraw == TRUE) {
                                         ?>
                                        <?php echo number_format($cashs->loan_aprov); ?>
                                    <?php }elseif ($cashs->withdraw == FALSE) {
                                     ?>
                                     -
                                     <?php } ?>
                                    </td>
                                    <td><?php echo number_format($cashs->double_dep); ?></td>
                                    <td><?php echo $cashs->lecod_day; ?></td>
                                    <td><?php echo $cashs->time_rec; ?></td>
                                  <!--   <td>
                                        <?php //if ($cashs->depost == TRUE) {
                                         ?>
                                        <a href="<?php //echo base_url("admin/delete_depost_data/{$cashs->pay_id}"); ?>" class="btn btn-primary btn-sm"  onclick="return confirm('Are you sure?')" title="Adjust"><i class="icon-pencil"></i></a>
                                    <?php //}else{ ?>
                                        <?php //} ?>
                                    </td> -->
                                    </tr>

                                    <?php endforeach; ?>
                                    
                                    </tbody>
                                    <tr>
                                        <td><b>TOTAL:</b></td>
                                        <!-- <td></td> -->
                                        <td></td>
                                        <td></td>
                                        <td><b><?php echo number_format($sum_cashTransaction->total_deposit); ?></b></</td>
                                        <td><b><?php echo number_format($sum_cashTransaction->total_aprove); ?></b></td>
                                        <td><b><?php echo number_format($sum_cashTransaction->total_double); ?></b></td>
                                        <td></td>
                                        <td></td>
                                       <!--  <td></td> -->
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>CASH TRANSACTION SUMMARY</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>DEPOSIT</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php foreach ($dep_data as $dep_datas): ?> 
                                    
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b><?php echo $dep_datas->account_name; ?></b></td>
                                        <td><b><?php echo number_format($dep_datas->totalDep + $dep_datas->totalDouble); ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>AGENT TRANSACTION</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <?php foreach ($saving_deposit as $saving_deposits): ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $saving_deposits->agent; ?></td>
                                        <td><?php echo number_format($saving_deposits->amount); ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php endforeach; ?>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>TOTAL DEPOSIT & AGENT</b></td>
                                        <td><b><?php echo number_format($total_saving->total_amount_saving + $sum_cashTransaction->total_deposit + $sum_cashTransaction->total_double); ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                   

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>WITHDRAWAL</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                               <?php foreach ($loan_with as $loan_withs): ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b><?php echo $loan_withs->account_name; ?></b></td>
                                        <td><b><?php echo number_format($loan_withs->total_with); ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php endforeach; ?>
                                        <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>TOTAL LOAN WITHDRAWAL</b></td>
                                        <td><b><?php echo number_format($sum_cashTransaction->total_aprove); ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>LOAN FEE</b></td>
                                        <td><b><?php echo number_format($loan_fee->total_deducted); ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>OTHER INCOME</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php foreach ($income_other as $income_others): ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b><?php echo $income_others->inc_name; ?></b></td>
                                        <td><b><?php echo number_format($income_others->total_income); ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php endforeach; ?>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>TOTAL INCOME & LOAN FEE</b></td>
                                        <td><b><?php echo number_format($total_inc->total_income_total + $loan_fee->total_deducted); ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="color: red;"><b>EXPENSES</b></td>
                                        <td style="color: red;"><b><?php echo number_format($sum_expenses->total_expences) ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="color: green;"><b>TOTAL SALES</b></td>
                                        <td style="color: green;"><b><?php echo number_format(($total_saving->total_amount_saving + $sum_cashTransaction->total_deposit + $sum_cashTransaction->total_double+ $total_inc->total_income_total + $loan_fee->total_deducted) - ($sum_cashTransaction->total_aprove + $sum_expenses->total_expences)); ?></b></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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


 <div class="modal fade" id="addcontact2<?php //echo $employees->empl_id; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Filter Cash Transaction</h6>
            </div>
            <?php echo form_open("oficer/filter_cashTransaction"); ?>
            <div class="modal-body">
                <div class="row clearfix">

                                <div class="col-md-6 col-6 ">
                                    <?php $date = date("Y-m-d"); ?>
                                    <span>*From:</span>
                                    <input type="date" name="from" autocomplete="off" value="<?php echo $date; ?>" class="form-control" required>
                                </div>
                                <div class="col-md-6 col-6 ">
                                    <span>*To:</span>
                                    <input type="date" name="to" autocomplete="off" value="<?php echo $date; ?>" class="form-control" required>
                                </div>
                                <input type="hidden" name="blanch_id" value="<?php echo $empl_data->blanch_id; ?>">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Filter</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


