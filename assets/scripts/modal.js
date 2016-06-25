// Adapted from W3Schools - Wanderson Vieira
// Get the modal 
// alert('deu certo');

function showDetail(id){

	//set the ID to hold the current modal ID
	$('#picture').data().id_image = id;  

	//Get Modal attributes
	var img = document.getElementById(id);
	var modalImg = document.getElementById("picture");
	var captionText = document.getElementById("caption");
	var modal = document.getElementById('myModal');	
	
    modal.style.display = "block";

    //Inser data into modal
    modalImg.src = img.src;
    modalImg.alt = img.alt;
    captionText.innerHTML = img.alt;  

	var span = document.getElementsByClassName("close")[0];
	span.onclick = function() {
	    modal.style.display = "none";
	}
}

function next(){
	var idImagem = $('#picture').data().id_image;

	//For each element in the set, get the first element that matches 
	//the selector by testing the element itself and traversing up through 
	//its ancestors in the DOM tree.
	var correspondentImageNumber = $('#'+idImagem).closest('.fotoGrid').index();


	if($('.img-rounded').get(correspondentImageNumber+1) != undefined){

		$('.img-rounded').get(correspondentImageNumber+1).click();
	}	
}

function previous(){
	var idImagem = $('#picture').data().id_image;

	//For each element in the set, get the first element that matches 
	//the selector by testing the element itself and traversing up through 
	//its ancestors in the DOM tree.
	var correspondentImageNumber = $('#'+idImagem).closest('.fotoGrid').index();

	if(correspondentImageNumber-1 >= 0){
		$('.img-rounded').get(correspondentImageNumber-1).click();
	}	
}