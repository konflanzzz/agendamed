<?php
include('backend\Models\API\API.php');
include('./backend/Models/DAO/AgendamentoConsulta.php');
include('./backend/Models/DAO/Endereco.php');
include('./backend/Models/Pessoas/Medico.php');
include('./backend/Models/Pessoas/MedicoConsulta.php');
include('./backend/Models/Pessoas/Paciente.php');

    $apiAgendamento = new API();

    $paciente = new Paciente();
    $paciente->xNome = $_POST['name'];
    $paciente->xDocumento = $_POST['docType'];
    $paciente->nDoc = $_POST['nDocumento'];
    $paciente->fone = $_POST['fone'];

    $enderecoPaciente = new Endereco();
    $enderecoPaciente->xLgr = $_POST['endereco'];

    $paciente->endereco = $enderecoPaciente;

    $medico = new MedicoConsulta();
    $medico->xNome = $_POST['medico'];
    $medico->xEspecialidade = $_POST['lookingFor'];
    $medico->nEspecialidade = $_POST['especialidade'];

    $medico->agenda = $_POST['data'] + $_POST['hora'];;

    $agendamentoConsulta = new AgendamentoConsulta();

    $agendamentoConsulta->paciente = $paciente;
    $agendamentoConsulta->convenio = $paciente->xConvenio;
    $agendamentoConsulta->motivoConsulta = "Paciente indica dores fortes na lombar, após prática de futebol.";
    $agendamentoConsulta->is_reconsulta = false;
    $agendamentoConsulta->is_mostrar_exame = false;
    $agendamentoConsulta->is_encaminhado = false;
    $agendamentoConsulta->medicoAnterior = null;
    $agendamentoConsulta->medicoConsulta = $medico;

    var_dump(json_encode($agendamentoConsulta));
    $apiAgendamento->request = $agendamentoConsulta;

    $retorno = $apiAgendamento->enviaConteudoParaAPI();
?>