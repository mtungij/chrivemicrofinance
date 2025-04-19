
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $compdata->comp_name; ?> | CASH TRANSACTION REPORT</title>
</head>
<body>

<div id="container">
<div style='width: 100%;align-items: center; display: flex;justify-content:space-between;flex-direction: row;'>
</div>
<style>
.pull{
text-align: center;
/*  margin-top: 100px;
margin-bottom: 0px;
margin-right: 150px;
margin-left: 80px;*/

}
</style>
<style>
.display{
display: flex;

}
</style>

    <style>
 .c {
   text-transform: uppercase;
   }
    
    </style>

<!-- <div class="pull">
<img src="<?php //echo base_url().'assets/img/'.$compdata->comp_logo ?>" style="width: 50px;height: 50px;">
<p style="font-size:14px;" class="c"> <?php //echo $compdata->comp_name; ?><br>
<?php //echo $compdata->adress; ?> <br>
<?php //$day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;">BRANCH LIST</p>
</div>  -->


<table  style="border: none">
<tr style="border: none">
<td style="border: none">


<div style="width: 20%;">
<img src="<?php echo base_url().'assets/img/'.$compdata->comp_logo ?>" style="width: 100px;height: 80px;">
</div> 

</td>
<td style="border: none">
<div class="pull">
<p style="font-size:14px;" class="c"><b> <?php echo $compdata->comp_name; ?></b><br>
<b><?php echo $compdata->adress; ?></b> <br>
<?php $day = date("d-m-Y"); ?>
</p>
<?php if ($blanch_data == FALSE) {
 ?>
 <p style="font-size:12px;text-align:center;" class="c">ALL BRANCH -CASH TRANSACTION From: <?php echo $from; ?> To: <?php echo $to; ?></p>
<?php }else{ ?>
<p style="font-size:12px;text-align:center;" class="c"><?php echo $blanch_data->blanch_name ?> -CASH TRANSACTION REPORT From: <?php echo $from; ?> To: <?php echo $to; ?></p>
<?php } ?>
</div>
</td>
</tr>
</table>

<div id="body">
<style> 
table {
font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;
}

td, th {
border: 1px solid #dddddd;
text-align: left;
padding: 2px;
}

tr:nth-child(even) {
background-color: ;
}

</style>
</head>
<body>

