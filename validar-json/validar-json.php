<?php

/*
	Validados de dados JSON
*/

public  function json_validate($string)
{
    // Decodifica o json
    $result = json_decode($string);

    // Checa os erros
    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            $error = ''; //Sem erros
            break;
        case JSON_ERROR_DEPTH:
            $error = 'A profundidade máxima da pilha foi excedida.';
            break;
        case JSON_ERROR_STATE_MISMATCH:
            $error = 'JSON inválido ou mal formado.';
            break;
        case JSON_ERROR_CTRL_CHAR:
            $error = 'Erro de caracter de controle, possivelmente codificado incorretamente.';
            break;
        case JSON_ERROR_SYNTAX:
            $error = 'Erro de sintax.';
            break;
        // PHP >= 5.3.3
        case JSON_ERROR_UTF8:
            $error = 'Erro UTF-8, possível codificação incorreta.';
            break;
        // PHP >= 5.5.0
        case JSON_ERROR_RECURSION:
            $error = 'Uma ou mais referências recursivas no valor a ser codificado.';
            break;
        // PHP >= 5.5.0
        case JSON_ERROR_INF_OR_NAN:
            $error = 'm ou mais valores NAN ou INF no valor a ser codificado.';
            break;
        case JSON_ERROR_UNSUPPORTED_TYPE:
            $error = 'Um valor de um tipo que não pode ser codificado foi fornecido.';
            break;
        default:
            $error = 'Erro desconhecido.';
            break;
    }

    if ($error !== '') {        
        exit($error);
    }

    
    return $result;
}


$json = '[{"id":26},{"id":24},{"id":19}]';

print_r(json_validate($json));