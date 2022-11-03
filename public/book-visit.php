<html>
<head>
    <link href="styles/calendar.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php
include 'scripts/Calendar.php';
include 'scripts/Booking.php';
include 'scripts/BookableCell.php';

$booking = new Booking(
    'localhost',
    'bestbarber',
    'root',
    ''
);

$bookableCell = new BookableCell($booking);

$calendar = new Calendar();

$calendar->attachObserver('showCell', $bookableCell);

$bookableCell->routeActions();

echo $calendar->show();
?>
</body>
</html>