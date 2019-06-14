<?php

require_once('functions.php'); // garante que o arquivo só foi incluido uma vez
include_once('header.php'); // inclui header na pagina

?>

<main class="container">
  <h1>Controle de Estoque</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Qtd Minima</th>
        <th>Status</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>

      <?php

      $produtos = exibirProdutos();

      if (count($produtos) > 0) {

        foreach ($produtos as $indice => $valor) {
          $class = ($produtos[$indice]["estoque"] < $produtos[$indice]["min"]) ? "vermelho" : "";
          echo "<tr class='$class'>";
          echo "<td>" . $produtos[$indice]["nome"] . "</td>";
          echo "<td> R$" . $produtos[$indice]["preco"] . "</td>";
          echo "<td>" . $produtos[$indice]["estoque"] . "</td>";
          echo "<td>" . $produtos[$indice]["min"] . "</td>";
          echo "<td>" . ($produtos[$indice]["status"] == "true" ? "Ativo" : "Desativado") . "</td>";
          echo "<td> R$" . number_format(totalProduto($produtos[$indice]['preco'], $produtos[$indice]['estoque']), 2, ',', '.') . "</td>";
          echo "</tr>";
        }
      }

      ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3">
          Total em estoque
        </td>
        <td colspan="3" class="text-right">
          <?php echo "R$ " . number_format(totalEstoque()); ?>

        </td>
      </tr>
    </tfoot>
  </table>
</main>


<?php
include_once("footer.php");
?>