</head>
<body>
    <?php $this->load->view('includes/menu'); ?>

    <!-- Header Section-->
    <div class="breadcrumb-holder">   
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>dashboard">Home</a></li>
                <li class="breadcrumb-item active">Runner</li>
            </ul>
        </div>
    </div>
    <section class="charts">
        <div class="container-fluid">
            <header> 
                <h1 class="h3">Runner</h1>
            </header>
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-block">
                            <?php //echo "<pre>";print_r($giftCoupons);exit; 
                            if (count($runnerusers) > 0) {
                                ?>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>                        
                                            <th>First Name</th>
                                            <th>Email Id</th>
                                            <th>Phone</th>
                                            <th>DOB</th>
                                            <th>Zip Code</th>
                                             <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($runnerusers as $key => $row) {
                                            ?>
                                            <tr>                            
                                                <td><?php if (isset($row->fName) && $row->fName != '') {
                                                echo $row->fName;
                                            } else {
                                                echo "N/A";
                                            } ?></td>
                                                <td><?php if (isset($row->emailId) && $row->emailId != '') {
                                                echo $row->emailId;
                                            } else {
                                                echo "N/A";
                                            } ?></td>
                                                <td><?php if (isset($row->phone) && $row->phone != '') {
                                                echo $row->phone;
                                            } else {
                                                echo "N/A";
                                            } ?></td>                                               
                                                <td><?php if (isset($row->dob) && $row->dob != '') {
                                        echo $row->dob;
                                    } else {
                                        echo "N/A";
                                    } ?></td>
                                                <td><?php if (isset($row->zipcode) && $row->zipcode != '') {
                                        echo $row->zipcode;
                                    } else {
                                        echo "N/A";
                                    } ?></td>
                                                  <td><?php if ($row->step1 == '1') {
                                                echo "step1";
                                            } elseif ($row->step1 == '2') {
                                                echo "step2";
                                            } elseif ($row->step1 == '3') {
                                                echo "Active";
                                            } ?></td>
                                                <td>
                                                    <a class="btn btn-success btn-sm"  href="">
                                                        <i class="fa fa-search-plus "></i>
                                                    </a>
                                                    <a class="btn btn-info btn-sm" href="">
                                                        <i class="fa fa-edit "></i>
                                                    </a>
                                                    <a class="btn btn-info btn-sm" href="">
                                                        <i class="fa fa-trash "></i>
                                                    </a>
                                                </td>

                                            </tr>
    <?php } ?>

                                    </tbody>
                                </table>
<?php } else { ?>
                                No Records found
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Updates Section -->

<?php $this->load->view('includes/footerinner'); ?>
</div>

