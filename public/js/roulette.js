$(document).ready(function(){
	var hItem = $('.item:first-child').height()
	var hToScroll = hItem+10+'px';
	var resultByWord;

	$('.monte').on('click', function(){
		resultByWord = $(this).siblings('.resultByWord');
		if(resultByWord.position().top >= -(resultByWord.height() - hItem) )
			resultByWord.animate({'top': '-='+hToScroll}, 'slow');
	});
	$('.descend').on('click', function(){
		resultByWord = $(this).siblings('.resultByWord');
		if(resultByWord.position().top <= 0 )
			resultByWord.animate({'top': '+='+hToScroll}, 'slow');
	});
});