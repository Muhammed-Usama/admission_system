const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

function isvalid(){
	var user = document.form.user.value;
	var pass = document.form.pass.value;
	if(user.length=="" && pass.length==""){
			alert(" Username and password field is empty!!!");
			return false;
	}
	else if(user.length==""){
			alert(" Username field is empty!!!");
			return false;
	}
	else if(pass.length==""){
			alert(" Password field is empty!!!");
			return false;
	}
	
}