<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/md5.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css" >
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.the-modal.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/the-modal.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/demo-modals.css" media="all">
<script src="<?php echo base_url(); ?>assets/js/firebase.js"></script>
<script>
// Initialize Firebase
var AUTHKEY = '<?php echo AUTHKEY; ?>';
var URL = '<?php echo URL; ?>';
var config = {
    apiKey: AUTHKEY,
    authDomain: "hereyago-d6632.firebaseapp.com",
    databaseURL: URL,
    projectId: "hereyago-d6632",
    storageBucket: "hereyago-d6632.appspot.com",
    messagingSenderId: "866015408773"
};
firebase.initializeApp(config);

// Initialize Firebase
/*var config = {
 apiKey: "AIzaSyA7f1yJdfo5-CjWOz6JNCotCM9r9quDR4k",
 authDomain: "testproject-24989.firebaseapp.com",
 databaseURL: "https://testproject-24989.firebaseio.com",
 projectId: "testproject-24989",
 storageBucket: "testproject-24989.appspot.com",
 messagingSenderId: "868442633849"
 };
 firebase.initializeApp(config);*/

</script>
<script>
    var database = firebase.database();

    listBigPictureData();

    function listBigPictureData() {
        var sNo = 1,
                jsonKey,
                jsonData,
                htmlContent;
        $('#bigPictureListTable tbody').html('');
        database.ref('BigPicture').on("child_added", function (snapshot) {
            jsonKey = snapshot.key;
            jsonData = snapshot.val();
            // alert(jsonData);
            htmlContent = '<tr><td scope="row vert-align" >' + (sNo++) + '</td><td>' + jsonData.localOrGlobal + '</td><td>' + jsonData.title + '</td><td>' + jsonData.description + '</td><td>' + jsonData.imageDescription + '</td><td> <img src=' + jsonData.imgUrl + ' onerror="this.src=\'noImageFound.jpg\'" width=100px /></td><td><button onclick="getRecodData(\'' + jsonData.id + '\',\'' + jsonKey + '\')" type="button" class="btn btn-info btn-xs "> Edit <span class="glyphicon glyphicon-edit"></span></button>&nbsp;&nbsp;&nbsp;<button onclick="removeBigPicData(\'' + jsonKey + '\',\'' + jsonData.logoPath + '\')" type="button" class="btn btn-danger btn-xs"> Remove <span class="glyphicon glyphicon-minus"></span></button></td></tr>';
            $('#bigPictureListTable tbody').append(htmlContent);
        });
    }

    function removeBigPicData(key, path) {
        if (confirm('Are You sure want to Delete?')) {
            removeRecord(key, path);
        }
    }

    function removeRecord(key, path) {//alert(path);
        $('.alert').hide();
        $('#infoMsgHolder').show();
        $('#msgHolder').modal().open();
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
            listBigPictureData();
            $.modal().close();
        }).catch(function () {
            $('#danMsgHolder').show();
            $('#danMsgHolder').html('<strong>Error occurred while Deleting File from Storage...</strong>' + error);
            $('#infoMsgHolder').hide();
        });
    }

    function getRecodData(id, key) {
        $('#titleHolder').html('Edit Big Picture Detail');
        $('#addEditForm').modal().open();
        database.ref("BigPicture").orderByChild("id").equalTo(id).on("child_added", function (snapshot) {
            var editData = snapshot.val();

            $('input[name="localOrGlobal"][value="' + editData.localOrGlobal + '"]').prop('checked', true);
            $('#bigPicId').val(editData.id);
            $('#bigPicKey').val(key);
            $('#bpTitle').val(editData.title);
            $('#bpDescription').val(editData.description);
            $('#bpImgDesc').val(editData.imageDescription);
        });
    }

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
                        //listBigPictureData();
                        $.modal().close();

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
                                document.getElementById("bigPictureForm").reset();
                                $('#infoMsg').hide();
                                listBigPictureData();
                                $.modal().close();

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
                    listBigPictureData();
                    $.modal().close();
                }

            }, function (error) {
                $('#danMsg').show();
                $('#danMsg').html('<strong>Error occurred while storing Data to Database...</strong>' + error);
                $('#infoMsg').hide();
            });
        }
    }

    function showAddEditFormModal() {
        $('#titleHolder').html('Add Big Picture Detail');
        $('#addEditForm').modal().open();
    }

    jQuery(function ($) {
        // attach modal close handler
        $('.modal .close').on('click', function (e) {
            e.preventDefault();
            $.modal().close();
        });
    });
</script>
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
                            <div class="container" style="margin-top:40px;">
                                <div class="panel panel-blue">
                                    <div class="panel-heading clearfix">
                                        <h3 class="panel-title pull-left">Big Picture Details</h3>
                                        <div class="btn-group pull-right">
                                            <button onclick="showAddEditFormModal()" class="btn btn-success">Add <span class="glyphicon glyphicon-plus"></span></button>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table id="bigPictureListTable" class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S.no</th>
                                                    <th>Local / Global</th>
                                                    <th>Title</th>
                                                    <th>Desription</th>
                                                    <th>Logo</th>
                                                    <th>Logo Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

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
                                </div>

                                <div id="addEditForm" style="display:none;" class="panel panel-blue modal" >
                                    <div class="panel-heading clearfix">
                                        <h3 id="titleHolder" class="panel-title pull-left">Add Big Picture Detail</h3>
                                        <div class="btn-group pull-right">
                                            <span style="font-size:20px;margin-top:5px;" class="close glyphicon glyphicon-remove"></span> 
                                        </div>
                                    </div>
                                    <div class="panel-body" style="max-height: 85%;overflow-y: scroll;">
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
                                        <form id="bigPictureForm" class="margin-bottom-40" role="form">
                                            <input type="hidden" readonly id="bigPicId" value="" />
                                            <input type="hidden" readonly id="bigPicKey" value="" />
                                            <div class="checkbox">
                                                <label for="localRadio">
                                                    <input id="localRadio" type="radio" name="localOrGlobal" checked value="local"> Local									
                                                </label>
                                                <label for="globalRadio">
                                                    <input id="globalRadio" type="radio" name="localOrGlobal" value="global"> Global									
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="bpTitle">Title</label>
                                                <input type="text" class="form-control" id="bpTitle" placeholder="Enter Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="bpDescription">Description</label>
                                                <input type="text" class="form-control" id="bpDescription" placeholder="Enter Description">
                                            </div>
                                            <div class="form-group">
                                                <label for="logoData">Upload Image</label>
                                                <input type="file" class="form-control" id="logoData" placeholder="Password">
                                            </div>							
                                            <div class="form-group">
                                                <label for="bpImgDesc">Image Description</label>
                                                <input type="text" class="form-control" id="bpImgDesc" placeholder="Enter Image Description">
                                            </div>
                                            <!-- <div class="checkbox">
                                                    <label>
                                                            <input type="checkbox"> Check me out
                                                    </label>
                                            </div> -->
                                            <button type="button" onclick="uploadData()" class="btn-u btn-u-blue">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>

    <?php $this->load->view('includes/footerinner'); ?>
</div>

