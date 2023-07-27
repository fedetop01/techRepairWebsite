function EventHandler() {
  var counter = 1;
  var button_next = document.getElementById("nextBtn");
  var button_prev = document.getElementById("prevBtn");
  var button_signIn = document.getElementById("signIn");

  button_signIn.addEventListener("click",()=>{
    counter = 1;
  });
  button_next.addEventListener("click", ()=>{
    counter = switch_steps(counter,"next");
  });

  button_prev.addEventListener("click", ()=>{
    counter = switch_steps(counter,"previous");
  });
  const signUpButton = document.getElementById('signUp');
  const signInButton = document.getElementById('signIn');


  signUpButton.addEventListener('click', () => {
   container.classList.add("right-panel-active");
  });

  signInButton.addEventListener('click', () => {
      container.classList.remove("right-panel-active");
  });




  var form=document.getElementById("signUp_form");
  form.addEventListener('submit',function(e){
    e.preventDefault();

    if (form.Username.value=="") {
      alert("You should enter a username");
      form.Username.classList.add("invalid");
      form.Username.classList.remove("valid");
      return false;
    }else {
      form.Username.classList.add("valid");
      form.Username.classList.remove("invalid");
    }

    if(form.Email.value == "") {
      alert("You must enter an email");
      form.Email.classList.add("invalid");
      form.Email.classList.remove("valid");
      return false;
    }
    else if (form.Email.value != "") {
      var emailValue = form.Email.value.trim();
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(emailValue)) {

      alert("Invalid email");
      form.Email.classList.add("invalid");
      form.Email.classList.remove("valid");
        return false;
    }
    else{

      form.Email.classList.remove("invalid");
      form.Email.classList.add("valid");
    }
  }
  if (form.Password.value == "") {
    alert('You must enter a password');
    form.Password.classList.add("invalid");
    form.Password.classList.remove("valid");

    return false;

  }
    else if (form.Password.value != "") {

        var password = form.Password.value;

        var regex = /^(?=.*\d.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,30}$/;

        if (password.length < 6 || password.length > 30) {
        //  form.Password.setCustomValidity('The password must contain at least 6 characters, and no more than 30!');
          alert('The password must contain at least 6 characters, and no more than 30!');
          form.Password.classList.add("invalid");
          form.Password.classList.remove("valid");

          return false;
        } else if (!regex.test(password)) {
          //form.Password.setCustomValidity('The password must contain at least 2 numbers, a character in uppercase and a special character!');
          alert('The password must contain at least 2 numbers, a character in uppercase and a special character!');
          form.Password.classList.add("invalid");
          form.Password.classList.remove("valid");
          return false;
        }else {

          form.Password.classList.add("valid");
          form.Password.classList.remove("invalid");
      }
    }
    if(form.Address.value == ""){
      alert('You must enter an address!');
      form.Address.classList.add("invalid");
      form.Address.classList.remove("valid");
      return false;
    }
    else{
      form.Address.classList.add("valid");
      form.Address.classList.remove("invalid");
    }
    if(form.Civic_Number.value == ""){
      alert('You must enter a Civic Number for your address!');
      form.Civic_Number.classList.add("invalid");
      form.Civic_Number.classList.remove("valid");
      return false;
    }else{
      form.Civic_Number.classList.add("valid");
      form.Civic_Number.classList.remove("invalid");
    }

    if (form.Birth_Date.value=="") {
      alert('You must enter a birthdate');
      form.Birth_Date.classList.add("invalid");
      form.Birth_Date.classList.remove("valid");
      return false;

  } else  if (form.Birth_Date.value!="") {
      var birthDateInput = form.Birth_Date;
      var birthDate = new Date(birthDateInput.value);
      var currentDate = new Date();
      var minDate = new Date();
      minDate.setFullYear(minDate.getFullYear() - 110);


      if (birthDate < minDate) {

        alert('You must be less than 110 years old.');
        form.Birth_Date.classList.add("invalid");
        form.Birth_Date.classList.remove("valid");
        return false;
      } else {
        var age = currentDate.getFullYear() - birthDate.getFullYear();
        var is18OrOlder = age >= 18;

        if (!is18OrOlder) {

          alert('You must be at least 18 years old.');
          form.Birth_Date.classList.add("invalid");
          form.Birth_Date.classList.remove("valid");
          return false;
        }
        else{
          form.Birth_Date.classList.add("valid");
          form.Birth_Date.classList.remove("invalid");
        }
      }
    }
    if (form.Name.value=="") {
      alert('You must enter a name');
      form.Name.classList.add("invalid");
      form.Name.classList.remove("valid");
      return false;

    } else if (form.Name.value!="") {
      var nameInput = form.Name;
      var name = nameInput.value.trim();

      if (/\d/.test(name)) {

        alert('Name should not contain numbers.');
        form.Name.classList.add("invalid");
        form.Name.classList.remove("valid");
        return false;
      }
      if (/[^\w\s]/.test(name)) {
    alert('Name should not contain special characters.');
    form.Name.classList.add("invalid");
    form.Name.classList.remove("valid");
    return false;
  }

    }
    else{
      form.Name.classList.add("valid");
      form.Name.classList.remove("invalid");
    }
    if (form.Surname.value=="") {
      alert('You must enter a surname');
      form.Surname.classList.add("invalid");
      form.Surname.classList.remove("valid");
      return false;


    } else if (form.Surname.value!="") {
      var snameInput = form.Surname;
      var sname = snameInput.value.trim();

      if (/\d/.test(sname)) {
        alert('Surname should not contain numbers.');
        form.Surname.classList.add("invalid");
        form.Surname.classList.remove("valid");
        return false;
      }

      if (/[^\w\s]/.test(sname)) {
    alert('Surname should not contain special characters.');
    form.Surname.classList.add("invalid");
    form.Surname.classList.remove("valid");
    return false;
  }

    }
    else{
      form.Surname.classList.add("valid");
      form.Surname.classList.remove("invalid");
    }
    if(form.Telephone_Number.value==""){
      alert('You should enter a telephone number');
      form.Telephone_Number.classList.add("invalid");
      form.Telephone_Number.classList.remove("valid");
      return false;

    }else if(form.Telephone_Number.value!=""){
      var telephoneInput = form.Telephone_Number;
      var telephoneNumber = telephoneInput.value.trim();

      if (!/^[0-9]{10}$/.test(telephoneNumber)) {
        alert('Invalid telephone number. Please enter a 10-digit number.');
        form.Telephone_Number.classList.add("invalid");
        form.Telephone_Number.classList.remove("valid");
        return false;
      }

    }else{
      form.Telephone_Number.classList.add("valid");
      form.Telephone_Number.classList.remove("invalid");
    }

    var selectField = document.getElementById("selectField");
    var selectedValue = selectField.value;

    if (selectedValue === "") {
      alert("You must choose a security question");
      selectField.classList.add("invalid");
      selectField.classList.remove("valid");
      return false;
    }else{
      selectField.classList.add("valid");
      selectField.classList.remove("invalid");
    }

    if(form.Answer.value==""){
      alert('You should enter an answer to your security question');
      form.Answer.classList.add("invalid");
      form.Answer.classList.remove("valid");
      return false;
    }else if(form.Answer.value!=""){

      var ansInput = form.Answer;
      var ans = ansInput.value.trim();

      if (/\d/.test(ans)) {
        alert('Answer should not contain numbers.');
        form.Answer.classList.add("invalid");
        form.Answer.classList.remove("valid");
        return false;
      }

      if (/[^\w\s]/.test(ans)) {
        alert('Surname should not contain special characters.');
        form.Answer.classList.add("invalid");
        form.Answer.classList.remove("valid");
        return false;

    }
  }
    else{
      form.Answer.classList.add("valid");
      form.Answer.classList.remove("invalid");
    }


    form.submit();
});
  var f=document.getElementById("sign-in-form");
