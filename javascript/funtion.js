var popup = document.getElementById('signup');

window.onclick = function(event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}

function searchValidate() {
    var searchText = document.getElementById("searchText").value;
    if(searchText == ""){
        alert("Search bar requires some text");
        return false;
    }
}

function signupValidate(){

    var firstName = document.forms['signup']['firstName'].value;
    var lastName = document.forms['signup']['lastName'].value;
    var phno = document.forms['signup']['phNo'].value;
    var email = document.forms['signup']['email'].value;
    var password = document.forms['signup']['password'].value;
    var rptPassword = document.forms['signup']['rptPassword'].value;
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if(firstName == ""){
        document.getElementById('signupErrorInfo').innerHTML = 'First Name field should not be empty';
        return false;
    }

    if(lastName == ""){
        document.getElementById('signupErrorInfo').innerHTML = 'Last Name field should not be empty';
        return false;
    }

    if(email == ""){
        document.getElementById('signupErrorInfo').innerHTML = 'Email field should not be empty';
        return false;
    }else if(!emailPattern.test(email)){
        document.getElementById('signupErrorInfo').innerHTML = 'Uh Oh! Seems like the mail format is invalid';
        return false;
    }

    if(phno == ""){
        document.getElementById('signupErrorInfo').innerHTML = 'Phone Number field should not be empty';
        return false;
    }else if( /\D/.test(phno) ){
        document.getElementById('signupErrorInfo').innerHTML = 'Uh Oh! Phone Number field must have a numeric format';
        return false;
    }

    if(password == "" || rptPassword == ""){
        document.getElementById('signupErrorInfo').innerHTML = 'Password field should not be empty';
        return false;
    }else if(password != rptPassword){
        document.getElementById('signupErrorInfo').innerHTML = 'Uh Oh! Password and Repeat password fields doesn\'t match';
        return false;
    }
}

function updateValidate(){

  var firstName = document.forms['update']['firstName'].value;
  var lastName = document.forms['update']['lastName'].value;
  var phno = document.forms['update']['phNo'].value;
  var password = document.forms['update']['password'].value;
  var rptPassword = document.forms['update']['rptPassword'].value;

  if(firstName == ""){
      document.getElementById('updateErrorInfo').innerHTML = 'First Name field should not be empty';
      return false;
  }

  if(lastName == ""){
      document.getElementById('updateErrorInfo').innerHTML = 'Last Name field should not be empty';
      return false;
  }

  if(phno == ""){
      document.getElementById('updateErrorInfo').innerHTML = 'Phone Number field should not be empty';
      return false;
  }else if( /\D/.test(phno) ){
      document.getElementById('updateErrorInfo').innerHTML = 'Uh Oh! Phone Number field must have a numeric format';
      return false;
  }

  if(password != rptPassword){
      document.getElementById('updateErrorInfo').innerHTML = 'Uh Oh! Password and Repeat password fields doesn\'t match';
      return false;
  }

}

function loginValidate(){

    var email = document.forms['login']['loginEmail'].value;
    var password = document.forms['login']['loginPassword'].value;
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(email == ""){
        document.getElementById('loginErrorInfo').innerHTML = 'Email field should not be empty';
        return false;
    }else if(!re.test(email)){
        document.getElementById('errorInfo').innerHTML = 'Uh Oh! Seems like it is not a valid mail';
        return false;
    }

    if(password == ""){
        document.getElementById('loginErrorInfo').innerHTML = 'Password field should not be empty';
        return false;
    }

}

function showPage(shown, hidden){
    document.getElementById(shown).style.display = 'block';
    document.getElementById(hidden).style.display = 'none';
    return false;
}
