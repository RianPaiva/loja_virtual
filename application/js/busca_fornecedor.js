$('#busca_razao').keyup(function(){
           
    $('#busca_cnpj').val('');
   var query = $(this).val();
  
   

   var caractere = query.length;
 
   if(query !== '' && caractere > 1){
       $.ajax({
           url:'./php/busca_fornecedor.php',
           method:"POST",
           data:{
               'query':query
           },
           success:function(data)
           {
              vetor = data.split("##");
             $('#listaRazao').fadeIn();
             $('#listaRazao').html(data);
            
           }
       });
   }else{
       
       $('#listaRazao').fadeOut();
   }
   
});

$('#listaRazao').on('click', 'li', function(){
 
     
     $('#busca_razao').val($(this).text());
     $('#id_fornecedor').val($(this).val());
     $('#listaRazao').fadeOut();
     
});