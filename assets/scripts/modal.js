// Adapted from W3Schools - Wanderson Vieira
// Get the modal 
// alert('deu certo');


function showDetail(id){

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

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];
	span.onclick = function() {
	    modal.style.display = "none";
	}
}