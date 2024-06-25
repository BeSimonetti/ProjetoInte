<?php

include_once('../conexao.php');
$database = new Conexao(); 
$db = $database->getConnection();

session_start();

if ((!isset($_SESSION['email']) || !isset($_SESSION['senha']))) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    exit(); // Garantir que o script pare após redirecionar
}

$logado = $_SESSION['email'];

// if (!empty($_GET['search'])) {
//     $data = $_GET['search'];
//     $sql = "SELECT * FROM usuario WHERE id_usuario LIKE :data OR email LIKE :data ORDER BY id_usuario DESC";
//     $stmt = $db->prepare($sql);
//     $stmt->execute(['data' => '%' . $data . '%']);
// } else {
//     $sql = "SELECT * FROM usuario ORDER BY id_usuario DESC";
//     $stmt = $db->prepare($sql);
//     $stmt->execute();
// }
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM livro WHERE ID_Livro LIKE :data OR Nome LIKE :data ORDER BY ID_Livro DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute(['data' => '%' . $data . '%']);
    print_r($stmt);
} else {
    $sql = "SELECT * FROM livro ORDER BY ID_Livro DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Livros</title>
    <link rel="stylesheet" href="style.css">
    <style>
        a#voltarVerLivros {
            text-decoration: none;
            padding: 5px;
            background-color: gray;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="centralizado">
        <div class="titulo">
            <table border="1">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Autor</th>
                        <th>ISBN</th>
                        <th>Editora</th>
                        <th>Apagar</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "biblioteca.class.php";
                        $b = new Biblioteca();
                        $livros = $b->listarLivros();
                        
                        foreach ($livros as $livro):
                    ?>
                    <tr>
                
                        <td><?php echo $livro['Nome']; ?></td>
                        <td><?php echo $livro['Autor']; ?></td>
                        <td><?php echo $livro['ISBN']; ?></td>
                        <td><?php echo $livro['Editora']?></td>
                        <td><?php echo "<a href='Ops/apagar.php?id=". $livro['ID_Livro']. "'>Apagar</a>"?></td>
                        <?php                  
                        while ($user_data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='atualizar.php?ID_Livro=" . $user_data['ID_Livro'] . "' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                        </a>; 
                        <td>";
                        }
                        ?>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
            <div>
                <a href="index.php" id="voltarVerLivros">Voltar à Tela Inicial</a>
            </div>
        </div>
    </div>
</body>
</html>