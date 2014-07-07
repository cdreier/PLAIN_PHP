$(function(){
	try{
		prettyPrint();
	}catch(e){}
	
	var subnav = $("<ul></ul>");
	$("#content").find("h3").each(function(){
		var a = $("<a></a>");
		a.text($(this).text());
		a.attr("href", "#" + $(this).attr("id"));
		
		var li = $("<li></li>");
		li.html(a);
		
		subnav.append(li);
	});
	$("#nav > li.active").append(subnav);
	
});
