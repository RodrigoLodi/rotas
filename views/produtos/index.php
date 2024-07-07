<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <ul>
        <?php if (isset($products) && is_array($products)): ?>
            <?php foreach ($products as $product): ?>
                <li>
                    <a href="/site-imperio2/produtos/<?php echo $product['id']; ?>">
                        <?php echo htmlspecialchars($product['name']); ?>
                    </a>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Nenhum produto encontrado.</li>
        <?php endif; ?>
    </ul>
</body>
</html>
