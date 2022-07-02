<?php
include('backend\Models\API\API.php');
include('./backend/Models/DAO/AgendamentoConsulta.php');
include('./backend/Models/DAO/Endereco.php');
include('./backend/Models/Pessoas/Medico.php');
include('./backend/Models/Pessoas/MedicoConsulta.php');
include('./backend/Models/Pessoas/Paciente.php');

    $apiAgendamento = new API();

    $paciente = new Paciente();
    $paciente->xNome = "Fernando Konflanz";
    $paciente->idade = "23";
    $paciente->xDocumento = "CPF";
    $paciente->nDoc = "019.869.374-04";
    $paciente->fone = "51989366737";
    $paciente->profissao = "desenvolvedor";
    $paciente->nomeMae = "Mãe do Fernando";
    $paciente->nacionalidade = "Alemão";
    $paciente->dataNascimento = "21/05/1999";
    $paciente->nConvenio = "0123654789";
    $paciente->xConvenio = "Unimed";
    $paciente->is_acompanhado = false;
    $paciente->pcd = false;
    $paciente->acompanhante = null;

    $enderecoPaciente = new Endereco();
    $enderecoPaciente->xLgr = "Rua Avenida Grande";
    $enderecoPaciente->nro = "150";
    $enderecoPaciente->cep = "96180-000";
    $enderecoPaciente->cidade = "Camaquã";
    $enderecoPaciente->xBairro = "Vila Velha";
    $enderecoPaciente->xMun = "436987250";
    $enderecoPaciente->xPais = "1058";

    $paciente->endereco = $enderecoPaciente;

    $medico = new MedicoConsulta();
    $medico->xNome = "Carla Batista";
    $medico->xEspecialidade = "Nutrição Esportiva";
    $medico->nEspecialidade = "67";
    $medico->nAreaAtuacao = "4458";
    $medico->xAreaAtuacao = "Esporte Adulto";
    $medico->crm = "148945419819RS";

    $enderecoMedicoConsulta = new Endereco();
    $enderecoMedicoConsulta->xLgr = "Rua Avenida Pequena";
    $enderecoMedicoConsulta->nro = "148";
    $enderecoMedicoConsulta->cep = "96180-000";
    $enderecoMedicoConsulta->cidade = "Camaquã";
    $enderecoMedicoConsulta->xBairro = "Vila Antiga";
    $enderecoMedicoConsulta->xMun = "436987250";
    $enderecoMedicoConsulta->xPais = "1058";
    $medico->endereco = $enderecoMedicoConsulta;

    $medico->agenda = "2022-25-07T15:30:00-03:00";

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