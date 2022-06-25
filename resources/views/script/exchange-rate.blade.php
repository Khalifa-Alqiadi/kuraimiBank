<script>
    fetchExchangeRate();
    function fetchExchangeRate(){
        axios.get('show-exchange-rate').then(respond => {
        var is_active;
        document.querySelector('.exchange-rates').innerHTML = '';
        //   console.log(respond.data.cities)
        respond.data.rates.forEach(item => {
            
            if (item.is_active == 0) {
                is_active = `<button type="button" onclick="RateActive(` + item.id + `)" value="" class="badge Category-active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#RateActive">{{__('main.No_Active')}}</button>`
            } else {
                is_active = `<button type="button" onclick="RateActive(` + item.id + `)" value="" class="badge Category-active border-0 menu-theme text-white me-1" data-bs-toggle="modal" data-bs-target="#RateActive">{{__('main.Active')}}</button>`
            }
            document.querySelector('.exchange-rates').insertRow().innerHTML = 
            `<tr>
                <td>` + item.name + `</td>
                <td>` + item.sale + `</td>
                <td>` + item.buy + `</td>
                <td>`+is_active+`</td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                            <button type="submit" id="edit_city" onclick="EditRate(`+item.id+`)" value="` + item.id + `" class="btn " data-bs-toggle="modal" data-bs-target="#ExchangeRateEdit"> {{__('main.Edit')}} </button>
                            <button type="button" id="delete_city" onclick="RateDelete(`+item.id+`)" class="btn " data-bs-toggle="modal" data-bs-target="#RateDelete">  <i class="bx bx-trash me-2"></i> {{__('main.Delete')}}</button>
                        </div>
                    </div>
                </td>
            </tr>`
        })
        })
    }

    function add_rate(){
      axios.post('add_exchange_rate/', {
        name_ar : document.getElementById('name_rate_ar').value,
        name_en : document.getElementById('name_rate_en').value,
        sale : document.getElementById('sale').value,
        buy : document.getElementById('buy').value
      }).then(respond=> {
        if(respond.data.status == 0){
            var errors = respond.data.error;
            Object.keys(errors).forEach((key)=> {
                console.log(key)
                document.querySelector('.add_'+key).innerText = errors[key];
            })
        }else{
            successMessage(respond.data.success);
            fetchModals('#ExchangeRateAdd')
        }
      }).catch(function (error) {
        console.log(error);
      });
    }

    function EditRate(rateid){
      axios.get('edit_rate/' + rateid)
      .then(respond => {
        var id = document.getElementById('rate_edit_id')
        var name_ar = document.getElementById('name_rate_edit_ar')
        var name_en = document.getElementById('name_rate_edit_en')
        var sale_edit = document.getElementById('sale_edit')
        var buy_edit = document.getElementById('buy_edit')
        id.value = respond.data.rate.id
        name_ar.value = respond.data.rate.name.ar
        name_en.value = respond.data.rate.name.en
        sale_edit.value = respond.data.rate.sale
        buy_edit.value = respond.data.rate.buy
      });  
    }

    function edit_rate(){
      axios.post('UpdateRate', {
        name_ar : document.getElementById('name_rate_edit_ar').value,
        name_en : document.getElementById('name_rate_edit_en').value,
        sale : document.getElementById('sale_edit').value,
        buy : document.getElementById('buy_edit').value,
        id : document.getElementById('rate_edit_id').value,
      }).then(respond => { 
        if(respond.data.status == 0){
            var errors = respond.data.error;
            Object.keys(errors).forEach((key)=> {
                console.log(key)
                document.querySelector('.edit_'+key).innerText = errors[key];
            })
        }else{
            successMessage(respond.data.success);
            fetchModals('#ExchangeRateEdit')
        }
      });
    }

    function RateActive(id){
        var RateActive = document.getElementById('rate_active_id');
        RateActive.value = id;
    }

    function rate_Active(){
        axios.post('RateActive', {rate_active_id : document.getElementById('rate_active_id').value}).then(respond => {
          successMessage(respond.data.success);
          fetchModals('#RateActive')
        })
    }

    function RateDelete(id){
        var RateDelete = document.getElementById('rate_delete_id');
        RateDelete.value = id;
    }

    function rate_delete(){
      axios.post('RateDelete', {id: document.getElementById('rate_delete_id').value}).
        then(respond => {
          successMessage(respond.data.success);
          fetchModals('#RateDelete');
      })
    }

    function fetchModals(modal){
        fetchExchangeRate()
        document.querySelector('.modal-backdrop').style.display = 'none'
        document.querySelector(modal).style.display = 'none'
    }
    function successMessage(success){
        var message = document.querySelector('.success')
        message.innerHTML = `<div class="show-success fs-4">`+success+`</div>`
    }
</script>