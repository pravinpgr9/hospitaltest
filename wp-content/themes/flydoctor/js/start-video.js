/* include youtube API */
jQuery(document).ready(function ($) {
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
});

jQuery(window).on('load', function () {
    /* start youtube video bg */
    jQuery('.youtube-video').each(function () {
        var data_id = jQuery(this).attr('data-id');
        var id      = jQuery(this).attr('id');
        var player  = new YT.Player(id, {
            width: '1920',
            height: '1080',
            videoId: data_id,
            events: {
                'onReady': function (event) {
                    event.target.setVolume(0);
                    event.target.playVideo();
                },
                'onStateChange': function (event) {
                    if (event.data === YT.PlayerState.ENDED) {
                        event.target.playVideo();
                    }
                }
            }
        });
    });

    /* start vimeo video */
    jQuery('.vimeo-video').each(function () {
        var id     = jQuery(this).attr('id');
        var frame  = document.getElementById(id);
        var player = $f(frame);
        player.addEvent('ready', function () {
            player.api('setVolume', 0);
            player.api('play');
        });
    });

});