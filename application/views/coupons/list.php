</head>
<body>
    <?php $this->load->view('includes/menu'); ?>
   
      <!-- Header Section-->
       <div class="breadcrumb-holder">   
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>dashboard">Home</a></li>
            <li class="breadcrumb-item active">Coupons</li>
          </ul>
        </div>
      </div>
      <section class="charts">
        <div class="container-fluid">
          <header> 
            <h1 class="h3">Coupons</h1>
          </header>
          <div class="row">
            
            <div class="col-lg-12">
              <div class="card">
                
                <div class="card-block">
                 <?php //echo "<pre>";print_r($giftCoupons);exit; 
                 if(count($giftCoupons)>0) { ?>
                     <table class="table table-striped table-hover">
                    <thead>
                      <tr>                        
                        <th>Title Name</th>
                        <th>Category</th>
                         <th>Code</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Image</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php  foreach($giftCoupons as $key=>$row) {  
                               ?>
                        <tr>                            
                            <td><?php if(isset($row->name) && $row->name != '') { echo $row->name; } else { echo "N/A"; } ?></td>
                            <td><?php if(isset($row->catName) && $row->catName != '') { echo $row->catName; } else { echo "N/A"; } ?></td>
                            <td><?php if(isset($row->coupcode) && $row->coupcode != '') { echo $row->coupcode; } else { echo "N/A"; } ?></td>
                            <td><?php if(isset($row->startDate) && $row->startDate != '') { echo date("Y-m-d",strtotime($row->startDate)); } else { echo "N/A"; } ?></td>
                            <td><?php if(isset($row->endDate) && $row->endDate != '') { echo date("Y-m-d",strtotime($row->endDate)); } else { echo "N/A"; } ?></td>
                            <td><?php if(isset($row->imageUrl) && $row->imageUrl != '') {                                 
                                echo '<img src="'.$row->imageUrl.'" width="auto" height="auto"/>'; } else { echo "N/A"; } ?></td>
                            
                        </tr>
                                <?php  }  ?>
                     
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
    
