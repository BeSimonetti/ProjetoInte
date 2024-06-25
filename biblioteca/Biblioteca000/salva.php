<?php
    include_once "../conexao.php";
    $database = new Conexao(); 
    $db = $database->getConnection();

    if(isset($_POST['update']))
    {
        $ID_Livro = $_POST['ID_Livro'];
        $tituloLivro = $_POST['Nome'];
        $autorLivro = $_POST['Autor'];
        $ISBN = $_POST['ISBN'];
        $editora = $_POST['Editora'];
        
        $sqlInsert = "UPDATE livro SET tituloLivro='$tituloLivro', autorLivro='$autorLivro', ISBN='$ISBN', editora='$editora',WHERE ID_Livro = $ID_Livro";
        $result = $db->query($sqlInsert);
        if($result){
            header('Location: verLivros.php');
        } else {
            echo "Erro ao editar livro:" . $db->error;
        }
    }
?>