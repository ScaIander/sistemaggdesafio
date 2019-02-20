<?php 

session_start();

if(!$_SESSION['id']){
    header("Location: logout.php");
}

INCLUDE 'connection.php';

$modo = $_GET['modo'];

$id = $_GET['id'];

if($modo == "cadastrar"){

     $nome = str_replace("\'","",$_GET['nome']);
     $peso = str_replace("\'","",$_GET['peso']);

     if($nome=="" AND $peso==""){

        header("Location: formtipofalta.php?id=$id&modo=edit&errorresponse2=Campo em Branco, por favor preencher");
    
        } else if ($peso==""){
            
            header("Location: formtipofalta.php?id=$id&modo=edit&errorresponse1=Campo em Branco, por favor preencher");
            
        }
        else if($nome==""){
    
            header("Location: formtipofalta.php?id=$id&modo=edit&errorresponse=Campo em Branco, por favor preencher");
        }
    else{

    $inserirdados = "INSERT INTO tipofalta(nome,peso) VALUES ('$nome','$peso') ";

    $result = $conn->query($inserirdados);
    
    if($result){
        header("Location: formtipofalta.php?modo=cadastrar&response=Cadastrado com sucesso!");
    } else {
        echo ($inserirdados);
        die("Infelizmente não foi possível cadastrar a falta");
    }
}
}
else if($modo == "edit"){
    $id = $_GET['id'];
    
    $nome = str_replace("\'","",$_GET['nome']);
    $peso =  str_replace("\'","",$_GET['peso']);

    if($nome=="" AND $peso==""){

        header("Location: formtipofalta.php?id=$id&modo=edit&errorresponse2=Campo em Branco, por favor preencher");
    
        } else if ($peso==""){
            
            header("Location: formtipofalta.php?id=$id&modo=edit&errorresponse1=Campo em Branco, por favor preencher");
            
        }
        else if($nome==""){
    
            header("Location: formtipofalta.php?id=$id&modo=edit&errorresponse=Campo em Branco, por favor preencher");
        }
    else{

        

    $alterardados = "UPDATE tipofalta SET nome = '$nome', peso = '$peso' WHERE id = '$id' ";
    $result = $conn->query($alterardados);

    if($result){
        header("Location: formtipofalta.php?id=$id&modo=edit&response=Alterado com sucesso!");
    } else {
        echo ($alterardados);
        die("Infelizmente não foi possível alterar a falta");
    }
}
} else if ($modo == "delete"){
    $id = $_GET['id'];
    $deletardados = "DELETE FROM tipofalta WHERE id = '$id' ";

    $result = $conn->query($deletardados);

    if($result){
        header("location:tipofalta.php");
    } else {
        echo ($deletardados);
        die;
    }

}

?>