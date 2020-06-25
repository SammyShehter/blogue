const form = document.getElementById('form');
const username = document.getElementById('username');
const id = document.getElementById('ID');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value)) {
        showSuccess(input)
    } else {
        showError(input, 'Email is not valid');
    }
}

const showError = (input,error) => {
    const formControl = input.parentElement;
    formControl.className = 'form-control error';
    const small = formControl.querySelector('small');
    small.innerText = error;
}


const showSuccess = (input) => {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

function checkRequired (inputArray) {
    
    inputArray.forEach(function(input) {
        if(input.value.trim() === '') {
            if(input = password2) {
                showError(input, '');
            }else{
                showError(input, `${getFieldName(input)} is required`);
            }
        } else {
            showSuccess(input);
        }
    });
}

function checkLength (input, min, max = min) {
    if(input.value.length < min) {
        showError(input, `${getFieldName(input)} must be at least ${min} characters`);
    } else if (input.value.length > max) {
        showError(input, `${getFieldName(input)} must be at less than ${max + 1} characters`);
    } else {
        showSuccess(input);
    }
}

function checkID (input) {
    
    if(input.value.length < 9) {
        showError(input, `${getFieldName(input)} must be at least 9 characters`);
    } else if (input.value.length > 10) {
        showError(input, `${getFieldName(input)} must be at less than 10 characters`);
    } else {

        const arr = [];

        for(let j = 0; j < input.value.length; j++) {
            if(j % 2 == 0){
                let i = input.value[j] * 1;
                if(i >= 10){
                    const arrayOfDigits = Array.from(String(i), Number);
                    arr.push(arrayOfDigits.reduce((a, b) => a + b));
                } else {
                    arr.push(i);
                }
                
            } else {
                let i = input.value[j] * 2;
                if(i >= 10){
                    const arrayOfDigits = Array.from(String(i), Number);
                    arr.push(arrayOfDigits.reduce((a, b) => a + b));
                } else {
                    arr.push(i);
                }
            }
        }
        

        let theSum = arr.reduce((a, b) => a + b);
        
        if(theSum/10 % 1 !== 0) {
            showError(input, 'ID is not valid');
        } else {
            showSuccess(input);
        }
    }
}

function checkPasswords (input1, input2) {
    if(input1.value !== input2.value) {
        showError(input2, 'Passwords do not match');
    }
}

function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

form.addEventListener('submit', function(e) {
    e.preventDefault();
    checkRequired([username, id, email, password, password2]);
    checkLength (username, 3, 15);
    checkID(id);
    checkLength (password, 6, 25);
    checkEmail(email);
    checkPasswords(password, password2);
});



