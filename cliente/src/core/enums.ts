enum Events {
    info_auth = 'a',
    error_auth = 'b',
    recarrega_horarios_pendente = 'c',
    recarrega_cliente = 'd',
    recarrega_horarios_agendado = 'e'
}

enum Mutations {
    ALTERA_CLIENTE = 'a',
    ALTERA_BARBEIRO = 'b',
    ALTERA_BARBEIROS = 'c',
    ALTERA_HORARIOS_PENDENTES = 'd',
    ALTERA_HORARIOS_AGENDADOS = 'e',
    ALTERA_DIA_SELECIONADO = 'f',
    ALTERA_ENDERECO = 'g',
    ALTERA_USUARIO = 'h'
}

enum Actions {
    alteraCliente = 'a',
    alteraBarbeiro = 'b',
    alteraEndereco = 'c',
    alteraUsuario = 'd',
    alteraBarbeiros = 'e',
    alteraHorariosPendentes = 'f',
    alteraHorariosAgendados = 'g',
    alteraDiaSelecionado = 'h'
}

enum Routes {
    Home = '/',
    Register = '/register',
    Login = '/login',
    Reset = '/reset/:token/:id',
    Usuario = '/user',
}

export { Events, Mutations, Actions, Routes }