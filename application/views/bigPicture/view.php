</head>
<body>
    <?php $this->load->view('includes/menu'); ?>

    <!-- Header Section-->
    <div class="breadcrumb-holder">   
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>bigpicture">BigPicture</a></li>
                <li class="breadcrumb-item active">View BigPicture</li>
            </ul>
        </div>
    </div>
    <section class="charts">
        <div class="container-fluid">
            <header> 
                <h1 class="h3">View BigPicture</h1>
            </header>
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">                       
                        <div class="card-block">
                            <?php if (count($viewBig) > 0) { ?>
                                <table class="table table-striped table-hover">                                  
                                    <tbody>
                                        <tr>

                                            <td>Title</td>
                                            <td><?php
                                                if (isset($viewBig->title) && $viewBig->title != '') {
                                                    echo $viewBig->title;
                                                } else {
                                                    echo "N/A";
                                                }
                                                ?></td>
                                        </tr>
                                        <tr>

                                            <td>Description</td>
                                            <td><?php
                                                if (isset($viewBig->description) && $viewBig->description != '') {
                                                    echo $viewBig->description;
                                                } else {
                                                    echo "N/A";
                                                }
                                                ?></td>
                                        </tr>
                                        <tr>

                                            <td>Image</td>
                                            <td><?php
                                                if (isset($viewBig->imgUrl) && $viewBig->imgUrl != '') {
                                                     echo '<img src='.$viewBig->imgUrl.' />';
                                                } else {
                                                    echo "N/A";
                                                }
                                                ?></td>
                                        </tr>
                                         <tr>

                                            <td>Image Description</td>
                                            <td><?php
                                                if (isset($viewBig->imageDescription) && $viewBig->imageDescription != '') {
                                                     echo $viewBig->imageDescription;
                                                } else {
                                                    echo "N/A";
                                                }
                                                ?></td>
                                        </tr>
                                         <tr>

                                            <td>Posted On</td>
                                            <td><?php
                                                if (isset($viewBig->date) && $viewBig->date != '') {
                                                     echo $viewBig->date.'( yyyy/mm/d )';
                                                } else {
                                                    echo "N/A";
                                                }
                                                ?></td>
                                        </tr>

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

