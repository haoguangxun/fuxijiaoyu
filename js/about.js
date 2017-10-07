
$(function(){
	$('.process-main-left li').hide();
	$('.process-main-left li:first').show();
	$('.process-main-right li:first').addClass('active');
	$('.process-main-right li').mouseover(function(){
		var index = $(this).index();
		$(this).addClass('active').siblings('li').removeClass('active');
		$('.process-main-left li').eq(index).show().siblings().hide();
	});
	var nNum = 0;
	var nLi = $('.process-main-item').length;
	$('.process-main-scroll').width((nLi*100)+'%');
	$('.process-main-item').width((100/nLi)+'%');
	$('.btnR').click(function(){
		if(!$('.process-main-scroll').is(':animated')){
			nNum++;
			if(nNum<=nLi-1){
				$('.process-main-scroll').animate({left:-nNum*100+'%'},200);
				$('.process-main-left li').eq(3*nNum).show();
				$('.process-main-right li').eq(3*nNum).addClass('active').siblings('li').removeClass('active');
				$('.process-main-right li').mouseover(function(){
					var index = $(this).index();
					var newIndex = index+3*(nLi-1);
					$('.process-main-left li').eq(newIndex).show().siblings().hide();;
				});
			
			}else{
				nNum=nLi-1;
			};
		}
	});
	$('.btnL').click(function(){
		if(!$('.process-main-scroll').is(':animated')){
			nNum--;
			if(nNum >=0){
				$('.process-main-scroll').animate({left:-nNum*100+'%'},200);
				$('.process-main-left li').eq(3*nNum).show();
				$('.process-main-right li').eq(3*nNum).addClass('active').siblings('li').removeClass('active');
				$('.process-main-right li').mouseover(function(){
					var index = $(this).index();
					var newIndex = index+3*(nLi-1);
					$('.process-main-left li').eq(newIndex).show().siblings().hide();;
				});
			}else{
				nNum=0;
			}
		}
	});
})
