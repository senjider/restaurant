<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>{{ __('Ingredient Stock Alert') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet" type="text/css">
    <!-- Web Font / @font-face : BEGIN -->
    <!--[if mso]>
    <style>
        * {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
    <![endif]-->

    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Poppins', sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color:#8094ae;
            font-weight: 400;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif !important;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        .email-body {
            width: 96%;
            margin: 0 auto;
            background: #ffffff;
            padding: 10px !important;
        }
        .email-heading {
            font-size: 18px;
            color: #328af100;
            font-weight: 600;
            margin: 0;
            line-height: 1.4;
        }
        .email-heading-s2 {
            font-size: 16px;
            color: #328af100;
            font-weight: 600;
            margin: 0;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }
        .email-note {
            margin: 0;
            font-size: 13px;
            line-height: 22px;
            color: #328af100;
        }
    </style>
</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;">
<center style="width: 100%; background-color: #f5f6fa;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
        <tr>
            <td style="padding: 40px 0;">
                <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                    <tbody class="email-body">
                    <tr>
                        <td style="text-align: center; padding: 50px 30px 10px 30px;">
                            <h2 class="email-heading">{{ __('Ingredient Stock Alert') }}</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 15px 30px">
                            <p>{{__('Name')}}: {{ $data['ingredient'] }}</p>
                            <p>{{__('Current Stock')}}: {{ $data['current_stock'] }}</p>
                        </td>
                    </tr>

                    </tbody>
                </table>
                <table style="width:100%;max-width:620px;margin:0 auto;">
                    <tbody>
                    <tr>
                        <td style="text-align: center; padding:25px 20px 0;">
                            <p style="font-size: 13px;">CopyRights</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</center>
</body>
</html>
