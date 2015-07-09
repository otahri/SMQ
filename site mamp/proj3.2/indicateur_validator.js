


 
function addIndicateurBlock()
 {
	 
		 var elem = document.getElementById('indicateur_template').cloneNode(true);
		
		
		elem.getElementsByTagName("a")[0].setAttribute("onclick",'deleteIndicateurBlock(' + cptIndicateur + ');');
		
		elem.getElementsByTagName("a")[0].setAttribute("class",'btn medium ui-state-default');
		var htmlCode = elem.innerHTML;
		document.getElementById('other_indicateur').innerHTML += "<div style='cursor:pointer;' id='indicateur_" + cptIndicateur + "' class='smargint'>" + htmlCode + "</div>";
		cptIndicateur++;
	 
	 
 }
 
	 
	 