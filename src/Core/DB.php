<?php

namespace Petshop\Core\;

class DB
{
    /**
     *  Váriavel estática que armazenará a conexão ao banco de dados 
     * num objeto PDO
     * 
     * @var \PDO
     * 
     */

    private static $db;
    
    /**
     * Retorna uma instância ao banco de dados
     * reusa se já houver uma estabelecida
     *
     * @return \PDO
     */
    public static function getInstance() : \PDO
    {
        if ( is_null(self::$db) ) {
            try {
            $dsn = sprintf('mysql:dbname=%s;host=%s', DB_SCHEMA, DB_HOST);
            self::$db =  new \PDO($dsn , DB_USER, DB_PASSWORD);
        } catch(\PDOException $e) {
            error_log($e->getMessage() );
            throw new Exception('Falha ao realizar a conexão com o servidor, 
            Tente mais tarde');
           }
        }
        return self::$db;

        /**
         * Método estático que retorna o resultado de uma consulta SQL
         * preparada ou não. Retorna um vetor com dados (PDO::FETCH_ASSOC)
         * @param string $sql Consulta preparada com ou sem parâmetros 
         * @param array $params Parâmetros opcionais
         * @return array
         */
    }
    public static function select(string $sql, array $params=[]) : array
    {
        try {
            $st = self::getInstance()->prepare($sql);
            if (!$st) {
                error_log('Erro ao preparar a consulta: ' . $sql);
                throw new Exception('Falha ao preparar comando SQL');
            }
            $params = array_values($params);
            if ( !$st->execute($params) ) {
                error_log('Erro ao executar o comando SQL: ' . $sql . ' - ' . 
            var_export($params, true) );
                throw new Exception('Falha ao executar o comando SQL');
            }
            return $st->fetchAll(\PDO::FETCH_ASSOC);
        } catch(\PDOException $e) {
            error_log('Erro do PDO: '. $e->getMessage() . ' - Linha: ' . $e->getLine());
            throw new Exeception('Erro ao realizar consulta no banco de dados');
        }
        return [];
    } 

    /**
     * Método estático que retorna um Statement de uma execução SQL 
     * no banco de dados   
     *
     * @param string $sql Comando SQL (insert/update/delete) preparado
     * @param array $params Parâmetros/valores referentes à consulta 
     * @return \PDOStatement
     */
    public static function query(string $sql, array $params=[]) : \PDOStatement
    {
        try {
            $st = self::getInstance()->prepare($sql);
            if (!$st) {
                error_log('Erro ao preparar a consulta: ' . $sql);
                throw new Exception('Falha ao preparar comando SQL');
            }

            $params = array_values($params);
            if ( !$st->execute($params) ) {
                error_log('Erro ao executar o comando SQL: ' . $sql . ' - ' . 
            var_export($params, true) );
                throw new Exception('Falha ao executar o comando SQL');
            }
            return $st;
        } catch(\PDOException $e) {
            error_log('Erro do PDO: '. $e->getMessage() . ' - Linha: ' . $e->getLine());
            throw new Exeception('Erro ao executar comandos no banco de dados');
        }
    } 
}
