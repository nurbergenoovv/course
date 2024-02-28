const body = document.body;
const loader = document.getElementById('loader');

if(body.onload){
	loader.style.display = 'flex';
}else{
	loader.style.display = 'none';
}