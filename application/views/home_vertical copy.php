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
          <link rel='stylesheet' id='at-main-css'  href='<?php echo base_url(); ?>assets/css/style.mistl.css' type='text/css' media='all' />   
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery-migrate.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/core.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/datepicker.min.js?ver=1.11.4'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/jquery/jQuery(document).js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/jquery/datepickerL10n.js'></script>

        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery.ui.datepicker-lang.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/easing.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jcarousellite.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/jquery/flatter_params.js'></script>
          <script type='text/javascript' src='<?php echo base_url(); ?>assets/jquery/jq.mistl.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/theme-scripts.js'></script>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/pic/favicon.ico" />
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">	
    </head>
    <body id="top" class="home page-template page-template-front-page page-template-front-page-php page page-id-152 extra-width responsive-menu">
        <div id="wrapper">
            <div class="w1">
                <?php $this->load->view('includes/menu_home'); ?>
                <!-- #header -->
               <div class="wrapper">
                   <div class="slidename" >
                       <?php if (count((array) $coupouns) > 0) { ?>
                            <ul>
                               <?php foreach ($coupouns as $key => $row) {//echo "<pre>";print_r($coupouns); ?>
                                    <li>
                                       <figure>
                                           <a href="<?php echo base_url() . 'viewDiscount/' . $key; ?>"><img  src="<?php echo $row->imageUrl; ?>" alt="" /></a>                                          
                                         
                                       </figure> 

                                   </li>
                               <?php } ?>   
                           </ul>
                           <?php
                       } else {
                           echo "No Coupons found";
                       }
                       ?>

                   </div>

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
 <script>
           $(document).ready(function(){
             $('.slidename').mistl({
                 mode: 'vertical'
             });
             $('.slidename_2').mistl({
                 popup: true,
                 toggleText: 'open slide'
             });
           });
        </script>