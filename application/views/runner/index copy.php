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


                            <div class="checkr-candidates-step">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> First Name </label>
                                            <br />
                                            <input placeholder="example: John" autofocus="autofocus" class="form-control" type="text" value="" name="checkr_candidate[first_name]" id="checkr_candidate_first_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Middle Name </label>
                                            <br />
                                            <input placeholder="example: Peter" class="form-control" disabled="disabled" type="text" name="checkr_candidate[middle_name]" id="checkr_candidate_middle_name" />
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input name="checkr_candidate[no_middle_name]" type="hidden" value="0" /><input class="js-no-middle-name" type="checkbox" value="1" checked="checked" name="checkr_candidate[no_middle_name]" id="checkr_candidate_no_middle_name" />
                                                I don't have a middle name
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <br />
                                            <input placeholder="example: Smith" class="form-control" type="text" value="" name="checkr_candidate[last_name]" id="checkr_candidate_last_name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <br />
                                            <input placeholder="example: john.smith@gmail.com" class="form-control" type="text" value="" name="checkr_candidate[email]" id="checkr_candidate_email" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <br />
                                            <input placeholder="example: 111-111-1111" class="form-control" type="text" value="" name="checkr_candidate[phone]" id="checkr_candidate_phone" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Date of birth</label>
                                        <br />
                                        <div class="checkr-candidates-form__date form-group clearfix">
                                            <select id="checkr_candidate_date_of_birth_2i" name="checkr_candidate[date_of_birth(2i)]" class="form-control month" required="required">
                                                <option value="">- month -</option>
                                                <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                            <select id="checkr_candidate_date_of_birth_3i" name="checkr_candidate[date_of_birth(3i)]" class="form-control day" required="required">
                                                <option value="">- day -</option>
                                                <?php for ($j = 1; $j <= 31; $j++) { ?>
                                                    <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                                <?php } ?>

                                            </select>
                                            <select id="checkr_candidate_date_of_birth_1i" name="checkr_candidate[date_of_birth(1i)]" class="form-control year" required="required">
                                                <option value="">- year -</option>
                                                <?php for ($k = 1918; $k <= 2000; $k++) { ?>
                                                    <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                                                <?php } ?>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Social security #</label>
                                            <br />
                                            <input placeholder="example: 111-22-7777" class="form-control excluded-from-tracking" type="text" name="checkr_candidate[social_security]" id="checkr_candidate_social_security" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Current zip code</label>
                                            <br />
                                            <input placeholder="example: 11223" class="form-control" type="text" name="checkr_candidate[current_zip_code]" id="checkr_candidate_current_zip_code" />
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group driver-license-state">
                                            <label>  Driver license state </label>
                                            <br />
                                            <select class="form-control excluded-from-tracking js-driver-license-state-select" name="checkr_candidate[driver_license_state]" id="checkr_candidate_driver_license_state">
                                                <option value=""></option>
                                                <?php if (count($us_states) > 0) {
                                                    foreach($us_states as $row) { ?>
                                                         <option value="<?php echo $row->abbr; ?>"><?php echo $row->name; ?></option>
                                                   <?php }
                                                } else {
                                                    ?>
                                                    <option value="AL">Alabama</option>
                                                    <option value="AK">Alaska</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="CA">California</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="DC">District of Columbia</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WA">Washington</option>
                                                    <option value="WV">West Virginia</option>
                                                    <option value="WI">Wisconsin</option>
                                                    <option value="WY">Wyoming</option></select>
<?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>  Driver license # </label>
                                            <br />
                                            <input placeholder="Driver license #" class="form-control excluded-from-tracking" type="text" name="checkr_candidate[driver_license_number]" id="checkr_candidate_driver_license_number" />
                                        </div>
                                    </div>
                                </div>

                                <hr class="content__divider" />

                                <h5>
                                    <b>A Summary of Your Rights Under the Fair Credit Reporting Act</b>
                                </h5>
                                <div class="checkr-candidates-form__concert form-group">
                                    <div class="checkr-candidates-form__concert-content panel">
                                        <div class="panel-body">
                                            The federal Fair Credit Reporting Act (FCRA) promotes the accuracy, fairness, and privacy of information in the files of consumer reporting agencies. There are many types of consumer reporting agencies, including credit bureaus and specialty agencies (such as agencies that sell information about check writing histories, medical records, and rental history records). Here is a summary of your major rights under the FCRA. For more information, including information about additional rights, go to <a href="http://www.ftc.gov/credit" target="_blank">www.ftc.gov/credit</a> or write to: Consumer Financial Protection Bureau, 1700 G Street N.W., Washington, DC 20552.
                                            <br /><br />

                                            <ul>
                                                <li>
                                                    You must be told if information in your file has been used against you. Anyone who uses a credit report or another type of consumer report to deny your application for credit, insurance, or employment - or to take another adverse action against you - must tell you, and must give you the name, address, and phone number of the agency that provided the information.
                                                </li>

                                                <li>
                                                    You have the right to know what is in your file. You may request and obtain all the information about you in the files of a consumer reporting agency (your “file disclosure”). You will be required to provide proper identification, which may include your Social Security number. In many cases, the disclosure will be free. You are entitled to a free file disclosure if:
                                                </li>

                                                <ul>
                                                    <li>a person has taken adverse action against you because of information in your credit report;</li>
                                                    <li>you are the victim of identity theft and place a fraud alert in your file;</li>
                                                    <li>your file contains inaccurate information as a result of fraud;</li>
                                                    <li>you are on public assistance;</li>
                                                    <li>you are unemployed but expect to apply for employment within 60 days.</li>
                                                    <li>In addition, all consumers are entitled to one free disclosure every 12 months upon request from each nationwide credit bureau and from nationwide specialty consumer reporting agencies. See <a href="http://www.consumerfinance.gov/learnmore" target="_blank">www.consumerfinance.gov/learnmore</a> for additional information.</li>
                                                </ul>

                                                <li>
                                                    You have the right to ask for a credit score. Credit scores are numerical summaries of your credit-worthiness based on information from credit bureaus. You may request a credit score from consumer reporting agencies that create scores or distribute scores used in residential real property loans, but you will have to pay for it. In some mortgage transactions, you will receive credit score information for free from the mortgage lender.
                                                </li>

                                                <li>
                                                    You have the right to dispute incomplete or inaccurate information. If you identify information in your file that is incomplete or inaccurate, and report it to the consumer reporting agency, the agency must investigate unless your dispute is frivolous. See <a href="http://www.consumerfinance.gov/learnmore" target="_blank">www.consumerfinance.gov/learnmore</a> for an explanation of dispute procedures.
                                                </li>

                                                <li>
                                                    Consumer reporting agencies must correct or delete inaccurate, incomplete, or unverifiable information. Inaccurate, incomplete or unverifiable information must be removed or corrected, usually within 30 days. However, a consumer reporting agency may continue to report information it has verified as accurate.
                                                </li>

                                                <li>
                                                    Consumer reporting agencies may not report outdated negative information. In most cases, a consumer reporting agency may not report negative information that is more than seven years old, or bankruptcies that are more than 10 years old.
                                                </li>

                                                <li>
                                                    Access to your file is limited. A consumer reporting agency may provide information about you only to people with a valid need -- usually to consider an application with a creditor, insurer, employer, landlord, or other business. The FCRA specifies those with a valid need for access.
                                                </li>
                                                <li>
                                                    You must give your consent for reports to be provided to employers. A consumer reporting agency may not give out information about you to your employer, or a potential employer, without your written consent given to the employer. Written consent generally is not required in the trucking industry. For more information, go to <a href="http://www.consumerfinance.gov/learnmore" target="_blank">www.consumerfinance.gov/learnmore</a>.</li>
                                                <li>
                                                    You may limit "prescreened" offers of credit and insurance you get based on information in your credit report. Unsolicited "prescreened" offers for credit and insurance must include a toll-free phone number you can call if you choose to remove your name and address from the lists these offers are based on. You may opt-out with the nationwide credit bureaus at 1-888-567-8688.
                                                </li>

                                                <li>
                                                    You may seek damages from violators. If a consumer reporting agency, or, in some cases, a user of consumer reports or a furnisher of information to a consumer reporting agency violates the FCRA, you may be able to sue in state or federal court.
                                                </li>

                                                <li>
                                                    Identity theft victims and active duty military personnel have additional rights. For more information, visit <a href="http://www.consumerfinance.gov/learnmore" target="_blank">www.consumerfinance.gov/learnmore</a>.
                                                </li>

                                                States may enforce the FCRA, and many states have their own consumer reporting laws. In some cases, you may have more rights under state law. For more information, contact your state or local consumer protection agency or your state Attorney General. For Information about your Federal rights contact:<br />
                                            </ul>

                                            <hr class="invisible">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>TYPE OF BUSINESS:</th>
                                                        <th>CONTACT:</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            1. a. Banks, savings associations, and credit unions with total assets of over $10 billion and their affiliates.
                                                            <br />
                                                            b. Such affiliates that are not banks, savings associations, or credit unions also should list, in addition to the CFPB:
                                                        </td>
                                                        <td>
                                                            a. Consumer Financial Protection Bureau
                                                            1700 G Street NW
                                                            Washington, DC 20552

                                                            <br />
                                                            b. Federal Trade Commission:
                                                            Consumer Response Center – FCRA
                                                            Washington, DC 20580 (877) 382-4357
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            2. To the extent not included in item 1 above:
                                                            a. National banks, federal savings associations and federal branches and federal agencies of foreign banks
                                                            b. State member banks, branches and agencies of foreign banks (other than federal branches, federal agencies and Insured State Branches of Foreign Banks), commercial lending companies owned or controlled by foreign banks, and organizations operating under section 25 or 25A of the Federal Reserve Act
                                                            c. Nonmember Insured Banks, Insured State Branches of Foreign Banks, and insured state savings associations
                                                            d. Federal Credit Unions
                                                        </td>
                                                        <td>
                                                            a. Office of the Comptroller of the Currency
                                                            Customer Assistance Group 1301 McKinney Street, Suite 3450 Houston, TX 77010-9050
                                                            b. Federal Reserve Consumer Help Center
                                                            PO Box 1200
                                                            Minneapolis, MN 55480
                                                            c. FDIC Consumer Response Center
                                                            1100 Walnut St., Box #11
                                                            Kansas City, MO 64106
                                                            d. National Credit Union Administration
                                                            Office of Consumer Protection (OCP)
                                                            Division of Consumer Compliance and Outreach (DCCO)
                                                            1775 Duke Street
                                                            Alexandria, VA 22314
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            3. Air carriers
                                                        </td>
                                                        <td>
                                                            Asst. General Counsel for Aviation Enforcement & Proceedings
                                                            Aviation Consumer Protection Division
                                                            Department of Transportation
                                                            1200 New Jersey Avenue, S.E.
                                                            Washington, DC 20590
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            4. Creditors Subject to Surface Transportation Board
                                                        </td>
                                                        <td>
                                                            Office of Proceedings, Surface Transportation Board
                                                            Department of Transportation
                                                            395 E Street, S.W.
                                                            Washington, DC 20423
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            5. Creditors Subject to Packers and Stockyards Act, 1921
                                                        </td>
                                                        <td>
                                                            Nearest Packers and Stockyards Administration area Supervisor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            6. Small Business Investment Companies
                                                        </td>
                                                        <td>
                                                            Associate Deputy Administrator for Capital Access
                                                            United States Small Business Administration
                                                            409 Third Street, SW, 8th Floor
                                                            Washington, DC 20416
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            7. Brokers and Dealers
                                                        </td>
                                                        <td>
                                                            Securities and Exchange Commission 100 F Street, N.E. Washington, DC 20549
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            8. Federal Land Banks, Federal Land Bank Associations, Federal Intermediate Credit Banks and Production Credit Associations
                                                        </td>
                                                        <td>
                                                            Farm Credit Administration 1501 Farm Credit Drive McLean, VA 22102-5090
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            9. Retailers, Finance Companies, and All Other Creditors Not Listed Above
                                                        </td>
                                                        <td>
                                                            FTC Regional Office for region in which the creditor operates or Federal Trade Commission: Consumer Response Center - FCRA Washington, DC 20580 (877) 382-4357
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="checkbox">
                                        <label for="consent">
                                            <input type="checkbox" name="consent" id="consent" value="true" required="required" />
                                            I acknowledge receipt of the Summary of Your Rights Under the Fair Credit Reporting Act (FCRA) and certify that I have read and understand this document
                                        </label>    </div>
                                </div>

                                <hr class="content__divider" />

                                <div class="clearfix">
                                    <button type="button" class="btn btn-primary btn-wide next-step pull-right">Next Step</button>
                                </div>
                            </div>

                            <div class="hide checkr-candidates-step">
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
                                    <button type="button" class="btn btn-default btn-wide prev-step pull-left">Previous Step</button>
                                    <button type="button" class="btn btn-primary btn-wide next-step pull-right">Next Step</button>
                                </div>
                            </div>

                            <div class="hide checkr-candidates-step" data-just-for-state="CA">
                                <h3>California applicants only</h3>

                                <blockquote style="font-size: 14px;">
                                    <p>
                                        Under California Civil Code section 1786.22, you are entitled to find out what is in the CRA’s file on you with proper identification, as follows:
                                    </p>

                                    <ul>
                                        <li>In person, by visual inspection of your file during normal business hours and on reasonable notice. You also may request a copy of the information in person. The CRA may not charge you more than the actual copying costs for providing you with a copy of your file.</li>
                                        <li>A summary of all information contained in the CRA file on you that is required to be provided by the California Civil Code will be provided to you via telephone, if you have made a written request, with proper identification, for telephone disclosure, and the toll charge, if any, for the telephone call is prepaid by or charged directly to you.</li>
                                        <li>By requesting a copy be sent to a specified addressee by certified mail. CRAs complying with requests for certified mailings shall not be liable for disclosures to third parties caused by mishandling of mail after such mailings leave the CRAs.</li>
                                    </ul>

                                    <p>
                                        “Proper Identification” includes documents such as a valid driver’s license, social security account number, military identification card, and credit cards. Only if you cannot identify yourself with such information may the CRA require additional information concerning your employment and personal or family history in order to verify your identity. The CRA will provide trained personnel to explain any information furnished to you and will provide a written explanation of any coded information contained in files maintained on you. This written explanation will be provided whenever a file is provided to you for visual inspection. You may be accompanied by one other person of your choosing, who must furnish reasonable identification. An CRA may require you to furnish a written statement granting permission to the CRA to discuss your file in such person’s presence.
                                    </p>
                                </blockquote>

                                <div class="form-group checkr-candidates-form__concert">
                                    <div class="checkbox">
                                        <label for="california_disclosure_consent">
                                            <input type="checkbox" name="california_disclosure_consent" id="california_disclosure_consent" value="true" required="required" />
                                            I acknowledge receipt of the California Disclosure and certify that I have read and understand this document.
                                        </label>    </div>
                                </div>

                                <hr class="content__divider" />

                                <div class="clearfix">
                                    <button type="button" class="btn btn-default btn-wide prev-step pull-left">Previous Step</button>
                                    <button type="button" class="btn btn-primary btn-wide next-step pull-right">Next Step</button>
                                </div>
                            </div>

                            <div class="hide checkr-candidates-step">
                                <h3>Acknowledgement and Authorization for background check</h3>

                                <blockquote style="font-size: 14px;">
                                    <p>
                                        I acknowledge receipt of the separate documents entitled Disclosure Regarding Background Investigation and A Summary of Your Rights Under the Fair Credit Reporting Act and certify that I have read and understand both of those documents. I hereby authorize the obtaining of “consumer reports” and/or “investigative consumer reports” by the Company at any time after receipt of this authorization and throughout my employment, if applicable and to the extent permitted by law. For the purpose of preparing a background check for Company, I hereby authorize any law enforcement agency, administrator, state or federal agency, institution, school or university (public or private), information service bureau, past or present employers, motor vehicle records agencies, or insurance company to furnish any and all background information requested by <b>Checkr, Inc., One Montgomery Street, Suite 2000 San Francisco, CA 94104 | 844­824­3257 |</b> <a href="https://checkr.com/applicant" target="_blank" ref="nofollow noopener">https://checkr.com/applicant</a>, as allowed by law, including information concerning my employment and earnings history, education, credit history, motor vehicle history, criminal history, military service, and professional credentials and licenses. I agree that an electronic copy of this Authorization shall be as valid as the original.
                                    </p>

                                    <p>
                                        <b>Massachusetts applicants only:</b> Upon written request to the Company, you have the right to know whether the Company ordered an investigative consumer report about you. You also have the right to request from the consumer reporting agency a copy of any such report.
                                    </p>

                                    <p>
                                        <b>Minnesota applicants only:</b> Upon a written request, you have the right to a complete and accurate disclosure of the nature and scope of any consumer report the Company ordered about you. The consumer reporting agency must provide you with this disclosure within 5 business days after its receipt of your request or the report was requested by the Company, whichever date is later.
                                    </p>

                                    <p>
                                        <b>New Jersey applicants only:</b> You have the right to submit a request to the CRA for a copy of any investigative consumer report the Company ordered about you.
                                    </p>

                                    <p>
                                        <b>New York applicants only:</b> Upon request, you will be informed whether or not a consumer report was requested by the Company, and if such report was requested, informed of the name and address of the consumer reporting agency that furnished the report. You have the right to inspect and receive a copy of any investigative consumer report requested by the Company by contacting the consumer reporting agency identified above directly. By signing below, you acknowledge receipt of Article 23­A of the New York Correction Law. <a href="https://www.labor.ny.gov/formsdocs/wp/correction-law-article-23a.pdf" target="_blank" ref="nofollow noopener">Link to NY Article 23­A</a>
                                    </p>

                                    <p>
                                        <b>New York City applicants only:</b> You acknowledge and authorize the Employer to provide any notices required by federal, state or local law to you at the address(es) and/or email address(es) you provided to the Employer.</a>
                                    </p>

                                    <p>
                                        <b>Washington State applicants only:</b> Upon written request to Company, you have the right to a complete and accurate disclosure of the nature and scope of any investigative consumer report the Company ordered about you. You are entitled to this disclosure within 5 business days after the date your request is received or we ordered the report, whichever is later. You also have the right to request from the consumer reporting agency a written summary of your rights and remedies under the Washington Fair Credit Reporting Act.
                                    </p>

                                    <p>
                                        <b>San Francisco applicants only:</b> Please click below for the San Francisco Fair Chance Act Notice.
                                    <ul>
                                        <li><a href="http://sfgov.org/olse/sites/default/files/FileCenter/Documents/11600-Art%20%2049%20Official%20Notice%20Final%20091114.pdf" target="_blank" ref="nofollow noopener">English</a></li>
                                        <li><a href="http://sfgov.org/olse/sites/default/files/FileCenter/Documents/12076-Art%20%2049%20Official%20Notice%20Final%20Spanish%20New%20%282%299.16.14.pdf" target="_blank" ref="nofollow noopener">Spanish</a></li>
                                        <li><a href="http://sfgov.org/olse/sites/default/files/FileCenter/Documents/12074-Art%20%2049%20Official%20Notice%20Final_Tagalog_addl%209.16.14.pdf" target="_blank" ref="nofollow noopener">Tagalog</a></li>
                                        <li><a href="http://sfgov.org/olse/sites/default/files/FileCenter/Documents/12075-Art%2049%20Official%20Notice%20Final%20Chinese%20%282%29%209.16.14.pdf" target="_blank" ref="nofollow noopener">Chinese</a></li>
                                    </ul>
                                    </p>

                                </blockquote>

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label for="checkr_candidate_copy_requested">
                                            <input type="checkbox" name="checkr_candidate[copy_requested]" id="checkr_candidate_copy_requested" value="true" />
                                            Please check this box if you would like to receive a copy of a consumer report if one is obtained by the Company.
                                        </label>    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <label style="font-weight: 400" for="signature">Electronic Signature</label>
                                        <input type="text" name="signature" id="signature" class="form-control" placeholder="Full Name" />
                                    </div>
                                </div>

                                <hr class="content__divider" />

                                <div class="clearfix">
                                    <button type="button" class="btn btn-default btn-wide prev-step pull-left">Previous Step</button>
                                    <input type="submit" name="commit" value="Submit Form" class="btn btn-primary btn-wide pull-right" />
                                </div>
                            </div>

                        </form>  </div>
                </div>

            </div>
        </div>


    </body>
</html>