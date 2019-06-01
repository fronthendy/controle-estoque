<?php

  $produtos = [];

  $produtos[] = [
    "nome" => "Camiseta Vingadores",
    "preco" => 50.99,
    "estoque" => 100,
    "min" => 20,
    "status" => true
  ];

  $produtos[] = [
    "nome" => "Calça Jeans",
    "preco" => 80.99,
    "estoque" => 100,
    "min" => 20,
    "status" => true
  ];

  $produtos[] = [
    "nome" => "Calça Moletom",
    "preco" => 180.99,
    "estoque" => 10,
    "min" => 20,
    "status" => true
  ];

  $produtos[] = [
    "nome" => "Tenis Maneiro",
    "preco" => 380.99,
    "estoque" => 100,
    "min" => 20,
    "status" => true
  ];

  $produtos[] = [
    "nome" => "Calça Moletom",
    "preco" => 80.99,
    "estoque" => 100,
    "min" => 20,
    "status" => true
  ];

  $produtos[] = [
    "nome" => "Patinete de Empreendedor Hipster",
    "preco" => 80.99,
    "estoque" => 100,
    "min" => 20,
    "status" => true
  ];

  $soma = 0;

  foreach ($produtos as $key => $produto) {
    $produtos[$key]["total"] = $produto["preco"] * $produto["estoque"];
    $soma = $soma + $produtos[$key]["total"];
  }


  // var_dump($produtos);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de estoque</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <style>
      .vermelho td {
        background-color: #fdb8b8;
      }
    </style>

</head>
<body>
    <header class="container">
      <h1>Controle de estoque</h1>
    </header>
    <main class="container">
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

            foreach ($produtos as $indice => $valor) {
              // if($valor["estoque"] < $valor["min"]) {
              //   $class = "vermelho";
              // } else {
              //   $class = "";
              // }

              $class = ($valor["estoque"] < $valor["min"]) ? "vermelho" : "";

              echo "<tr class='$class'>";
              echo "<td>". $valor["nome"] ."</td>";
              echo "<td> R$". $valor["preco"] ."</td>";
              echo "<td>". $valor["estoque"] ."</td>";
              echo "<td>". $valor["min"] ."</td>";
              echo "<td>". ($valor["status"] ? "Ativo" : "Desativado") ."</td>";
              echo "<td> R$". $valor["total"] ."</td>";
              echo "</tr>";
            }

          ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="6">
              <?php echo "Total em estoque R$ ". $soma; ?>
            </td>
          </tr>
        </tfoot>
      </table>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
