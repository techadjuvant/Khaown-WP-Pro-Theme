
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

      next: "ti-angle-right",

      previous: "ti-angle-left"

      }

  });

  $("#startTimepicker").datetimepicker({

      format: "LT",

      icons: {

      up: "ti-angle-up",

      down: "ti-angle-down"

      }

  });

  $("#endTimepicker").datetimepicker({

      format: "LT",

      icons: {

      up: "ti-angle-up",

      down: "ti-angle-down"

      }

  });

}

