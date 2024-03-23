<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>A Simple Responsive HTML Email</title>
  <style type="text/css">
  body {margin: 0; padding: 0; min-width: 100%!important;}
  img {height: auto;}
  .content {width: 100%; max-width: 600px;}
  .header {padding: 15px 30px 20px 30px;}
  .innerpadding {padding: 30px 30px 30px 30px;}
  .borderbottom {border-bottom: 1px solid #9a7b7b;}
  .h1, .h2, .bodycopy {color: #153643; font-family: sans-serif;}
  .h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
  .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
  .bodycopy {font-size: 16px; line-height: 22px;}
  .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
  .button a {color: #ffffff; text-decoration: none;}
  .footer {padding: 20px 30px 15px 30px;}
  .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
  .footercopy a {color: #ffffff; text-decoration: underline;}

  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
  body[yahoo] .hide {display: none!important;}
  body[yahoo] .buttonwrapper {background-color: transparent!important;}
  body[yahoo] .button {padding: 0px!important;}
  body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
  body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
  }

  /*@media only screen and (min-device-width: 601px) {
    .content {width: 600px !important;}
    .col425 {width: 425px!important;}
    .col380 {width: 380px!important;}
    }*/

  </style>
</head>

<body yahoo bgcolor="#f6f8f1">
<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td>
    <!--[if (gte mso 9)|(IE)]>
      <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
    <![endif]-->     
    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td bgcolor="#010149" class="header">
          <!--[if (gte mso 9)|(IE)]>
                    <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td>
                  <![endif]-->
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="h2" style="padding: 5px 0 0 0; color: #fff; text-align: center;">
                
                Booking Management
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="innerpadding borderbottom">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="bodycopy">
                <h4>Dear {{$user->name}},</h4>
                
                <p>We are thrilled to confirm your booking with us! Your reservation/booking number is [Reservation/Booking Number].</p>
                <p>
                  <b>Details:</b>
                </p>
                <p>Date: {{date('d M Y', strtotime($user->booking->created_at))}}</p>
                <p>Room Type: {{$user->booking->hotel->name}}</p>
                <p>Room Type: {{$user->booking->hotel->location}}</p>
                <p>Room Type: {{$user->booking->room_type}}</p>
                <p>Check In: {{$user->booking->check_in}}</p>
                <p>Check Out: {{$user->booking->check_out}}</p>
                <p>Occupants: {{$user->booking->occupants}}</p>
                <p>Number of Room: {{$user->booking->number_of_room}}</p>
                <p>
                  <b>Thank you</b>
                </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="innerpadding bodycopy" style="color: #ab5701;">
          For Any Queries, Please mail to support@example.com
        </td>
      </tr>
      <tr>
        <td class="footer" bgcolor="#010149">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center" class="footercopy">
                Booking Management © 2024 All rights reserved<br />
                <a href="https://www.example.com" class="unsubscribe">
                  <font color="#ffffff">Unsubscribe</font>
                </a>
                <span class="hide">If don't like these emails</span>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>
</body>
</html>
