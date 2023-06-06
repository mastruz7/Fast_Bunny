<!DOCTYPE html>
<html>
<head>
  <title>Agendamento de Pacientes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    
    .container {
      width: 600px;
      margin: 0 auto;
    }
    
    h1 {
      text-align: center;
    }
    
    #calendar {
      display: inline-block;
      width: 400px;
      border: 1px solid #ccc;
      padding: 10px;
    }
    
    #calendar table {
      width: 100%;
    }
    
    #calendar th,
    #calendar td {
      text-align: center;
      padding: 5px;
    }
    
    #calendar th {
      background-color: #f2f2f2;
    }
    
    #calendar td:not(.disabled):hover {
      background-color: #f2f2f2;
      cursor: pointer;
    }
    
    .disabled {
      color: #ccc;
    }
    
    .selected {
      background-color: #4CAF50;
      color: white;
    }
    
    label {
      display: block;
      margin-top: 10px;
    }
    
    input[type="text"] {
      width: 100%;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Agendamento de Pacientes</h1>
    <div id="calendar"></div>
    <form>
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required>
      
      <label for="data">Data:</label>
      <input type="text" id="data" name="data" readonly required>
      
      <input type="submit" value="Agendar">
    </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        selectable: true,
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        dateClick: function(info) {
          var dateStr = info.dateStr;
          document.getElementById('data').value = dateStr;
        }
      });
      calendar.render();
    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
</body>
</html>
