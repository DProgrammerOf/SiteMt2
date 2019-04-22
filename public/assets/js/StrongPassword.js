function StrongPassword(txt) {
    var vSpecial = /\W+/;
    var vUpper = /[A-Z]/;
    var vLower = /[a-z]/;
    var vNumber = /\d/;
    var vMinSize = /(^.{10,20})$/;

    var imgSpecial = document.getElementById('imgSpecialCharacter');
    var imgUpper = document.getElementById('imgUppercase');
    var imgLower = document.getElementById('imgLowerCase');
    var imgNumber = document.getElementById('imgNumber');
    var imgMinSize = document.getElementById('imgMinimalSize');

    if (vSpecial.test(txt))
        imgSpecial.className = "ok";
    else
        imgSpecial.className = "erro";
    if (vUpper.test(txt))
        imgUpper.className = "ok";
    else
        imgUpper.className = "erro";
    if (vLower.test(txt))
        imgLower.className = "ok";
    else
        imgLower.className = "erro";
    if (vNumber.test(txt))
        imgNumber.className = "ok";
    else
        imgNumber.className = "erro"
    if (vMinSize.test(txt))
        imgMinSize.className = "ok";
    else
        imgMinSize.className = "erro";
}				