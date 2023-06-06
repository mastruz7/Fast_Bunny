<!DOCTYPE html>
<html>
  <head>
    <title>Formulário de Prontuário Médico</title>

  </head>
  <body>
  
    <h2>Formulário de Prontuário Médico</h2>
    
    <form action="processar_formulario.php" method="post">
       
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required><br><br>

    <label for="idade">Idade:</label><br>
    <input type="number" name="idade" id="idade" required><br><br>

    <label for="sintomas">Sintomas:</label><br>
    <textarea name="sintomas" id="sintomas" rows="4" cols="50" required></textarea><br><br>

    <label for="diagnostico">Diagnóstico:</label><br>
    <textarea name="diagnostico" id="diagnostico" rows="4" cols="50" required></textarea><br><br>
    <input type="submit" value="Enviar">
    
    </form>

</body>

</html>

