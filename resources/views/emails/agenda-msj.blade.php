<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body style="font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td align="center" style="padding: 20px 0;">
                
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #dee2e6; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    
                    <tr>
                        <td style="padding: 40px 30px 20px 30px; text-align: center;">
                            <img src="{{ asset('img/logo_rednet.png') }}" alt="Logo Pan Express" width="200" style="display: block; margin: 0 auto; max-width: 220px; height: auto; border: 0;">
                            <hr style="width: 80%; border: 0; border-top: 5px solid #162661; margin: 20px auto 0 auto; opacity: 1;">
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 20px 40px 30px 40px;">
                            <p style="color: #555555; font-size: 16px; line-height: 1.6;">{!! $body !!}</p>                            
                        </td>
                    </tr>
                    <!-- FOOTER -->
                    <tr>                        
                        <td bgcolor="#162661" style="padding: 30px 10px; color: #ffffff;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td width="33%" align="center" style="vertical-align: middle;">
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="center">
                                                    <a href="https://www.instagram.com/rednetve/" target="_blank">
                                                        <img src="{{ asset('img/instagram_blanco.png') }}" width="32" alt="Instagram" style="display: block; border: 0;">
                                                    </a>
                                                </td>
                                                <td width="10"></td>
                                                <td align="center">
                                                    <a href="https://www.tiktok.com/@rednetve" target="_blank">
                                                        <img src="{{ asset('img/tiktok_blanco.png') }}" width="32" alt="TikTok" style="display: block; border: 0;">
                                                    </a>
                                                </td>
                                                <td width="10"></td>
                                                <td align="center">
                                                    <a href="https://www.youtube.com/@RedNetVE" target="_blank">
                                                        <img src="{{ asset('img/youtube_blanco.png') }}" width="32" alt="Youtube" style="display: block; border: 0;">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                                    <td width="34%" align="center" style="vertical-align: middle; border-left: 1px solid rgba(255,255,255,0.3); border-right: 1px solid rgba(255,255,255,0.3);">
                                        <div style="font-size: 11px; font-family: Arial, sans-serif; line-height: 1.8;">
                                            <a href="mailto:ventas@rednetve.com" style="color: #ffffff; text-decoration: none; font-weight: bold; display: inline-block; margin-bottom: 5px;">
                                                <img src="{{ asset('img/correo_blanco.png') }}" width="14" style="vertical-align: middle; margin-right: 4px;" alt="Email"> ventas@rednetve.com
                                            </a>
                                            <br>
                                            <a href="https://rednetve.com" style="color: #ffffff; text-decoration: none; font-weight: bold; display: inline-block;">
                                                <img src="{{ asset('img/internet_blanco.png') }}" width="14" style="vertical-align: middle; margin-right: 4px;" alt="Web"> rednetve.com
                                            </a>
                                        </div>
                                    </td>

                                    <td width="33%" align="center" style="vertical-align: middle;">
                                        <a href="https://wa.me/5804141869016" style="text-decoration: none; color: #ffffff;">
                                            <img src="{{ asset('img/whatsapp_blanco.png') }}" width="32" alt="WhatsApp" style="display: block; margin: 0 auto 5px auto; border: 0;">
                                            <span style="font-size: 10px; font-family: Arial, sans-serif; font-weight: bold; text-transform: uppercase;">Asesoría</span>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <p style="font-size: 11px; color: #999999; margin-top: 20px; max-width: 600px; text-align: center; line-height: 1.4; font-family: Arial, sans-serif;">
                    &copy; {{ date('Y') }} RedNetVE. Todos los derechos reservados.
                </p>

            </td>
        </tr>
    </table>
</body>
</html>