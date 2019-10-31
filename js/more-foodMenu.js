
var page = 2;
var menu_per_page = $("#khaown_FoodMenu_perPage").val();
var maxPage = $("#khaown_FoodMenu_maxPage").val();
var khaown_foodMenu_security = $("#khaown_FoodMenu_security").val();

jQuery(function($) {

    $('body').on('click', '.loadmore', function() {

        $( "#loadingDiv" ).removeClass( "hidden" );

        var data = {

            'action': 'load_menus_by_ajax',

            'page': page,

            'menu_per_page': menu_per_page,

            'security': khaown_foodMenu_security,

            'max_page': maxPage

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


