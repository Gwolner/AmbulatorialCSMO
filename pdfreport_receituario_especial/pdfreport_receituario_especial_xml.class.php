<?php

class pdfreport_receituario_especial_xml
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
   function pdfreport_receituario_especial_xml()
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
      $this->Arquivo     .= "_pdfreport_receituario_especial";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "pdfreport_receituario_especial.xml";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->id_usuario = $Busca_temp['id_usuario']; 
          $tmp_pos = strpos($this->id_usuario, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_usuario = substr($this->id_usuario, 0, $tmp_pos);
          }
          $this->id_usuario_2 = $Busca_temp['id_usuario_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT id_usuario from (SELECT     id_usuario FROM      usuario LIMIT 1) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_usuario from (SELECT     id_usuario FROM      usuario LIMIT 1) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT id_usuario from (SELECT     id_usuario FROM      usuario LIMIT 1) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT id_usuario from (SELECT     id_usuario FROM      usuario LIMIT 1) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT id_usuario from (SELECT     id_usuario FROM      usuario LIMIT 1) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT id_usuario from (SELECT     id_usuario FROM      usuario LIMIT 1) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['order_grid'];
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
         $this->xml_registro = "<pdfreport_receituario_especial";
         $this->id_usuario = $rs->fields[0] ;  
         $this->id_usuario = (string)$this->id_usuario;
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['pdfreport_receituario_especial']['contr_erro'] = 'on';
if (!isset($_SESSION['global_data'])) {$_SESSION['global_data'] = "";}
if (!isset($this->sc_temp_global_data)) {$this->sc_temp_global_data = (isset($_SESSION['global_data'])) ? $_SESSION['global_data'] : "";}
if (!isset($_SESSION['global_prescricao'])) {$_SESSION['global_prescricao'] = "";}
if (!isset($this->sc_temp_global_prescricao)) {$this->sc_temp_global_prescricao = (isset($_SESSION['global_prescricao'])) ? $_SESSION['global_prescricao'] : "";}
if (!isset($_SESSION['global_endereco'])) {$_SESSION['global_endereco'] = "";}
if (!isset($this->sc_temp_global_endereco)) {$this->sc_temp_global_endereco = (isset($_SESSION['global_endereco'])) ? $_SESSION['global_endereco'] : "";}
if (!isset($_SESSION['global_nome_paciente'])) {$_SESSION['global_nome_paciente'] = "";}
if (!isset($this->sc_temp_global_nome_paciente)) {$this->sc_temp_global_nome_paciente = (isset($_SESSION['global_nome_paciente'])) ? $_SESSION['global_nome_paciente'] : "";}
 $nome_auxiliar = $this->sc_temp_global_nome_paciente;
$endereco_auxiliar = $this->sc_temp_global_endereco;
$prescricao_auxiliar = $this->sc_temp_global_prescricao;
$data_auxiliar = $this->sc_temp_global_data; 


$tamanho_nome_parte1 = strlen($nome_auxiliar);

if($tamanho_nome_parte1 < 46){
	$nome_parte1_local = substr($nome_auxiliar, 0, $tamanho_nome_parte1);
}else{
	$nome_parte1_local = substr($nome_auxiliar, 0, 46);  
	$nome_parte2_local = substr($nome_auxiliar, 47, 51);
};


$tamanho_endereco = strlen($endereco_auxiliar);

if($tamanho_endereco < 46){
	$endereco_parte1_local = substr($endereco_auxiliar, 0, $tamanho_endereco);
}else{
	$endereco_parte1_local = substr($endereco_auxiliar, 0, 46);  
	$endereco_parte2_local = substr($endereco_auxiliar, 47, 51);
};


$this->ano =  substr($data_auxiliar, 2, 2);
$this->mes = substr($data_auxiliar, 4, 2);
$this->dia = substr($data_auxiliar, 6, 2);

$this->nome_parte1  = $nome_parte1_local;
$this->nome_parte2  = $nome_parte2_local;
$this->endereco_parte1  = $endereco_parte1_local;
$this->endereco_parte2  = $endereco_parte2_local;
$this->prescricao  = $prescricao_auxiliar;
$this->dia  = $this->dia;
$this->mes  = $this->mes;
$this->ano  = $this->ano;

$this->nome_parte1_copia  = $nome_parte1_local;
$this->nome_parte2_copia  = $nome_parte2_local;
$this->endereco_parte1_copia  = $endereco_parte1_local;
$this->endereco_parte2_copia  = $endereco_parte2_local;
$this->prescricao_copia  = $prescricao_auxiliar;
$this->dia_copia  = $this->dia;
$this->mes_copia  = $this->mes;
$this->ano_copia  = $this->ano;

if (isset($this->sc_temp_global_nome_paciente)) {$_SESSION['global_nome_paciente'] = $this->sc_temp_global_nome_paciente;}
if (isset($this->sc_temp_global_endereco)) {$_SESSION['global_endereco'] = $this->sc_temp_global_endereco;}
if (isset($this->sc_temp_global_prescricao)) {$_SESSION['global_prescricao'] = $this->sc_temp_global_prescricao;}
if (isset($this->sc_temp_global_data)) {$_SESSION['global_data'] = $this->sc_temp_global_data;}
$_SESSION['scriptcase']['pdfreport_receituario_especial']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['field_order'] as $Cada_col)
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
   //----- id_usuario
   function NM_export_id_usuario()
   {
         nmgp_Form_Num_Val($this->id_usuario, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->id_usuario))
         {
             $this->id_usuario = sc_convert_encoding($this->id_usuario, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " id_usuario =\"" . $this->trata_dados($this->id_usuario) . "\"";
   }
   //----- nome_parte1
   function NM_export_nome_parte1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nome_parte1))
         {
             $this->nome_parte1 = sc_convert_encoding($this->nome_parte1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nome_parte1 =\"" . $this->trata_dados($this->nome_parte1) . "\"";
   }
   //----- nome_parte2
   function NM_export_nome_parte2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nome_parte2))
         {
             $this->nome_parte2 = sc_convert_encoding($this->nome_parte2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nome_parte2 =\"" . $this->trata_dados($this->nome_parte2) . "\"";
   }
   //----- mes
   function NM_export_mes()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->mes))
         {
             $this->mes = sc_convert_encoding($this->mes, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " mes =\"" . $this->trata_dados($this->mes) . "\"";
   }
   //----- ano
   function NM_export_ano()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ano))
         {
             $this->ano = sc_convert_encoding($this->ano, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " ano =\"" . $this->trata_dados($this->ano) . "\"";
   }
   //----- dia
   function NM_export_dia()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->dia))
         {
             $this->dia = sc_convert_encoding($this->dia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " dia =\"" . $this->trata_dados($this->dia) . "\"";
   }
   //----- prescricao
   function NM_export_prescricao()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->prescricao))
         {
             $this->prescricao = sc_convert_encoding($this->prescricao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " prescricao =\"" . $this->trata_dados($this->prescricao) . "\"";
   }
   //----- endereco_parte1
   function NM_export_endereco_parte1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->endereco_parte1))
         {
             $this->endereco_parte1 = sc_convert_encoding($this->endereco_parte1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " endereco_parte1 =\"" . $this->trata_dados($this->endereco_parte1) . "\"";
   }
   //----- endereco_parte2
   function NM_export_endereco_parte2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->endereco_parte2))
         {
             $this->endereco_parte2 = sc_convert_encoding($this->endereco_parte2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " endereco_parte2 =\"" . $this->trata_dados($this->endereco_parte2) . "\"";
   }
   //----- nome_parte1_copia
   function NM_export_nome_parte1_copia()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nome_parte1_copia))
         {
             $this->nome_parte1_copia = sc_convert_encoding($this->nome_parte1_copia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nome_parte1_copia =\"" . $this->trata_dados($this->nome_parte1_copia) . "\"";
   }
   //----- nome_parte2_copia
   function NM_export_nome_parte2_copia()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nome_parte2_copia))
         {
             $this->nome_parte2_copia = sc_convert_encoding($this->nome_parte2_copia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " nome_parte2_copia =\"" . $this->trata_dados($this->nome_parte2_copia) . "\"";
   }
   //----- mes_copia
   function NM_export_mes_copia()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->mes_copia))
         {
             $this->mes_copia = sc_convert_encoding($this->mes_copia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " mes_copia =\"" . $this->trata_dados($this->mes_copia) . "\"";
   }
   //----- ano_copia
   function NM_export_ano_copia()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ano_copia))
         {
             $this->ano_copia = sc_convert_encoding($this->ano_copia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " ano_copia =\"" . $this->trata_dados($this->ano_copia) . "\"";
   }
   //----- dia_copia
   function NM_export_dia_copia()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->dia_copia))
         {
             $this->dia_copia = sc_convert_encoding($this->dia_copia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " dia_copia =\"" . $this->trata_dados($this->dia_copia) . "\"";
   }
   //----- prescricao_copia
   function NM_export_prescricao_copia()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->prescricao_copia))
         {
             $this->prescricao_copia = sc_convert_encoding($this->prescricao_copia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " prescricao_copia =\"" . $this->trata_dados($this->prescricao_copia) . "\"";
   }
   //----- endereco_parte1_copia
   function NM_export_endereco_parte1_copia()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->endereco_parte1_copia))
         {
             $this->endereco_parte1_copia = sc_convert_encoding($this->endereco_parte1_copia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " endereco_parte1_copia =\"" . $this->trata_dados($this->endereco_parte1_copia) . "\"";
   }
   //----- endereco_parte2_copia
   function NM_export_endereco_parte2_copia()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->endereco_parte2_copia))
         {
             $this->endereco_parte2_copia = sc_convert_encoding($this->endereco_parte2_copia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " endereco_parte2_copia =\"" . $this->trata_dados($this->endereco_parte2_copia) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_receituario_especial'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> -  :: XML</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_receituario_especial_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_receituario_especial"> 
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
