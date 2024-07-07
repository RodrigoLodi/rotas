<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Produto</title>
</head>
<body>
    <h1>Detalhes do Produto</h1>
    <p>ID: <?php echo htmlspecialchars($product['id']); ?></p>
    <p>Nome: <?php echo htmlspecialchars($product['name']); ?></p>
    <p>Preço: R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></p>
    <p>Descrição: <?php echo htmlspecialchars($product['description']); ?></p>
</body>
</html>
