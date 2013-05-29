$(document).ready(function(){
	var hItem = $('.item:first-child').height()
	var hToScroll = hItem+10+'px';
	var resultByWord;
	var selected;

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
});