<script>
    fetchCities();
      function fetchCities(){
        axios.get('showCities').then(respond => {
        var is_active;
        document.querySelector('.cities-list').innerHTML = '';
        console.log(respond.data.cities)
        respond.data.cities.forEach(item => {
          
          if (item.is_active == 0) {
              is_active = `<button type="button" onclick="CityActive(` + item.id + `)" value="" class="badge Category-active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#CityActive">{{__('main.No_Active')}}</button>`
          } else {
              is_active = `<button type="button" onclick="CityActive(` + item.id + `)" value="` + item.id + `" class="badge Category-active border-0 bg-primary me-1" data-bs-toggle="modal" data-bs-target="#CityActive">{{__('main.Active')}}</button>`
          }
          document.querySelector('.cities-list').insertRow().innerHTML = 
            `<tr>
              <td>` + item.name + `</td>
              <td>` + item.country.name + `</td>
              <td>`+is_active+`</td>
              <td>
                  <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                          <button type="submit" id="edit_city" onclick="EditCity(`+item.id+`)" value="` + item.id + `" class="btn " data-bs-toggle="modal" data-bs-target="#CityEdite"> {{__('main.Edit')}} </button>
                          <button type="button" id="delete_city" onclick="cityDelete(`+item.id+`)" class="btn " data-bs-toggle="modal" data-bs-target="#CityDelete">  <i class="bx bx-trash me-2"></i> {{__('main.Delete')}}</button>
                      </div>
                  </div>
              </td>
            </tr>`
        })
      })
      }
      
      function add_city(){
        axios.post('add_City/', {
          name_ar : document.getElementById('city_name_ar').value,
          name_en : document.getElementById('city_name_en').value,
          country_id : document.getElementById('country_id').value,
        }).then(respond=> {
          if(respond.data.status == 0){
              var errors = respond.data.error;
              Object.keys(errors).forEach((key)=> {
                  document.querySelector('.add_'+key).innerText = errors[key];
              })
          }else{
              successMessage(respond.data.success);
              fetchModals('#CityAdd')
          }
        }).catch(function (error) {
          console.log(error);
        });
      }
      var addCity = document.getElementById('add_city');
      addCity.addEventListener('click', ()=> {
        
      });
    
      function EditCity(cityid){
        axios.get('Edit_City/' + cityid)
        .then(respond => {
          var cityid = document.getElementById('cityid')
          var name_ar = document.getElementById('city_name_ar_edit')
          var name_en = document.getElementById('city_name_en_edit')
          cityid.value = respond.data.city.id
          name_ar.value = respond.data.city.name.ar
          name_en.value = respond.data.city.name.en
        });  
      }
      function UpdateCity(){
        axios.post('UpdateCity', {
          name_ar : document.getElementById('city_name_ar_edit').value,
          name_en : document.getElementById('city_name_en_edit').value,
          id : document.getElementById('cityid').value,
          country_id : document.getElementById('country_id').value,
        }).then(respond => { 
          if(respond.data.status == 0){
              var errors = respond.data.error;
              Object.keys(errors).forEach((key)=> {
                  document.querySelector('.edit_'+key).innerText = errors[key];
              })
          }else{
              successMessage(respond.data.success);
              fetchModals('#CityEdite')
          }
          
        });
      }
    
      function CityActive(id){
        var cityId = document.getElementById('city_id');
        cityId.value = id;
      }
  
      function City_Active(){
        axios.post('CityActive', {city_id : document.getElementById('city_id').value}).then(respond => {
          successMessage(respond.data.success);
          fetchModals('#CityActive')
        })
      }
      function cityDelete(id){
        var cityId = document.getElementById('city_id_delete');
        cityId.value = id;
      }
  
      function City_Delete(){
        axios.post('CityDelete', {city_id : document.getElementById('city_id_delete').value}).then(respond => {
          successMessage(respond.data.success);
          fetchModals('#CityDelete')
        })
      }
    
    
      function fetchModals(modal){
        fetchCities()
        document.querySelector('.modal-backdrop').style.display = 'none'
        document.querySelector(modal).style.display = 'none'
      }
  
      function successMessage(success){
          var message = document.querySelector('.success')
          message.innerHTML = `<div class="show-success fs-4">`+success+`</div>`
      }
  </script>