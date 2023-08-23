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
    <h1>Result</h1>
    <p><strong>Title:</strong> {{ $result->title }}</p>
    <p><strong>Description:</strong> {{ $result->description }}</p>
    <p><strong>Document Path:</strong> {{ $result->document_path }}</p>
    <!-- Add more details as needed -->
</body>
</html>
