</head>
<body ng-app="myApp" class="navbar-fixed sidebar-nav fixed-nav" ng-controller="AppController as ctrl">  
    <?php $this->load->view('includes/menu'); ?>
    <?php
    //echo "<pre>";print_r($country);exit;
    $action = $this->uri->segment(1);
    if ($action == 'addbadges') {
        $do = TRUE;
    } elseif ($action == 'EditClient') {
        $do = FALSE;
    }
    ?>
    <!-- Main content -->
    <main class="main">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-md-7"><br />
                    <h1 class="h2 page-title">
                        <?php if ($action == 'addbadges') { ?> 
                            Add Badges
                        <?php } else { ?>
                            Edit Badges
                        <?php } ?>
                      </h1>
                </div>
            </div>
        </div>
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
             <li><a href="<?php echo site_url(); ?>">Home</a></li>  
             <?php if ($action == 'addbadges') { ?> 
                              <li class="active">Add Badges</li> 
                        <?php } else { ?>
                                <li><a href="<?php echo site_url(); ?>badges">Manage Big Picture</a></li>  
                            <li class="active">Edit Badges</li> 
                        <?php } ?>
            <!-- Breadcrumb Menu-->

        </ol>       
        <div class="container-fluid">
            <div class="animated fadeIn">

                <!--/row-->
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-xs-9">
                                <?php
                                if (isset($failmsg) && $failmsg != '') {
                                    echo '<div class="alert alert-danger"> <button class="close" data-close="alert"></button>' . $failmsg . '</div>';
                                }
                                ?>
                                <h3>Details: </h3><hr>
                                <?php
                                // Change the css classes to suit your needs

                                $attributes = array('ng-submit' => 'ctrl.submit()', 'name' => 'myForm');

                                if ($do) {//$attributes = array('class' => 'form-horizontal', 'role' => 'form','id'=>'addcountriesform');
                                    //echo form_open('admin/countries/add', $attributes);
                                    $cv_name = set_value('bdgName');                                                                      
                                    $cv_imagepicbi = set_value('imagepicbadge');

                                    $button = 'Add';
                                    echo form_open(site_url() . 'addbadges', $attributes);
                                }
                                ?>
                                <!-- name-->

                                <input type="hidden" name="id" value="<?php echo $id; ?>" />

                                <!-- name-->
                                <div class="col-xs-11">
                                    <label for="bdgName" >Badge Name <span class="required">*</span></label>
                                    <?php echo form_error('bdgName'); ?>
                                    <input id="bdgName"  ng-model="ctrl.user.bdgName"  class="form-control" type="text" name="bdgName" value="<?php echo $cv_name; ?>" required ng-minlength="3"  />
                                    <span class="error" ng-show="myForm.$dirty && myForm.bdgName.$error.required">This is a required field</span>                                      
                                </div>
                                
                                <div class="col-xs-11">
                                    <label for="imageurl" >Image Url </label>
                                    <?php echo form_error('imageurl'); ?>
                                    <input id="imageurl" ng-model="ctrl.user.imageurl" class="form-control" type="text" name="imageurl"  value="<?php echo $cv_imagepicbi; ?>" required  />

                                     <span class="error" ng-show="myForm.$dirty && myForm.imageurl.$error.required">This is a required field</span>
                                </div>
                                

                                <div class="col-xs-3"><br />
                                    <?php echo form_submit('submit', $button, 'class="btn btn-primary" ng-disabled="myForm.$invalid"'); ?>

                                </div>
                                <div class="col-xs-3">&nbsp;</div>
                                <?php echo form_close(); ?>

                            </div>

                        </div>

                    </div>
                    <!--/.card-->

                    <!--/.row-->

                    <!--/.row-->
                </div>
            </div>
        </div>
        <!-- /.conainer-fluid -->
    </main>    
  <script src="<?php echo site_url(); ?>assets/js/views/validationapp.js"></script>
  <script src="<?php echo site_url(); ?>assets/js/libs/jquery.maskedinput.min.js"></script>
    