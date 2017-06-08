//Ce fichier gère l'apparition/disparition des intructions (header nav) et des formulaires (index.phtml)

/**************************/
/********VARIABLES*********/
/**************************/

//querySelector About et instructions
var buttonAbout = document.querySelector('nav li:last-child');
var navAside = document.querySelector('nav aside');

//querySelector liens et formulaire index.phtml
var buttonSignIn = document.querySelector('main li>a');
var buttonSignUp = document.querySelector('main li+li>a');
var formSignIn = document.querySelector('li form');
var formSignUp = document.querySelector('li+li form');

//querySelector input formulaire SignUp
var formSuscribe = document.querySelector('li+li form');
var pseudo = document.querySelector('li+li form [name="pseudo"]');
var firstName = document.querySelector('li+li form [name="firstName"]');
var lastName = document.querySelector('li+li form [name="lastName"]');
var mail = document.querySelector('li+li form [name="email"]');
var password = document.querySelector('li+li form [name="password"]');
var submitButton = document.querySelector('form [name="validation"]');

//Regex pour chaque champs.
var regexAlphaNum = /^[a-zA-Z]{0,20}(([-\_ ][a-zA-Z]{0,20}){0,3})?[^0-9]$/;
var regexMail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var regexPassword = /^([a-zA-Z0-9@*#]{8,15})$/;


/**************************/
/********FONCTION**********/
/**************************/

//Function show/hide "About", "SignIn", "SignUp"
function toggleElement (element)
{
	element.classList.toggle('visible');
}

//fonction pour colorer les inputs du formulaire
function check (element, regex)
{
	if(regex.test(element.value))
	{
		element.className = 'ok';
	} else {
		element.className = 'wrong';

	}
}

/**************************/
/******CODE PRINCIPAL******/
/**************************/


//HIDE/SHOW FORM
buttonAbout.addEventListener('click', function(){ toggleElement(navAside); });
buttonSignIn.addEventListener('click', function(){ toggleElement(formSignIn); });
buttonSignUp.addEventListener('click', function(){ toggleElement(formSignUp); });

//Contrôle la validité des input
pseudo.addEventListener('keyup', function(){ check(pseudo, regexAlphaNum); });
firstName.addEventListener('keyup', function(){ check(firstName, regexAlphaNum); });
lastName.addEventListener('keyup', function(){ check(lastName, regexAlphaNum); });
mail.addEventListener('keyup', function(){ check(mail, regexMail); });
password.addEventListener('keyup', function(){ check(password, regexPassword); });

//Comportement du bouton Submit
formSuscribe.addEventListener("submit", function(e)
{
	if ((pseudo.className !== 'ok')|| (firstName.className !== 'ok') || (lastName.className !== 'ok') || (mail.className !== 'ok') || (password.className !== 'ok'))
	{
		e.preventDefault();
	}
});