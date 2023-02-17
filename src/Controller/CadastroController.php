<?php

namespace Petshop\Controller;

use Exception;
use Petshop\Core\FrontController;
use Petshop\Model\Cliente;
use Petshop\View\Render;

class CadastroController extends FrontController
{
    public function cadastro()
    {
        $dados = [];
        $dados['titulo'] = 'Faça seu cadastro';
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();
        $dados['formCadastro'] = $this->formCadastro();

        Render::front('cadastro', $dados);
    }

    public function postCadastro()
    {
        try {
            $cliente = new Cliente;
            $cliente->tipo    = $_POST['tipo']    ?? null;
            $cliente->cpfcnpj = $_POST['cpfcnpj'] ?? null;
            $cliente->nome    = $_POST['nome']    ?? null;
            $cliente->email   = $_POST['email']   ?? null;
            $cliente->senha   = $_POST['senha']   ?? null;

            if ($_POST['senha'] != $_POST['senha2']) {
                throw new Exception('As senhas devem ser iguais');
            }

            $resultado = $cliente->find(['email ='=>$cliente->email]);
            if (!empty($resultado)) {
                throw new Exception('Endereço de e-mail já cadastrado, selecione recuperar senha caso necessário');
            }

            $cliente->save();

        } catch(Exception $e) {
            $_SESSION['mensagem'] = [
                'tipo'  =>  'warning',
                'texto' =>  $e->getMessage()
            ];
            $this->cadastro();
            exit;
        }

        redireciona('/login', 'info', 'Cadastro realizado com sucesso, faça o login para continuar');
    }

    private function formCadastro()
    {
        $dados = [
            'btn_label'=>'Criar minha conta',
            'btn_class'=>'btn btn-success mt-5',
            'fields'=>[
                ['type'=>'radio-inline', 'class'=>'col-6', 'label'=>'Você é pessoa', 'name'=>'tipo', 
                    'options'=>[
                        ['label'=>'Física', 'value'=>'F'],
                        ['label'=>'Jurídica', 'value'=>'J']
                    ], 
                    'required'=>true
                ],
                ['type'=>'text', 'class'=>'col-6', 'label'=>'Documento', 'name'=>'cpfcnpj', 'required'=>true],
                ['type'=>'text', 'label'=>'Nome completo', 'name'=>'nome', 'required'=>true],
                ['type'=>'email', 'label'=>'E-mail', 'name'=>'email', 'required'=>true],
                ['type'=>'password', 'label'=>'Crie uma senha', 'name'=>'senha', 'required'=>true],
                ['type'=>'password', 'label'=>'Confirme sua senha', 'name'=>'senha2', 'required'=>true],
            ]
        ];

        return Render::block('form', $dados);
    }
}