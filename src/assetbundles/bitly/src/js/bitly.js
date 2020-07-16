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

(function ( $ ) {
 
    $.fn.BitlyField = function(options) {

        var $this = $(this);
        var $create = $this.find('.create');
        var $input = $this.find('.bitly-field-input');
        var $message = $this.find('.message');
        var $bitlink = $this.find('.bitlink');
        var $bitlinkIdHidden = $this.find("[name='fields[bitly][bitlinkId]']");
        var $bitlinkHidden = $this.find("[name='fields[bitly][bitlink]']")
        
        $create.on('click', function(e) {
            e.preventDefault();
            $input.addClass('progress');

            var val = $this.find('.longurl').val();

            axios.get("/bitly/api/create", {
                params: {
                    long_url: val
                }
            }).then(function(response) {
                $input.removeClass('progress');
                $bitlinkIdHidden.val(response.data.id);
                $bitlinkHidden.val(response.data.link);
                $bitlink.html(response.data.link);
                $message.html('Bitlink Create!').addClass('success').removeClass('error');
            }).catch(function(err) {
                $input.removeClass('progress');
                $message.html(err.response.data.error).addClass('error').removeClass('success');
            });
        })
        return this;
    };
 
}( jQuery ));