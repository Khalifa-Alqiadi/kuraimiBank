<script>
    function fetchCategory(){
      axios.get('showCategory').then(respond => {
      var Main_Parent;
      var is_active;
      document.querySelector('.categories-list').innerHTML = '';
      respond.data.categories.forEach(item => {
        if (item.parent_category == 0) {
            Main_Parent = `{{__('main.categories.Main_Parent')}}`;
        } else {
            Main_Parent = `{{__('main.categories.Sub_Parent')}}`
        }
        if(`{{Auth::user()->hasPermission('Status_Category')}}`){
            if (item.is_active == 0) {
                is_active = `<button type="button" onclick="categoryActive(` + item.id + `)" value="" class="badge Category-active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#CategoryActive">{{__('main.No_Active')}}</button>`
            } else {
                is_active = `<button type="button" onclick="categoryActive(` + item.id + `)" value="` + item.id + `" class="badge Category-active border-0 bg-primary me-1" data-bs-toggle="modal" data-bs-target="#CategoryActive">{{__('main.Active')}}</button>`
            }
        }else{
            if (item.is_active == 0) {
                is_active = `<button type="button" disabled onclick="categoryActive(` + item.id + `)" value="" class="badge Category-active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#CategoryActive">{{__('main.No_Active')}}</button>`
            } else {
                is_active = `<button type="button" disabled onclick="categoryActive(` + item.id + `)" value="` + item.id + `" class="badge Category-active border-0 bg-primary me-1" data-bs-toggle="modal" data-bs-target="#CategoryActive">{{__('main.Active')}}</button>`
            }
        }
        
        document.querySelector('.categories-list').insertRow().innerHTML = 
          `<tr>
            <td>` + item.name + `</td>
            <td>`+Main_Parent+`</td>
            <td>`+is_active+`</td>
            <td>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                        <button type="submit" id="edit_category" onclick="EditCategory(`+item.id+`)" value="` + item.id + `" class="btn edit_category" data-bs-toggle="modal" data-bs-target="#CategoryEdite"> {{__('main.Edit')}} </button>
                        
                        <button type="button" class="btn " onclick="DeleteCategory(`+item.id+`)" data-bs-toggle="modal" data-bs-target="#CategoryDelete">  <i class="bx bx-trash me-2"></i> {{__('main.Delete')}}</button>
                    </div>
                </div>
            </td>
          </tr>`
      })
        })
    }
  
    var addCategory = document.getElementById('sendCategory');
    addCategory.addEventListener('click', ()=> {
    axios.post('add_category/', {
      name_ar : document.getElementById('name_ar').value,
      name_en : document.getElementById('name_en').value,
      parent_category : document.getElementById('parent_category').value
    })
     .then(respond=> {
        if(respond.data.status == 0){
            // console.log(respond.data.status)
            var errors = respond.data.error;
            Object.keys(errors).forEach((key)=> {
                console.log(key)
                document.querySelector('.'+key).innerText = errors[key];
            })
        }else{
            successMessage(respond.data.success);
            fetchModals('#CategoryAdd')
        }
     })
     .catch(function (error) {
       console.log(error);
      });
    });
  
    fetchCategory()
    function EditCategory(categoryid){
      axios.get('edit_category/' + categoryid)
      .then(respond => {
        var cid = document.getElementById('cid')
        var name_ar = document.getElementById('name_edit_ar')
        var name_en = document.getElementById('name_edit_en')
        cid.value = respond.data.category.id
        name_ar.value = respond.data.category.name.ar
        name_en.value = respond.data.category.name.en
      });  
    }
  
    var updateCategory = document.getElementById('updateCategory');
    updateCategory.addEventListener('click', () => {
    axios.post('UpdateCategory', {
      name_ar : document.getElementById('name_edit_ar').value,
      name_en : document.getElementById('name_edit_en').value,
      parent_category : document.getElementById('parent_category_edit').value,
      id : document.getElementById('cid').value,
    }).then(respond => { 
        if(respond.data.status == 0){
            // console.log(respond.data.status)
            var errors = respond.data.error;
            Object.keys(errors).forEach((key)=> {
                console.log(key)
                document.querySelector('.'+key).innerText = errors[key];
            })
        }else{
            successMessage(respond.data.success);
            fetchModals('#CategoryEdite')
        }
      
    });
    })
  
    function categoryActive(id){
    var categoryid = document.getElementById('category_id');
    categoryid.value = id;
    }
    var cActive = document.getElementById('Active');  
    cActive.addEventListener('click', () => {
        axios.post('CategoryActive', {category_id : document.getElementById('category_id').value}).then(respond => {
            successMessage(respond.data.success);
            fetchModals('#CategoryActive')
        })
    })
    function DeleteCategory(id){
        var categoryid = document.getElementById('category_id_delete');
        category_id_delete.value = id;
    }
    function delete_category(){
        axios.post('Category_Delete', {category_id : document.getElementById('category_id_delete').value}).then(respond => {
            successMessage(respond.data.success);
            fetchModals('#CategoryDelete')
        })
    }
    
    function fetchModals(modal){
      fetchCategory()
      document.querySelector('.modal-backdrop').style.display = 'none'
      document.querySelector(modal).style.display = 'none'
    }
    function successMessage(success){
        var message = document.querySelector('.success')
        message.innerHTML = `<div class="show-success fs-4">`+success+`</div>`
    }
</script>