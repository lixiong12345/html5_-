function dialog_div(o_w,o_h,url,page_name){
	var divname='ajax_dialog';
	$(document.body).append('<div id="'+divname+'" class="ajax_dialog"><div id="btl" class="btl"><span>点击拖拽</span><a href="javascript:void(0)" onclick="dialog_div_close(\''+divname+'\')"> 关闭 </a> </div><div id="nr" class="nr"></div></div><div id="'+divname+'divLock" class="divLock"><iframe style="position:absolute;width:100%;height:100%;_filter:alpha(opacity=0);opacity=0;border-style:none;"></iframe></div>');
		
	divname='#'+divname;
	var _move=false;//移动标记
	var _x,_y;//鼠标离控件左上角的相对位置
	var div_name=""+divname+" #btl";
	$(div_name).click(function(){
	}).mousedown(function(e){
		_move=true;
		$(div_name).css("cursor","move");
		_x=e.pageX-parseInt($(divname).css("left"));
		_y=e.pageY-parseInt($(divname).css("top"));
		});
		$(document).mousemove(function(e){
		if(_move){
			var x=e.pageX-_x;//移动时根据鼠标位置计算控件左上角的绝对位置
			var y=e.pageY-_y;
			$(divname).css({top:y,left:x});//控件新位置
		}
		}).mouseup(function(){
		_move=false;
	});
	
	$(divname).css("width",o_w);
	$(divname).css("height",o_h);
	$(".nr").css("height",o_h-35);
	if(page_name=='') page_name='index.php';
	$.ajax({
		type: "get",
		url: page_name,
		data: url,
		dataType:"html",
		beforeSend:function()
		{
		msg_show('数据加载中,请稍候!',999);
		},
		success: function(html){
			msg_close();
			$(""+divname+" .nr").html(html)
			$('.ajax_dialog input:text:first').focus();//焦点丢失获取焦点
		}
	});
	div_center(divname);
	$(""+divname+"divLock").height($("body").height());
}
function dialog_div2(o_w,o_h,url,page_name){
	var divname='ajax_dialog';
	$(document.body).append('<div id="'+divname+'" class="ajax_dialog"><div id="btl" class="btl"><span>点击拖拽</span><a href="javascript:void(0)" onclick="dialog_div_close(\''+divname+'\')"> 关闭 </a> </div><div id="nr" class="nr"></div></div><div id="'+divname+'divLock" class="divLock"><iframe style="position:absolute;width:100%;height:100%;_filter:alpha(opacity=0);opacity=0;border-style:none;"></iframe></div>');

	divname='#'+divname;
	var _move=false;//移动标记
	var _x,_y;//鼠标离控件左上角的相对位置
	var div_name=""+divname+" #btl";
	$(div_name).click(function(){
	}).mousedown(function(e){
		_move=true;
		$(div_name).css("cursor","move");
		_x=e.pageX-parseInt($(divname).css("left"));
		_y=e.pageY-parseInt($(divname).css("top"));
		});
		$(document).mousemove(function(e){
		if(_move){
			var x=e.pageX-_x;//移动时根据鼠标位置计算控件左上角的绝对位置
			var y=e.pageY-_y;
			$(divname).css({top:y,left:x});//控件新位置
		}
		}).mouseup(function(){
		_move=false;
	});

	$(divname).css("width",o_w);
	$(divname).css("height",o_h);
	$(".nr").css("height",o_h-35);
	if(page_name=='') page_name='index.php';
	$.ajax({
		type: "get",
		url: page_name,
		data: url,
		dataType:"html",
		beforeSend:function()
		{
		msg_show('数据加载中,请稍候!',999);
		},
		success: function(html){
			msg_close();
			$(""+divname+" .nr").html(html)
			$('.ajax_dialog input:text:first').focus();//焦点丢失获取焦点
		}
	});
	div_center(divname);
	$(""+divname+"divLock").height($("body").height());
}
function dialog_div_close(obj){
	$("#"+obj+"").remove();
	$("#"+obj+"divLock").remove();
}
function div_display(div_name,status,obj){
	if($(div_name).css("display")=="block")
	{
	$(div_name).css("display","none");
	obj.find("img").attr("src","/bzy/img/add.gif");
	}
	else
	{
	$(div_name).css("display",status);
	obj.find("img").attr("src","/bzy/img/decrease.gif");
	}
}
function msg_show(n,t)
{
	//if(n==null) n='操作成功!';
	$(document.body).append('<div class="msg_show" id="msg_show"></div>');
	div_center('#msg_show');
	$('#msg_show').html(n);
	$('#msg_show').show();
	if(t!=999)
	{
		if(t==null) t=500;
		if(t!='')
		{
		setTimeout("$('#msg_show').hide();$('#msg_show').remove();",t); 
		}
		else
		{
		$('#msg_show').hide();
		$('#msg_show').remove();
		}
	}
}
function msg_close()
{
	$('#msg_show').remove();
}
function div_center(obj){
	var windowWidth = $(window).width();   
	var windowHeight = $(window).height();   
	var popupHeight = $(obj).height();
	var popupWidth = $(obj).width();
	$(obj).css({
		"top": (windowHeight-popupHeight)/2+$(document).scrollTop(),   
		"left": (windowWidth-popupWidth)/2   
	});  
}
function goto_url(url){
	if(url=='')url=location.href;
	location.href=url;
}
function ajax_list(path,go_url){
	$.ajax({
	type: "post",
	url: path,
	data: '',
	dataType:"html",
	success: function(html)
	{
		msg_show(html,5000000);
		goto_url(go_url)
	}
	});
}
function ajax_load(page_name,url){
	$.ajax({
	type: "post",
	url: page_name,
	data: url,
	dataType:"html",
	success: function(html){
		msg_show(html);
	}
	});
}

