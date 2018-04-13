<link href="<?php echo site_url(); ?>assets/css/viewstyle.css" rel="stylesheet">
</head>
<body class="navbar-fixed sidebar-nav fixed-nav">        
    <?php $this->load->view('admin/includes/menu'); ?>
    <!-- Main content -->
    <main class="main">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-md-7"><br />
                    <h1 class="h2 page-title">View Consultant</h1>                        
                </div>                    
            </div>
        </div>
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>admin/dashboard">Home</a></li>  
             <li><a href="<?php echo site_url(); ?>admin/Consultants">Manage Consultants</a></li>  
              <li class="active">View Consultant</li> 
            <!-- Breadcrumb Menu-->

        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">                  
                <!--/row-->
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-xs-5">
                                <table class="table-fill">
                                    <thead>
                                    <!--<tr>
                                    <th class="text-left">Month</th>
                                    <th class="text-left">Sales</th>
                                    </tr>-->
                                    </thead>
                                    <tbody class="table-hover">
                                        <tr>
                                            <td class="text-left">First Name</td>
                                            <td class="text-left"><?php echo $details['fname']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Middle Name</td>
                                            <td class="text-left"><?php echo $details['mname']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Last Name</td>
                                            <td class="text-left"><?php echo $details['lname']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Email Id</td>
                                            <td class="text-left"><?php echo $details['email_id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Mobile No</td>
                                            <td class="text-left"><?php echo $details['mob_no']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Gender</td>
                                            <td class="text-left"><?php echo $details['gender']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Date Of Birth</td>
                                            <td class="text-left"><?php echo $details['dob']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Country</td>
                                            <td class="text-left"><?php echo $details['country']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">State</td>
                                            <td class="text-left"><?php echo $details['state']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">City</td>
                                            <td class="text-left"><?php echo $details['city']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Street Address</td>
                                            <td class="text-left"><?php echo $details['addr1']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Apartment/Suite</td>
                                            <td class="text-left"><?php echo $details['addr2']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Optional Address</td>
                                            <td class="text-left"><?php echo $details['addr3']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>


                    </div>
                    <!--/.card-->

                    <!--/.row-->

                    <!--/.row-->
                </div>
            </div>
            <!-- /.conainer-fluid -->
    </main>

