<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/md5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/firebase.js"></script>
<script>
    var siteurl = '<?php echo base_url(); ?>';
    var config = {
        apiKey: "AIzaSyAr9i8R5alIdwttfUYPFhrqvIYTYlaI4fk",
        authDomain: "hereyago-d6632.firebaseapp.com",
        databaseURL: "https://hereyago-d6632.firebaseio.com",
        projectId: "hereyago-d6632",
        storageBucket: "hereyago-d6632.appspot.com",
        messagingSenderId: "866015408773"
    };
    firebase.initializeApp(config);
    var database = firebase.database();
    function removeBigPicData(key, path) {
        if (confirm('Are You sure want to Delete?')) {
            removeRecord(key, path);
        }
    }

    function removeRecord(key, path) {//alert(path);
        $('.alert').hide();
        $('#infoMsgHolder').show();      
        database.ref('BigPicture/' + key).remove().then(function (snapshot) {
            removeFile(path);
        }, function (error) {
            $('#danMsgHolder').show();
            $('#danMsgHolder').html('<strong>Error occurred while Deleting Data from Database...</strong>' + error);
            $('#infoMsgHolder').hide();
        });
    }

    function removeFile(logoPath) {
        var fileRef = firebase.storage().ref().child(logoPath);

        fileRef.delete().then(function () {
            $('#sucMsgHolder').show();
            $('#sucMsgHolder').html('<strong>Data and File Deleted successfully...</strong>');
            window.location = siteurl+'bigpicture';
        }).catch(function () {
            $('#danMsgHolder').show();
            $('#danMsgHolder').html('<strong>Error occurred while Deleting File from Storage...</strong>' + error);
            $('#infoMsgHolder').hide();
        });
    }
</script>
</head>
<body>
    <?php $this->load->view('includes/menu'); ?>

    <!-- Header Section-->
    <div class="breadcrumb-holder">   
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>dashboard">Home</a></li>
                <li class="breadcrumb-item active">BigPicture</li>
            </ul>
        </div>
    </div>
    <section class="charts">
        <div class="container-fluid">
            <header> 
                <h1 class="h3">BigPicture</h1>
            </header>
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">                       
                        <div class="card-block">
                            <?php if (count($bigpict) > 0) { ?>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Local/Global</th>                                           
                                            <th>Description</th>                                          
                                            <th>Actions</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //echo "<pre>";print_r($bigpict); exit;
                                        foreach ($bigpict as $key => $row) {
                                            if (isset($row->id) && $row->id != '') {//echo "<pre>";print_r($row); 
                                                ?>
                                                <tr>                                                  

                                                    <td><?php
                                                        if (isset($row->title) && $row->title != '') {
                                                            echo $row->title;
                                                        } else {
                                                            echo "N/A";
                                                        }
                                                        ?></td>
                                                    <td><?php
                                                        if (isset($row->localOrGlobal) && $row->localOrGlobal != '') {
                                                            echo $row->localOrGlobal;
                                                        } else {
                                                            echo "N/A";
                                                        }
                                                        ?></td>
                                                    <td><?php
                                                        if (isset($row->description) && $row->description != '') {
                                                            echo $row->description;
                                                        } else {
                                                            echo "N/A";
                                                        }
                                                        ?></td>  
                                                    <td>
                                                            <?php if (isset($row->id) && $row->id != '') { ?>
                                                            <a class="btn btn-success btn-sm"  href="<?php echo site_url(); ?>viewBigPic/<?php echo $key; ?>">                                    
                                                                <?php } else { ?>
                                                                <a class="btn btn-success btn-sm">   
            <?php } ?>
                                                                <i class="fa fa-search-plus "></i>
                                                            </a>
                                                                <?php if (isset($row->id) && $row->id != '') { ?>
                                                                <a class="btn btn-info btn-sm" href="<?php echo site_url(); ?>editBigPic/<?php echo $key; ?>">
                                                                    <?php } else { ?>
                                                                    <a class="btn btn-info btn-sm">   
            <?php } ?>
                                                                    <i class="fa fa-edit "></i>
                                                                </a>
                                                                    <button onclick='removeBigPicData(<?php echo '"'.$key.'","'.$row->logoPath.'"'; ?>)' type="button" class="btn btn-danger btn-sm">  <i class="fa fa-trash-o "></i></button>                                                                   

                                                                    </td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                            }
                                                            ?>

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

