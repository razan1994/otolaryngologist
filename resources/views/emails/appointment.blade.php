<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $subject ?? 'Appointment Details' }}</title>
    <style>
        body { background: #f9f9f9; color: #222; font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .email-container { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 12px rgba(44,62,125,0.07); padding: 32px; }
        .header { background: #2c3e7d; color: #fff; padding: 16px 0; border-radius: 8px 8px 0 0; text-align: center; }
        .details-table { width: 100%; border-collapse: collapse; margin: 24px 0; }
        .details-table th, .details-table td { text-align: left; padding: 8px 12px; }
        .details-table th { background: #f0f4fa; color: #2c3e7d; }
        .details-table tr:nth-child(even) { background: #f9f9f9; }
        .footer { text-align: center; color: #888; font-size: 0.95em; margin-top: 32px; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h2>{{ $subject ?? 'Appointment Details' }}</h2>
        </div>
        <table class="details-table">
            <tr><th>First Name</th><td>{{ $first_name }}</td></tr>
            <tr><th>Last Name</th><td>{{ $last_name }}</td></tr>
            <tr><th>Phone</th><td>{{ $phone }}</td></tr>
            <tr><th>Country Key</th><td>{{ $country_key }}</td></tr>
            <tr><th>Appointment Date</th><td>{{ $appointment_date }}</td></tr>
            <tr><th>Start Time</th><td>{{ $start_time }}</td></tr>
            <tr><th>End Time</th><td>{{ $end_time }}</td></tr>
            <tr><th>Notes</th><td>{{ $notes }}</td></tr>
        </table>
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name', 'Otolaryngologist') }}. All rights reserved.
        </div>
    </div>
</body>
</html>
