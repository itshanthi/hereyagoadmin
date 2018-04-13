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
                            <div class="box-c">
                                <div class="box-holder">
                                    <div class="store">
                                        <div class="text-box">
                                            <div class="store-holder">
                                                <div class="store-image">
                                                    <a href="#"><img class="store-thumb" src="img/shopclues.png" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="info">
                                               
                                                <h1><?php echo str_replace("%20", " ", $this->uri->segment(2)); ?></h1>
                                                <div class="desc"></div>
                                                <p class="store-url"><a href="#" target="_blank">http://www.shopclues.com/</a></p>
                                            </div> <!-- #info -->
                                        </div> <!-- #text-box -->
                                    </div> <!-- #store -->
                                </div> <!-- #box-holder -->
                            </div> <!-- #box-c -->
                        </div> <!-- #content-box -->
                        <div class="content-box">
                            <div class="box-c">
                                   <?php if(count((array) $coupouns) > 0){ 
                                      foreach($coupouns as $key=>$row) { ?>
                                <div class="box-holder">
                                    <div class="item post-281 coupon type-coupon status-publish hentry coupon_category-fashion coupon_tag-men coupon_tag-t-shirt coupon_tag-women stores-shop-clues coupon_type-coupon-code" id="post-281">
                                        <div class="item-holder">
                                            <div class="store-holder">
                                                <div class="store-image">
                                                    <a href="#"><img src="<?php echo $row->imageUrl; ?>" alt=""></a>
                                                </div>
                                                <div class="store-name">
                                                    <a href="#" rel="tag"><?php echo $row->advtName; ?></a>			</div>
                                            </div>
                                            <div class="item-frame">
                                                <div class="item-panel">
                                                    <div class="clear"></div>				
                                                    <h3 class="entry-title"><a href="#" title="View the &quot;T-shirt combo offer&quot; coupon page" rel="bookmark"><?php echo $row->name; ?></a></h3>		
                                                    <div class="content-holder">
                                                        <p class="desc entry-content"><?php echo $row->desc; ?> <a href="#" class="more" title="View the &quot;T-shirt combo offer&quot; coupon page">more ››</a></p>
                                                    </div>
                                                </div> <!-- #item-panel -->
                                                <div class="clear"></div>
                                            </div> <!-- #item-frame -->
                                            <div class="item-actions">
                                                <div class="thumbsup-vote">
                                                    <div class="stripe-badge">
                                                        <span class="success">success</span>
                                                        <span class="thumbsup-stripe-badge stripe-badge-green"><span class="percent">89%</span></span>
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
                                                    <time class="entry-date expired" datetime="2056-09-30T00:00:00+00:00">September 30, 2056</time>
                                                    <time class="entry-date published" datetime="2015-09-19T13:34:40+00:00">September 19, 2015</time>
                                                    <time class="entry-date updated" datetime="2015-09-19T13:36:56+00:00">September 19, 2015</time>
                                                </p>
                                                <div class="couponAndTip">
                                                    <div class="link-holder">
                                                        <a href="#" id="coupon-link-281" class="coupon-code-link btn coupon-hidden" title="Click to copy &amp; open site" target="_blank" data-coupon-nonce="714d6d6893" data-coupon-id="281" data-clipboard-text="TCOMBO">
                                                            <span><i class="fa fa-lock"></i>Show Coupon</span>
                                                        </a>
                                                    </div> <!-- #link-holder -->
                                                    <p class="link-popup" style="display: none;"><span class="link-popup-arrow"></span><span class="link-popup-inner">Click to copy &amp; open site</span></p>
                                                </div><!-- /couponAndTip -->
                                            </div>
                                            <div class="item-footer">
                                                <ul class="social">
                                                    <li class="stats">
                                                        <i class="fa fa-bar-chart"></i>
                                                        1255 total views, 2 today</li>
                                                    <li>
                                                        <i class="fa fa-share-square-o"></i><a class="share" href="#">Share </a></li>
                                                    <li class="loop-comments">
                                                        <a href="#" class="show-comments" title="Comment on T-shirt combo offer" data-rel="281">Comment</a>
                                                    </li>
                                                    <li>
                                                        <div class="reports_wrapper">
                                                            <div class="reports_form_link"><a href="#" class="problem">Report a Problem</a></div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div id="comments-281" class="comments-list">
                                                    <p class="links">
                                                        <i class="fa fa-pencil"></i>
                                                        <a href="#" class="mini-comments" title="Comment on T-shirt combo offer" data-rel="281">Add a comment</a>					<i class="fa fa-remove"></i>
                                                        <a href="#" class="show-comments" title="Comment on T-shirt combo offer" data-rel="281">Close comments</a>				</p>		
                                                </div>
                                                <div class="author vcard">
                                                    <a class="url fn n" href="#" rel="author">Chetan Parate</a>
                                                </div>
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
<div id="footer">

                    <div class="panel">

<!--                        <div class="panel-holder">

                            <div id="newsletter-subscribe-3" class="box customclass subscribe-box"><h4>Coupons in Your Inbox!</h4>		<div class="subscribe-holder">

                                    <div class="text-box"><p>Receive coupons by email, subscribe now!</p></div>

                                    <form method="post" action="#" class="subscribe-form">
                                        <fieldset>
                                            <div class="row">
                                                <div class="text"><input name="email" class="text" value="" placeholder="Enter Email Address" type="text"></div>
                                            </div>
                                            <div class="row">
                                                <button name="submit" value="Submit" id="submit" title="Subscribe" type="submit" class="btn-submit"><span>Subscribe</span></button>
                                            </div>
                                        </fieldset>

                                        <input name="" value="" type="hidden">
                                        <input name="" value="" type="hidden">
                                        <input name="" value="" type="hidden">
                                        <input name="" value="" type="hidden">
                                        <input name="" value="" type="hidden">
                                        <input name="" value="" type="hidden">

                                    </form>
                                </div>
                            </div><div id="twitter-2" class="box customclass widget_twitter"><div><h4><span class="twitterwidget twitterwidget-title">Follow Us</span></h4><div class="twitter-avatar"><a href="http://twitter.com/themebound" title="Themebound" target="_blank"><img alt="Themebound" src="https://pbs.twimg.com/profile_images/2165760034/logo_normal.jpg"></a></div><ul><li><span class="entry-content">NEW! Block downvoting verified <a href="http://twitter.com/search?q=%23deal" class="twitter-hashtag" target="_blank">#deal</a> / <a href="http://twitter.com/search?q=%23offer" class="twitter-hashtag" target="_blank">#offer</a> / <a href="http://twitter.com/search?q=%23coupon" class="twitter-hashtag" target="_blank">#coupon</a> on Clipper <a href="http://twitter.com/search?q=%23discount" class="twitter-hashtag" target="_blank">#discount</a> theme! <a href="http://twitter.com/search?q=%23wordpress" class="twitter-hashtag" target="_blank">#wordpress</a> <a href="http://t.co/VL3MMhPIpa" target="_blank">http://t.co/VL3MMhPIpa</a></span> <span class="entry-meta"><span class="time-meta"><a href="http://twitter.com/themebound/statuses/638392629923852288" target="_blank">10:17:18 PM August 31, 2015</a></span> <span class="from-meta">from <a href="http://www.facebook.com/twitter" rel="nofollow">Facebook</a></span></span> <span class="intent-meta"><a href="http://twitter.com/intent/tweet?in_reply_to=638392629923852288" data-lang="en" class="in-reply-to" title="Reply" target="_blank">Reply</a><a href="http://twitter.com/intent/retweet?tweet_id=638392629923852288" data-lang="en" class="retweet" title="Retweet" target="_blank">Retweet</a><a href="http://twitter.com/intent/favorite?tweet_id=638392629923852288" data-lang="en" class="favorite" title="Favorite" target="_blank">Favorite</a></span></li><li><span class="entry-content">FlatRoller <a href="http://twitter.com/search?q=%23job" class="twitter-hashtag" target="_blank">#job</a> listing child theme updated to 1.1.1 and is now compatible with <a href="http://twitter.com/search?q=%23WordPress" class="twitter-hashtag" target="_blank">#WordPress</a> 4.3 and JobRoller 1.8.2! <a href="http://t.co/HzNzwO6Z4H" target="_blank">http://t.co/HzNzwO6Z4H</a></span> <span class="entry-meta"><span class="time-meta"><a href="http://twitter.com/themebound/statuses/636847573735575552" target="_blank">03:57:48 PM August 27, 2015</a></span> <span class="from-meta">from <a href="http://www.facebook.com/twitter" rel="nofollow">Facebook</a></span></span> <span class="intent-meta"><a href="http://twitter.com/intent/tweet?in_reply_to=636847573735575552" data-lang="en" class="in-reply-to" title="Reply" target="_blank">Reply</a><a href="http://twitter.com/intent/retweet?tweet_id=636847573735575552" data-lang="en" class="retweet" title="Retweet" target="_blank">Retweet</a><a href="http://twitter.com/intent/favorite?tweet_id=636847573735575552" data-lang="en" class="favorite" title="Favorite" target="_blank">Favorite</a></span></li><li><span class="entry-content">FlatPage <a href="http://twitter.com/search?q=%23directory" class="twitter-hashtag" target="_blank">#directory</a> child theme updated to 1.0.6 and is now compatible with <a href="http://twitter.com/search?q=%23WordPress" class="twitter-hashtag" target="_blank">#WordPress</a> 4.3 and Vantage 3.0.3! <a href="http://t.co/8ZDXNVW7j9" target="_blank">http://t.co/8ZDXNVW7j9</a></span> <span class="entry-meta"><span class="time-meta"><a href="http://twitter.com/themebound/statuses/636817612572258304" target="_blank">01:58:44 PM August 27, 2015</a></span> <span class="from-meta">from <a href="http://www.facebook.com/twitter" rel="nofollow">Facebook</a></span></span> <span class="intent-meta"><a href="http://twitter.com/intent/tweet?in_reply_to=636817612572258304" data-lang="en" class="in-reply-to" title="Reply" target="_blank">Reply</a><a href="http://twitter.com/intent/retweet?tweet_id=636817612572258304" data-lang="en" class="retweet" title="Retweet" target="_blank">Retweet</a><a href="http://twitter.com/intent/favorite?tweet_id=636817612572258304" data-lang="en" class="favorite" title="Favorite" target="_blank">Favorite</a></span></li></ul><div class="follow-button"><a href="http://twitter.com/themebound" class="twitter-follow-button" title="Follow @themebound" data-lang="en" target="_blank">@themebound</a></div></div></div><div id="custom-coupons-3" class="box cut widget-custom-coupons"><h4>Popular Coupons</h4><div class="coupon-ticker"><ul class="list"><li><a href="http://demos.themebound.com/flatter/coupons/exclusive-august-offer-for-all-members/">Exclusive August Offer for all members</a> - 4 comments</li>
                                        <li><a href="http://demos.themebound.com/flatter/coupons/offer-of-the-day/">Offer Of the day</a> - 3 comments</li>
                                        <li><a href="http://demos.themebound.com/flatter/coupons/multi-user-plugin/">Multi User Plugin</a> - 3 comments</li>
                                        <li><a href="http://demos.themebound.com/flatter/coupons/books-50-off-or-more/">Books 50 off or more</a> - 0 comments</li>
                                        <li><a href="http://demos.themebound.com/flatter/coupons/best-coupon/">Best Coupon</a> - 0 comments</li>
                                    </ul></div></div>
                        </div>  panel-holder -->

                    </div> <!-- panel -->

                    <div class="bar">

                        <div class="bar-holder">

                            <ul id="menu-footer" class="menu"><li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26"><a href="<?php echo base_url(); ?>discounts">Home</a></li>
                               
                            </ul>			<p>Copyright © 2017 | <a target="_blank" href="#" title="Hereyago">Hereyago.com</a> | Powered by <a target="_blank" href="http://www.asokaa.net/" title="Asokaa developers">Asokaa Developers Pvt. Ltd.</a></p>

                        </div>

                    </div>

                </div>
                </body>

                </html>
