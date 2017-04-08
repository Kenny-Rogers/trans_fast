function  find_all_with(value, process_page, display_view, other_select){
  //displays results of a call to a different page
  if (value != -1) {
    //checking if the first option was not selected
    
      if (other_select === undefined) {
        //checking if there is selected value
        //for the other dropdown
        query_string = process_page+"?query1="+value;
      } else {
        value2 = document.getElementById(other_select).value;
        if ( value2 == -1){
          //if value2 is -1 then no value is selected for that dropdown
          query_string = process_page+"?query1="+value;
        } else {
          //else and value2 query_string
          query_string = process_page+"?query1="+value+'&query2='+value2;
        }
      }

    	//alert("function called");
    	if (window.XMLHttpRequest) {
      		// code for IE7+, Firefox, Chrome, Opera, Safari
      		xmlhttp=new XMLHttpRequest();
    	} else { // code for IE6, IE5
      		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    	}
    	xmlhttp.onreadystatechange=function() {
      		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        			document.getElementById(display_view).innerHTML=xmlhttp.responseText;
      		}
  	}
      //console.log(query_string);
    	xmlhttp.open("GET",query_string,true);
    	xmlhttp.send();
  }
}
