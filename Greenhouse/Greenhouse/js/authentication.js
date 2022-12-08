var elUsername = document.getElementById('create-username');
var elPass = document.getElementById('create-password');
var elMsg = document.getElementById('feedback');

function checkUsername(minLength) {
    if (elUsername.value.length < minLength) {
        elMsg.textContent = "Username not long enough yet...";
    } else {
        elMsg.innerHTML = "";
    }
}

function tipUsername () {
    elMsg.innerHTML = "Username must be " + minLength + " characters of more.";
}

function checkPassword(minLength) {
    if (elPass.value.length < minLength) {
        elMsg.textContent = "Password must be atleasr " + minLength + " characters.";
    } else {
        elMsg.innerHTML = "";
    }
}

// Binding event to element
/**
*Check if username is five or more characters
*/
if (elUsername.addEventListener) {
    elUsername.addEventListener('blur', function() {
        checkUsername(5);
    }, false );
    // elUsername.addEventListener('focus', tipUsername, false);
} else {
    elUsername.attachEventListener('onblur', function() {
        checkUsername(5);
    });
    // elUsername.attachEventListener('onfocus', tipUsername);
}

/**
*Check if password is five or more characters
*/
if (elPass.addEventListener) {
    elPass.addEventListener('blur', function() {
        checkPassword(8);
    }, false );
} else {
    elPass.attachEventListener('onblur', function() {
        checkPassword(8);
    });
}