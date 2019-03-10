<?php
//
class form_triagem_pront_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'         => '',
                                'param'          => array(),
                                'autoComp'       => '',
                                'rsSize'         => '',
                                'msgDisplay'     => '',
                                'errList'        => array(),
                                'fldList'        => array(),
                                'focus'          => '',
                                'navStatus'      => array(),
                                'redir'          => array(),
                                'blockDisplay'   => array(),
                                'fieldDisplay'   => array(),
                                'fieldLabel'     => array(),
                                'readOnly'       => array(),
                                'btnVars'        => array(),
                                'ajaxAlert'      => '',
                                'ajaxMessage'    => '',
                                'ajaxJavascript' => array(),
                                'buttonDisplay'  => array(),
                                'calendarReload' => false,
                                'quickSearchRes' => false,
                                'displayMsg'     => false,
                                'displayMsgTxt'  => '',
                                'dyn_search'     => array(),
                                'empty_filter'   => '',
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $id_triagem_;
   var $data_;
   var $hora_;
   var $pa_;
   var $fc_;
   var $fr_;
   var $tc_;
   var $hgt_;
   var $peso_;
   var $altura_;
   var $coren_;
   var $alergia_;
   var $tipo_alergia_;
   var $id_usuario_;
   var $id_usuario__1;
   var $id_paciente_;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_max_reg = 10; 
   var $sc_max_reg_incl = 10; 
   var $form_vert_form_triagem_pront = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = true;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['alergia_']))
          {
              $this->alergia_ = $this->NM_ajax_info['param']['alergia_'];
          }
          if (isset($this->NM_ajax_info['param']['altura_']))
          {
              $this->altura_ = $this->NM_ajax_info['param']['altura_'];
          }
          if (isset($this->NM_ajax_info['param']['coren_']))
          {
              $this->coren_ = $this->NM_ajax_info['param']['coren_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['data_']))
          {
              $this->data_ = $this->NM_ajax_info['param']['data_'];
          }
          if (isset($this->NM_ajax_info['param']['fc_']))
          {
              $this->fc_ = $this->NM_ajax_info['param']['fc_'];
          }
          if (isset($this->NM_ajax_info['param']['fr_']))
          {
              $this->fr_ = $this->NM_ajax_info['param']['fr_'];
          }
          if (isset($this->NM_ajax_info['param']['hgt_']))
          {
              $this->hgt_ = $this->NM_ajax_info['param']['hgt_'];
          }
          if (isset($this->NM_ajax_info['param']['hora_']))
          {
              $this->hora_ = $this->NM_ajax_info['param']['hora_'];
          }
          if (isset($this->NM_ajax_info['param']['id_paciente_']))
          {
              $this->id_paciente_ = $this->NM_ajax_info['param']['id_paciente_'];
          }
          if (isset($this->NM_ajax_info['param']['id_triagem_']))
          {
              $this->id_triagem_ = $this->NM_ajax_info['param']['id_triagem_'];
          }
          if (isset($this->NM_ajax_info['param']['id_usuario_']))
          {
              $this->id_usuario_ = $this->NM_ajax_info['param']['id_usuario_'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['pa_']))
          {
              $this->pa_ = $this->NM_ajax_info['param']['pa_'];
          }
          if (isset($this->NM_ajax_info['param']['peso_']))
          {
              $this->peso_ = $this->NM_ajax_info['param']['peso_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_clone']))
          {
              $this->sc_clone = $this->NM_ajax_info['param']['sc_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_clone']))
          {
              $this->sc_seq_clone = $this->NM_ajax_info['param']['sc_seq_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tc_']))
          {
              $this->tc_ = $this->NM_ajax_info['param']['tc_'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_alergia_']))
          {
              $this->tipo_alergia_ = $this->NM_ajax_info['param']['tipo_alergia_'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      $this->sc_conv_var['id_triagem'] = "id_triagem_";
      $this->sc_conv_var['data'] = "data_";
      $this->sc_conv_var['hora'] = "hora_";
      $this->sc_conv_var['pa'] = "pa_";
      $this->sc_conv_var['fc'] = "fc_";
      $this->sc_conv_var['fr'] = "fr_";
      $this->sc_conv_var['tc'] = "tc_";
      $this->sc_conv_var['hgt'] = "hgt_";
      $this->sc_conv_var['peso'] = "peso_";
      $this->sc_conv_var['altura'] = "altura_";
      $this->sc_conv_var['coren'] = "coren_";
      $this->sc_conv_var['alergia'] = "alergia_";
      $this->sc_conv_var['tipo_alergia'] = "tipo_alergia_";
      $this->sc_conv_var['id_usuario'] = "id_usuario_";
      $this->sc_conv_var['id_paciente'] = "id_paciente_";
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->coren_global) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['coren_global'] = $this->coren_global;
      }
      if (isset($this->id_usuario_global) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['id_usuario_global'] = $this->id_usuario_global;
      }
      if (isset($_POST["coren_global"])) 
      {
          $_SESSION['coren_global'] = $this->coren_global;
      }
      if (isset($_POST["id_usuario_global"])) 
      {
          $_SESSION['id_usuario_global'] = $this->id_usuario_global;
      }
      if (isset($_GET["coren_global"])) 
      {
          $_SESSION['coren_global'] = $this->coren_global;
      }
      if (isset($_GET["id_usuario_global"])) 
      {
          $_SESSION['id_usuario_global'] = $this->id_usuario_global;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $this->NM_where_filter = "";
          $tem_where_parms       = false;
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_triagem_pront($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
                 if ($cadapar[0] == "id_triagem_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "id_triagem = " . $this->id_triagem_;
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
             }
             $ix++;
          }
          if (isset($this->coren_global)) 
          {
              $_SESSION['coren_global'] = $this->coren_global;
          }
          if (isset($this->id_usuario_global)) 
          {
              $_SESSION['id_usuario_global'] = $this->id_usuario_global;
          }
          if ($tem_where_parms)
          {
              $this->NM_where_filter .= ")";
          }
          elseif (empty($this->NM_where_filter))
          {
              unset($this->NM_where_filter);
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->coren_global)) 
          {
              $_SESSION['coren_global'] = $this->coren_global;
          }
          if (isset($this->id_usuario_global)) 
          {
              $_SESSION['id_usuario_global'] = $this->id_usuario_global;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_triagem_pront_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['initialize'])
          {
              $_SESSION['scriptcase']['form_triagem_pront']['contr_erro'] = 'on';
   $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['update'] = 'on';
$_SESSION['scriptcase']['form_triagem_pront']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_triagem_pront']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_triagem_pront']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_triagem_pront'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_triagem_pront']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_triagem_pront']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_triagem_pront') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_triagem_pront']['label'] = "form_triagem_pront";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_triagem_pront")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok_mult)   ? ""     : $str_img_status_ok_mult;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err_mult)  ? ""     : $str_img_status_err_mult;
      $this->Ini->Css_status      = "scFormInputErrorMult";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);



      $_SESSION['scriptcase']['error_icon']['form_triagem_pront']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_triagem_pront'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
      if ('total' == $this->form_paginacao)
      {
          $this->nmgp_botoes['first']   = "off";
          $this->nmgp_botoes['back']    = "off";
          $this->nmgp_botoes['forward'] = "off";
          $this->nmgp_botoes['last']    = "off";
          $this->nmgp_botoes['navpage'] = "off";
          $this->nmgp_botoes['goto']    = "off";
          $this->nmgp_botoes['qtline']  = "off";
          $this->nmgp_botoes['summary'] = "off";
      }
      else
      {
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      }
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_triagem_pront']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_triagem_pront", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 

      if (is_file($this->Ini->path_aplicacao . 'form_triagem_pront_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_triagem_pront_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_triagem_pront/form_triagem_pront_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_triagem_pront_erro.class.php"); 
      }
      $this->Erro      = new form_triagem_pront_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['opcao']))
         { 
             if ($this->id_triagem_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- id_paciente_
      $this->field_config['id_paciente_']               = array();
      $this->field_config['id_paciente_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_paciente_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_paciente_']['symbol_dec'] = '';
      $this->field_config['id_paciente_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_paciente_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- data_
      $this->field_config['data_']                 = array();
      $this->field_config['data_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['data_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['data_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'data_');
      //-- hora_
      $this->field_config['hora_']                 = array();
      $this->field_config['hora_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora_']['date_display'] = "hhiiss";
      $this->new_date_format('HH', 'hora_');
      //-- fc_
      $this->field_config['fc_']               = array();
      $this->field_config['fc_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['fc_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['fc_']['symbol_dec'] = '';
      $this->field_config['fc_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['fc_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fr_
      $this->field_config['fr_']               = array();
      $this->field_config['fr_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['fr_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['fr_']['symbol_dec'] = '';
      $this->field_config['fr_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['fr_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- hgt_
      $this->field_config['hgt_']               = array();
      $this->field_config['hgt_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['hgt_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['hgt_']['symbol_dec'] = '';
      $this->field_config['hgt_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['hgt_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- altura_
      $this->field_config['altura_']               = array();
      $this->field_config['altura_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['altura_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['altura_']['symbol_dec'] = '';
      $this->field_config['altura_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['altura_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_triagem_
      $this->field_config['id_triagem_']               = array();
      $this->field_config['id_triagem_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_triagem_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_triagem_']['symbol_dec'] = '';
      $this->field_config['id_triagem_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_triagem_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['opc_edit'] = true;  
      $sc_contr_vert = $GLOBALS["sc_contr_vert"];
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = NM_utf8_urldecode($this->New_Line);
         $this->NM_close_db();
         form_triagem_pront_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_converte_datas();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         form_triagem_pront_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->pa_)) { $this->nm_limpa_alfa($this->pa_); }
         if (isset($this->fc_)) { $this->nm_limpa_alfa($this->fc_); }
         if (isset($this->fr_)) { $this->nm_limpa_alfa($this->fr_); }
         if (isset($this->tc_)) { $this->nm_limpa_alfa($this->tc_); }
         if (isset($this->hgt_)) { $this->nm_limpa_alfa($this->hgt_); }
         if (isset($this->peso_)) { $this->nm_limpa_alfa($this->peso_); }
         if (isset($this->altura_)) { $this->nm_limpa_alfa($this->altura_); }
         if (isset($this->coren_)) { $this->nm_limpa_alfa($this->coren_); }
         if (isset($this->alergia_)) { $this->nm_limpa_alfa($this->alergia_); }
         if (isset($this->tipo_alergia_)) { $this->nm_limpa_alfa($this->tipo_alergia_); }
         if (isset($this->id_usuario_)) { $this->nm_limpa_alfa($this->id_usuario_); }
         if (isset($this->id_paciente_)) { $this->nm_limpa_alfa($this->id_paciente_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_form'][$sc_seq_vert];
             $this->id_triagem_ = $this->nmgp_dados_form['id_triagem_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_form_triagem_pront']) || !is_array($this->NM_ajax_info['errList']['geral_form_triagem_pront']))
                  {
                      $this->NM_ajax_info['errList']['geral_form_triagem_pront'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_triagem_pront'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_form_triagem_pront'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_triagem_pront'][] = $this->Campos_Mens_erro;
                  }
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
         }
         $this->NM_close_db();
         form_triagem_pront_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_id_paciente_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_paciente_');
          }
          if ('validate_data_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_');
          }
          if ('validate_hora_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_');
          }
          if ('validate_pa_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pa_');
          }
          if ('validate_fc_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fc_');
          }
          if ('validate_fr_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fr_');
          }
          if ('validate_tc_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tc_');
          }
          if ('validate_hgt_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hgt_');
          }
          if ('validate_peso_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'peso_');
          }
          if ('validate_altura_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'altura_');
          }
          if ('validate_coren_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'coren_');
          }
          if ('validate_alergia_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'alergia_');
          }
          if ('validate_tipo_alergia_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_alergia_');
          }
          if ('validate_id_usuario_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_usuario_');
          }
          form_triagem_pront_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->id_paciente_ = $GLOBALS["id_paciente_" . $sc_seq_vert]; 
         $this->data_ = $GLOBALS["data_" . $sc_seq_vert]; 
         $this->hora_ = $GLOBALS["hora_" . $sc_seq_vert]; 
         $this->pa_ = $GLOBALS["pa_" . $sc_seq_vert]; 
         $this->fc_ = $GLOBALS["fc_" . $sc_seq_vert]; 
         $this->fr_ = $GLOBALS["fr_" . $sc_seq_vert]; 
         $this->tc_ = $GLOBALS["tc_" . $sc_seq_vert]; 
         $this->hgt_ = $GLOBALS["hgt_" . $sc_seq_vert]; 
         $this->peso_ = $GLOBALS["peso_" . $sc_seq_vert]; 
         $this->altura_ = $GLOBALS["altura_" . $sc_seq_vert]; 
         $this->coren_ = $GLOBALS["coren_" . $sc_seq_vert]; 
         $this->alergia_ = $GLOBALS["alergia_" . $sc_seq_vert]; 
         $this->tipo_alergia_ = $GLOBALS["tipo_alergia_" . $sc_seq_vert]; 
         $this->id_usuario_ = $GLOBALS["id_usuario_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_form'][$sc_seq_vert];
             $this->id_triagem_ = $this->nmgp_dados_form['id_triagem_']; 
         }
         if (isset($this->pa_)) { $this->nm_limpa_alfa($this->pa_); }
         if (isset($this->fc_)) { $this->nm_limpa_alfa($this->fc_); }
         if (isset($this->fr_)) { $this->nm_limpa_alfa($this->fr_); }
         if (isset($this->tc_)) { $this->nm_limpa_alfa($this->tc_); }
         if (isset($this->hgt_)) { $this->nm_limpa_alfa($this->hgt_); }
         if (isset($this->peso_)) { $this->nm_limpa_alfa($this->peso_); }
         if (isset($this->altura_)) { $this->nm_limpa_alfa($this->altura_); }
         if (isset($this->coren_)) { $this->nm_limpa_alfa($this->coren_); }
         if (isset($this->alergia_)) { $this->nm_limpa_alfa($this->alergia_); }
         if (isset($this->tipo_alergia_)) { $this->nm_limpa_alfa($this->tipo_alergia_); }
         if (isset($this->id_usuario_)) { $this->nm_limpa_alfa($this->id_usuario_); }
         if (isset($this->id_paciente_)) { $this->nm_limpa_alfa($this->id_paciente_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && in_array($sc_seq_vert, $sc_check_excl))
         {
             $this->nmgp_opcao = "excluir";
         }
         if ($this->nmgp_opcao == "incluir" && !in_array($sc_seq_vert, $sc_check_incl))
         { }
         else
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_disabled'] = array();
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['id_paciente_'] =  $this->id_paciente_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['data_'] =  $this->data_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['hora_'] =  $this->hora_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['pa_'] =  $this->pa_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['fc_'] =  $this->fc_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['fr_'] =  $this->fr_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['tc_'] =  $this->tc_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['hgt_'] =  $this->hgt_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['peso_'] =  $this->peso_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['altura_'] =  $this->altura_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['coren_'] =  $this->coren_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['alergia_'] =  $this->alergia_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['tipo_alergia_'] =  $this->tipo_alergia_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['id_usuario_'] =  $this->id_usuario_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['id_triagem_'] =  $this->id_triagem_; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && (!$this->NM_ajax_flag || 'event_' != substr($this->NM_ajax_opcao, 0, 6))) 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt || $this->sc_teve_excl) 
          { 
              $this->sc_after_all_update = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          form_triagem_pront_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_triagem_pront);
          $this->NM_ajax_info['fldList']['id_triagem_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['id_triagem_']);
          $this->NM_close_db();
          form_triagem_pront_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_alergia__onclick' == $this->NM_ajax_opcao)
          {
              $this->alergia__onClick();
          }
          $this->NM_close_db();
          form_triagem_pront_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      $this->nm_gera_html();
      $this->NM_close_db(); 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, $Campos_Erros, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> 
//
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_triagem_pront_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_triagem_pront']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'id_paciente_':
               return "Nome do Paciente";
               break;
           case 'data_':
               return "Data";
               break;
           case 'hora_':
               return "Hora";
               break;
           case 'pa_':
               return "PA (mmHg)";
               break;
           case 'fc_':
               return "FC (bpm)";
               break;
           case 'fr_':
               return "FR (rpm)";
               break;
           case 'tc_':
               return "T (ºC)";
               break;
           case 'hgt_':
               return "HGT (mg/dl)";
               break;
           case 'peso_':
               return "Peso (kg)";
               break;
           case 'altura_':
               return "Altura (cm)";
               break;
           case 'coren_':
               return "Coren";
               break;
           case 'alergia_':
               return "Alergia";
               break;
           case 'tipo_alergia_':
               return "Tipo Alergia";
               break;
           case 'id_usuario_':
               return "Id Usuario";
               break;
           case 'id_triagem_':
               return "Id Triagem";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_triagem_pront']) || !is_array($this->NM_ajax_info['errList']['geral_form_triagem_pront']))
              {
                  $this->NM_ajax_info['errList']['geral_form_triagem_pront'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_triagem_pront'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id_paciente_' == $filtro)
        $this->ValidateField_id_paciente_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data_' == $filtro)
        $this->ValidateField_data_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hora_' == $filtro)
        $this->ValidateField_hora_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pa_' == $filtro)
        $this->ValidateField_pa_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fc_' == $filtro)
        $this->ValidateField_fc_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fr_' == $filtro)
        $this->ValidateField_fr_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tc_' == $filtro)
        $this->ValidateField_tc_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hgt_' == $filtro)
        $this->ValidateField_hgt_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'peso_' == $filtro)
        $this->ValidateField_peso_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'altura_' == $filtro)
        $this->ValidateField_altura_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'coren_' == $filtro)
        $this->ValidateField_coren_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'alergia_' == $filtro)
        $this->ValidateField_alergia_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo_alergia_' == $filtro)
        $this->ValidateField_tipo_alergia_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_usuario_' == $filtro)
        $this->ValidateField_id_usuario_($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
      $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_id_paciente_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_paciente_ == "")  
      { 
          $this->id_paciente_ = 0;
          $this->sc_force_zero[] = 'id_paciente_';
      } 
      nm_limpa_numero($this->id_paciente_, $this->field_config['id_paciente_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_paciente_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id_paciente_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Nome do Paciente: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_paciente_']))
                  {
                      $Campos_Erros['id_paciente_'] = array();
                  }
                  $Campos_Erros['id_paciente_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_paciente_']) || !is_array($this->NM_ajax_info['errList']['id_paciente_']))
                  {
                      $this->NM_ajax_info['errList']['id_paciente_'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_paciente_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_paciente_, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Nome do Paciente; " ; 
                  if (!isset($Campos_Erros['id_paciente_']))
                  {
                      $Campos_Erros['id_paciente_'] = array();
                  }
                  $Campos_Erros['id_paciente_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_paciente_']) || !is_array($this->NM_ajax_info['errList']['id_paciente_']))
                  {
                      $this->NM_ajax_info['errList']['id_paciente_'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_paciente_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id_paciente_

    function ValidateField_data_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->data_, $this->field_config['data_']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_']['date_sep']) ; 
          if (trim($this->data_) != "")  
          { 
              if ($teste_validade->Data($this->data_, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Data; " ; 
                  if (!isset($Campos_Erros['data_']))
                  {
                      $Campos_Erros['data_'] = array();
                  }
                  $Campos_Erros['data_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_']) || !is_array($this->NM_ajax_info['errList']['data_']))
                  {
                      $this->NM_ajax_info['errList']['data_'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['php_cmp_required']['data_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['php_cmp_required']['data_'] == "on") 
           { 
              $Campos_Falta[] = "Data" ; 
              if (!isset($Campos_Erros['data_']))
              {
                  $Campos_Erros['data_'] = array();
              }
              $Campos_Erros['data_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['data_']) || !is_array($this->NM_ajax_info['errList']['data_']))
                  {
                      $this->NM_ajax_info['errList']['data_'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['data_']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_data_

    function ValidateField_hora_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_hora($this->hora_, $this->field_config['hora_']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora_']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora_']['time_sep']) ; 
          if (trim($this->hora_) != "")  
          { 
              if ($teste_validade->Hora($this->hora_, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Hora; " ; 
                  if (!isset($Campos_Erros['hora_']))
                  {
                      $Campos_Erros['hora_'] = array();
                  }
                  $Campos_Erros['hora_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora_']) || !is_array($this->NM_ajax_info['errList']['hora_']))
                  {
                      $this->NM_ajax_info['errList']['hora_'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['php_cmp_required']['hora_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['php_cmp_required']['hora_'] == "on") 
           { 
              $Campos_Falta[] = "Hora" ; 
              if (!isset($Campos_Erros['hora_']))
              {
                  $Campos_Erros['hora_'] = array();
              }
              $Campos_Erros['hora_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['hora_']) || !is_array($this->NM_ajax_info['errList']['hora_']))
                  {
                      $this->NM_ajax_info['errList']['hora_'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_hora_

    function ValidateField_pa_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pa_) > 11) 
          { 
              $Campos_Crit .= "PA (mmHg) " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pa_']))
              {
                  $Campos_Erros['pa_'] = array();
              }
              $Campos_Erros['pa_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pa_']) || !is_array($this->NM_ajax_info['errList']['pa_']))
              {
                  $this->NM_ajax_info['errList']['pa_'] = array();
              }
              $this->NM_ajax_info['errList']['pa_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->pa_ ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->pa_, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $Campos_Crit .= "PA (mmHg) " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['pa_']))
              {
                  $Campos_Erros['pa_'] = array();
              }
              $Campos_Erros['pa_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['pa_']) || !is_array($this->NM_ajax_info['errList']['pa_']))
              {
                  $this->NM_ajax_info['errList']['pa_'] = array();
              }
              $this->NM_ajax_info['errList']['pa_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
    } // ValidateField_pa_

    function ValidateField_fc_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->fc_ == "")  
      { 
          $this->fc_ = 0;
          $this->sc_force_zero[] = 'fc_';
      } 
      nm_limpa_numero($this->fc_, $this->field_config['fc_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->fc_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->fc_) > $iTestSize)  
              { 
                  $Campos_Crit .= "FC (bpm): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['fc_']))
                  {
                      $Campos_Erros['fc_'] = array();
                  }
                  $Campos_Erros['fc_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['fc_']) || !is_array($this->NM_ajax_info['errList']['fc_']))
                  {
                      $this->NM_ajax_info['errList']['fc_'] = array();
                  }
                  $this->NM_ajax_info['errList']['fc_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->fc_, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "FC (bpm); " ; 
                  if (!isset($Campos_Erros['fc_']))
                  {
                      $Campos_Erros['fc_'] = array();
                  }
                  $Campos_Erros['fc_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fc_']) || !is_array($this->NM_ajax_info['errList']['fc_']))
                  {
                      $this->NM_ajax_info['errList']['fc_'] = array();
                  }
                  $this->NM_ajax_info['errList']['fc_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_fc_

    function ValidateField_fr_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->fr_ == "")  
      { 
          $this->fr_ = 0;
          $this->sc_force_zero[] = 'fr_';
      } 
      nm_limpa_numero($this->fr_, $this->field_config['fr_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->fr_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->fr_) > $iTestSize)  
              { 
                  $Campos_Crit .= "FR (rpm): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['fr_']))
                  {
                      $Campos_Erros['fr_'] = array();
                  }
                  $Campos_Erros['fr_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['fr_']) || !is_array($this->NM_ajax_info['errList']['fr_']))
                  {
                      $this->NM_ajax_info['errList']['fr_'] = array();
                  }
                  $this->NM_ajax_info['errList']['fr_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->fr_, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "FR (rpm); " ; 
                  if (!isset($Campos_Erros['fr_']))
                  {
                      $Campos_Erros['fr_'] = array();
                  }
                  $Campos_Erros['fr_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fr_']) || !is_array($this->NM_ajax_info['errList']['fr_']))
                  {
                      $this->NM_ajax_info['errList']['fr_'] = array();
                  }
                  $this->NM_ajax_info['errList']['fr_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_fr_

    function ValidateField_tc_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tc_) > 12) 
          { 
              $Campos_Crit .= "T (ºC) " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tc_']))
              {
                  $Campos_Erros['tc_'] = array();
              }
              $Campos_Erros['tc_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tc_']) || !is_array($this->NM_ajax_info['errList']['tc_']))
              {
                  $this->NM_ajax_info['errList']['tc_'] = array();
              }
              $this->NM_ajax_info['errList']['tc_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "0123456789,0123456789,";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->tc_ ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->tc_, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $Campos_Crit .= "T (ºC) " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['tc_']))
              {
                  $Campos_Erros['tc_'] = array();
              }
              $Campos_Erros['tc_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['tc_']) || !is_array($this->NM_ajax_info['errList']['tc_']))
              {
                  $this->NM_ajax_info['errList']['tc_'] = array();
              }
              $this->NM_ajax_info['errList']['tc_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
    } // ValidateField_tc_

    function ValidateField_hgt_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->hgt_ == "")  
      { 
          $this->hgt_ = 0;
          $this->sc_force_zero[] = 'hgt_';
      } 
      nm_limpa_numero($this->hgt_, $this->field_config['hgt_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->hgt_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->hgt_) > $iTestSize)  
              { 
                  $Campos_Crit .= "HGT (mg/dl): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['hgt_']))
                  {
                      $Campos_Erros['hgt_'] = array();
                  }
                  $Campos_Erros['hgt_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['hgt_']) || !is_array($this->NM_ajax_info['errList']['hgt_']))
                  {
                      $this->NM_ajax_info['errList']['hgt_'] = array();
                  }
                  $this->NM_ajax_info['errList']['hgt_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->hgt_, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "HGT (mg/dl); " ; 
                  if (!isset($Campos_Erros['hgt_']))
                  {
                      $Campos_Erros['hgt_'] = array();
                  }
                  $Campos_Erros['hgt_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hgt_']) || !is_array($this->NM_ajax_info['errList']['hgt_']))
                  {
                      $this->NM_ajax_info['errList']['hgt_'] = array();
                  }
                  $this->NM_ajax_info['errList']['hgt_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_hgt_

    function ValidateField_peso_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->peso_) > 12) 
          { 
              $Campos_Crit .= "Peso (kg) " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['peso_']))
              {
                  $Campos_Erros['peso_'] = array();
              }
              $Campos_Erros['peso_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['peso_']) || !is_array($this->NM_ajax_info['errList']['peso_']))
              {
                  $this->NM_ajax_info['errList']['peso_'] = array();
              }
              $this->NM_ajax_info['errList']['peso_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 12 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "0123456789,0123456789,";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->peso_ ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->peso_, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $Campos_Crit .= "Peso (kg) " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['peso_']))
              {
                  $Campos_Erros['peso_'] = array();
              }
              $Campos_Erros['peso_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['peso_']) || !is_array($this->NM_ajax_info['errList']['peso_']))
              {
                  $this->NM_ajax_info['errList']['peso_'] = array();
              }
              $this->NM_ajax_info['errList']['peso_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
    } // ValidateField_peso_

    function ValidateField_altura_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->altura_ == "")  
      { 
          $this->altura_ = 0;
          $this->sc_force_zero[] = 'altura_';
      } 
      nm_limpa_numero($this->altura_, $this->field_config['altura_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->altura_ != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->altura_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Altura (cm): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['altura_']))
                  {
                      $Campos_Erros['altura_'] = array();
                  }
                  $Campos_Erros['altura_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['altura_']) || !is_array($this->NM_ajax_info['errList']['altura_']))
                  {
                      $this->NM_ajax_info['errList']['altura_'] = array();
                  }
                  $this->NM_ajax_info['errList']['altura_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->altura_, 12, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Altura (cm); " ; 
                  if (!isset($Campos_Erros['altura_']))
                  {
                      $Campos_Erros['altura_'] = array();
                  }
                  $Campos_Erros['altura_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['altura_']) || !is_array($this->NM_ajax_info['errList']['altura_']))
                  {
                      $this->NM_ajax_info['errList']['altura_'] = array();
                  }
                  $this->NM_ajax_info['errList']['altura_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_altura_

    function ValidateField_coren_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->coren_) > 25) 
          { 
              $Campos_Crit .= "Coren " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['coren_']))
              {
                  $Campos_Erros['coren_'] = array();
              }
              $Campos_Erros['coren_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['coren_']) || !is_array($this->NM_ajax_info['errList']['coren_']))
              {
                  $this->NM_ajax_info['errList']['coren_'] = array();
              }
              $this->NM_ajax_info['errList']['coren_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_coren_

    function ValidateField_alergia_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->alergia_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->alergia_ != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_alergia_']) && !in_array($this->alergia_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_alergia_']))
          {
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['alergia_']))
              {
                  $Campos_Erros['alergia_'] = array();
              }
              $Campos_Erros['alergia_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['alergia_']) || !is_array($this->NM_ajax_info['errList']['alergia_']))
              {
                  $this->NM_ajax_info['errList']['alergia_'] = array();
              }
              $this->NM_ajax_info['errList']['alergia_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
    } // ValidateField_alergia_

    function ValidateField_tipo_alergia_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipo_alergia_) > 120) 
          { 
              $Campos_Crit .= "Tipo Alergia " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipo_alergia_']))
              {
                  $Campos_Erros['tipo_alergia_'] = array();
              }
              $Campos_Erros['tipo_alergia_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipo_alergia_']) || !is_array($this->NM_ajax_info['errList']['tipo_alergia_']))
              {
                  $this->NM_ajax_info['errList']['tipo_alergia_'] = array();
              }
              $this->NM_ajax_info['errList']['tipo_alergia_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_tipo_alergia_

    function ValidateField_id_usuario_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_usuario_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_']) && !in_array($this->id_usuario_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_usuario_']))
                   {
                       $Campos_Erros['id_usuario_'] = array();
                   }
                   $Campos_Erros['id_usuario_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_usuario_']) || !is_array($this->NM_ajax_info['errList']['id_usuario_']))
                   {
                       $this->NM_ajax_info['errList']['id_usuario_'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_usuario_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_usuario_

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['id_paciente_'] = $this->id_paciente_;
    $this->nmgp_dados_form['data_'] = $this->data_;
    $this->nmgp_dados_form['hora_'] = $this->hora_;
    $this->nmgp_dados_form['pa_'] = $this->pa_;
    $this->nmgp_dados_form['fc_'] = $this->fc_;
    $this->nmgp_dados_form['fr_'] = $this->fr_;
    $this->nmgp_dados_form['tc_'] = $this->tc_;
    $this->nmgp_dados_form['hgt_'] = $this->hgt_;
    $this->nmgp_dados_form['peso_'] = $this->peso_;
    $this->nmgp_dados_form['altura_'] = $this->altura_;
    $this->nmgp_dados_form['coren_'] = $this->coren_;
    $this->nmgp_dados_form['alergia_'] = $this->alergia_;
    $this->nmgp_dados_form['tipo_alergia_'] = $this->tipo_alergia_;
    $this->nmgp_dados_form['id_usuario_'] = $this->id_usuario_;
    $this->nmgp_dados_form['id_triagem_'] = $this->id_triagem_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->id_paciente_, $this->field_config['id_paciente_']['symbol_grp']) ; 
      nm_limpa_data($this->data_, $this->field_config['data_']['date_sep']) ; 
      nm_limpa_hora($this->hora_, $this->field_config['hora_']['time_sep']) ; 
      nm_limpa_numero($this->fc_, $this->field_config['fc_']['symbol_grp']) ; 
      nm_limpa_numero($this->fr_, $this->field_config['fr_']['symbol_grp']) ; 
      nm_limpa_numero($this->hgt_, $this->field_config['hgt_']['symbol_grp']) ; 
      nm_limpa_numero($this->altura_, $this->field_config['altura_']['symbol_grp']) ; 
      nm_limpa_numero($this->id_triagem_, $this->field_config['id_triagem_']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~ei', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "id_paciente_")
      {
          nm_limpa_numero($this->id_paciente_, $this->field_config['id_paciente_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "fc_")
      {
          nm_limpa_numero($this->fc_, $this->field_config['fc_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "fr_")
      {
          nm_limpa_numero($this->fr_, $this->field_config['fr_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "hgt_")
      {
          nm_limpa_numero($this->hgt_, $this->field_config['hgt_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "altura_")
      {
          nm_limpa_numero($this->altura_, $this->field_config['altura_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_triagem_")
      {
          nm_limpa_numero($this->id_triagem_, $this->field_config['id_triagem_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if (!empty($this->id_paciente_) || (!empty($format_fields) && isset($format_fields['id_paciente_'])))
      {
          nmgp_Form_Num_Val($this->id_paciente_, $this->field_config['id_paciente_']['symbol_grp'], $this->field_config['id_paciente_']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id_paciente_']['symbol_fmt']) ; 
      }
      if ((!empty($this->data_) && 'null' != $this->data_) || (!empty($format_fields) && isset($format_fields['data_'])))
      {
          nm_volta_data($this->data_, $this->field_config['data_']['date_format']) ; 
          nmgp_Form_Datas($this->data_, $this->field_config['data_']['date_format'], $this->field_config['data_']['date_sep']) ;  
      }
      elseif ('null' == $this->data_ || '' == $this->data_)
      {
          $this->data_ = '';
      }
      if ((!empty($this->hora_) && 'null' != $this->hora_) || (!empty($format_fields) && isset($format_fields['hora_'])))
      {
          nm_volta_hora($this->hora_, $this->field_config['hora_']['date_format']) ; 
          nmgp_Form_Hora($this->hora_, $this->field_config['hora_']['date_format'], $this->field_config['hora_']['time_sep']) ;  
      }
      elseif ('null' == $this->hora_ || '' == $this->hora_)
      {
          $this->hora_ = '';
      }
      if (!empty($this->fc_) || (!empty($format_fields) && isset($format_fields['fc_'])))
      {
          nmgp_Form_Num_Val($this->fc_, $this->field_config['fc_']['symbol_grp'], $this->field_config['fc_']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['fc_']['symbol_fmt']) ; 
      }
      if (!empty($this->fr_) || (!empty($format_fields) && isset($format_fields['fr_'])))
      {
          nmgp_Form_Num_Val($this->fr_, $this->field_config['fr_']['symbol_grp'], $this->field_config['fr_']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['fr_']['symbol_fmt']) ; 
      }
      if (!empty($this->hgt_) || (!empty($format_fields) && isset($format_fields['hgt_'])))
      {
          nmgp_Form_Num_Val($this->hgt_, $this->field_config['hgt_']['symbol_grp'], $this->field_config['hgt_']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['hgt_']['symbol_fmt']) ; 
      }
      if (!empty($this->altura_) || (!empty($format_fields) && isset($format_fields['altura_'])))
      {
          nmgp_Form_Num_Val($this->altura_, $this->field_config['altura_']['symbol_grp'], $this->field_config['altura_']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['altura_']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['data_']['date_format'];
      if ($this->data_ != "")  
      { 
          nm_conv_data($this->data_, $this->field_config['data_']['date_format']) ; 
          $this->data__hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->data__hora = substr($this->data__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->data__hora = substr($this->data__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->data__hora = substr($this->data__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->data__hora = substr($this->data__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->data__hora = substr($this->data__hora, 0, -4);
          }
      } 
      if ($this->data_ == "" && $use_null)  
      { 
          $this->data_ = "null" ; 
      } 
      $this->field_config['data_']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['hora_']['date_format'];
      if ($this->hora_ != "")  
      { 
          $this->hora__hora = $this->hora_;
          $this->hora_ = "1900-01-01";
          nm_conv_hora($this->hora__hora, $this->field_config['hora_']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hora__hora = substr($this->hora__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora__hora = substr($this->hora__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hora__hora = substr($this->hora__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hora__hora = substr($this->hora__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hora__hora = substr($this->hora__hora, 0, -4);
          }
          $this->hora_ = $this->hora__hora;
      } 
      if ($this->hora_ == "" && $use_null)  
      { 
          $this->hora_ = "null" ; 
      } 
      $this->field_config['hora_']['date_format'] = $guarda_format_hora;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_triagem_']['keyVal'] = form_triagem_pront_pack_protect_string($this->nmgp_dados_form['id_triagem_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['id_paciente_']) && $this->NM_ajax_changed['id_paciente_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['id_paciente_'] = $this->id_paciente_;
                  }
                  if (isset($this->NM_ajax_changed['data_']) && $this->NM_ajax_changed['data_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['data_'] = $this->data_;
                  }
                  if (isset($this->NM_ajax_changed['hora_']) && $this->NM_ajax_changed['hora_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['hora_'] = $this->hora_;
                  }
                  if (isset($this->NM_ajax_changed['pa_']) && $this->NM_ajax_changed['pa_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['pa_'] = $this->pa_;
                  }
                  if (isset($this->NM_ajax_changed['fc_']) && $this->NM_ajax_changed['fc_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['fc_'] = $this->fc_;
                  }
                  if (isset($this->NM_ajax_changed['fr_']) && $this->NM_ajax_changed['fr_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['fr_'] = $this->fr_;
                  }
                  if (isset($this->NM_ajax_changed['tc_']) && $this->NM_ajax_changed['tc_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['tc_'] = $this->tc_;
                  }
                  if (isset($this->NM_ajax_changed['hgt_']) && $this->NM_ajax_changed['hgt_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['hgt_'] = $this->hgt_;
                  }
                  if (isset($this->NM_ajax_changed['peso_']) && $this->NM_ajax_changed['peso_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['peso_'] = $this->peso_;
                  }
                  if (isset($this->NM_ajax_changed['altura_']) && $this->NM_ajax_changed['altura_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['altura_'] = $this->altura_;
                  }
                  if (isset($this->NM_ajax_changed['coren_']) && $this->NM_ajax_changed['coren_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['coren_'] = $this->coren_;
                  }
                  if (isset($this->NM_ajax_changed['alergia_']) && $this->NM_ajax_changed['alergia_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['alergia_'] = $this->alergia_;
                  }
                  if (isset($this->NM_ajax_changed['tipo_alergia_']) && $this->NM_ajax_changed['tipo_alergia_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['tipo_alergia_'] = $this->tipo_alergia_;
                  }
                  if (isset($this->NM_ajax_changed['id_usuario_']) && $this->NM_ajax_changed['id_usuario_'])
                  {
                      $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['id_usuario_'] = $this->id_usuario_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['pa_'] = $this->pa_;
              $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['tc_'] = $this->tc_;
              $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['coren_'] = $this->coren_;
              $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['alergia_'] = $this->alergia_;
              $this->form_vert_form_triagem_pront[$this->nmgp_refresh_row]['tipo_alergia_'] = $this->tipo_alergia_;
          }
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_triagem_pront);
          foreach($this->form_vert_form_triagem_pront as $sc_seq_vert => $aRecData)
          {
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_paciente_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_paciente_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['id_paciente_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['data_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['data_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['hora_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['hora_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pa_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['pa_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['pa_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fc_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['fc_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['fc_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fr_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['fr_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['fr_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tc_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tc_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['tc_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hgt_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['hgt_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['hgt_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("peso_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['peso_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['peso_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("altura_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['altura_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['altura_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("coren_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['coren_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['coren_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("alergia_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['alergia_']);
                  $aLookup = array();
$aLookup[] = array(form_triagem_pront_pack_protect_string('sim') => form_triagem_pront_pack_protect_string("Sim"));
$aLookup[] = array(form_triagem_pront_pack_protect_string('nao') => form_triagem_pront_pack_protect_string("Não"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_alergia_'][] = 'sim';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_alergia_'][] = 'nao';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['alergia_']) && !empty($this->NM_ajax_info['select_html']['alergia_']))
          {
              eval("\$sOptComp = \"" . $this->NM_ajax_info['select_html']['alergia_'] . "\";");
          }
                  $this->NM_ajax_info['fldList']['alergia_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'radio',
                       'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['alergia_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['alergia_' . $sc_seq_vert]['valList'][$i] = form_triagem_pront_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['alergia_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['alergia_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['alergia_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_alergia_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tipo_alergia_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['tipo_alergia_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_usuario_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_usuario_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_paciente_ = $this->id_paciente_;
   $old_value_data_ = $this->data_;
   $old_value_hora_ = $this->hora_;
   $old_value_fc_ = $this->fc_;
   $old_value_fr_ = $this->fr_;
   $old_value_hgt_ = $this->hgt_;
   $old_value_altura_ = $this->altura_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_paciente_ = $this->id_paciente_;
   $unformatted_value_data_ = $this->data_;
   $unformatted_value_hora_ = $this->hora_;
   $unformatted_value_fc_ = $this->fc_;
   $unformatted_value_fr_ = $this->fr_;
   $unformatted_value_hgt_ = $this->hgt_;
   $unformatted_value_altura_ = $this->altura_;

   $nm_comando = "SELECT id_usuario, id_usuario FROM usuario ORDER BY id_usuario";

   $this->id_paciente_ = $old_value_id_paciente_;
   $this->data_ = $old_value_data_;
   $this->hora_ = $old_value_hora_;
   $this->fc_ = $old_value_fc_;
   $this->fr_ = $old_value_fr_;
   $this->hgt_ = $old_value_hgt_;
   $this->altura_ = $old_value_altura_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[1] = str_replace(',', '.', $rs->fields[1]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[1] = (strpos(strtolower($rs->fields[1]), "e")) ? (float)$rs->fields[1] : $rs->fields[1];
              $rs->fields[1] = (string)$rs->fields[1];
              $aLookup[] = array(form_triagem_pront_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_triagem_pront_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"id_usuario_\"";
          if (isset($this->NM_ajax_info['select_html']['id_usuario_']) && !empty($this->NM_ajax_info['select_html']['id_usuario_']))
          {
              eval("\$sSelComp = \"" . $this->NM_ajax_info['select_html']['id_usuario_'] . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['id_usuario_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_usuario_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_usuario_' . $sc_seq_vert]['valList'][$i] = form_triagem_pront_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_usuario_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_usuario_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_usuario_' . $sc_seq_vert]['labList'] = $aLabel;
              }
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload_record($sc_seq_vert=0)
  {
  }
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_triagem_pront']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_id_paciente_ = $this->id_paciente_;
    $original_id_usuario_ = $this->id_usuario_;
    $original_tipo_alergia_ = $this->tipo_alergia_;
}
if (!isset($this->sc_temp_coren_global)) {$this->sc_temp_coren_global = (isset($_SESSION['coren_global'])) ? $_SESSION['coren_global'] : "";}
if (!isset($this->sc_temp_id_usuario_global)) {$this->sc_temp_id_usuario_global = (isset($_SESSION['id_usuario_global'])) ? $_SESSION['id_usuario_global'] : "";}
   $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;

$this->id_usuario_  = $this->sc_temp_id_usuario_global;

 
      $nm_select = "select s.id_servidor_saude, s.cargo from servidor_saude s, usuario u where s.id_servidor_saude = u.id_servidor_saude and u.id_usuario = $this->id_usuario_ "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->DS_servidor = array();
      $this->ds_servidor = array();
     if ($this->id_usuario_ !== "")
     { 
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]);
                 $rx->fields[0] = (strpos(strtolower($rx->fields[0]), "e")) ? (float)$rx->fields[0] : $rx->fields[0];
                 $rx->fields[0] = (string)$rx->fields[0];
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->DS_servidor[$y] [$x] = $rx->fields[$x];
                      $this->ds_servidor[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->DS_servidor = false;
          $this->DS_servidor_erro = $this->Db->ErrorMsg();
          $this->ds_servidor = false;
          $this->ds_servidor_erro = $this->Db->ErrorMsg();
      } 
     } 
;

if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

$id_servidor_saude = $this->ds_servidor[0][0];
$cargo = $this->ds_servidor[0][1];

if($cargo == "tecnico" || $cargo == "enfermeiro" || $cargo == "gestor_coren"){

	 
      $nm_select = "select coren from enfermagem where id_servidor_saude = $id_servidor_saude"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->DS_enfermagem = array();
      $this->ds_enfermagem = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->DS_enfermagem[$y] [$x] = $rx->fields[$x];
                      $this->ds_enfermagem[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->DS_enfermagem = false;
          $this->DS_enfermagem_erro = $this->Db->ErrorMsg();
          $this->ds_enfermagem = false;
          $this->ds_enfermagem_erro = $this->Db->ErrorMsg();
      } 
;
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


	$this->sc_temp_coren_global = $this->ds_enfermagem[0][0];

} else{
	$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;
}

$this->nmgp_cmp_hidden["tipo_alergia_"] = "off"; $this->NM_ajax_info['fieldDisplay']['tipo_alergia_'] = 'off';	
$this->sc_field_readonly("id_paciente_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
if (isset($this->sc_temp_id_usuario_global)) { $_SESSION['id_usuario_global'] = $this->sc_temp_id_usuario_global;}
if (isset($this->sc_temp_coren_global)) { $_SESSION['coren_global'] = $this->sc_temp_coren_global;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_id_paciente_ != $this->id_paciente_ || (isset($bFlagRead_id_paciente_) && $bFlagRead_id_paciente_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['id_paciente_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['id_paciente_' . $this->nmgp_refresh_row]['valList'] = array($this->id_paciente_);
        $this->NM_ajax_changed['id_paciente_'] = true;
    }
    if (($original_id_usuario_ != $this->id_usuario_ || (isset($bFlagRead_id_usuario_) && $bFlagRead_id_usuario_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['id_usuario_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['id_usuario_' . $this->nmgp_refresh_row]['valList'] = array($this->id_usuario_);
        $this->NM_ajax_changed['id_usuario_'] = true;
    }
    if (($original_tipo_alergia_ != $this->tipo_alergia_ || (isset($bFlagRead_tipo_alergia_) && $bFlagRead_tipo_alergia_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['tipo_alergia_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['tipo_alergia_' . $this->nmgp_refresh_row]['valList'] = array($this->tipo_alergia_);
        $this->NM_ajax_changed['tipo_alergia_'] = true;
    }
}
$_SESSION['scriptcase']['form_triagem_pront']['contr_erro'] = 'off'; 
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_triagem_pront']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_coren_ = $this->coren_;
}
if (!isset($this->sc_temp_coren_global)) {$this->sc_temp_coren_global = (isset($_SESSION['coren_global'])) ? $_SESSION['coren_global'] : "";}
   $this->coren_  = $this->sc_temp_coren_global;
if (isset($this->sc_temp_coren_global)) { $_SESSION['coren_global'] = $this->sc_temp_coren_global;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_coren_ != $this->coren_ || (isset($bFlagRead_coren_) && $bFlagRead_coren_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['coren_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['coren_' . $this->nmgp_refresh_row]['valList'] = array($this->coren_);
        $this->NM_ajax_changed['coren_'] = true;
    }
}
$_SESSION['scriptcase']['form_triagem_pront']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      $SC_tem_cmp_update = true; 
      if ($this->nmgp_opcao == "alterar")
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['id_paciente_'] == $this->id_paciente_ &&
              $this->nmgp_dados_select['data_'] == $this->data_ &&
              $this->nmgp_dados_select['hora_'] == $this->hora_ &&
              $this->nmgp_dados_select['pa_'] == $this->pa_ &&
              $this->nmgp_dados_select['fc_'] == $this->fc_ &&
              $this->nmgp_dados_select['fr_'] == $this->fr_ &&
              $this->nmgp_dados_select['tc_'] == $this->tc_ &&
              $this->nmgp_dados_select['hgt_'] == $this->hgt_ &&
              $this->nmgp_dados_select['peso_'] == $this->peso_ &&
              $this->nmgp_dados_select['altura_'] == $this->altura_ &&
              $this->nmgp_dados_select['coren_'] == $this->coren_ &&
              $this->nmgp_dados_select['alergia_'] == $this->alergia_ &&
              $this->nmgp_dados_select['tipo_alergia_'] == $this->tipo_alergia_ &&
              $this->nmgp_dados_select['id_usuario_'] == $this->id_usuario_)
          {
              $SC_ex_update = false; 
              $SC_ex_upd_or = false; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['id_paciente_'] = $this->id_paciente_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['data_'] = $this->data_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['hora_'] = $this->hora_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['pa_'] = $this->pa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['fc_'] = $this->fc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['fr_'] = $this->fr_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['tc_'] = $this->tc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['hgt_'] = $this->hgt_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['peso_'] = $this->peso_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['altura_'] = $this->altura_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['coren_'] = $this->coren_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['alergia_'] = $this->alergia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['tipo_alergia_'] = $this->tipo_alergia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['id_usuario_'] = $this->id_usuario_;
          }
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['id_paciente_'] = $this->id_paciente_;
      $NM_val_form['data_'] = $this->data_;
      $NM_val_form['hora_'] = $this->hora_;
      $NM_val_form['pa_'] = $this->pa_;
      $NM_val_form['fc_'] = $this->fc_;
      $NM_val_form['fr_'] = $this->fr_;
      $NM_val_form['tc_'] = $this->tc_;
      $NM_val_form['hgt_'] = $this->hgt_;
      $NM_val_form['peso_'] = $this->peso_;
      $NM_val_form['altura_'] = $this->altura_;
      $NM_val_form['coren_'] = $this->coren_;
      $NM_val_form['alergia_'] = $this->alergia_;
      $NM_val_form['tipo_alergia_'] = $this->tipo_alergia_;
      $NM_val_form['id_usuario_'] = $this->id_usuario_;
      $NM_val_form['id_triagem_'] = $this->id_triagem_;
      if ($this->id_triagem_ == "")  
      { 
          $this->id_triagem_ = 0;
      } 
      if ($this->fc_ == "")  
      { 
          $this->fc_ = 0;
          $this->sc_force_zero[] = 'fc_';
      } 
      if ($this->fr_ == "")  
      { 
          $this->fr_ = 0;
          $this->sc_force_zero[] = 'fr_';
      } 
      if ($this->hgt_ == "")  
      { 
          $this->hgt_ = 0;
          $this->sc_force_zero[] = 'hgt_';
      } 
      if ($this->peso_ == "")  
      { 
          $this->peso_ = 0;
          $this->sc_force_zero[] = 'peso_';
      } 
      if ($this->altura_ == "")  
      { 
          $this->altura_ = 0;
          $this->sc_force_zero[] = 'altura_';
      } 
      if ($this->id_usuario_ == "")  
      { 
          $this->id_usuario_ = 0;
          $this->sc_force_zero[] = 'id_usuario_';
      } 
      if ($this->id_paciente_ == "")  
      { 
          $this->id_paciente_ = 0;
          $this->sc_force_zero[] = 'id_paciente_';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql);
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->data_ == "")  
          { 
              $this->data_ = "null"; 
              $NM_val_null[] = "data_";
          } 
          if ($this->hora_ == "")  
          { 
              $this->hora_ = "null"; 
              $NM_val_null[] = "hora_";
          } 
          $this->pa__before_qstr = $this->pa_;
          $this->pa_ = substr($this->Db->qstr($this->pa_), 1, -1); 
          if ($this->pa_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->pa_ = "null"; 
              $NM_val_null[] = "pa_";
          } 
          $this->tc__before_qstr = $this->tc_;
          $this->tc_ = substr($this->Db->qstr($this->tc_), 1, -1); 
          if ($this->tc_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tc_ = "null"; 
              $NM_val_null[] = "tc_";
          } 
          $this->coren__before_qstr = $this->coren_;
          $this->coren_ = substr($this->Db->qstr($this->coren_), 1, -1); 
          if ($this->coren_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->coren_ = "null"; 
              $NM_val_null[] = "coren_";
          } 
          $this->alergia__before_qstr = $this->alergia_;
          $this->alergia_ = substr($this->Db->qstr($this->alergia_), 1, -1); 
          if ($this->alergia_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->alergia_ = "null"; 
              $NM_val_null[] = "alergia_";
          } 
          $this->tipo_alergia__before_qstr = $this->tipo_alergia_;
          $this->tipo_alergia_ = substr($this->Db->qstr($this->tipo_alergia_), 1, -1); 
          if ($this->tipo_alergia_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_alergia_ = "null"; 
              $NM_val_null[] = "tipo_alergia_";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_triagem_pront_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $this->data_ =  date('Y') . "-" . date('m')  . "-" . date('d');
              $NM_val_form['data_'] = $this->data_;
              $this->NM_ajax_changed['data_'] = true;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET data = #$this->data_#, hora = #$this->hora_#, pa = '$this->pa_', fc = $this->fc_, fr = $this->fr_, tc = '$this->tc_', hgt = $this->hgt_, peso = $this->peso_, altura = $this->altura_, coren = '$this->coren_', alergia = '$this->alergia_', tipo_alergia = '$this->tipo_alergia_', id_usuario = $this->id_usuario_, id_paciente = $this->id_paciente_";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET data = " . $this->Ini->date_delim . $this->data_ . $this->Ini->date_delim1 . ", hora = " . $this->Ini->date_delim . $this->hora_ . $this->Ini->date_delim1 . ", pa = '$this->pa_', fc = $this->fc_, fr = $this->fr_, tc = '$this->tc_', hgt = $this->hgt_, peso = $this->peso_, altura = $this->altura_, coren = '$this->coren_', alergia = '$this->alergia_', tipo_alergia = '$this->tipo_alergia_', id_usuario = $this->id_usuario_, id_paciente = $this->id_paciente_";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET data = " . $this->Ini->date_delim . $this->data_ . $this->Ini->date_delim1 . ", hora = " . $this->Ini->date_delim . $this->hora_ . $this->Ini->date_delim1 . ", pa = '$this->pa_', fc = $this->fc_, fr = $this->fr_, tc = '$this->tc_', hgt = $this->hgt_, peso = $this->peso_, altura = $this->altura_, coren = '$this->coren_', alergia = '$this->alergia_', tipo_alergia = '$this->tipo_alergia_', id_usuario = $this->id_usuario_, id_paciente = $this->id_paciente_";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET data = EXTEND('$this->data_', YEAR TO DAY), hora = " . $this->Ini->date_delim . $this->hora_ . $this->Ini->date_delim1 . ", pa = '$this->pa_', fc = $this->fc_, fr = $this->fr_, tc = '$this->tc_', hgt = $this->hgt_, peso = $this->peso_, altura = $this->altura_, coren = '$this->coren_', alergia = '$this->alergia_', tipo_alergia = '$this->tipo_alergia_', id_usuario = $this->id_usuario_, id_paciente = $this->id_paciente_";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET data = " . $this->Ini->date_delim . $this->data_ . $this->Ini->date_delim1 . ", hora = " . $this->Ini->date_delim . $this->hora_ . $this->Ini->date_delim1 . ", pa = '$this->pa_', fc = $this->fc_, fr = $this->fr_, tc = '$this->tc_', hgt = $this->hgt_, peso = $this->peso_, altura = $this->altura_, coren = '$this->coren_', alergia = '$this->alergia_', tipo_alergia = '$this->tipo_alergia_', id_usuario = $this->id_usuario_, id_paciente = $this->id_paciente_";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET data = " . $this->Ini->date_delim . $this->data_ . $this->Ini->date_delim1 . ", hora = " . $this->Ini->date_delim . $this->hora_ . $this->Ini->date_delim1 . ", pa = '$this->pa_', fc = $this->fc_, fr = $this->fr_, tc = '$this->tc_', hgt = $this->hgt_, peso = $this->peso_, altura = $this->altura_, coren = '$this->coren_', alergia = '$this->alergia_', tipo_alergia = '$this->tipo_alergia_', id_usuario = $this->id_usuario_, id_paciente = $this->id_paciente_";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET data = " . $this->Ini->date_delim . $this->data_ . $this->Ini->date_delim1 . ", hora = " . $this->Ini->date_delim . $this->hora_ . $this->Ini->date_delim1 . ", pa = '$this->pa_', fc = $this->fc_, fr = $this->fr_, tc = '$this->tc_', hgt = $this->hgt_, peso = $this->peso_, altura = $this->altura_, coren = '$this->coren_', alergia = '$this->alergia_', tipo_alergia = '$this->tipo_alergia_', id_usuario = $this->id_usuario_, id_paciente = $this->id_paciente_";  
              } 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE id_triagem = $this->id_triagem_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE id_triagem = $this->id_triagem_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE id_triagem = $this->id_triagem_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE id_triagem = $this->id_triagem_ ";  
              }  
              else  
              {
                  $comando .= " WHERE id_triagem = $this->id_triagem_ ";  
              }  
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_triagem_pront_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->pa_ = $this->pa__before_qstr;
          $this->tc_ = $this->tc__before_qstr;
          $this->coren_ = $this->coren__before_qstr;
          $this->alergia_ = $this->alergia__before_qstr;
          $this->tipo_alergia_ = $this->tipo_alergia__before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['db_changed'] = true;

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['pa_'])) { $this->pa_ = $NM_val_form['pa_']; }
              elseif (isset($this->pa_)) { $this->nm_limpa_alfa($this->pa_); }
              if     (isset($NM_val_form) && isset($NM_val_form['fc_'])) { $this->fc_ = $NM_val_form['fc_']; }
              elseif (isset($this->fc_)) { $this->nm_limpa_alfa($this->fc_); }
              if     (isset($NM_val_form) && isset($NM_val_form['fr_'])) { $this->fr_ = $NM_val_form['fr_']; }
              elseif (isset($this->fr_)) { $this->nm_limpa_alfa($this->fr_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tc_'])) { $this->tc_ = $NM_val_form['tc_']; }
              elseif (isset($this->tc_)) { $this->nm_limpa_alfa($this->tc_); }
              if     (isset($NM_val_form) && isset($NM_val_form['hgt_'])) { $this->hgt_ = $NM_val_form['hgt_']; }
              elseif (isset($this->hgt_)) { $this->nm_limpa_alfa($this->hgt_); }
              if     (isset($NM_val_form) && isset($NM_val_form['peso_'])) { $this->peso_ = $NM_val_form['peso_']; }
              elseif (isset($this->peso_)) { $this->nm_limpa_alfa($this->peso_); }
              if     (isset($NM_val_form) && isset($NM_val_form['altura_'])) { $this->altura_ = $NM_val_form['altura_']; }
              elseif (isset($this->altura_)) { $this->nm_limpa_alfa($this->altura_); }
              if     (isset($NM_val_form) && isset($NM_val_form['coren_'])) { $this->coren_ = $NM_val_form['coren_']; }
              elseif (isset($this->coren_)) { $this->nm_limpa_alfa($this->coren_); }
              if     (isset($NM_val_form) && isset($NM_val_form['alergia_'])) { $this->alergia_ = $NM_val_form['alergia_']; }
              elseif (isset($this->alergia_)) { $this->nm_limpa_alfa($this->alergia_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_alergia_'])) { $this->tipo_alergia_ = $NM_val_form['tipo_alergia_']; }
              elseif (isset($this->tipo_alergia_)) { $this->nm_limpa_alfa($this->tipo_alergia_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_usuario_'])) { $this->id_usuario_ = $NM_val_form['id_usuario_']; }
              elseif (isset($this->id_usuario_)) { $this->nm_limpa_alfa($this->id_usuario_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_paciente_'])) { $this->id_paciente_ = $NM_val_form['id_paciente_']; }
              elseif (isset($this->id_paciente_)) { $this->nm_limpa_alfa($this->id_paciente_); }
              $this->nm_proc_onload_record($this->nmgp_refresh_row);

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id_paciente_', 'data_', 'hora_', 'pa_', 'fc_', 'fr_', 'tc_', 'hgt_', 'peso_', 'altura_', 'coren_', 'alergia_', 'tipo_alergia_', 'id_usuario_'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['id_paciente_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['data_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['hora_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['pa_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['fc_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['fr_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tc_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['hgt_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['peso_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['altura_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['coren_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['alergia_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tipo_alergia_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['id_usuario_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id_triagem, ";
          } 
              $this->data_ =  date('Y') . "-" . date('m')  . "-" . date('d');
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (data, hora, pa, fc, fr, tc, hgt, peso, altura, coren, alergia, tipo_alergia, id_usuario, id_paciente) VALUES (#$this->data_#, #$this->hora_#, '$this->pa_', $this->fc_, $this->fr_, '$this->tc_', $this->hgt_, $this->peso_, $this->altura_, '$this->coren_', '$this->alergia_', '$this->tipo_alergia_', $this->id_usuario_, $this->id_paciente_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "data, hora, pa, fc, fr, tc, hgt, peso, altura, coren, alergia, tipo_alergia, id_usuario, id_paciente) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->data_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_ . $this->Ini->date_delim1 . ", '$this->pa_', $this->fc_, $this->fr_, '$this->tc_', $this->hgt_, $this->peso_, $this->altura_, '$this->coren_', '$this->alergia_', '$this->tipo_alergia_', $this->id_usuario_, $this->id_paciente_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "data, hora, pa, fc, fr, tc, hgt, peso, altura, coren, alergia, tipo_alergia, id_usuario, id_paciente) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->data_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_ . $this->Ini->date_delim1 . ", '$this->pa_', $this->fc_, $this->fr_, '$this->tc_', $this->hgt_, $this->peso_, $this->altura_, '$this->coren_', '$this->alergia_', '$this->tipo_alergia_', $this->id_usuario_, $this->id_paciente_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "data, hora, pa, fc, fr, tc, hgt, peso, altura, coren, alergia, tipo_alergia, id_usuario, id_paciente) VALUES (" . $NM_seq_auto . "EXTEND('$this->data_', YEAR TO DAY), " . $this->Ini->date_delim . $this->hora_ . $this->Ini->date_delim1 . ", '$this->pa_', $this->fc_, $this->fr_, '$this->tc_', $this->hgt_, $this->peso_, $this->altura_, '$this->coren_', '$this->alergia_', '$this->tipo_alergia_', $this->id_usuario_, $this->id_paciente_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "data, hora, pa, fc, fr, tc, hgt, peso, altura, coren, alergia, tipo_alergia, id_usuario, id_paciente) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->data_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_ . $this->Ini->date_delim1 . ", '$this->pa_', $this->fc_, $this->fr_, '$this->tc_', $this->hgt_, $this->peso_, $this->altura_, '$this->coren_', '$this->alergia_', '$this->tipo_alergia_', $this->id_usuario_, $this->id_paciente_)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "data, hora, pa, fc, fr, tc, hgt, peso, altura, coren, alergia, tipo_alergia, id_usuario, id_paciente) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->data_ . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_ . $this->Ini->date_delim1 . ", '$this->pa_', $this->fc_, $this->fr_, '$this->tc_', $this->hgt_, $this->peso_, $this->altura_, '$this->coren_', '$this->alergia_', '$this->tipo_alergia_', $this->id_usuario_, $this->id_paciente_)"; 
              }
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_triagem_pront_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_triagem_pront_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id_triagem_ =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_triagem_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_triagem_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_triagem_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_triagem_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_triagem_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_triagem_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_triagem_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['total']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_qtd']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_I_E']++; 
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['id_paciente_'] = $this->id_paciente_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['data_'] = $this->data_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['hora_'] = $this->hora_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['pa_'] = $this->pa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['fc_'] = $this->fc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['fr_'] = $this->fr_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['tc_'] = $this->tc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['hgt_'] = $this->hgt_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['peso_'] = $this->peso_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['altura_'] = $this->altura_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['coren_'] = $this->coren_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['alergia_'] = $this->alergia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['tipo_alergia_'] = $this->tipo_alergia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert]['id_usuario_'] = $this->id_usuario_;
              if (!empty($this->sc_force_zero))
              {
                  foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
                  {
                      eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
                  }
              }
              $this->sc_force_zero = array();
              if (!empty($NM_val_null))
              {
                  foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
                  {
                      eval('$this->' . $sc_val_null_field . ' = "";');
                  }
              }
              if (isset($this->pa_)) { $this->nm_limpa_alfa($this->pa_); }
              if (isset($this->fc_)) { $this->nm_limpa_alfa($this->fc_); }
              if (isset($this->fr_)) { $this->nm_limpa_alfa($this->fr_); }
              if (isset($this->tc_)) { $this->nm_limpa_alfa($this->tc_); }
              if (isset($this->hgt_)) { $this->nm_limpa_alfa($this->hgt_); }
              if (isset($this->peso_)) { $this->nm_limpa_alfa($this->peso_); }
              if (isset($this->altura_)) { $this->nm_limpa_alfa($this->altura_); }
              if (isset($this->coren_)) { $this->nm_limpa_alfa($this->coren_); }
              if (isset($this->alergia_)) { $this->nm_limpa_alfa($this->alergia_); }
              if (isset($this->tipo_alergia_)) { $this->nm_limpa_alfa($this->tipo_alergia_); }
              if (isset($this->id_usuario_)) { $this->nm_limpa_alfa($this->id_usuario_); }
              if (isset($this->id_paciente_)) { $this->nm_limpa_alfa($this->id_paciente_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_proc_onload_record($this->nmgp_refresh_row);
                  $this->nm_formatar_campos();

                  $this->NM_ajax_info['fldList']['id_paciente_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['id_paciente_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->id_paciente_));
                  $this->NM_ajax_info['fldList']['id_paciente_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_id_paciente_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_paciente_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_paciente_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_paciente_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_paciente_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['data_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['data_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->data_));
                  $this->NM_ajax_info['fldList']['data_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_data_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['data_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['data_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['data_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['data_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['hora_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['hora_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->hora_));
                  $this->NM_ajax_info['fldList']['hora_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_hora_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hora_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hora_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hora_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hora_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['pa_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['pa_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->pa_));
                  $this->NM_ajax_info['fldList']['pa_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_pa_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['pa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['pa_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['pa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['pa_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['fc_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['fc_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->fc_));
                  $this->NM_ajax_info['fldList']['fc_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_fc_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fc_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fc_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['fr_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['fr_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->fr_));
                  $this->NM_ajax_info['fldList']['fr_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_fr_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fr_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fr_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fr_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fr_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['tc_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['tc_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->tc_));
                  $this->NM_ajax_info['fldList']['tc_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_tc_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tc_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tc_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['hgt_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['hgt_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->hgt_));
                  $this->NM_ajax_info['fldList']['hgt_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_hgt_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hgt_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hgt_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['hgt_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['hgt_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['peso_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['peso_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->peso_));
                  $this->NM_ajax_info['fldList']['peso_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_peso_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['peso_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['peso_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['peso_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['peso_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['altura_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['altura_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->altura_));
                  $this->NM_ajax_info['fldList']['altura_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_altura_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['altura_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['altura_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['altura_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['altura_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['coren_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['coren_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->coren_));
                  $this->NM_ajax_info['fldList']['coren_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_coren_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['coren_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['coren_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['coren_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['coren_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_triagem_pront_pack_protect_string('sim') => form_triagem_pront_pack_protect_string("Sim"));
$aLookup[] = array(form_triagem_pront_pack_protect_string('nao') => form_triagem_pront_pack_protect_string("Não"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_alergia_'][] = 'sim';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_alergia_'][] = 'nao';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_triagem_pront_pack_protect_string(NM_charset_to_utf8($this->alergia_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_alergia_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['alergia_' . $this->nmgp_refresh_row]['type']    = 'radio';
                  $this->NM_ajax_info['fldList']['alergia_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->alergia_));
                  $this->NM_ajax_info['fldList']['alergia_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_alergia_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['alergia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['alergia_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['alergia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['alergia_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['tipo_alergia_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['tipo_alergia_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->tipo_alergia_));
                  $this->NM_ajax_info['fldList']['tipo_alergia_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_tipo_alergia_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_alergia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_alergia_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_alergia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_alergia_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_paciente_ = $this->id_paciente_;
   $old_value_data_ = $this->data_;
   $old_value_hora_ = $this->hora_;
   $old_value_fc_ = $this->fc_;
   $old_value_fr_ = $this->fr_;
   $old_value_hgt_ = $this->hgt_;
   $old_value_altura_ = $this->altura_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_paciente_ = $this->id_paciente_;
   $unformatted_value_data_ = $this->data_;
   $unformatted_value_hora_ = $this->hora_;
   $unformatted_value_fc_ = $this->fc_;
   $unformatted_value_fr_ = $this->fr_;
   $unformatted_value_hgt_ = $this->hgt_;
   $unformatted_value_altura_ = $this->altura_;

   $nm_comando = "SELECT id_usuario, id_usuario FROM usuario ORDER BY id_usuario";

   $this->id_paciente_ = $old_value_id_paciente_;
   $this->data_ = $old_value_data_;
   $this->hora_ = $old_value_hora_;
   $this->fc_ = $old_value_fc_;
   $this->fr_ = $old_value_fr_;
   $this->hgt_ = $old_value_hgt_;
   $this->altura_ = $old_value_altura_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[1] = str_replace(',', '.', $rs->fields[1]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[1] = (strpos(strtolower($rs->fields[1]), "e")) ? (float)$rs->fields[1] : $rs->fields[1];
              $rs->fields[1] = (string)$rs->fields[1];
              $aLookup[] = array(form_triagem_pront_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_triagem_pront_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_triagem_pront_pack_protect_string(NM_charset_to_utf8($this->id_usuario_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_usuario_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_usuario_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_usuario_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->id_usuario_));
                  $this->NM_ajax_info['fldList']['id_usuario_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_usuario_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_usuario_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_usuario_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_usuario_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_usuario_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['id_triagem_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['id_triagem_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->id_triagem_));
                  $this->NM_ajax_info['fldList']['id_triagem_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_id_triagem_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_triagem_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_triagem_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_triagem_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_triagem_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();
                  $this->nm_converte_datas();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_triagem_ = substr($this->Db->qstr($this->id_triagem_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_dele_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_triagem = $this->id_triagem_ "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_triagem_pront_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['db_changed'] = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_qtd']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['total']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_I_E']--; 
              $this->sc_teve_excl = true; 
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['parms'] = "id_triagem_?#?$this->id_triagem_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_triagem_ = substr($this->Db->qstr($this->id_triagem_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['form_triagem_pront']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_qtd_reg'];
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_form_triagem_pront = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter'] . ")";
          }
      }
      $sc_where = "";
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (((isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao) || (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)) && !$this->has_where_params && 'novo' != $this->nmgp_opcao)
      {
          $aNewWhereCond = array();
          if (null != $this->id_triagem_)
          {
              $aNewWhereCond[] = "id_triagem = " . $this->id_triagem_;
          }
          if (!$this->NM_ajax_flag)
          {
              $this->NM_btn_navega = "S";
          }
          elseif (!empty($aNewWhereCond))
          {
              if ('' == $sc_where)
              {
                  $sc_where = " where (";
              }
              else
              {
                  $sc_where .= " and (";
              }
              $sc_where .= implode(" and ", $aNewWhereCond) . ")";
          }
      }
      if ('total' != $this->form_paginacao)
      {
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['total']))
          {
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_form_triagem_pront = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['total'] = $qt_geral_reg_form_triagem_pront;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['total']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_I_E'] = 0; 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id_triagem_))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "id_triagem < $this->id_triagem_ "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "id_triagem < $this->id_triagem_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "id_triagem < $this->id_triagem_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "id_triagem < $this->id_triagem_ "; 
              }
              else  
              {
                  $Key_Where = "id_triagem < $this->id_triagem_ "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_triagem_pront = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_triagem_pront) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] += ($this->sc_max_reg + $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_I_E']); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] > $qt_geral_reg_form_triagem_pront)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] = $qt_geral_reg_form_triagem_pront - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] = ($qt_geral_reg_form_triagem_pront + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] = 0; 
          }
      } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_I_E'] = 0; 
      }
      $Cmps_ord_def = array();
      $sc_order_by  = "";
      $sc_order_by = "id_triagem";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['ordem_ord']; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT id_triagem, str_replace (convert(char(10),data,102), '.', '-') + ' ' + convert(char(8),data,20), str_replace (convert(char(10),hora,102), '.', '-') + ' ' + convert(char(8),hora,20), pa, fc, fr, tc, hgt, peso, altura, coren, alergia, tipo_alergia, id_usuario, id_paciente from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT id_triagem, convert(char(23),data,121), convert(char(23),hora,121), pa, fc, fr, tc, hgt, peso, altura, coren, alergia, tipo_alergia, id_usuario, id_paciente from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT id_triagem, data, hora, pa, fc, fr, tc, hgt, peso, altura, coren, alergia, tipo_alergia, id_usuario, id_paciente from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT id_triagem, EXTEND(data, YEAR TO DAY), hora, pa, fc, fr, tc, hgt, peso, altura, coren, alergia, tipo_alergia, id_usuario, id_paciente from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id_triagem, data, hora, pa, fc, fr, tc, hgt, peso, altura, coren, alergia, tipo_alergia, id_usuario, id_paciente from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = $this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start']) ;  
                  } 
              } 
          } 
      }
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              $this->nm_flag_saida_novo = "S"; 
              $this->nmgp_opcao = "novo"; 
              $this->sc_evento  = "novo"; 
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on")
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['empty_filter'] = true;
              }
          }
          else
          {
              $sc_seq_vert = 1; 
          }
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
              $this->sc_max_reg = 0;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          while (!$rs->EOF && $bPagTest)
          { 
              if ('total' == $this->form_paginacao)
              {
                  $this->sc_max_reg++;
              }
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->id_triagem_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_triagem_'] = $this->id_triagem_;
              $this->data_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['data_'] = $this->data_;
              $this->hora_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['hora_'] = $this->hora_;
              $this->pa_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['pa_'] = $this->pa_;
              $this->fc_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['fc_'] = $this->fc_;
              $this->fr_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['fr_'] = $this->fr_;
              $this->tc_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['tc_'] = $this->tc_;
              $this->hgt_ = trim($rs->fields[7]) ; 
              $this->nmgp_dados_select['hgt_'] = $this->hgt_;
              $this->peso_ = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['peso_'] = $this->peso_;
              $this->altura_ = trim($rs->fields[9]) ; 
              $this->nmgp_dados_select['altura_'] = $this->altura_;
              $this->coren_ = $rs->fields[10] ; 
              $this->nmgp_dados_select['coren_'] = $this->coren_;
              $this->alergia_ = $rs->fields[11] ; 
              $this->nmgp_dados_select['alergia_'] = $this->alergia_;
              $this->tipo_alergia_ = $rs->fields[12] ; 
              $this->nmgp_dados_select['tipo_alergia_'] = $this->tipo_alergia_;
              $this->id_usuario_ = $rs->fields[13] ; 
              $this->nmgp_dados_select['id_usuario_'] = $this->id_usuario_;
              $this->id_paciente_ = $rs->fields[14] ; 
              $this->nmgp_dados_select['id_paciente_'] = $this->id_paciente_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id_triagem_ = (string)$this->id_triagem_; 
              $this->fc_ = (string)$this->fc_; 
              $this->fr_ = (string)$this->fr_; 
              $this->hgt_ = (strpos(strtolower($this->hgt_), "e")) ? (float)$this->hgt_ : $this->hgt_; 
              $this->hgt_ = (string)$this->hgt_; 
              $this->peso_ = (strpos(strtolower($this->peso_), "e")) ? (float)$this->peso_ : $this->peso_; 
              $this->peso_ = (string)$this->peso_; 
              $this->altura_ = (strpos(strtolower($this->altura_), "e")) ? (float)$this->altura_ : $this->altura_; 
              $this->altura_ = (string)$this->altura_; 
              $this->id_usuario_ = (string)$this->id_usuario_; 
              $this->id_paciente_ = (string)$this->id_paciente_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['parms'] = "id_triagem_?#?$this->id_triagem_?@?";
              } 
              $this->nm_proc_onload_record($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['id_paciente_'] =  $this->id_paciente_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['data_'] =  $this->data_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['hora_'] =  $this->hora_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['pa_'] =  $this->pa_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['fc_'] =  $this->fc_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['fr_'] =  $this->fr_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['tc_'] =  $this->tc_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['hgt_'] =  $this->hgt_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['peso_'] =  $this->peso_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['altura_'] =  $this->altura_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['coren_'] =  $this->coren_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['alergia_'] =  $this->alergia_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['tipo_alergia_'] =  $this->tipo_alergia_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['id_usuario_'] =  $this->id_usuario_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['id_triagem_'] =  $this->id_triagem_; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
              $this->nm_proc_onload(false);
          }
          ksort ($this->form_vert_form_triagem_pront); 
          $rs->Close(); 
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['reg_start'] < (($qt_geral_reg_form_triagem_pront + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['opcao'] = '';
          }
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_evento = "novo"; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          else 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->data_ =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->hora_ =  date('H') . ":" . date('i')  . ":" . date('s');
              $this->pa_ = "";  
              $this->fc_ = "";  
              $this->fr_ = "";  
              $this->tc_ = "";  
              $this->hgt_ = "";  
              $this->peso_ = "";  
              $this->altura_ = "";  
              $this->coren_ = "";  
              $this->alergia_ = "";  
              $this->tipo_alergia_ = "";  
              $this->id_usuario_ = "";  
              $this->id_paciente_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      if (isset($this->sc_conv_var[$sFKName]))
                      {
                          $sFKName = $this->sc_conv_var[$sFKName];
                      }
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['id_paciente_'] =  $this->id_paciente_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['data_'] =  $this->data_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['hora_'] =  $this->hora_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['pa_'] =  $this->pa_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['fc_'] =  $this->fc_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['fr_'] =  $this->fr_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['tc_'] =  $this->tc_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['hgt_'] =  $this->hgt_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['peso_'] =  $this->peso_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['altura_'] =  $this->altura_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['coren_'] =  $this->coren_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['alergia_'] =  $this->alergia_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['tipo_alergia_'] =  $this->tipo_alergia_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['id_usuario_'] =  $this->id_usuario_; 
             $this->form_vert_form_triagem_pront[$sc_seq_vert]['id_triagem_'] =  $this->id_triagem_; 
              $sc_seq_vert++; 
          } 
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
              $this->nm_proc_onload(false);
          }
      }  
  }
//
function alergia__onClick()
{
$_SESSION['scriptcase']['form_triagem_pront']['contr_erro'] = 'on';
   
$original_alergia_ = $this->alergia_;
$original_tipo_alergia_ = $this->tipo_alergia_;

if($this->alergia_  == "sim"){
	$this->nmgp_cmp_hidden["tipo_alergia_"] = "on"; $this->NM_ajax_info['fieldDisplay']['tipo_alergia_'] = 'on';
}else{
	$this->nmgp_cmp_hidden["tipo_alergia_"] = "off"; $this->NM_ajax_info['fieldDisplay']['tipo_alergia_'] = 'off';
}

$modificado_alergia_ = $this->alergia_;
$modificado_tipo_alergia_ = $this->tipo_alergia_;
$this->nm_formatar_campos('alergia_', 'tipo_alergia_');
$this->nmgp_refresh_fields = array();
if ($original_alergia_ !== $modificado_alergia_ || (isset($bFlagRead_alergia_) && $bFlagRead_alergia_))
{
    $this->nmgp_refresh_fields[] = 'alergia_';
    $this->NM_ajax_changed['alergia_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_tipo_alergia_ !== $modificado_tipo_alergia_ || (isset($bFlagRead_tipo_alergia_) && $bFlagRead_tipo_alergia_))
{
    $this->nmgp_refresh_fields[] = 'tipo_alergia_';
    $this->NM_ajax_changed['tipo_alergia_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_triagem_pront_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_triagem_pront']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_triagem_pront_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['table_refresh'] = true;
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_triagem_pront_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "id_triagem", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "data", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "hora", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pa", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "hgt", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "peso", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "altura", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "coren", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_alergia_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "alergia", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tipo_alergia", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_usuario_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "id_usuario", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "id_paciente", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "id_paciente", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pa", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fr", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "hgt", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "peso", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "altura", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "coren", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_alergia_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "alergia", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tipo_alergia", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_usuario_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "id_usuario", $arg_search, $data_lookup);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_triagem_pront = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['total'] = $qt_geral_reg_form_triagem_pront;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_triagem_pront_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_triagem_pront_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "id_triagem";$nm_numeric[] = "fc";$nm_numeric[] = "fr";$nm_numeric[] = "hgt";$nm_numeric[] = "peso";$nm_numeric[] = "altura";$nm_numeric[] = "id_usuario";$nm_numeric[] = "id_paciente";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas['data'] = "date";$Nm_datas['hora'] = "time";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif (substr($Nm_datas[$campo_join], 0, 4) == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          {
              $nome = "str_replace (convert(char(10)," . $nome . ",102), '.', '-') + ' ' + convert(char(8)," . $nome . ",20)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas1;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
            break;
         }
   }
   function SC_lookup_alergia_($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['sim'] = "Sim";
       $data_look['nao'] = "Não";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_id_usuario_($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT id_usuario, id_usuario FROM usuario WHERE (CAST (id_usuario AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT id_usuario, id_usuario FROM usuario WHERE (id_usuario LIKE '%$campo%')" ; 
       }
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_triagem_pront_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_triagem_pront_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = '_self';
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_triagem_pront_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['masterValue']);
?>
}
<?php
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
    function sc_field_readonly($sField, $sStatus, $iSeq = '')
    {
        if ('on' != $sStatus && 'off' != $sStatus)
        {
            return;
        }

        $sFieldDateTime = '';

        $sFlagVar        = 'bFlagRead_' . $sField;
        $this->$sFlagVar = 'on' == $sStatus;

        if (isset($this->nmgp_refresh_row))
        {
            $iSeq = $this->nmgp_refresh_row;
        }

        $this->nmgp_cmp_readonly[$sField]                = $sStatus;
        $this->NM_ajax_info['readOnly'][$sField . $iSeq] = $sStatus;
        if ('' != $sFieldDateTime)
        {
            $this->NM_ajax_info['readOnly'][$sFieldDateTime . $iSeq] = $sStatus;
        }
    } // sc_field_readonly
}
?>
