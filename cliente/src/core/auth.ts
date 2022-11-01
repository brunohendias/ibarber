import axios from "axios";
import { Store } from "vuex";
import { bus, Events } from "./bus";
import { Actions, Routes } from "./enums";
import { keytoken } from "./config";

const key_token: string = btoa(keytoken);

const gettoken = ()
    : string =>
    'Bearer ' + localStorage.getItem(key_token);

const setToken = (token: string)
    : void =>
    localStorage.setItem(key_token, token);

const isAutenticated = ()
    : boolean =>
    localStorage.getItem(key_token) != null;

const authenticated: boolean = isAutenticated();

const usuario = ()
    : Promise<true | void> =>
    axios.get('user')
        .then(resp => !resp.data
            ? logout()
            : true)
        .catch(() => logout())

const logout = ()
    : void => {
    localStorage.clear()
    window.location.replace(Routes.Login)
}

const forgetPassword = (email: string)
    : Promise<true | void> =>
    axios.post('forgetpassword', { email })
        .then(() => bus.emit(Events.info_auth,
            'Verifique no seu email para fazer a troca da senha.'))
        .catch(() => bus.emit(Events.error_auth,
            'Ocorreu um erro inexperado, por favor tente novamente mais tarde.'))

const validaTokenReset = (id: string, token: string, store: Store<any>)
    : Promise<true | void> =>
    axios.post('reset/token', { token, id })
        .then(resp => !resp.data
            ? logout()
            : store.dispatch(Actions.alteraUsuario, resp.data))
        .catch(() => logout())

const resetPassword = (body: object)
    : Promise<true | void> =>
    axios.post('reset', body)
        .then(resp => !resp.data
            ? logout()
            : window.location.replace(Routes.Login))
        .catch(() => logout())

const action = (path: string, body: object)
    : Promise<true | void> =>
    axios.post(path, body)
        .then(resp => {
            if (resp.data.token) {
                setToken(resp.data.token)
                if (isAutenticated())
                    window.location.replace(Routes.Home)
            } else {
                bus.emit(Events.error_auth,
                    'Verifique os dados informado, email ou senha incorreto.')
            }
        })
        .catch(() => bus.emit(Events.error_auth,
            'Ocorreu algum problema, por favor tente novamente mais tarde.'))
        .finally(() => console.clear())

export {
    gettoken, authenticated,
    action, usuario, logout, resetPassword,
    forgetPassword, validaTokenReset
}