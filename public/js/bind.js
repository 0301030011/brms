$(document).ready(function() 
{
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
	$('#add-box').off().on('dblclick', '.section .name', function(event)
	{
		$('#section-name').modal();
		var that=$(this);
		$('#section-name form').off().submit(function(event) {
			if ($(this).find('input').val().length!='')
			{
				var name=$(this).find('input').val();
				that.text(name);
				that.parent().data('item_name', name);
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
	$('#add-box').off().on('dblclick', '.chapter .name', function(event)
	{
		/*Open modal*/
		$('#chapter-name').modal();
		var that=$(this);
		$('#chapter-name form').off().submit(function(event) {
			if ($(this).find('input').val().length!='')
			{
				var name=$(this).find('input').val();
				that.text(name);
				that.parent().data('item_name', name);
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
			that.parent().data('resource_name', name);
			that.parent().data('resource_path', path);
			$('#resources-modal').modal('hide');
		});
	});
	/*Submit bind's data*/
	$('#submit').on('click', function(event) {
		event.preventDefault();
		var menu={};
		var chapter=1;
		var section=1;
		var items=$('#add-box').children();
		for (var i = 0; i <items.length; i++)
		{
			var item=items.eq(i);
			if (item.hasClass('chapter'))
			{
				eval("menu.chapter"+chapter+"=item.data('item_name');");
			}
			if (item.hasClass('section'))
			{
				eval();
				menu.chapter1.section1.name=item.find('p').text();
				section++;
				if (item.next().hasClass('chapter'))
				{
					chapter++;
					section=0;
				}
			}
			alert(JSON.stringify(menu));
		}
	});
});