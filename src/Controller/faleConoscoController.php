<?php

namespace Petshop\Controller;

use Petshop\Core\Exception;
use  Petshop\Core\FrontController;
use Petshop\View\Render;
use Respect\Validation\Validator as v;
use Petshop\Core\SendMail;

class FaleConoscoController extends FrontController
{
    public function faleConosco()
    {
        $dados = [];
        $dados['topo'] = $this->carregaHtmlTopo();
        $dados['rodape'] = $this->carregaHtmlRodape();
        $dados['formulario'] = $this->formFaleConosco();

        Render::front('fale-conosco', $dados);
    }

    public function postFaleConosco()
    {
        try {
            if(empty($_POST['nome']) 
            || empty($_POST['email']) 
            || empty($_POST['mensagem'])) {
                throw New Exception('Todos os campos devem estar preenchidos');
            }
            $nome = trim($_POST['nome']);
            $email = trim($_POST['email']);
            $mensagem = trim($_POST['mensagem']);
            
            if (strlen($nome)<6) {
                throw New Exception('O nome precisa ser completo');
            }

            $emailValido = v::email()->validate($email);
            if (!$emailValido) {
                throw new Exception('O email está incorreto');
            }

            if (strlen($mensagem)<6) {
                throw New Exception('Por favor, seja mais descritivo na mensagem');
            }

            $mensagemFull = <<<HTML
                    Olá, chegou o novo contato<br>
                    <strong>Nome:</strong> {$nome}<br>
                    <strong>E-mail:</strong> {$email}<br>
                    <strong>Mensagem:</strong> <br> {$mensagem}<br>

            HTML;
            $assunto = 'Contato via site - ' . date('d/m/Y H:i:s');
            SendMail::enviar(MAIL_NAME, MAIL_CONTACTMAIL, $assunto, $mensagemFull, $nome, $email);
        }
        catch(Exception $e) {
            $_SESSION['mensagem'] = [
                'tipo' => 'warning',
                'texto' => $e->getMessage()
            ];
            $this->faleConosco();
            exit;
        }
        redireciona('/fale-conosco', 'success', 'Mensagem enviada com sucesso');
    }

    private function formFaleConosco()
    {
        $dados = [
            'btn-label'=>'Enviar Mensagem',
            'btn-class'=>'btn btn-warning w-50',
            'fields'=>[
                ['type'=>'text', 'name'=>'nome', 'label'=>'Nome completo', 'required'=>true],
                ['type'=>'email', 'name'=>'email', 'label'=>'E-mail', 'required'=>true],
                ['type'=>'textarea', 'name'=>'mensagem', 'label'=>'Mensagem', 'rows'=>5,'required'=>true],
            ]
        
        ];
        return Render::block('form', $dados);
    }
}