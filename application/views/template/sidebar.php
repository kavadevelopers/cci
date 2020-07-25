<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
                <div class="pcoded-navigatio-lavel">Navigation</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="<?= menu(1,["dashboard"])[0]; ?>">
                        <a href="<?= base_url('dashboard') ?>">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="<?= menu(1,["todo"])[0]; ?>">
                        <a href="<?= base_url('todo') ?>">
                            <span class="pcoded-micon"><i class="feather icon-bookmark"></i></span>
                            <span class="pcoded-mtext">To-Do</span>
                        </a>
                    </li>
                </ul>
                <?php if($this->session->userdata('user_type') != "3"){ ?>

                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?= menu(1,["client"])[2]; ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-user-circle-o"></i></span>
                                <span class="pcoded-mtext">Client</span>
                             </a>   
                            <ul class="pcoded-submenu">
                                <li class="<?= menu(2,["new_clients","new_client_register"])[0]; ?>">
                                    <a href="<?= base_url('client/new_clients') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-user"></i></span>
                                        <span class="pcoded-mtext">New Client</span>
                                    </a>
                                </li>
                                <li class="<?= $this->uri->segment(2) != 'new_clients' && $this->uri->segment(2) != 'new_client_register' ?menu(1,["client"])[0]:''; ?>">
                                    <a href="<?= base_url('client') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-user-circle-o"></i></span>
                                        <span class="pcoded-mtext">Clients</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?= menu(1,["job"])[2]; ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-briefcase"></i></span>
                                <span class="pcoded-mtext">Jobs</span>
                             </a>   
                            <ul class="pcoded-submenu">
                                <li class="<?= $this->uri->segment(2) != 'work_done' && $this->uri->segment(2) != 'billed' && $this->uri->segment(2) != 'paid' ?menu(1,["job"])[0]:''; ?>">
                                    <a href="<?= base_url('job') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-user"></i></span>
                                        <span class="pcoded-mtext">Active</span>
                                    </a>
                                </li>
                                <li class="<?= menu(2,["work_done"])[0] ?>">
                                    <a href="<?= base_url('job/work_done') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-user-circle-o"></i></span>
                                        <span class="pcoded-mtext">Work Done</span>
                                    </a>
                                </li>
                                <li class="<?= menu(2,["billed"])[0] ?>">
                                    <a href="<?= base_url('job/billed') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-user-circle-o"></i></span>
                                        <span class="pcoded-mtext">Billed</span>
                                    </a>
                                </li>
                                <li class="<?= menu(2,["paid"])[0] ?>">
                                    <a href="<?= base_url('job/paid') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-user-circle-o"></i></span>
                                        <span class="pcoded-mtext">Paid</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="pcoded-item pcoded-left-item">
                        <li class="<?= menu(1,["generate_bill"])[0]; ?>">
                            <a href="<?= base_url('generate_bill') ?>">
                                <span class="pcoded-micon"><i class="fa fa-address-card"></i></span>
                                <span class="pcoded-mtext">Generate Bill</span>
                            </a>
                        </li>
                    </ul>

                    
                <?php } ?>

                <ul class="pcoded-item pcoded-left-item">
                    <li class="<?= menu(1,["invoices"])[0]; ?>">
                        <a href="<?= base_url('invoices') ?>">
                            <span class="pcoded-micon"><i class="fa fa-newspaper-o"></i></span>
                            <span class="pcoded-mtext">Invoices</span>
                        </a>
                    </li>
                </ul>

                <ul class="pcoded-item pcoded-left-item">
                    <li class="<?= menu(1,["payment"])[0]; ?>">
                        <a href="<?= base_url('payment') ?>">
                            <span class="pcoded-micon"><i class="fa fa-money"></i></span>
                            <span class="pcoded-mtext">Payment</span>
                        </a>
                    </li>
                </ul>

                <?php if($this->session->userdata('user_type') == "0"){ ?>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?= menu(1,["request"])[2]; ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-shield"></i></span>
                                <span class="pcoded-mtext">Requests</span>
                             </a>   
                            <ul class="pcoded-submenu">
                                <li class="<?= menu(2,["payment"])[0]; ?>">
                                    <a href="<?= base_url('request/payment') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-user"></i></span>
                                        <span class="pcoded-mtext">Payment</span>
                                        <span class="pcoded-badge label label-danger">
                                            <?= $this->db->order_by('date','asc')->get_where('payment',['status' => '0'])->num_rows() ?>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>

                <?php if($this->session->userdata('user_type') != "2"){ ?>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?= menu(1,["leads"])[2]; ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-tasks"></i></span>
                                <span class="pcoded-mtext">Manage Leads</span>
                             </a>   
                            <ul class="pcoded-submenu">

                                <li class="<?= $this->uri->segment(2) == '' || $this->uri->segment(2) == 'edit'?menu(1,["leads"])[0]:''; ?>">
                                    <a href="<?= base_url('leads') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Leads</span>
                                    </a>
                                </li>

                                <li class="<?= menu(2,["add_lead"])[0]; ?>">
                                    <a href="<?= base_url('leads/add_lead') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Add Lead</span>
                                    </a>
                                </li>

                                <li class="<?= menu(2,["dump_leads"])[0]; ?>">
                                    <a href="<?= base_url('leads/dump_leads') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Dump Leads</span>
                                    </a>
                                </li>
                                <li class="<?= menu(2,["converted_leads"])[0]; ?>">
                                    <a href="<?= base_url('leads/converted_leads') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Converted Leads</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>


                <?php if($this->session->userdata('user_type') == "1" || $this->session->userdata('user_type') == "3"){ ?>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?= menu(1,["followup"])[2]; ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-phone"></i></span>
                                <span class="pcoded-mtext">Follow Up</span>
                             </a>   
                            <ul class="pcoded-submenu">
                                <li class="<?= menu(2,["lead"])[0]; ?>">
                                    <a href="<?= base_url('followup/lead') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Lead</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>                    


                <?php if($this->session->userdata('user_type') == "0"){ ?>
                    <div class="pcoded-navigatio-lavel">Master's Management</div>
                <?php } ?>
                <ul class="pcoded-item pcoded-left-item">
                    <?php if($this->session->userdata('user_type') == "0"){ ?>

                        <li class="<?= menu(1,["branch"])[0]; ?>">
                            <a href="<?= base_url('branch') ?>">
                                <span class="pcoded-micon"><i class="fa fa-font-awesome"></i></span>
                                <span class="pcoded-mtext">Branch</span>
                            </a>
                        </li>

                        <li class="<?= menu(1,["company"])[0]; ?>">
                            <a href="<?= base_url('company') ?>">
                                <span class="pcoded-micon"><i class="fa fa-window-restore"></i></span>
                                <span class="pcoded-mtext">Company</span>
                            </a>
                        </li>

                        <li class="pcoded-hasmenu <?= menu(1,["user"])[2]; ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-users"></i></span>
                                <span class="pcoded-mtext">Users</span>
                             </a>   
                            <ul class="pcoded-submenu">

                                <li class="<?= menu(2,["admin","new_admin","save_admin","edit_admin","update_admin"])[0]; ?>">
                                    <a href="<?= base_url('user/admin') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Admin</span>
                                    </a>
                                </li>

                                <li class="<?= menu(2,["back_office","new_back_office","save_back_office","edit_back_office","update_back_office"])[0]; ?>">
                                    <a href="<?= base_url('user/back_office') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Back Office</span>
                                    </a>
                                </li>

                                <li class="<?= menu(2,["sales_person","new_sales_person","save_sales_person","edit_sales_person","update_sales_person"])[0]; ?>">
                                    <a href="<?= base_url('user/sales_person') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Sales Person</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    

                        <li class="pcoded-hasmenu <?= menu(1,["industry","subindustry"])[2]; ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-industry"></i></span>
                                <span class="pcoded-mtext">Industry</span>
                             </a>   
                            <ul class="pcoded-submenu">
                                
                                <li class="<?= menu(1,["industry"])[0]; ?>">
                                    <a href="<?= base_url('industry') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Manage Industry</span>
                                    </a>
                                </li>

                                <li class="<?= menu(1,["subindustry"])[0]; ?>">
                                    <a href="<?= base_url('subindustry') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Manage Sub Industry</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="pcoded-hasmenu <?= menu(1,["area"])[2]; ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-globe"></i></span>
                                <span class="pcoded-mtext">Area</span>
                             </a>   
                            <ul class="pcoded-submenu">
                                
                                <li class="<?= menu(2,["state","save_state","edit_state","update_state"])[0]; ?>">
                                    <a href="<?= base_url('area/state') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">State</span>
                                    </a>
                                </li>

                                <li class="<?= menu(2,["city","save_city","edit_city","update_state"])[0]; ?>">
                                    <a href="<?= base_url('area/city') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">City</span>
                                    </a>
                                </li>

                                <li class="<?= menu(2,["areas","save_area","edit_area","update_area"])[0]; ?>">
                                    <a href="<?= base_url('area/areas') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Area</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="<?= menu(1,["services"])[0]; ?>">
                            <a href="<?= base_url('services') ?>">
                                <span class="pcoded-micon"><i class="fa fa-cogs"></i></span>
                                <span class="pcoded-mtext">Services</span>
                            </a>
                        </li>
                        <li class="<?= menu(1,["source"])[0]; ?>">
                            <a href="<?= base_url('source') ?>">
                                <span class="pcoded-micon"><i class="fa fa-share-square"></i></span>
                                <span class="pcoded-mtext">Source</span>
                            </a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </nav>
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">