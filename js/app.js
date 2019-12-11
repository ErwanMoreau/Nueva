$(function(){

	var validateEmail = function (email){     
	// comparer l'email au masque email (email@email.com)
		var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);  
	
		var valid = emailReg.test(email);
	
			if(!valid) {
				return false;
			} else {
				return true;
			}
	}
	

	
	$('#addUser').on('submit', function(e){
		// e.preventDefault();

		// let hasErrors = false;
		// let $nom    = $('#nom'),
		// 	$prenom = $('#prenom'),
		// 	$email  = $('#email'),
		// 	$password 	= $('#password'),
		// 	$grade 	= $('#id_grade'),
		// 	$matricule 	= $('#matricule'),
		// 	$red    = 'style=" color : white;padding: 8px 10px 0 10px; font-size: 0.8rem;  background-color: tomato; border : 1px solid tomato" '; 
        // 	$green      = 'style=" color : white;padding-left: 10px;  background-color: green; border : 1px solid green" ';
        
		// if($nom.val().length === 0 ){
		// 	// je supprime la derniere notification 
		// 	$nom.next().remove(); 
		// 	// si l'elelement suivant le input a la classe invalid 
		// 	// si invalide alors je ne le réaffiche pas 
													
		// 	if (!$nom.next().hasClass('invalid')){
		// 		$('<div class="invalid" '+ $red +'> Vous n\'avez pas rempli le nom </div>').appendTo($nom.parent());
		// 	}
			
		// 	hasErrors = true;
		// }
		
		// if($prenom.val().length === 0 ){
		// 	// je supprime la derniere notification 
		// 	$prenom.next().remove(); 
		// 	// si l'elelement suivant le input a la classe invalid 
		// 	// si invalide alors je ne le réaffiche pas 
													
		// 	if (!$prenom.next().hasClass('invalid')){
		// 		$('<div class="invalid" '+ $red +'> Vous n\'avez pas rempli le prenom </div>').appendTo($prenom.parent());
		// 	}
			
		// 	hasErrors = true;
		// }

		// if($password.val().length === 0 ){
		// 	// je supprime la derniere notification 
		// 	$password.next().remove(); 
		// 	// si l'elelement suivant le input a la classe invalid 
		// 	// si invalide alors je ne le réaffiche pas 
													
		// 	if (!$password.next().hasClass('invalid')){
		// 		$('<div class="invalid" '+ $red +'> Vous n\'avez pas générer le password </div>').appendTo($password.parent());
		// 	}
			
		// 	hasErrors = true;
		// }
		
		// if(!validateEmail($email.val())){
		// 	// je supprime la derniere notification 
		// 	$email.next().remove(); 
		// 	// si l'elelement suivant le input a la classe invalid 
		// 	// si invalide alors je ne le réaffiche pas 
												
		// 	if (!$email.next().hasClass('invalid')){
		// 		$('<div class="invalid" '+ $red +'> L\'adresse mail n\'est pas correcte </div>').appendTo($email.parent());
		// 	}
			
		// 	hasErrors = true;
		// }
		// if($matricule.val().length === 0 ){
		// 	// je supprime la derniere notification 
		// 	$matricule.next().remove(); 
		// 	// si l'elelement suivant le input a la classe invalid 
		// 	// si invalide alors je ne le réaffiche pas 
												
		// 	if (!$matricule.next().hasClass('invalid')){
		// 		$('<div class="invalid" '+ $red +'> Le matricule n\'est pas remplie </div>').appendTo($matricule.parent());
		// 	}
			
		// 	hasErrors = true;
		// }

		// if($grade.val() === 0 ){
		// 	// je supprime la derniere notification 
		// 	$grade.next().remove(); 
		// 	// si l'elelement suivant le input a la classe invalid 
		// 	// si invalide alors je ne le réaffiche pas 
												
		// 	if (!$grade.next().hasClass('invalid')){
		// 		$('<div class="invalid" '+ $red +'> L\'adresse mail n\'est pas correcte </div>').appendTo($grade.parent());
		// 	}
			
		// 	hasErrors = true;
		// }
		// console.log(hasErrors);

		// if(!hasErrors){
		// 	return true;
		// } else {
		// 	return false;
		// }
	});

	$('#inputPassword').on('click',function(){

		const chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		const string_length = 8;
		let randomstring = '';

		for (let i = 0; i < string_length; i++) {
			const rnum = Math.floor(Math.random() * chars.length);
			randomstring += chars.substring(rnum, rnum + 1);
		}
		$('#password').val(randomstring);

	})
	
	$('#connect').on('submit', function(e){
		
		let hasErrors = false;
		let $email  = $('#inputEmail3'),
			$red    = 'style=" color : white;padding-left: 10px;  background-color: tomato; border : 1px solid tomato" '; 

		if(!validateEmail($email.val())){
			// je supprime la derniere notification 
			$email.next().remove(); 
			// si l'elelement suivant le input a la classe invalid 
			// si invalide alors je ne le réaffiche pas 
												
			if (!$email.next().hasClass('invalid')){
				$('<div class="invalid" '+ $red +'> L\'adresse mail n\'est pas correcte </div>').appendTo($email.parent());
			}
			
			hasErrors = true;
		}
		
   			

		if(!hasErrors){
			return true;
		} else {
			return false;
		}
	});

	$('#menu-connect').slideUp(400)
	$('#button-connect').click(function(){
		$('#menu-connect').slideToggle('slow');
	})
/*
	$( "input:checked" ).on('change', function(){
		console.log($(this).val());
	});
*/
	$('#connect input').on('change', function() {
		let $change = $('input[name=gridRadios]:checked', '#connect').val(); 

		if($change === 'option1'){
			console.log('salut');
			$('#btn-connect').text('S\'inscrire');
			$('#stayConnect').hide();
			$('form').attr('action','index.php?id=6');
			// $('form').attr('method','GET');
			$('#inputPassword3').attr('readonly',true);
		}else if($change === 'option2'){
			console.log('bonjour');
			$('#stayConnect').show();
			$('#btn-connect').text('Connexion');
			$('form').attr('action','index.php?id=100');
			$('#inputPassword3').attr('readonly',false);
			
		}
	 });
	



});