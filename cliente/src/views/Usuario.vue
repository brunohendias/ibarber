<template>
    <div class="container">
        <form class="form form-control mt-4 p-4 text-center">
            <div class="row">
                <h3>Formulario de dados pessoais</h3>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-4">
                            <label for="estado">Estado</label>
                            <input type="text" name="estado" class="form-control" v-model="endereco.estado" required
                                maxlength="3" minlength="2" alt="Estado">
                        </div>
                        <div class="col-8">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" class="form-control" v-model="endereco.cidade" required
                                maxlength="100" alt="Cidade">
                        </div>
                    </div>
                    <div class="col">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" class="form-control" v-model="endereco.bairro" required
                            maxlength="100" alt="Bairro">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col">
                        <label for="rua">Rua</label>
                        <input type="text" name="rua" class="form-control" v-model="endereco.rua" required
                            maxlength="100" alt="Rua">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="numero">Numero</label>
                            <input type="text" name="numero" class="form-control" v-model="endereco.numero" required
                                maxlength="5" alt="Numero">
                        </div>
                        <div class="col-6">
                            <label for="cep">CEP (Opcional)</label>
                            <input type="text" name="cep" class="form-control" v-model="endereco.cep" maxlength="9"
                                minlength="8" alt="CEP">
                        </div>
                    </div>
                </div>
                <p class="mt-4">
                    Por favor, preencha o formulario com seus dados
                    para que o sistema encontre as barbearias de sua cidade
                </p>
            </div>
            <cadastra v-if="!cliente" />
            <atualiza v-else />
        </form>
    </div>
</template>

<script setup lang="ts">
import { busca } from "@/core/functions"
import cadastra from '@/components/shared/buttons/cadastraEndereco.vue'
import atualiza from "@/components/shared/buttons/atualizaEndereco.vue"
import { ref, computed, onMounted } from 'vue'
import { Endereco, State } from "@/core/interfaces"
import { useStore } from "vuex"
import { Actions } from "@/core/enums"

const store = useStore()
const state: State = store.state

const path: string = 'endereco/me'
const action: string = Actions.alteraEndereco
const loading = ref<boolean>(false)

const endereco = computed(()
    : Endereco =>
    state.endereco
)
const cliente = computed(()
    : number =>
    state.cliente.id
)

onMounted(()
    : void => {
    loading.value = true
    busca(path, action, store)
        .then(() => loading.value = false)
        .catch(() => loading.value = false)
})
</script>

<style scoped>
label {
    padding-top: 10px;
}
</style>