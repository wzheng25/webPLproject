


/* Script used by the onlick of the Comment bubble Img to generate the textbox */
onButtonClick = () => {
	document.getElementById('commentbox').className="show";
	document.getElementById('commentBtn').className="show";
	document.getElementById('commentImg').className="hide";
}

var checkComment = function(){
	if (document.getElementById('commentbox').value==""){
		alert("Please put something in the comment box");
	}
	alert("You entered: " + document.getElementById('commentbox').value);
}