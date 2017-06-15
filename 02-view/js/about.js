//Ce fichier s''occupe de l'apparition/dispatition de la nav.

//querySelector About et instructions
var buttonAbout = document.querySelector('nav li:last-child');
var navAside = document.querySelector('nav aside');

//Function show/hide "About", "SignIn", "SignUp"
function toggleElement (element)
{
	element.classList.toggle('visible');
}

//Show/Hide About 
buttonAbout.addEventListener('click', function(){ toggleElement(navAside); });