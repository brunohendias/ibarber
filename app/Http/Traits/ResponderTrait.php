<?php
namespace App\Http\Traits;

trait ResponderTrait {

    /**
     * Funcao para retorno de sucesso
     * @param  Array $dados
     * @return object
     */
    protected function RespSuccess(array $dados) : object
    {
        return responder()->success($dados);
    }

    /**
     * Funcao para retorno de falha
     * Exemplos: no-content, bad-request
     * @param  string $msg = null
     * @param  int $code = 400
     * @return object
     */
    protected function RespErrorNormal(string $msg = null, int $code = 400) : object
    {
		return responder()->error($code, $msg ?? __('return.empty'));
	}

    /**
     * Funcao para retorno de erro: Exception, Log
     * Funcao para enviar o log para o Kibana por exemplo
     * Exemplos: Table or View dosen't exists
     * @param  object $e
     * @param  string $msg = null
     * @param  int $code = 500
     * @return object
     */
    protected function RespLogErro(object $e, string $msg = null, int $code = 500) : object
    {
        return responder()->error($code, $msg ?? __('return.internalerror').$e->getMessage());
    }
}
