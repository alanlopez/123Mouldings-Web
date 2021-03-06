$(function() {
  $('.error').hide();
  $('input.text-input').css({backgroundColor:"#FFFFFF"});
  $('input.text-input').focus(function(){
    $(this).css({backgroundColor:"#EEEEEE"});
  });
  $('input.text-input').blur(function(){
    $(this).css({backgroundColor:"#FFFFFF"});
  });

  $(".button").click(function() {
		// validate and process form
		// first hide any error messages
    $('.error').hide();
		
	  var name = $("input#name").val();
		if (name == "") {
      $("label#name_error").show();
      $("input#name").focus();
      return false;
    }
		var email = $("input#email").val();
		if (email == "") {
      $("label#email_error").show();
      $("input#email").focus();
      return false;
    }
		var phone = $("input#phone").val();
		if (phone == "") {
      $("label#phone_error").show();
      $("input#phone").focus();
      return false;
    }
    var city = $("input#city").val();
    	if (city == "") {
      $("label#city_error").show();
      $("input#city").focus();
      return false;
    }
    var comment = $("textarea#comment").val();
    	if (city == "") {
      $("label#comment_error").show();
      $("textarea#comment").focus();
      return false;
    }
		
		var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone + '&city=' + city + '&comment=' + comment;
		//alert (dataString);return false;
		
		$.ajax({
      type: "POST",
      url: "_/bin/process.php",
      data: dataString,
      success: function() {
        $('#contact_form').html("<div id='message'></div>");
        $('#message').html("<img id='checkmark' src='_/img/submitted.png' />")
      }
     });
    return false;
	});
});
runOnLoad(function(){
  $("input#name").select().focus();
});
