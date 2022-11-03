interface Endereco {
    id: number,
    estado: string,
    cidade: string,
    bairro: string,
    rua: string,
    numero: number,
    cep: string
}

interface Cliente {
    id: number,
    nome: string,
    email: string,
    endereco_id: number,
    user_id: number,
    created_at: Date,
    updated_at: Date
}

interface Barbeiro {
    id: number,
    nome: string,
    email: string,
    endereco_id: number,
    user_id: number,
    horario_inicio: string,
    horario_fim: string,
    created_at: Date,
    updated_at: Date
}

interface Pendente {
    id: number,
    data: string,
    cliente_id: number,
    barbeiro_id: number,
    created_at: Date,
    updated_at: Date,
    nome: string
}

interface Agendamento {
    id: number,
    pendente_id: number
    created_at: Date,
    updated_at: Date,
    data: string
}

interface Agendado {
    id: number,
    pendente_id: number,
    data: string,
    nome: string
}

interface Horarios {
    pendentes: Pendente[],
    agendados: Agendado[],
    limite: number
}

interface Usuario {
    id: number,
    name: string,
    email: string,
    token: string
}

interface Bus {
    emit: Function,
    on: Function
}

interface State {
    barbeiros: Barbeiro[],
    horarios: Horarios,
    cliente: Cliente,
    barbeiro: Barbeiro,
    endereco: Endereco,
    user: Usuario,
    diaSelecionado: number
}

export {
    Endereco,
    Cliente,
    Barbeiro,
    Pendente,
    Agendamento,
    Agendado,
    Horarios,
    Usuario,
    Bus,
    State
}