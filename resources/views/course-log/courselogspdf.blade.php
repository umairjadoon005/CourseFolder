<!DOCTYPE html>
<html>
<head>
    <title>Course Details</title>

    <style>
p {
    border:1px solid lightgrey;
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
    <h1>Course Logs</h1>
    <p><strong>Course Title:</strong> {{ $log->course_title }}</p>
    <p><strong>Catalog Number:</strong> {{ $log->catalog_number }}</p>
    <table style="width: 100%;" class="table table-striped table-nowrap custom-table mb-0 datatable">
                                        <thead>
                                            <tr>
                                                <th style="text-align: left;">Log Date</th>
                                                <th style="text-align: left;">Lecture Number</th>
                                                <th style="text-align: left;">Topics Covered</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($log_details as $detail)
                                            <tr>
                                                <td>{{$detail->log_date}}</td>
                                                <td>{{$detail->lecture_number}}</td>
                                                <td>{{$detail->topics_covered}}</td>
                                            </tr>
                                       @endforeach
                                          
                                        </tbody>
                                    </table>

</body>
</html>
