<script>
    function fetchNews(){
        axios.get('showNews').then(respond => {
        var is_active;
        document.querySelector('.news-list').innerHTML = '';
        respond.data.news.forEach(item => {
            
            if (item.is_active == 0) {
                is_active = `<button type="button" onclick="NewActive(` + item.id + `)" value="" class="badge Category-active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#NewActive">{{__('main.No_Active')}}</button>`
            } else {
                is_active = `<button type="button" onclick="NewActive(` + item.id + `)" value="" class="badge Category-active border-0 menu-theme text-white me-1" data-bs-toggle="modal" data-bs-target="#NewActive">{{__('main.Active')}}</button>`
            }
            document.querySelector('.news-list').insertRow().innerHTML = 
            `<tr>
                <td>` + item.title + `</td>
                <td>` + item.description + `</td>
                <td>`+is_active+`</td>

                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                            <a href="show-news?do=Edit&newid=`+item.id+`" class="btn "> {{__('main.Edit')}} </a>
                            <button type="button" id="delete_city" onclick="NewDeleted(`+item.id+`)" class="btn " data-bs-toggle="modal" data-bs-target="#New_Deleted">  <i class="bx bx-trash me-2"></i> {{__('main.Delete')}}</button>
                        </div>
                    </div>
                </td>
            </tr>`
        })
        })
    }
    

    function NewActive(id){
        var active = document.getElementById('new_active_id');
        active.value = id;
    }

    function New_Active(){
        axios.post('News_Active', {new_active_id : document.getElementById('new_active_id').value}).then(respond => {
          successMessage(respond.data.success);
          fetchModals('#NewActive')
        })
    }
    

    function NewDeleted(id){
        var new_delete_id = document.getElementById('new_delete_id');
        new_delete_id.value = id;
    }

    function News_Delete(){
        axios.post('News-Delete', {new_delete_id : document.getElementById('new_delete_id').value}).then(respond => {
          successMessage(respond.data.success);
          fetchModals('#New_Deleted')
        })
    }

    function fetchModals(modal){
        fetchNews()
        document.querySelector('.modal-backdrop').style.display = 'none'
        document.querySelector(modal).style.display = 'none'
    }

    function successMessage(success){
        var message = document.querySelector('.success')
        message.innerHTML = `<div class="show-success fs-4">`+success+`</div>`
    }
    fetchNews()
</script>