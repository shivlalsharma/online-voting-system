let flag = 0;

const error = document.getElementsByClassName('error');

const uppercase = new RegExp("(?=.*?[A-Z])");
const lowercase = new RegExp("(?=.*?[a-z])");
const digit = new RegExp("(?=.*?[0-9])");
const onlydigit = new RegExp("(^[0-9]+$)");
const specialChar = new RegExp("(?=.*?[#?!@$%^&*-])");
const eightChar = new RegExp("^.{8,}$");
const white = new RegExp("\\s");

function validatePassword(obj){
    if(obj.length>0){
        if(white.test(obj)==1){
            error[0].innerText = "Do not enter white space";
            flag = 0;
        }
        else if(uppercase.test(obj)==0){
            error[0].innerText = "Enter atleast 1 uppercase";
            flag = 0;
        }
        else if(lowercase.test(obj)==0){
            error[0].innerText = "Enter atleast 1 lowercase";
            flag = 0;
        }
        else if(specialChar.test(obj)==0){
            error[0].innerText = "Enter atleast 1 special character";
            flag = 0;
        }
        else if(digit.test(obj)==0){
            error[0].innerText = "Enter atleast 1 digit";
            flag = 0;
        }
        else if(eightChar.test(obj)==0){
            error[0].innerText = "Enter atleast 8 character";
            flag = 0;
        }
        else{
            error[0].innerText = "";
            flag = 1;
        }
    }
    else{
        error[0].innerText = "";
        flag = 0;
    }
}

function validateCPassword(obj){
    const password = document.querySelector('#password').value;
    if(obj.length > 0){
        if(obj !== password){
            error[1].innerText = "Invalid confirm password";
            flag = 0;
        }
        else{
            error[1].innerText = "";
            flag = 1;
        }
    }
    else{
        error[1].innerText = "";
        flag = 0;
    }
}

function validate(){
    if(flag == 0){
        return false;
    }
    else{
        return true;
    }
}

const x = document.getElementById('password');
const y = document.getElementById('eyeClose');

function toggle(){
    if(x.type=="password"){
        x.type="text";
        y.classList.add("fa-eye");
        y.classList.remove("fa-eye-slash");
    }
    else{
        x.type="password";
        y.classList.add("fa-eye-slash");
        y.classList.remove("fa-eye");
    }
}
