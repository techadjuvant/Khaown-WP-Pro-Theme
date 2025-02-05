<?php 
/*
*  Template Name: Reservation
*/
get_header();
?>	
<?php 
    $hide_rsv_header = get_theme_mod("hide_header_section", false);
    if(!$hide_rsv_header) :
?>
    <section class="page-title page-title-4 bg-menu-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                    <h1 class="khaown-site-title"><strong><?php echo get_theme_mod("rsv_header_title", 'Reservation'); ?></strong></h1>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
<?php endif; ?>

<?php
    $hide_rsv_middle = get_theme_mod("rsv_hide_middle_body_section", false);
    if(!$hide_rsv_middle) :
    $reservation_default_photo = get_stylesheet_directory_uri() . '/assets/img/khaown-reservation.jpg';
    $rsv_photo = get_theme_mod("upload_media_reservation_image", $reservation_default_photo);
?>
    <section class="rsv-middle-body image-square right">
        <div class="col-md-6 image">
            <div class="background-image-holder">
                <?php if(!$rsv_photo) : ?> 
                    <img class="background-image" src="<?php echo $reservation_default_photo; ?>" alt="cran-apple turnover credit downstairs loft creaive"/> 
                <?php else : ?>
                    <img class="background-image" src="<?php echo $rsv_photo; ?>" alt="cran-apple turnover credit downstairs loft creaive"/> 
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6 col-md content">
            <h3><?php echo get_theme_mod("rsv_middle_body_title", 'Select your type of reservation here'); ?></h3>
            <p><?php echo get_theme_mod("rsv_middle_body_desc", 'Here will be your description about the reservation.'); ?></p>
        </div>
    </section>
<?php endif; ?>
<?php 
    $hide_rsv_form = get_theme_mod("rsv_hide_form_section", false);
    if(!$hide_rsv_form) :
?>
    <section class="bg-medium-1 rsv-form-container">
        <div class="container" id="contact">
            <div class="row">
                <div class="col-sm-6 col-md-5">
                    <h3>
                        <?php echo get_theme_mod("rsv_reserve_form_left_heading", 'For general information please use our contact form here - this form is for table reservations.'); ?>
                    </h3>
                    <hr>
                    <?php 
                        $hide_rsv_form = get_theme_mod("rsv_hide_form_left_address", false);
                        if(!$hide_rsv_form) :
                    ?>
                        <h4 class="mb8">Our Address:</h4>
                        <p><?php echo wp_kses_post(get_theme_mod( 'location_address', '')); ?></p>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6 col-md-5 col-md-offset-1">
                    <form role="form" id="contactForm" class="form-email submit-once" data-success="<?php _e('We will be in touch shortly.', 'khaown'); ?>" data-error="<?php _e('Please fill all fields correctly. ', 'khaown'); ?>">
                        <input required id="reservation-input" class="reserver-name" type="text" name="name" id="name" placeholder=" <?php _e('Your Name *', 'khaown'); ?>" />
                        <input required id="reservation-input" class="reserver-phone" type="tel" name="phone" placeholder=" <?php _e('Mobile Phone No. *', 'khaown'); ?>" >
                        <input id="reservation-input" class="reserver-email" type="email" name="email" placeholder=" <?php _e('Email Address - optional', 'khaown'); ?>" />
                        <select required id="reservation-input" class="reserver-table-size" name="table_size">
                            <?php 
                                $table_option_1 = wp_kses_post(get_theme_mod( 'rsv_form_table_size_1', 'Small Size Table'));
                                $table_option_2 = wp_kses_post(get_theme_mod( 'rsv_form_table_size_2', 'Average Size Table'));
                                $table_option_3 = wp_kses_post(get_theme_mod( 'rsv_form_table_size_3', 'Large Size Table'));
                            ?>
                                <option class="table-option" value="<?php _e( $table_option_1, 'khaown');   ?>"><?php _e($table_option_1, 'khaown'); ?></option>
                                <option class="table-option" value="<?php _e( $table_option_2, 'khaown'); ?>"><?php _e( $table_option_2, 'khaown'); ?></option>
                                <option class="table-option" value="<?php _e( $table_option_3, 'khaown'); ?>"><?php _e( $table_option_3, 'khaown'); ?></option>
                        </select>
                        <div class="form-group">
                            <div class="input-group date" id="datepicker">
                                <span class="input-group-append input-group-addon"><span class="input-group-text"><i class="ti-calendar"></i></span></span>
                                <input required id="reservation-input" name="reservation_date" placeholder="<?php _e( 'Date', 'khaown'); ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="input-group time" id="startTimepicker">                                      
                                    <span class="input-group-append input-group-addon">
                                        <span class="input-group-text"><i class="ti-timer"></i></span>
                                    </span>
                                    <input id="reservation-input" name="reservation_time_starts" placeholder=" <?php _e( 'Start Time - optional', 'khaown'); ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="input-group time" id="endTimepicker">
                                    <span class="input-group-append input-group-addon">
                                        <span class="input-group-text"><i class="ti-timer"></i></span>
                                    </span>
                                    <input id="reservation-input" name="reservation_time_ends" placeholder=" <?php _e( 'End Time - optional', 'khaown'); ?>"/>
                                </div>
                            </div>
                        </div>
                        <textarea name="message" id="message reservation-input" class="mb16" rows="5" placeholder="<?php _e( 'Message', 'khaown'); ?>"></textarea>
                        <input id="formProcessUrl" class="hidden" type="text" value="<?php echo get_template_directory_uri(); ?>/inc/form-process.php">
                        <input id="email_address" name="email_address" type="text" class="hidden" value="<?php echo get_theme_mod("rsv_receiver_email_of_reservation", "youremail@example.com"); ?>">
                        <button type="submit" id="rsv_form_submit" class="btn btn-success btn-lg pull-right "> <?php _e('Submit', 'khaown'); ?></button>
                        <div id="loadingDiv" class="hidden">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/loading.gif" alt="Loading">
                        </div>
                        <div id="msgSubmit" class="text-center hidden"><p> <?php _e( 'Thank you. Message sent.', 'khaown'); ?> </p></div>
                        <div id="msgNotSubmit" class="text-center hidden"> <p> <?php _e( 'Sorry, message not sent! Please refresh & try again.', 'khaown'); ?> </P> </div>
                    </form>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
<?php endif; ?>

<?php get_footer(); ?>
