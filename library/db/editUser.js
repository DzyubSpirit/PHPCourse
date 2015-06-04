function saveChanges(id) {
	var keysHiddens = document.getElementsByClassName("hidden");

	for (var i = 0; i < keysHiddens.length; i++) {
		var key = keysHiddens[i].name;
		keysHiddens[i].value = document.getElementById(key+"_"+id).value;
	}

}