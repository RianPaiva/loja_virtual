<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
</head>

<link rel="stylesheet" href="../css/style_carrinho.css" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

<body>

  <main class="container-fluid" style="border: 2px solid black">
    <div class="row" style="border: 2px solid blue">
      <div class="page-title p-4 ms-4 row" style="border: 2px solid blue">MEU CARRINHO</div>
      <div class="content">


        <section class="col-lg-8" style="border: 2px solid black">
          <table>
            <thead>
              <tr>
                <th class="prod">Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>-</th>
              </tr>
            </thead>

            <tbody>

              <tr>
                <td>
                  <div class="product">
                    <img src="https://picsum.photos/100/120" alt="" />
                    <div class="info">
                      <div class="name">Nome do produto</div>
                      <div class="category">Categoria</div>
                    </div>
                  </div>
                </td>
                <td>R$ 120</td>
                <td>
                  <div class="qty">
                    <button><i class="bx bx-minus"></i></button>
                    <span>2</span>
                    <button><i class="bx bx-plus"></i></button>
                  </div>
                </td>
                <td>R$ 240</td>
                <td>
                  <button class="remove"><i class="bx bx-x"></i></button>
                </td>
              </tr>

              <tr class="bg-css">
                <td>
                  <div class="product">
                    <img src="https://picsum.photos/100/120" alt="" />
                    <div class="info">
                      <div class="name">Nome do produto</div>
                      <div class="category">Categoria</div>
                    </div>
                  </div>
                </td>
                <td>R$ 120</td>
                <td>
                  <div class="qty">
                    <button><i class="bx bx-minus"></i></button>
                    <span>2</span>
                    <button><i class="bx bx-plus"></i></button>
                  </div>
                </td>
                <td>R$ 240</td>
                <td>
                  <button class="remove"><i class="bx bx-x"></i></button>
                </td>
              </tr>

              <tr>
                <td>
                  <div class="product">
                    <img src="https://picsum.photos/100/120" alt="" />
                    <div class="info">
                      <div class="name">Nome do produto</div>
                      <div class="category">Categoria</div>
                    </div>
                  </div>
                </td>
                <td>R$ 120</td>
                <td>

                  <div class="qty">
                    <button><i class="bx bx-minus"></i></button>
                    <span>2</span>
                    <button><i class="bx bx-plus"></i></button>
                  </div>
                </td>
                <td>R$ 240</td>
                <td>
                  <button class="remove"><i class="bx bx-x"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </section>


        <aside class="col-lg-2 col" style="border: 2px solid black">
          <div class="box rounded">
            <header class="text-center">Resumo da compra</header>
            <div class="info">
              <div><span>Sub-total</span><span>R$ 418</span></div>
              <div><span>Frete</span><span>Gratuito</span></div>
              <div>
                <button>
                  Adicionar cupom de desconto
                  <i class="bx bx-right-arrow-alt"></i>
                </button>
              </div>

              <div class="col">
                <input type="text" class="form-control" placeholder="CEP">
              </div>

            </div>
            <footer class="rounded">
              <span>Total</span>
              <span>R$ 418</span>
            </footer>
          </div>
          <button class="rounded">Finalizar Compra</button>
        </aside>
      </div>
    </div>
  </main>
</body>

</html>