<script>
    fetchServicePoints();
    function fetchServicePoints(){
      axios.get('show_service-points').then(respond => {
      var is_active;
      document.querySelector('.service-points').innerHTML = '';
    //   console.log(respond.data.cities)
      respond.data.servicePoints.forEach(item => {
        
        if (item.is_active == 0) {
            is_active = `<button type="button" onclick="ServicePointActive(` + item.id + `)" value="" class="badge Category-active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#ServicePointActives">{{__('main.No_Active')}}</button>`
        } else {
            is_active = `<button type="button" onclick="ServicePointActive(` + item.id + `)" value="` + item.id + `" class="badge Category-active border-0 bg-primary me-1" data-bs-toggle="modal" data-bs-target="#ServicePointActives">{{__('main.Active')}}</button>`
        }
        document.querySelector('.service-points').insertRow().innerHTML = 
          `<tr>
            <td>` + item.name + `</td>
            <td>` + item.address + `</td>
            <td>` + item.phone + `</td>
            <td>` + item.second_phone + `</td>
            <td>` + item.working_hours + `</td>
            <td>` + item.city.name + `</td>
            <td>`+is_active+`</td>
            <td>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                        <button type="submit" id="edit_city" onclick="EditServicePoint(`+item.id+`)" value="` + item.id + `" class="btn " data-bs-toggle="modal" data-bs-target="#ServicePointEdit"> {{__('main.Edit')}} </button>
                        <button type="button" id="delete_city" onclick="(`+item.id+`)" class="btn " data-bs-toggle="modal" data-bs-target="#CityDelete">  <i class="bx bx-trash me-2"></i> {{__('main.Delete')}}</button>
                    </div>
                </div>
            </td>
          </tr>`
      })
    })
    }

    var addCity = document.getElementById('add_service_point');
    addCity.addEventListener('click', ()=> {
      axios.post('add_service_point/', {
        name_ar : document.getElementById('service_point_name_ar').value,
        name_en : document.getElementById('service_point_name_en').value,
        address_ar : document.getElementById('service_point_address_ar').value,
        address_en : document.getElementById('service_point_address_en').value,
        phone : document.getElementById('service_point_phone').value,
        second_phone : document.getElementById('service_point_second_phone').value,
        working_hours_ar : document.getElementById('service_point_working_hours_ar').value,
        working_hours_en : document.getElementById('service_point_working_hours_en').value,
        city_id : document.getElementById('city_id').value,
      })
      .then(respond=> {
        if(respond.data.status == 0){
          // alert(respond.data.error);
          // for(key in respond.data.error){
          //   alert(`'`+key+`'`);
          //   var error = document.getElementById(`'`+key+`'`)
          //   error.innerHTML = `<span>jhjklhkjhk</span>` ;
          // }
        }else{
        console.log(respond.data );
        fetchModals('#ServicePointAdd')
        }
      })
      .catch(function (error) {
        console.log(error);
        });
    });

    function fetchModals(modal){
      fetchServicePoints()
      document.querySelector('.modal-backdrop').style.display = 'none'
      document.querySelector(modal).style.display = 'none'
    }

    function EditServicePoint(id){
      axios.get('Edit_Service_Point/' + id)
      .then(respond => {
        var pointId = document.getElementById('pointId')
        var name_ar = document.getElementById('edit_service_point_name_ar')
        var name_en = document.getElementById('edit_service_point_name_en')
        var address_ar = document.getElementById('edit_service_point_address_ar')
        var address_en = document.getElementById('edit_service_point_address_en')
        var phone = document.getElementById('edit_service_point_phone')
        var second_phone = document.getElementById('edit_service_point_second_phone')
        var working_hours_ar = document.getElementById('edit_service_point_working_hours_ar')
        var working_hours_en = document.getElementById('edit_service_point_working_hours_en')
        // var countryid = document.getElementById('country_id')
        pointId.value = respond.data.servicePoint.id
        name_ar.value = respond.data.servicePoint.name.ar
        name_en.value = respond.data.servicePoint.name.en
        address_ar.value = respond.data.servicePoint.address.ar
        address_en.value = respond.data.servicePoint.address.en
        phone.value = respond.data.servicePoint.phone
        second_phone.value = respond.data.servicePoint.second_phone
        working_hours_ar.value = respond.data.servicePoint.working_hours.ar
        working_hours_en.value = respond.data.servicePoint.working_hours.en
        // countryid.innerHTML = `<option id="countryid" value="`+respond.data.city.country.id+`">`+respond.data.city.country.name+`</option>`
      });  
    }
    
    var UpdateServicePoint = document.getElementById('UpdateServicePoint');
    UpdateServicePoint.addEventListener('click', () => {
      axios.post('UpdateServicePoint', {
        pointId : document.getElementById('pointId').value,
        name_ar : document.getElementById('edit_service_point_name_ar').value,
        name_en : document.getElementById('edit_service_point_name_en').value,
        address_ar : document.getElementById('edit_service_point_address_ar').value,
        address_en : document.getElementById('edit_service_point_address_en').value,
        phone : document.getElementById('edit_service_point_phone').value,
        second_phone : document.getElementById('edit_service_point_second_phone').value,
        working_hours_ar : document.getElementById('edit_service_point_working_hours_ar').value,
        working_hours_en : document.getElementById('edit_service_point_working_hours_en').value,
        city_id : document.getElementById('city_id').value,
      }).then(respond => { 
        console.log(respond.data)
        fetchModals('#ServicePointEdit')
      });
    })

    function ServicePointActive(id){
      var pointId = document.getElementById('point_id');
      pointId.value = id;
    }
    var SPActive = document.getElementById('ServicePointActive');  
    SPActive.addEventListener('click', () => {
      axios.post('ServicePointActive', {point_id : document.getElementById('point_id').value}).then(respond => {
        fetchModals('#ServicePointActives')
      })
    })
</script>