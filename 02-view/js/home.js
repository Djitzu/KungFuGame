//Ce fichier gère les formulaires de home.php, n'est chargé que si la utilisateur est déconnecté.

/**************************/
/********VARIABLES*********/
/**************************/



//querySelector liens et formulaire index.phtml
var formSignIn = document.querySelector('li form');
var buttonSignIn = document.querySelector('main li>a');
var formSignUp = document.querySelector('li+li form');
var buttonSignUp = document.querySelector('main li+li>a');

//querySelector input formulaire SignIn
var pseudoSigniIn = document.querySelector('li form [name="pseudo"]');
var passwordSigniIn = document.querySelector('li form [name="password"]');


//querySelector input formulaire SignUp
var formSuscribe = document.querySelector('li+li form');
var pseudo = document.querySelector('li+li form [name="pseudo"]');
var firstName = document.querySelector('li+li form [name="firstName"]');
var lastName = document.querySelector('li+li form [name="lastName"]');
var mail = document.querySelector('li+li form [name="email"]');
var password = document.querySelector('li+li form [name="password"]');

//Regex pour chaque champs.
var regexAlphaNum = /^[a-zA-Z]{0,20}(([-\_ ][a-zA-Z]{0,20}){0,3})?[^0-9]$/;
var regexMail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//var regexPassword = /^([a-zA-Z0-9@*#]{8,15})$/;
var regexPassword = /^([a-zA-Z0-9@*#^\\$£+§µ%\/-]{8,15})$/;


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
buttonSignIn.addEventListener('click', function(){ toggleElement(formSignIn); formSignUp.classList.remove('visible'); });
buttonSignUp.addEventListener('click', function(){ toggleElement(formSignUp); formSignIn.classList.remove('visible'); });

//Contrôle la validité des input
pseudoSigniIn.addEventListener('keyup', function(){ check(pseudoSigniIn, regexAlphaNum); });
passwordSigniIn.addEventListener('keyup', function(){ check(passwordSigniIn, regexPassword); });

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