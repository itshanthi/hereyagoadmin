<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <title>Coupouns</title>
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="feed" />
        <link rel="pingback" href="http://demos.themebound.com/flatter/xmlrpc.php" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel='dns-prefetch' href='//fonts.googleapis.com' />
        <link rel='dns-prefetch' href='//s.w.org' />
        <link rel="alternate" type="application/rss+xml" title="Flatter &raquo; Feed" href="feed" />
        <link rel="alternate" type="application/rss+xml" title="Flatter &raquo; Comments Feed" href="feed" />
        <link rel="alternate" type="application/rss+xml" title="Flatter &raquo; Coupon Listings Comments Feed" href="feed" />
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/jquery/wpemojiSettings.js'></script>
        <style type="text/css">
            img.wp-smiley,
            img.emoji {
                display: inline !important;
                border: none !important;
                box-shadow: none !important;
                height: 1em !important;
                width: 1em !important;
                margin: 0 .07em !important;
                vertical-align: -0.1em !important;
                background: none !important;
                padding: 0 !important;
            }
            .extra-width .featured-slider .slider li {
                margin-bottom: 15px !important;
            }
        </style>
        <link rel='stylesheet' id='at-main-css'  href='<?php echo base_url(); ?>assets/css/style_coupons.css' type='text/css' media='all' />   
         <link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>assets/css/style-demo.css">
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery-migrate.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/core.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/datepicker.min.js?ver=1.11.4'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/jquery/jQuery(document).js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/jquery/datepickerL10n.js'></script>

        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery.ui.datepicker-lang.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/easing.js'></script>

        <script src="<?php echo base_url(); ?>assets/jquery/jquery.easing-1.3.js"></script>
        <script src="<?php echo base_url(); ?>assets/jquery/jquery.mousewheel-3.1.12.js"></script>
        <script src="<?php echo base_url(); ?>assets/jquery/jquery.jcarousellite.js"></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/jquery/flatter_params.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/theme-scripts.js'></script>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/pic/favicon.ico" />
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">	
    </head>
    <body id="top" class="home page-template page-template-front-page page-template-front-page-php page page-id-152 extra-width responsive-menu">
        <div id="wrapper">
            <div class="w1">
                <?php $this->load->view('includes/menu_home'); ?>
                <!-- #header -->
                <div id="featured" style="height:900px;">
                    <div class="frame">
                        <div class="featured-slider">
                            <div class="head">
                                <h2>Featured Coupons</h2>
                            </div>

                            <div class="custom-container vertical" style="margin-left:30px;margin-right: 30px;">
                                   <?php if (count((array) $coupouns) > 0) { ?>
                                <a href="#" class="prev" ><img style=" display: block;margin:0 auto;" src="<?php echo base_url(); ?>assets/img/up.png" width="24" height="24" /></a>
                                <div class="carousel">
                                    <ul>
                                             <?php foreach ($coupouns as $key => $row) {//echo "<pre>";print_r($coupouns); ?>
                                        <li  style="border:1px solid #c7c2c2;padding: 10px 10px 10px 10px;margin-bottom: 10px;">
                                            <a href="<?php echo base_url() . 'viewDiscount/' . $key; ?>"><img  src="<?php echo $row->imageUrl; ?>" alt="" width="100%"  height="150px" /></a>
                                            <h3><a href="<?php echo base_url() . 'viewDiscount/' . $key; ?>" title="<?php echo $row->desc; ?>"><?php echo word_limiter($row->name, 3); ?></a></h3>	
                                             <p class="store-name"> <a href="<?php echo base_url() . 'simillarly/' . $row->advtName; ?>" rel="tag"><?php echo $row->advtName; ?></a></p>
                                                                <a class="btn blue" href="<?php echo base_url() . 'viewDiscount/' . $key; ?>">Learn More</a>
                                        </li>                                      
                                         <?php } ?>
                                    </ul>
                                </div>
                                <a href="#" class="next" style="margin-left:80px;"><img  style=" display: block;margin: 0 auto 0 auto;" src="<?php echo base_url(); ?>assets/img/down.png" width="24" height="24" /></a>
                                <div class="clear"></div>
                                  <?php
                                    } else {
                                        echo "No Coupons found";
                                    }
                                    ?>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="store-thumb-container" class="slider_area">
                    <div class="frame">

                        <div class="store-thumbs">

                            <div class="head">

                                <h2>Popular Stores</h2>

                            </div>

                            <ul class="store-thumb-list clearfix">
                                <li style="background-image:url('<?php echo base_url(); ?>assets/img/popular/chicago_staek.png')">                                  
                                    <a href="<?php echo base_url() . 'simillarly/Chicago Steak Company'; ?>"><span class="store-count">3</span> coupons</a>
                                </li>


                                <li style="background-image:url('<?php echo base_url(); ?>assets/img/popular/concord_supplies.png')">           
                                    <a href="<?php echo base_url() . 'simillarly/Concord Supplies'; ?>"><span class="store-count">16</span> coupons</a>
                                </li>


                                <li style="background-image:url('<?php echo base_url(); ?>assets/img/popular/ebooks.png')">  
                                    <a href="<?php echo base_url() . 'simillarly/eBooks.com'; ?>"><span class="store-count">9</span> coupons</a>
                                </li>


                                <li style="background-image:url('<?php echo base_url(); ?>assets/img/popular/homeclick.png')">  
                                    <a href="<?php echo base_url() . 'simillarly/Homeclick.com'; ?>"><span class="store-count">14</span> coupons</a>
                                </li>


                                <li style="background-image:url('<?php echo base_url(); ?>assets/img/popular/homesquare.png')">  
                                    <a href="<?php echo base_url() . 'simillarly/HomeSquare'; ?>"><span class="store-count">17</span> coupons</a>
                                </li>


                                <li style="background-image:url('<?php echo base_url(); ?>assets/img/popular/skins.png')">  
                                    <a href="<?php echo base_url() . 'simillarly/SKINS'; ?>"><span class="store-count">29</span> coupons</a>
                                </li>


                                <li style="background-image:url('<?php echo base_url(); ?>assets/img/popular/rvt.png')">  
                                    <a href="<?php echo base_url() . 'simillarly/RVT.com'; ?>"><span class="store-count">1</span> coupons</a>
                                </li>


                                <li style="background-image:url('<?php echo base_url(); ?>assets/img/popular/snapmade.png')">  
                                    <a href="<?php echo base_url() . 'simillarly/SnapMade'; ?>"><span class="store-count">20</span> coupons</a>
                                </li>





                            </ul>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('includes/footer_home'); ?>


                </body>

                </html>
                <script type="text/javascript">
                    $(function () {
                        $(".vertical .carousel").jCarouselLite({
                            btnNext: ".vertical .next",
                            btnPrev: ".vertical .prev",
                            vertical: true
                        });
                    });
                </script>