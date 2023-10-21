$('#pesquisa_razao').keyup(function(){
           
    $('#pesquisa_cnpj').val('');
   var query = $(this).val();
  
   

   var caractere = query.length;
 
   if(query !== '' && caractere > 1){
       $.ajax({
           url:'../php/autocomplete_fornecedor.php',
           method:"POST",
           data:{
               'query':query,
               'metodo': "cad_fornecedor"
           },
           success:function(data)
           {
            console.log(data);
             $('#listaRazao').fadeIn();
             $('#listaRazao').html(data);
            
           }
       });
   }else{
       
       $('#listaRazao').fadeOut();
   }
   
});

$('#listaRazao').on('click', 'li', function(){
 
     
     $('#pesquisa_razao').val($(this).text());
     $('#id_fornecedor').val($(this).val());
     $('#listaRazao').fadeOut();
     
});