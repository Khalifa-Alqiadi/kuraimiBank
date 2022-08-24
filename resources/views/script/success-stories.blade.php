<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
      id = document.getElementById('storyid');
      console.log(id.value)
      axios.get('Edit_Success_stories/' + id.value)
      .then(respond => {
        var title_ar = document.getElementById('edit_title_ar')
        var title_en = document.getElementById('edit_title_en')
        var description_ar = document.getElementById('edit_description_ar')
        var description_en = document.getElementById('edit_description_en')
        var onther_description_ar = document.getElementById('edit_onter_description_ar')
        var onther_description_en = document.getElementById('edit_onter_description_en')
        console.log(respond.data)
        title_ar.value = respond.data.stories.title.ar
        title_en.value = respond.data.stories.title.en
        description_ar.value = respond.data.stories.description.ar
        description_en.value = respond.data.stories.description.en
        onther_description_ar.value = respond.data.stories.onther_description.ar
        onther_description_en.value = respond.data.stories.onther_description.en
      })
</script>