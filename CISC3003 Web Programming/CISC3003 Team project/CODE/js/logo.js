var bannerimg = $(".head .banner>div");
var index = 0;
var dingshiqi;
zidong();
function imgqie(index){
	$.each(bannerimg,function(i,val){
		$(this).removeClass("show");
		$(this).addClass("hide");
	})
	$(bannerimg[index]).addClass("show");
}
function zidong(){
	dingshiqi=setInterval(function(){
		if(index==bannerimg.length-1){
			index=0;
			imgqie(index);
		}else{
			index++;
			imgqie(index);
		}
	},4000)
}
var lbtn = document.querySelector('.logobutton');
var PhoneNum = document.querySelector('#pn');
var password = document.querySelector('#pw');
lbtn.onclick=function(){
	if(PhoneNum.value=='' || password.value==''){
		alert('The text box cannot be empty!');
	}
}