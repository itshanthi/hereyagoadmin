<div id="header">
                    <div class="holder holder-panel clearfix">
                        <div class="frame">
                            <div class="panel">
<!--                                <ul id="nav" class="menu">
                                    <li id="menu-item-213" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-213"><a href="#">Directory</a></li>
                                    <li id="menu-item-180" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-180"><a href="#">Classifieds</a></li>
                                    <li id="menu-item-179" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-179"><a href="#">Coupons</a></li>
                                    <li id="menu-item-216" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-216"><a href="#">Jobs</a></li>
                                    <li id="menu-item-181" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-181"><a href="#">WordPress Add-ons</a></li>
                                </ul>-->
                                <div class="bar clearfix">
<!--                                    <ul class="social">
                                        <li><a class="rss" href="#" rel="nofollow" target="_blank"><i class="fa fa-rss"></i>RSS</a></li>
                                        <li><a class="facebook" href="#" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    </ul>-->
<!--                                    <ul class="add-nav">
                                        <li><a href="#">Login</a></li>
                                    </ul>-->
                                </div>
                            </div>
                        </div> <!-- #frame -->
                    </div> <!-- #holder -->
                    <div class="holder holder-logo clearfix">
                        <div class="frame">
                            <div class="header-bar">
                                <div id="logo">
                                    </ul>
                                    <a class="site-logo" href="#">
                                        <img src="<?php echo base_url(); ?>assets/img/logo.png"  class="header-logo img-responsive" alt=""  width="auto" height="66"/>
                                    </a>

                                </div>
                                <div class="search-box">
                                    <form role="search" method="post" class="search" action="<?php echo base_url().'searchResults'; ?>" >
                                        <button value="Search" title="Search" type="submit" class="btn-submit">
                                            <i class="fa fa-search"></i><span>Search</span>
                                        </button>
                                        <label class="screen-reader-text" for="s">Search for:</label>
                                        <input type="search" class="text newtag" id="s" name="keyword" value="" placeholder="Search for coupons" />
                                    </form>
                                    
                                </div>				
                            </div>	
                        </div> <!-- #frame -->
                    </div> <!-- #holder -->
                      <?php if($this->input->get('p') != '') {
                    			$par = '?p='.$this->input->get('p');
                    } else {
                    		$par = '';
                    }
                     if($this->input->get('qcode') != '') {
                    			$par .= '&qcode='.$this->input->get('qcode');
                    } else {
                    		$par = '';
                    }
                    ?>
                    <div class="header_menu">
                        <div class="header_menu_res">
                            <a class="menu-toggle" href="#"><i class="fa fa-reorder"></i>Navigation</a>
                            <ul id="menu-header" class="menu">
                                <li id="menu-item-66" class="menu-item menu-item-type-custom menu-item-object-custom active current_page_item menu-item-home menu-item-66"><a href="<?php echo base_url().'discountsVertical'.$par; ?>">Home</a></li>
                          <li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-71"><a href="#">Stores</a>
                                    <div class="adv_taxonomies" id="adv_stores">
                                        <div class="catcol first">
                                            <?php if(count($stores)>0){ ?>
                                                <ul class="maincat-list">                                                                                           
                                            
                                                <?php foreach($stores as $row) { ?>
                                                    <li class="maincat cat-item-8"><a href="<?php echo base_url() . 'simillarly/' . str_replace(" ", "-", $row); ?>" title="<?php echo $row; ?> "><?php echo $row; ?></a></li>  
                                            <?php }?>
                                                </ul>
                                             <?php }?>
                                        </div>
                                    </div></li>
<!--                                    <li id="menu-item-69" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-69"><a href="#">Categories</a>
                                    <div class="adv_taxonomies" id="adv_categories">
                                        <div class="catcol first">
                                            <?php //if(count($categories)>0){ ?>
                                                <ul class="maincat-list">                                                                                           
                                            
                                                <?php //foreach($categories as $row) { ?>
                                                     <li class="maincat cat-item-8"><a href="<?php //echo base_url() . 'simillarly/' . $row; ?>" title="<?php echo $row; ?> "><?php echo $row; ?></a></li>  
                                            <?php //} ?>
                                                </ul>
                                             <?php //}?>
                                        </div>  
                                    </div></li>-->
<!--                                <li id="menu-item-68" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-68"><a href="#">About</a>
                                    <ul  class="sub-menu">
                                        <li id="menu-item-73" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-73"><a href="#">Sample Page</a></li>
                                    </ul>
                                </li>-->
<!--                                <li id="menu-item-154" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-154"><a href="#">Blog</a></li>
                                <li id="menu-item-166" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-166"><a href="#">Colour Schemes</a>
                                    <ul  class="sub-menu">
                                        <li id="menu-item-167" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-167"><a href="#">Blue</a></li>
                                        <li id="menu-item-169" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-169"><a href="#">Green</a></li>
                                        <li id="menu-item-170" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-170"><a href="#">Red</a></li>
                                        <li id="menu-item-172" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-172"><a href="#">Dark Blue</a></li>
                                        <li id="menu-item-173" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-173"><a href="#">Turquoise</a></li>
                                        <li id="menu-item-174" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-174"><a href="#">Purple</a></li>
                                        <li id="menu-item-175" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-175"><a href="#">Charcoal</a></li>
                                        <li id="menu-item-176" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-176"><a href="#">Grey</a></li>
                                        <li id="menu-item-177" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-177"><a href="#">Bronze</a></li>
                                        <li id="menu-item-178" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-178"><a href="#">Golden</a></li>
                                    </ul>
                                </li>-->
                            </ul>				
<!--                            <a href="#" class="obtn btn">Share Coupon</a>					-->
                            <div class="clr"></div>

                        </div><!-- /header_menu_res -->

                    </div><!-- /header_menu -->
                </div>