var AjaxCall = function(args){
        
    this.proxyFile = args.proxyFile || _getServerUrl() + "ajax.php";
    this.params = {
        class : args.class || "App",
        method : args.method || "test",
        args : args.args || {}
    };
    this.init();
}
AjaxCall.prototype = {
    
    init : function(){
        
    },
    
    execute : function(callback){
        $.post(this.proxyFile, this.params, function(response){
            if(callback){
            	try{
            		response = JSON.parse(response);
            	}catch(e){}
                callback(response);
            }
        });
    },
    
    load : function(el, callback){
    	el.load(this.proxyFile, this.params, function(response){
    		if(callback){
            	try{
            		response = JSON.parse(response);
            	}catch(e){}
                callback(response);
            }
    	});
    }
}