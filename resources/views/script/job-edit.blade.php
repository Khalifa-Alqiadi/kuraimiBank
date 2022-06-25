<script>
    id = document.getElementById('job_edit_id');
      console.log(id.value)
      axios.get('Edit_Job/' + id.value)
      .then(respond => {
        console.log(respond.data)
        var title_ar = document.getElementById('title_edit_ar')
        var title_en = document.getElementById('title_edit_en')
        var descrip_ar = document.getElementById('descrip_edit_ar')
        var descrip_en = document.getElementById('descrip_edit_en')
        
        title_ar.value = respond.data.job.title.ar
        title_en.value = respond.data.job.title.en
        descrip_ar.value = respond.data.job.description.ar
        descrip_en.value = respond.data.job.description.en
      }) 
</script>