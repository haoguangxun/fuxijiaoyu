$(function(){
	var num = 0;
	var item = $('.style-run-item').length;
	$('.style-run-scroll').width((item*100)+'%');
	$('.style-run-item').width((100/item)+'%');
	$('.style-btn-r').click(function(){
		if(!$('.style-run-scroll').is(':animated')){
			num++;
			if(num<=item-1){
				$('.style-run-scroll').animate({left:-num*100+'%'},200);
			}else{
				num=item-1;
			}
		}
	});
	$('.style-btn-l').click(function(){
		if(!$('.style-run-scroll').is(':animated')){
			num--;
			if(num >=0){
				$('.style-run-scroll').animate({left:-num*100+'%'},200);
			}else{
				num=0;
			}
		}
	});
	var rImg = $('.style-run li img');
	rImg.load(function(){
		var hg = rImg.height();
		$('.style-run li .main').innerHeight(hg);
		$('.style-run li').height(hg);
		$('.style-run').height(2*hg);
		$('.style-run-scroll').height(2*hg);
		$('.style-run-item').height(2*hg);
	})
})
$(function(){
	var length = $('.experience-run li').length;
	var height = $('.experience-run li').outerHeight();
	for (var i=0;i<length/2;i++) {
		var span = document.createElement('span');
		$('.experience-run-btn').append(span);
	}
	$('.experience-run-btn span:first').addClass('active');
	$('.experience-run-btn span').click(function(){
		var index = $(this).index()*2;
		if(!$('.experience-run ul').is(':animated')){
			$('.experience-run ul').animate({top:-height*index},200);
			$('.experience-run-btn span').eq(index/2).addClass('active').siblings('span').removeClass('active');
		}
	});
})