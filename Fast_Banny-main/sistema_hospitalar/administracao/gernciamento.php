<!DOCTYPE html>
<html>
<head>
  <title>Gerenciamento</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    h1 {
      color: #333;
      text-align: center;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .section {
      margin-bottom: 20px;
    }

    .section h2 {
      color: #666;
      margin-bottom: 10px;
    }

    .section p {
      color: #999;
    }

    .form-group {
      margin-bottom: 10px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    select {
      width: 100%;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    button {
      padding: 10px 20px;
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    button:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Gerenciamento</h1>

    <div class="section">
      <h2>Médicos</h2>
      <p>Adicionar ou editar médicos</p>
      <form>
        <div class="form-group">
          <label for="medicoNome">Nome:</label>
          <input type="text" id="medicoNome" name="medicoNome">
        </div>
        <div class="form-group">
          <label for="medicoEspecialidade">Especialidade:</label>
          <input type="text" id="medicoEspecialidade" name="medicoEspecialidade">
        </div>
        <button type="submit">Salvar</button>
      </form>
    </div>

    <div class="section">
      <h2>Pacientes</h2>
      <p>Adicionar ou editar pacientes</p>
      <form>
        <div class="form-group">
          <label for="pacienteNome">Nome:</label>
          <input type="text" id="pacienteNome" name="pacienteNome">
        </div>
        <div class="form-group">
          <label for="pacienteIdade">Idade:</label>
          <input type="text" id="pacienteIdade" name="pacienteIdade">
        </div>
        <button type="submit">Salvar</button>
      </form>
    </div>

    <div class="section">
      <h2>Funcionários</h2>
      <p>Adicionar ou editar funcionários</p>
      <form>
        <div class="form-group">
          <label for="funcionarioNome">Nome:</label>
          <input type="text" id="funcionarioNome" name="funcionarioNome">
        </div>
        <div class="form-group">
          <label for="funcionarioCargo">Cargo:</label>
          <select id="funcionarioCargo" name="funcionarioCargo">
            <option value="recepcionista">Recepcionista</option>
            <option value="enfermeiro">Enfermeiro</option>
            <option value="administrativo">Administrativo</option>
          </select>
        </div>
        <button type="submit">Salvar</button>
      </form>
    </div>
  </div>
</body>
</html>
