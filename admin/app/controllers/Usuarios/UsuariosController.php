<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe NoticiasController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Noticias
 * 
 * @package admin\app\controllers\Usuarios\UsuariosController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class UsuariosController extends ControllerBase {

    /**
     * Metodo NoticiasController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function UsuariosController($controller, $action, $urlparams) {
        //Inicializa os par�metros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }

    /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Usuarios
     * mandando para o model ConcreteUsuarios chamando o metodo SelectUsuarios
     * e armazenando o resultado na variavel $dados.
     * 
     * @param string $params
     * 
     * @return array
     */
    private function index_action($params = null) {
        //Seleciona os usu�rios
        $dados = $this->Delegator('ConcreteUsuarios', 'SelectUsuarios');

        //Dados do Usuario
        $this->View()->assign('dados_usuario', $dados);

        //Verifica se h� dados extras a serem adicionados na view(via parametro)
        if (!is_null($params)) {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $params);
        }
        //Verifica se h� dados extras a serem adicionados na view(via SESS�O)
        elseif (isset($_SESSION['view_data'])) {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $_SESSION['view_data']);
            //Elimina a sess�o
            unset($_SESSION['view_data']);
        }

        $this->View()->display('index.php');
    }

    /**
     * Metodo excluir
     * 
     * O metodo excluir verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita a exclusao do registro mandando para o model ConcreteUsuarios chamando
     * o metodo ExcluirUsuario.
     * 
     */
    private function excluir() {
        //Verifica se o usu�rio enviou uma requisi��o POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Localiza o Servico
            $resultado = $this->Delegator('ConcreteUsuarios', 'ExcluirUsuario', $this->getParam());
        }
    }

    /**
     * Metodo editar
     * 
     * O metodo editar verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita o cadastro do registro mandando para o model ConcreteUsuarios chamando
     * o metodo Editar. Caso os dados nao sejam enviados por POST chama o model
     * ConcreteUsuarios e o metodo SelectUsuarioId passando o id por parametro e armazena 
     * o resultado na variavel $dados. 
     * 
     * @return array
     */
    private function editar() {
        //Verifica se o usu�rio enviou uma requisi��o POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Solicita a inclus�o do registro
            $this->Delegator('ConcreteUsuarios', 'Editar', $this->getPost());
        } else {
            //Valida o id informado
            if ($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id'))) {
                //Solicita os dados do usu�rio
                $dados = $this->Delegator('ConcreteUsuarios', 'SelectUsuarioId', $this->getParam());

                //Envia os dados recuperados para a view
                $this->View()->assign('dados_usuario', $dados);

                //Solicita todas as permissoes 
                $permissoes = $this->Delegator('ConcreteUsuarios', 'getPermissaoUsuarios', array('cod_perfil' => $dados['PermissaoPerfis']['cod_tipo'], 'cod_id' => $this->getParam('cod_id')));

                $array = array();
                $valor = null;
                $contagem = 0;
                $html = "";

                foreach ($permissoes as $key => $dados) {
                    if ($dados['FrameworkControllers']['txt_nome_amigavel'] != $valor) {
                        $html .= "<br/><strong>" . $dados['FrameworkControllers']['txt_nome_amigavel'] . "</strong><br/>";
                        $valor = $dados['FrameworkControllers']['txt_nome_amigavel'];
                    }

                    if (isset($dados['PermissaoUsuario'][0])) {
                        $html .= "<input type='checkbox' checked='checked' name='permissao[]' id='permissao' value='$dados[cod_id]' />" . $dados['FrameworkAcoes']['txt_nome_amigavel'] . "<br/>";
                    } else {
                        $html .= "<input type='checkbox' name='permissao[]' id='permissao' value='$dados[cod_id]' />" . $dados['FrameworkAcoes']['txt_nome_amigavel'] . "<br/>";
                    }
                }


                //Leva a $cont_cao para a view
                $this->View()->assign('html', $html);

                //Envia as permiss�es para view
                //$this->View()->assign('permissoes', $permissoes);
                //Solicita os dados do usu�rio
                $status = $this->Delegator('ConcreteUsuarios', 'SelectStatus');

                //Envia o status para a view
                $this->View()->assign('array_status', $status);

                //Exibe a view
                $this->View()->display('editar.php');
            }
        }
    }

    /**
     * Metodo detalhes
     * 
     * O metodo detalhes chama o model ConcreteUsuarios chamando o metodo getUsuarioById.
     * 
     */
    private function detalhes() {
        //Valida o cod_id
        if ($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id'))) {
            //Solicita os dados do usu�rio
            $dados_usuario = $this->Delegator('ConcreteUsuarios', 'getUsuarioById', $this->getParam());

            //Coloca os dados da vaga na View
            $this->View()->assign('dados_usuario', $dados_usuario);

            //Seleciona as permiss�es do usu�rio
            $dados_permissoes = $this->Delegator('ConcreteUsuarios', 'SelectControlerAcaoId', $this->getParam());

            $array = array();
            $valor = null;
            $contagem = 0;
            $html = "";

            foreach ($dados_permissoes as $key => $dados) {
                if ($dados['PermissaoGeral']['FrameworkControllers']['txt_nome_amigavel'] != $valor) {
                    $html .= "<br/><strong>" . $dados['PermissaoGeral']['FrameworkControllers']['txt_nome_amigavel'] . "</strong><br/>";
                    $valor = $dados['PermissaoGeral']['FrameworkControllers']['txt_nome_amigavel'];
                }

                $html .= $dados['PermissaoGeral']['FrameworkAcoes']['txt_nome_amigavel'] . "<br/>";
            }

            //Leva a $cont_cao para a view
            $this->View()->assign('html', $html);

            //Coloca os dados da vaga na View
            $this->View()->assign('dados_permissoes', $dados_permissoes);

            //Apresenta a view
            $this->View()->display('detalhes.php');
        }
    }

   /**
     * Metodo incluir
     * 
     * O metodo incluir verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita a inclusao chamando o model ConcreteUsuarios e o
     * metodo cadastraUsuario passando os dados enviados via POST e armazenando o resultado na 
     * variavel  $resultado. Caso os dados nao sejam enviados por POST 
     * chama o metodo getStatus e getPerfis antes de enviar para a view
     * 
     */
    private function incluir() {
        //Verifica se o formul�rio foi postado
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Solicita o cadastramento do Servico
            $resultado = $this->Delegator('ConcreteUsuarios', 'cadastraUsuario', $this->getPost());
        } else {
            $this->getStatus();
            $this->getPerfis();

            $this->View()->display('incluir.php');
        }
    }

    /**
     * Metodo getStatus
     * 
     * O metodo getStatus chama o model ConcreteUsuarios e o
     * metodo getStatus armazenando o resultado na variavel $recordset.
     * 
     */
    private function getStatus() {
        $recordset = $this->Delegator('ConcreteUsuarios', 'getStatus');

        //manda os dados para a view
        $this->View()->assign('dados_status', $recordset);
    }

     /**
     * Metodo getPerfis
     * 
     * O metodo getPerfis chama o model ConcreteUsuarios e o
     * metodo getPerfis armazenando o resultado na variavel $recordset.
     * 
     */
    private function getPerfis() {
        $recordset = $this->Delegator('ConcreteUsuarios', 'getPerfis');

        //manda os dados para a view
        $this->View()->assign('perfis', $recordset);
    }

    /**
     * Metodo verificaLogin
     *
     * Chama o model ConcreteUsuarios e o metodo verificaLogin
     * Verificando o login na inclusao e edicao para se caso exista um login mostra o erro. 
     * 
     */
    private function verificaLogin() {
        $this->Delegator('ConcreteUsuarios', 'verificaLogin', $this->getPost());
    }

}