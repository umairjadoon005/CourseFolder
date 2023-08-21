
<!-- Bootstrap Core JS -->
<script src="{{ URL::asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Slimscroll JS -->
<script src="{{ URL::asset('/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- Form Validation JS -->
<script src="{{ URL::asset('/assets/js/form-validation.js')}}"></script>
<!-- Select2 JS -->
<script src="{{ URL::asset('/assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Datatable JS -->
<script src="{{ URL::asset('/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('/assets/plugins/datatables/datatables.min.js')}}"></script>
<!-- Datetimepicker JS -->
<script src="{{ URL::asset('/assets/js/moment.min.js')}}"></script>
<script src="{{ URL::asset('/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- Tagsinput JS -->
<script src="{{ URL::asset('/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
<script src="{{ URL::asset('/assets/plugins/sticky-kit-master/dist/sticky-kit.js')}}"></script>
<!-- Mask JS -->
<!-- <script src="{{ URL::asset('/assets/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{ URL::asset('/assets/js/mask.js')}}"></script> -->
@if(Route::is(['others-settings']))
<!-- Ck Editor JS -->
<script src="{{ URL::asset('/assets/js/ckeditor.js')}}"></script>
@endif
<!-- Chart JS -->
@if(Route::is(['home']))
<script src="{{ URL::asset('/assets/js/morris.js')}}"></script>
<script src="{{ URL::asset('/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ URL::asset('/assets/js/chart.js')}}"></script>
<script src="{{ URL::asset('/assets/js/linebar.min.js')}}"></script>
<script src="{{ URL::asset('/assets/js/piechart.js')}}"></script>
<script type="text/javascript">
    debugger;
    var course={!!$data->course_count!!};
    var notes={!!$data->notes_count!!};
    initCharts(course,notes);
</script>
@endif
<script>
function PrintElem(elem)
{
    var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}

function setDefaultCourse(){
    var default_course=$("#default_course").val();
    var url="{{route('courses.default-course')}}";
    $.ajax({
                url: url,
                type: "post",
                data:{course_id:default_course},
                success: function (response, status) {
                    if (status == "success") {
                        toastr.success("Course successfully changed.");
                    }
                    location.reload();
                },
                error: function (response) {
                    var message = "";
                    if
                        (response.responseJSON.message == undefined) { message = errorMesage }
                    else { message = response.responseJSON.message }
                    toastr.error(message);
                }
            });
 
}
</script>
<!-- Summernote JS -->
@if(Route::is(['mail-view','email']))
<script src="{{ URL::asset('/assets/plugins/summernote/dist/summernote-bs4.js')}}"></script>
@endif
<!-- theme JS -->
<script src="{{ URL::asset('/assets/js/theme-settings.js')}}"></script>
<!-- Custom JS -->
<script src="{{ URL::asset('/assets/js/app.js')}}"></script>
<script src="{{ URL::asset('/assets/js/sticky.js')}}"></script>
<script src="{{ URL::asset('/assets/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{ URL::asset('/assets/js/helper.js')}}"></script>
<script src="{{ URL::asset('/assets/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>