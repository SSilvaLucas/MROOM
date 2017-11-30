$('#collapse-navbar').on('show.bs.collapse', function(){
   $('.banner').css('transform', 'translate(-50%, -90%)'); 
});

$('#collapse-navbar').on('hide.bs.collapse', function(){
   $('.banner').css('transform', 'translate(-50%, -50%)'); 
});