function edit() {

    document.getElementById('profile-info').style.display = 'none';
    document.getElementById('profile-form').style.display = 'block';

    //Get current information values
    let givenName = document.getElementById('givenName').innerText;
    let middleName = document.getElementById('middleName').innerText;
    let lastName = document.getElementById('lastName').innerText;
    let suffixName = document.getElementById('suffixName').innerText;
    let phoneNum = document.getElementById('phoneNum').innerText;
    let birthday = document.getElementById('birthday').innerText;
    let sex = document.getElementById('sex').innerText;
    let civilStat = document.getElementById('civilStat').innerText;
    let religion = document.getElementById('religion').innerText;
    let address = document.getElementById('address').innerText;

    //Populate input fields with current info values
    document.getElementById('new-givenName').value = givenName;
    document.getElementById('new-middleName').value = middleName;
    document.getElementById('new-lastName').value = lastName;
    document.getElementById('new-suffixName').value = suffixName;
    document.getElementById('new-phoneNum').value = phoneNum;
    document.getElementById('new-birthday').value = birthday;
    
    let selectSex = document.getElementById('new-sex');
    for(let i = 0; i < selectSex.options.length; i++){
        if(selectSex.options[i].value === sex){
            selectSex.selectedIndex = i;
            break;
        }
    }

    let selectCivilStat = document.getElementById('new-civilStat');
    for(let i = 0; i < selectCivilStat.options.length; i++){
        if(selectCivilStat.options[i].value === civilStat){
            selectCivilStat.selectedIndex = i;
            break;
        }
    }
    
    document.getElementById('new-religion').value = religion;
    document.getElementById('new-address').value = address;

    hideModal();

    //Show the edit form and hide the profile info
    // document.getElementById('profile-info').classList.add('form-hidden');
    // document.getElementById('profile-form').classList.remove('form-hidden');

}

function save(event){

    //Prevent form submission
    event.preventDefault();

    document.getElementById('profile-form').style.display = 'none';
    document.getElementById('profile-info').style.display = 'block';

    //Get the updated info values from input fields
    let newGivenName = document.getElementById('new-givenName').value;
    let newMiddleName = document.getElementById('new-middleName').value;
    let newLastName = document.getElementById('new-lastName').value;
    let newSuffixName = document.getElementById('new-suffixName').value;
    let newPhoneNum = document.getElementById('new-phoneNum').value;
    let newBirthday = document.getElementById('new-birthday').value;
    let newSex = document.getElementById('new-sex').value;
    let newCivilStat = document.getElementById('new-civilStat').value;
    let newReligion = document.getElementById('new-religion').value;
    let newAddress = document.getElementById('new-address').value;
    
    //Update profile info with new info values
    document.getElementById('givenName').innerText = newGivenName;
    document.getElementById('middleName').innerText = newMiddleName;
    document.getElementById('lastName').innerText = newLastName;
    document.getElementById('suffixName').innerText = newSuffixName;
    document.getElementById('phoneNum').innerText = newPhoneNum;
    document.getElementById('birthday').innerText = newBirthday;
    document.getElementById('civilStat').innerText = newCivilStat;
    document.getElementById('sex').innerText = newSex;
    document.getElementById('religion').innerText = newReligion;
    document.getElementById('address').innerText = newAddress;

    $('.modal-backdrop').remove();
    
    //Hide the edit form and show the profile info
    // document.getElementById('profile-form').classList.add('form-hidden');
    // document.getElementById('profile-info').classList.remove('form-hidden');
}

function showModal(){
    
}

function hideModal(){
    let modal = document.querySelector('.modal');
    modal.style.display = 'none';
}

function removeModalBackdrop(){
    document.getElementById('staticBackdrop').removeAttribute('aria-hidden');
}