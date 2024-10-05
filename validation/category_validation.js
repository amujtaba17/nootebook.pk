function category_validation(){

    var flag = true

    var category_title = document.querySelector("#ctgtitle").value;
    var category_desc = document.querySelector("#ctgdesc").value;
    var ctg_status = document.querySelector("#ctgstatus").value;
    


    var ctgtitle_msg = document.querySelector("#ctgtitle_msg")
    var ctgdesc_msg = document.querySelector("#ctgdesc_msg")
    var ctgstatus_msg = document.querySelector("#ctgstatus_msg")
    
    if (category_title ==="") {
		flag = false;
		ctgtitle_msg.innerHTML ="Field Required";
	}else{
		ctgtitle_msg.innerHTML ="";

	}

    
    if (category_desc ==="") {
		flag = false;
		ctgdesc_msg.innerHTML ="Field Required";
	}else{
		ctgdesc_msg.innerHTML ="";

	}

    
    if (ctg_status ==="") {
		flag = false;
		ctgstatus_msg.innerHTML ="Field Required";
	}else{
		ctgstatus_msg.innerHTML ="";

	}

    


    
    
    
    
    
    
    
    
    
    
    
    
    
    if(flag==true){
        return true
    }else{
        return false
    }

}