
//регулярное выражение для проверки чтобы начало пароля были не цифры
const beginWithoutDigit = /^\D.*$/

//регулярное выражение для проверки чтобы в пароле не было специальных символов
const withoutSpecialChars = /^[^-() /]*$/

//регулярное выражение для проверки чтобы в пароле были буквы в малом регистре
const containsSmallLetters = /^.*[a-z]+.*$/

//регулярное выражение для проверки чтобы в пароле были буквы в большом регистре
const containsBigLetters = /^.*[A-Z]+.*$/

//регулярное выражение для проверки длины 6 символов
const checkLength6 = /^.{6,}$/

//регулярное выражение для проверки длины 6 символов и наличия цифр и букв
const checkLength6Alphanum = /^[a-zA-Z0-9]{6,}$/

//регулярное выражение для проверки валидности электронной почты /[^\s@]+@[^\s@]+\.[^\s@]+/   /\S+@\S+\.\S+/g
const checkEmail = /[^\s@]+@[^\s@]+\.[^\s@]+/;

//регулярное выражение для проверки длины 2 и более символов
const checkLength2 = /[A-Za-z]{2,}/

$(document).on('submit', '#reg_form', function(e) {
    e.preventDefault();
	var formData = new FormData(this);
	document.getElementById('error_login').innerHTML='';
	document.getElementById('error_pass').innerHTML='';
	document.getElementById('error_email').innerHTML='';
	document.getElementById('error_name').innerHTML='';
	FormError = 0;
	if( !checkLength6.test( formData.get('login') ) )
	{
		document.getElementById('error_login').innerHTML='Логин должен содержать не менее 6 символов';
		FormError = 3;
	}

	if( !checkLength6Alphanum.test( formData.get('password') ) )
	{
		document.getElementById('error_pass').innerHTML='Пароль должен содержать более 6 символов и состоять из цифр и букв';
		FormError = 4;
	}

	if( formData.get('password') != formData.get('cpassword') )
	{
		document.getElementById('error_pass').innerHTML='Пароль и подтверждение пароля должны совпадать';
		FormError = 6;
	}

	if( !checkEmail.test( formData.get('email') ) )
	{
		document.getElementById('error_email').innerHTML='Электронная почта недействительна';
		FormError = 7;
	}

	if( !checkLength2.test( formData.get('name') ) )
	{
		document.getElementById('error_name').innerHTML='Имя должно содержать не менее 2 буквенных символов';
		FormError = 3;
	}


	if( FormError != 0 )
	{
		return false;
	}
	$.ajax({
        type: "POST",
        url: 'some.php',
        data: formData,
        processData: false,
        contentType: false,
		dataType: 'JSON',
        success: function (response) {
			if(response==null)
				window.location.href = 'user_page.php';
			else if(response['login']!==undefined) {
				var log = response['login'];
				document.getElementById('error_login').innerHTML = log;
			}
			else if(response['email']!==undefined) {
				var email = response['email'];
				document.getElementById('error_email').innerHTML = email;
			}


		}
    });
});



