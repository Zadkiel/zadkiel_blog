$(document).ready(function () {
	$("#menu li").hover(
      function () {
        $(this).append($("<img src='img/star.png' title='selection' alt='etoile'/>"));
      }, 
      function () {
        $(this).find("img:last").remove();
      }
    );
});
