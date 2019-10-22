<?php 
/*
//  Template Name: Reservation Template
*/
get_header();
?>	
<?php 
    $hide_rsv_header = get_theme_mod("hide_header_section", false);
    if(!$hide_rsv_header) :
?>
    <section class="page-title page-title-4 rsv-header-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 ml16">
                    <h2 class="uppercase mb0 font-white"><strong><?php echo get_theme_mod("rsv_header_title", 'Reservation'); ?></strong></h2>
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
                    <h4>
                        <a href="<?php// echo $emotahar['em_facebook_account']; ?>"><i class="ti-facebook"></i></a> 
                        <a href="<?php// echo $emotahar['em_twitter_account']; ?>"><i class="ti-twitter-alt"></i></a> 
                        <a href="<?php// echo $emotahar['em_instagram_account']; ?>"><i class="ti-instagram"></i></a>
                    </h4>
                </div>
                <div class="col-sm-6 col-md-5 col-md-offset-1">
                    <form role="form" id="contactForm" class="form-email" data-success="Thanks for your submission, we will be in touch shortly." data-error="Please fill all fields correctly.">
                        <input required type="text" class="validate-required" name="name" id="name" data-error="NEW ERROR MESSAGE" placeholder="Your Name" />
                        <input required type="text" class="validate-required validate-email" name="email" id="email" data-error="NEW ERROR MESSAGE" placeholder="Email Address" />
                        <select required class="form-group" name="table_size">
                            <?php 
                                $table_option_1 = wp_kses_post(get_theme_mod( 'rsv_form_table_size_1', 'Small Size Table'));
                                $table_option_2 = wp_kses_post(get_theme_mod( 'rsv_form_table_size_2', 'Average Size Table'));
                                $table_option_3 = wp_kses_post(get_theme_mod( 'rsv_form_table_size_3', 'Large Size Table'));
                            ?>
                                <option class="table-option" value="<?php echo $table_option_1; ?>"><?php echo $table_option_1; ?></option>
                                <option class="table-option" value="<?php echo $table_option_2; ?>"><?php echo $table_option_2; ?></option>
                                <option class="table-option" value="<?php echo $table_option_3; ?>"><?php echo $table_option_3; ?></option>
                        </select>
                        <div class="form-group">
                            <div class="input-group date" id="datepicker">
                                <span class="input-group-append input-group-addon">
                                    <span class="input-group-text"><i class="ti-calendar"></i></span>
                                </span>
                                <input required name="reservation_date" id="today" class="form-control"  placeholder="Reservation Date"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="input-group time" id="startTimepicker">                                          
                                    <span class="input-group-append input-group-addon">
                                        <span class="input-group-text"><i class="ti-timer"></i></span>
                                    </span>
                                    <input required name="reservation_time_starts" class="form-control" placeholder="Start Time"/>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="input-group time" id="endTimepicker">
                                    <span class="input-group-append input-group-addon">
                                        <span class="input-group-text"><i class="ti-timer"></i></span>
                                    </span>
                                    <input name="reservation_time_ends" class="form-control" placeholder="End Time"/>
                                </div>
                            </div>

                        </div>
                        <textarea required name="message" id="message" class="form-control mb16" rows="5" data-error="NEW ERROR MESSAGE" placeholder="Message + Phone Number"></textarea>
                        <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
                        <div id="loadingDiv" class="hidden">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/loading.gif" alt="Loading">
                        </div>
                        <div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>
                        <div id="msgNotSubmit" class="h3 text-center hidden">Message Not Submitted!</div>
                        <input id="formProcessUrl" class="hidden" type="text" value="<?php echo get_template_directory_uri(); ?>/form-process.php">
                        <input id="email_address" name="email_address" type="text" class="hidden" value="<?php echo 'motahar1201123@gmail.com'; ?>">
                    </form>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
<?php endif; ?>

<?php get_footer(); ?>

<script>

let today = new Date().toISOString().substr(0, 10);

document.querySelector("#today").value = today;



// document.querySelector("#today2").valueAsDate = new Date();



if (/Mobi/.test(navigator.userAgent)) {

    // if mobile device, use native pickers

    $(".date input").attr("type", "date");

    $(".time input").attr("type", "time");

  } else {

    // if desktop device, use DateTimePicker

    $("#datepicker").datetimepicker({

      useCurrent: false,

      format: "LL",

      icons: {

        next: "fa fa-chevron-right",

        previous: "fa fa-chevron-left"

      }

    });

    $("#startTimepicker").datetimepicker({

      format: "LT",

      icons: {

        up: "fa fa-chevron-up",

        down: "fa fa-chevron-down"

      }

    });

    $("#endTimepicker").datetimepicker({

        format: "LT",

        icons: {

          up: "fa fa-chevron-up",

          down: "fa fa-chevron-down"

        }

      });

  }



</script>
