<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <title>Search Results</title>
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
        </style>
        <link rel='stylesheet' id='at-main-css'  href='<?php echo base_url(); ?>assets/css/style_coupons.css' type='text/css' media='all' />   
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
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/theme-scripts.js'></script>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/pic/favicon.ico" />
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">	
    </head>
    <body id="top" class="search search-results extra-width responsive-menu">


        <div id="wrapper">

            <div class="w1">

                <?php $this->load->view('includes/menu_home'); ?>
                <!-- #header -->

                <div id="main">


                    <div id="content">
                        
                        <div class="content-box">
                            <div class="box-c">
                                    <?php if (count($viewmore) > 0) {  //echo "<pre>";print_r($viewmore);exit;
                                    ?>


                                    <div class="box-holder">

                                        <div class="blog">


                                            <h1 class="entry-title" style="color:#146d85;"><?php echo $viewmore['name']; ?></h1>


                                            <div class="content-bar iconfix">
                                                <p class="meta">
                                                    <span>
                                                        <i class="fa fa-calendar"></i>
                                                        <time class="entry-date published" datetime="2015-09-18T19:19:15+00:00"><?php echo date("M d, Y",strtotime($viewmore['startDate'])); ?></time>
                                                        <time class="entry-date updated" datetime="2015-09-18T19:19:39+00:00"><?php echo date("M d, Y",strtotime($viewmore['startDate'])); ?></time>
                                                        - Expires: <time class="entry-date expired" datetime="2050-09-30T00:00:00+00:00"><?php echo date("M d, Y",strtotime($viewmore['endDate'])); ?></time>									</span>
                                                    
                                                </p>
                                                <!--<p class="comment-count"><i class="fa fa-comments"></i><a href="http://demos.themebound.com/flatter/coupons/best-offer-on-computer-accessories/#respond">0 Comments</a></p>-->

                                            </div>

                                            <div class="head-box">

                                                <div class="store-holder">
                                                    <div class="store-image">
                                                        <a href="<?php echo $viewmore['clickUrl']; ?>"><img src="<?php echo $viewmore['imageUrl']; ?>" alt=""></a>
                                                    </div>
                                                </div>

                                                <div class="coupon-main">



                                                    <div class="couponAndTip">

                                                        <div class="link-holder">

                                                            <a href="<?php echo $viewmore['clickUrl']; ?>" target="_blank" id="coupon-link-250" class="coupon-code-link btn coupon-hidden" title="Click to open site" target="_blank" data-coupon-nonce="b1e670b765" data-coupon-id="250" data-clipboard-text="COMP15"><span><i class="fa fa-lock"></i>View Link</span></a>

                                                        </div> <!-- #link-holder -->

                                                        <p class="link-popup"><span class="link-popup-arrow"></span><span class="link-popup-inner">Click to open site</span></p>

                                                    </div><!-- /couponAndTip -->

                                                    <div class="clear"></div>

                                                    <div class="store-info">
                                                        <i class="icon-building"></i> <a href="<?php echo base_url() . 'simillarly/' . $viewmore['advtName']; ?>" rel="tag"><?php echo $viewmore['advtName']; ?></a>									</div>

                                                </div> <!-- #coupon-main -->


<!--                                            <div class="thumbsup-vote">

                                                    <div class="stripe-badge">
                                                        <span class="success">success</span>
                                                        <span class="thumbsup-stripe-badge stripe-badge-orange"><span class="percent">67%</span></span>
                                                    </div>

                                                    <div class="frame" id="vote_250">


                                                        <div id="loading-250" class="loading"></div>

                                                        <div id="ajax-250">

                                                            <span class="vote thumbsup-up">
                                                                <span class="thumbsup" onclick="thumbsVote(250, 0, 'vote_250', 1, '<span class=\'text\'>Thanks for voting!</span>');"></span>
                                                            </span>

                                                            <span class="vote thumbsup-down">
                                                                <span class="thumbsdown" onclick="thumbsVote(250, 0, 'vote_250', 0, '<span class=\'text\'>Thanks for voting!</span>');"></span>
                                                            </span>

                                                        </div>


                                                    </div>

                                                </div>-->


                                            </div> <!-- #head-box -->

                                            <div class="text-box">

                                                <h2>Coupon Details</h2>


                                                <p><?php echo $viewmore['desc']; ?></p>




                                            </div>

                                            

<!--                                            <div class="user-bar">

                                                <a href="http://demos.themebound.com/flatter/coupons/best-offer-on-computer-accessories/#respond" class="btn"><span>Leave a comment</span></a>
                                                <ul class="inner-social">
                                                    <li><a class="mail" href="#" data-id="250" rel="nofollow">Email to Friend</a></li>
                                                    <li><a class="rss" href="http://demos.themebound.com/flatter/coupons/best-offer-on-computer-accessories/feed/" rel="nofollow">Coupon Comments RSS</a></li>
                                                    <li><a class="twitter" href="https://twitter.com/home?status=Best+Offer+on+computer+accessories+coupon+from+Flatter+-+http%3A%2F%2Fdemos.themebound.com%2Fflatter%2Fcoupons%2Fbest-offer-on-computer-accessories%2F" rel="nofollow" target="_blank">Twitter</a></li>
                                                    <li><a class="facebook" href="javascript:void(0);" onclick="window.open('https://www.facebook.com/sharer.php?t=Best+Offer+on+computer+accessories+coupon+from+Flatter&amp;u=http%3A%2F%2Fdemos.themebound.com%2Fflatter%2Fcoupons%2Fbest-offer-on-computer-accessories%2F', 'doc', 'width=638,height=500,scrollbars=yes,resizable=auto');" rel="nofollow">Facebook</a></li>
                                                    <li><a class="pinterest" href="//pinterest.com/pin/create/button/?url=http%3A%2F%2Fdemos.themebound.com%2Fflatter%2Fcoupons%2Fbest-offer-on-computer-accessories%2F&amp;media=http://demos.themebound.com/flatter/files/2014/01/logo-1802.png&amp;description=Best+Offer+on+computer+accessories+coupon+from+Flatter" data-pin-do="buttonPin" data-pin-config="beside" rel="nofollow" target="_blank">Pinterest</a></li>
                                                    <li><a class="digg" href="https://digg.com/submit?phase=2&amp;url=http%3A%2F%2Fdemos.themebound.com%2Fflatter%2Fcoupons%2Fbest-offer-on-computer-accessories%2F&amp;title=Best+Offer+on+computer+accessories+coupon+from+Flatter" rel="nofollow" target="_blank">Digg</a></li>
                                                    <li><a class="reddit" href="https://reddit.com/submit?url=http%3A%2F%2Fdemos.themebound.com%2Fflatter%2Fcoupons%2Fbest-offer-on-computer-accessories%2F&amp;title=Best+Offer+on+computer+accessories+coupon+from+Flatter" rel="nofollow" target="_blank">Reddit</a></li>
                                                </ul>

                                            </div>  #user-bar -->

                                        </div> <!-- #blog -->

                                    </div> <!-- #box-holder -->


                                <?php
                                } else {

                                    echo "No Results Found";
                                }
                                ?>
                            </div> 
                        </div>
                    </div> 

                </div>
  <?php $this->load->view('includes/footer_home'); ?>
                </body>

                </html>
