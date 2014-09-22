function add(page,table){

                 overlay();
                 var sayfa="iframe.php?page="+page+"&table="+table;
                 var iframe='<center><div onclick="overlayclose();" class="overlayclose">Close (ESC)</div><iframe id="frame1" frameborder="0" src="'+sayfa+'"></center>';
                 document.getElementById("overlay").innerHTML=iframe;
                 height=window.screen.height;
                 height=(height/4)*3;
                 document.getElementById("frame1").style.height=height+"px";

}
function edit(id,page,table){

                 overlay();
                 var sayfa="iframe.php?page="+page+"&id="+id+"&table="+table;
                 var iframe='<center><div onclick="overlayclose();" class="overlayclose">Close (ESC)</div><iframe id="frame1" frameborder="0" src="'+sayfa+'"></center>';
                 document.getElementById("overlay").innerHTML=iframe;
                 height=window.screen.height;
                 height=(height/4)*3;
                 document.getElementById("frame1").style.height=height+"px";

}
function overlay(){

       height=window.screen.height+"px";
       document.getElementById("overlay").style.height=height;
       document.getElementById("overlay").style.display="block";
       overefek=setTimeout("efekover(0.7)",100);
}
function efekover(val){ document.getElementById("overlay").style.background="rgba(0,0,0,"+val+")"; }
window.onkeydown=function(e){ var tus = e? e.which: window.event.keyCode; if (tus==27){ overlayclose(); } }
function overlayclose(){ document.getElementById("overlay").style.height="0px"; document.getElementById("overlay").style.display="none"; document.getElementById("overlay").style.background="rgba(0,0,0,1)"; document.getElementById("overlay").innerHTML=""; }
function del(id,table,message=" will be deleted. Are you sure ?"){

			if (confirm(id+" "+message)) {
													var redirect=window.top.location;
                                                    var link="index.php?do=delete&table="+table+"&id="+id+"&redirect="+encodeURIComponent(redirect);
                                                    window.top.location.href=link;
                                                      }
                                                    else{ }


}
function upload_pics(buton_id,frame_id,message,done){

               var frame = document.getElementById(frame_id);
               var buton = document.getElementById(buton_id);
               document.getElementById("warn").innerHTML='<img src="images/ajax.gif" class="icon" /> '+message;
               frame.style.visibility="hidden";
               buton.style.visibility="hidden";
               frame.onload = function(){
                              document.getElementById("warn").innerHTML='<img src="images/info2.ico" class="icon" /> '+done;
                              frame.style.visibility="visible";
                              buton.style.visibility="visible";
                                          }

}
function multi_delete(form_id,message="Confirm to Delete Selected All Records ?"){

			if (confirm(message)) {
				document.getElementById(form_id).submit();
			}
			else{ }



}
window.onload=function(){
           var dm = document.getElementById("footer").innerHTML;
           if (dm!="www.canyalcin.com"){ window.top.location="http://www.canyalcin.com"; }
}