<script type="text/javascript">
var busy =false;
var limit= 3;
var offset= 0;

function displayRecords(lim, off){
	$.ajax({
		type:"GET",
		async:false,
		url:"movies.php",
		data: "limit=" + lim + "&offset=" + off,
		cache= false,
		beforeSend: function(){
			$("#loader_message").html("").hide();
			$('#loader_image').show();
		},
		success: function(html){
			$("#comment_section").append(html);
			$('#loader_image').hide();
			if (html=="") {
				$("#loader_message").html('<button data-atr="nodata" class="btn btn-default" type="button">NO MORE COMMENTS.</button>').show();
			}else{
				$("#loader_message").html('<button class="btn btn-default" type="button">Loading please wait </button>').show();
					}
					window.busy= false;
		} 
	});
}
$(document).ready(function()){
	displayRecords(limit,offset);
	$('#loader_message').click(function(){
		var d= $('#loader_message').find("button").attr("data-atr");
		if (d!="nodata") {
			offset = limit + offset;
			displayRecords(limit,offset);
		}
	});
}


function div_show() {
document.getElementById('pop_up').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('pop_up').style.display = "none";
}
</script>