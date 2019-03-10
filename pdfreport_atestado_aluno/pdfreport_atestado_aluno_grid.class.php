<?php
class pdfreport_atestado_aluno_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $nome_parte1 = array();
   var $nome_parte2 = array();
   var $dia = array();
   var $mes = array();
   var $ano = array();
   var $data_inicial = array();
   var $data_final = array();
   var $id_usuario = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("pt_br");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = 'Courier';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "A5";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['pdfreport_atestado_aluno']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'mm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("pdfreport_atestado_aluno", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->id_usuario[0] = $Busca_temp['id_usuario']; 
       $tmp_pos = strpos($this->id_usuario[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_usuario[0] = substr($this->id_usuario[0], 0, $tmp_pos);
       }
       $id_usuario_2 = $Busca_temp['id_usuario_input_2']; 
       $this->id_usuario_2 = $Busca_temp['id_usuario_input_2']; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_atestado_aluno']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_atestado_aluno']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_atestado_aluno']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_atestado_aluno']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_pesq'];  
//----- 
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
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['labels']['id_usuario'] = "Id Usuario";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['labels']['nome_parte1'] = "nome_parte1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['labels']['nome_parte2'] = "nome_parte2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['labels']['dia'] = "dia";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['labels']['mes'] = "mes";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['labels']['ano'] = "ano";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['labels']['data_inicial'] = "data_inicial";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['labels']['data_final'] = "data_final";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_atestado_aluno']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_atestado_aluno']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_atestado_aluno']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->SetTextColor(0, 0, 0);
       $this->Pdf->Text(10, 10, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_atestado_aluno']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->id_usuario[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->id_usuario[$this->nm_grid_colunas] = (string)$this->id_usuario[$this->nm_grid_colunas];
          $this->nome_parte1[$this->nm_grid_colunas] = "";
          $this->nome_parte2[$this->nm_grid_colunas] = "";
          $this->dia[$this->nm_grid_colunas] = "";
          $this->mes[$this->nm_grid_colunas] = "";
          $this->ano[$this->nm_grid_colunas] = "";
          $this->data_inicial[$this->nm_grid_colunas] = "";
          $this->data_final[$this->nm_grid_colunas] = "";
          $_SESSION['scriptcase']['pdfreport_atestado_aluno']['contr_erro'] = 'on';
if (!isset($_SESSION['global_data_final'])) {$_SESSION['global_data_final'] = "";}
if (!isset($this->sc_temp_global_data_final)) {$this->sc_temp_global_data_final = (isset($_SESSION['global_data_final'])) ? $_SESSION['global_data_final'] : "";}
if (!isset($_SESSION['global_data_inicial'])) {$_SESSION['global_data_inicial'] = "";}
if (!isset($this->sc_temp_global_data_inicial)) {$this->sc_temp_global_data_inicial = (isset($_SESSION['global_data_inicial'])) ? $_SESSION['global_data_inicial'] : "";}
if (!isset($_SESSION['global_data'])) {$_SESSION['global_data'] = "";}
if (!isset($this->sc_temp_global_data)) {$this->sc_temp_global_data = (isset($_SESSION['global_data'])) ? $_SESSION['global_data'] : "";}
if (!isset($_SESSION['global_nome_aluno'])) {$_SESSION['global_nome_aluno'] = "";}
if (!isset($this->sc_temp_global_nome_aluno)) {$this->sc_temp_global_nome_aluno = (isset($_SESSION['global_nome_aluno'])) ? $_SESSION['global_nome_aluno'] : "";}
 $nome_auxiliar = $this->sc_temp_global_nome_aluno;
$data_auxiliar = $this->sc_temp_global_data; 
$data_inicial_aux = $this->sc_temp_global_data_inicial;
$data_final_aux = $this->sc_temp_global_data_final;

if($data_final_aux == ""){
	$this->data_final[$this->nm_grid_colunas]  = "------------";
}else{
	$this->data_final[$this->nm_grid_colunas]  = $data_final_aux;
};


$tamanho_nome_parte1 = strlen($nome_auxiliar);

if($tamanho_nome_parte1 <34){

	$nome_parte1_local = substr($nome_auxiliar, 0, $tamanho_nome_parte1);

} else{
	$nome_parte1_local = substr($nome_auxiliar, 0, 34);  
	$nome_parte2_local = substr($nome_auxiliar, 34, $tamanho_nome_parte1);

};


$hora_de = substr($de_auxiliar, 0, 2); 
$min_de = substr($de_auxiliar, 2, 2); 

$hora_as = substr($as_auxiliar, 0, 2); 
$min_as = substr($as_auxiliar, 2, 2); 


$this->ano[$this->nm_grid_colunas] =  substr($data_auxiliar, 2, 2);
$this->mes[$this->nm_grid_colunas] = substr($data_auxiliar, 4, 2);
$this->dia[$this->nm_grid_colunas] = substr($data_auxiliar, 6, 2);

switch($this->mes[$this->nm_grid_colunas]){
	case 1: $this->mes[$this->nm_grid_colunas] = "Janeiro"; break;
	case 2: $this->mes[$this->nm_grid_colunas] = "Fevereiro"; break;
	case 3: $this->mes[$this->nm_grid_colunas] = "Março"; break;
	case 4: $this->mes[$this->nm_grid_colunas] = "Abril"; break;
	case 5: $this->mes[$this->nm_grid_colunas] = "Maio"; break;
	case 6: $this->mes[$this->nm_grid_colunas] = "Junho"; break;
	case 7: $this->mes[$this->nm_grid_colunas] = "Julho"; break;
	case 8: $this->mes[$this->nm_grid_colunas] = "Agosto"; break;
	case 9: $this->mes[$this->nm_grid_colunas] = "Setembro"; break;
	case 10: $this->mes[$this->nm_grid_colunas] = "Outubro"; break;
	case 11: $this->mes[$this->nm_grid_colunas] = "Novembro"; break;
	case 12: $this->mes[$this->nm_grid_colunas] = "Dezembro"; break;
};

$this->nome_parte1[$this->nm_grid_colunas]  = $nome_parte1_local;
$this->nome_parte2[$this->nm_grid_colunas]  = $nome_parte2_local;
$this->data_inicial[$this->nm_grid_colunas]  = $data_inicial_aux;
$this->dia[$this->nm_grid_colunas]  = $this->dia[$this->nm_grid_colunas];
$this->mes[$this->nm_grid_colunas]  = $this->mes[$this->nm_grid_colunas];
$this->ano[$this->nm_grid_colunas]  = $this->ano[$this->nm_grid_colunas];

if (isset($this->sc_temp_global_nome_aluno)) {$_SESSION['global_nome_aluno'] = $this->sc_temp_global_nome_aluno;}
if (isset($this->sc_temp_global_data)) {$_SESSION['global_data'] = $this->sc_temp_global_data;}
if (isset($this->sc_temp_global_data_inicial)) {$_SESSION['global_data_inicial'] = $this->sc_temp_global_data_inicial;}
if (isset($this->sc_temp_global_data_final)) {$_SESSION['global_data_final'] = $this->sc_temp_global_data_final;}
$_SESSION['scriptcase']['pdfreport_atestado_aluno']['contr_erro'] = 'off';
          $this->id_usuario[$this->nm_grid_colunas] = sc_strip_script($this->id_usuario[$this->nm_grid_colunas]);
          if ($this->id_usuario[$this->nm_grid_colunas] === "") 
          { 
              $this->id_usuario[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->id_usuario[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->id_usuario[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->id_usuario[$this->nm_grid_colunas]);
          if ($this->nome_parte1[$this->nm_grid_colunas] === "") 
          { 
              $this->nome_parte1[$this->nm_grid_colunas] = "" ;  
          } 
          else   
          { 
              $this->nome_parte1[$this->nm_grid_colunas] = nl2br($this->nome_parte1[$this->nm_grid_colunas]) ; 
              $temp = explode("<br />", $this->nome_parte1[$this->nm_grid_colunas]); 
              if (!isset($temp[1])) 
              { 
                  $temp = explode("<br>", $this->nome_parte1[$this->nm_grid_colunas]); 
              } 
              $this->nome_parte1[$this->nm_grid_colunas] = "" ; 
              $ind_x = 0 ; 
              while (isset($temp[$ind_x])) 
              { 
                 if (!empty($this->nome_parte1[$this->nm_grid_colunas])) 
                 { 
                     $this->nome_parte1[$this->nm_grid_colunas] .= "<br>"; 
                 } 
                 if (strlen($temp[$ind_x]) > 200) 
                 { 
                     $this->nome_parte1[$this->nm_grid_colunas] .= wordwrap($temp[$ind_x], 200, "<br>", true); 
                 } 
                 else 
                 { 
                     $this->nome_parte1[$this->nm_grid_colunas] .= $temp[$ind_x]; 
                 } 
                 $ind_x++; 
              }  
          }  
          $this->nome_parte1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nome_parte1[$this->nm_grid_colunas]);
          if ($this->nome_parte2[$this->nm_grid_colunas] === "") 
          { 
              $this->nome_parte2[$this->nm_grid_colunas] = "" ;  
          } 
          else   
          { 
              $this->nome_parte2[$this->nm_grid_colunas] = nl2br($this->nome_parte2[$this->nm_grid_colunas]) ; 
              $temp = explode("<br />", $this->nome_parte2[$this->nm_grid_colunas]); 
              if (!isset($temp[1])) 
              { 
                  $temp = explode("<br>", $this->nome_parte2[$this->nm_grid_colunas]); 
              } 
              $this->nome_parte2[$this->nm_grid_colunas] = "" ; 
              $ind_x = 0 ; 
              while (isset($temp[$ind_x])) 
              { 
                 if (!empty($this->nome_parte2[$this->nm_grid_colunas])) 
                 { 
                     $this->nome_parte2[$this->nm_grid_colunas] .= "<br>"; 
                 } 
                 if (strlen($temp[$ind_x]) > 200) 
                 { 
                     $this->nome_parte2[$this->nm_grid_colunas] .= wordwrap($temp[$ind_x], 200, "<br>", true); 
                 } 
                 else 
                 { 
                     $this->nome_parte2[$this->nm_grid_colunas] .= $temp[$ind_x]; 
                 } 
                 $ind_x++; 
              }  
          }  
          $this->nome_parte2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nome_parte2[$this->nm_grid_colunas]);
          if ($this->dia[$this->nm_grid_colunas] === "") 
          { 
              $this->dia[$this->nm_grid_colunas] = "" ;  
          } 
          $this->dia[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dia[$this->nm_grid_colunas]);
          if ($this->mes[$this->nm_grid_colunas] === "") 
          { 
              $this->mes[$this->nm_grid_colunas] = "" ;  
          } 
          $this->mes[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->mes[$this->nm_grid_colunas]);
          if ($this->ano[$this->nm_grid_colunas] === "") 
          { 
              $this->ano[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ano[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ano[$this->nm_grid_colunas]);
          if ($this->data_inicial[$this->nm_grid_colunas] === "") 
          { 
              $this->data_inicial[$this->nm_grid_colunas] = "" ;  
          } 
          $this->data_inicial[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->data_inicial[$this->nm_grid_colunas]);
          if ($this->data_final[$this->nm_grid_colunas] === "") 
          { 
              $this->data_final[$this->nm_grid_colunas] = "" ;  
          } 
          $this->data_final[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->data_final[$this->nm_grid_colunas]);
            $cell_nome_parte1 = array('posx' => 50, 'posy' => 82, 'data' => $this->nome_parte1[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nome_parte2 = array('posx' => 13, 'posy' => 88, 'data' => $this->nome_parte2[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dia = array('posx' => 24, 'posy' => 113, 'data' => $this->dia[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_mes = array('posx' => 36, 'posy' => 113, 'data' => $this->mes[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ano = array('posx' => 66, 'posy' => 113, 'data' => $this->ano[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_data_inicial = array('posx' => 53, 'posy' => 94, 'data' => $this->data_inicial[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_data_final = array('posx' => 89, 'posy' => 94, 'data' => $this->data_final[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);

            $this->Pdf->SetFont($cell_nome_parte1['font_type'], $cell_nome_parte1['font_style'], $cell_nome_parte1['font_size']);
            $this->Pdf->SetTextColor($cell_nome_parte1['color_r'], $cell_nome_parte1['color_g'], $cell_nome_parte1['color_b']);
            if (!empty($cell_nome_parte1['posx']) && !empty($cell_nome_parte1['posy']))
            {
                $this->Pdf->SetXY($cell_nome_parte1['posx'], $cell_nome_parte1['posy']);
            }
            elseif (!empty($cell_nome_parte1['posx']))
            {
                $this->Pdf->SetX($cell_nome_parte1['posx']);
            }
            elseif (!empty($cell_nome_parte1['posy']))
            {
                $this->Pdf->SetY($cell_nome_parte1['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_nome_parte1['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(4.2333333333333);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_nome_parte1['width'], 0, trim($Lines), 0, 0, $cell_nome_parte1['align']);
                $Incre = true;
            }
            $this->Pdf->SetFont($cell_nome_parte2['font_type'], $cell_nome_parte2['font_style'], $cell_nome_parte2['font_size']);
            $this->Pdf->SetTextColor($cell_nome_parte2['color_r'], $cell_nome_parte2['color_g'], $cell_nome_parte2['color_b']);
            if (!empty($cell_nome_parte2['posx']) && !empty($cell_nome_parte2['posy']))
            {
                $this->Pdf->SetXY($cell_nome_parte2['posx'], $cell_nome_parte2['posy']);
            }
            elseif (!empty($cell_nome_parte2['posx']))
            {
                $this->Pdf->SetX($cell_nome_parte2['posx']);
            }
            elseif (!empty($cell_nome_parte2['posy']))
            {
                $this->Pdf->SetY($cell_nome_parte2['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_nome_parte2['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(4.2333333333333);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_nome_parte2['width'], 0, trim($Lines), 0, 0, $cell_nome_parte2['align']);
                $Incre = true;
            }

            $this->Pdf->SetFont($cell_dia['font_type'], $cell_dia['font_style'], $cell_dia['font_size']);
            $this->pdf_text_color($cell_dia['data'], $cell_dia['color_r'], $cell_dia['color_g'], $cell_dia['color_b']);
            if (!empty($cell_dia['posx']) && !empty($cell_dia['posy']))
            {
                $this->Pdf->SetXY($cell_dia['posx'], $cell_dia['posy']);
            }
            elseif (!empty($cell_dia['posx']))
            {
                $this->Pdf->SetX($cell_dia['posx']);
            }
            elseif (!empty($cell_dia['posy']))
            {
                $this->Pdf->SetY($cell_dia['posy']);
            }
            $this->Pdf->Cell($cell_dia['width'], 0, $cell_dia['data'], 0, 0, $cell_dia['align']);

            $this->Pdf->SetFont($cell_mes['font_type'], $cell_mes['font_style'], $cell_mes['font_size']);
            $this->pdf_text_color($cell_mes['data'], $cell_mes['color_r'], $cell_mes['color_g'], $cell_mes['color_b']);
            if (!empty($cell_mes['posx']) && !empty($cell_mes['posy']))
            {
                $this->Pdf->SetXY($cell_mes['posx'], $cell_mes['posy']);
            }
            elseif (!empty($cell_mes['posx']))
            {
                $this->Pdf->SetX($cell_mes['posx']);
            }
            elseif (!empty($cell_mes['posy']))
            {
                $this->Pdf->SetY($cell_mes['posy']);
            }
            $this->Pdf->Cell($cell_mes['width'], 0, $cell_mes['data'], 0, 0, $cell_mes['align']);

            $this->Pdf->SetFont($cell_ano['font_type'], $cell_ano['font_style'], $cell_ano['font_size']);
            $this->pdf_text_color($cell_ano['data'], $cell_ano['color_r'], $cell_ano['color_g'], $cell_ano['color_b']);
            if (!empty($cell_ano['posx']) && !empty($cell_ano['posy']))
            {
                $this->Pdf->SetXY($cell_ano['posx'], $cell_ano['posy']);
            }
            elseif (!empty($cell_ano['posx']))
            {
                $this->Pdf->SetX($cell_ano['posx']);
            }
            elseif (!empty($cell_ano['posy']))
            {
                $this->Pdf->SetY($cell_ano['posy']);
            }
            $this->Pdf->Cell($cell_ano['width'], 0, $cell_ano['data'], 0, 0, $cell_ano['align']);

            $this->Pdf->SetFont($cell_data_inicial['font_type'], $cell_data_inicial['font_style'], $cell_data_inicial['font_size']);
            $this->pdf_text_color($cell_data_inicial['data'], $cell_data_inicial['color_r'], $cell_data_inicial['color_g'], $cell_data_inicial['color_b']);
            if (!empty($cell_data_inicial['posx']) && !empty($cell_data_inicial['posy']))
            {
                $this->Pdf->SetXY($cell_data_inicial['posx'], $cell_data_inicial['posy']);
            }
            elseif (!empty($cell_data_inicial['posx']))
            {
                $this->Pdf->SetX($cell_data_inicial['posx']);
            }
            elseif (!empty($cell_data_inicial['posy']))
            {
                $this->Pdf->SetY($cell_data_inicial['posy']);
            }
            $this->Pdf->Cell($cell_data_inicial['width'], 0, $cell_data_inicial['data'], 0, 0, $cell_data_inicial['align']);

            $this->Pdf->SetFont($cell_data_final['font_type'], $cell_data_final['font_style'], $cell_data_final['font_size']);
            $this->pdf_text_color($cell_data_final['data'], $cell_data_final['color_r'], $cell_data_final['color_g'], $cell_data_final['color_b']);
            if (!empty($cell_data_final['posx']) && !empty($cell_data_final['posy']))
            {
                $this->Pdf->SetXY($cell_data_final['posx'], $cell_data_final['posy']);
            }
            elseif (!empty($cell_data_final['posx']))
            {
                $this->Pdf->SetX($cell_data_final['posx']);
            }
            elseif (!empty($cell_data_final['posy']))
            {
                $this->Pdf->SetY($cell_data_final['posy']);
            }
            $this->Pdf->Cell($cell_data_final['width'], 0, $cell_data_final['data'], 0, 0, $cell_data_final['align']);

          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
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
