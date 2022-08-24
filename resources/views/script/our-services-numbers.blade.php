<script>
    fetchServicesNumbers()
    function fetchServicesNumbers(){
      axios.get('showServicesNumbers').then(respond => {
      var is_active;
      document.querySelector('.services-numbers-list').innerHTML = '';
      respond.data.numbers.forEach(item => {

        if (item.is_active == 0) {
            is_active = `<button type="button" onclick="servicesNumbersActive(` + item.id + `)" value="" class="badge Category-active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#ServicesNumbersActive">{{__('main.No_Active')}}</button>`
        } else {
            is_active = `<button type="button" onclick="servicesNumbersActive(` + item.id + `)" value="` + item.id + `" class="badge Category-active border-0 bg-primary me-1" data-bs-toggle="modal" data-bs-target="#ServicesNumbersActive">{{__('main.Active')}}</button>`
        }
    
        document.querySelector('.services-numbers-list').insertRow().innerHTML = 
          `<tr>
            <td>` + item.numbers + `</td>
            <td>`+item.description+`</td>
            <td>`+is_active+`</td>
            <td>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                        <button type="submit" id="" onclick="servicesNumbersEdit(`+item.id+`)" value="` + item.id + `" class="btn edit_category" data-bs-toggle="modal" data-bs-target="#ServicesNumbersEdit"> {{__('main.Edit')}} </button>
                        
                        <button type="button" class="btn " onclick="serviceNumberDelete(`+item.id+`)" data-bs-toggle="modal" data-bs-target="#ServiceNumberDelete">  <i class="bx bx-trash me-2"></i> {{__('main.Delete')}}</button>
                    </div>
                </div>
            </td>
          </tr>`
      })
        })
    }
  
    var addServiceNumber = document.getElementById('sendServiceNumber');
    addServiceNumber.addEventListener('click', ()=> {
    axios.post('add_service_number/', {
        number : document.getElementById('number').value,
        description_ar : document.getElementById('description_ar').value,
        description_en : document.getElementById('description_en').value,
    })
     .then(respond=> {
        if(respond.data.status == 0){
            var errors = respond.data.error;
            Object.keys(errors).forEach((key)=> {
                console.log(key)
                document.querySelector('.'+key).innerText = errors[key];
            })
        }else{
            successMessage(respond.data.success);
            fetchModals('#ServicesNumbersAdd')
        }
     })
     .catch(function (error) {
       console.log(error);
      });
    });
  
    function servicesNumbersEdit(numberid){
      axios.get('edit_service_number/' + numberid)
      .then(respond => {
        var service_numberid = document.getElementById('numberid')
        var number = document.getElementById('edit_number')
        var description_ar = document.getElementById('edit_description_ar')
        var description_en = document.getElementById('edit_description_en')
        service_numberid.value = respond.data.number.id
        number.value = respond.data.number.numbers
        description_ar.value = respond.data.number.description.ar
        description_en.value = respond.data.number.description.en
      });  
    }
  
    var updateNumber = document.getElementById('update_service_number');
    updateNumber.addEventListener('click', () => {
    axios.post('update_service_number', {
      number : document.getElementById('edit_number').value,
      description_ar : document.getElementById('edit_description_ar').value,
      description_en : document.getElementById('edit_description_en').value,
      id : document.getElementById('numberid').value,
    }).then(respond => { 
        if(respond.data.status == 0){
            var errors = respond.data.error;
            Object.keys(errors).forEach((key)=> {
                document.querySelector('.edit_'+key).innerText = errors[key];
            })
        }else{
            successMessage(respond.data.success);
            fetchModals('#ServicesNumbersEdit')
        }
      
    });
    })
  
    function servicesNumbersActive(id){
        var numberid = document.getElementById('service_number_id');
        numberid.value = id;
    }
    var numberActive = document.getElementById('Active');  
    numberActive.addEventListener('click', () => {
        axios.post('active_service_number', {number_id : document.getElementById('service_number_id').value}).then(respond => {
            successMessage(respond.data.success);
            fetchModals('#ServicesNumbersActive')
        })
    })
    function serviceNumberDelete(id){
        var numberid = document.getElementById('service_number_delete_id');
        numberid.value = id;
    }
    function delete_service_number(){
        axios.post('delete_service_number', {number_id : document.getElementById('service_number_delete_id').value}).then(respond => {
            successMessage(respond.data.success);
            fetchModals('#ServiceNumberDelete')
        })
    }
    
    function fetchModals(modal){
      fetchServicesNumbers()
      document.querySelector('.modal-backdrop').style.display = 'none'
      document.querySelector(modal).style.display = 'none'
    }
    function successMessage(success){
        var message = document.querySelector('.success')
        message.innerHTML = `<div class="show-success fs-4">`+success+`</div>`
    }
</script>