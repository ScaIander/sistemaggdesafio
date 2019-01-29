<?php 

include 'connection.php';

?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="cadastro.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/cadastro.js"></script>
    <title>Cadastro</title>
    <meta charset = "utf-8">

</head>

<body>

 <div class="dados">
     <br>
    <center><h3>Cadastro</h3></center>
    
    <div class="nome">
            <label>Nome</label>
            <br>
            <input id="nome" name="nome" value="" type="text" size="70" maxlength="60">
            <br>
            <br>
        </div>
        <div class="associado">
                <label>Login</label>
                <br>
                <input id="login" name="login" value="" type="text">
                <br>
                <br>
                <label>Senha</label>
                <br>
                <input id="senha" name="senha" value="" type="password">
            </div>    
            <br>
    <div class="setor">
        <td>Setor:</td>
        <br>
        <td><select  name="setor" id="setor">
          <option>Selecione</option>
              <?php
              $sql = "SELECT id,nome FROM setor WHERE id > -1 ";
              $result = $conn->query($sql);
              
              $row = $result->fetch_assoc();
             
              while($row){
                $selected = "";
                echo "<option value='".$row['id']."' $selected>".$row['nome']."</option>";
                $row = $result->fetch_assoc();
              }
              ?>
        </select></td>
    </div>
    <br>
    <div class="engenharia">
        <tr>
      <td>Engenharia:</td>
      <br>
      <td><select  name="engenharia" id="engenharia">
          <option>Selecione</option>
              <?php
              $sql = "SELECT id,nome FROM engenharia WHERE id > -1 ";
              $result = $conn->query($sql);
              
              $row = $result->fetch_assoc();
             
              while($row){
                $selected = "";
                echo "<option value='".$row['id']."' $selected>".$row['nome']."</option>";
                $row = $result->fetch_assoc();
              }
              ?>
        </select>
    </td>
    </tr>
    </div>
    <br>
    <br>
    <button name = "modo" id="modo" class="botton" onclick="javascript:cadastroaction(this.value);" value="cadastrar">cadastrar</button>
    <label id="labelResponse"></label>
	<font color="red" id="response"></font>
 </div>

</body>

</html>