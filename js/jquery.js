$(document).ready(function(){
    $('.toggle').click(function(){
      $('.sidebar-contact').toggleClass('active')
      $('.toggle').toggleClass('active')
    });

    $("input[name='expiry-data']").mask("00 / 00");
    $("input[name='cardnumber']").mask("0000 0000 0000 0000");
    $("input[name='cvc']").mask("000");
  });
  
  $( function() {
    $( "#datepicker" ).datepicker()
  });

  $(document)
 .on('click','.read-more',function() { 
   $(this).removeClass('read-more').addClass('show-less').html('<h6>Show Less</h6>').prev('.description').removeClass('ellipsis'); 
   })
 .on('click','.show-less',function() { 
  $(this).removeClass('show-less').addClass('read-more').html('<h6>Read More</h6>').prev('.description').addClass('ellipsis'); 
        })
    ;


 