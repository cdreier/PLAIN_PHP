/**
 * The MIT License (MIT)
 *
 *  Copyright (c) <2013> <Christian Dreier (dreier@weilacher.net) - weilacher.net>
 *    
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *  
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 *  
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 * 
 */ 
var AjaxCall = function(args){

    args = args || {};
        
    this.target = _getServerUrl() + "index.php";
    this.params = {
        class : args.class || "App",
        method : args.method || "test",
        args : args.args || {},
        PLAIN_PHP_AJAX : true
    };
    return this.init();
};
AjaxCall.prototype = {
    
    init : function(){
        return this;
    },

    forClass : function(c){
        this.params.class = c;
        return this;
    },

    forMethod : function(m){
        this.params.method = m;
        return this;
    },

    withArguments : function(a){
        this.params.args = a;
        return this;
    },
    
    execute : function(callback){
        $.post(this.target, this.params, function(response){
            if(callback){
            	try{
            		response = JSON.parse(response);
            	}catch(e){}
                callback(response);
            }
        });
    },
    
    load : function(el, callback){
    	el.load(this.target, this.params, function(response){
    		if(callback){
            	try{
            		response = JSON.parse(response);
            	}catch(e){}
                callback(response);
            }
    	});
    }
};