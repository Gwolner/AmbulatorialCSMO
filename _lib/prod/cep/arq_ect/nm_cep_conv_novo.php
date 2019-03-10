<?php
    session_start();

//---  Conversão dos arquivos do correio
//
    set_time_limit(0);
    include_once("../../third/adodb/adodb.inc.php");

    $root = "D:/wwwroot/desenv/scriptcase8/prod/cep/arquivos";
    $base = "D:/wwwroot/desenv/scriptcase8/prod/cep/arq_ect/basemdb.mdb";

    ADOLoadCode('access');
    $Db = ADONewConnection('access');
    $myDSN = $base;
    $Db->Connect($myDSN, "", "", "");
    if (FALSE !== $Db->_connectionID)
    {  }
    else
    {
        die("Erro ao estabelecer uma conexão com o banco de dados = " . $Db->ErrorMsg());
        exit;
    }
	
    echo "** Convertendo Localidades **";flush();
    conv_localidades();

    echo "<br>** Convertendo Faixas de CEP dos Estados **";flush();
    conv_fx_estados();

    echo "<br>** Convertendo Faixas de CEP das Localidades **";flush();
    conv_fx_localidades();

    echo "<br>** Convertendo Grandes Usuários **";flush();
    conv_especiais();

    echo "<br>** Convertendo Logradouros **";flush();
    conv_logradouros();

    $Db->Close();
    echo "<br>** Conversão Concluida com Sucesso **";
    exit;


//--- Localidades e faixas de CEP das localidades e dos estados
function conv_localidades()
{
    global $root, $Db;

    $dados = array();
    $estado = "";
    $comando = "SELECT UFE_SG, LOC_NOSUB, CEP, LOC_IN_TIPO_LOCALIDADE FROM LOG_LOCALIDADE order by UFE_SG, LOC_NO";
    $rs_local = $Db->Execute($comando);
    if ($rs_local === false && !$rs_local->EOF)
    {
        echo "<br>*** Erro ao acessar tabela de localidades: " . $Db->ErrorMsg();
        exit ;
    }
    $arr_ceps = array();
    while (!$rs_local->EOF)
    {
        $dados[0] = trim($rs_local->fields[0]);   // UF
        $dados[1] = trim($rs_local->fields[1]);   // Cidade
        $dados[2] = trim($rs_local->fields[2]);   // CEP
        if(isset($arr_ceps[$dados[2]]))
        {
        	$dados[2] = "";
        }
        $dados[3] = trim($rs_local->fields[3]);   // Tipo
        $dados_saida = implode("@nm@", $dados);
        if ($dados[0] != $estado)
        {
            if (!empty($estado))
            {
                fclose($arq_saida);
            }
            $estado    = $dados[0];
            $arq_saida = fopen ($root . "/cep_localidades_" . strtolower($estado) . ".txt", 'w');
        }
        fwrite($arq_saida, $dados_saida . "@nm@\r\n") ;
        $arr_ceps[$dados[2]] = "";
        $rs_local->MoveNext();
    }
    fclose($arq_saida);
    $rs_local->Close();
}
//--- Faixas de CEP dos Estados
function conv_fx_estados()
{
    global $root, $Db;

    $dados = array();
    $arq_saida = fopen ($root . "/cep_faixas_estados.txt", 'w');

    $comando = "SELECT UFE_SG, UFE_RAD1_INI, UFE_SUF1_INI, UFE_RAD1_FIM, UFE_SUF1_FIM, UFE_RAD2_INI, UFE_SUF2_INI, UFE_RAD2_FIM, UFE_SUF2_FIM FROM LOG_FAIXA_UF order by UFE_SG";
    $rs_fx_est = $Db->Execute($comando);
    if ($rs_fx_est === false && !$rs_fx_est->EOF)
    {
        echo "<br>*** Erro ao acessar tabela de Faixas dos Estados: " . $Db->ErrorMsg();
        exit ;
    }
    while (!$rs_fx_est->EOF)
    {
        $dados[0] = trim($rs_fx_est->fields[0]);                                       // UF
        $dados[1] = trim($rs_fx_est->fields[1]) . trim($rs_fx_est->fields[2]);         // CEP inicial
        $dados[2] = trim($rs_fx_est->fields[3]) . trim($rs_fx_est->fields[4]);         // CEP final
        $dados_saida = implode("@nm@", $dados);
        fwrite($arq_saida, $dados_saida . "@nm@\r\n");
        if (!empty($rs_fx_est->fields[5]))
        {
            $dados[1] = trim($rs_fx_est->fields[5]) . trim($rs_fx_est->fields[6]);    // CEP inicial
            $dados[2] = trim($rs_fx_est->fields[7]) . trim($rs_fx_est->fields[8]);    // CEP final
            $dados_saida = implode("@nm@", $dados);
            fwrite($arq_saida, $dados_saida . "@nm@\r\n");
        }
        $rs_fx_est->MoveNext();
    }
    fclose($arq_saida);
    $rs_fx_est->Close();
}

