function oneClick(){
        	if(document.getElementById('one').style.display==='none'){
        		document.getElementById('one').style.display='block';
        	}else {
        		document.getElementById('one').style.display='none';
            }
        }
        function oneoneClick(){
        	if(document.getElementById('oneone').style.display==='none'){
        		document.getElementById('oneone').style.display='block';
        	}else {
        		document.getElementById('oneone').style.display='none';
            }
        }
        function plussPlace(){
            var id = 'place';
            for(var i = 1 ; i < 20; i++){
                var tmp = id + i;
            	if(document.getElementById(tmp).style.display==='none'){
            		document.getElementById(tmp).style.display='block';
            		break;
            	}
            }
        }
        function deletePlace(){
            var id = 'place';
            for(var i = 19 ; i >= 0; i--){
                var tmp = id + i;
            	if(document.getElementById(tmp).style.display==='block'){
            		document.getElementById(tmp).style.display='none';
            		break;
            	}
            }
        }
        
        function plussService(){
            var id = 'service';
            for(var i = 1 ; i < 20; i++){
                var tmp = id + i;
            	if(document.getElementById(tmp).style.display==='none'){
            		document.getElementById(tmp).style.display='block';
            		break;
            	}
            }
        }
        function deleteService(){
            var id = 'service';
            for(var i = 19 ; i >= 0; i--){
                var tmp = id + i;
            	if(document.getElementById(tmp).style.display==='block'){
            		document.getElementById(tmp).style.display='none';
            		break;
            	}
            }
        }
        
        function validateForm() {
      	  var x = document.forms["myForm"]["fname"].value;
      	  if (x == "") {
      	    alert("Name must be filled out");
      	    return false;
      	  }
      	}
        function showTotal(str,price) {
        	if(str==""){
        		document.getElementById("total").innerHTML = "21";
        	}else{
        		var result =  str*price;
        		document.getElementById("total").innerHTML = result;
        	}
        }
        	