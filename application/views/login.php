</head>
<body class="">
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>Hereyago</span><strong class="text-primary">Admin</strong></div>
            <p>&nbsp;</p>
            <?php $fattr = array('class' => 'form-signin');
                            echo form_open(site_url(), $fattr);
                            ?>
            <?php
                                if ($this->session->flashdata('failmsg') != '') {
                                    echo ' <div class="alert alert-danger display-hide">' . $this->session->flashdata('failmsg') . '</div>';
                                } else {
                                    echo ' Sign In to your account';
                                }
                                ?>
              <div class="form-group">
                <label for="login-username" class="label-custom">Email Id</label>
                <input id="login-username" type="text" name="email_id" required="">
              </div>
              <div class="form-group">
                <label for="login-password" class="label-custom">Password</label>
                <input id="login-password" type="password" name="password" required="">
              </div>
            <?php echo form_submit(array('value' => 'Login', 'class' => 'btn btn-lg btn-primary')); ?>
              <!-- This should be submit button but I replaced it with <a> for demo purposes-->
            <?php echo form_close(); ?>
          </div>
          <div class="copyrights text-center">
            <p>Design by <a href="" class="external">Asokaa Developers Pvt. Ltd.</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap and necessary plugins -->

    <script>
        function verticalAlignMiddle()
        {
            var bodyHeight = $(window).height();
            var formHeight = $('.vamiddle').height();
            var marginTop = (bodyHeight / 2) - (formHeight / 2);
            if (marginTop > 0)
            {
                $('.vamiddle').css('margin-top', marginTop);
            }
        }
        $(document).ready(function ()
        {
            verticalAlignMiddle();
        });
        $(window).bind('resize', verticalAlignMiddle);
    </script>
