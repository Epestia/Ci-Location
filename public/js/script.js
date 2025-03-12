$(document).ready(function() {
  $('#togglePassword').click(function() {
    var passwordField = $('#passwordHash');
    var icon = $(this).find('i');

    if (passwordField.attr('type') === 'password') {
      passwordField.attr('type', 'text');
      icon.removeClass('bi-eye');
      icon.addClass('bi-eye-slash');
    } else {
      passwordField.attr('type', 'password');
      icon.removeClass('bi-eye-slash');
      icon.addClass('bi-eye');
    }
  });
});
