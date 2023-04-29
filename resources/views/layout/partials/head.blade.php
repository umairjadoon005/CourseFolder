<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="robots" content="noindex, nofollow">
@if(!Route::is(['terms','tasks','tables-basic','settings','reports','register','projects','projects-kanban-view','projects-dashboard','profile','privacy-policy','mail-view','login','leads','leads-kanban-view','leads-dashboard','form-vertical','form-validation','form-mask','form-input-groups','form-horizontal','form-basic-inputs','faq','error-500','error-404','email','deals','deals-kanban-view','activities','blank-page','companies','components','contacts','data-tables','deals-dashboard']))
<title>Dashboard - CRMS admin laravel template</title>
@endif
@if(Route::is(['activities']))
<title>Activities - CRMS admin template</title>		
@endif
@if(Route::is(['blank-page']))
<title>Blank Page - CRMS admin template</title>
@endif
@if(Route::is(['companies']))
<title>Companies - CRMS admin template</title>
@endif
@if(Route::is(['components']))
<title>Components - CRMS admin template</title>
@endif
@if(Route::is(['contacts']))
<title>Contacts - CRMS admin template</title>
@endif
@if(Route::is(['data-tables']))
<title> Data Tables - CRMS admin template</title>
@endif
@if(Route::is(['deals-kanban-view']))
<title>Deals Kanban View - CRMS admin template</title>
@endif
@if(Route::is(['deals']))
<title>Deals - CRMS admin template</title>
@endif
@if(Route::is(['email']))
<title>Inbox - CRMS admin template</title>
@endif
@if(Route::is(['error-404']))
<title>Error 404 - CRMS Admin Template</title>
@endif
@if(Route::is(['error-500']))
<title>Error 500 - CRMS Admin Template</title>
@endif
@if(Route::is(['faq']))
<title>FAQ - CRMS admin template</title>
@endif
@if(Route::is(['form-basic-inputs']))
<title>Form Basic Inputs - CRMS admin template</title>
@endif
@if(Route::is(['form-horizontal']))
<title>Horizontal Form - CRMS admin template</title>
@endif
@if(Route::is(['form-input-groups']))
<title>Forms Input Groups - CRMS admin template</title>
@endif
@if(Route::is(['form-mask']))
<title> Form Mask - CRMS admin template</title>
@endif
@if(Route::is(['form-validation']))
<title> Form Validation - CRMS admin template</title>
@endif
@if(Route::is(['form-vertical']))
<title>Vertical Form - CRMS admin template</title>
@endif
@if(Route::is(['leads-dashboard']))
<title>Leads Dashboard - CRMS admin template</title>
@endif
@if(Route::is(['leads-kanban-view']))
<title>Leads Kanban View - CRMS admin template</title>
@endif
@if(Route::is(['leads']))
<title>Leads - CRMS admin template</title>
@endif
@if(Route::is(['login']))
<title>Login - CRMS admin template</title>
@endif
@if(Route::is(['mail-view']))
<title>Mail view - CRMS admin template</title>
@endif
@if(Route::is(['privacy-policy']))
<title>Privacy Policy - CRMS admin template</title>
@endif
@if(Route::is(['profile']))
<title>Employee Profile - CRMS admin template</title>
@endif
@if(Route::is(['projects-dashboard']))
<title>Projects Dashboard - CRMS admin template</title>
@endif
@if(Route::is(['projects-kanban-view']))
<title>Projects Kanban View - CRMS admin template</title>
@endif
@if(Route::is(['projects']))
<title>Projects - CRMS admin template</title>
@endif
@if(Route::is(['register']))
<title>Register - CRMS admin template</title>
@endif
@if(Route::is(['reports']))
<title>Reports - CRMS admin template</title>
@endif
@if(Route::is(['settings']))
<title>Settings - CRMS admin template</title>
@endif
@if(Route::is(['tables-basic']))
<title> Basic Tables - CRMS admin template</title>
@endif
@if(Route::is(['tasks']))
<title>Tasks - CRMS admin template</title>
@endif
@if(Route::is(['terms']))
<title>Terms - CRMS admin template</title>
@endif
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{url('assets/img/favicon.png')}}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{url('assets/plugins/fontawesome/css/all.min.css')}}">
<!--<link rel="stylesheet" href="{{url('assets/plugins/fontawesome/css/fontawesome.min.css')}}">-->
<link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">
<!-- Feathericon CSS -->
<link rel="stylesheet" href="{{url('assets/css/feather.css')}}">
<!--font style-->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600&display=swap" rel="stylesheet">
<!-- Lineawesome CSS -->
<link rel="stylesheet" href="{{url('assets/css/line-awesome.min.css')}}">
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{url('assets/plugins/select2/css/select2.min.css')}}">
<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{url('assets/css/bootstrap-datetimepicker.min.css')}}">
<!-- Tagsinput CSS -->
<link rel="stylesheet" href="{{url('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">
<!-- Datatable CSS -->
<link rel="stylesheet" href="{{url('assets/plugins/datatables/datatables.min.css')}}">
<!-- Chart CSS -->
<link rel="stylesheet" href="{{url('assets/plugins/morris/morris.css')}}">
<style>
    .has-error {
  color: red;
}
.has-error .form-control{
  border: 1px solid red;
}
</style>
@if(Route::is(['others-settings']))
<!-- Ck Editor -->
<link rel="stylesheet" href="{{url('assets/css/ckeditor.css')}}">

@endif
<!-- Summernote CSS -->
@if(Route::is(['mail-view','email']))
 <link rel="stylesheet" href="{{url('assets/plugins/summernote/dist/summernote-bs4.css')}}">
@endif
<!-- Theme CSS -->
<link rel="stylesheet" href="{{url('assets/css/theme-settings.css')}}">
<!-- Main CSS -->
<link rel="stylesheet" href="{{url('assets/css/style.css')}}" class="themecls">
<!-- Toatr CSS -->		
<link rel="stylesheet" href="{{url('assets/plugins//toastr/toatr.css')}}">
<!-- jQuery -->
<script src="{{ URL::asset('/assets/js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>