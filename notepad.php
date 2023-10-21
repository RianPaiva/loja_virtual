<?php
if (isset($_POST["query"])) {
    $output = '';

    if ($_POST["metodo"] == "timesheet") {


        $query = "SELECT * FROM cad_clientes WHERE razao_social LIKE '%" .
            $_POST["query"] . "%' ORDER BY razao_social";


        $result = mysqli_query($conn, $query);
        $output = '<ul class="list-unstyled">';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $cpf = $row["nome"];

                $output .= "<li style='color:blue' value=" . $row[" id_cliente"] . ">" .
                    $row["razao_social"] . "</li>";
            }
        } else {
            $output .= '<li>Cliente não encontrado </li>';
        }
        $output .= '</ul>';
    }
}






/* JS


  $('#busca_razao').keyup(function(){
           
           $('#busca_cnpj').val('');
          var query = $(this).val();
         
          
      
          var caractere = query.length;
        
          if(query !== '' && caractere > 1){
              $.ajax({
                  url:'./php/busca_clientes.php',
                  method:"POST",
                  data:{
                      'query':query,
                      'tipo' : status
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
            $('#id_cliente').val($(this).val());
            $('#listaRazao').fadeOut();
            
      });



*/