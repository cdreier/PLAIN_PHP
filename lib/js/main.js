$(function(){
	try{
		prettyPrint();
	}catch(e){}
	
	$("#content").find("h3").each(function(){
		console.log($(this));
	});
	
});
