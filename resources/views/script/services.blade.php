<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
  
    var addService = document.getElementById('add_service');
    addService.addEventListener('click', ()=> {
      
      CKEDITOR.replace('service_info_ar', {
            uiColor: '#FFFFFF',
        });
        CKEDITOR.replace('service_info_en', {
            uiColor: '#FFFFFF',
        });
      axios.post('add_service', {
        service_info_ar : document.getElementById('service_info_ar').value,
        service_info_en : document.getElementById('service_info_en').value,
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
        // fetchModals('#ServicesAdd')
        }
      })
      .catch(function (error) {
        console.log(error);
        });
    });

    // var service_id = document.getElementById('service_id')
    // service_id.addEventListener('click', ()=>{
      id = document.getElementById('serviceid');
      console.log(id.value)
      axios.get('Edit_Service/' + id.value)
      .then(respond => {
        var name_ar = document.getElementById('service_name_edit_ar')
        var name_en = document.getElementById('service_name_edit_en')
        var service_info_ar = document.getElementById('service_info_edit_ar')
        var service_info_en = document.getElementById('service_info_edit_en')
        console.log(respond.data)
        name_ar.value = respond.data.service.name.ar
        name_en.value = respond.data.service.name.en
        service_info_ar.value = respond.data.service.service_info.ar
        service_info_en.value = respond.data.service.service_info.en
      })
    // })
</script>