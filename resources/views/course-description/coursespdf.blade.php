<!DOCTYPE html>
<html>
<head>
    <title>Course Details</title>

    <style>
p {
    /* border:1px solid lightgrey; */
    padding: 10px;
 }
   
  h5 {
    margin: 10px 10px;
  }
  
  .contact-info {
    color:#1f1f1f; font-family: 'Raleway',sans-serif; 
  }
  
</style>


</head>


<body>


<div class="crms-title row bg-white" style="margin-bottom:10px">
    <div class="col-xs-12" style="text-align:center">
        <h3 style=" color:#1f1f1f; font-family: 'Raleway',sans-serif;  font-weight: 700; line-height: 40px; margin: 0 0 24px; text-align: center; text-transform: uppercase; margin:0; padding:0;">Abbottabad University of Science and Technology</h3>
       
        <h5>
  <span class="contact-info">Ph:+92 992-811720 | Email: info@aust.edu.pk | Address: Havelian, KPK, Pakistan</span>
</h5>
    </div></div>


    <h1>Course Details</h1>


                                            <p><strong>Course Code: </strong>{{$course->course_code}}</p>
                                            <p><strong>Course Title:</strong> {{$course->course_title}}</p>
                                            <p><strong>Credit Hours:</strong> {{$course->credit_hours}}</p>
                                            <p><strong>Program: </strong>{{$course->program}}</p>

                                            <p><strong>Pre Requisites:</strong> {{$course->pre_requisites}}</p>
                                            <p><strong>Post Requisites:</strong> {{$course->post_requisites}}</p>
                                            <p><strong>Topics: </strong>{{$course->topics}}</p>
                                            <p><strong>Assessments:</strong> {{$course->assessments}}</p>
                                            <p><strong>Coordinator:</strong> {{$course->course_coordinator}}</p>
                                            <p><strong>Text Books: </strong>{{$course->text_books}}</p>
                                            <p><strong>Course Duration: </strong>{{$course->course_duration}}</p>
                                            <p><strong>Instructor: </strong>{{$course->instructor_name}}</p>
                                            <p><strong>Topics Covered:</strong> {{$course->topics_covered}}</p>


                                            <table style="width: 100%;"  class="table table-striped table-nowrap custom-table mb-0 datatable">
                                        <thead>
                                            <tr>
                                                <th style="text-align:left">Week Number</th>
                                                <th style="text-align:left">Lecture Number</th>
                                                <th style="text-align:left">Contents</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($course_desc as $coursedesc)
                                            <tr>
                                                <!-- <td>
                                                    <a href="{{route('course-descriptions.show',$course->id)}}" target="_blank">{{$course->course_title}}</a>
                                                </td> -->
                                                <td>{{$coursedesc->week_no}}</td>
                                                <td>{{$coursedesc->lecture_no}}</td>
                                                <td>{{$coursedesc->contents}}</td>
                                            </tr>
                                       @endforeach
                                          
                                        </tbody>
                                    </table>


</body> 
</html>
