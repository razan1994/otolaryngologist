<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $subject ?? 'Appointment Details' }}</title>
</head>
<body style="background: #fbf8f1; color: #212121; font-family: Arial, 'Jost', sans-serif; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 40px auto; background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(18,82,88,0.07); padding: 32px; border: 1px solid #e6e6e6;">
        <div style="text-align: center; margin-bottom: 24px;">
            <img src='{{ asset('front_end_style/assets/img/home1/logo.png') }}' alt="Logo" style="max-width: 180px; margin-bottom: 12px;">
        </div>
        <div style="background: #125258; color: #fff; padding: 18px 0; border-radius: 8px 8px 0 0; text-align: center;">
            <h2 style="margin: 0; font-size: 1.6rem; font-weight: 700; letter-spacing: 1px; font-family: Arial, 'Jost', sans-serif;">{{ $subject ?? 'Appointment Details' }}</h2>
        </div>
        <table style="width: 100%; border-collapse: collapse; margin: 24px 0 0 0; background: #fff;">
            <tr style="background: #f0f4fa; color: #125258;">
                <th style="text-align:left; padding: 10px 14px; font-size: 1rem;">First Name</th>
                <td style="padding: 10px 14px;">{{ $first_name }}</td>
            </tr>
            <tr>
                <th style="text-align:left; padding: 10px 14px; font-size: 1rem; background: #f9f9f9; color: #125258;">Last Name</th>
                <td style="padding: 10px 14px; background: #f9f9f9;">{{ $last_name }}</td>
            </tr>
            <tr>
                <th style="text-align:left; padding: 10px 14px; font-size: 1rem;">Phone</th>
                <td style="padding: 10px 14px;">{{ $phone }}</td>
            </tr>
            <tr>
                <th style="text-align:left; padding: 10px 14px; font-size: 1rem; background: #f9f9f9; color: #125258;">Country Key</th>
                <td style="padding: 10px 14px; background: #f9f9f9;">{{ $country_key }}</td>
            </tr>
            <tr>
                <th style="text-align:left; padding: 10px 14px; font-size: 1rem;">Appointment Date</th>
                <td style="padding: 10px 14px;">{{ $appointment_date }}</td>
            </tr>
            <tr>
                <th style="text-align:left; padding: 10px 14px; font-size: 1rem; background: #f9f9f9; color: #125258;">Start Time</th>
                <td style="padding: 10px 14px; background: #f9f9f9;">{{ $start_time }}</td>
            </tr>
            <tr>
                <th style="text-align:left; padding: 10px 14px; font-size: 1rem;">End Time</th>
                <td style="padding: 10px 14px;">{{ $end_time }}</td>
            </tr>
            <tr>
                <th style="text-align:left; padding: 10px 14px; font-size: 1rem; background: #f9f9f9; color: #125258;">Notes</th>
                <td style="padding: 10px 14px; background: #f9f9f9;">{{ $notes }}</td>
            </tr>
        </table>
        <div style="text-align: center; color: #888; font-size: 0.95em; margin-top: 32px;">
            &copy; {{ date('Y') }} {{ config('app.name', 'Otolaryngologist') }}. All rights reserved.
        </div>
    </div>
</body>
</html>
