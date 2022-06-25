<script>
    fetchCountries();
      function fetchCountries(){
        axios.get('showCountries').then(respond => {
        var is_active;
        document.querySelector('.countries-list').innerHTML = '';
        respond.data.countries.forEach(item => {
          if (item.is_active == 0) {
              is_active = `<button type="button" onclick="countryActive(` + item.id + `)" value="" class="badge Category-active border-0 bg-label-primary me-1" data-bs-toggle="modal" data-bs-target="#CountryActive">{{__('main.No_Active')}}</button>`
          } else {
              is_active = `<button type="button" onclick="countryActive(` + item.id + `)" value="` + item.id + `" class="badge Category-active border-0 bg-primary me-1" data-bs-toggle="modal" data-bs-target="#CountryActive">{{__('main.Active')}}</button>`
          }
          document.querySelector('.countries-list').insertRow().innerHTML = 
            `<tr>
              <td>` + item.name + `</td>
              <td>`+is_active+`</td>
              <td>
                  <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                          <button type="submit" id="edit_country" onclick="EditCountry(`+item.id+`)" value="` + item.id + `" class="btn edit_category" data-bs-toggle="modal" data-bs-target="#CountryEdite"> {{__('main.Edit')}} </button>
                          <button type="button" id="delete_country" onclick="countryDelete(`+item.id+`)" class="btn " data-bs-toggle="modal" data-bs-target="#CountryDelete">  <i class="bx bx-trash me-2"></i> {{__('main.Delete')}}</button>
                      </div>
                  </div>
              </td>
            </tr>`
        })
      })
      }
      function countryAdd(){
          axios.post('add_country/', {
            name_ar : document.getElementById('add_name_country_ar').value,
            name_en : document.getElementById('add_name_country_en').value,
          })
          .then(respond=> {
              if(respond.data.status == 0){
                errorsMessage(respond.data.error);
              }else{
                  successMessage(respond.data.success);
                  fetchModals('#CountryAdd')
              }
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    
      function EditCountry(countryid){
        axios.get('edit_country/' + countryid)
        .then(respond => {
          var countryid = document.getElementById('countryid')
          var name_ar = document.getElementById('name_country_ar_edit')
          var name_en = document.getElementById('name_country_en_edit')
          countryid.value = respond.data.country.id
          name_ar.value = respond.data.country.name.ar
          name_en.value = respond.data.country.name.en
        });  
      }
  
      function UpdateCountry(){
        axios.post('UpdateCountry', {
          name_ar : document.getElementById('name_country_ar_edit').value,
          name_en : document.getElementById('name_country_en_edit').value,
          id : document.getElementById('countryid').value,
        }).then(respond => { 
            if(respond.data.status == 0){
                var errors = respond.data.error;
                Object.keys(errors).forEach((key)=> {
                    document.querySelector('.edit_'+key).innerText = errors[key];
                });
            }else{
                successMessage(respond.data.success);
                fetchModals('#CountryEdite')
            }
        });
      }
    
      function countryActive(id){
        var countryId = document.getElementById('country_id');
        countryId.value = id;
      }
  
      function CountryUpdateActive(){
          axios.post('CountryActive', {category_id : document.getElementById('country_id').value}).then(respond => {
            successMessage(respond.data.success);
            fetchModals('#CountryActive')
          })
      }
      function countryDelete(id){
        var countryId = document.getElementById('delete_country_id');
        countryId.value = id;
      }
  
      function Country_Delete(){
          axios.post('CountryDelete', {category_id : document.getElementById('delete_country_id').value}).then(respond => {
            successMessage(respond.data.success);
            fetchModals('#CountryDelete')
          })
      }
      var Delete = document.getElementById('Delete');  
      Delete.addEventListener('click', () => {
        
      })
    
    
      function fetchModals(modal){
        fetchCountries()
        document.querySelector('.modal-backdrop').style.display = 'none'
        document.querySelector(modal).style.display = 'none'
      }
      function successMessage(success){
          var message = document.querySelector('.success')
          message.innerHTML = `<div class="show-success fs-4">`+success+`</div>`
      }
      function errorsMessage(errorsRespond){
          var errors = errorsRespond;
          Object.keys(errors).forEach((key)=> {
              console.log(key)
              document.querySelector('.'+key).innerText = errors[key];
          });
      }
  </script>