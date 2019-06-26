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
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>

      <?php
  
      $produtos = carregaProdutos();

      if (count($produtos) > 0) {

        foreach ($produtos as $indice => $valor) {
          $class = ($produtos[$indice]["estoque"] < $produtos[$indice]["min"]) ? "vermelho" : "";
          echo "<tr class='$class'>";
          echo "<td><a href='alterar-produto.php?pos=$indice'>" . $produtos[$indice]["nome"] . "</a></td>";
          echo "<td> R$" . $produtos[$indice]["preco"] . "</td>";
          echo "<td>" . $produtos[$indice]["estoque"] . "</td>";
          echo "<td>" . $produtos[$indice]["min"] . "</td>";
          echo "<td>" . (isset($produtos[$indice]["status"]) ? "Ativo" : "Desativado") . "</td>";
          echo "<td> R$" . number_format(totalProduto($produtos[$indice]['preco'], $produtos[$indice]['estoque']), 2, ',', '.') . "</td>";
          echo "<td class='acoes'>
          <a href='alterar-produto.php?pos=".$indice."' class='btn btn-xs btn-info'>Alterar</a>
          <a href='deletar-produto.php?pos=$indice' class='btn btn-xs btn-danger'>Excluir</a>
          </td>";
          echo "</tr>";
          
        }
      }

      ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">
          Total em estoque
        </td>
        <td colspan="2">
          <?php echo "R$ " . number_format(totalEstoque()); ?>

        </td>
      </tr>
    </tfoot>
  </table>
</main>


<?php
include_once("footer.php");
?>