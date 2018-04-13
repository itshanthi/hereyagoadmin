<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hereyago</title>
          <script src="<?php echo base_url() . 'assets/runner/js/runner1.js'; ?>"></script>
        <script  src="<?php echo base_url() . 'assets/runner/js/runner2.js'; ?>"></script>
        <script src="<?php echo base_url() . 'assets/runner/js/runner3.js'; ?>"></script>      
        <script src="<?php echo base_url() . 'assets/runner/js/runner4.js'; ?>"></script>
        <script src="<?php echo base_url() . 'assets/runner/js/runner5.js'; ?>"></script>
        <script src="<?php echo base_url() . 'assets/runner/js/runner7.js'; ?>"></script>
        <script src="<?php echo base_url() . 'assets/runner/js/portal-d4fc5415e68faafa9a83d69e8dd14ee194335c0a078a16d2f3ba0b.js'; ?>"></script>
        <script>
            //<![CDATA[
            window.gon = {};
            //]]>
        </script>

        <link href="<?php echo base_url() . 'assets/runner/css/css.css'; ?>" rel="stylesheet" type="text/css">
        <link rel="stylesheet" media="all" href="<?php echo base_url() . 'assets/runner/css/portal.css'; ?>">
    </head>
    <body class="portal-layout portal-layout_no-js checkr_consents new" id="">
        <div class="portal-layout__header">
            <div class="company-header-container row portal-header-bg-color">
                <div class="company-header-container__company-logo-container">
                    <span class="company-logo">
                        <div class="company-logo__logo" style="background-image: url(https://onboardiq.s3-us-west-1.amazonaws.com/uploads/accounts/brand/logo/244/Favor_logo_sm.png?X-Amz-Expires=600&amp;X-Amz-Date=20180221T045111Z&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIAJ3TOVYQA3ZULULQQ/20180221/us-west-1/s3/aws4_request&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Signature=5da5372c0cf8e5c81de26ad9ad65ec72b71e3e01d4629a7d932f8c8ab1a68b0a);"></div>
                    </span>
                </div>
                <div class="company-header-container__right-column">
                </div>
            </div>
            <div class="funnel-title-container">
            </div>
            <style>
                .portal-header-color {
                    color: #ffffff;
                }

                .portal-header-color_with-hover:hover {
                    color: #ffffff;
                }

                .portal-header-bg-color {
                    background-color: #00a1df;
                }

                .portal-sidebar-links {
                    color: #00a1df;
                }

                .btn.btn-primary {
                    color: #00a1df;
                    border-color: #00a1df;
                }
                .btn.btn-primary:hover,.btn.btn-primary:focus,.btn.btn-primary:active {
                    border-color: #00a1df;
                    background-color: #00a1df;
                    color: white;
                }
                .btn.btn-primary.btn-solid {
                    color: white;
                    border-color: #00a1df;
                    background-color: #00a1df;
                }
                .btn.btn-primary.btn-solid:hover,.btn.btn-primary.btn-solid:focus,.btn.btn-primary.btn-solid:active {
                    color: white;
                    border-color: #00a1df;
                    background-color: #00a1df;
                }
                a {
                    color: #00a1df;
                }
                a:hover {
                    color: #00a1df;
                }
            </style>

        </div>
        <noscript class="portal-layout__no-script-message">
        </noscript>
        <div class="portal-layout__container">
            <div class="portal-layout__sidebar">
                <div class="sidebar">
                    <ul class="sidebar__steps">
                        <li class="sidebar__step portal-sidebar-links sidebar__step--active clearfix">
                            <img src="<?php echo base_url() . 'assets/runner/bgc.svg'; ?>" alt="Bgc" />
                            Background Check
                        </li>
                    </ul>
                </div>

            </div>
            <div class="portal-layout__content false">


                <div class="panel">
                    <div class="panel-header ">
                        <div class="panel-header__title">
                            Submit Your Background Check Information
                        </div>
                        <div class="panel-header__divider"></div>
                        <div class="panel-header__instructions">
                            <p>Hereyago does not approve motor vehicle records with the following infractions:<br>* Major violations including DUI, DWI, and reckless driving<br>* More than two moving violations within the last 36 months<br>* Major traffic citations within the last 36 months</p>
                            <p>Hereyago background check covers:<br>* Assault, Battery and other violent crimes<br>* DUI, DWI, and reckless driving<br>* Theft, burglaries and property damage<br>* Sexual offense and harassment<br>* Felonies</p>
                        </div>

                    </div>


                    <div class="panel-body content">
                        <small>
                            Hereyago (the “Company”) has engaged Checkr to obtain a consumer report
                            and/or investigative consumer report for independent contractor or employment purposes. Checkr will provide a background investigation as a
                            pre-condition of your engagement with the Company and in compliance with federal and state employment laws.
                        </small>

                        <hr class="content__divider" />

                 <form class="checkr-candidates-form" id="checkr-candidates-form" action="" accept-charset="UTF-8" method="post">


                            <?php if(isset($emailId) && $emailId !=''){ ?> 
                                       <input type="hidden" name="emailId" value="<?php echo $emailId; ?>"  />
                            <?php } ?>

                            <div class="checkr-candidates-step">
                                <h3>Disclosure Regarding Background Investigation</h3>

                                <blockquote style="font-size: 14px;">
                                    <p>
                                        Hereyago (the “Company”) may obtain information about you from a third party consumer reporting agency for employment purposes. Thus, you may be the subject of a “consumer report” and/or an “investigative consumer report,” as defined in California, which may include information about your character, general reputation, personal characteristics, and/or mode of living, and which can involve personal interviews with sources such as your neighbors, friends, or associates. These reports may contain information regarding your criminal history, motor vehicle records (“driving records”), verification of your education or employment history, or other background checks.
                                    </p>

                                    <p>
                                        You have the right, upon written request made within a reasonable time, to request whether a consumer report has been run about you, and disclosure of the nature and scope of any investigative consumer report and to request a copy of your report. Please be advised that the nature and scope of the most common form of investigative consumer report is an employment history or verification. These searches will be conducted by <b>Checkr, Inc., One Montgomery Street, Suite 2000 San Francisco, CA 94104 | 844­824­3257 |</b> <a href="https://checkr.com/applicant" target="_blank" ref="nofollow noopener">https://checkr.com/applicant</a>. The scope of this disclosure is all­encompassing, however, allowing the Company to obtain from any outside organization all manner of consumer reports throughout the course of your employment to the extent permitted by law.
                                    </p>
                                </blockquote>

                                <div class="form-group checkr-candidates-form__concert">
                                    <div class="checkbox">
                                        <label for="disclosure_consent">
                                            <input type="checkbox" name="disclosure_consent" id="disclosure_consent" value="true" required="required" />
                                            I acknowledge receipt of the Disclosure Regarding Background Check Investigation and certify that I have read and understand this document
                                        </label>    </div>
                                </div>

                                <hr class="content__divider" />

                                <div class="clearfix">
                                    <button type="submit" class="btn btn-default btn-wide pull-left">Previous Step</button>
                                    <button type="submit" class="btn btn-primary btn-wide pull-right">Next Step</button>
                                </div>
                            </div>

                            

                            

                        </form>  </div>
                </div>

            </div>
        </div>


    </body>
</html>