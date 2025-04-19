  <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs-new">
                                <li class="nav-item"><a class="nav-link active"  href="<?php echo base_url("admin/customer_profile/{$customer_id}") ?>">Basic</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url("admin/apply_loan/{$customer_id}"); ?>">Apply loan</a></li>
                                <li class="nav-item"><a class="nav-link"  href="<?php echo base_url("admin/customer_sponser/{$customer_id}"); ?>">Guarantors </a></li>
                                <li class="nav-item"><a class="nav-link"  href="<?php echo base_url("admin/all_loans_details/{$customer_id}"); ?>">All Loans</a></li>
                                <li class="nav-item"><a class="nav-link"href="<?php echo base_url("admin/all_customer"); ?>">Back</a></li>
                            </ul>
                        </div>
                    </div>