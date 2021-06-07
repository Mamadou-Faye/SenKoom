// mon modal contact
var modal = document.getElementById("myModal");
var btn = document.getElementById("mybtn");
var span = document.getElementsByClassName("close")[0];

btn.addEventListener('click', openModal);
span.addEventListener('click', closeModal);
window.addEventListener('click', clickOutside);

function openModal(){
	modal.style.display = "block";
}

function closeModal(){
	modal.style.display = "none";
}

function clickOutside(event){
	if (event.target == modal) {
		modal.style.display = 'none';
	}
}

// mon modal commandes
var modalCommande = document.getElementById('myModalCommande');
var btnCommande = document.getElementById('btnCommande');
var spanCommande = document.getElementsByClassName('closeCommande')[0];
btnCommande.addEventListener('click', openModalCommande);
spanCommande.addEventListener('click', closeModalCommande);
window.addEventListener('click', clickOutsideCommande);

function openModalCommande(){
	modalCommande.style.display = "block";
}

function closeModalCommande(){
	modalCommande.style.display = "none";
}

function clickOutsideCommande(event){
	if (event.target == modalCommande) {
		modalCommande.style.display = 'none';
	}
}

// mon modal client
var modalClient = document.getElementById('myModalClient');
var btnClient = document.getElementById('btnClient');
var spanClient = document.getElementsByClassName('closeClient');

btnClient.addEventListener('click', openModalClient);
spanClient.addEventListener('click', closeModalClient);
window.addEventListener('click', clickOutsideClient);

function openModalClient(){
	modalClient.style.display = "block";
}

function closeModalClient(){
	modalClient.style.display = "none";
}

function clickOutsideClient(event){
	if (event.target == modalClient) {
		modalClient.style.display = 'none';
	}
}