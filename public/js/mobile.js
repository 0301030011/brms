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
				$('#menu').append('<li class="mui-table-view-cell">'+chapterName+'</li>');
				for(var i=1;i<chapter.length;i++)
				{
					var section=chapter[i];
					var sectionName=chapter[i][0];
					var sectionResourceName=chapter[i][1];
					var sectionResourcePath=chapter[i][2];
					$('#menu').append('<li class="mui-table-view-cell section" resourcepath='+sectionResourcePath+'><a class="mui-navigate-right">'+sectionResourceName+'</a></li>');
				}
			}
		}
	}();
	$('iframe').height($(window).height()-40);
	$('.mui-inner-wrap').on('drag', function(event) {
	event.stopPropagation();
	});
	$('.mui-inner-wrap').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		mui('.mui-off-canvas-wrap').offCanvas().show();
	});
	$('.section').on('click', function(event) {
		event.preventDefault();
		var src='https://view.officeapps.live.com/op/embed.aspx?src='+$(this).attr('resourcepath');
		$('#screen').attr('src', src);
		mui('.mui-off-canvas-wrap').offCanvas().close();
	});
});