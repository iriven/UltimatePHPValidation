# UltimatePHPValidation
The ultimate Form validation engine ever created for PHP.

-------------------------------------------------------------------.

[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XDCFPNTKUC4TU)

UltimatePHPValidation, l'un des composants les plus complets jamais trouvés sur le net, destiné à la validation
des données transmises via des formulaires sur le web. 
UltimatePHPValidation est entièrement developpé en PHP et supporte jusqu'à 74 methodes de validation distinctes. Chaque methode correspondant à un type de données attendu(nom, adresse, email,.......). Si malgré toutes les regles de validation prédefinies vous souhaitiez valider une donnée repondant à des criteres specifiques (propre à vous), vous avez la possibilité de definir une expression reguliere, et de la valider grace à la methode "Custom". Avec cet outils, valider vos formulaire n'a jamais été aussi facile.

Declaration des contraintes de validation:
===========================================

*  ++++++ forme compacte  +++++++:

- $constraints = [
	'MyfirstName'=>'required|name|ascii|length:3;32;true',
	'MyPassword'=>'required|password|Fieldsmatches:MyPasswordVerif|minlength:7;false|maxlength:64',
	'MyBirthdate'=>'required|date|birthdate|age:18;true'
	]

* ++++++ forme etendue  +++++++:

- $constraints = [
	'MyfirstName'=>[
	'required',
	'name',
	'ascii',
	'length'=>['min'=>'3','max'=>'32','inclusive'=>false]
	],

	'MyPassword'=>[ 	
	'required',
	'password',
	'Fieldsmatches'=>'MyPasswordVerif',
	'minlength'=>['min'=>'7','inclusive'=>false],
	'maxlength'=>['min'=>'64','inclusive'=>false]
	],
	
	'MyBirthdate'=>[
	'required',
	'date',
	'birthdate',
	'age'=>['min'=>'18','inclusive'=>true]
	]
	]



Utilisation:
==============


	$validation = new IrivenPHPValidation($constraints,$_POST);

	if($validation->isOk())
	{
	.......................
	}
	else
	{
	print_r($validation->getErrors());
	}
