<?php

/************************************
 * INTERFACE DE CONEXÃO
 ************************************/

interface IConnectInfo {
    
    # Dados necessários para conexão ao banco de dados
    const HOST      = "localhost";
    const PORT      = "3306";
    const DBNAME    = "projentointer";
    const USERNAME  = "root";
    const PASSWORD  = "12345678";
    
    # Método de conexão
    public static function doConnect();
        # Está sendo implementado em "UniversalConnect"
}