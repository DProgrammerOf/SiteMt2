function formhash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
 
    // Finally submit the form. 
    form.submit();
}
 
function regformhash(form, uid, username, password, conf) {
     // Check each field has a value
    if (uid.value == ''         || 
          username.value == ''     || 
          password.value == ''  || 
          conf.value == '') {
 
        alert('Você deve fornecer todos os dados solicitados. Por favor, tente novamente.');
        return false;
    }
 
    // Check the username
 
    re = /^\w+$/; 
    if(!re.test(form.username.value)) { 
        alert("Usuário deve conter apenas letras, números e sublinhados. Por favor, tente novamente."); 
        form.username.focus();
        return false; 
    }
 
    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (password.value.length < 6) {
        alert('As senhas devem ter pelo menos 6 caracteres. Por favor, tente novamente.');
        form.password.focus();
        return false;
    }
 
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
 
   // var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    //if (!re.test(password.value)) {
       // alert('As senhas devem conter pelo menos um número, uma letra minúscula e uma letra maiúscula. Por favor, tente novamente.');
        //return false;
   // }
 
    // Check password and confirmation are the same
    if (password.value != conf.value) {
        alert('Sua senha e confirmação não coincidem. Por favor, tente novamente.');
        form.password.focus();
        return false;
    }
 
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
	
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
    conf.value = "";
 
    // Finally submit the form. 
    form.submit();
    return true;
}