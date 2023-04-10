<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<html style="min-height: 600px; display:grid; place-items: center;">

<div style="font-family: 'Poppins', sans-serif; padding: 20px; border: 1px solid #ccc; box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.2);">
    <div style="background: rgb(29,107,154); background: linear-gradient(349deg, rgba(29,107,154,1) 0%, rgba(29,154,95,1) 81%); color:#fff; padding:0.75rem; border-radius:5px">
        <h1 style="text-align: center; font-weight: 500;">Govithena LK</h1>
    </div>

    <div>
        <h3 style="padding:0; text-transform:capitalize">Dear {{user}},</h3>
        <p>We received a request to reset your password for your account on Govithena LK. Please use the following OTP
            to reset your password:</p>
        <h1 style="padding:0; margin:0; color:#404145; font-size: 2.25rem;">{{otp}}</h1>
        <p>Please note that this OTP is only valid for a single use and will expire in 5 minites. If you did not request
            a password reset, please ignore this email. If you have any questions or concerns, please contact us at
            govithena.lk@gmail.com</p>
        <p>Best regards,</p>
        <p style="padding:0; color:#404145; font-weight: 600;">Govithena LK Team.</p>
    </div>
</div>

</html>