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
        <link rel='stylesheet' id='at-main-css'  href='http://demos.themebound.com/flatter/wp-content/themes/flatter/style.css?ver=4.8.1' type='text/css' media='all' />   
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

                            <div class="box-holder">

                                <div class="head">
                                    <h2>Search for '<?php echo $this->input->post('keyword'); ?>' returned <?php if (isset($coupouns) && $coupouns != '') {
                    echo count((array) $coupouns);
                } else {
                    echo '0';
                } ?> results</h2>
                                </div> <!-- end head -->
                                <?php if(count((array) $coupouns) > 0){ 
                                      foreach($coupouns as $key=>$row) { ?>
                                <div class="item post-16 coupon type-coupon status-publish hentry coupon_category-electronics coupon_tag-books coupon_tag-electronics coupon_tag-online-store stores-amazon coupon_type-printable-coupon" id="post-16">

                                    <div class="item-holder">

                                        <div class="store-holder">
                                            <div class="store-image">
                                                <a href="<?php echo base_url() . 'simillarly/' . $row->advtName; ?>"><img src="<?php echo $row->imageUrl; ?>" alt="" width="auto" height="auto" /></a>
                                            </div>
                                            <div class="store-name">
                                                <a href="<?php echo base_url() . 'simillarly/' . $row->advtName; ?>" rel="tag"><?php echo $row->advtName; ?></a>			</div>
                                        </div>

                                        <div class="item-frame">

                                            <div class="item-panel">

                                                <div class="clear"></div>


                                                <h3 class="entry-title"><a href="<?php echo base_url() . 'viewDiscount/' . $key; ?>" title="View the &quot;10% Off Amazon&quot; coupon page" rel="bookmark"><?php echo $row->name; ?></a></h3>


                                                <div class="content-holder">


                                                    <p class="desc entry-content"><?php echo $row->desc; ?><br/>
<!--                                                        <a href="#" class="more" title="View the &quot;10% Off Amazon&quot; coupon page">more ››</a>--></p>


                                                </div>

                                            </div> <!-- #item-panel -->

                                            <div class="clear"></div>


                                        </div> <!-- #item-frame -->

                                        <div class="item-actions">


                                            <div class="thumbsup-vote">

                                                <div class="stripe-badge">
                                                    <span class="success">success</span>
                                                    <span class="thumbsup-stripe-badge stripe-badge-orange"><span class="percent">72%</span></span>
                                                </div>

                                                <div class="frame" id="vote_16">


                                                    <div id="loading-16" class="loading"></div>

                                                    <div id="ajax-16">

                                                        <span class="vote thumbsup-up">
                                                            <span class="thumbsup" onclick="thumbsVote(16, 0, & #39; vote_16 & #39; , 1, & #39; & lt; span class = \ & #39; text\ & #39; & gt; Thanks for voting! & lt; /span&gt;&#39;);"></span>
                                                        </span>

                                                        <span class="vote thumbsup-down">
                                                            <span class="thumbsdown" onclick="thumbsVote(16, 0, & #39; vote_16 & #39; , 0, & #39; & lt; span class = \ & #39; text\ & #39; & gt; Thanks for voting! & lt; /span&gt;&#39;);"></span>
                                                        </span>

                                                    </div>


                                                </div>

                                            </div>


                                            <p class="time-left iconfix">
                                                <i class="fa fa-bell-o"></i>
                                                <time class="entry-date expired" datetime="<?php echo date("Y-m-d",strtotime($row->endDate)); ?>"><?php echo date("M d, Y",strtotime($row->endDate)); ?></time>
                                                <time class="entry-date published" datetime="2015-09-19T13:40:55+00:00">September 19, 2015</time>
                                                <time class="entry-date updated" datetime="2015-09-19T14:13:41+00:00">September 19, 2015</time>
                                            </p>



                                            <div class="couponAndTip">

                                                <div class="link-holder">

                                                    <a href="#" id="coupon-link-16" class="coupon-code-link btn printable-coupon" title="Click to Print" target="_blank" data-coupon-nonce="c53e1d5e65" data-coupon-id="16" data-clipboard-text="Print Coupon"><span><i class="fa fa-print"></i>Print Coupon</span></a>

                                                </div> <!-- #link-holder -->

                                                <p class="link-popup"><span class="link-popup-arrow"></span><span class="link-popup-inner">Click to print coupon</span></p>

                                            </div><!-- /couponAndTip -->

                                        </div>

                                        <div class="item-footer">

                                            <ul class="social">

                                                <li class="stats">
                                                    <i class="fa fa-bar-chart"></i>
                                                    3723 total views, 1 today				</li>

                                                <li>
                                                    <i class="fa fa-share-square-o"></i><a class="share" href="#">Share </a>
                                                    <div class="drop">

                                                        <div class="drop-arrow"></div>

                                                        <div class="drop-c">

                                                            <ul class="inner-social">
                                                                <li><a class="mail" href="#" data-id="16" rel="nofollow">Email to Friend</a></li>
                                                                <li><a class="rss" href="#" rel="nofollow">Coupon Comments RSS</a></li>
                                                                <li><a class="twitter" href="#" rel="nofollow" target="_blank">Twitter</a></li>
                                                                <li><a class="facebook" href="javascript:void(0);" onclick="window.open( & #39; https://www.facebook.com/sharer.php?t=10%25+Off+Amazon+coupon+from+Flatter&amp;u=http%3A%2F%2Fdemos.themebound.com%2Fflatter%2Fcoupons%2F10-off-amazon%2F&#39;,&#39;doc&#39;, &#39;width=638,height=500,scrollbars=yes,resizable=auto&#39;);" rel="nofollow">Facebook</a></li>
                                                                <li><a class="pinterest" href="#" data-pin-do="buttonPin" data-pin-config="beside" rel="nofollow" target="_blank">Pinterest</a></li>
                                                                <li><a class="digg" href="#" rel="nofollow" target="_blank">Digg</a></li>
                                                                <li><a class="reddit" href="#" rel="nofollow" target="_blank">Reddit</a></li>
                                                            </ul>

                                                        </div>

                                                    </div>				</li>


                                            </ul>

                                            <div id="comments-16" class="comments-list">

                                                <p class="links">
                                                    <i class="fa fa-pencil"></i>
                                                    <a href="#" class="mini-comments" title="Comment on 10% Off Amazon" data-rel="16">Add a comment</a>					<i class="fa fa-remove"></i>
                                                    <a href="#" class="show-comments" title="Comment on 10% Off Amazon" data-rel="16">Close comments</a>				</p>


                                            </div>

                                            <div class="author vcard">
                                                <a class="url fn n" href="#" rel="author">Demo Tester</a>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <?php }} else {
                                    
                                    echo "No Results Found";
                                } ?>
                                <?php $this->load->view('includes/footer_home'); ?>
                                </body>

                                </html>
