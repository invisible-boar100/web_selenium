const button = document.getElementById('submitForm');
const fname = document.getElementById('Firstname');
const lname = document.getElementById('Lastname');
const phone = document.getElementById('Phone');
const email = document.getElementById('Email');
const pass = document.getElementById('Pass');
const cpass = document.getElementById('cPass');

button.addEventListener('click', (e)=> {	
	register(e);
});

const register = (e) =>{
    const fnameValue = fname.value.trim();
	const lnameValue = lname.value.trim();
	const phoneValue = phone.value.trim();
	const emailValue = email.value.trim();
	const passValue = pass.value.trim();
	const cpassValue = cpass.value.trim();

    if(fnameValue === '') {
		setEmptyFor(fname, 'First Name cannot be blank');
		e.preventDefault();
	} else if(!isFname(fnameValue)){
		setEmptyFor(fname, 'Format not valid: Eg. Codex')
		e.preventDefault();
	} else{
		setNotEmptyFor(fname);
	}

	if(lnameValue === '') {
		setEmptyFor(lname, 'Last Name cannot be blank');
		e.preventDefault();
	} else if(!isLname(lnameValue)){
		setEmptyFor(lname, 'Must be valid: Eg. Enterprise')
		e.preventDefault();
	} else{
		setNotEmptyFor(lname);
	}

	if(phoneValue === ''){
		setEmptyFor(phone, 'Phone cannot be blank');
		e.preventDefault();
	} else if(!isPhone(phoneValue)){
		setEmptyFor(phone, 'Must be valid: Eg. 0123456789');
		e.preventDefault();
	} else{
		setNotEmptyFor(phone);
	}

	if(emailValue === '') {
		setEmptyFor(email, 'Email cannot be blank');
		e.preventDefault();
	} else if (!isEmail(emailValue)) {
		setEmptyFor(email, 'Must be Valid: Eg. codex@gmail.com');
		e.preventDefault();
	} else {
		setNotEmptyFor(email);
	}
	
	if(passValue === '') {
		setEmptyFor(pass, 'Password cannot be blank');
		e.preventDefault();
	} else if(!isPassword(passValue)){
		setEmptyFor(pass, '8 or more include:0-9 | A-Z | a-z | #?!@$%^&*-');
		e.preventDefault();
	}else {
		setNotEmptyFor(pass);
	}	

	if(cpassValue === ''){
		setEmptyFor(cpass, 'Re-password cannot be blank');
		e.preventDefault();
	} else if(passValue !== cpassValue){
		setEmptyFor(cpass, 'Passwords do not match');
		e.preventDefault();
	} else{
		setNotEmptyFor(cpass);
	}	

	if(fnameValue !== ''&& isFname(fnameValue) && lnameValue !== '' && isLname(lnameValue) && phoneValue !== '' && isPhone(phoneValue) && emailValue != '' && isEmail(emailValue) && passValue !== '' && isPassword(passValue) && cpassValue !== '' && cpassValue === passValue){
		Loader();
		Loader.show();
	}
}




function setEmptyFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-element error';
	small.innerText = message;
}

function setNotEmptyFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-element success';
}

function isFname(fname){
	return /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*$/.test(fname);
}

function isLname(lname){
	return /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*$/.test(lname);
}

function isPhone(phone){
	return /^\+?([0-9]{1,3})\)?([\d ]{9,15})$/.test(phone);
}

function isEmail(email) {
	return /([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@gmail([\.])com$/.test(email);
}

function isPassword(password) {
	return  /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/.test(password);
}