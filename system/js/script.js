const button = document.querySelector('.primary');

if(button) {
	button.addEventListener('click', () => {
		const login = document.querySelector('#login').value;
		const password = document.querySelector('#password').value;

		const form = document.querySelector('form');

		if (login === '' && password === '' && email === '') {
			form.setAttribute('onclick','return false')
		} else if(login.length >= 30 && password.length >= 50 && email.length >= 30) {
			form.setAttribute('onclick','return false')
		} else {
		   form.removeAttribute('onclick')
		}

	})
}