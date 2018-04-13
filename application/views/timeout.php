<html>
    <head>
        <title>Timeout</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_timeout.css">
        <link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

        <!-- For-Mobile-Apps-and-Meta-Tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Flat Error Page Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
    </head>
    <body>
        <div class="main">
            <div class="agile">
                <div class="agileits_main_grid">

                    <div class="clear"> </div>
                </div>
                <div class="w3l">
                    <div class="text">
                        <h1>
                            <?php
                            if ($this->session->flashdata('msg') != '') {
                                echo ' <div class="alert alert-success display-hide">' . $this->session->flashdata('msg') . '</div>';
                            } else {
                                echo ' <div class="alert alert-success display-hide">Timeout</div>';
                            }
                            ?>
                        </h1>	

<!--<p>You have been tricked into click on a link that can not be found. Please check the url or go to main page and see if you can locate what you are looking for</p>-->
                    </div>
                    <div class="image">
                        <img src="<?php echo base_url(); ?>assets/img/smile.png">
                    </div>
                    <div class="clear"></div>
                </div>

<!--                <div class="wthree">
                    <div class="back">
                        <a href="#">Back to home</a>
                    </div>
                    <div class="social-icons w3agile">
                        <ul>
                            <li>Follow us on :</li>
                            <li><a href="#" class="facebook"><img src="images/fb.png" title="facebook" alt="facebook"></a></li>
                            <li><a href="#" class="twitter"><img src="images/tw.png" title="twitter" alt="twitter"></a></li>
                            <li><a href="#" class="googleplus"><img src="images/gp.png" title="googleplus" alt="googleplus"></a></li>
                            <div class="clear"></div>
                        </ul>	
                    </div>
                    <div class="clear"></div>
                </div>-->
            </div>
        </div>
    </body>
</html>