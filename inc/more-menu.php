<script>

var page = 2;
var menu_per_page = <?php echo $khaown_food_menu_default_menu_count; ?>

jQuery(function($) {

    $('body').on('click', '.loadmore', function() {

        $( "#loadingDiv" ).removeClass( "hidden" );

        var data = {

            'action': 'load_menus_by_ajax',

            'page': page,

            'menu_per_page': menu_per_page,

            'security': '<?php echo wp_create_nonce("load_more_menus"); ?>',

            'max_page': <?php echo $em_post_menus->max_num_pages + 1; ?>

        };

        $.post(frontend_ajax_object.ajaxurl, data, function(response) {

            if(response != '') {

                $('.menu-items .row').append(response);

                page++;

                $( "#loadingDiv" ).addClass( "hidden" );

            } else {

                $('.loadmoremenus-wrapper').hide();

                $( "#loadingDiv" ).addClass( "hidden" );

            };

            if (page == data['max_page']) {

                $('.loadmoremenus-wrapper').hide();

                $( "#loadingDiv" ).addClass( "hidden" );

            };

        });

    });

});

</script>
