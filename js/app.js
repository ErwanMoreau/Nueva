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


	$('#inputPassword').on('click',function(){

		const chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		const string_length = 8;
		let randomstring = '';

		for (let i = 0; i < string_length; i++) {
			const rnum = Math.floor(Math.random() * chars.length);
			randomstring += chars.substring(rnum, rnum + 1);
		}
		$('#password').val(randomstring);

	});

	$('#numerosCasier').on('click',function(){

		const chars = '0123456789';
		const StringLength = 8;
		let RandomString = '';
		for (let i = 0; i < StringLength; i++) {
		const rnum = Math.floor(Math.random() * chars.length);
		RandomString += chars.substring(rnum, rnum + 1);
		}
		$('#numberCasier').val(RandomString);

	});

});
