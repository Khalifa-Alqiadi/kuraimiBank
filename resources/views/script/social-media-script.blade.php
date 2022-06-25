<script>
    fetchSocialMedia()
    function fetchSocialMedia(){
        axios.get('show-social-media').then(respond => {
        var is_active;
        document.querySelector('.social-media-list').innerHTML = '';
        respond.data.socialMedia.forEach(item => {
            
            if (item.is_active == 0) {
                is_active = `<button type="button" onclick="MediaActive(` + item.id + `)" value="" class="badge  border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#MediaActive">{{__('main.No_Active')}}</button>`
            } else {
                is_active = `<button type="button" onclick="MediaActive(` + item.id + `)" value="" class="badge  border-0 menu-theme text-white me-1" data-bs-toggle="modal" data-bs-target="#MediaActive">{{__('main.Active')}}</button>`
            }
            document.querySelector('.social-media-list').insertRow().innerHTML = 
            `<tr>
                <td>` + item.name + `</td>
                <td>` + item.link + `</td>
                <td><i class="`+item.icons+`"></i> `+item.icons+`</td>
                <td>`+is_active+`</td>

                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                            <button type="button" class="btn" onclick="Media_Edit(`+item.id+`)" data-bs-toggle="modal" data-bs-target="#MediaEdit"> {{__('main.Edit')}} </button>
                            <button type="button" onclick="MediaDelete(`+item.id+`)" class="btn " data-bs-toggle="modal" data-bs-target="#MediaDelete">  <i class="bx bx-trash me-2"></i> {{__('main.Delete')}}</button>
                        </div>
                    </div>
                </td>
            </tr>`
        })
        })
    }

    function addMedia(){
        axios.post('add_social_media/', {
        name_ar : document.getElementById('media_name_ar').value,
        name_en : document.getElementById('media_name_en').value,
        link : document.getElementById('link').value,
        icons : document.getElementById('icons').value
      }).then(respond=> {
        if(respond.data.status == 0){
            var errors = respond.data.error;
            Object.keys(errors).forEach((key)=> {
                document.querySelector('.add_'+key).innerText = errors[key];
            })
        }else{
            fetchModals('#MediaAdd')
            successMessage(respond.data.success);
        }
      }).catch(function (error) {
        console.log(error);
      });
    }

    function Media_Edit(id){
        axios.get('Edit_social_media/' + id)
      .then(respond => {
        var name_ar = document.getElementById('edit_media_name_ar')
        var name_en = document.getElementById('edit_media_name_en')
        var link = document.getElementById('edit_link')
        var edit_media_id = document.getElementById('edit_media_id')
        name_ar.value = respond.data.media.name.ar
        name_en.value = respond.data.media.name.en
        link.value = respond.data.media.link
        edit_media_id.value = respond.data.media.id
      })
    }


    function updateSocialMedia(){
      axios.post('update_social_media/', {
        edit_media_id : document.getElementById('edit_media_id').value,
        name_ar : document.getElementById('edit_media_name_ar').value,
        name_en : document.getElementById('edit_media_name_en').value,
        link : document.getElementById('edit_link').value,
        icons : document.getElementById('edit_icons').value,
        
      }).then(respond => { 
        if(respond.data.status == 0){
            var errors = respond.data.error;
            Object.keys(errors).forEach((key)=> {
                console.log(key)
                document.querySelector('.edit_'+key).innerText = errors[key];
            })
        }else{
            successMessage(respond.data.success);
            fetchModals('#MediaEdit')
        }
      });
    }

    function MediaActive(id){
        var media_active_id = document.getElementById('media_active_id');
        media_active_id.value = id;
    }

    function socialMediaActive(){
        axios.post('mediaActive', {
            media_active_id : document.getElementById('media_active_id').value
        }).then(respond => {
            successMessage(respond.data.success);
            fetchModals('#MediaActive')
        })
    }

    function MediaDelete(id){
        var media_delete_id = document.getElementById('media_delete_id');
        media_delete_id.value = id;
    }

    function socialMediaDelete(){
        axios.post('mediaDelete', {
            media_delete_id : document.getElementById('media_delete_id').value
        }).then(respond => {
            successMessage(respond.data.success);
            fetchModals('#MediaDelete')
        })
    }

    function fetchModals(modal){
        fetchSocialMedia()
        document.querySelector('.modal-backdrop').style.display = 'none'
        document.querySelector(modal).style.display = 'none'
    }

    function successMessage(success){
        var message = document.querySelector('.success')
        message.innerHTML = `<div class="show-success fs-4">`+success+`</div>`
    }
      
</script>