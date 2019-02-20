function voltar() {
    window.location = "menugenteegestao.php";
  }

  function deletebutton(id){
    if(confirm("Tem certeza que deseja deletar?")){
        window.location = "formActiontipofalta.php?modo=delete&id="+id;
    }
}