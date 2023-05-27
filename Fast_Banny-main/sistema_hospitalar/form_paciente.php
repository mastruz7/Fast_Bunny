<!DOCTYPE html>
<html>
  <head>
    <title>Formulário de Paciente</title>

  </head>

  <body>
    <h1>Formulário de Paciente</h1>
    <br><br>
      <form method="post" action="cadastrar_paciente.php">

        <label for="nome_completo">Nome Completo:</label><br>
        <input type="text" name="nome_completo" id="nome_completo" required>
        <br><br>
        <label for="data_nascimento">Data de Nascimento:</label><br>
        <input type="date" name="data_nascimento" id="data_nascimento" required>
        <br><br>
        <label for="cpf">CPF:</label><br>
        <input type="text" name="cpf" id="cpf" required>
        <br><br>
        <label for="rg">RG:</label><br>
        <input type="text" name="rg" id="rg" required>
        <br><br>
        <label for="email">E-mail:</label><br>
        <input type="email" name="email" id="email" required>
        <br><br>
        <label for="endereco">Endereço:</label><br>
        <input type="text" name="endereco" id="endereco" required>
        <br><br>
        <label for="telefone">Telefone:</label><br>
        <input type="tel" name="telefone" id="telefone" required>
        <br><br>
        <label for="telefone_adicional">Telefone Adicional:</label>  <br>
        <input type="tel" name="telefone_adicional" id="telefone_adicional">
        <br><br>
        <input type="submit" value="Cadastrar">
      </form>
  </body
</hmtl>

