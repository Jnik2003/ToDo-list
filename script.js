let inp = document.querySelector('.in');
let btn = document.querySelector('.send');
let wrap = document.querySelector('.wrap');
let total = document.querySelector('.total');

btn.addEventListener('click', funcAdd);

let count = 0;

	inp.focus();
function funcAdd(){
	if(inp.value){
		divInp = document.createElement('div');
		divInp.className = 'task';
		wrap.append(divInp);
		paragraph = document.createElement('p');
		paragraph.className = "list";
		paragraph.innerHTML = inp.value;
		divInp.append(paragraph);
		btn = document.createElement('button');
		btn.className = 'del';
		btn.innerHTML = '-';
		divInp.append(btn);
		count++;
		total.innerHTML = 'Всего: '+ count;
	}
	else{
		console.log('Поле пустое ');
	}

	//очистка поля
	inp.value = '';
	//установка фокуса
	inp.focus();


	let dels = document.querySelectorAll('.del');
	for(let del of dels){		
		del.addEventListener('click', funcDel);

	}
}


function funcDel(){
	//console.log(this.previousSibling.innerHTML);
	this.parentNode.remove();
	count--;
	total.innerHTML = 'Всего: '+ count;
}