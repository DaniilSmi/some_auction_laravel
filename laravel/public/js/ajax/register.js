$(function() {
      $('#register-form').submit(function(e) {
        var $form = $(this);
        $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize()
        }).done(function(response) {
          if (response != 'true') {
            response = response.substring(1);
            response = response.substring(0, response.length - 1)

            $('#error-register').html(response);
          } else {
            $('#error-register').html('');
            window.location.href = '/';
          }
        }).fail(function(response) {
          console.log(response);
        });
        //отмена действия по умолчанию для кнопки submit
        e.preventDefault(); 
      });
});


$(function() {
      $('#login-form').submit(function(e) {
        var $form = $(this);
        $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize()
        }).done(function(response) {
          if (response != 'true') {
            response = response.substring(1);
            response = response.substring(0, response.length - 1)
            
            $('#error-login').html(response);
          } else {
            $('#error-login').html('');
            window.location.href = '/';
          }
        }).fail(function(response) {
          console.log(response);
        });
        //отмена действия по умолчанию для кнопки submit
        e.preventDefault(); 
      });
});


$(function() {
      $('#forgot-pass-form').submit(function(e) {
        var $form = $(this);
        $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize()
        }).done(function(response) {
          console.log(response);
          if (response == 1) {
            $('.form-or-data').html('Check your email');
          } else {
            $('#error-forgot').html(response);
          }
        }).fail(function(response) {
          console.log(response);
        });
        //отмена действия по умолчанию для кнопки submit
        e.preventDefault(); 
      });
});