//--- Faixas de CEP das Localidades
function conv_fx_localidades()
{
    global $root, $Db;

    $dados = array();
    $arq_saida = fopen ($root . "/cep_faixas_localidades.txt", 'w');
    $comando = "SELECT LOG_LOCALIDADE.UFE_SG, LOG_LOCALIDADE.LOC_NOSUB, LOG_FAIXA_LOCALIDADE.LOC_RAD1_INI, LOG_FAIXA_LOCALIDADE.LOC_SUF1_INI,
         LOG_FAIXA_LOCALIDADE.LOC_RAD1_FIM, LOG_FAIXA_LOCALIDADE.LOC_SUF1_FIM, LOG_FAIXA_LOCALIDADE.LOC_RAD2_INI, LOG_FAIXA_LOCALIDADE.LOC_SUF2_INI,
         LOG_FAIXA_LOCALIDADE.LOC_RAD2_FIM, LOG_FAIXA_LOCALIDADE.LOC_SUF2_FIM
         FROM  LOG_LOCALIDADE INNER JOIN LOG_FAIXA_LOCALIDADE ON LOG_LOCALIDADE.LOC_NU_SEQUENCIAL = LOG_FAIXA_LOCALIDADE.LOC_NU_SEQUENCIAL
         order by LOG_LOCALIDADE.UFE_SG, LOG_LOCALIDADE.LOC_NOSUB";
    $rs_fx_loc = $Db->Execute($comando);
    if ($rs_fx_loc === false && !$rs_fx_loc->EOF)
    {
        echo "<br>*** Erro ao acessar tabela de Faixas das localidades: " . $Db->ErrorMsg();
        exit ;
    }
    while (!$rs_fx_loc->EOF)
    {
        $dados[0] = trim($rs_fx_loc->fields[0]);                                // UF
        $dados[1] = trim($rs_fx_loc->fields[1]);                                // Cidade
        $dados[2] = trim($rs_fx_loc->fields[2]) . trim($rs_fx_loc->fields[3]);  // CEP inicial
        $dados[3] = trim($rs_fx_loc->fields[4]) . trim($rs_fx_loc->fields[5]);  // CEP final
        $dados_saida = implode("@nm@", $dados);
        fwrite($arq_saida, $dados_saida . "@nm@\r\n");
        if (!empty($rs_fx_loc->fields[6]))
        {
            $dados[2] = trim($rs_fx_loc->fields[6]) . trim($rs_fx_loc->fields[7]);  // CEP inicial
            $dados[3] = trim($rs_fx_loc->fields[8]) . trim($rs_fx_loc->fields[9]);  // CEP final
            $dados_saida = implode("@nm@", $dados);
            fwrite($arq_saida, $dados_saida . "@nm@\r\n");
        }
        $rs_fx_loc->MoveNext();
    }
    fclose($arq_saida);
    $rs_fx_loc->Close();
}

