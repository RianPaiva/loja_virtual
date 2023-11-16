//AUTOCOMPLETE PESQ_PROD_EST



//AUTOCOMPLETE PRODUTO
$('#produto').keyup(function(){

   var query = $(this).val();
  
   

   var caractere = query.length;
 
   if(query !== '' && caractere > 1){
       $.ajax({
           url:'../php/autocomplete_produto.php',
           method:"POST",
           data:{
               'query':query,
               'metodo': "prod_estoque"
           },
           success:function(data)
           {
            console.log(data);
             $('#listaProduto').fadeIn();
             $('#listaProduto').html(data);
            
           }
       });
   }else{
       
       $('#listaProduto').fadeOut();
   }
   
});

$('#listaProduto').on('click', 'li', function(){
 
     
     $('#pesquisa_razao').val($(this).text());
     $('#id_produto').val($(this).val());
     $('#listaProduto').fadeOut();
     
});




//CADASTRAR


//BUSCAR


//BTN_LIMPAR


//LIMPAR
function limpar(){
    
}

