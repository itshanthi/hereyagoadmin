<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <div class="sidenav-header-inner text-center"><img src="<?php echo base_url(); ?>assets/img/avatar-1.jpg" alt="person" class="img-fluid rounded-circle">
                <h2 class="h5 text-uppercase">Hereyago</h2><span class="text-uppercase">Admin</span>
            </div>
            <div class="sidenav-header-logo"><a href="<?php echo base_url(); ?>" class="brand-small text-center"> <strong>H</strong><strong class="text-primary">Y</strong></a></div>
        </div>
        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">                  
                <?php if ($this->uri->segment(1) == 'dashboard') { ?>
                    <li class="active">
                    <?php } else { ?>
                    <li>
                    <?php } ?>
                    <a href="<?php echo base_url(); ?>dashboard"> <i class="icon-home"></i><span>Home</span></a></li>
                <?php if ($this->uri->segment(1) == 'users') { ?>
                    <li class="active">
                    <?php } else { ?>
                    <li>
                    <?php } ?>
                    <a href="<?php echo base_url(); ?>users"><i class="icon-form"></i><span>Users</span></a></li>    
            </ul>
        </div>
        <div class="admin-menu">
            <ul id="side-admin-menu" class="side-menu list-unstyled"> 
                <li> 
                    <?php if ($this->uri->segment(1) == 'addbigpicture' || $this->uri->segment(1) == 'bigpicture' || $this->uri->segment(1) == 'viewBigPic' || $this->uri->segment(1) == 'editBigPic') { ?>
                        <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="true">
                        <?php } else { ?>  
                            <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false">
                            <?php } ?>
                            <i class="icon-interface-windows"></i><span>BigPicture</span>
                            <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                        <?php if ($this->uri->segment(1) == 'bigpicture' || $this->uri->segment(1) == 'addbigpicture' || $this->uri->segment(1) == 'viewBigPic' || $this->uri->segment(1) == 'editBigPic') { ?>
                            <ul id="pages-nav-list" class="list-unstyled collapse show">
                            <?php } else { ?>  
                                <ul id="pages-nav-list" class="list-unstyled collapse" >
                                <?php } ?>
                                <?php if ($this->uri->segment(1) == 'addbigpicture') { ?>
                                    <li class="active">
                                    <?php } else { ?>  
                                    <li>
                                    <?php } ?>
                                    <a href="<?php echo base_url(); ?>addbigpicture">Add</a></li>
                                <?php if ($this->uri->segment(1) == 'bigpicture') { ?>
                                    <li class="active">
                                    <?php } else { ?>  
                                    <li>
                                    <?php } ?>
                                    <a href="<?php echo base_url(); ?>bigpicture">Manage BigPicture</a></li>
                                <!--                                <li> <a href="#">Add Flex Offers</a></li> 
                                                                <li> <a href="#">Add Linkshare</a></li> -->
                            </ul>
                            </li>


                            <li> 
                                <?php if ($this->uri->segment(1) == 'coupouns' || $this->uri->segment(1) == 'linkcoupouns' || $this->uri->segment(1) == 'flexcoupouns') { ?>
                                    <a href="#pages-nav-list1" data-toggle="collapse" aria-expanded="true">
                                    <?php } else { ?>  
                                        <a href="#pages-nav-list1" data-toggle="collapse" aria-expanded="false">
                                        <?php } ?>
                                        <i class="icon-interface-windows"></i><span>Coupons</span>
                                        <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                                    <?php if ($this->uri->segment(1) == 'coupouns' || $this->uri->segment(1) == 'linkcoupouns' || $this->uri->segment(1) == 'flexcoupouns') { ?>
                                        <ul id="pages-nav-list1" class="list-unstyled collapse show">
                                        <?php } else { ?>  
                                            <ul id="pages-nav-list1" class="list-unstyled collapse" >
                                            <?php } ?>
                                            <?php if ($this->uri->segment(1) == 'coupouns') { ?>
                                                <li class="active">
                                                <?php } else { ?>  
                                                <li>
                                                <?php } ?>
                                                <a href="<?php echo base_url(); ?>coupouns">CJ Coupons</a></li>
                                            <?php if ($this->uri->segment(1) == 'linkcoupouns') { ?>
                                                <li class="active">
                                                <?php } else { ?>  
                                                <li>
                                                <?php } ?>
                                                <a href="<?php echo base_url(); ?>linkcoupouns">Linkshare Coupouns</a></li>
                                            <?php if ($this->uri->segment(1) == 'flexcoupouns') { ?>
                                                <li class="active">
                                                <?php } else { ?>  
                                                <li>
                                                <?php } ?>
                                                <a href="<?php echo base_url(); ?>flexcoupouns">Flexoffers Coupouns</a></li>
                                            <!--                                <li> <a href="#">Add Flex Offers</a></li> 
                                                                            <li> <a href="#">Add Linkshare</a></li> -->
                                        </ul>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="main-menu">
                                        <ul id="side-main-menu" class="side-menu list-unstyled">  
                                            <?php if ($this->uri->segment(1) == 'mngrunner') { ?>
                                                <li class="active">
                                                <?php } else { ?>
                                                <li>
                                                <?php } ?>
                                                <a href="<?php echo base_url(); ?>mngrunner"><i class="icon-form"></i><span>Runner</span></a></li>    
                                        </ul>
                                    </div>
                                    </div>
                                    </nav>
                                    <div class="page home-page">
                                        <!-- navbar-->
                                        <header class="header">
                                            <nav class="navbar">
                                                <div class="container-fluid">
                                                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                                                        <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                                                                <div class="brand-text hidden-sm-down">&nbsp;</div></a></div>
                                                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">


                                                            <li class="nav-item"><a href="<?php echo base_url(); ?>logout" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </nav>
                                        </header>