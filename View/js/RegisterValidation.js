$(document).ready(function () {
    var emailInput = $('#email');
    var smallElement = $('#small');
    var submitButton = $('#mybutton');
  
    var passInput = $('#pass');
    var smallPass = $('#passError');


    var numInput = $('#mobile');''
    var smallNum = $('#NumError');
  
    emailInput.on('input', function () {
      var emailRegex = /^(?!\.)([a-z\d\.-]{1,64})@([a-z\d]+)\.([a-z]{2,3})(\.[a-z]{2,3})?$/m;
      var isEmailValid = emailRegex.test(emailInput.val());
      $("mybutton").attr("disabled", false); 
      if (isEmailValid) {
        smallElement.text('Email is valid');
        smallElement.css('color', 'lime');
        $.post('js/checkemail.php', { email: emailInput.val() }, function (response) {
            if (response === 'taken') {
              smallElement.text('This email is already taken');
              alert("email is already taken");
              smallElement.css('color', 'red');
              $("mybutton").attr("disabled", true); 
            }
          });
      } else {
        smallElement.text('Please enter a valid email');
        smallElement.css('color', 'red');
        $("mybutton").attr("disabled", true); 
      }
    });
  
  
    passInput.on('input', function () {
      var passregex = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s])([^\s]){8,20}$/m;
      var isPasswordValid = passregex.test(passInput.val());
  
      if (isPasswordValid) {
        smallPass.text('password is valid');
        smallPass.css('color', 'lime');
        $("mybutton").attr("disabled", false); 
      } else {
        smallPass.text('Please enter a valid password');
        smallPass.css('color', 'red');
        $("mybutton").attr("disabled", true); 
      }
  
    });


    numInput.on('input', function(){
        var numRegex =/^[0-9]{10}$/;
        var isNumValid = numRegex.test(numInput.val());
        if(isNumValid){
            smallNum.text("mobile numbers is valid");
            smallNum.css('color','lime');
            $("mybutton").attr("disabled", false); 
        }
        else{
            smallNum.text('Please enter a valid mobile number');
            smallNum.css('color','red');
            $("mybutton").attr("disabled", true); 
        }
    })
  });
  