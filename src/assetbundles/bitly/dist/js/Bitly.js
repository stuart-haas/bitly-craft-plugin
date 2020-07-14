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

$('body').on('click', '.bitly-field a', function (e) {
    e.preventDefault();

    var val = $('.bitly-field input').val();

    if(val) {
        axios.get("/bitly/api/shorten", {
            params: {
                long_url: val
            }
        }).then(function(response) {
            $('.bitly-field p').html(response.data.link);
        }).catch(function(err) {
            console.log(err);
        });
    }
});