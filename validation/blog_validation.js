function blog_validation(){

    var flag = true

    var blog_title = document.querySelector("#blogtitle").value;
    var postpg = document.querySelector("#postpg").value;
    // var blogbg = document.querySelector("#postbg").value;
    var blogstatus = document.querySelector("#blogstatus").value;

    var post_per_page =/^[1-9][0-9]*$/;

    


    var bg_titlemsg = document.querySelector("#blogtitle_msg")
    var postpg_msg = document.querySelector("#postpg_msg")
    // var blogbg_msg = document.querySelector("#blogbg_msg")
    var blogstatus_msg = document.querySelector("#blogstatus_msg")
    
    if (blog_title ==="") {
		flag = false;
		bg_titlemsg.innerHTML ="Field Required";
	}else{
		bg_titlemsg.innerHTML ="";

	}

    
    if(postpg ==="") {
		flag = false;
		postpg_msg.innerHTML ="Field Required";
	}else if(postpg==0) {
		flag = false;
		postpg_msg.innerHTML ="Post/page can't be 0";

	}else{
		postpg_msg.innerHTML ="";
	}

    
    // if (blogbg ==="") {
	// 	flag = false;
	// 	blogbg_msg.innerHTML ="Field Required";
	// }else{
	// 	blogbg_msg.innerHTML ="";

	// }

    
    if (blogstatus ==="") {
		flag = false;
		blogstatus_msg.innerHTML ="Field Required";
	}else{
		blogstatus_msg.innerHTML ="";

	}


    
    
    
    
    
    
    
    
    
    
    
    
    
    if(flag==true){
        return true
    }else{
        return false
    }

}