//--- Logradouros
function conv_logradouros()
{
    global $root, $Db;

    $estado = "";
    $cidade_nome  = "";
    $dados   = array();
    $pointer = 0;
    $cidade_point = 0;

    $comando = "SELECT LOG_LOGRADOURO.UFE_SG, LOG_LOGRADOURO.CEP, LOG_LOGRADOURO.LOG_NO, LOG_LOGRADOURO.LOG_TIPO_LOGRADOURO,
        LOG_LOGRADOURO.LOG_COMPLEMENTO, LOG_BAIRRO.BAI_NO, LOG_LOCALIDADE.LOC_NO
      FROM LOG_LOGRADOURO, LOG_BAIRRO, LOG_LOCALIDADE
      WHERE
         LOG_LOGRADOURO.LOC_NU_SEQUENCIAL = LOG_LOCALIDADE.LOC_NU_SEQUENCIAL AND
         LOG_LOGRADOURO.BAI_NU_SEQUENCIAL_INI = LOG_BAIRRO.BAI_NU_SEQUENCIAL
      ORDER BY
         LOG_LOGRADOURO.UFE_SG, LOG_LOCALIDADE.LOC_NO, LOG_LOGRADOURO.LOG_NO";
    $rs_logr = $Db->Execute($comando);
    if ($rs_logr === false && !$rs_logr->EOF)
    {
        echo "<br>*** Erro ao acessar tabela de Logradouros: " . $Db->ErrorMsg();
        exit ;
    }
    while (!$rs_logr->EOF)
    {
        $dados[0] = trim($rs_logr->fields[0]);  // UF
        $dados[1] = "";                         // Titulo da rua
        $dados[2] = trim($rs_logr->fields[2]);  // Nome
        $dados[3] = trim($rs_logr->fields[1]);  // CEP
        $dados[4] = trim($rs_logr->fields[6]);  // Cidade
        $dados[5] = trim($rs_logr->fields[5]);  // Bairro
        $espaco  = " ";
        $tipo    = trim($rs_logr->fields[3]);
        $limpa_tipo = false;
        if ($dados[0] == "DF")
        {
            if ($tipo == "Quadra" || $tipo == "Setor" || $tipo == "Bloco" || $tipo == "Entre Quadra" || $tipo == "Trecho")
            {
               $limpa_tipo = true;
            }
            if (substr($tipo, 0, 4) == "Área" && (strpos($dados[2], "Área") !== false || substr($dados[2], 0, 1) == "A"))
            {
               $limpa_tipo = true;
            }
            if ($tipo == "Avenida" && strpos($dados[2], "Avenida") !== false)
            {
               $limpa_tipo = true;
            }
            if ($tipo == "Conjunto" && strpos($dados[2], "Conjunto") !== false)
            {
               $limpa_tipo = true;
            }
        }
        if (trim($rs_logr->fields[0]) == "GO" && ($tipo == "Quadra" || $tipo == "Bloco"))
        {
           $limpa_tipo = true;
        }
        if (trim($rs_logr->fields[0]) == "TO" && $tipo == "Quadra")
        {
           $limpa_tipo = true;
        }
        if (trim($rs_logr->fields[0]) == "RS" && $tipo == "Quadra")
        {
           $limpa_tipo = true;
        }
        if ($limpa_tipo)
        {
            $espaco  = "";
            $rs_logr->fields[3] = "";
        }
        $dados[6] = trim($rs_logr->fields[3]) . $espaco;  // Tipoext
        $dados[7] = trim($rs_logr->fields[4]);  // Compl
        if (substr($dados[7], 0, 2) == "- ")
        {
            $dados[7] = substr($dados[7], 2);
        }
        $dados_saida = implode("@nm@", $dados);
        $dados_saida .= "@nm@\r\n";
        if ($estado != $dados[0])
        {
            if (!empty($estado))
            {
                fwrite($arq_point, $cidade_nome . "@nm@" . $cidade_point . "@nm@\r\n") ;
                fclose($arq_point);
                fclose($arq_saida);
            }
            $pointer = 0;
            $cidade_point = 0;
            $estado = $dados[0];
            $cidade_nome = $dados[4];
            $arq_saida = fopen ($root . "/cep_logradouros_" . strtolower($estado) . ".txt", 'w');
            $arq_point = fopen ($root . "/cep_pointer_log_" . strtolower($estado) . ".txt", 'w');
            echo "<br>   >> Convertendo Estado: " . $estado;flush();
        }
        fwrite($arq_saida, $dados_saida) ;
        if ($cidade_nome != $dados[4])
        {
            fwrite($arq_point, $cidade_nome . "@nm@" . $cidade_point . "@nm@\r\n") ;
            $cidade_nome = $dados[4];
            $cidade_point = $pointer;
        }
        $pointer += strlen($dados_saida);
        $rs_logr->MoveNext();
    }
    fwrite($arq_point, $cidade_nome . "@nm@" . $cidade_point . "@nm@\r\n") ;
    fclose($arq_saida);
    fclose($arq_point);
    $rs_logr->Close();
}

