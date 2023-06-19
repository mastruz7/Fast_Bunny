<?php
include('include/includes.php');

$especialidades = Especialidade::getEspecialidades();

$result = '';
foreach($especialidades as $especialidade){
    $result .= '<select class="form-control">
        <option>'.$especialidade->especialidade_nome.'</option>';
}

echo $result;
?>