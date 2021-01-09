let out = document.querySelector('.out');
let mailBtn = document.querySelector('.mail');

let result = document.querySelector('.result');



mailBtn.addEventListener('click', funcMail);



function funcMail(){
		let lists = document.querySelectorAll('.list');
		let data = [];
		data[0] = out.value;
		for(let i = 0; i <lists.length; i++){
			data[i+1] = lists[i].innerHTML;
		}
		//console.log(data);



	fetch('mail.php', {
			method: 'POST', // *GET, POST, PUT, DELETE, etc.
   			headers: {
      		//'Content-Type': 'application/json'
      		'Content-Type': 'application/x-www-form-urlencoded',
    		},
  			  
   			 //body: "mail=" + out.value, // body data type must match "Content-Type" header
   			 //body: JSON.stringify(data),
   			 body: JSON.stringify(data),
		})
		.then(function(response){
			return response.text();
			//return response.json();
		})
		.then(function(response){
			//console.log(response);
			result.innerHTML = response;
		})	

		// 
		
}