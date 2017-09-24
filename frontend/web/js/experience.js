$(function(){
      var timeNum = 0;
      var liWidth = $('.popular-scroll').width()/3;
      var timeLi = $('.popular-scroll li').length;
      $('.popular-scroll ul').width(timeLi*liWidth);
      $('.popular-scroll li').width(liWidth);
      $('.popular-scroll li').css('padding',10);
      function timeplay(){
          if(!$('.popular-scroll ul').is(':animated')){
            if($(this).hasClass('popular-l')){
              timeNum--;
              if(timeNum == -1){
                timeNum = 0;      
              }
              $('.popular-scroll ul').animate({'left':-timeNum*liWidth},400);
            }else{
              timeNum++;
              if(timeNum < timeLi-2){
                $('.popular-scroll ul').animate({'left':-timeNum*liWidth},400);
              }else if(timeNum >= timeLi-2){
                timeNum = timeLi-3
              }
            };         
          } 
        }
    $('.popular-l').click(timeplay);
    $('.popular-r').click(timeplay);
});
