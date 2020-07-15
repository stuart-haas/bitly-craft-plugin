/**
 * Bitly plugin for Craft CMS
 *
 * Bitly JS
 *
 * @author    Stuart Haas
 * @copyright Copyright (c) 2020 Stuart Haas
 * @link      https://github.com/stuart-haas
 * @package   Bitly
 * @since     1.0.0
 */

$('body').on('keyup blur change', '.bitly-field input.longurl', function (e) {
    $(this).attr('value', $(this).val());
    $("[name='fields[bitly][bitlink]']").val($(this).val());
});

$('body').on('click', '.bitly-field .create', function (e) {
    e.preventDefault();

    $('.bitly-field-input').addClass('progress');

    var val = $('.bitly-field .longurl').val();

    if(val) {
        axios.get("/bitly/api/create", {
            params: {
                long_url: val
            }
        }).then(function(response) {
            $('.bitly-field-input').removeClass('progress');
            $("[name='fields[bitly][bitlinkId]']").val(response.data.id);
            $("[name='fields[bitly][bitlink]']").val(response.data.link);
            $('span.bitlink').html(response.data.link);
            $('span.message').html('Bitlink Create!').addClass('success').removeClass('error');
        }).catch(function(err) {
            $('.bitly-field-input').removeClass('progress');
            $('span.message').html(err.response.data.error).addClass('error').removeClass('success');
        });
    }
});

$('body').on('click', '.bitly-field .update', function (e) {
    e.preventDefault();

    $('.bitly-field-input').addClass('progress');

    var id = $("[name='fields[bitly][bitlinkId]']").val();
    var val = $("[name='fields[bitly][bitlink]']").val();

    console.log(val);

    if(val) {
        axios.get("/bitly/api/update/", {
            params: {
                id: id,
                long_url: val
            }
        }).then(function(response) {
            $('.bitly-field-input').removeClass('progress');
            $("[name='fields[bitly][bitlinkId]']").val(response.data.id);
            $("[name='fields[bitly][bitlink]']").val(response.data.link);
            $('span.bitlink').html(response.data.link);
            $('span.message').html('Bitlink Updated!').addClass('success').removeClass('error');;
        }).catch(function(err) {
            $('.bitly-field-input').removeClass('progress');
            $('span.message').html(err.response.data.error).addClass('error').removeClass('success');
        });
    }
});