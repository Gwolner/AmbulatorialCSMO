<?php
/**
 * $Id: nm_cep_conv_arq.php,v 1.2 2011-06-27 17:42:03 vinicius Exp $
 */
    session_start();
//---  Conversão dos arquivos do correio
//
    set_time_limit(90);
    unset($_SESSION["nm_cep_converte"]);
    if (isset($HTTP_SERVER_VARS["PATH_TRANSLATED"]))
    {
        $tmp_dir = $HTTP_SERVER_VARS["PATH_TRANSLATED"];
    }
    else
    {
        $tmp_dir = $HTTP_SERVER_VARS["SCRIPT_FILENAME"];
    }
    $cep_path = str_replace("\\", "/", $tmp_dir);
    $cep_path = str_replace("//", "/", $cep_path);
    $cep_path = substr($cep_path, 0, strrpos($cep_path, "/"));

    $tmp_pos = strpos($PHP_SELF,"nm_cep_conv_arq") ;
    $dir_raiz = substr($PHP_SELF, 1, $tmp_pos - 2) ;
    $nm_location  = "http://" .  $HTTP_HOST . "/" . $dir_raiz . "/nm_cep_converte.php";

    if (!isset($cep_conv) || empty($cep_conv))
    {
        echo "faltou definir o arquivo a ser convertido !!";
        exit;
    }
    if ($cep_conv == "localidades")
    {
        nm_log("Localidades");
        conv_localidades();
    }
    else
    if ($cep_conv == "grandes")
    {
        nm_log("Grandes Clientes");
        conv_especiais();
    }
    else
    {
        nm_log("Logradouros estado = " . strtoupper($cep_conv));
        conv_logradouros();
    }
    $nm_log_conv .= " ok";
    $_SESSION["nm_cep_converte"] = 1;


