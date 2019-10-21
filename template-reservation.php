<?php 
/*
//  Template Name: Reservation Template
*/
get_header();
?>		
<section class="page-title page-title-4 bg-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml16">
                    <h2 class="uppercase mb0 font-white"><strong><?php echo $emotahar['em_reservation_header']; ?></strong></h2>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
<?php  if($emotahar['em_about_reservation_section']) { ?>
    <section class="image-square right">
        <div class="col-md-6 image">
            <div class="background-image-holder"> 
                <img class="background-image" src="<?php echo $emotahar['em_reservation_image']['url']; ?>" alt="cran-apple turnover credit downstairs loft creaive"/> 
            </div>
        </div>
        <div class="col-md-6 col-md content">
            <?php echo $emotahar['em_reservation_body_text']; ?>
        </div>
    </section>
<?php }; ?>
    <section class="bg-medium-1">
        <div class="container" id="contact">
            <div class="row">
                <div class="col-sm-6 col-md-5">
                    <h3>
                        <?php echo $emotahar['em_reservation_title_of_form']; ?>
                    </h3>
                    <hr>
                    <p>

                        <?php echo $emotahar['em_reservation_address']; ?>

                    </p>

                    <h4>

                        <a href="<?php echo $emotahar['em_facebook_account']; ?>"><i class="ti-facebook"></i></a> 

                        <a href="<?php echo $emotahar['em_twitter_account']; ?>"><i class="ti-twitter-alt"></i></a> 

                        <a href="<?php echo $emotahar['em_instagram_account']; ?>"><i class="ti-instagram"></i></a>

                    </h4>

                </div>

                <div class="col-sm-6 col-md-5 col-md-offset-1">

                    <form role="form" id="contactForm" class="form-email" data-success="Thanks for your submission, we will be in touch shortly." data-error="Please fill all fields correctly.">

                        <input required type="text" class="validate-required" name="name" id="name" data-error="NEW ERROR MESSAGE" placeholder="Your Name" />

                        <input required type="text" class="validate-required validate-email" name="email" id="email" data-error="NEW ERROR MESSAGE" placeholder="Email Address" />

                        <select required class="form-group" name="table_size">

                            <?php 

                            $table_options = $emotahar['em_reservation_form_table_size_option'];

                                foreach($table_options as $table_option) { ?> 

                                <option class="table-option" value="<?php echo $table_option; ?>"><?php echo $table_option; ?></option>

                            <?php

                                }

                            ?>

                        </select>

                        <div class="form-group">

                            <div class="input-group date" id="datepicker">

                                <span class="input-group-append input-group-addon">

                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>

                                </span>

                                <input required name="reservation_date" id="today" class="form-control"  placeholder="Reservation Date"/>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 form-group">

                                <div class="input-group time" id="startTimepicker">                                          

                                    <span class="input-group-append input-group-addon">

                                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>

                                    </span>

                                    <input required name="reservation_time_starts" class="form-control" placeholder="Start Time"/>

                                </div>

                            </div>

                            <div class="col-md-6 form-group">

                                <div class="input-group time" id="endTimepicker">

                                    <span class="input-group-append input-group-addon">

                                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>

                                    </span>

                                    <input name="reservation_time_ends" class="form-control" placeholder="End Time"/>

                                </div>

                            </div>

                        </div>

                        

                        <textarea required name="message" id="message" class="form-control" rows="5" data-error="NEW ERROR MESSAGE" placeholder="Message + Phone Number"></textarea>

                        <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>

                        <div id="loadingDiv" class="hidden">

                            <img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" alt="Loading">

                            

                        </div>

                        <div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>

                        <div id="msgNotSubmit" class="h3 text-center hidden">Message Not Submitted!</div>

                        <input id="formProcessUrl" class="hidden" type="text" value="<?php echo get_template_directory_uri(); ?>/form-process.php">

                        <input id="email_address" name="email_address" type="text" class="hidden" value="<?php echo $emotahar["em_reservation_email_receiver"]; ?>">

                    </form>

                    

                </div>

            </div>

            <!--end of row-->

        </div>

        <!--end of container-->

    </section>





<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>



<script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>







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