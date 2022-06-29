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
                        <button type="submit" onclick="EditServicePoint(`+item.id+`)" value="` + item.id + `" class="btn " data-bs-toggle="modal" data-bs-target="#ServicePointEdit"> {{__('main.Edit')}} </button>
                        <button type="button" onclick="DeleteServicePoint(`+item.id+`)" class="btn " data-bs-toggle="modal" data-bs-target="#ServicePointDelete">  <i class="bx bx-trash me-2"></i> {{__('main.Delete')}}</button>
                    </div>
                </div>
            </td>
          </tr>`
      })
    })
    }
    function add_service_point(){
      axios.post('add_service_point/', {
        name_ar : document.getElementById('service_point_name_ar').value,
        name_en : document.getElementById('service_point_name_en').value,
        address_ar : document.getElementById('service_point_address_ar').value,
        address_en : document.getElementById('service_point_address_en').value,
        phone : document.getElementById('service_point_phone').value,
        second_phone : document.getElementById('service_point_second_phone').value,
        working_hours_ar : document.getElementById('service_point_working_hours_ar').value,
        working_hours_en : document.getElementById('service_point_working_hours_en').value,
        lat : document.getElementById('lat').value,
        lng : document.getElementById('lng').value,
        city_id : document.getElementById('city_id').value,
      }).then(respond=> {
          if(respond.data.status == 0){
            var errors = respond.data.error;
            Object.keys(errors).forEach((key)=> {
                document.querySelector('.add_'+key).innerText = errors[key];
            })
          }else{
            successMessage(respond.data.success);
            fetchModals('#ServicePointAdd')
          }
      }).catch(function (error) {
        console.log(error);
      })
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
        var edit_lat = document.getElementById('edit_lat')
        var edit_lng = document.getElementById('edit_lng')
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
        edit_lat.value = respond.data.servicePoint.lat
        edit_lng.value = respond.data.servicePoint.lng

        initMap2(respond.data.servicePoint.lat, respond.data.servicePoint.lng)
        // countryid.innerHTML = `<option id="countryid" value="`+respond.data.city.country.id+`">`+respond.data.city.country.name+`</option>`
      });  
    }

    function UpdateServicePoint(){
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
        lat : document.getElementById('edit_lat').value,
        lng : document.getElementById('edit_lng').value,
        city_id : document.getElementById('city_id').value,
      }).then(respond => { 
        if(respond.data.status == 0){
            var errors = respond.data.error;
            Object.keys(errors).forEach((key)=> {
                document.querySelector('.edit_'+key).innerText = errors[key];
            })
          }else{
            successMessage(respond.data.success);
            fetchModals('#ServicePointEdit')
          }
      });
    }

    function ServicePointActive(id){
      var pointId = document.getElementById('point_id');
      pointId.value = id;
    }

    
    var SPActive = document.getElementById('ServicePointActive');  
    SPActive.addEventListener('click', () => {
      axios.post('ServicePointActive', {point_id : document.getElementById('point_id').value}).then(respond => {
        successMessage(respond.data.success);
        fetchModals('#ServicePointActives')
      })
    })
    function DeleteServicePoint(id){
      var point_delete_id = document.getElementById('point_delete_id');
      point_delete_id.value = id;
    }

    function ServicePointDelete(){
      axios.post('ServicePointDelete', {point_delete_id : document.getElementById('point_delete_id').value}).then(respond => {
        successMessage(respond.data.success);
        fetchModals('#ServicePointDelete')
      })
    }

    function successMessage(success){
        var message = document.querySelector('.success')
        message.innerHTML = `<div class="show-success fs-4">`+success+`</div>`
    }

    function fetchModals(modal){
      fetchServicePoints()
      document.querySelector('.modal-backdrop').style.display = 'none'
      document.querySelector(modal).style.display = 'none'
    }


    let map;
        function initMap() {
            
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 15.453153355660532, lng: 44.229368331352205 },
                zoom: 8,
                scrollwheel: true,
            });

            const uluru = { lat: 15.453153355660532, lng: 44.229368331352205 };
            let marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true
            });

            google.maps.event.addListener(marker,'position_changed',
                function (){
                    let lat = marker.position.lat()
                    let lng = marker.position.lng()
                    $('#lat').val(lat)
                    $('#lng').val(lng)
                })

            google.maps.event.addListener(map,'click',
            function (event){
                pos = event.latLng
                marker.setPosition(pos)
            })
        }
    let map2;
        function initMap2(valueLat, valueLng) {
          // let valueLat = document.getElementById('edit_lat').value
          // let valueLng = document.getElementById('edit_lng').value
          map2 = new google.maps.Map(document.getElementById('map2'), {
                center: { lat: Number(valueLat), lng:  Number(valueLng)},
                zoom: 8,
                scrollwheel: true,
            });

            const uluru = { lat: Number(valueLat), lng: Number(valueLng) };
            let marker = new google.maps.Marker({
                position: uluru,
                map: map2,
                draggable: true
            });

            google.maps.event.addListener(marker,'position_changed',
                function (){
                    let lat = marker.position.lat()
                    let lng = marker.position.lng()
                    $('#edit_lat').val(lat)
                    $('#edit_lng').val(lng)
                })

            google.maps.event.addListener(map2,'click',
            function (event){
                pos = event.latLng
                marker.setPosition(pos)
            })
        }

initMap();

    
</script>