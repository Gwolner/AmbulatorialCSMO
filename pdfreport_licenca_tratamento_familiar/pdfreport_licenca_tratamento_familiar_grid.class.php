<?php
class pdfreport_licenca_tratamento_familiar_grid
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
   var $nome = array();
   var $cpf = array();
   var $orgao = array();
   var $siape = array();
   var $data_inicial = array();
   var $data_final = array();
   var $numero_de_dias = array();
   var $dia_hoje = array();
   var $mes_hoje = array();
   var $ano_hoje = array();
   var $familiar = array();
   var $parentesco = array();
   var $cid = array();
   var $id_paciente = array();
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
   $this->default_font = '';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "A4";
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
   $_SESSION['scriptcase']['pdfreport_licenca_tratamento_familiar']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_licenca_tratamento_familiar", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->id_paciente[0] = $Busca_temp['id_paciente']; 
       $tmp_pos = strpos($this->id_paciente[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_paciente[0] = substr($this->id_paciente[0], 0, $tmp_pos);
       }
       $id_paciente_2 = $Busca_temp['id_paciente_input_2']; 
       $this->id_paciente_2 = $Busca_temp['id_paciente_input_2']; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_licenca_tratamento_familiar']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_licenca_tratamento_familiar']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_licenca_tratamento_familiar']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_licenca_tratamento_familiar']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_pesq'];  