f.addEventListener('submit',function(e){
  e.preventDefault();


  if (f.EmailSignIn.value=="") {
    alert("You should enter your e-mail");
    f.EmailSignIn.classList.add("invalid");
    f.EmailSignIn.classList.remove("valid");
    f.EmailSignIn.focus();
    return false;
  }else{
    f.EmailSignIn.classList.add("valid");
    f.EmailSignIn.classList.remove("invalid");
  }
  if (f.PasswordSignIn.value=="") {
    alert("You should enter your password");
    f.PasswordSignIn.classList.add("invalid");
    f.PasswordSignIn.classList.remove("valid");
    f.PasswordSignIn.focus();
    return false;
  }else{
    f.PasswordSignIn.classList.add("valid");
    f.PasswordSignIn.classList.remove("invalid");
  }

  f.submit();

});


}


function forgot_password(){
 var container = document.getElementById("container");
 var forgot_password = document.getElementById("forgot_password");
  container.style.display= "none";
  forgot_password.style.display = "block";
}
function turnBack(){
  var container = document.getElementById("container");
  var forgot_password = document.getElementById("forgot_password");

  var verify_security_answer = document.getElementById("verify_security_answer");
  var new_password_form = document.getElementById("new_password_form");
  container.style.display= "block";
  forgot_password.style.display = "none";

  verify_security_answer.style.display = "none";
  new_password_form.style.display = "none";
}

