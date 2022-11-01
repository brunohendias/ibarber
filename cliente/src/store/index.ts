import { createStore } from 'vuex'
import {
    Agendamento, Barbeiro, Cliente,
    Endereco, Pendente, Usuario, State
} from '@/core/interfaces'
import { Mutations } from '@/core/enums'

const store = createStore({
    state: <State>{
        barbeiros: [],
        horarios: {
            pendentes: [],
            agendados: [],
            limite: 4
        },
        cliente: {
            id: 0,
            nome: '',
            email: '',
            endereco_id: 0,
            user_id: 0,
            created_at: new Date,
            updated_at: new Date
        },
        barbeiro: {
            id: 0,
            nome: '',
            email: '',
            endereco_id: 0,
            user_id: 0,
            horario_inicio: '',
            horario_fim: '',
            created_at: new Date,
            updated_at: new Date
        },
        endereco: {
            id: 0,
            estado: '',
            cidade: '',
            bairro: '',
            rua: '',
            numero: 0,
            cep: ''
        },
        user: {
            id: 0,
            name: '',
            email: '',
            token: ''
        },
        diaSelecionado: 0
    },
    mutations: {
        [Mutations.ALTERA_HORARIOS_PENDENTES]:
            (state: State, value: Pendente[]) =>
                state.horarios.pendentes = value,
        [Mutations.ALTERA_HORARIOS_AGENDADOS]:
            (state: State, value: Agendamento[]) =>
                state.horarios.agendados = value,
        [Mutations.ALTERA_BARBEIROS]:
            (state: State, value: Barbeiro[]) =>
                state.barbeiros = value,
        [Mutations.ALTERA_DIA_SELECIONADO]:
            (state: State, value: number) =>
                state.diaSelecionado = value,
        [Mutations.ALTERA_CLIENTE]:
            (state: State, value: Cliente) =>
                state.cliente = value,
        [Mutations.ALTERA_BARBEIRO]:
            (state: State, value: Barbeiro) =>
                state.barbeiro = value,
        [Mutations.ALTERA_ENDERECO]:
            (state: State, value: Endereco) =>
                state.endereco = value,
        [Mutations.ALTERA_USUARIO]:
            (state: State, value: Usuario) =>
                state.user = value
    },
    actions: {
        a: (context, value: Cliente): void =>
            context.commit(Mutations.ALTERA_CLIENTE, value),
        b: (context, value: Barbeiro): void =>
            context.commit(Mutations.ALTERA_BARBEIRO, value),
        c: (context, value: Endereco): void =>
            context.commit(Mutations.ALTERA_ENDERECO, value),
        d: (context, value: Usuario): void =>
            context.commit(Mutations.ALTERA_USUARIO, value),
        e: (context, value: Barbeiro[]): void =>
            context.commit(Mutations.ALTERA_BARBEIROS, value),
        f: (context, value: Pendente[]): void =>
            context.commit(Mutations.ALTERA_HORARIOS_PENDENTES, value),
        g: (context, value: Agendamento[]): void =>
            context.commit(Mutations.ALTERA_HORARIOS_AGENDADOS, value),
        h: (context, value: number): void =>
            context.commit(Mutations.ALTERA_DIA_SELECIONADO, value)
    }
})

export default store