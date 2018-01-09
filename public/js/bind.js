$(document).ready(function() 
{
	~function (){
		if ($('menu').text())
		{
			var menu=$.parseJSON($('menu').text());
			for(var m=0;m<menu.length;m++)
			{
				var chapter=menu[m];
				var chapterName=chapter[m];
				$('#add-box').append('<div class="add-item chapter" itemName='+chapterName+'><p class="pull-right name">'+chapterName+'</p></div>');
				for(var i=1;i<chapter.length;i++)
				{
					var section=chapter[i];
					var sectionName=chapter[i][0];
					var sectionResourceName=chapter[i][1];
					var sectionResourcePath=chapter[i][2];
					$('#add-box').append('<div class="add-item section" itemName='+sectionName+'><p class="pull-left resource" data-resourceName='+sectionResourceName+' data-resourcePath='+sectionResourcePath+'>'+sectionResourceName+'</p><p class="pull-right name">'+sectionName+'</p></div>');
				}
			}
		}
	}();


	$(function() {
	$("#add-box").sortable
	({
		connectWith: "#trash",
		cursor: "move"
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
	$("#trash").sortable
	({
		cursor: "move",
		receive: function( event, ui )
		{
			ui.item.remove();
		}
	}).disableSelection();
	});

	$('.panel').on('click', '.trash', function(event) {
		event.preventDefault();
		if (confirm("确定要清空此书的资源列表吗？"))
		{
			$('#add-box').empty();
		}
	});

	/*Click to add item*/
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
		$('#section-name form').off().submit(function(event) {
			if ($(this).find('input').val().length!='')
			{
				var name=$(this).find('input').val();
				that.text(name);
				that.parent().data('itemName', name);
				$(this).find('input').val('');
				$('#section-name').modal('hide');
			}
			else
			{
				that.text('双击输入节名称');
				$('#section-name').modal('hide');
			}
			return false;
		});
	});
	$('#add-box').on('dblclick', '.chapter .name', function(event)
	{
		/*Open modal*/
		$('#chapter-name').modal();
		var that=$(this);
		$('#chapter-name form').off().submit(function(event) {
			if ($(this).find('input').val().length!='')
			{
				var name=$(this).find('input').val();
				that.text(name);
				that.parent().data('itemName', name);
				$(this).find('input').val('');
				$('#chapter-name').modal('hide');
			}
			else
			{
				that.text('双击输入章名称');
				$('#chapter-name').modal('hide');
			}
			return false;
		});
	});

	/*Bind resource's name and path*/
	$('#add-box').on('dblclick', '.section .resource', function(event)
	{
		$('#resources-modal').modal();
		var that=$(this);
		$('#resources-modal').on('click', '.resource', function(event)
		{
			var name=$(this).find('.name').text();
			var path=$(this).data('path');
			that.text(name);
			that.parent().data('resourceName', name);
			that.parent().data('resourcePath', path);
			$('#resources-modal').modal('hide');
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
			if (item.data('itemName')==null)
			{
				toastr.error('请完善目录');
				return;
			}
			if (item.hasClass('chapter'))
			{
				chapter=[];
				chapter.push(item.data('itemName'));
				if (item.next().hasClass('chapter'))
				{
					toastr.error('不能含有空章节');
				}
			}
			if (item.hasClass('section'))
			{
				section=[];
				section.push(item.data('itemName'));
				section.push(item.data('resourceName'));
				section.push(item.data('resourcePath'));
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
			dataType:"JSON"
		});
	});
});