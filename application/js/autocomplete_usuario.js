$('#pesquisa_nome').keyup(function(){
           
    $('#pesquisa_email').val('');
   var query = $(this).val();
  
   

   var caractere = query.length;
 
   if(query !== '' && caractere > 1){
       $.ajax({
           url:'../php/autocomplete_usuario.php',
           method:"POST",
           data:{
               'query':query,
               'metodo': "cad_usuario"
           },
           success:function(data)
           {
            console.log(data);
             $('#listaUsuario').fadeIn();
             $('#listaUsuario').html(data);
            
           }
       });
   }else{
       
       $('#listaUsuario').fadeOut();
   }
   
});

$('#listaUsuario').on('click', 'li', function(){
 
     
     $('#pesquisa_nome').val($(this).text());
     $('#id_usuario').val($(this).val());
     $('#listaUsuario').fadeOut();
     
});