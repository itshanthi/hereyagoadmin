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
                                <div class="box-holder">
                                    <div class="store">
                                        <div class="text-box">
                                          
                                                <h1><?php echo 'Coupons in the "'.str_replace('-',' ',$this->uri->segment(2)).'"'; ?></h1>
                                          
                                             <!-- #info -->
                                        </div> <!-- #text-box -->
                                    </div> <!-- #store -->
                                </div> <!-- #box-holder -->
                            </div> <!-- #box-c -->
                        </div> <!-- #content-box -->
                        <div class="content-box">
                            <div class="box-c">
                                   <?php if(count($coupouns) > 0){ 
                                      foreach($coupouns as $key=>$row) { ?>
                                <div class="box-holder">
                                    <div class="item post-281 coupon type-coupon status-publish hentry coupon_category-fashion coupon_tag-men coupon_tag-t-shirt coupon_tag-women stores-shop-clues coupon_type-coupon-code" id="post-281">
                                        <div class="item-holder">
                                            <div class="store-holder">
                                                <div class="store-image">
                                                    <?php if (isset($row['imageUrl']) && $row['imageUrl'] != '') { ?>
                                                       <a  href="<?php echo $row['clickUrl']; ?>"><img src="<?php echo $row['imageUrl']; ?>" alt=""></a>
                                                    <?php } else { ?>
                                                       <a  href="<?php echo $row['clickUrl']; ?>"><?php echo word_limiter($row['name'], 3); ?></a>
                                                    <?php }
                                                    ?>
                                                    
                                                </div>
                                                <div class="store-name">
                                                    <a href="<?php echo base_url() . 'simillarly/' . $row['advtName']; ?>"  rel="tag"><?php echo $row['advtName']; ?></a>			</div>
                                            </div>
                                            <div class="item-frame">
                                                <div class="item-panel">
                                                    <div class="clear"></div>				
                                                    <h3 class="entry-title"><a href="<?php echo base_url() . 'viewDiscount/' . $row['id']; ?>" title="View the &quot;T-shirt combo offer&quot; coupon page" rel="bookmark"><?php echo word_limiter($row['name'], 5); ?></a></h3>		
                                                    <div class="content-holder">
                                                        <p class="desc entry-content"><?php echo $row['desc']; ?> </p>
                                                    </div>
                                                </div> <!-- #item-panel -->
                                                <div class="clear"></div>
                                            </div> <!-- #item-frame -->
                                            <div class="item-actions">
                                                <div class="thumbsup-vote">
                                                    <div class="stripe-badge">
                                                        <span class="success">success</span>
                                                        <span class="thumbsup-stripe-badge stripe-badge-green"><span class="percent">0%</span></span>
                                                    </div>
                                                    <div class="frame" id="vote_281">			
                                                        <div id="loading-281" class="loading"></div>
                                                        <div id="ajax-281">
                                                            <span class="vote thumbsup-up">
                                                                <span class="thumbsup" onclick="thumbsVote(281, 0, 'vote_281', 1, '<span class=\'text\'>Thanks for voting!</span>');"></span>
                                                            </span>
                                                            <span class="vote thumbsup-down">
                                                                <span class="thumbsdown" onclick="thumbsVote(281, 0, 'vote_281', 0, '<span class=\'text\'>Thanks for voting!</span>');"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="time-left iconfix">
                                                    <i class="fa fa-bell-o"></i>
                                                    <time class="entry-date expired" datetime="2056-09-30T00:00:00+00:00"><?php if(isset($row['endDate']) && $row['endDate'] !=''){echo date("M d, Y",strtotime($row['endDate']));} ?></time>
                                                   
                                                </p>
                                                <div class="couponAndTip">
<!--                                                    <div class="link-holder">
                                                        <a href="#" id="coupon-link-281" class="coupon-code-link btn coupon-hidden" title="Click to copy &amp; open site" target="_blank" data-coupon-nonce="714d6d6893" data-coupon-id="281" data-clipboard-text="TCOMBO">
                                                            <span><i class="fa fa-lock"></i>Show Coupon</span>
                                                        </a>
                                                    </div>  #link-holder -->
                                                    <p class="link-popup" style="display: none;"><span class="link-popup-arrow"></span><span class="link-popup-inner">Click to copy &amp; open site</span></p>
                                                </div><!-- /couponAndTip -->
                                            </div>
                                            <div class="item-footer">
                                               
                                            </div>
                                        </div>
                                    </div>		
                                </div> 
                                 <?php }} else {
                                    
                                    echo "No Results Found";
                                } ?>
                            </div> 
                        </div>
                    </div> 

                </div>
  <?php $this->load->view('includes/footer_home'); ?>
                </body>

                </html>
