encrypt();

function encrypt(){

    //Get the password in plain text
    let password = document.getElementById('password').innerText;
    // console.log(password);
    
    //Encrypt the password
    let encryptedPassword = password.replace(/./g, "*");

    //Display the encrypted password
    let passwordSpan = document.getElementById("password");
    passwordSpan.textContent = encryptedPassword;
}

function edit() {

    document.getElementById('settings-info').style.display = 'none';
    document.getElementById('settings-form').style.display = 'block';

    //Get current information values
    let email = document.getElementById('email').innerText;
    let password = document.getElementById('password').innerText;

    //Populate input fields with current info values
    document.getElementById('new-email').value = email;
    document.getElementById('new-password').value = password;

}

function save(event){
    //Prevent form submission
    event.preventDefault();

    document.getElementById('settings-form').style.display = 'none';
    document.getElementById('settings-info').style.display = 'block';

    //Get the updated info values from input fields
    let newEmail = document.getElementById('new-email').value;
    let newPassword = document.getElementById('new-password').value;
    
    //Update profile info with new info values
    document.getElementById('email').innerText = newEmail;
    document.getElementById('password').innerText = newPassword;
    encrypt();
}