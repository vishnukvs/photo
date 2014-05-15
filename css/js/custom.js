$(function  () {
  $('.hiden1').hide();
  $('.hiden2').hide();
  $('.hiden3').hide();
  $('.hiden4').hide();
  $('.hiden5').hide();
  $('.hiden6').hide();


   $('#infringement-appeal-form select[name="InfringementAppeal[transactions_found]"]').change(function ()
     {
     if ($('#infringement-appeal-form select[name="InfringementAppeal[transactions_found]"]').val() == '1')
         {
            $('.hidden2').show();
         }
         else
          {
            $('.hidden2').hide();
        }
    });
   $('#infringement-appeal-form select[name="InfringementAppeal[error_found]"]').change(function ()
     {
     if ($('#infringement-appeal-form select[name="InfringementAppeal[error_found]"]').val() == '1')
         {
            $('.hidden3').show();
         }
         else
          {
            $('.hidden3').hide();
        }
    });
  });


$(function() {
    $('.explain-box').hide();

    $('#no1').click(function() {
        $('#explain1').show();
    });

    $('#yes1').click(function() {
        $('#explain1').hide();
    });
});