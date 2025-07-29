const button = document.getElementById('submitForm');
const email = document.getElementById('Email');
const pass = document.getElementById('Pass');

button.addEventListener('click', (e)=> {	
	login(e);
});

const login = (e) =>{
	const emailValue = email.value.trim();
	const passValue = pass.value.trim();

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
	

	if(emailValue != '' && isEmail(emailValue) && passValue !== '' && isPassword(passValue)){
		Loader();
		Loader.show();
		setTimeout(Loader.hide(),2000);
		
		
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

function isEmail(email) {
	return /([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@gmail([\.])com$/.test(email);
}

function isPassword(password) {
	return  /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/.test(password);
}