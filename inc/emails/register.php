<?php
function registerTemplate($logo_srs='LOGO', $name='Customer', $site_url='https://neom.com', $instagram_link_srs='', $facebook_link_srs='', $twitter_link_srs='') {
    $html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>

  <!--[if gte mso 9]>
  <xml>
    <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
  </xml>
  <![endif]-->

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="x-apple-disable-message-reformatting">
  <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->

    <!-- Your title goes here -->
    <title>Welcome to Neom!</title>
    <!-- End title -->

    <!-- Start stylesheet -->
    <style type="text/css">
      a,a[href],a:hover, a:link, a:visited {
        /* This is the link colour */
        text-decoration: none!important;
        color: #0000EE;
      }
      .link {
        text-decoration: underline!important;
      }
      p, p:visited {
        /* Fallback paragraph style */
        font-size:15px;
        line-height:24px;
        font-family:"Helvetica", Arial, sans-serif;
        font-weight:300;
        text-decoration:none;
        color: #000000;
      }
      h1 {
        /* Fallback heading style */
        font-size:22px;
        line-height:24px;
        font-family:"Helvetica", Arial, sans-serif;
        font-weight:normal;
        text-decoration:none;
        color: #000000;
      }
      .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td {line-height: 100%;}
      .ExternalClass {width: 100%;}
    </style>
    <!-- End stylesheet -->

</head>

  <!-- You can change background colour here -->
  <body style="text-align: center; margin: 0; padding-top: 10px; padding-bottom: 10px; padding-left: 0; padding-right: 0; -webkit-text-size-adjust: 100%;background-color: #ffffff; color: #000000" align="center">
  
  <!-- Fallback force center content -->
  <div style="text-align: center;">
    
    <!-- Start container for logo -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;" width="600">
      <tbody>
        <tr>
          <td style="width: 596px; vertical-align: top; padding-left: 0; padding-right: 0; padding-top: 15px; padding-bottom: 15px;" width="596">

            <!-- Your logo is here -->
            <img style="width: 55px; max-width: 55px; height: 60px; max-height: 60px; text-align: center; color: #ffffff;" alt="Neom" src="'. $logo_srs .'" align="center" width="55" height="60">
          </td>
        </tr>
      </tbody>
    </table>
    <!-- End container for logo -->

    <!-- Start single column section -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;" width="600">
        <tbody>
          <tr>
            <td style="width: 596px; vertical-align: top; padding: 30px;" width="596">

              <h1 style="font-size: 22px; line-height: 24px; font-family: Arial, sans-serif; font-weight: 600; text-decoration: none; color: #212428;">Welcome to Neom, '. $name .'!</h1>

              <p style="font-size: 16px; line-height: 24px; font-family: Arial, sans-serif; font-weight: 400; text-decoration: none; color: #212428;">Your registration was successful, go to the site and choose your favorite artwork today. Don\'t miss the opportunity to purchase unique digital art right now!</p>              

              <!-- Start button (You can change the background colour by the hex code below) -->
              <a href="'. $site_url .'" target="_blank" style="background-color: #181818; font-size: 15px; line-height: 22px; font-family: Arial, sans-serif; font-weight: normal; text-decoration: none; padding: 12px 32px; color: #ffffff; border-radius: 100px; display: inline-block; mso-padding-alt: 0;">
                  <!--[if mso]>
                  <i style="letter-spacing: 25px; mso-font-width: -100%; mso-text-raise: 30pt;">&nbsp;</i>
                <![endif]-->

                  <span style="mso-text-raise: 15pt; color: #ffffff;">Start Shopping</span>
                  <!--[if mso]>
                  <i style="letter-spacing: 25px; mso-font-width: -100%;">&nbsp;</i>
                <![endif]-->
              </a>
              <!-- End button here -->

            </td>
          </tr>
          <tr>
            <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 30px;" width="596">

              <p style="font-size: 14px; line-height: 24px; font-family: Arial, sans-serif; font-weight: 400; text-decoration: none; color: #606366;">Subscribe to us:</p>

              <p style="margin-bottom: 0; font-size: 13px; line-height: 24px; font-family: Arial, sans-serif; font-weight: 400; text-decoration: none; color: #ffffff;">
                <a target="_blank" href="https://www.instagram.com/art_of_neom/" style="margin-right:25px;">
                    <img style="width: 27px; max-width: 27px; height: 27px; max-height: 27px; text-align: center; color: #ffffff;" alt="Neom" src="'. $instagram_link_srs .'" align="center" width="27" height="27">
                </a>
                <a target="_blank" href="https://www.facebook.com/people/Neom-Art/100090934312897/" style="margin-right:25px;">
                    <img style="width: 14px; max-width: 14px; height: 27px; max-height: 27px; text-align: center; color: #ffffff;" alt="Neom" src="'. $facebook_link_srs .'" align="center" width="14" height="27">
                </a>
                <a target="_blank" href="https://twitter.com/Neom_Art_">
                    <img style="width: 27px; max-width: 27px; height: 27px; max-height: 27px; text-align: center; color: #ffffff;" alt="Neom" src="'. $twitter_link_srs .'" align="center" width="27" height="27">
                </a>
              </p>

            </td>
          </tr>
        </tbody>
      </table>
      <!-- End single column section -->
  </div>
  </body>
</html>';

    return $html;
}