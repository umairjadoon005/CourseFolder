<!DOCTYPE html>
<html>
<head>
    <title>Course Details</title>

    <style>
p {
    border:1px solid lightgrey;
    padding: 10px;
    font-weight: bold;
 }

 p>span{
    font-weight: normal;
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
    <h1>Course Outline</h1>

    <p>Course Type: <span>{{$outline->course_type}}</span></p>
														<p>Pre Requisite <span>{{$outline->course->pre_requisites}}</span></p>
														<!-- <p>Course Duration <span>{{$outline->course_duration}}</span></p> -->
														<p>Course Structure <span>{{$outline->course_structure}}</span></p>
														<p>Weekly Tuition Pattern <span>{{$outline->weekly_tution_pattern}}</span></p>
                            <p>Course Style: <span>{{$outline->course_style}}</span></p>
                            <p>Web Link: <span>{{$outline->web_link}}</span></p>
                            <p>Teaching Team: <span>{{$outline->teaching_team}}</span></p>
                            <p>Course Description: <span>{{$outline->course_description}}</span></p>
                            <p>Course Description <span>{{$outline->course_description}}</span></p>
                            <p>Course Description <span>{{$outline->course_description}}</span></p>
                            <p>Student Learning Objectives: <span>{{$outline->slos}}</span></p>
                            <p>Tools & Technology: <span>{{$outline->tools_and_tech}}</span></p>
                            <p>Attendance Requirements: <span>{{$outline->attendance}}</span></p>
                            <p>General Information: <span>{{$outline->general_info}}</span></p>
                            <p>TextBooks: <span>{{$outline->textbook}}</span></p>
                            <p>Objectives: <span>{{$outline->objectives}}</span></p>
                            <p>Other Resources: <span>{{$outline->other_resources}}</span></p>

</body>
</html>
