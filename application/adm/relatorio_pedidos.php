<?php
include("../header_footer/header.php");
?>

<link rel="stylesheet" href="../css/style_relatorio_vendas.css">

<div class="container-fluid mt-5">

    <div class="row">
        <div class="col">
            <p>
            <div class="text-container mb-4 mt-5 ms-5" style="font-weight:500">
                VENDAS
            </div>
            </p>
        </div>
    </div>

    <div class="row text-center d-flex justify-content-around overflow-y-scroll row-custom me-1 mb-3">

        <div class="col-12 row-custom mb-4">

            <table>
                <thead>
                    <tr>
                        <th>N° Pedido</th>
                        <th> Data do Pedido </th>
                        <th>Cliente</th>
                        <th>Endereço</th>
                        <th>Total</th>
                        <th>Frete</th>
                        <th> Visualizar Pedido </th>
                        <th> Status </th>
                    </tr>
                </thead>


                <tbody>
                    <tr class="ms-2 mt-2 ms-2">
                        <td>
                            #1
                        </td>

                        <td>
                            14/12/2023
                        </td>

                        <td>
                            Gabriel Uruga
                        </td>

                        <td>
                            Rua do pica fio, Centro, SP N°10 07807-000
                        </td>

                        <td>
                            R$ 300,00
                        </td>

                        <td>
                            R$ 15,00
                        </td>

                        <td>
                            <button type="button" class="btn btn-success mt-1"> ABRIR PEDIDO </button>
                        </td>

                        <td>
                            Despachado pela transportadora
                        </td>
                    </tr>

                    <tr class="ms-2 mt-2 ms-2">
                        <td>
                            #2
                        </td>

                        <td>
                            20/12/2023
                        </td>

                        <td>
                            Gabriel Uruga
                        </td>

                        <td>
                            Rua do pica fio, Centro, SP N°10 07807-000
                        </td>

                        <td>
                            R$ 300,00
                        </td>

                        <td>
                            R$ 15,00
                        </td>

                        <td>
                            <button type="button" class="btn btn-success mt-1"> ABRIR PEDIDO </button>
                        </td>

                        <td>
                            Aprovado, esperando envio
                        </td>
                    </tr>   
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php
include("../header_footer/footer.php");
?>