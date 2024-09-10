        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                        <?php 
                        $id = $this->session->userdata('user_login_id');
                        $basicinfo = $this->employee_model->GetBasic($id); 
                        ?>                
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image ?>" alt="user" />
                        <!-- this is blinking heartbit-->
                        <!-- <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div> -->
                    </div>

                    <!-- User profile text-->
                    <div class="profile-text">
                        <h4 style="color:#FFC300"><b><?php echo $basicinfo->first_name.' '.$basicinfo->last_name; ?></b></h4>
                        <h6><?php echo $basicinfo->des_name.' - '.$basicinfo->dep_name; ?></h6>
                        <a href="<?php echo base_url(); ?>settings/Settings" class="" data-toggle="tooltip" title="Pengaturan"><i class="mdi mdi-settings"></i></a>
                        <a href="<?php echo base_url(); ?>login/logout" class="" data-toggle="tooltip" title="Keluar Aplikasi"><i class="mdi mdi-power"></i></a>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a href="<?php echo base_url(); ?>" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dasbor </span></a></li>
                        <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                        <li> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($basicinfo->em_id); ?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Employees </span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">Cuti & Libur </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>leave/Holidays"> Hari Libur </a></li>
                                <li><a href="<?php echo base_url(); ?>leave/EmApplication"> Pengajuan Cuti </a></li>
                                <li><a href="<?php echo base_url(); ?>leave/EmLeavesheet"> Leave Sheet </a></li>
                            </ul>
                        </li> 
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-briefcase-check"></i><span class="hide-menu">Proyek </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>Projects/All_Projects">Daftar Proyek </a></li>
                                <li><a href="<?php echo base_url(); ?>Projects/All_Tasks"> Daftar Tugas </a></li>
                                <!--<li><a href="<?php #echo base_url(); ?>Projects/All_Tasks"> Field Visit</a></li>-->
                            </ul>
                        </li>                                                                       
                        <?php } else { ?>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-building-o"></i><span class="hide-menu">Organisasi </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>organization/Department">Departemen </a></li>
                                <li><a href="<?php echo base_url();?>organization/Designation">Penugasan (Jabatan) </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Karyawan </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>employee/Employees">Daftar Karyawan (Aktif)</a></li>
                                <li><a href="<?php echo base_url(); ?>employee/Disciplinary">Tindakan Indisipliner</a></li>
                                <li><a href="<?php echo base_url(); ?>employee/Inactive_Employee">Daftar Karyawan (Tidak Aktif) </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Kehadiran </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>attendance/Attendance">Daftar Kehadiran </a></li>
                                <li><a href="<?php echo base_url(); ?>attendance/Save_Attendance">Tambah Kehadiran </a></li>
                                <li><a href="<?php echo base_url(); ?>attendance/Attendance_Report">Laporan Kehadiran </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-off"></i><span class="hide-menu">Cuti & Libur </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>leave/Holidays"> Hari Libur </a></li>
                                <li><a href="<?php echo base_url(); ?>leave/leavetypes"> Jenis Cuti</a></li>
                                <li><a href="<?php echo base_url(); ?>leave/Application"> Pengajuan Cuti</a></li>
                                <li><a href="<?php echo base_url(); ?>leave/Earnedleave"> Total Jam Cuti </a></li>
                                <li><a href="<?php echo base_url(); ?>leave/Leave_report"> Laporan Cuti </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-briefcase-check"></i><span class="hide-menu">Proyek </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>Projects/All_Projects">Daftar Proyek </a></li>
                                <li><a href="<?php echo base_url(); ?>Projects/All_Tasks"> Daftar Tugas </a></li>
                                <!-- <li><a href="<?php echo base_url(); ?>Projects/Field_visit"> Kunjungan Kerja</a></li> -->
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Gaji </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <!--<li><a href="<?php #echo base_url(); ?>Payroll/Salary_Type"> Payroll Type </a></li>-->
                                <li><a href="<?php echo base_url(); ?>Payroll/Salary_List"> Daftar Pembayaran Gaji </a></li>
                                <li><a href="<?php echo base_url(); ?>Payroll/Generate_salary"> Slip Gaji Karyawam</a></li>
                                <li><a href="<?php echo base_url(); ?>Payroll/Payslip_Report"> Laporan Gaji Bulanan</a></li>
                            </ul>
                        </li>
                        <!-- <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cash"></i><span class="hide-menu">Loan </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>Loan/View"> Grant Loan </a></li>
                                <li><a href="<?php echo base_url(); ?>Loan/installment"> Loan Installment</a></li>
                            </ul>
                        </li> -->
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-grid"></i><span class="hide-menu">Aset </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>Logistice/Assets_Category">Kategori Aset </a></li>
                                <li><a href="<?php echo base_url(); ?>Logistice/All_Assets">Daftar Aset </a></li>
                                <!--<li><a href="<?php #echo base_url(); ?>Logistice/View"> Logistic Support List </a></li>-->
                                <!-- <li><a href="<?php echo base_url(); ?>Logistice/logistic_support"> Logistic Support </a></li> -->
                            </ul>
                        </li>
                        
                        <li> <a href="<?php echo base_url()?>notice/All_notice" ><i class="mdi mdi-clipboard"></i><span class="hide-menu">Pengumuman <span class="hide-menu"></a></li>
                        <li> <a href="<?php echo base_url(); ?>settings/Settings" ><i class="mdi mdi-settings"></i><span class="hide-menu">Pengaturan Sistem <span class="hide-menu"></a></li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>