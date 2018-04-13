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
function uploadData() {
    var date = new Date(),
            month = date.getMonth() + 1,
            day = date.getDate(),
            currentDate = date.getFullYear() + '/' + (('' + month).length < 2 ? '0' : '') + month + '/' + (('' + day).length < 2 ? '0' : '') + day + ' ' + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds() + " " + date.getMilliseconds();

    $('.alert').hide();
    $('#infoMsg').show();

    var bigPicId = $('#bigPicId').val();

    if (bigPicId === '') {
        $('#titleHolder').html('Add Big Picture Detail');
        var localOrGlobal = $("input[name='localOrGlobal']:checked").val(),
                bigPicTitle = $('#bpTitle').val(),
                bigPicDescription = $('#bpDescription').val(),
                bigPicImgDescription = $('#bpImgDesc').val(),
                logoData = $("#logoData")[0].files[0],
                idVal = md5(currentDate),
                ext = logoData.name.split('.').pop(),
                logoPath = '/BigPictureLogos/' + localOrGlobal + '/' + idVal + '.' + ext,
                fileRef,
                uploadFile,
                logoUrl;

        /* Upload Image to Storage */
        fileRef = firebase.storage().ref(logoPath);
        fileRef.put(logoData).then(function (snapshot) {

            fileRef.getDownloadURL().then(function (url) {
                logoUrl = url;
                database.ref('BigPicture').push({
                    id: idVal,
                    localOrGlobal: localOrGlobal,
                    title: bigPicTitle,
                    description: bigPicDescription,
                    imageDescription: bigPicImgDescription,
                    date: currentDate,
                    logoPath: logoPath,
                    imgUrl: logoUrl
                }).then(function (snapshot) {

                    $('#sucMsg').show();
                    $('#sucMsg').html('<strong>Datas and File uploaded successfully...</strong>');
                    document.getElementById("bigPictureForm").reset();
                    $('#infoMsg').hide();
                     window.location = siteurl+'bigpicture';

                }, function (error) {
                    $('#danMsg').show();
                    $('#danMsg').html('<strong>Error occurred while storing Data to Database...</strong>' + error);
                    $('#infoMsg').hide();
                });
            });

        }, function (error) {
            // The callback failed.
            $('#danMsg').show();
            $('#danMsg').html('<strong>Error occurred while uploading file to storage...</strong>' + error);
            $('#infoMsg').hide();
        });
    } else {

        /* Edit Operation */
        $('#titleHolder').html('Edit Big Picture Detail');
        var localOrGlobal = $("input[name='localOrGlobal']:checked").val(),
                bigPicKey = $('#bigPicKey').val();
        bigPicTitle = $('#bpTitle').val(),
                bigPicDescription = $('#bpDescription').val(),
                bigPicImgDescription = $('#bpImgDesc').val(),
                idVal = md5(currentDate);

        database.ref('BigPicture/' + bigPicKey).update({
            localOrGlobal: localOrGlobal,
            title: bigPicTitle,
            description: bigPicDescription,
            imageDescription: bigPicImgDescription,
            date: currentDate,
            id: idVal
        }).then(function (snapshot) {

            if ($("#logoData")[0].files[0]) {
                var logoData = $("#logoData")[0].files[0],
                        ext = logoData.name.split('.').pop(),
                        logoPath = '/BigPictureLogos/' + localOrGlobal + '/' + idVal + '.' + ext,
                        fileRef,
                        uploadFile,
                        logoUrl;

                /* Upload Image to Storage */
                fileRef = firebase.storage().ref(logoPath);
                fileRef.put(logoData).then(function (snapshot) {

                    fileRef.getDownloadURL().then(function (url) {
                        logoUrl = url;
                        database.ref('BigPicture/' + bigPicKey).update({
                            logoPath: logoPath,
                            imgUrl: logoUrl
                        }).then(function (snapshot) {

                            $('#sucMsg').show();
                            $('#sucMsg').html('<strong>Datas and File uploaded successfully...</strong>');
                           
                            
                        }, function (error) {
                            $('#danMsg').show();
                            $('#danMsg').html('<strong>Error occurred while storing Data to Database...</strong>' + error);
                            $('#infoMsg').hide();
                        });
                    });

                }, function (error) {
                    // The callback failed.
                    $('#danMsg').show();
                    $('#danMsg').html('<strong>Error occurred while uploading file to storage...</strong>' + error);
                    $('#infoMsg').hide();
                });
            } else {
                $('#sucMsg').show();
                $('#sucMsg').html('<strong>Datas uploaded successfully...</strong>');
                document.getElementById("bigPictureForm").reset();
                $('#infoMsg').hide();
              
            }

        }, function (error) {
            $('#danMsg').show();
            $('#danMsg').html('<strong>Error occurred while storing Data to Database...</strong>' + error);
            $('#infoMsg').hide();
        });
        window.location = siteurl+'bigpicture';

    }
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
                <?php if ($this->uri->segment(2) == '') { ?>
                    <li class="breadcrumb-item active">Add BigPicture</li>
                <?php } else { ?>
                      <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>bigpicture">BigPicture</a></li>
                <li class="breadcrumb-item active">Edit BigPicture</li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <section class="charts">
        <div class="container-fluid">
            <header> 
                 <?php if ($this->uri->segment(2) == '') { ?>
                <h1 class="h3">Add BigPicture</h1>
                 <?php } else { ?>
                 <h1 class="h3">Edit BigPicture</h1>
                 <?php } ?>
            </header>
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">                       
                        <div class="card-block">
                            <div id="msgHolder" class="modal" style="display:none;height:50px;">
                                <div id="sucMsgHolder" class="alert alert-success hideDiv">
                                    <strong>Success!</strong> Indicates a successful or positive action.
                                </div>
                                <div id="infoMsgHolder" class="alert alert-info hideDiv">
                                    <strong>Please wait... Processing your Request</strong>
                                </div>
                                <div id="warnMsgHolder" class="alert alert-warning hideDiv">
                                    <strong>Warning!</strong> Indicates a warning that might need attention.
                                </div>
                                <div id="danMsgHolder" class="alert alert-danger hideDiv">
                                    <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                                </div>
                                <div id="sucMsg" class="alert alert-success hideDiv">
                                    <strong>Success!</strong> Indicates a successful or positive action.
                                </div>
                                <div id="infoMsg" class="alert alert-info hideDiv">
                                    <strong>Please wait... Processing your Request</strong>
                                </div>
                                <div id="warnMsg" class="alert alert-warning hideDiv">
                                    <strong>Warning!</strong> Indicates a warning that might need attention.
                                </div>
                                <div id="danMsg" class="alert alert-danger hideDiv">
                                    <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                                </div>
                            </div>
                            <form id="bigPictureForm" class="margin-bottom-40" role="form">
                                <input type="hidden" readonly id="bigPicId" value="<?php if(isset($viewBig->id) && $viewBig->id != ''){ echo $viewBig->id; } else { echo '';} ?>" />
                                <input type="hidden" readonly id="bigPicKey" value="<?php if($this->uri->segment(2) != ''){ echo $this->uri->segment(2); } else { echo '';} ?>" />
                                <div class="checkbox">
                                    <label for="localRadio">
                                        <input id="localRadio" type="radio" name="localOrGlobal"<?php if(isset($viewBig->localOrGlobal) && $viewBig->localOrGlobal == 'local'){ echo "checked"; }else { echo "checked"; } ?>  value="local"> Local									
                                    </label>
                                    <label for="globalRadio">
                                        <input id="globalRadio" type="radio" name="localOrGlobal" <?php if(isset($viewBig->localOrGlobal) && $viewBig->localOrGlobal == 'global'){ echo "checked"; }else { echo ""; } ?> value="global"> Global									
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="bpTitle">Title</label>
                                    <input type="text" class="form-control" id="bpTitle" placeholder="Enter Title" value="<?php if(isset($viewBig->title) && $viewBig->title != ''){ echo $viewBig->title; } else { echo '';} ?>">
                                </div>
                                <div class="form-group">
                                    <label for="bpDescription">Description</label>
                                    <input type="text" class="form-control" id="bpDescription" placeholder="Enter Description" value="<?php if(isset($viewBig->description) && $viewBig->description != ''){ echo $viewBig->description; } else { echo '';} ?>">
                                </div>
                                <div class="form-group">
                                    <label for="logoData">Upload Image</label>
                                    <input type="file" class="form-control" id="logoData" placeholder="Password">
                                </div>							
                                <div class="form-group">
                                    <label for="bpImgDesc">Image Description</label>
                                    <input type="text" class="form-control" id="bpImgDesc" placeholder="Enter Image Description" value="<?php if(isset($viewBig->imageDescription) && $viewBig->imageDescription != ''){ echo $viewBig->imageDescription; } else { echo '';} ?>">
                                </div>
                                <!-- <div class="checkbox">
                                        <label>
                                                <input type="checkbox"> Check me out
                                        </label>
                                </div> -->
                                <button type="button" onclick="uploadData()" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Updates Section -->

    <?php $this->load->view('includes/footerinner'); ?>
</div>

