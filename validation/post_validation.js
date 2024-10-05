function post_validation(){

flag=true

// Values

var blog_box = document.querySelector("#blg_id").value;
var category_box = document.querySelector("#catgory_id").value;
var post_title = document.querySelector("#title").value;
var post_summary = document.querySelector("#summary").value;
var post_description = document.querySelector("#description").value;
var post_status = document.querySelector("#status").value;
var post_comment = document.querySelector("#comments").value;
// var address= document.querySelector('#addressline').value;

// msgs
var blogmsg = document.querySelector("#blog_id_msg");
var cat_msg = document.querySelector("#cat_id_msg");
var titlemsg = document.querySelector("#post_title_msg");
var sum_msg = document.querySelector("#post_summary_msg");
var descmsg = document.querySelector("#post_desc_msg");
var statusmsg = document.querySelector("#post_status_msg");
var cmntmsg = document.querySelector("#comment_allow_msg");


if (blog_box ==="") {
		flag = false;
		blogmsg.innerHTML ="Field Required";
	}else{
		blogmsg.innerHTML ="";

	}


if (category_box ==="") {
		flag = false;
		cat_msg.innerHTML ="Field Required";
	}else{
		cat_msg.innerHTML ="";

	}


if (post_title ==="") {
		flag = false;
		titlemsg.innerHTML ="Field Required";
	}else{
		titlemsg.innerHTML ="";

	}




if (post_summary ==="") {
		flag = false;
		sum_msg.innerHTML ="Field Required";
	}else{
		sum_msg.innerHTML ="";

	}



if (post_description ==="") {
		flag = false;
		descmsg.innerHTML ="Field Required";
	}else{
		descmsg.innerHTML ="";

	}

if (post_status ==="") {
		flag = false;
		statusmsg.innerHTML ="Field Required";
	}else{
		statusmsg.innerHTML ="";

	}



if (post_comment ==="") {
		flag = false;
		cmntmsg.innerHTML ="Field Required";
	}else{
		cmntmsg.innerHTML ="";

	}

	








if(flag===true){
	return true;
}else{
	return false;
}






}