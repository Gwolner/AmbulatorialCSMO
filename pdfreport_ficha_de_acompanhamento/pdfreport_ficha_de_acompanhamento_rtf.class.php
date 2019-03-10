<?php

class pdfreport_ficha_de_acompanhamento_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function pdfreport_ficha_de_acompanhamento_rtf()
   {
      $this->nm_data   = new nm_data("pt_br");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_pdfreport_ficha_de_acompanhamento";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "pdfreport_ficha_de_acompanhamento.rtf";
   }

   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['campos_busca'];
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['rtf_name']);
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
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['id_paciente'])) ? $this->New_label['id_paciente'] : "Id Paciente"; 
          if ($Cada_col == "id_paciente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nome'])) ? $this->New_label['nome'] : "nome"; 
          if ($Cada_col == "nome" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['curso'])) ? $this->New_label['curso'] : "curso"; 
          if ($Cada_col == "curso" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['modalidade'])) ? $this->New_label['modalidade'] : "modalidade"; 
          if ($Cada_col == "modalidade" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['matricula'])) ? $this->New_label['matricula'] : "matricula"; 
          if ($Cada_col == "matricula" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['turno'])) ? $this->New_label['turno'] : "turno"; 
          if ($Cada_col == "turno" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['texto'])) ? $this->New_label['texto'] : "texto"; 
          if ($Cada_col == "texto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dia'])) ? $this->New_label['dia'] : "dia"; 
          if ($Cada_col == "dia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['mes'])) ? $this->New_label['mes'] : "mes"; 
          if ($Cada_col == "mes" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ano'])) ? $this->New_label['ano'] : "ano"; 
          if ($Cada_col == "ano" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->Texto_tag .= "<tr>\r\n";
         $this->id_paciente = $rs->fields[0] ;  
         $this->id_paciente = (string)$this->id_paciente;
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['pdfreport_ficha_de_acompanhamento']['contr_erro'] = 'on';
if (!isset($_SESSION['global_texto_ficha'])) {$_SESSION['global_texto_ficha'] = "";}
if (!isset($this->sc_temp_global_texto_ficha)) {$this->sc_temp_global_texto_ficha = (isset($_SESSION['global_texto_ficha'])) ? $_SESSION['global_texto_ficha'] : "";}
if (!isset($_SESSION['global_turno'])) {$_SESSION['global_turno'] = "";}
if (!isset($this->sc_temp_global_turno)) {$this->sc_temp_global_turno = (isset($_SESSION['global_turno'])) ? $_SESSION['global_turno'] : "";}
if (!isset($_SESSION['global_matricula'])) {$_SESSION['global_matricula'] = "";}
if (!isset($this->sc_temp_global_matricula)) {$this->sc_temp_global_matricula = (isset($_SESSION['global_matricula'])) ? $_SESSION['global_matricula'] : "";}
if (!isset($_SESSION['global_data_nascimento'])) {$_SESSION['global_data_nascimento'] = "";}
if (!isset($this->sc_temp_global_data_nascimento)) {$this->sc_temp_global_data_nascimento = (isset($_SESSION['global_data_nascimento'])) ? $_SESSION['global_data_nascimento'] : "";}
if (!isset($_SESSION['global_modalidade'])) {$_SESSION['global_modalidade'] = "";}
if (!isset($this->sc_temp_global_modalidade)) {$this->sc_temp_global_modalidade = (isset($_SESSION['global_modalidade'])) ? $_SESSION['global_modalidade'] : "";}
if (!isset($_SESSION['global_curso'])) {$_SESSION['global_curso'] = "";}
if (!isset($this->sc_temp_global_curso)) {$this->sc_temp_global_curso = (isset($_SESSION['global_curso'])) ? $_SESSION['global_curso'] : "";}
if (!isset($_SESSION['global_nome_aluno'])) {$_SESSION['global_nome_aluno'] = "";}
if (!isset($this->sc_temp_global_nome_aluno)) {$this->sc_temp_global_nome_aluno = (isset($_SESSION['global_nome_aluno'])) ? $_SESSION['global_nome_aluno'] : "";}
 $this->nome  = $this->sc_temp_global_nome_aluno ;
$this->curso  = $this->sc_temp_global_curso;
$this->modalidade  = $this->sc_temp_global_modalidade;
$data_auxiliar = $this->sc_temp_global_data_nascimento;
$this->matricula  = $this->sc_temp_global_matricula;
$this->turno  = $this->sc_temp_global_turno;
$this->texto  = $this->sc_temp_global_texto_ficha; 

$this->ano =  substr($data_auxiliar, 0, 4);
$this->mes = substr($data_auxiliar, 5, 2);
$this->dia = substr($data_auxiliar, 8, 2);

$this->dia  = $this->dia;
$this->mes  = $this->mes;
$this->ano  = $this->ano;
if (isset($this->sc_temp_global_nome_aluno)) {$_SESSION['global_nome_aluno'] = $this->sc_temp_global_nome_aluno;}
if (isset($this->sc_temp_global_curso)) {$_SESSION['global_curso'] = $this->sc_temp_global_curso;}
if (isset($this->sc_temp_global_modalidade)) {$_SESSION['global_modalidade'] = $this->sc_temp_global_modalidade;}
if (isset($this->sc_temp_global_data_nascimento)) {$_SESSION['global_data_nascimento'] = $this->sc_temp_global_data_nascimento;}
if (isset($this->sc_temp_global_matricula)) {$_SESSION['global_matricula'] = $this->sc_temp_global_matricula;}
if (isset($this->sc_temp_global_turno)) {$_SESSION['global_turno'] = $this->sc_temp_global_turno;}
if (isset($this->sc_temp_global_texto_ficha)) {$_SESSION['global_texto_ficha'] = $this->sc_temp_global_texto_ficha;}
$_SESSION['scriptcase']['pdfreport_ficha_de_acompanhamento']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";

      $rs->Close();
   }
   //----- id_paciente
   function NM_export_id_paciente()
   {
         nmgp_Form_Num_Val($this->id_paciente, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->id_paciente))
         {
             $this->id_paciente = sc_convert_encoding($this->id_paciente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->id_paciente = str_replace('<', '&lt;', $this->id_paciente);
         $this->id_paciente = str_replace('>', '&gt;', $this->id_paciente);
         $this->Texto_tag .= "<td>" . $this->id_paciente . "</td>\r\n";
   }
   //----- nome
   function NM_export_nome()
   {
         $this->nome = html_entity_decode($this->nome, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->nome))
         {
             $this->nome = sc_convert_encoding($this->nome, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nome = str_replace('<', '&lt;', $this->nome);
         $this->nome = str_replace('>', '&gt;', $this->nome);
         $this->Texto_tag .= "<td>" . $this->nome . "</td>\r\n";
   }
   //----- curso
   function NM_export_curso()
   {
         $this->curso = html_entity_decode($this->curso, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->curso = strip_tags($this->curso);
         if (!NM_is_utf8($this->curso))
         {
             $this->curso = sc_convert_encoding($this->curso, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->curso = str_replace('<', '&lt;', $this->curso);
         $this->curso = str_replace('>', '&gt;', $this->curso);
         $this->Texto_tag .= "<td>" . $this->curso . "</td>\r\n";
   }
   //----- modalidade
   function NM_export_modalidade()
   {
         $this->modalidade = html_entity_decode($this->modalidade, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->modalidade = strip_tags($this->modalidade);
         if (!NM_is_utf8($this->modalidade))
         {
             $this->modalidade = sc_convert_encoding($this->modalidade, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->modalidade = str_replace('<', '&lt;', $this->modalidade);
         $this->modalidade = str_replace('>', '&gt;', $this->modalidade);
         $this->Texto_tag .= "<td>" . $this->modalidade . "</td>\r\n";
   }
   //----- matricula
   function NM_export_matricula()
   {
         $this->matricula = html_entity_decode($this->matricula, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->matricula = strip_tags($this->matricula);
         if (!NM_is_utf8($this->matricula))
         {
             $this->matricula = sc_convert_encoding($this->matricula, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->matricula = str_replace('<', '&lt;', $this->matricula);
         $this->matricula = str_replace('>', '&gt;', $this->matricula);
         $this->Texto_tag .= "<td>" . $this->matricula . "</td>\r\n";
   }
   //----- turno
   function NM_export_turno()
   {
         $this->turno = html_entity_decode($this->turno, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->turno = strip_tags($this->turno);
         if (!NM_is_utf8($this->turno))
         {
             $this->turno = sc_convert_encoding($this->turno, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->turno = str_replace('<', '&lt;', $this->turno);
         $this->turno = str_replace('>', '&gt;', $this->turno);
         $this->Texto_tag .= "<td>" . $this->turno . "</td>\r\n";
   }
   //----- texto
   function NM_export_texto()
   {
         $this->texto = html_entity_decode($this->texto, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->texto))
         {
             $this->texto = sc_convert_encoding($this->texto, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->texto = str_replace('<', '&lt;', $this->texto);
         $this->texto = str_replace('>', '&gt;', $this->texto);
         $this->Texto_tag .= "<td>" . $this->texto . "</td>\r\n";
   }
   //----- dia
   function NM_export_dia()
   {
         $this->dia = html_entity_decode($this->dia, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dia = strip_tags($this->dia);
         if (!NM_is_utf8($this->dia))
         {
             $this->dia = sc_convert_encoding($this->dia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->dia = str_replace('<', '&lt;', $this->dia);
         $this->dia = str_replace('>', '&gt;', $this->dia);
         $this->Texto_tag .= "<td>" . $this->dia . "</td>\r\n";
   }
   //----- mes
   function NM_export_mes()
   {
         $this->mes = html_entity_decode($this->mes, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->mes = strip_tags($this->mes);
         if (!NM_is_utf8($this->mes))
         {
             $this->mes = sc_convert_encoding($this->mes, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->mes = str_replace('<', '&lt;', $this->mes);
         $this->mes = str_replace('>', '&gt;', $this->mes);
         $this->Texto_tag .= "<td>" . $this->mes . "</td>\r\n";
   }
   //----- ano
   function NM_export_ano()
   {
         $this->ano = html_entity_decode($this->ano, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ano = strip_tags($this->ano);
         if (!NM_is_utf8($this->ano))
         {
             $this->ano = sc_convert_encoding($this->ano, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ano = str_replace('<', '&lt;', $this->ano);
         $this->ano = str_replace('>', '&gt;', $this->ano);
         $this->Texto_tag .= "<td>" . $this->ano . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $rtf_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_ficha_de_acompanhamento'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> - paciente :: RTF</TITLE>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="pdfreport_ficha_de_acompanhamento_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_ficha_de_acompanhamento"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
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
