<?php
include_once "../conexao.php";
$database = new Conexao(); 
$db = $database->getConnection();

if(!empty($_GET['ID_Livro'])) {
    $id_usuario = $_GET['ID_Livro'];
    $sqlSelect = "SELECT * FROM livro WHERE ID_Livro = :ID_Livro";
    $stmt = $db->prepare($sqlSelect);
    $stmt->bindParam(':ID_LIvro', $ID_Livro, PDO::PARAM_INT);
    $stmt->execute();
    
    if($stmt->rowCount() > 0) {
        while($user_data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $email = $user_data['Nome'];
            $senha = $user_data['Autor'];
            $email = $user_data['ISBN'];
            $senha = $user_data['Editora'];
        }
    } else {
        header('Location: index.php');
        exit();
    }
}
 else {
    header('Location: phpmyadmin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Atualizar Pessoa</h2>
    <form action='salva.php' method='POST'>
        
        <input type="hidden" name="id_Livro" value="">
        
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" value="<?php echo $tituloLivro;?>"><br>
        
        <label for="autor">Autor:</label><br>
        <input type="text" id="autor" name="autor" value="<?php echo $autorLivro;?>"><br>
        
        <label for="isbn">ISBN:</label><br>
        <input type="number" id="isbn" name="isbn" value="<?php echo $ISBN;?>"><br>
        
        <label for="editora">Editora:</label><br>
        <input type="number" id="editora" name="editora" value="<?php $editoraA;?>"><br>
        
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>