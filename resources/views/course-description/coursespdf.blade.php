<!DOCTYPE html>
<html>
<head>
    <title>Course Details</title>
    <style>
        /* Define your styling for the PDF content */
    </style>
</head>


<body>


<table class="table table-striped table-nowrap custom-table mb-0 datatable">
                                        <thead>
                                            <tr>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Credit Hours</th>
                                            <th>Program</th>

                                            <th>Pre Requisites</th>
                                            <th>Post Requisites</th>
                                            <th>Topics</th>
                                            <th>Assessments</th>
                                            <th>Coordinator</th>
                                            <th>Text Books</th>
                                            <th>Course Duration</th>
                                            <th>Instructor Name</th>
                                            <th>Topics Covered</th>

                                                <th>Week Number</th>
                                                <th>Lecture Number</th>
                                                <th>Contents</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                             
                                            <td>{{$course->course_code}}</td>
                                            <td>{{$course->course_title}}</td>
                                            <td>{{$course->credit_hours}}</td>
                                            <td>{{$course->program}}</td>

                                            <td>{{$course->pre_requisites}}</td>
                                            <td>{{$course->post_requisites}}</td>
                                            <td>{{$course->topics}}</td>
                                            <td>{{$course->assessments}}</td>
                                            <td>{{$course->course_coordinator}}</td>
                                            <td>{{$course->text_books}}</td>
                                            <td>{{$course->course_duration}}</td>
                                            <td>{{$course->instructor_name}}</td>
                                            <td>{{$course->topics_covered}}</td>


                                                <td>{{$coursedesc->week_no}}</td>
                                                <td>{{$coursedesc->lecture_no}}</td>
                                                <td>{{$coursedesc->contents}}</td>

                                            </tr>
                                        </tbody>
                                    </table>



</body> 
</html>
