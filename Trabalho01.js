$(document).ready(function(){
    ConfiguraTabs()
});
    
function ConfiguraTabs(){
    $(".nav-tabs a").click(function(){
      $(this).tab('show');
    });
    $('.nav-tabs a').on('shown.bs.tab', function(event){
      var x = $(event.target).text();
      var y = $(event.relatedTarget).text();-
      $(".act span").text(x);
      $(".prev span").text(y);
    });
};

// document.getElementById('botaoDeCadastro').addEventListener('click', function(){
//     window.location.href = 'Cadastro.html'
// })