<?php $__env->startSection('title', 'Report'); ?>
<?php $__env->startSection('header_title', 'Report'); ?>
<?php $__env->startSection('content'); ?>
<style>
    li.custom-li {
        background: white !important;
        padding: 0.4% !important;
        list-style-type: none !important;
        margin: 0 0 1px -1.4% !important;
        border-radius: 5px !important;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<form>
    <div class="clearfix row">
        <div class="col-md-12 ">
            <div class="form-group  search-report-field">
                <div class="col-md-12">
                    <label class="d-block text-white">Report or Search Number</label>
                    <div class="input-group">
                        
                            <input type="text" style="" class="form-control" id="client_id">

                        <div class="sug-number"></div>
                        <input type="hidden" name="client_id" id="new_client_id">
                        <div class="input-group-append">
                            <button type="button" class="btn search-report-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 32%;display:none;" id="valid" class="alert alert-success" role="alert">
                This is valid number.
            </div>
            <div style="width: 32%;display:none;" id="no_valid" class="alert alert-danger" role="alert">
                This is invalid number.
            </div>
            <div class="form-group" id="newReports">
                
            </div>
            <div class="form-group">
                <label class="d-block">Write a report here</label>
                <textarea name="report" id="report" class="form-control"></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="button" class="submit-btn">REPORT</button>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$(document).ready(function () {
    $("#page_header_heading").html('Report');
    $('#escort_list').select2();
});

$(".search-report-btn").click(function (e)
{
    keyword = $("#client_id").val();
    if (keyword != '')
    {
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('escort.get-client-by-number')); ?>",
            data: {keyword: keyword, "_token": "<?php echo e(csrf_token()); ?>"},
            dataType: "json",
            success: function (response) {
                console.log(response);

                    $("#newReports").empty();
                    $("#newReports").html(response.response_html);
                // $(".sug-number").empty();
                // $(".sug-number").append(response);
            }
        });
    } else
    {
        $(".sug-number").empty();
    }
});


$(".submit-btn").click(function (e)
{
    Swal.fire(
            {
                title: 'Are you sure? Do you report?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, proceed!'
            }).then((result) =>
    {
        if (result.isConfirmed)
        {
            Swal.fire(
                    'Reported!',
                    'Your report has been filed successfully.',
                    'success'
                    );
            var escortId = $("#client_id").val();
            var report = $("textarea#report").val();
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('escort.store-report')); ?>",
                data: {report: report, escortId: escortId, "_token": "<?php echo e(csrf_token()); ?>"},
                dataType: "JSON",
                success: function (response) {
                    if (response == '1')
                    {
                        location.reload();
                    }
                }
            });
        }
    })
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.profileMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/new/report/report.blade.php ENDPATH**/ ?>