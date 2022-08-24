<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
      id = document.getElementById('applicationid');
      console.log(id.value)
      axios.get('Edit_Application/' + id.value)
      .then(respond => {
        var name_ar = document.getElementById('application_name_edit_ar')
        var name_en = document.getElementById('application_name_edit_en')
        var play_link = document.getElementById('application_play_link_edit')
        var store_link = document.getElementById('application_store_link_edit')
        var application_info_ar = document.getElementById('application_info_edit_ar')
        var application_info_en = document.getElementById('application_info_edit_en')
        console.log(respond.data)
        name_ar.value = respond.data.application.name.ar
        name_en.value = respond.data.application.name.en
        play_link.value = respond.data.application.play_link
        store_link.value = respond.data.application.store_link
        application_info_ar.value = respond.data.application.list_info.ar
        application_info_en.value = respond.data.application.list_info.en
      })
</script>