<?php

class pdfreport_licenca_tratamento_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function pdfreport_licenca_tratamento_xml()
   {
      $this->nm_data   = new nm_data("pt_br");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nm_data    = new nm_data("pt_br");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo     .= "_pdfreport_licenca_tratamento";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "pdfreport_licenca_tratamento.xml";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
      }
   }

   //----- 
   function grava_arquivo()
   {
      global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->id_paciente = $Busca_temp['id_paciente']; 
          $tmp_pos = strpos($this->id_paciente, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_paciente = substr($this->id_paciente, 0, $tmp_pos);
          }
          $this->id_paciente_2 = $Busca_temp['id_paciente_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT id_paciente from (SELECT      id_paciente FROM      paciente LIMIT 1) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_paciente from (SELECT      id_paciente FROM      paciente LIMIT 1) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT id_paciente from (SELECT      id_paciente FROM      paciente LIMIT 1) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT id_paciente from (SELECT      id_paciente FROM      paciente LIMIT 1) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT id_paciente from (SELECT      id_paciente FROM      paciente LIMIT 1) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT id_paciente from (SELECT      id_paciente FROM      paciente LIMIT 1) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $xml_charset = $_SESSION['scriptcase']['charset'];
      $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
      fwrite($xml_f, "<root>\r\n");
      if ($this->Grava_view)
      {
          $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
          $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
          fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
          fwrite($xml_v, "<root>\r\n");
      }
      while (!$rs->EOF)
      {
         $this->xml_registro = "<pdfreport_licenca_tratamento";
         $this->id_paciente = $rs->fields[0] ;  
         $this->id_paciente = (string)$this->id_paciente;
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['pdfreport_licenca_tratamento']['contr_erro'] = 'on';
if (!isset($_SESSION['global_cid'])) {$_SESSION['global_cid'] = "";}
if (!isset($this->sc_temp_global_cid)) {$this->sc_temp_global_cid = (isset($_SESSION['global_cid'])) ? $_SESSION['global_cid'] : "";}
if (!isset($_SESSION['global_data_hoje'])) {$_SESSION['global_data_hoje'] = "";}
if (!isset($this->sc_temp_global_data_hoje)) {$this->sc_temp_global_data_hoje = (isset($_SESSION['global_data_hoje'])) ? $_SESSION['global_data_hoje'] : "";}
if (!isset($_SESSION['global_numero_de_dias'])) {$_SESSION['global_numero_de_dias'] = "";}
if (!isset($this->sc_temp_global_numero_de_dias)) {$this->sc_temp_global_numero_de_dias = (isset($_SESSION['global_numero_de_dias'])) ? $_SESSION['global_numero_de_dias'] : "";}
if (!isset($_SESSION['global_data_final'])) {$_SESSION['global_data_final'] = "";}
if (!isset($this->sc_temp_global_data_final)) {$this->sc_temp_global_data_final = (isset($_SESSION['global_data_final'])) ? $_SESSION['global_data_final'] : "";}
if (!isset($_SESSION['global_data_inicial'])) {$_SESSION['global_data_inicial'] = "";}
if (!isset($this->sc_temp_global_data_inicial)) {$this->sc_temp_global_data_inicial = (isset($_SESSION['global_data_inicial'])) ? $_SESSION['global_data_inicial'] : "";}
if (!isset($_SESSION['global_siape'])) {$_SESSION['global_siape'] = "";}
if (!isset($this->sc_temp_global_siape)) {$this->sc_temp_global_siape = (isset($_SESSION['global_siape'])) ? $_SESSION['global_siape'] : "";}
if (!isset($_SESSION['global_orgao'])) {$_SESSION['global_orgao'] = "";}
if (!isset($this->sc_temp_global_orgao)) {$this->sc_temp_global_orgao = (isset($_SESSION['global_orgao'])) ? $_SESSION['global_orgao'] : "";}
if (!isset($_SESSION['global_cpf'])) {$_SESSION['global_cpf'] = "";}
if (!isset($this->sc_temp_global_cpf)) {$this->sc_temp_global_cpf = (isset($_SESSION['global_cpf'])) ? $_SESSION['global_cpf'] : "";}
if (!isset($_SESSION['global_nome_servidor'])) {$_SESSION['global_nome_servidor'] = "";}
if (!isset($this->sc_temp_global_nome_servidor)) {$this->sc_temp_global_nome_servidor = (isset($_SESSION['global_nome_servidor'])) ? $_SESSION['global_nome_servidor'] : "";}
 $this->nome  = $this->sc_temp_global_nome_servidor;
$this->cpf  = $this->sc_temp_global_cpf;
$this->orgao  = $this->sc_temp_global_orgao;
$this->siape  = $this->sc_temp_global_siape;
$this->data_inicial  = $this->sc_temp_global_data_inicial;
$this->data_final  = $this->sc_temp_global_data_final;
$this->numero_de_dias  = $this->sc_temp_global_numero_de_dias;
$data_auxiliar = $this->sc_temp_global_data_hoje;
$this->cid  = $this->sc_temp_global_cid;

$ano =  substr($data_auxiliar, 2, 2);
$mes = substr($data_auxiliar, 4, 2);
$dia = substr($data_auxiliar, 6, 2);

switch($mes){
	case 1: $mes = "Janeiro"; break;
	case 2: $mes = "Fevereiro"; break;
	case 3: $mes = "Março"; break;
	case 4: $mes = "Abril"; break;
	case 5: $mes = "Maio"; break;
	case 6: $mes = "Junho"; break;
	case 7: $mes = "Julho"; break;
	case 8: $mes = "Agosto"; break;
	case 9: $mes = "Setembro"; break;
	case 10: $mes = "Outubro"; break;
	case 11: $mes = "Novembro"; break;
	case 12: $mes = "Dezembro"; break;
};

$this->dia_hoje  = $dia;
$this->mes_hoje  = $mes;
$this->ano_hoje  = $ano;
if (isset($this->sc_temp_global_nome_servidor)) {$_SESSION['global_nome_servidor'] = $this->sc_temp_global_nome_servidor;}
if (isset($this->sc_temp_global_cpf)) {$_SESSION['global_cpf'] = $this->sc_temp_global_cpf;}
if (isset($this->sc_temp_global_orgao)) {$_SESSION['global_orgao'] = $this->sc_temp_global_orgao;}
if (isset($this->sc_temp_global_siape)) {$_SESSION['global_siape'] = $this->sc_temp_global_siape;}
if (isset($this->sc_temp_global_data_inicial)) {$_SESSION['global_data_inicial'] = $this->sc_temp_global_data_inicial;}
if (isset($this->sc_temp_global_data_final)) {$_SESSION['global_data_final'] = $this->sc_temp_global_data_final;}
if (isset($this->sc_temp_global_numero_de_dias)) {$_SESSION['global_numero_de_dias'] = $this->sc_temp_global_numero_de_dias;}
if (isset($this->sc_temp_global_data_hoje)) {$_SESSION['global_data_hoje'] = $this->sc_temp_global_data_hoje;}
if (isset($this->sc_temp_global_cid)) {$_SESSION['global_cid'] = $this->sc_temp_global_cid;}
$_SESSION['scriptcase']['pdfreport_licenca_tratamento']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->xml_registro .= " />\r\n";
         fwrite($xml_f, $this->xml_registro);
         if ($this->Grava_view)
         {
            fwrite($xml_v, $this->xml_registro);
         }
         $rs->MoveNext();
      }
      fwrite($xml_f, "</root>");
      fclose($xml_f);
      if ($this->Grava_view)
      {
         fwrite($xml_v, "</root>");
         fclose($xml_v);
      }

      $rs->Close();
   }
   //----- id_paciente
   function NM_export_id_paciente()
   {
         nmgp_Form_Num_Val($this->id_paciente, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->id_paciente))
         {
             $this->id_paciente = sc_convert_encoding($this->id_paciente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id_paciente =\"" . $this->trata_dados($this->id_paciente) . "\"";
   }
   //----- nome
   function NM_export_nome()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nome))
         {
             $this->nome = sc_convert_encoding($this->nome, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nome =\"" . $this->trata_dados($this->nome) . "\"";
   }
   //----- cpf
   function NM_export_cpf()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cpf))
         {
             $this->cpf = sc_convert_encoding($this->cpf, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cpf =\"" . $this->trata_dados($this->cpf) . "\"";
   }
   //----- orgao
   function NM_export_orgao()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->orgao))
         {
             $this->orgao = sc_convert_encoding($this->orgao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " orgao =\"" . $this->trata_dados($this->orgao) . "\"";
   }
   //----- siape
   function NM_export_siape()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->siape))
         {
             $this->siape = sc_convert_encoding($this->siape, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " siape =\"" . $this->trata_dados($this->siape) . "\"";
   }
   //----- data_inicial
   function NM_export_data_inicial()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->data_inicial))
         {
             $this->data_inicial = sc_convert_encoding($this->data_inicial, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " data_inicial =\"" . $this->trata_dados($this->data_inicial) . "\"";
   }
   //----- data_final
   function NM_export_data_final()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->data_final))
         {
             $this->data_final = sc_convert_encoding($this->data_final, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " data_final =\"" . $this->trata_dados($this->data_final) . "\"";
   }
   //----- numero_de_dias
   function NM_export_numero_de_dias()
   {
         nmgp_Form_Num_Val($this->numero_de_dias, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->numero_de_dias))
         {
             $this->numero_de_dias = sc_convert_encoding($this->numero_de_dias, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " numero_de_dias =\"" . $this->trata_dados($this->numero_de_dias) . "\"";
   }
   //----- dia_hoje
   function NM_export_dia_hoje()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->dia_hoje))
         {
             $this->dia_hoje = sc_convert_encoding($this->dia_hoje, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " dia_hoje =\"" . $this->trata_dados($this->dia_hoje) . "\"";
   }
   //----- mes_hoje
   function NM_export_mes_hoje()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->mes_hoje))
         {
             $this->mes_hoje = sc_convert_encoding($this->mes_hoje, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " mes_hoje =\"" . $this->trata_dados($this->mes_hoje) . "\"";
   }
   //----- ano_hoje
   function NM_export_ano_hoje()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ano_hoje))
         {
             $this->ano_hoje = sc_convert_encoding($this->ano_hoje, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " ano_hoje =\"" . $this->trata_dados($this->ano_hoje) . "\"";
   }
   //----- cid
   function NM_export_cid()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cid))
         {
             $this->cid = sc_convert_encoding($this->cid, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cid =\"" . $this->trata_dados($this->cid) . "\"";
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> - paciente :: XML</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XML</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="pdfreport_licenca_tratamento_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_licenca_tratamento"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
