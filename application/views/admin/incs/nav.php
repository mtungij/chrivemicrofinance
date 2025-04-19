<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-offcanvas"><i class="icon-list"></i></button>
            </div>

            <div class="navbar-brand">
                <a href=""><img src="<?php echo base_url() ?>assets/img/mikopo.png" alt="mikoposoft Logo" class="img-responsive logo"></a>                
            </div>
            <?php 
            $comp_id = $this->session->userdata('comp_id');
            $cust = $this->queries->get_allcustomerData($comp_id);
             ?>
            
            <div class="navbar-right">
                <form id="navbar-search" class="navbar-form search-form">
                    <select type="number" class="form-control select2" required style="width: 300px;" onchange="location = this.value;">
                        <option value="">Select customer</option>
                         <?php foreach ($cust as $customers): ?>
                        <option value="<?php echo base_url("admin/customer_profile/{$customers->customer_id}") ?>"><?php echo $customers->f_name; ?> <?php echo $customers->m_name; ?> <?php echo $customers->l_name; ?> / <?php echo $customers->customer_code; ?></option>
                        <?php endforeach; ?>
                    </select>
                </form>                

                <div id="navbar-menu">

                    <ul class="nav navbar-nav">
                        <!-- <li>
                            <a href="javascript:;" class="icon-menu d-none d-sm-block d-md-none d-lg-block"><i class="icon-calendar"></i></a>
                        </li> -->
                        <!-- <li>
                            <a href="javascript:;" class="icon-menu d-none d-sm-block"><i class="icon-bubbles"></i></a>
                        </li> -->
                       <!--  <li>
                            <a href="javascript:;" class="icon-menu d-none d-sm-block"><i class="icon-envelope"></i><span class="notification-dot"></span></a>
                        </li> -->

                        <!-- <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="icon-bell"></i>
                                <span class="notification-dot"></span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li class="header"><strong>You have 4 new Notifications</strong></li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="icon-info text-warning"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text">Campaign <strong>Holiday Sale</strong> is nearly reach budget limit.</p>
                                                <span class="timestamp">10:00 AM Today</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>                               
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="icon-like text-success"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text">Your New Campaign <strong>Holiday Sale</strong> is approved.</p>
                                                <span class="timestamp">11:30 AM Today</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                 <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="icon-pie-chart text-info"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text">Website visits from Twitter is 27% higher than last week.</p>
                                                <span class="timestamp">04:00 PM Today</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="icon-info text-danger"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text">Error on website analytics configurations</p>
                                                <span class="timestamp">Yesterday</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="footer"><a href="javascript:void(0);" class="more">See all notifications</a></li>
                            </ul>
                        </li> -->
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown"><i class="icon-equalizer"></i></a>
                            <ul class="dropdown-menu user-menu menu-icon">
                                <li class="menu-heading">ACCOUNT SETTINGS</li>
                                <li><a href="<?php echo base_url("admin/setting"); ?>"><i class="icon-note"></i> <span>Basic information</span></a></li>
                                <!-- <li><a href="javascript:void(0);"><i class="icon-equalizer"></i> <span>Preferences</span></a></li> -->
                                <!-- <li><a href="javascript:void(0);"><i class="icon-lock"></i> <span>Privacy</span></a></li> -->
                                <!-- <li><a href="javascript:void(0);"><i class="icon-bell"></i> <span>Notifications</span></a></li> -->
                                <!-- <li class="menu-heading">BILLING</li> -->
                                <!-- <li><a href="javascript:void(0);"><i class="icon-credit-card"></i> <span>Payments</span></a></li> -->
                                <!-- <li><a href="javascript:void(0);"><i class="icon-printer"></i> <span>Invoices</span></a></li>                                 -->
                                <li><a href="<?php echo base_url("welcome/logout"); ?>"><i class="icon-arrow-left"></i> <span>Log out</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url("welcome/logout"); ?>" class="icon-menu"><i class="icon-logout"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>