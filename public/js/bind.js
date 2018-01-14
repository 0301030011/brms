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
				$('#add-box').append('<div class="add-item chapter" itemname='+chapterName+'><p class="pull-right name">'+chapterName+'</p></div>');
				for(var i=1;i<chapter.length;i++)
				{
					var section=chapter[i];
					var sectionName=chapter[i][0];
					var sectionResourceName=chapter[i][1];
					var sectionResourcePath=chapter[i][2];
					$('#add-box').append('<div class="add-item section" itemname='+sectionName+' resourcename='+sectionResourceName+' resourcepath='+sectionResourcePath+'><p class="pull-left resource">'+sectionResourceName+'</p><p class="pull-right name">'+sectionName+'</p></div>');
				}
			}
		}
	}();

	/*Drag to add chapter and section*/
	$(function()
	{
		$("#add-box").sortable
		({
			connectWith: "#trash",
			cursor: "move",
			update: function( event, ui )
			{
				leaving();
			}
		}).disableSelection();
		$("#add-panel").sortable
		({
			connectWith: "#add-box",
			cursor: "move",
			scroll: false,
			items: "div:not(.disabled)",
			remove: function(event, ui)
			{
				if (ui.item.hasClass('add-section'))
				{
					ui.item.removeClass();
					ui.item.addClass('add-item section');
					ui.item.append('<p class="pull-left resource">双击选择资源</p><p class="pull-right name">双击输入节名称</p>');
					$('.add-chapter').after('<div class="add-item add-section"></div>');
				}
				if (ui.item.hasClass('add-chapter'))
				{
					ui.item.removeClass();
					ui.item.addClass('add-item chapter');
					ui.item.append('<p class="pull-right name">双击输入章名称</p>');
					$('.add-section').before('<div class="add-item add-chapter"></div>');
				}
			},
		}).disableSelection();
		/*Remove item*/
		$("#trash").sortable
		({
			cursor: "move",
			receive: function( event, ui )
			{
				ui.item.remove();
			}
		}).disableSelection();
	});


	$('.panel').on('click', '.trash', function(event)
	{
		event.preventDefault();
		if (confirm("确定要清空此书的资源列表吗？"))
		{
			$('#add-box').empty();
			leaving();
		}
	});

	/*Click to add chapter and section*/
	$('.panel').on('click', '.add-chapter', function(event) {
		event.preventDefault();
		$('#add-box').append('<div class="add-item chapter"><p class="pull-right name">双击输入章名称</p></div>');
	});
	$('.panel').on('click', '.add-section', function(event) {
		event.preventDefault();
		$('#add-box').append('<div class="add-item section"><p class="pull-left resource">双击选择资源</p><p class="pull-right name">双击输入节名称</p></div>');
	});

	/*Add chapter's or setion's name*/
	$('#add-box').on('dblclick', '.section .name', function(event)
	{
		$('#section-name').modal();
		var that=$(this);
		$('#section-name form').off().submit(function(event)
		{
			if ($(this).find('input').val().length!='')
			{
				var name=$(this).find('input').val();
				that.text(name);
				that.parent().attr('itemname', name);
				$(this).find('input').val('');
				$('#section-name').modal('hide');
			}
			else
			{
				that.text('双击输入节名称');
				$('#section-name').modal('hide');
			}
			leaving();
			return false;
		});
	});
	$('#add-box').on('dblclick', '.chapter .name', function(event)
	{
		/*Open modal*/
		$('#chapter-name').modal();
		var that=$(this);
		$('#chapter-name form').off().submit(function(event)
		{
			if ($(this).find('input').val().length!='')
			{
				var name=$(this).find('input').val();
				that.text(name);
				that.parent().attr('itemname', name);
				$(this).find('input').val('');
				$('#chapter-name').modal('hide');
			}
			else
			{
				that.text('双击输入章名称');
				$('#chapter-name').modal('hide');
			}
			leaving();
			return false;
		});
	});

	/*Bind resource's name and path*/
	$('#add-box').on('dblclick', '.section .resource', function(event)
	{
		$('#resources-modal').modal();
		var url="http://"+window.location.host+"/brms/public/resources";
		$.ajax({
			url: url,
			data: {ajax:true},
			success: function (data)
			{
				$('#resources').empty();
				var resources=data.data;
				for(var i=0;i<resources.length;i++)
				{
					var resource=resources[i];
					$('#resources').append('<div class="resource" path="'+resource.path+'"><div class="name pull-left">'+resource.name+'</div><div class="type pull-left" >'+resource.type+'</div><div class="date pull-right">'+resource.updated_at+'</div></div>');
				}
			},
			dataType:"JSON"
		});
		var that=$(this);
		$('#resources-modal').off().on('click', '.resource', function(event)
		{
			var name=$(this).find('.name').text();
			var path=$(this).attr('path');
			that.text(name);
			that.parent().attr('resourcename', name);
			that.parent().attr('resourcepath', path);
			$('#resources-modal').modal('hide');
			leaving();
		});
	});

	/*Submit bind's data*/
	$('#submit').on('click', function(event)
	{
		event.preventDefault();
		var menu=[];
		var chapter;
		var section;
		var items=$('#add-box').children();
		for (var i = 0; i <items.length; i++)
		{
			if(items.eq(0).hasClass('section'))
			{
				toastr.error('节必须存在于章下');
				return;
			}
			if(items.eq(items.length-1).hasClass('chapter'))
			{
				toastr.error('不能含有空章节');
				return;
			}
			var item=items.eq(i);
			if (item.attr('itemname')==null)
			{
				toastr.error('请完善目录');
				return;
			}
			if (item.hasClass('chapter'))
			{
				chapter=[];
				chapter.push(item.attr('itemname'));
				if (item.next().hasClass('chapter'))
				{
					toastr.error('不能含有空章节');
				}
			}
			if (item.hasClass('section'))
			{
				section=[];
				section.push(item.attr('itemname'));
				section.push(item.attr('resourcename'));
				section.push(item.attr('resourcepath'));
				chapter.push(section);
				if (item.next().hasClass('chapter')||i==items.length-1)
				{
					menu.push(chapter);
				}
			}
		}
		var url=window.location.href.slice(0,-5);
		$.ajax({
			type: 'POST',
			url: url,
			data: {_method: 'PUT',menu:menu},
			success: function (data) {toastr.success('保存成功!');},
			headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
		});
		$(window).unbind('beforeunload');
	});

	/*Search resources*/
	$('#search').off().submit(function(event) {
		if ($(this).find('input').val().length!='')
		{
			var url="http://"+window.location.host+"/brms/public/resources";
			var name=$(this).find('input').val();
			$.ajax({
				url: url,
				data: {name:name,ajax:true},
				success: function (data)
				{
					$('#resources').empty();
					var resources=data.data;
					for(var i=0;i<resources.length;i++)
					{
						var resource=resources[i];
						$('#resources').append('<div class="resource" path="'+resource.path+'"><div class="name pull-left">'+resource.name+'</div><div class="type pull-left" >'+resource.type+'</div><div class="date pull-right">'+resource.updated_at+'</div></div>');
					}
				},
				dataType:"JSON"
			});
		}
		else
		{
			$('#resources-modal').modal('hide');
		}
		return false;
	});

	function leaving(argument) {
		$(window).bind('beforeunload',function()
		{
			return '您输入的内容尚未保存，确定离开此页面吗？';
		});
	}
});