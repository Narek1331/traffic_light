<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Traffic Light</title>
    <link rel="stylesheet" href="css/traffic_light.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
<div class="traffic-light-container">
        <div class="traffic-light">
            <div class="light green"></div>
            <div class="light yellow"></div>
            <div class="light red"></div>
            <button id="btnNext">Вперед</button>
        </div>
        <table id="logTable">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Event</th>
                </tr>
            </thead>
            <tbody id="logTableBody">
                <!-- Log rows will be added dynamically here -->
            </tbody>
        </table>
    </div>

    <script src="js/traffic_light.js"></script>
</body>
</html>
