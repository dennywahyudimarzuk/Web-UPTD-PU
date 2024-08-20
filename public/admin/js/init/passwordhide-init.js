$(function() {
    'use strict'

    $('.hide').click(function() {
      if ($('#password').attr('type') === 'password') {
          $('#password').attr('type', 'text');
          $('#eye').attr('class', 'fa fa-eye');
        } else {
          $('#password').attr('type', 'password');
          $('#eye').attr('class', 'fa fa-eye-slash');
      }
    });

    $('.bg-transparent-new-password').click(function() {
      if ($('#new_password').attr('type') === 'password') {
          $('#new_password').attr('type', 'text');
          $('#eye_new_password').attr('class', 'fa fa-eye');
        } else {
          $('#new_password').attr('type', 'password');
          $('#eye_new_password').attr('class', 'fa fa-eye-slash');
      }
    });

    $('.bg-transparent-confirm-password').click(function() {
      if ($('#new_password_confirmation').attr('type') === 'password') {
          $('#new_password_confirmation').attr('type', 'text');
          $('#eye_new_password_confirmation').attr('class', 'fa fa-eye');
        } else {
          $('#new_password_confirmation').attr('type', 'password');
          $('#eye_new_password_confirmation').attr('class', 'fa fa-eye-slash');
      }
    });
});