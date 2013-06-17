$(document).ready(function(){
	var hItem = $('.item:first-child').height(),
		hToScroll = hItem+10+'px',
		resultByWord,
		selected;
	$('.resultByWord > :nth-child(2)').addClass('selected');

	$('.monte').on('click', function(){
		resultByWord = $(this).siblings('.resultByWord');
		if(resultByWord.position().top > -(resultByWord.height() - 3*hItem) ){
			resultByWord.animate({'top': '-='+hToScroll}, 'slow');
			selected = resultByWord.find('.selected');
			selected.removeClass('selected');
			selected.next().addClass('selected');
		}
	});
	$('.descend').on('click', function(){
		resultByWord = $(this).siblings('.resultByWord');
		if(resultByWord.position().top <= 0 ){
			resultByWord.animate({'top': '+='+hToScroll}, 'slow');
			selected = resultByWord.find('.selected');
			selected.prev().addClass('selected');
			selected.removeClass('selected');
		}
	});

	$('#kepezzSelected').on('click',function(){
		var json = {};
			json['items'] = [];
		$('.selected').each(function(){
			var outterHtml = $('<div>').append($(this).clone()).html();
			json['items'].push(outterHtml);
		});

		$.ajax({
			type: 'POST',
			url: '/kep/pool/addItems',
			data: {json: json},
			success: function(data){
				console.log('SUCCES');
				var show = data.toString()+'/show';
				var url = document.URL;
				url = url.replace('create', show);
				window.location = url;
			},
		});

	})
});