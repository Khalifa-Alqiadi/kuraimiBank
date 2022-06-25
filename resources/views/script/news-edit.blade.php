<script>
    id = document.getElementById('new_edit_id');
      console.log(id.value)
      axios.get('Edit_News/' + id.value)
      .then(respond => {
        var title_ar = document.getElementById('title_edit_ar')
        var title_en = document.getElementById('title_edit_en')
        var descrip_ar = document.getElementById('descrip_edit_ar')
        var descrip_en = document.getElementById('descrip_edit_en')
        
        title_ar.value = respond.data.news.title.ar
        title_en.value = respond.data.news.title.en
        descrip_ar.value = respond.data.news.description.ar
        descrip_en.value = respond.data.news.description.en
      }) 
</script>