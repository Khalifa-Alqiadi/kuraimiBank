<script>
    
    function fetchJobs(){
        axios.get('showJobs').then(respond => {
        var is_active;
        document.querySelector('.jobs-list').innerHTML = '';
        //   console.log(respond.data.cities)
        respond.data.jobs.forEach(item => {
            
            if (item.is_active == 0) {
                is_active = `<button type="button" onclick="JobActive(` + item.id + `)" value="" class="badge Category-active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#JobActive">{{__('main.No_Active')}}</button>`
            } else {
                is_active = `<button type="button" onclick="JobActive(` + item.id + `)" value="" class="badge Category-active border-0 menu-theme text-white me-1" data-bs-toggle="modal" data-bs-target="#JobActive">{{__('main.Active')}}</button>`
            }
            document.querySelector('.jobs-list').insertRow().innerHTML = 
            `<tr>
                <td>` + item.title + `</td>
                <td>` + item.description + `</td>
                <td>`+is_active+`</td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                            <a href="show-jobs?do=Edit&jobid=`+item.id+`" id="edit_city" class="btn "> {{__('main.Edit')}} </a>
                            <button type="button" id="delete_city" onclick="jobDelete(`+item.id+`)" class="btn " data-bs-toggle="modal" data-bs-target="#Job__Deleted">  <i class="bx bx-trash me-2"></i> {{__('main.Delete')}}</button>
                        </div>
                    </div>
                </td>
            </tr>`
        })
        })
    }

    function add_job(){
      axios.post('add-Job/', {
        title_ar : document.getElementById('title_ar').value,
        title_en : document.getElementById('title_en').value,
        descrip_ar : document.getElementById('descrip_ar').value,
        descrip_en : document.getElementById('descrip_en').value
      }).then(respond=> {
        if(respond.data.status == 0){
            var errors = respond.data.error;
            Object.keys(errors).forEach((key)=> {
                document.querySelector('.add_'+key).innerText = errors[key];
            })
        }else{
            successMessage(respond.data.success);
            valueNull();
        }
      }).catch(function (error) {
        console.log(error);
      });
    }

    function successMessage(success){
        var message = document.querySelector('.success')
        message.innerHTML = `<div class="show-success fs-4">`+success+`</div>`
    }

    function valueNull(){
         document.getElementById('title_ar').value = ''
         document.getElementById('title_en').value = ''
         document.getElementById('descrip_ar').value =''
         document.getElementById('descrip_en').value = ''
    }

    function updateJob(){
      axios.post('update-Job', {
        title_ar : document.getElementById('title_edit_ar').value,
        title_en : document.getElementById('title_edit_en').value,
        descrip_ar : document.getElementById('descrip_edit_ar').value,
        descrip_en : document.getElementById('descrip_edit_en').value,
        id : document.getElementById('job_edit_id').value,
      }).then(respond => { 
        if(respond.data.status == 0){
            var errors = respond.data.error;
            Object.keys(errors).forEach((key)=> {
                console.log(key)
                document.querySelector('.edit_'+key).innerText = errors[key];
            })
        }else{
            successMessage(respond.data.success);
        }
      });
    }

    function JobUpdateActive(){
        axios.post('Job_Active', {job_active_id : document.getElementById('job_active_id').value}).then(respond => {
          successMessage(respond.data.success);
          fetchModals('#JobActive')
        })
    }

    function jobDelete(id){
        var idDelete = document.getElementById('job_delete_id');
        idDelete.value = id;
    }
    function Job_Delete(){
        axios.post('Job-Delete', {job_delete_id : document.getElementById('job_delete_id').value}).then(respond => {
          successMessage(respond.data.success);
          fetchModals('#Job__Deleted')
        })
    }

    function fetchModals(modal){
        fetchJobs()
        document.querySelector('.modal-backdrop').style.display = 'none'
        document.querySelector(modal).style.display = 'none'
    }

    fetchJobs();
</script>