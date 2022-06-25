$(document).ready(function () {
    fetchCategory();
    fetchCountries();

    
    $("#add_category").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('div.error-text').text('');
            },
            success: function (data) {
                if (data.status == 0) {
                    $('ul.errors-validation').html("");
                    $.each(data.error, function (prefix, val) {
                        // $('div.'+prefix).text(val[0]);
                        // alert(prefix)
                        $('ul.errors-validation').append(
                            `
                      <li class="errors-list p-3 text-white shadow m-2 fs-5">` + val[0] + `</li>
                      `
                        );
                    })
                } else {
                    $('.success-text').text(data.success);
                    fetchCategory();
                }
            }
        })
    });
    $('.UpdateCategory').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (response) {
                if (response.status == 0) {
                    $.each(response.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    })
                } else {
                    // $('.edit_skill_user')[0].reset();
                    $('.success-text').text(response.success);
                    fetchCategory();
                }
            }
        })
    });
    $(document).on('click', '.edit_category', function (e) {
        e.preventDefault();
        var category_id = $(this).val();
        // alert(experience_id)
        $.ajax({
            type: 'GET',
            url: 'edit_category/' + category_id,
            success: function (response) {

                if (response.status == 0) {
                    // $('.success-text').text(response.error);
                } else {
                    $('#cid').val(response.category.id);
                    $('#nameAr').val(response.category.name.ar);
                    $('#nameEn').val(response.category.name.en);
                }
            }
        })
    });
    $(document).on('click', '.Category-active', function (e) {
        e.preventDefault();
        var category_id = $(this).val();
        $('#category_id').val(category_id);
    });
    $('.CategoryActive').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            success: function (response) {
                if (response.status == 0) {
                    $('.success-text').text(response.error);
                } else {
                    // $('.edit_skill_user')[0].reset();
                    $('.success-text').text(response.success);
                    fetchCategory();
                }
            }
        })
    });
    // Start Countries
    
    $(".add_country_admin").on('submit', function (e) {
        e.preventDefault();
        // var data = new FormData(this);
        // alert(data);
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('div.error-text').text('');
            },
            success: function (data) {
                if (data.status == 0) {
                    $('ul.errors-validation').html("");
                    $.each(data.error, function (prefix, val) {
                        // $('div.'+prefix).text(val[0]);
                        // alert(prefix)
                        $('ul.errors-validation').append(
                            `
                      <li class="errors-list p-3 text-white shadow m-2 fs-5">` + val[0] + `</li>
                      `
                        );
                    })
                } else {
                    $('.success-text').text(data.success);
                    fetchCountries();
                }
            }
        })
    });

    $(document).on('click', '.edit_country', function (e) {
        e.preventDefault();
        var country_id = $(this).val();
        // alert(experience_id)
        $.ajax({
            type: 'GET',
            url: 'edit_country/' + country_id,
            success: function (response) {

                if (response.status == 0) {
                    // $('.success-text').text(response.error);
                } else {
                    $('#countryid').val(response.country.id);
                    $('#nameCountryAr').val(response.country.name.ar);
                    $('#nameCountryEn').val(response.country.name.en);
                }
            }
        })
    });

    $('.UpdateCountry').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (response) {
                if (response.status == 0) {
                    $.each(response.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    })
                } else {
                    // $('.edit_skill_user')[0].reset();
                    $('.success-text').text(response.success);
                    fetchCountries();
                }
            }
        })
    });

    $(document).on('click', '.Country-active', function (e) {
        e.preventDefault();
        var country_id = $(this).val();
        $('#country_id').val(country_id);
    });

    $('.CountryActive').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            success: function (response) {
                if (response.status == 0) {
                    $('.success-text').text(response.error);
                } else {
                    // $('.edit_skill_user')[0].reset();
                    $('.success-text').text(response.success);
                    fetchCountries();
                }
            }
        })
    });
})