function switch_steps(n,flag){
  var x = document.getElementsByClassName("Generality");
  var step = document.getElementsByClassName("step");
  var prevBtn = document.getElementById("prevBtn");
  var nextBtn = document.getElementById("nextBtn");
  var signUpBtn = document.getElementById("SignUp");

  if(n == 0){
    x[n].style.display = "block";
     step[n].style.setProperty("color", "white");
     step[n].style.setProperty("background","rgb(9,41,121)");
     step[n].style.setProperty("linear-gradient","(90deg, rgba(9,41,121,1) 20%, rgba(5,95,178,1) 55%, rgba(0,103,255,1) 100%)");
     prevBtn.style.display = "none";
  }
  else if(n < x.length && flag == "next"){
      x[n-1].style.display = "none";
      x[n].style.display = "block";
      step[n].style.setProperty("color", "white");
      step[n].style.setProperty("background","#1F86DB");

      step[n-1].style.setProperty("color", "black");
      step[n-1].style.setProperty("background-color", "white");
      prevBtn.style.display = "block";
      n=n+1;
  }
  else if(flag == "previous" && n != 1){
      x[n-1].style.display = "none";
      x[n-2].style.display = "block";
      step[n-2].style.setProperty("color", "white");
      step[n-2].style.setProperty("background","#1F86DB");

      step[n-1].style.setProperty("color", "black");
      step[n-1].style.setProperty("background-color", "white");
      nextBtn.style.display = "block";
      signUpBtn.style.display = "none";
      n=n-1;
    }
    if(n==4){
      nextBtn.style.display = "none";
      signUpBtn.style.display = "block";
    }
    else if(n==1){
      prevBtn.style.display = "none";
    }
  return n;
}

function setFirst(){
  var x = document.getElementsByClassName("Generality");
  var step = document.getElementsByClassName("step");
  var prevBtn = document.getElementById("prevBtn");
  var nextBtn = document.getElementById("nextBtn");
  var signUpBtn = document.getElementById("SignUp");
  for(var n=0; n<x.length; n++){
    x[n].style.display = "none";
    step[n].style.setProperty("color", "black");
    step[n].style.setProperty("background-color", "white");
  }
  x[0].style.display = "block";
  step[0].style.setProperty("color", "white");
  step[0].style.setProperty("background","#1F86DB");
  prevBtn.style.display = "none";
  nextBtn.style.display = "block";
  signUpBtn.style.display = "none";
}

function change_email_question(){

  document.getElementById("verify_email").addEventListener("submit", function(event) {
    event.preventDefault();
    var email_form = document.getElementById("forgot_password");


    var email = document.getElementById("email_reset_password");
    var quest_form = document.getElementById("verify_security_answer");
    var security_question_label = document.getElementById("security_question_label");
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "change_email_question.php?email=" + email.value, true);
    xhr.send();

    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var response = xhr.responseText;

        if (response == "non verificato"){
            alert("Email not valid");
        }
        else{
          email_form.style.display = "none";
          quest_form.style.display = "flex";
          security_question_label.textContent = response;
        }
        }
      };
    });
}

function verify_security_answer(){
    document.getElementById("verify_security_answer").addEventListener("submit", function(event) {
    event.preventDefault();
    var new_password_form = document.getElementById("new_password_form");
    var answer = document.getElementById("security_answer");
    var quest_form = document.getElementById("verify_security_answer");
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "verify_security_answer.php?answer=" + answer.value, true);
    xhr.send();

    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var response = xhr.responseText;
        console.log(response)
        if (response == "non corretto"){
            alert("Answer not valid");
        }
        else{
          quest_form.style.display = "none";
          new_password_form.style.display = "flex";

        }
      }
    };
  });
}
function save_new_password(){
  document.getElementById("new_password_form").addEventListener("submit", function(event) {
  var password = document.getElementById("new_password");
  console.log(password.value)
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "save_new_password.php?password=" + password.value, true);
  xhr.send();
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = xhr.responseText;

      if (response == "corretto"){
        alert("Password changed with success");
      }
      else if(response == "uguale"){
        alert("Password already present");
      }
      else if(response == "nullo"){
        alert("Password field is empty");
      }
      else if(response == "fallita"){
        alert("Connection failed");
      }


    }
  };
});
}

function togglePasswordVisibility() {
  var passwordField1 = document.getElementById("passGenerality");
  var toggleIcon1 = document.getElementById("toggle-password1");

  if (passwordField1.type === "password") {
    passwordField1.type = "text";
    toggleIcon1.innerHTML = '<i class="far fa-eye-slash"></i>';
  } else {
    passwordField1.type = "password";
    toggleIcon1.innerHTML = '<i class="far fa-eye"></i>';
  }

  var passwordField2 = document.getElementById("PasswordSignIn");
var toggleIcon2 = document.getElementById("toggle-password2");

  if (passwordField2.type === "password") {
    passwordField2.type = "text";
    toggleIcon2.innerHTML = '<i class="far fa-eye-slash"></i>';
  } else {
    passwordField2.type = "password";
    toggleIcon2.innerHTML = '<i class="far fa-eye"></i>';
  }


  var passwordField3 = document.getElementById("new_password");
  var toggleIcon3 = document.getElementById("toggle-password3");
  if (passwordField3.type === "password") {
    passwordField3.type = "text";
    toggleIcon3.innerHTML = '<i class="far fa-eye-slash"></i>';
  } else {
    passwordField3.type = "password";
    toggleIcon3.innerHTML = '<i class="far fa-eye"></i>';
  }

}
