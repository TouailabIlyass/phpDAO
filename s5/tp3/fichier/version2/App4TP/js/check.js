$(document).ready(function(){
	var cnx=0;
$(".btn").on("click",function(e){

if (cnx!=1) {
e.preventDefault();

console.log("bad!!!!!");
console.log(cnx);
alert("ok!!");
}

});

});