//--- Localidades e faixas de CEP das localidades e dos estados
function conv_localidades()
{
    global $cep_path;
    $dados = array();
    $estado = "";
    $arq_locs  = file($cep_path . "/arq_ect/DNE_GU_LOCALIDADES.TXT");
    foreach ($arq_locs as $cada_loc)
    {
          if (substr($cada_loc, 0, 1) == "D")
          {
             $cada_loc = str_replace("'", " ", $cada_loc);
             $dados[0] = substr($cada_loc, 3, 2);          // UF
             $dados[1] = trim(substr($cada_loc, 19, 72));  // Cidade
             $dados[2] = trim(substr($cada_loc, 91, 8));   // CEP
             $dados[3] = substr($cada_loc, 135, 1);        // Tipo
             $dados_saida = implode("@nm@", $dados);
             if ($dados[0] != $estado)
             {
                 if (!empty($estado))
                 {
                     fclose($arq_saida);
                 }
                 $estado    = $dados[0];
                 $arq_saida = fopen ($cep_path . "/arquivos/cep_localidades_" . strtolower($estado) . ".txt", 'w');
             }
             fwrite($arq_saida, $dados_saida . "@nm@\r\n") ;
          }
    }
    fclose($arq_saida);

//--- Faixas de CEP dos Estados
    $dados = array();
    $arq_faixas  = file($cep_path . "/arq_ect/DNE_GU_FAIXAS_CEP_UF.TXT");
    $arq_saida = fopen ($cep_path . "/arquivos/cep_faixas_estados.txt", 'w');
    foreach ($arq_faixas as $cada_fx)
    {
          if (substr($cada_fx, 0, 1) == "D")
          {
             $cada_fx = str_replace("'", " ", $cada_fx);
             $dados[0] = substr($cada_fx, 3, 2);          // UF
             $dados[1] = substr($cada_fx, 87, 8);         // CEP inicial
             $dados[2] = substr($cada_fx, 96, 8);         // CEP final
             $dados_saida = implode("@nm@", $dados);
             fwrite($arq_saida, $dados_saida . "@nm@\r\n");
             if (substr($cada_fx, 105, 2) == "02")
             {
                 $dados[1] = substr($cada_fx, 108, 8);    // CEP inicial
                 $dados[2] = substr($cada_fx, 117, 8);    // CEP final
                 $dados_saida = implode("@nm@", $dados);
                 fwrite($arq_saida, $dados_saida . "@nm@\r\n");
             }
          }
    }
    fclose($arq_saida);

//--- Faixas de CEP das Localidades
    $dados = array();
    $arq_faixas  = file($cep_path . "/arq_ect/DNE_GU_FAIXAS_CEP_LOCALIDADE.TXT");
    $arq_saida = fopen ($cep_path . "/arquivos/cep_faixas_localidades.txt", 'w');
    foreach ($arq_faixas as $cada_fx)
    {
          if (substr($cada_fx, 0, 1) == "D")
          {
             $cada_fx = str_replace("'", " ", $cada_fx);
             $dados[0] = substr($cada_fx, 1, 2);          // UF
             $dados[1] = trim(substr($cada_fx, 21, 72));  // Cidade
             $dados[2] = substr($cada_fx, 99, 8);         // CEP inicial
             $dados[3] = substr($cada_fx, 108, 8);        // CEP final
             $dados_saida = implode("@nm@", $dados);
             fwrite($arq_saida, $dados_saida . "@nm@\r\n");
             if (substr($cada_fx, 117, 2) == "02")
             {
                 $dados[2] = substr($cada_fx, 120, 8);    // CEP inicial
                 $dados[3] = substr($cada_fx, 129, 8);    // CEP final
                 $dados_saida = implode("@nm@", $dados);
                 fwrite($arq_saida, $dados_saida . "@nm@\r\n");
             }
          }
    }
    fclose($arq_saida);

}
//
//--- Logradouros
function conv_logradouros()
{
    global $cep_path, $cep_conv;
    $estado = strtoupper($cep_conv);
    $dados   = array();
    $pointer = 0;
    $cidade_nome  = "";
    $cidade_point = 0;
    $arq_logr  = fopen ($cep_path . "/arq_ect/DNE_GU_" . $estado . "_LOGRADOUROS.TXT", 'r');
    $arq_saida = fopen ($cep_path . "/arquivos/cep_logradouros_" . $cep_conv . ".txt", 'w');
    $arq_point = fopen ($cep_path . "/arquivos/cep_pointer_log_" . $cep_conv . ".txt", 'w');

    while (!feof ($arq_logr))
    {
          $cada_loc = fgets($arq_logr, 1024);
          $tipo_reg = substr($cada_loc, 0, 1);
          if ($tipo_reg == "D" || $tipo_reg == "S" || $tipo_reg == "N" || $tipo_reg == "K" || $tipo_reg == "Q")
          {
             $cada_loc = str_replace("'", " ", $cada_loc);
             $dados[0] = substr($cada_loc, 1, 2);          // UF
             $dados[1] = trim(substr($cada_loc, 288, 72)); // Titulo da rua
             $dados[2] = trim(substr($cada_loc, 374, 72)); // Nome
             $dados[3] = trim(substr($cada_loc, 518, 8));  // CEP
             $dados[4] = trim(substr($cada_loc, 17, 72));  // Cidade
             if (empty($cidade_nome))
             {
                 $cidade_nome = $dados[4];
             }
             $dados[5] = trim(substr($cada_loc, 102, 72)); // Bairro
             $dados[6] = trim(substr($cada_loc, 259, 26)); // Tipoext
             $compl = "";
             if ($tipo_reg == "S")
             {
                 $compl  = (trim(substr($cada_loc, 527, 11))) . " ";
                 $compl .= (trim(substr($cada_loc, 538, 11))) . " ";
                 if (substr($cada_loc, 549, 1) == "I")
                 {
                     $compl .= "LADO IMPAR";
                 }
                 if (substr($cada_loc, 549, 1) == "P")
                 {
                     $compl .= "LADO PAR";
                 }
                 if (substr($cada_loc, 549, 1) == "A")
                 {
                     $compl .= "AO FIM";
                 }
             }
             if ($tipo_reg == "N")
             {
                 $compl  = (trim(substr($cada_loc, 527, 11)));
             }
             if ($tipo_reg == "K")
             {
                 $compl  = (trim(substr($cada_loc, 527, 11))) . " ";
                 $compl .= (trim(substr($cada_loc, 538, 36))) . " ";
                 $compl .= (trim(substr($cada_loc, 574, 11)));
             }
             if ($tipo_reg == "Q")
             {
                 $compl  = (trim(substr($cada_loc, 527, 11))) . " ";
                 $compl .= (trim(substr($cada_loc, 538, 36))) . " ";
                 $compl .= (trim(substr($cada_loc, 574, 11))) . " ";
                 $compl .= (trim(substr($cada_loc, 585, 11))) . " ";
                 $compl .= (trim(substr($cada_loc, 596, 11)));
             }
             $dados[7] = trim($compl);    // Compl
             $dados_saida = implode("@nm@", $dados);
             $dados_saida .= "@nm@\r\n";
             fwrite($arq_saida, $dados_saida) ;
//
             if ($cidade_nome != $dados[4])
             {
                 fwrite($arq_point, $cidade_nome . "@nm@" . $cidade_point . "@nm@\r\n") ;
                 $cidade_nome = $dados[4];
                 $cidade_point = $pointer;
             }
          }
          $pointer += strlen($dados_saida);
    }
// reg=S  527, 11 inicio 538,11 fim    549, 1 indic. Par, Impar, Ambos
// reg=N  527,11 num lote
// reg=K  527,11 num lote 538,36 compl 574,11 num ou letra do compl
// reg=Q  527,11 num lote 538,36 compl 574,11 num ou letra do compl 585,11 compl 2 596,11 num ou letra do compl 2
    fwrite($arq_point, $cidade_nome . "@nm@" . $cidade_point . "@nm@\r\n") ;
    fclose($arq_logr);
    fclose($arq_saida);
    fclose($arq_point);
}
//
//--- Especiais
function conv_especiais()
{
    global $cep_path;
    $dados  = array();
    $estado = "";
    $arq_esp   = fopen ($cep_path . "/arq_ect/DNE_GU_GRANDES_USUARIOS.TXT", 'r');

    while (!feof ($arq_esp))
    {
          $cada_loc = fgets($arq_esp, 1024);
          $tipo_reg = substr($cada_loc, 0, 1);
          $cada_loc = str_replace("'", " ", $cada_loc);
          if ($tipo_reg == "D")
          {
             $dados[0] = trim(substr($cada_loc, 188, 72)); // Nome
             $dados[1] = trim(substr($cada_loc, 260, 8));  // CEP
             $dados[2] = substr($cada_loc, 1, 2);          // UF
             $dados[4] = trim(substr($cada_loc, 17, 72));  // CIDADE
             $dados[5] = trim(substr($cada_loc, 102, 72)); // Bairro
          }
          if ($tipo_reg == "E")
          {
             $dados[6] = trim(substr($cada_loc, 15, 72)) . " "; // tipo da rua
             $dados[7] = trim(substr($cada_loc, 176, 72));  // RUA
             $dados[3] = trim(substr($cada_loc, 248, 11));  // numero
             $dados[8] = trim(substr($cada_loc, 90, 72));   // Titulo da rua
             ksort($dados);
             $dados_saida = implode("@nm@", $dados);
             if ($dados[2] != $estado)
             {
                 if (!empty($estado))
                 {
                     fclose($arq_saida);
                 }
                 $estado    = $dados[2];
                 $arq_saida = fopen ($cep_path . "/arquivos/cep_grandes_usuarios_" . strtolower($estado) . ".txt", 'w');
             }
             fwrite($arq_saida, $dados_saida . "@nm@\r\n") ;
          }
    }
    fclose($arq_esp);
    fclose($arq_saida);
}

function nm_log($tipo)
{
    global $nm_log_conv;
    $nm_log_conv .= "<br>Convertendo " . $tipo . "....";
    echo $nm_log_conv;
    flush();
}
?>
   <HTML>
   <BODY>
    <SCRIPT language="javascript">
       window.location = "<?php  echo $nm_location; ?>";
    </SCRIPT>
   </BODY>
   </HTML>
