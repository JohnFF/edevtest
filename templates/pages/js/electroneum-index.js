$(document).ready(function(){

    /**
     * Implement scroll functionality.
     */
      $('.scroll_link').click(function() {
          $([document.documentElement, document.body]).animate({
              scrollTop: $('#' + $(this).attr('data-scrollto')).offset().top
          }, 1000);
      });

      /**
       * Provide user feedback on the username while they're typing.
       */
      $("#register_username_field").keyup(function(){
          // Username too long.
          if ($('#register_username_field').val().length > $('#register_username_field').attr('data-max_length')) {
              $("#register_username_feedback").text('Username too long');
              return false;
          }
          // Username contains invalid characters.
          var regex = new RegExp($("#register_username_field").attr('data-regex'));

          if (false == regex.test($('#register_username_field').val())) {
              $("#register_username_feedback").text('Username contains invalid characters.');
          }
          else {
              $("#register_username_feedback").text('');
          }
      });

      /**
       * Provide user feedback on the password while they're typing.
       */
      $("#register_password_field").keyup(function(){
          // Password too short.
          if ($('#register_password_field').val().length < $('#register_password_field').attr('data-min_length')) {
              $("#register_password_feedback").text('Password too short');
              return false;
          }
          // Password too long.
          else if ($('#register_password_field').val().length > $('#register_password_field').attr('data-max_length')) {
            $("#register_password_feedback").text('Password too long');
            return false;
          }
          // Password contains invalid characters.
          var regex = new RegExp($("#register_password_field").attr('data-regex'));
          // Password doesn't contain special characters.
          if (false == regex.test($("#register_password_field").val())) {
              $("#register_password_feedback").text('Make sure to include upper case, lower case, numbers, and special characters in your password.');
          }
          else {
              $("#register_password_feedback").text('');
          }
      });

     /**
      * User clicks the register button.
      */
      $("#register_button").click(function(){
          $.ajax({
              url: "/api/user/register",
              type: 'POST',
              data: {
                  username: $("#register_username_field").val(),
                  first_name: $("#register_first_name_field").val(),
                  password: $("#register_password_field").val(),
              },
              dataType:'JSON',
              success: function(result){
                  $("#registration_feedback").text('Registration successful!');
                  window.setTimeout(function() {
                      window.location.replace("/dashboard");
                  }, 2000);
              },
              error: function(response) {
                  $("#registration_feedback").html('Registration unsuccessful!<br/>' + response.responseJSON.error_message);
              }
          });
      });

     /**
      * User clicks the sign in button.
      */
      $("#sign_in_button").click(function(){
          $.ajax({
              url: "/api/auth/signin",
              type: 'POST',
              data: {
                  password: $("#sign_in_password_field").val(),
                  username: $("#sign_in_username_field").val(),
              },
              dataType:'JSON',
              success: function(result){
                  $("#sign_in_feedback").text('Sign in successful!');
                  window.setTimeout(function() {
                      window.location.replace("/dashboard");
                  }, 2000);
              },
              error: function(response) {
                  $("#sign_in_feedback").html('Sign in unsuccessful!<br/>' + response.responseJSON.error_message);
              }
          });
      });
  });