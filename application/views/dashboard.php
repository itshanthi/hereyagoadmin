</head>
<body>
    <?php $this->load->view('includes/menu'); ?>

    <!-- Header Section-->
    <div class="breadcrumb-holder">   
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">Home</li>

            </ul>
        </div>
    </div>      
    <!-- Inbox messgae Section -->
    <section class="statistics section-padding section-no-padding-bottom">
        <div class="container-fluid">
            <div class="row d-flex align-items-stretch">
                <div class="col-lg-12">
                    
              <div class="card">
                
                <div class="card-block">
                    <div class="mail-box-header">

<!--                            <form method="get" action="index.html" class="pull-right mail-search">
                                <div class="input-group">
                                    <input class="form-control input-sm" name="search" placeholder="Search email" type="text">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>-->
                            <h2>
                                Inbox (16)
                            </h2>
                            <div class="mail-tools tooltip-demo m-t-md">
<!--                                <div class="btn-group pull-right">
                                    <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                                    <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>

                                </div>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-refresh"></i> Refresh</button>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i> </button>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as important"><i class="fa fa-exclamation"></i> </button>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>-->

                            </div>
                            <br />
                        </div>
                 <?php if(count($inbox)>0) { ?>
                     <table class="table table-striped table-hover">
                    <thead>
                      <tr>                        
                        <th>User Name</th>
                        <th>Location</th>
                        <th>Mobile No.</th>
                         <th>From</th>
                          <th>To</th>
                           <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php  foreach($inbox as $key=>$row) {  
                            //echo "<pre>";print_r($row); ?>
                        <tr>                            
                            <td><?php if(isset($row->requestname) && $row->requestname != '') { echo $row->requestname; } else { echo "N/A"; } ?></td>
                            <td><?php if(isset($row->location) && $row->location != '') { echo $row->location; } else { echo "N/A"; } ?></td>
                            <td><?php if(isset($row->phonenumber) && $row->phonenumber != '') { echo $row->phonenumber; } else { echo "N/A"; } ?></td>
                            <td><?php if(isset($row->fromdate) && $row->fromdate != '') { echo $row->fromdate; } else { echo "N/A"; } ?></td>
                            <td><?php if(isset($row->todate) && $row->todate != '') { echo $row->todate; } else { echo "N/A"; } ?></td>
                            <td>
                                <?php
                                                    if ($row->status == 'Ready for shipping') {
                                                        echo '<span class="label label-default">' . $row->status . '</span>';
                                                    }
                                                    if ($row->status == 'Take Delivery') {
                                                        echo '<span class="label label-info">' . $row->status . '</span>';
                                                    }
                                                    ?>
                            </td>
                            <td>
                                <?php if ($row->status != 'Take Delivery') { ?>
                               <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $key; ?>" href="">
                                                        <i class="fa fa-edit "></i>&nbsp;Click Here
                                                    </a>
                                <?php } else { ?>
                                <a class="btn btn-info btn-sm disabled" href="">
                                                        <i class="fa fa-edit "></i>&nbsp;Click Here
                                                    </a>
                                <?php } ?>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal<?php echo $key; ?>" role="dialog">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Modal Header</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Did you want to change status to "Take Delivery"?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form method="post" action="<?php echo site_url(); ?>dashboard">
                                                                        <input type="hidden" name="shipid" value="<?php echo $key ?>" />
                                                                     <button type="submit" class="btn btn-primary">Yes</button>
                                                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">No</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                
                            </td>
                        </tr>
                                <?php }  ?>
                     
                    </tbody>
                  </table>
<!--                    <div id="pagination">
<ul class="tsc_pagination">

 Show pagination links 
<?php foreach ($links as $link) {
echo "<li>". $link."</li>";
} ?>
</div>-->
                 <?php } else { ?>
                    No messages found
                 <?php } ?>
                </div>
              </div>
            </div>


            </div>

        </div>
    </section>
    <!-- Statistics Section-->
    <section class="statistics section-padding section-no-padding-bottom">
        <div class="container-fluid">
            <div class="row d-flex align-items-stretch">
                <div class="col-lg-4">
                    <!-- User Actibity-->
                    <div class="wrapper user-activity">
                        <h2 class="display h4">Total Users</h2>                       
                        <div class=" number page-statistics"><strong><?php if(isset($totalUsers) && $totalUsers !='') { echo $totalUsers; } else { echo "0"; } ?></strong></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- User Actibity-->
                    <div class="wrapper user-activity">
                        <h2 class="display h4">Total Shared Products</h2>
                        <div class=" number page-statistics"><strong>0</strong></div>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php $this->load->view('includes/footerinner'); ?>
</div>