//--- Especiais
function conv_especiais()
{
    global $root, $Db;

    $dados  = array();
    $estado = "";

    $comando = "SELECT LOG_GRANDE_USUARIO.GRU_NO, LOG_GRANDE_USUARIO.CEP, LOG_GRANDE_USUARIO.GRU_ENDERECO, LOG_LOGRADOURO.LOG_NO,
         LOG_LOGRADOURO.LOG_TIPO_LOGRADOURO, LOG_BAIRRO.BAI_NO, LOG_LOCALIDADE.LOC_NOSUB, LOG_LOCALIDADE.UFE_SG
      FROM  LOG_GRANDE_USUARIO, LOG_LOGRADOURO, LOG_BAIRRO, LOG_LOCALIDADE
      WHERE
        LOG_GRANDE_USUARIO.LOG_NU_SEQUENCIAL = LOG_LOGRADOURO.LOG_NU_SEQUENCIAL AND
        LOG_GRANDE_USUARIO.BAI_NU_SEQUENCIAL = LOG_BAIRRO.BAI_NU_SEQUENCIAL     AND
        LOG_GRANDE_USUARIO.LOC_NU_SEQUENCIAL = LOG_LOCALIDADE.LOC_NU_SEQUENCIAL
      order by LOG_LOCALIDADE.UFE_SG, LOG_GRANDE_USUARIO.GRU_NO";
    $rs_especial = $Db->Execute($comando);
    if ($rs_especial === false && !$rs_especial->EOF)
    {
        echo "<br>*** Erro ao acessar tabela de Especiais: " . $Db->ErrorMsg();
        exit ;
    }
    while (!$rs_especial->EOF)
    {
        $num  = "";
        $espaco = " ";
        $temp = trim($rs_especial->fields[2]);
        $pos  = strrpos($temp, ",");
        if ($pos !== false)
        {
            $num = substr($temp, $pos + 1);
        }

        /* rotina especial para DF  e TO */
        if (trim($rs_especial->fields[7]) == "DF" || (trim($rs_especial->fields[7]) == "TO" && trim($rs_especial->fields[4]) == "Quadra"))
        {
            $num  = "";
            $espaco  = "";
            $rs_especial->fields[4] = "";
            $rs_especial->fields[3] = $rs_especial->fields[2];
        }
        $dados[0] = trim($rs_especial->fields[0]);       // Nome
        $dados[1] = trim($rs_especial->fields[1]);       // CEP
        $dados[2] = trim($rs_especial->fields[7]);       // UF
        $dados[3] = trim($num);                          // numero
        $dados[4] = trim($rs_especial->fields[6]);       // CIDADE
        $dados[5] = trim($rs_especial->fields[5]);       // Bairro
        $dados[6] = trim($rs_especial->fields[4]) . $espaco; // tipo da rua
        $dados[7] = trim($rs_especial->fields[3]);       // RUA
        $dados[8] = "";                                  // Titulo da rua
        $dados_saida = implode("@nm@", $dados);
        if ($dados[2] != $estado)
        {
            if (!empty($estado))
            {
                fclose($arq_saida);
            }
            $estado    = $dados[2];
            $arq_saida = fopen ($root . "/cep_grandes_usuarios_" . strtolower($estado) . ".txt", 'w');
        }
        fwrite($arq_saida, $dados_saida . "@nm@\r\n") ;
        $rs_especial->MoveNext();
    }
    fclose($arq_saida);
    $rs_especial->Close();
}

?>