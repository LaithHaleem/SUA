$('#frm').on('change', function() {
  $.ajax({
      url: 'upload.php',
      method: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,
      beforeSend: function() {
        var html = '';
        html += '<div class="loading"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw pici"></i></div>'
        $('#imgplace').html(html);
      },
      success: function(data) {
         var html = '';
         if(data == '0') {
         	html += '<div class="error">Sorry... Your File Type Unallowed Please Choose Another One</div>';
         	$('#alerts').html(html);
         	$('.error').delay(2000).fadeOut(500);
         $('.loading').fadeOut(500);
         }else if(data == '00') {
         	html += '<div class="error">Sorry... Your File Size Very Big Please Choose Another Less Than 500Kb</div>';
         	$('#alerts').html(html);
         	$('.error').delay(2000).fadeOut(500);
         $('.loading').fadeOut(500);
         }else {
         $('.loading').fadeOut(500);
         $('#imgplace').html(data);
     		}
      }
  });
});