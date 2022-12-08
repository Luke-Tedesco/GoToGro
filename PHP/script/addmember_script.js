
function validate() {
    let result = true;
    let errMsg = "Please Fix The Below Errors:\n\n";
    let firstName = document.getElementById("InputFirstName").value;
    let lastName = document.getElementById("InputLastName").value;
    let email = document.getElementById("InputEmail").value;
    let phone = document.getElementById("InputPhoneNumber").value;
    let dateJoined = document.getElementById("InputDateJoined").value;
    let dateExpired = document.getElementById("InputMembershipExpiry").value;

    //For each input which does not satisfy the conditions, the error message displayed at the end grows
    if (firstName == "") {
        errMsg += "First Name cannot be empty \n";
    }
    else if (!firstName.match(/^[a-zA-Z ]+$/)) { //RegEx detects if the correct input is written
        errMsg = errMsg + "Please enter a valid first name\n";
    }

    if (lastName == "") {
        errMsg += "Last Name cannot be empty \n";
    }
    else if (!lastName.match(/^[a-zA-Z- ]+$/)) {
        errMsg = errMsg + "Please enter a valid last name \n";
    }

    if (email == "") {
        errMsg += "Please enter an email address \n";
    }
    else if (!email.match(/^.+@.+$/)) {
        errMsg = errMsg + "Please enter a valid Email \n";
    }

    if (phone == "") {
        errMsg += "Please enter a Phone Number \n";
    }
    else if (!phone.match(/^\d{10}$/)) {
        errMsg = errMsg + "You have entered the Phone Number in the incorrect format \n";
    }

    if (dateJoined == "") {
        errMsg += "Please enter the date the memebership started \n";
    }

    if (dateExpired == "") {
        errMsg += "Please enter the date the membership expires \n";
    }

    if (errMsg != "Please Fix The Below Errors:\n\n") { //original error message 
        alert(errMsg);
        result = false;
    }

    return result;
}

function init() {
    let submit = document.getElementById("addmember")
    submit.onsubmit = validate;
}

window.onload = init;