$(document).ready(function(){
	win_size()
})
$(window).resize(function(){
	win_size()
})
function win_size(){
	if($("#left").height()>$("#right").height())
	{
		$("#right").height($("#left").height());
	}
	else
	{
		$("#left").height($("#right").height());
	}
}

function delete_img(url,obj){
	$.ajax({
	type: "post",
	url: url,
	data: '',
	dataType:"html",
	success: function(html)
	{
		msg_show(html,1000);
		obj.prev().remove();
		obj.remove();
	}
	});
}

function SelectAll(name) { var checkboxs=document.getElementsByName(name); for (var i=0;i<checkboxs.length;i++) {  var e=checkboxs[i];  e.checked=!e.checked; }}

function add_activity_goods(goods_id,obj)
{
	if(obj.children().children(".checkbox").attr("checked"))
	{
		obj.children().children(".checkbox").attr("checked",false);
		var action='remove';
	}
	else
	{
		obj.children().children(".checkbox").attr("checked",true);
		var action='add';
	}
	$.ajax({
	type: "post",
	url: "admin.php?m=activity_goods&a=add_activity_goods&goods_id="+goods_id+"&action=add",
	data: "",
	dataType:"html",
	success: function(html){
			$(".selected_goods ul").html(html);
			obj.children().children(".added_goods").html("已添加");
		}
	});	
}

function remove_activity_goods(goods_id)
{
	$.ajax({
	type: "post",
	url: "admin.php?m=activity_goods&a=add_activity_goods&goods_id="+goods_id+"&action=remove",
	data: "",
	dataType:"html",
	success: function(html){
			$(".selected_goods ul").html(html);
			$("#added_goods"+goods_id).html('');
		}
	});
}

function ajax_select_goods()
{
	dialog_div_close('ajax_dialog');
	add_activity_goods();
}

function password_edit_save()
{
	if($("#old_password").val()=='')
	{
		alert("请输入旧密码");
		return false;
	}
	else if($("#password").val()=='')
	{
		alert("请输入新密码");
		return false;
	}
	else if($("#confirm_password").val()=='')
	{
		alert("请再输入新密码");
		return false;
	}
	else
	{
		return true;
	}
}
function password_select()
{
	if($("#old_password").val()!='')
	{
		$.ajax({
		type: "post",
		url: "admin.php?m=site&a=password_select&password="+$("#old_password").val(),
		data: "",
		dataType:"html",
		success: function(html){
			$(".password_select").html(html);
		}
		});
	}
	else
	{
			$(".password_select").html('');
	}
}
function check_password()
{
	if($("#confirm_password").val()!='' && $("#password").val()!='')
	{
		if($("#confirm_password").val()!=$("#password").val())
		{
			$(".confirm_password").html('两次输入密码不一致');
		}
		else
		{
			$(".confirm_password").html('');
		}
	}
	else
	{
		$(".confirm_password").html('');
	}
}
function SetHome(obj,url){
    try{
        obj.style.behavior='url(#default#homepage)';
		obj.setHomePage(url);
   }catch(e){
       if(window.netscape){
          try{
              netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
         }catch(e){
              alert("抱歉，此操作被浏览器拒绝！nn请在浏览器地址栏输入about:config并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
          }
       }else{
        alert("抱歉，您所使用的浏览器无法完成此操作。nn您需要手动将【"+url+"】设置为首页。");
       }
  }
}


//收藏本站
function AddFavorite(title, url) {
  try {
      window.external.addFavorite(url, title);
  }
catch (e) {
     try {
       window.sidebar.addPanel(title, url, "");
    }
     catch (e) {
         alert("对不起，您的浏览器不支持此操作！\n请您使用菜单栏或Ctrl+D收藏本站。");
     }
  }
}



