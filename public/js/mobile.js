$(document).ready(function()
{
	/*Load menu*/
	~function (){
		if ($('menu').text()!=''&&$('menu').text()!='null')
		{
			var menu=$.parseJSON($('menu').text());
			for(var m=0;m<menu.length;m++)
			{
				var chapter=menu[m];
				var chapterName=chapter[0];
				var chapter_name='<span class="drawer-menu-item" data-toggle="dropdown" role="button" aria-expanded="false">'+chapterName+'<span class="drawer-caret"></span></span>';
				var section_name='';
				for(var i=1;i<chapter.length;i++)
				{
					var section=chapter[i];
					var sectionName=chapter[i][0];
					var sectionResourceName=chapter[i][1];
					var sectionResourcePath=chapter[i][2];
					section_name+='<li><span class="drawer-dropdown-menu-item" resourcepath='+sectionResourcePath+'>'+sectionResourceName+'</span></li>';
				}
				var section_item='<ul class="drawer-dropdown-menu">'+section_name+'</li>';
				var chapter_item='<li class="drawer-dropdown">'+chapter_name+section_item+'</li>';
				$('.drawer-menu').append(chapter_item);
			}
		}
	}();
	$('iframe').height($(window).height());
	$('.drawer-dropdown-menu-item').on('click', function(event) {
		event.preventDefault();
		var resourcepath=$(this).attr('resourcepath');
		var src='https://view.officeapps.live.com/op/embed.aspx?src='+resourcepath;
		$('iframe').attr('src', src);
		$('.drawer').drawer('close');
	});
});