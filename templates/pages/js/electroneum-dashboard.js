$(document).ready(function(){
    /**
     * Styling forces us to use form element, let's disable it's
     * default behaviour as it's making us jump to the top of the
     * page.
     */
    $('form').submit(function() {
        return false;
    })

    /**
     * Sign out button.
     */
    $("#sign_out_button").click(function(){
        $.ajax({url: "/api/auth/signout",
            success: function(result){
                $("#sign_out_feedback").text('Signing out.');
                window.location.replace("/");
            },
            error: function() {
                $("#sign_out_feedback").text('Failed to sign out: ' + response.responseJSON.error_message);
            }
        });
    });

    /**
     * Close the account.
     */
    $("#close_account_button").click(function(){
        $.ajax({
            url: "api/user/closeacc",
            type: 'POST',
            data: {
                username: $("#username_field").val(),
                password: $("#password_field").val(),
            },
            dataType:'JSON',
            success: function(result){
                window.location.replace("/");
            },
            error: function(response) {
                $("#close_account_feedback").html('Close Account unsuccessful: ' + response.responseJSON.error_message);
            }
        });
    });

    /**
     * Updated user fields.
     */
    $("#save_button").click(function(){
        $.ajax({
            url: "api/user/update",
            type: 'POST',
            data: {
                first_name: $("#first_name_field").val(),
                feedback: $("#feedback_field").val(),
                rating: $("#rating_field").val(),
            },
            dataType:'JSON',
            success: function(result){
                $("#sign_in_feedback").text('Update successful!');
            },
            error: function(response) {
                $("#sign_in_feedback").html('Update unsuccessful: ' + response.responseJSON.error_message);
            }
        });

        return false;
    });
});