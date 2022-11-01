import axios, { AxiosResponse } from 'axios'
import { Store } from 'vuex'

const busca = (path: string, action: string, store: Store<any>)
    : Promise<true | void> =>
    axios.get(path).then((resp: AxiosResponse) => resp.data
        ? store.dispatch(action, resp.data)
        : null)

const cadastra = (path: string, body: object)
    : Promise<true | void> =>
    axios.post(path, body)

const edita = (path: string, body: object)
    : Promise<true | void> =>
    axios.put(path, body)

export { busca, cadastra, edita }