<!DOCTYPE html>
<html>
<head>
    <title>Lecture Notes</title>
    <style>
        /* Define your styling for the PDF content */
    </style>
</head>
<body>
    <h1>Lecture Notes</h1>
    <p><strong>Lecture No:</strong> {{ $lecture_notes->lecture_number }}</p>
    <p><strong>Topic:</strong> {{ $lecture_notes->topic }}</p>
    <p><strong>Description:</strong> {{ $lecture_notes->description }}</p>
    <p><strong>Notes Path:</strong> {{ $lecture_notes->notes_path }}</p>

    <!-- Add more details as needed -->
</body>
</html>
