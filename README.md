# UltimatePHPValidation
The ultimate Form validation engine ever created for PHP.


Declaration des contraintes de validation:
===========================================

*  ++++++ forme compacte  +++++++:

- $constraints = [
	'firstName'=>'required|name|ascii|length:3;32;true',
	'MyPassword'=>'required|password|Fieldsmatches:MyPasswordVerif|minlength:7;false|maxlength:64',
	'birthdate'=>'required|date|birthdate|age:18;true'
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