//----- 
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
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['order_grid'] = $nmgp_order_by;
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['id_paciente'] = "Id Paciente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['nome'] = "nome";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['cpf'] = "cpf";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['orgao'] = "orgao";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['siape'] = "siape";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['data_inicial'] = "data_inicial";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['data_final'] = "data_final";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['numero_de_dias'] = "numero_de_dias";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['dia_hoje'] = "dia_hoje";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['mes_hoje'] = "mes_hoje";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['ano_hoje'] = "ano_hoje";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['familiar'] = "familiar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['parentesco'] = "parentesco";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['labels']['cid'] = "cid";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_licenca_tratamento_familiar']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_licenca_tratamento_familiar']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_licenca_tratamento_familiar']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_licenca_tratamento_familiar']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->id_paciente[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->id_paciente[$this->nm_grid_colunas] = (string)$this->id_paciente[$this->nm_grid_colunas];
          $this->nome[$this->nm_grid_colunas] = "";
          $this->cpf[$this->nm_grid_colunas] = "";
          $this->orgao[$this->nm_grid_colunas] = "";
          $this->siape[$this->nm_grid_colunas] = "";
          $this->data_inicial[$this->nm_grid_colunas] = "";
          $this->data_final[$this->nm_grid_colunas] = "";
          $this->numero_de_dias[$this->nm_grid_colunas] = "";
          $this->dia_hoje[$this->nm_grid_colunas] = "";
          $this->mes_hoje[$this->nm_grid_colunas] = "";
          $this->ano_hoje[$this->nm_grid_colunas] = "";
          $this->familiar[$this->nm_grid_colunas] = "";
          $this->parentesco[$this->nm_grid_colunas] = "";
          $this->cid[$this->nm_grid_colunas] = "";
          $_SESSION['scriptcase']['pdfreport_licenca_tratamento_familiar']['contr_erro'] = 'on';
if (!isset($_SESSION['global_cid'])) {$_SESSION['global_cid'] = "";}
if (!isset($this->sc_temp_global_cid)) {$this->sc_temp_global_cid = (isset($_SESSION['global_cid'])) ? $_SESSION['global_cid'] : "";}
if (!isset($_SESSION['global_parentesco'])) {$_SESSION['global_parentesco'] = "";}
if (!isset($this->sc_temp_global_parentesco)) {$this->sc_temp_global_parentesco = (isset($_SESSION['global_parentesco'])) ? $_SESSION['global_parentesco'] : "";}
if (!isset($_SESSION['global_familiar'])) {$_SESSION['global_familiar'] = "";}
if (!isset($this->sc_temp_global_familiar)) {$this->sc_temp_global_familiar = (isset($_SESSION['global_familiar'])) ? $_SESSION['global_familiar'] : "";}
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
 $this->nome[$this->nm_grid_colunas]  = $this->sc_temp_global_nome_servidor;
$this->cpf[$this->nm_grid_colunas]  = $this->sc_temp_global_cpf;
$this->orgao[$this->nm_grid_colunas]  = $this->sc_temp_global_orgao;
$this->siape[$this->nm_grid_colunas]  = $this->sc_temp_global_siape;
$this->data_inicial[$this->nm_grid_colunas]  = $this->sc_temp_global_data_inicial;
$this->data_final[$this->nm_grid_colunas]  = $this->sc_temp_global_data_final;
$this->numero_de_dias[$this->nm_grid_colunas]  = $this->sc_temp_global_numero_de_dias;
$data_auxiliar = $this->sc_temp_global_data_hoje;
$this->familiar[$this->nm_grid_colunas]  = $this->sc_temp_global_familiar;
$this->parentesco[$this->nm_grid_colunas]  = $this->sc_temp_global_parentesco;
$this->cid[$this->nm_grid_colunas]  = $this->sc_temp_global_cid;

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

$this->dia_hoje[$this->nm_grid_colunas]  = $dia;
$this->mes_hoje[$this->nm_grid_colunas]  = $mes;
$this->ano_hoje[$this->nm_grid_colunas]  = $ano;
if (isset($this->sc_temp_global_nome_servidor)) {$_SESSION['global_nome_servidor'] = $this->sc_temp_global_nome_servidor;}
if (isset($this->sc_temp_global_cpf)) {$_SESSION['global_cpf'] = $this->sc_temp_global_cpf;}
if (isset($this->sc_temp_global_orgao)) {$_SESSION['global_orgao'] = $this->sc_temp_global_orgao;}
if (isset($this->sc_temp_global_siape)) {$_SESSION['global_siape'] = $this->sc_temp_global_siape;}
if (isset($this->sc_temp_global_data_inicial)) {$_SESSION['global_data_inicial'] = $this->sc_temp_global_data_inicial;}
if (isset($this->sc_temp_global_data_final)) {$_SESSION['global_data_final'] = $this->sc_temp_global_data_final;}
if (isset($this->sc_temp_global_numero_de_dias)) {$_SESSION['global_numero_de_dias'] = $this->sc_temp_global_numero_de_dias;}
if (isset($this->sc_temp_global_data_hoje)) {$_SESSION['global_data_hoje'] = $this->sc_temp_global_data_hoje;}
if (isset($this->sc_temp_global_familiar)) {$_SESSION['global_familiar'] = $this->sc_temp_global_familiar;}
if (isset($this->sc_temp_global_parentesco)) {$_SESSION['global_parentesco'] = $this->sc_temp_global_parentesco;}
if (isset($this->sc_temp_global_cid)) {$_SESSION['global_cid'] = $this->sc_temp_global_cid;}
$_SESSION['scriptcase']['pdfreport_licenca_tratamento_familiar']['contr_erro'] = 'off';
          $this->id_paciente[$this->nm_grid_colunas] = sc_strip_script($this->id_paciente[$this->nm_grid_colunas]);
          if ($this->id_paciente[$this->nm_grid_colunas] === "") 
          { 
              $this->id_paciente[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->id_paciente[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->id_paciente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->id_paciente[$this->nm_grid_colunas]);
          if ($this->nome[$this->nm_grid_colunas] === "") 
          { 
              $this->nome[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nome[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nome[$this->nm_grid_colunas]);
          if ($this->cpf[$this->nm_grid_colunas] === "") 
          { 
              $this->cpf[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cpf[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cpf[$this->nm_grid_colunas]);
          if ($this->orgao[$this->nm_grid_colunas] === "") 
          { 
              $this->orgao[$this->nm_grid_colunas] = "" ;  
          } 
          $this->orgao[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->orgao[$this->nm_grid_colunas]);
          if ($this->siape[$this->nm_grid_colunas] === "") 
          { 
              $this->siape[$this->nm_grid_colunas] = "" ;  
          } 
          $this->siape[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->siape[$this->nm_grid_colunas]);
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
          if ($this->numero_de_dias[$this->nm_grid_colunas] === "") 
          { 
              $this->numero_de_dias[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->numero_de_dias[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->numero_de_dias[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numero_de_dias[$this->nm_grid_colunas]);
          if ($this->dia_hoje[$this->nm_grid_colunas] === "") 
          { 
              $this->dia_hoje[$this->nm_grid_colunas] = "" ;  
          } 
          $this->dia_hoje[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dia_hoje[$this->nm_grid_colunas]);
          if ($this->mes_hoje[$this->nm_grid_colunas] === "") 
          { 
              $this->mes_hoje[$this->nm_grid_colunas] = "" ;  
          } 
          $this->mes_hoje[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->mes_hoje[$this->nm_grid_colunas]);
          if ($this->ano_hoje[$this->nm_grid_colunas] === "") 
          { 
              $this->ano_hoje[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ano_hoje[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ano_hoje[$this->nm_grid_colunas]);
          if ($this->familiar[$this->nm_grid_colunas] === "") 
          { 
              $this->familiar[$this->nm_grid_colunas] = "" ;  
          } 
          $this->familiar[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->familiar[$this->nm_grid_colunas]);
          if ($this->parentesco[$this->nm_grid_colunas] === "") 
          { 
              $this->parentesco[$this->nm_grid_colunas] = "" ;  
          } 
          $this->parentesco[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->parentesco[$this->nm_grid_colunas]);
          if ($this->cid[$this->nm_grid_colunas] === "") 
          { 
              $this->cid[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cid[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cid[$this->nm_grid_colunas]);
            $cell_nome = array('posx' => 58, 'posy' => 102, 'data' => $this->nome[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cpf = array('posx' => 27, 'posy' => 110, 'data' => $this->cpf[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_orgao = array('posx' => 34, 'posy' => 117, 'data' => $this->orgao[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_siape = array('posx' => 30, 'posy' => 124, 'data' => $this->siape[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_data_inicial = array('posx' => 129, 'posy' => 183, 'data' => $this->data_inicial[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_data_final = array('posx' => 20, 'posy' => 188, 'data' => $this->data_final[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_numero_de_dias = array('posx' => 138, 'posy' => 194, 'data' => $this->numero_de_dias[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dia_hoje = array('posx' => 34, 'posy' => 237, 'data' => $this->dia_hoje[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_mes_hoje = array('posx' => 56, 'posy' => 237, 'data' => $this->mes_hoje[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ano_hoje = array('posx' => 93, 'posy' => 237, 'data' => $this->ano_hoje[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_familiar = array('posx' => 38, 'posy' => 144, 'data' => $this->familiar[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_parentesco = array('posx' => 60, 'posy' => 151, 'data' => $this->parentesco[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cid = array('posx' => 28, 'posy' => 229, 'data' => $this->cid[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_nome['font_type'], $cell_nome['font_style'], $cell_nome['font_size']);
            $this->pdf_text_color($cell_nome['data'], $cell_nome['color_r'], $cell_nome['color_g'], $cell_nome['color_b']);
            if (!empty($cell_nome['posx']) && !empty($cell_nome['posy']))
            {
                $this->Pdf->SetXY($cell_nome['posx'], $cell_nome['posy']);
            }
            elseif (!empty($cell_nome['posx']))
            {
                $this->Pdf->SetX($cell_nome['posx']);
            }
            elseif (!empty($cell_nome['posy']))
            {
                $this->Pdf->SetY($cell_nome['posy']);
            }
            $this->Pdf->Cell($cell_nome['width'], 0, $cell_nome['data'], 0, 0, $cell_nome['align']);

            $this->Pdf->SetFont($cell_cpf['font_type'], $cell_cpf['font_style'], $cell_cpf['font_size']);
            $this->pdf_text_color($cell_cpf['data'], $cell_cpf['color_r'], $cell_cpf['color_g'], $cell_cpf['color_b']);
            if (!empty($cell_cpf['posx']) && !empty($cell_cpf['posy']))
            {
                $this->Pdf->SetXY($cell_cpf['posx'], $cell_cpf['posy']);
            }
            elseif (!empty($cell_cpf['posx']))
            {
                $this->Pdf->SetX($cell_cpf['posx']);
            }
            elseif (!empty($cell_cpf['posy']))
            {
                $this->Pdf->SetY($cell_cpf['posy']);
            }
            $this->Pdf->Cell($cell_cpf['width'], 0, $cell_cpf['data'], 0, 0, $cell_cpf['align']);

            $this->Pdf->SetFont($cell_orgao['font_type'], $cell_orgao['font_style'], $cell_orgao['font_size']);
            $this->pdf_text_color($cell_orgao['data'], $cell_orgao['color_r'], $cell_orgao['color_g'], $cell_orgao['color_b']);
            if (!empty($cell_orgao['posx']) && !empty($cell_orgao['posy']))
            {
                $this->Pdf->SetXY($cell_orgao['posx'], $cell_orgao['posy']);
            }
            elseif (!empty($cell_orgao['posx']))
            {
                $this->Pdf->SetX($cell_orgao['posx']);
            }
            elseif (!empty($cell_orgao['posy']))
            {
                $this->Pdf->SetY($cell_orgao['posy']);
            }
            $this->Pdf->Cell($cell_orgao['width'], 0, $cell_orgao['data'], 0, 0, $cell_orgao['align']);

            $this->Pdf->SetFont($cell_siape['font_type'], $cell_siape['font_style'], $cell_siape['font_size']);
            $this->pdf_text_color($cell_siape['data'], $cell_siape['color_r'], $cell_siape['color_g'], $cell_siape['color_b']);
            if (!empty($cell_siape['posx']) && !empty($cell_siape['posy']))
            {
                $this->Pdf->SetXY($cell_siape['posx'], $cell_siape['posy']);
            }
            elseif (!empty($cell_siape['posx']))
            {
                $this->Pdf->SetX($cell_siape['posx']);
            }
            elseif (!empty($cell_siape['posy']))
            {
                $this->Pdf->SetY($cell_siape['posy']);
            }
            $this->Pdf->Cell($cell_siape['width'], 0, $cell_siape['data'], 0, 0, $cell_siape['align']);

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

            $this->Pdf->SetFont($cell_numero_de_dias['font_type'], $cell_numero_de_dias['font_style'], $cell_numero_de_dias['font_size']);
            $this->pdf_text_color($cell_numero_de_dias['data'], $cell_numero_de_dias['color_r'], $cell_numero_de_dias['color_g'], $cell_numero_de_dias['color_b']);
            if (!empty($cell_numero_de_dias['posx']) && !empty($cell_numero_de_dias['posy']))
            {
                $this->Pdf->SetXY($cell_numero_de_dias['posx'], $cell_numero_de_dias['posy']);
            }
            elseif (!empty($cell_numero_de_dias['posx']))
            {
                $this->Pdf->SetX($cell_numero_de_dias['posx']);
            }
            elseif (!empty($cell_numero_de_dias['posy']))
            {
                $this->Pdf->SetY($cell_numero_de_dias['posy']);
            }
            $this->Pdf->Cell($cell_numero_de_dias['width'], 0, $cell_numero_de_dias['data'], 0, 0, $cell_numero_de_dias['align']);

            $this->Pdf->SetFont($cell_dia_hoje['font_type'], $cell_dia_hoje['font_style'], $cell_dia_hoje['font_size']);
            $this->pdf_text_color($cell_dia_hoje['data'], $cell_dia_hoje['color_r'], $cell_dia_hoje['color_g'], $cell_dia_hoje['color_b']);
            if (!empty($cell_dia_hoje['posx']) && !empty($cell_dia_hoje['posy']))
            {
                $this->Pdf->SetXY($cell_dia_hoje['posx'], $cell_dia_hoje['posy']);
            }
            elseif (!empty($cell_dia_hoje['posx']))
            {
                $this->Pdf->SetX($cell_dia_hoje['posx']);
            }
            elseif (!empty($cell_dia_hoje['posy']))
            {
                $this->Pdf->SetY($cell_dia_hoje['posy']);
            }
            $this->Pdf->Cell($cell_dia_hoje['width'], 0, $cell_dia_hoje['data'], 0, 0, $cell_dia_hoje['align']);

            $this->Pdf->SetFont($cell_mes_hoje['font_type'], $cell_mes_hoje['font_style'], $cell_mes_hoje['font_size']);
            $this->pdf_text_color($cell_mes_hoje['data'], $cell_mes_hoje['color_r'], $cell_mes_hoje['color_g'], $cell_mes_hoje['color_b']);
            if (!empty($cell_mes_hoje['posx']) && !empty($cell_mes_hoje['posy']))
            {
                $this->Pdf->SetXY($cell_mes_hoje['posx'], $cell_mes_hoje['posy']);
            }
            elseif (!empty($cell_mes_hoje['posx']))
            {
                $this->Pdf->SetX($cell_mes_hoje['posx']);
            }
            elseif (!empty($cell_mes_hoje['posy']))
            {
                $this->Pdf->SetY($cell_mes_hoje['posy']);
            }
            $this->Pdf->Cell($cell_mes_hoje['width'], 0, $cell_mes_hoje['data'], 0, 0, $cell_mes_hoje['align']);

            $this->Pdf->SetFont($cell_ano_hoje['font_type'], $cell_ano_hoje['font_style'], $cell_ano_hoje['font_size']);
            $this->pdf_text_color($cell_ano_hoje['data'], $cell_ano_hoje['color_r'], $cell_ano_hoje['color_g'], $cell_ano_hoje['color_b']);
            if (!empty($cell_ano_hoje['posx']) && !empty($cell_ano_hoje['posy']))
            {
                $this->Pdf->SetXY($cell_ano_hoje['posx'], $cell_ano_hoje['posy']);
            }
            elseif (!empty($cell_ano_hoje['posx']))
            {
                $this->Pdf->SetX($cell_ano_hoje['posx']);
            }
            elseif (!empty($cell_ano_hoje['posy']))
            {
                $this->Pdf->SetY($cell_ano_hoje['posy']);
            }
            $this->Pdf->Cell($cell_ano_hoje['width'], 0, $cell_ano_hoje['data'], 0, 0, $cell_ano_hoje['align']);

            $this->Pdf->SetFont($cell_familiar['font_type'], $cell_familiar['font_style'], $cell_familiar['font_size']);
            $this->pdf_text_color($cell_familiar['data'], $cell_familiar['color_r'], $cell_familiar['color_g'], $cell_familiar['color_b']);
            if (!empty($cell_familiar['posx']) && !empty($cell_familiar['posy']))
            {
                $this->Pdf->SetXY($cell_familiar['posx'], $cell_familiar['posy']);
            }
            elseif (!empty($cell_familiar['posx']))
            {
                $this->Pdf->SetX($cell_familiar['posx']);
            }
            elseif (!empty($cell_familiar['posy']))
            {
                $this->Pdf->SetY($cell_familiar['posy']);
            }
            $this->Pdf->Cell($cell_familiar['width'], 0, $cell_familiar['data'], 0, 0, $cell_familiar['align']);

            $this->Pdf->SetFont($cell_parentesco['font_type'], $cell_parentesco['font_style'], $cell_parentesco['font_size']);
            $this->pdf_text_color($cell_parentesco['data'], $cell_parentesco['color_r'], $cell_parentesco['color_g'], $cell_parentesco['color_b']);
            if (!empty($cell_parentesco['posx']) && !empty($cell_parentesco['posy']))
            {
                $this->Pdf->SetXY($cell_parentesco['posx'], $cell_parentesco['posy']);
            }
            elseif (!empty($cell_parentesco['posx']))
            {
                $this->Pdf->SetX($cell_parentesco['posx']);
            }
            elseif (!empty($cell_parentesco['posy']))
            {
                $this->Pdf->SetY($cell_parentesco['posy']);
            }
            $this->Pdf->Cell($cell_parentesco['width'], 0, $cell_parentesco['data'], 0, 0, $cell_parentesco['align']);

            $this->Pdf->SetFont($cell_cid['font_type'], $cell_cid['font_style'], $cell_cid['font_size']);
            $this->pdf_text_color($cell_cid['data'], $cell_cid['color_r'], $cell_cid['color_g'], $cell_cid['color_b']);
            if (!empty($cell_cid['posx']) && !empty($cell_cid['posy']))
            {
                $this->Pdf->SetXY($cell_cid['posx'], $cell_cid['posy']);
            }
            elseif (!empty($cell_cid['posx']))
            {
                $this->Pdf->SetX($cell_cid['posx']);
            }
            elseif (!empty($cell_cid['posy']))
            {
                $this->Pdf->SetY($cell_cid['posy']);
            }
            $this->Pdf->Cell($cell_cid['width'], 0, $cell_cid['data'], 0, 0, $cell_cid['align']);

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
