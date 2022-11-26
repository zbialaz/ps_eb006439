 <?php 

 namespace Petshop\View;

use Exception;

 class Render
 {
    /**
     * Método que carrega uma página com a estrutura FrontEnd,
     * recebe dois parâmetros:
     *
     * @param string $pagina Nome do arquivo a ser impresso
     * @param array  $dados Dados a serem inseridos na página
     * @return void
     */
    static public function front(string $pagina, array $dados = [])
    {
        //monta o caminho local onde a página solicitada está
        $pathPagina = TFRONTEND . 'pages/' . $pagina . '.php';

        if ( !file_exists($pathPagina) ) {
            error_log('Página template não localizada em: '.$pathPagina);
            throw new Exception("A página solicitada '{$pagina}' não foi localizada");
        }

        if ( empty($dados['titulo']) ) {
        $dados['titulo'] = FRONTEND_TITLE;
        } else {
            $dados['titulo'] = $dados['titulo'] . ' - ' . FRONTEND_TITLE;
        }

        //transforma os índices de vetores em variáveis 
        extract($dados);
        
        require_once TFRONTEND . 'common/top.php';
        require_once $pathPagina;
        require_once TFRONTEND . 'common/botton.php';
    }

        /**
     * Método que retorna o conteúdo de um bloco (arquivo.php)
     *
     * @param string $bloco Nome do bloco a ser renderizado e retorna
     * @param array $dados Dados a serem inseridos na página
     * @return void
     */
    static public function block(string $bloco, array $dados = [])
    {
        //monta o caminho local onde o bloco solicitada está
        $pathArquivo = TFRONTEND . 'pages/' . $bloco . '.php';

        if ( !file_exists($pathArquivo) ) {
            error_log('Bloco não localizada em: '.$pathArquivo);
            throw new Exception("O bloco solicitada '{$pathArquivo}' não foi localizado");
        }

        //transforma os índices de vetores em variáveis 
        extract($dados);

        //iniciamos a captura do buffer para não printar ao usuário o
        //conteúdo do arquivo que será requerido
        ob_start();

        //carrega o conteúdo do arquivo em memória (estamos em OB_START)
        require_once $pathArquivo;

        //retorna o conteúdo em buffer e limpa a memória
        return ob_get_clean();
    }
 }