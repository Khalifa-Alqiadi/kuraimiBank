<script>

    function ServicesActive(id){
        var serviceId = document.getElementById('service_active_id');
        serviceId.value = id;
    }
    function delete_service(id){
        var service_delete_id = document.getElementById('service_delete_id');
        service_delete_id.value = id;
    }
    function JobActive(id){
        var job_active_id = document.getElementById('job_active_id');
        job_active_id.value = id;
    }
    function WebsiteActive(id){
        var info_active_id = document.getElementById('info_active_id');
        info_active_id.value = id;
    }
    function delete_website(id){
        var info_delete_id = document.getElementById('info_delete_id');
        info_delete_id.value = id;
    }
    function AdvantageActive(id){
        var adv_active_id = document.getElementById('adv_active_id');
        adv_active_id.value = id;
    }
    function AdvantageDeleted(id){
        var adv_delete_id = document.getElementById('adv_delete_id');
        adv_delete_id.value = id;
    }
    function PartanerActive(id){
        var partaner_active_id = document.getElementById('partaner_active_id');
        partaner_active_id.value = id;
    }
    function deletePartaner(id){
        var partaner_delete_id = document.getElementById('partaner_delete_id');
        partaner_delete_id.value = id;
    }
    function ReportActive(id){
        var report_active_id = document.getElementById('report_active_id');
        report_active_id.value = id;
    }
    function deleteReport(id){
        var report_delete_id = document.getElementById('report_delete_id');
        report_delete_id.value = id;
    }
    

    function DeletePermissions(id, pid){
        var delete_userid = document.getElementById('delete_userid');
        var delete_permission = document.getElementById('delete_permission');
        delete_userid.value = id;
        console.log(delete_userid.value)
        delete_permission.value = pid;
    }
    
    function PermissionActive(id){
        var permission_id = document.getElementById('permission_id');
        permission_id.value = id;
    }


    function ApplicationsActive(id){
        var application_active_id = document.getElementById('application_active_id');
        application_active_id.value = id;
    }
    function delete_application(id){
        var application_delete_id = document.getElementById('application_delete_id');
        application_delete_id.value = id;
    }


    function sliderServiceActive(id){
        var slider_active_id = document.getElementById('slider_active_id');
        slider_active_id.value = id;
    }
    function sliderServiceDeleted(id){
        var slider_delete_id = document.getElementById('slider_delete_id');
        slider_delete_id.value = id;
    }


    function SuccessStoriesActive(id){
        var stories_active_id = document.getElementById('stories_active_id');
        stories_active_id.value = id;
    }
    function success_stories_service(id){
        var stories_delete_id = document.getElementById('stories_delete_id');
        stories_delete_id.value = id;
    }
</script>