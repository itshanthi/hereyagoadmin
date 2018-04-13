</head>
<body>
    <?php $this->load->view('includes/menu'); ?>
   
      <!-- Header Section-->
       <div class="breadcrumb-holder">   
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>dashboard">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ul>
        </div>
      </div>
      <section class="charts">
        <div class="container-fluid">
          <header> 
            <h1 class="h3">Users</h1>
          </header>
          <div class="row">
            
            <div class="col-lg-12">
              <div class="card">
                
                <div class="card-block">
                 <?php if(count($users)>0) { ?>
                     <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Nick Name</th>
                        <th>Username</th>
<!--                        <th>Actions</th>-->
                      </tr>
                    </thead>
                    <tbody>
                     <?php  foreach($users as $key=>$row) {  
                                if(isset($row->id) && $row->id != '') {//echo "<pre>";print_r($row); ?>
                        <tr>
                            <th scope="row"><?php echo $key+1; ?></th>
                            <td><?php if(isset($row->userName) && $row->userName != '') { echo $row->userName; } else { echo "N/A"; } ?></td>
                            <td><?php if(isset($row->userNickName) && $row->userNickName != '') { echo $row->userNickName; } else { echo "N/A"; } ?></td>
                            <td><?php if(isset($row->userEmail) && $row->userEmail != '') { echo $row->userEmail; } else { echo "N/A"; } ?></td>
<!--                            <td>
                                <?php //if(isset($row->id) && $row->id != '') { ?>
                                    <a class="btn btn-success btn-sm"  href="<?php echo site_url(); ?>viewUsers/<?php echo $row->id; ?>">                                    
                                <?php //}else { ?>
                                    <a class="btn btn-success btn-sm">   
                                <?php //} ?>
                                    <i class="fa fa-search-plus "></i>
                                </a>
                                <?php //if(isset($row->id) && $row->id != '') { ?>
                                    <a class="btn btn-info btn-sm" href="<?php echo site_url(); ?>editUsers/">
                                <?php //}else { ?>
                                    <a class="btn btn-info btn-sm">   
                               <?php //} ?>
                                    <i class="fa fa-edit "></i>
                                </a>
                                    <?php //if(isset($row->id) && $row->id != '') { ?>
                                <a class="btn btn-danger btn-sm" href="<?php echo site_url(); ?>deleteUsers/">
                                     <?php //}else { ?>
                                     <a class="btn btn-danger btn-sm">   
                                <?php//} ?>
                                    <i class="fa fa-trash-o "></i>
                                </a>
                                
                            </td>-->
                        </tr>
                                <?php } }  ?>
                     
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
    
