<!DOCTYPE html>
<html>
<head>
    <title>Attendance</title>
    <style>
        /* Define your styling for the PDF content */
    </style>
</head>
<body>
    <h1>Attendance</h1>
    <p><strong>Title:</strong> {{ $attendance->title }}</p>
    <p><strong>Description:</strong> {{ $attendance->description }}</p>
    <p><strong>Document Path:</strong> {{ $attendance->document_path }}</p>
    <p><strong>Roll No:</strong> {{ $attendance->roll_no }}</p>
    <p><strong>Student Name:</strong> {{ $attendance->student_name }}</p>
    <p><strong>Activity Ref:</strong> {{ $attendance->activity_ref }}</p>
    <p><strong>Total Attendance:</strong> {{ $attendance->total_attendence }}</p>
    <p><strong>Total Absents:</strong> {{ $attendance->total_absents }}</p>
    <p><strong>Percentage:</strong> {{ $attendance->percentage }}</p>
    <p><strong>Status:</strong> {{ $attendance->status }}</p>








    <!-- Add more details as needed -->
</body>
</html>
