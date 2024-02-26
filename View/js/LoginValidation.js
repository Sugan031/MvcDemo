$(document).ready(function () {
    var emailInput = $('#email');
    var smallElement = $('#small');
  
    var passInput = $('#pass');
    var smallPass = $('#passError');
  
    emailInput.on('input', function () {
      var emailRegex = /^(?!\.)([a-z\d\.-]{1,64})@([a-z\d]+)\.([a-z]{2,3})(\.[a-z]{2,3})?$/m;
      
      var isEmailValid = emailRegex.test(emailInput.val());
      if (isEmailValid) {
        smallElement.text('Email is valid');
        smallElement.css('color', 'lime');
      } else {
        smallElement.text('Please enter a valid email');
        smallElement.css('color', 'red');
      }
    });
  
  
    passInput.on('input', function () {
      var passregex = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s])([^\s]){8,20}$/m;
      var isPasswordValid = passregex.test(passInput.val());
  
      if (isPasswordValid) {
        smallPass.text('password is valid');
        smallPass.css('color', 'lime');
      } else {
        smallPass.text('Please enter a valid password');
        smallPass.css('color', 'red');
      }
  
    });

  });
  