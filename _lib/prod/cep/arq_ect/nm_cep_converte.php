<?php
/**
 * $Id: nm_cep_converte.php,v 1.2 2011-06-27 17:42:03 vinicius Exp $
 */
    session_start();
/*
    Converte arquivos formato do Correio para formato Netmake
*/
    $controle = array();
    $controle[0] = "localidades";
    $controle[1] = "grandes";
    $controle[2] = "ac";
    $controle[3] = "al";
    $controle[4] = "am";
    $controle[5] = "ap";
    $controle[6] = "ba";
    $controle[7] = "ce";
    $controle[8] = "df";
    $controle[9] = "es";
    $controle[10] = "go";
    $controle[11] = "ma";
    $controle[12] = "mg";
    $controle[13] = "ms";
    $controle[14] = "mt";
    $controle[15] = "pa";
    $controle[16] = "pb";
    $controle[17] = "pe";
    $controle[18] = "pi";
    $controle[19] = "pr";
    $controle[20] = "rj";
    $controle[21] = "rn";
    $controle[22] = "ro";
    $controle[23] = "rr";
    $controle[24] = "rs";
    $controle[25] = "sc";
    $controle[26] = "se";
    $controle[27] = "sp";
    $controle[28] = "to";

    $tot_arq = count($controle);
    if (!isset($_SESSION["nm_cep_converte"]))
    {
        $nm_contr_conv_cep = 0;
        $nm_log_conv = "";
    }
    else
    {
        echo $nm_log_conv;
        flush();
    }
    if (!isset($_SESSION["nm_contr_conv_cep"]))
    {
        $_SESSION["nm_contr_conv_cep"] = '' ;
    }
    if (!isset($_SESSION["nm_log_conv"]))
    {
        $_SESSION["nm_log_conv"] = '' ;
    }

    $tmp_pos = strpos($PHP_SELF,"nm_cep_converte") ;
    $dir_raiz = substr($PHP_SELF, 1, $tmp_pos - 2) ;
    $nm_location  = "http://" .  $HTTP_HOST . "/" . $dir_raiz . "/nm_cep_conv_arq.php";


    if ($nm_contr_conv_cep < $tot_arq)
    {
           $parm = $controle[$nm_contr_conv_cep];
           $nm_contr_conv_cep++;
           Converter($nm_location . "?cep_conv=" . $parm);
           exit;
    }
    echo "<br>Final da Conversao";
    unset($_SESSION["nm_cep_converte"]);
    unset($_SESSION["nm_contr_conv_cep"]);
    unset($_SESSION["nm_log_conv"]);
    exit;

  function Converter($parametros)
  {
?>
   <HTML>
   <BODY>
    <SCRIPT language="javascript">
       window.location = "<?php  echo $parametros; ?>";
    </SCRIPT>
   </BODY>
   </HTML>
<?php
}
?>