<hr>



 <table>
                                    <thead>
                                        <tr>
                                         <!-- <th>Branch</th> -->
                                         <th style="border: none; font-size:13px;">S/no</th>
                                         <th style="border: none; font-size:13px;">Employee</th>
                                        <th style="border: none; font-size:13px;">Customer Name</th>
                                        <th style="border: none; font-size:13px;">Deposit</th>
                                        <th style="border: none; font-size:13px;">Withdrawal</th>
                                        <th style="border: none; font-size:13px;">Double</th>
                                        <th style="border: none; font-size:13px;">Date</th>
                                        <th style="border: none; font-size:13px;">Date & Time</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php $no = 1; ?>
                                <?php foreach ($data_blanch as $blanch_customers): ?>
                                    

                                    <tr>
                                    <td style="border: none;font-size: 13px;"><?php echo $no++; ?>.</td>
                                    <td style="border: none;font-size: 13px;"><?php echo $blanch_customers->empl_name; ?></td>
                                    <td style="border: none;font-size: 13px;"><?php echo $blanch_customers->f_name; ?> <?php echo $blanch_customers->m_name; ?> <?php echo $blanch_customers->l_name; ?></td>
                                    <td style="border: none;font-size: 13px;">    <?php if ($blanch_customers->depost == TRUE) {
                                         ?>
                                        <?php echo number_format($blanch_customers->depost); ?>
                                    <?php }elseif ($blanch_customers->depost == FALSE) {
                                     ?>
                                     -
                                     <?php } ?></td>
                                    <td style="border: none;font-size: 13px;">
                                        <?php if ($blanch_customers->withdraw == TRUE) {
                                         ?>
                                        <?php echo number_format($blanch_customers->loan_aprov); ?>
                                    <?php }elseif ($blanch_customers->withdraw == FALSE) {
                                     ?>
                                     -
                                     <?php } ?>
                                    </td>
                                    <td style="border: none;font-size: 13px;"><?php echo number_format($blanch_customers->double_dep); ?></td>
                                    <td style="border: none;font-size: 13px;"><?php echo $blanch_customers->lecod_day; ?></td>
                                    <td style="border: none;font-size: 13px;"><?php echo $blanch_customers->time_rec; ?></td>
                                    </tr>


                       
                              
                                    <?php endforeach; ?>
                                    
                                    </tbody>
                                    <tr>
                                        <td style="border: none;"><b>TOTAL:</b></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"><b><?php echo number_format($total_comp_data->total_depost_com); ?></b></td>
                                        <td style="border: none;"><b><?php echo number_format($total_comp_data->total_comp_aprov); ?></b></td>
                                        <td style="border: none;"><b><?php echo number_format($total_comp_data->total_double); ?></b></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                    </tr>

                                          <tr>
                                        <td style="border: none; font-size:12px"></td>
                                        <td style="border: none; font-size:12px"></td>
                                        <td style="border: none; font-size:12px"></td>
                                        <td style="border: none; font-size:12px"></td>
                                        <td style="border: none; font-size:12px"><b>CASH TRANSACTION SUMMARY</b></td>
                                        <td style="border: none; font-size:12px"></td>
                                        <td style="border: none; font-size:12px"></td>
                                        <td style="border: none; font-size:12px"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>

                                    <tr>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"><b>DEPOSIT</b></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>
                                    <?php foreach ($dep_data as $dep_datas): ?> 
                                    
                                    <tr>
                                        <td style="border: none; font-size:12px;"></td>
                                        <td style="border: none; font-size:12px;"></td>
                                        <td style="border: none; font-size:12px;"></td>
                                        <td style="border: none; font-size:12px;"><b><?php echo $dep_datas->account_name; ?></b></td>
                                        <td style="border: none; font-size:12px;"><b><?php echo number_format($dep_datas->totalDep + $dep_datas->totalDouble); ?></b></td>
                                        <td style="border: none; font-size:12px;"></td>
                                        <td style="border: none; font-size:12px;"></td>
                                        <td style="border: none; font-size:12px;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"><b>AGENT TRANSACTION</b></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>

                                    <?php foreach ($saving_deposit as $saving_deposits): ?>
                                    <tr>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"><?php echo $saving_deposits->agent; ?></td>
                                        <td style="border:none;"><?php echo number_format($saving_deposits->amount); ?></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>
                                    <?php endforeach; ?>

                                    <tr>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"><b>TOTAL DEPOSIT & AGENT</b></td>
                                        <td style="border:none;"><b><?php echo number_format($total_saving->total_amount_saving + $total_comp_data->total_depost_com + $total_comp_data->total_double); ?></b></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>
                                   

                                    <tr>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"><b>WITHDRAWAL</b></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>
                               <?php foreach ($loan_with as $loan_withs): ?>
                                    <tr>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"><b><?php echo $loan_withs->account_name; ?></b></td>
                                        <td style="border:none;"><b><?php echo number_format($loan_withs->total_with); ?></b></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>
                                    <?php endforeach; ?>
                                        <tr>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"><b>TOTAL LOAN WITHDRAWAL</b></td>
                                        <td style="border:none;"><b><?php echo number_format($total_comp_data->total_comp_aprov); ?></b></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>
                                    <tr>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"><b>LOAN FEE</b></td>
                                        <td style="border:none;"><b><?php echo number_format($loan_fee->total_deducted); ?></b></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>
                                    <tr>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"><b>OTHER INCOME</b></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>
                                    <?php foreach ($income_other as $income_others): ?>
                                    <tr>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"><b><?php echo $income_others->inc_name; ?></b></td>
                                        <td style="border:none;"><b><?php echo number_format($income_others->total_income); ?></b></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>
                                    <?php endforeach; ?>

                                    <tr>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"><b>TOTAL INCOME & LOAN FEE</b></td>
                                        <td style="border:none;"><b><?php echo number_format($total_inc->total_income_total + $loan_fee->total_deducted); ?></b></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>

                                    <tr>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="color: red; border:none;"><b>EXPENSES</b></td>
                                        <td style="color: red; border:none;"><b><?php echo number_format($sum_expenses->total_expences) ?></b></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>
                                    <tr>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="color: green; border:none;"><b>TOTAL SALES</b></td>
                                        <td style="color: green; border: :none"><b><?php echo number_format(($total_saving->total_amount_saving + $total_comp_data->total_depost_com + $total_comp_data->total_double + $total_inc->total_income_total + $loan_fee->total_deducted) - ($total_comp_data->total_comp_aprov + $sum_expenses->total_expences)); ?></b></b></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                    </tr>
                                </table>
</div>

</div>

</body>
</html>




