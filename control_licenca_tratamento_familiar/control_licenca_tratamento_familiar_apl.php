<?php
//
class control_licenca_tratamento_familiar_apl
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
   var $nome;
   var $data_nascimento;
   var $cpf;
   var $orgao;
   var $siape;
   var $data_inicial;
   var $data_final;
   var $data_hoje;
   var $numero_de_dias;
   var $familiar;
   var $parentesco;
   var $cid;
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
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
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
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['cid']))
          {
              $this->cid = $this->NM_ajax_info['param']['cid'];
          }
          if (isset($this->NM_ajax_info['param']['cpf']))
          {
              $this->cpf = $this->NM_ajax_info['param']['cpf'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['data_final']))
          {
              $this->data_final = $this->NM_ajax_info['param']['data_final'];
          }
          if (isset($this->NM_ajax_info['param']['data_hoje']))
          {
              $this->data_hoje = $this->NM_ajax_info['param']['data_hoje'];
          }
          if (isset($this->NM_ajax_info['param']['data_inicial']))
          {
              $this->data_inicial = $this->NM_ajax_info['param']['data_inicial'];
          }
          if (isset($this->NM_ajax_info['param']['data_nascimento']))
          {
              $this->data_nascimento = $this->NM_ajax_info['param']['data_nascimento'];
          }
          if (isset($this->NM_ajax_info['param']['familiar']))
          {
              $this->familiar = $this->NM_ajax_info['param']['familiar'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['nome']))
          {
              $this->nome = $this->NM_ajax_info['param']['nome'];
          }
          if (isset($this->NM_ajax_info['param']['numero_de_dias']))
          {
              $this->numero_de_dias = $this->NM_ajax_info['param']['numero_de_dias'];
          }
          if (isset($this->NM_ajax_info['param']['orgao']))
          {
              $this->orgao = $this->NM_ajax_info['param']['orgao'];
          }
          if (isset($this->NM_ajax_info['param']['parentesco']))
          {
              $this->parentesco = $this->NM_ajax_info['param']['parentesco'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['siape']))
          {
              $this->siape = $this->NM_ajax_info['param']['siape'];
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
      if (isset($this->global_nome_servidor) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_nome_servidor'] = $this->global_nome_servidor;
      }
      if (isset($this->global_data_nascimento) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_data_nascimento'] = $this->global_data_nascimento;
      }
      if (isset($this->global_cpf) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_cpf'] = $this->global_cpf;
      }
      if (isset($this->global_orgao) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_orgao'] = $this->global_orgao;
      }
      if (isset($this->global_siape) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_siape'] = $this->global_siape;
      }
      if (isset($this->global_data_inicial) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_data_inicial'] = $this->global_data_inicial;
      }
      if (isset($this->global_data_final) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_data_final'] = $this->global_data_final;
      }
      if (isset($this->global_data_hoje) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_data_hoje'] = $this->global_data_hoje;
      }
      if (isset($this->global_numero_de_dias) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_numero_de_dias'] = $this->global_numero_de_dias;
      }
      if (isset($this->global_familiar) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_familiar'] = $this->global_familiar;
      }
      if (isset($this->global_parentesco) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_parentesco'] = $this->global_parentesco;
      }
      if (isset($this->global_cid) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_cid'] = $this->global_cid;
      }
      if (isset($_POST["global_nome_servidor"])) 
      {
          $_SESSION['global_nome_servidor'] = $this->global_nome_servidor;
      }
      if (isset($_POST["global_data_nascimento"])) 
      {
          $_SESSION['global_data_nascimento'] = $this->global_data_nascimento;
      }
      if (isset($_POST["global_cpf"])) 
      {
          $_SESSION['global_cpf'] = $this->global_cpf;
      }
      if (isset($_POST["global_orgao"])) 
      {
          $_SESSION['global_orgao'] = $this->global_orgao;
      }
      if (isset($_POST["global_siape"])) 
      {
          $_SESSION['global_siape'] = $this->global_siape;
      }
      if (isset($_POST["global_data_inicial"])) 
      {
          $_SESSION['global_data_inicial'] = $this->global_data_inicial;
      }
      if (isset($_POST["global_data_final"])) 
      {
          $_SESSION['global_data_final'] = $this->global_data_final;
      }
      if (isset($_POST["global_data_hoje"])) 
      {
          $_SESSION['global_data_hoje'] = $this->global_data_hoje;
      }
      if (isset($_POST["global_numero_de_dias"])) 
      {
          $_SESSION['global_numero_de_dias'] = $this->global_numero_de_dias;
      }
      if (isset($_POST["global_familiar"])) 
      {
          $_SESSION['global_familiar'] = $this->global_familiar;
      }
      if (isset($_POST["global_parentesco"])) 
      {
          $_SESSION['global_parentesco'] = $this->global_parentesco;
      }
      if (isset($_POST["global_cid"])) 
      {
          $_SESSION['global_cid'] = $this->global_cid;
      }
      if (isset($_GET["global_nome_servidor"])) 
      {
          $_SESSION['global_nome_servidor'] = $this->global_nome_servidor;
      }
      if (isset($_GET["global_data_nascimento"])) 
      {
          $_SESSION['global_data_nascimento'] = $this->global_data_nascimento;
      }
      if (isset($_GET["global_cpf"])) 
      {
          $_SESSION['global_cpf'] = $this->global_cpf;
      }
      if (isset($_GET["global_orgao"])) 
      {
          $_SESSION['global_orgao'] = $this->global_orgao;
      }
      if (isset($_GET["global_siape"])) 
      {
          $_SESSION['global_siape'] = $this->global_siape;
      }
      if (isset($_GET["global_data_inicial"])) 
      {
          $_SESSION['global_data_inicial'] = $this->global_data_inicial;
      }
      if (isset($_GET["global_data_final"])) 
      {
          $_SESSION['global_data_final'] = $this->global_data_final;
      }
      if (isset($_GET["global_data_hoje"])) 
      {
          $_SESSION['global_data_hoje'] = $this->global_data_hoje;
      }
      if (isset($_GET["global_numero_de_dias"])) 
      {
          $_SESSION['global_numero_de_dias'] = $this->global_numero_de_dias;
      }
      if (isset($_GET["global_familiar"])) 
      {
          $_SESSION['global_familiar'] = $this->global_familiar;
      }
      if (isset($_GET["global_parentesco"])) 
      {
          $_SESSION['global_parentesco'] = $this->global_parentesco;
      }
      if (isset($_GET["global_cid"])) 
      {
          $_SESSION['global_cid'] = $this->global_cid;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
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
                 nm_limpa_str_control_licenca_tratamento_familiar($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->global_nome_servidor)) 
          {
              $_SESSION['global_nome_servidor'] = $this->global_nome_servidor;
          }
          if (isset($this->global_data_nascimento)) 
          {
              $_SESSION['global_data_nascimento'] = $this->global_data_nascimento;
          }
          if (isset($this->global_cpf)) 
          {
              $_SESSION['global_cpf'] = $this->global_cpf;
          }
          if (isset($this->global_orgao)) 
          {
              $_SESSION['global_orgao'] = $this->global_orgao;
          }
          if (isset($this->global_siape)) 
          {
              $_SESSION['global_siape'] = $this->global_siape;
          }
          if (isset($this->global_data_inicial)) 
          {
              $_SESSION['global_data_inicial'] = $this->global_data_inicial;
          }
          if (isset($this->global_data_final)) 
          {
              $_SESSION['global_data_final'] = $this->global_data_final;
          }
          if (isset($this->global_data_hoje)) 
          {
              $_SESSION['global_data_hoje'] = $this->global_data_hoje;
          }
          if (isset($this->global_numero_de_dias)) 
          {
              $_SESSION['global_numero_de_dias'] = $this->global_numero_de_dias;
          }
          if (isset($this->global_familiar)) 
          {
              $_SESSION['global_familiar'] = $this->global_familiar;
          }
          if (isset($this->global_parentesco)) 
          {
              $_SESSION['global_parentesco'] = $this->global_parentesco;
          }
          if (isset($this->global_cid)) 
          {
              $_SESSION['global_cid'] = $this->global_cid;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->global_nome_servidor)) 
          {
              $_SESSION['global_nome_servidor'] = $this->global_nome_servidor;
          }
          if (isset($this->global_data_nascimento)) 
          {
              $_SESSION['global_data_nascimento'] = $this->global_data_nascimento;
          }
          if (isset($this->global_cpf)) 
          {
              $_SESSION['global_cpf'] = $this->global_cpf;
          }
          if (isset($this->global_orgao)) 
          {
              $_SESSION['global_orgao'] = $this->global_orgao;
          }
          if (isset($this->global_siape)) 
          {
              $_SESSION['global_siape'] = $this->global_siape;
          }
          if (isset($this->global_data_inicial)) 
          {
              $_SESSION['global_data_inicial'] = $this->global_data_inicial;
          }
          if (isset($this->global_data_final)) 
          {
              $_SESSION['global_data_final'] = $this->global_data_final;
          }
          if (isset($this->global_data_hoje)) 
          {
              $_SESSION['global_data_hoje'] = $this->global_data_hoje;
          }
          if (isset($this->global_numero_de_dias)) 
          {
              $_SESSION['global_numero_de_dias'] = $this->global_numero_de_dias;
          }
          if (isset($this->global_familiar)) 
          {
              $_SESSION['global_familiar'] = $this->global_familiar;
          }
          if (isset($this->global_parentesco)) 
          {
              $_SESSION['global_parentesco'] = $this->global_parentesco;
          }
          if (isset($this->global_cid)) 
          {
              $_SESSION['global_cid'] = $this->global_cid;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new control_licenca_tratamento_familiar_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['initialize'])
          {
              $_SESSION['scriptcase']['control_licenca_tratamento_familiar']['contr_erro'] = 'on';
    $this->background();
$_SESSION['scriptcase']['control_licenca_tratamento_familiar']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$script_case_init]['control_licenca_tratamento_familiar']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['control_licenca_tratamento_familiar']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['control_licenca_tratamento_familiar'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_licenca_tratamento_familiar']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_licenca_tratamento_familiar']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('control_licenca_tratamento_familiar') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_licenca_tratamento_familiar']['label'] = "Licença para tratamento de saúde inferior a 15 dias";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "control_licenca_tratamento_familiar")
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
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);



      $_SESSION['scriptcase']['error_icon']['control_licenca_tratamento_familiar']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['control_licenca_tratamento_familiar'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_licenca_tratamento_familiar']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("control_licenca_tratamento_familiar", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'control_licenca_tratamento_familiar_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'control_licenca_tratamento_familiar_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('contr:' == substr($str_link_webhelp, 0, 6))
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
          require_once($this->Ini->path_embutida . 'control_licenca_tratamento_familiar/control_licenca_tratamento_familiar_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "control_licenca_tratamento_familiar_erro.class.php"); 
      }
      $this->Erro      = new control_licenca_tratamento_familiar_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['control_licenca_tratamento_familiar']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- data_nascimento
      $this->field_config['data_nascimento']                 = array();
      $this->field_config['data_nascimento']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['data_nascimento']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['data_nascimento']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'data_nascimento');
      //-- data_inicial
      $this->field_config['data_inicial']                 = array();
      $this->field_config['data_inicial']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['data_inicial']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['data_inicial']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'data_inicial');
      //-- data_final
      $this->field_config['data_final']                 = array();
      $this->field_config['data_final']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['data_final']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['data_final']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'data_final');
      //-- numero_de_dias
      $this->field_config['numero_de_dias']               = array();
      $this->field_config['numero_de_dias']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['numero_de_dias']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numero_de_dias']['symbol_dec'] = '';
      $this->field_config['numero_de_dias']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['numero_de_dias']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- data_hoje
      $this->field_config['data_hoje']                 = array();
      $this->field_config['data_hoje']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['data_hoje']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['data_hoje']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'data_hoje');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


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

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_nome' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nome');
          }
          if ('validate_data_nascimento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_nascimento');
          }
          if ('validate_cpf' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cpf');
          }
          if ('validate_orgao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'orgao');
          }
          if ('validate_siape' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'siape');
          }
          if ('validate_data_inicial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_inicial');
          }
          if ('validate_data_final' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_final');
          }
          if ('validate_numero_de_dias' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero_de_dias');
          }
          if ('validate_data_hoje' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_hoje');
          }
          if ('validate_familiar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'familiar');
          }
          if ('validate_parentesco' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'parentesco');
          }
          if ('validate_cid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cid');
          }
          control_licenca_tratamento_familiar_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_nome_onchange' == $this->NM_ajax_opcao)
          {
              $this->nome_onChange();
          }
          control_licenca_tratamento_familiar_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_nome' == $this->NM_ajax_opcao)
          {
              $this->nome = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['Lookup_nome']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['Lookup_nome'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['Lookup_nome']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['Lookup_nome'] = array(); 
    }

   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_data_inicial = $this->data_inicial;
   $old_value_data_final = $this->data_final;
   $old_value_numero_de_dias = $this->numero_de_dias;
   $old_value_data_hoje = $this->data_hoje;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_data_inicial = $this->data_inicial;
   $unformatted_value_data_final = $this->data_final;
   $unformatted_value_numero_de_dias = $this->numero_de_dias;
   $unformatted_value_data_hoje = $this->data_hoje;

   $nm_comando = "SELECT id_paciente, nome_paciente FROM paciente WHERE (tipo_paciente = 'servidor') AND nome_paciente LIKE '%" . substr($this->Db->qstr($this->nome), 1, -1) . "%' ORDER BY nome_paciente";

   $this->data_nascimento = $old_value_data_nascimento;
   $this->data_inicial = $old_value_data_inicial;
   $this->data_final = $old_value_data_final;
   $this->numero_de_dias = $old_value_numero_de_dias;
   $this->data_hoje = $old_value_data_hoje;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(control_licenca_tratamento_familiar_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => control_licenca_tratamento_familiar_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['Lookup_nome'][] = $rs->fields[0];
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
              $AjaxLim = 0;
              $aResponse = array();
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  $AjaxLim++;
                  if ($AjaxLim > 10)
                  {
                      break;
                  }
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $sLkpIndex = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpIndex);
                      $sLkpValue = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpValue);
                      $aResponse[] = array('label' => $sLkpValue, 'value' => $sLkpIndex);
                  }
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($aResponse);
              exit;
          }
          control_licenca_tratamento_familiar_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              control_licenca_tratamento_familiar_pack_ajax_response();
              exit;
          }
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['control_licenca_tratamento_familiar']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  control_licenca_tratamento_familiar_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
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
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['control_licenca_tratamento_familiar']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  control_licenca_tratamento_familiar_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
//
      if (!isset($nm_form_submit) && $this->nmgp_opcao != "nada")
      {
          $this->nome = "" ;  
          $this->data_nascimento = "" ;  
          $this->cpf = "" ;  
          $this->orgao = "" ;  
          $this->siape = "" ;  
          $this->data_inicial = "" ;  
          $this->data_final = "" ;  
              $this->data_hoje =  date('Y') . "-" . date('m')  . "-" . date('d');
              nm_conv_form_data($this->data_hoje, "aaaa-mm-dd", "AAAAMMDD", array($this->field_config['data_hoje']['date_sep'])) ;  
          $this->numero_de_dias = "" ;  
          $this->familiar = "" ;  
          $this->parentesco = "" ;  
          $this->cid = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['dados_form'] as $NM_campo => $NM_valor)
              {
                  $$NM_campo = $NM_valor;
              }
          }
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
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          control_licenca_tratamento_familiar_pack_ajax_response();
          exit;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos']))
              { 
                  $nome = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][0]; 
                  $data_nascimento = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][1]; 
                  $cpf = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][2]; 
                  $orgao = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][3]; 
                  $siape = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][4]; 
                  $data_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][5]; 
                  $data_final = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][6]; 
                  $numero_de_dias = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][7]; 
                  $data_hoje = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][8]; 
                  $familiar = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][9]; 
                  $parentesco = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][10]; 
                  $cid = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][11]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][0] = $this->nome; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][1] = $this->data_nascimento; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][2] = $this->cpf; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][3] = $this->orgao; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][4] = $this->siape; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][5] = $this->data_inicial; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][6] = $this->data_final; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][7] = $this->numero_de_dias; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][8] = $this->data_hoje; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][9] = $this->familiar; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][10] = $this->parentesco; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['campos'][11] = $this->cid; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("control_licenca_tratamento_familiar", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("control_licenca_tratamento_familiar_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
      }
      $this->nmgp_opcao = ""; 
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
           case 'nome':
               return "Nome do servidor";
               break;
           case 'data_nascimento':
               return "Data de Nascimento";
               break;
           case 'cpf':
               return "CPF";
               break;
           case 'orgao':
               return "Orgão";
               break;
           case 'siape':
               return "Siape";
               break;
           case 'data_inicial':
               return "Afastamento de";
               break;
           case 'data_final':
               return "A";
               break;
           case 'numero_de_dias':
               return "Número de dias afastado";
               break;
           case 'data_hoje':
               return "Data";
               break;
           case 'familiar':
               return "Familiar";
               break;
           case 'parentesco':
               return "Parentesco";
               break;
           case 'cid':
               return "CID";
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
              if (!isset($this->NM_ajax_info['errList']['geral_control_licenca_tratamento_familiar']) || !is_array($this->NM_ajax_info['errList']['geral_control_licenca_tratamento_familiar']))
              {
                  $this->NM_ajax_info['errList']['geral_control_licenca_tratamento_familiar'] = array();
              }
              $this->NM_ajax_info['errList']['geral_control_licenca_tratamento_familiar'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'nome' == $filtro)
        $this->ValidateField_nome($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data_nascimento' == $filtro)
        $this->ValidateField_data_nascimento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cpf' == $filtro)
        $this->ValidateField_cpf($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'orgao' == $filtro)
        $this->ValidateField_orgao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'siape' == $filtro)
        $this->ValidateField_siape($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data_inicial' == $filtro)
        $this->ValidateField_data_inicial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data_final' == $filtro)
        $this->ValidateField_data_final($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'numero_de_dias' == $filtro)
        $this->ValidateField_numero_de_dias($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data_hoje' == $filtro)
        $this->ValidateField_data_hoje($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'familiar' == $filtro)
        $this->ValidateField_familiar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'parentesco' == $filtro)
        $this->ValidateField_parentesco($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cid' == $filtro)
        $this->ValidateField_cid($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
      $this->nm_converte_datas();
//---

      if (empty($Campos_Crit) && empty($Campos_Falta))
      {
      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['control_licenca_tratamento_familiar']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cid = $this->cid;
    $original_cpf = $this->cpf;
    $original_data_final = $this->data_final;
    $original_data_hoje = $this->data_hoje;
    $original_data_inicial = $this->data_inicial;
    $original_data_nascimento = $this->data_nascimento;
    $original_familiar = $this->familiar;
    $original_nome = $this->nome;
    $original_numero_de_dias = $this->numero_de_dias;
    $original_orgao = $this->orgao;
    $original_parentesco = $this->parentesco;
    $original_siape = $this->siape;
}
if (!isset($this->sc_temp_global_cid)) {$this->sc_temp_global_cid = (isset($_SESSION['global_cid'])) ? $_SESSION['global_cid'] : "";}
if (!isset($this->sc_temp_global_parentesco)) {$this->sc_temp_global_parentesco = (isset($_SESSION['global_parentesco'])) ? $_SESSION['global_parentesco'] : "";}
if (!isset($this->sc_temp_global_familiar)) {$this->sc_temp_global_familiar = (isset($_SESSION['global_familiar'])) ? $_SESSION['global_familiar'] : "";}
if (!isset($this->sc_temp_global_numero_de_dias)) {$this->sc_temp_global_numero_de_dias = (isset($_SESSION['global_numero_de_dias'])) ? $_SESSION['global_numero_de_dias'] : "";}
if (!isset($this->sc_temp_global_data_hoje)) {$this->sc_temp_global_data_hoje = (isset($_SESSION['global_data_hoje'])) ? $_SESSION['global_data_hoje'] : "";}
if (!isset($this->sc_temp_global_data_final)) {$this->sc_temp_global_data_final = (isset($_SESSION['global_data_final'])) ? $_SESSION['global_data_final'] : "";}
if (!isset($this->sc_temp_global_data_inicial)) {$this->sc_temp_global_data_inicial = (isset($_SESSION['global_data_inicial'])) ? $_SESSION['global_data_inicial'] : "";}
if (!isset($this->sc_temp_global_siape)) {$this->sc_temp_global_siape = (isset($_SESSION['global_siape'])) ? $_SESSION['global_siape'] : "";}
if (!isset($this->sc_temp_global_orgao)) {$this->sc_temp_global_orgao = (isset($_SESSION['global_orgao'])) ? $_SESSION['global_orgao'] : "";}
if (!isset($this->sc_temp_global_cpf)) {$this->sc_temp_global_cpf = (isset($_SESSION['global_cpf'])) ? $_SESSION['global_cpf'] : "";}
if (!isset($this->sc_temp_global_data_nascimento)) {$this->sc_temp_global_data_nascimento = (isset($_SESSION['global_data_nascimento'])) ? $_SESSION['global_data_nascimento'] : "";}
if (!isset($this->sc_temp_global_nome_servidor)) {$this->sc_temp_global_nome_servidor = (isset($_SESSION['global_nome_servidor'])) ? $_SESSION['global_nome_servidor'] : "";}
      
      $nm_select = "select nome_paciente from paciente where id_paciente = $this->nome "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->verifica_servidor = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->verifica_servidor[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->verifica_servidor = false;
          $this->verifica_servidor_erro = $this->Db->ErrorMsg();
      } 
;
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}



if($this->verifica_servidor ){
	$this->sc_temp_global_nome_servidor = $this->verifica_servidor[0][0];
	$this->sc_temp_global_data_nascimento = $this->data_nascimento ;
	$this->sc_temp_global_cpf = $this->cpf ;
	$this->sc_temp_global_orgao = $this->orgao ;
	$this->sc_temp_global_siape = $this->siape ;
	$this->sc_temp_global_data_inicial = $this->data_inicial ;
	$this->sc_temp_global_data_final = $this->data_final ;
	$this->sc_temp_global_data_hoje = $this->data_hoje ;
	$this->sc_temp_global_numero_de_dias = $this->numero_de_dias ;
	$this->sc_temp_global_familiar = $this->familiar ;
	$this->sc_temp_global_parentesco = $this->parentesco ;
	$this->sc_temp_global_cid = $this->cid ;

	 if (isset($this->sc_temp_global_nome_servidor)) { $_SESSION['global_nome_servidor'] = $this->sc_temp_global_nome_servidor;}
 if (isset($this->sc_temp_global_data_nascimento)) { $_SESSION['global_data_nascimento'] = $this->sc_temp_global_data_nascimento;}
 if (isset($this->sc_temp_global_cpf)) { $_SESSION['global_cpf'] = $this->sc_temp_global_cpf;}
 if (isset($this->sc_temp_global_orgao)) { $_SESSION['global_orgao'] = $this->sc_temp_global_orgao;}
 if (isset($this->sc_temp_global_siape)) { $_SESSION['global_siape'] = $this->sc_temp_global_siape;}
 if (isset($this->sc_temp_global_data_inicial)) { $_SESSION['global_data_inicial'] = $this->sc_temp_global_data_inicial;}
 if (isset($this->sc_temp_global_data_final)) { $_SESSION['global_data_final'] = $this->sc_temp_global_data_final;}
 if (isset($this->sc_temp_global_data_hoje)) { $_SESSION['global_data_hoje'] = $this->sc_temp_global_data_hoje;}
 if (isset($this->sc_temp_global_numero_de_dias)) { $_SESSION['global_numero_de_dias'] = $this->sc_temp_global_numero_de_dias;}
 if (isset($this->sc_temp_global_familiar)) { $_SESSION['global_familiar'] = $this->sc_temp_global_familiar;}
 if (isset($this->sc_temp_global_parentesco)) { $_SESSION['global_parentesco'] = $this->sc_temp_global_parentesco;}
 if (isset($this->sc_temp_global_cid)) { $_SESSION['global_cid'] = $this->sc_temp_global_cid;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('pdfreport_licenca_tratamento') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
} else{

	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Servidor não cadastrado!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_control_licenca_tratamento_familiar' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Servidor não cadastrado!";
 }
;
};
if (isset($this->sc_temp_global_nome_servidor)) { $_SESSION['global_nome_servidor'] = $this->sc_temp_global_nome_servidor;}
if (isset($this->sc_temp_global_data_nascimento)) { $_SESSION['global_data_nascimento'] = $this->sc_temp_global_data_nascimento;}
if (isset($this->sc_temp_global_cpf)) { $_SESSION['global_cpf'] = $this->sc_temp_global_cpf;}
if (isset($this->sc_temp_global_orgao)) { $_SESSION['global_orgao'] = $this->sc_temp_global_orgao;}
if (isset($this->sc_temp_global_siape)) { $_SESSION['global_siape'] = $this->sc_temp_global_siape;}
if (isset($this->sc_temp_global_data_inicial)) { $_SESSION['global_data_inicial'] = $this->sc_temp_global_data_inicial;}
if (isset($this->sc_temp_global_data_final)) { $_SESSION['global_data_final'] = $this->sc_temp_global_data_final;}
if (isset($this->sc_temp_global_data_hoje)) { $_SESSION['global_data_hoje'] = $this->sc_temp_global_data_hoje;}
if (isset($this->sc_temp_global_numero_de_dias)) { $_SESSION['global_numero_de_dias'] = $this->sc_temp_global_numero_de_dias;}
if (isset($this->sc_temp_global_familiar)) { $_SESSION['global_familiar'] = $this->sc_temp_global_familiar;}
if (isset($this->sc_temp_global_parentesco)) { $_SESSION['global_parentesco'] = $this->sc_temp_global_parentesco;}
if (isset($this->sc_temp_global_cid)) { $_SESSION['global_cid'] = $this->sc_temp_global_cid;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cid != $this->cid || (isset($bFlagRead_cid) && $bFlagRead_cid)))
    {
        $this->ajax_return_values_cid(true);
    }
    if (($original_cpf != $this->cpf || (isset($bFlagRead_cpf) && $bFlagRead_cpf)))
    {
        $this->ajax_return_values_cpf(true);
    }
    if (($original_data_final != $this->data_final || (isset($bFlagRead_data_final) && $bFlagRead_data_final)))
    {
        $this->ajax_return_values_data_final(true);
    }
    if (($original_data_hoje != $this->data_hoje || (isset($bFlagRead_data_hoje) && $bFlagRead_data_hoje)))
    {
        $this->ajax_return_values_data_hoje(true);
    }
    if (($original_data_inicial != $this->data_inicial || (isset($bFlagRead_data_inicial) && $bFlagRead_data_inicial)))
    {
        $this->ajax_return_values_data_inicial(true);
    }
    if (($original_data_nascimento != $this->data_nascimento || (isset($bFlagRead_data_nascimento) && $bFlagRead_data_nascimento)))
    {
        $this->ajax_return_values_data_nascimento(true);
    }
    if (($original_familiar != $this->familiar || (isset($bFlagRead_familiar) && $bFlagRead_familiar)))
    {
        $this->ajax_return_values_familiar(true);
    }
    if (($original_nome != $this->nome || (isset($bFlagRead_nome) && $bFlagRead_nome)))
    {
        $this->ajax_return_values_nome(true);
    }
    if (($original_numero_de_dias != $this->numero_de_dias || (isset($bFlagRead_numero_de_dias) && $bFlagRead_numero_de_dias)))
    {
        $this->ajax_return_values_numero_de_dias(true);
    }
    if (($original_orgao != $this->orgao || (isset($bFlagRead_orgao) && $bFlagRead_orgao)))
    {
        $this->ajax_return_values_orgao(true);
    }
    if (($original_parentesco != $this->parentesco || (isset($bFlagRead_parentesco) && $bFlagRead_parentesco)))
    {
        $this->ajax_return_values_parentesco(true);
    }
    if (($original_siape != $this->siape || (isset($bFlagRead_siape) && $bFlagRead_siape)))
    {
        $this->ajax_return_values_siape(true);
    }
}
$_SESSION['scriptcase']['control_licenca_tratamento_familiar']['contr_erro'] = 'off'; 
      }
      }
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

      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
          {
              $_SESSION['scriptcase']['control_licenca_tratamento_familiar']['contr_erro'] = 'on';
    $this->background();
$_SESSION['scriptcase']['control_licenca_tratamento_familiar']['contr_erro'] = 'off'; 
          }
      }
   }

    function ValidateField_nome(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nome) > 72) 
          { 
              $Campos_Crit .= "Nome do servidor " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 72 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nome']))
              {
                  $Campos_Erros['nome'] = array();
              }
              $Campos_Erros['nome'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 72 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nome']) || !is_array($this->NM_ajax_info['errList']['nome']))
              {
                  $this->NM_ajax_info['errList']['nome'] = array();
              }
              $this->NM_ajax_info['errList']['nome'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 72 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nome

    function ValidateField_data_nascimento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->data_nascimento, $this->field_config['data_nascimento']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_nascimento']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_nascimento']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_nascimento']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_nascimento']['date_sep']) ; 
          if (trim($this->data_nascimento) != "")  
          { 
              if ($teste_validade->Data($this->data_nascimento, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Data de Nascimento; " ; 
                  if (!isset($Campos_Erros['data_nascimento']))
                  {
                      $Campos_Erros['data_nascimento'] = array();
                  }
                  $Campos_Erros['data_nascimento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_nascimento']) || !is_array($this->NM_ajax_info['errList']['data_nascimento']))
                  {
                      $this->NM_ajax_info['errList']['data_nascimento'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_nascimento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data_nascimento']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_data_nascimento

    function ValidateField_cpf(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cpf) > 20) 
          { 
              $Campos_Crit .= "CPF " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cpf']))
              {
                  $Campos_Erros['cpf'] = array();
              }
              $Campos_Erros['cpf'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cpf']) || !is_array($this->NM_ajax_info['errList']['cpf']))
              {
                  $this->NM_ajax_info['errList']['cpf'] = array();
              }
              $this->NM_ajax_info['errList']['cpf'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cpf

    function ValidateField_orgao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->orgao) > 20) 
          { 
              $Campos_Crit .= "Orgão " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['orgao']))
              {
                  $Campos_Erros['orgao'] = array();
              }
              $Campos_Erros['orgao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['orgao']) || !is_array($this->NM_ajax_info['errList']['orgao']))
              {
                  $this->NM_ajax_info['errList']['orgao'] = array();
              }
              $this->NM_ajax_info['errList']['orgao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_orgao

    function ValidateField_siape(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->siape) > 20) 
          { 
              $Campos_Crit .= "Siape " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['siape']))
              {
                  $Campos_Erros['siape'] = array();
              }
              $Campos_Erros['siape'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['siape']) || !is_array($this->NM_ajax_info['errList']['siape']))
              {
                  $this->NM_ajax_info['errList']['siape'] = array();
              }
              $this->NM_ajax_info['errList']['siape'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_siape

    function ValidateField_data_inicial(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->data_inicial, $this->field_config['data_inicial']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_inicial']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_inicial']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_inicial']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_inicial']['date_sep']) ; 
          if (trim($this->data_inicial) != "")  
          { 
              if ($teste_validade->Data($this->data_inicial, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Afastamento de; " ; 
                  if (!isset($Campos_Erros['data_inicial']))
                  {
                      $Campos_Erros['data_inicial'] = array();
                  }
                  $Campos_Erros['data_inicial'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_inicial']) || !is_array($this->NM_ajax_info['errList']['data_inicial']))
                  {
                      $this->NM_ajax_info['errList']['data_inicial'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_inicial'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data_inicial']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_data_inicial

    function ValidateField_data_final(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->data_final, $this->field_config['data_final']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_final']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_final']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_final']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_final']['date_sep']) ; 
          if (trim($this->data_final) != "")  
          { 
              if ($teste_validade->Data($this->data_final, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "A; " ; 
                  if (!isset($Campos_Erros['data_final']))
                  {
                      $Campos_Erros['data_final'] = array();
                  }
                  $Campos_Erros['data_final'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_final']) || !is_array($this->NM_ajax_info['errList']['data_final']))
                  {
                      $this->NM_ajax_info['errList']['data_final'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_final'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data_final']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_data_final

    function ValidateField_numero_de_dias(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->numero_de_dias == "")  
      { 
          $this->numero_de_dias = 0;
          $this->sc_force_zero[] = 'numero_de_dias';
      } 
      nm_limpa_numero($this->numero_de_dias, $this->field_config['numero_de_dias']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->numero_de_dias != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->numero_de_dias, 0, 1))
              {
                  $iTestSize++;
              }
              if (strlen($this->numero_de_dias) > $iTestSize)  
              { 
                  $Campos_Crit .= "Número de dias afastado: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['numero_de_dias']))
                  {
                      $Campos_Erros['numero_de_dias'] = array();
                  }
                  $Campos_Erros['numero_de_dias'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['numero_de_dias']) || !is_array($this->NM_ajax_info['errList']['numero_de_dias']))
                  {
                      $this->NM_ajax_info['errList']['numero_de_dias'] = array();
                  }
                  $this->NM_ajax_info['errList']['numero_de_dias'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->numero_de_dias, 20, 0, 0, 0, "S") == false)  
              { 
                  $Campos_Crit .= "Número de dias afastado; " ; 
                  if (!isset($Campos_Erros['numero_de_dias']))
                  {
                      $Campos_Erros['numero_de_dias'] = array();
                  }
                  $Campos_Erros['numero_de_dias'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['numero_de_dias']) || !is_array($this->NM_ajax_info['errList']['numero_de_dias']))
                  {
                      $this->NM_ajax_info['errList']['numero_de_dias'] = array();
                  }
                  $this->NM_ajax_info['errList']['numero_de_dias'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_numero_de_dias

    function ValidateField_data_hoje(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->data_hoje, $this->field_config['data_hoje']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_hoje']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_hoje']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_hoje']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_hoje']['date_sep']) ; 
          if (trim($this->data_hoje) != "")  
          { 
              if ($teste_validade->Data($this->data_hoje, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Data; " ; 
                  if (!isset($Campos_Erros['data_hoje']))
                  {
                      $Campos_Erros['data_hoje'] = array();
                  }
                  $Campos_Erros['data_hoje'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_hoje']) || !is_array($this->NM_ajax_info['errList']['data_hoje']))
                  {
                      $this->NM_ajax_info['errList']['data_hoje'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_hoje'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data_hoje']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_data_hoje

    function ValidateField_familiar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->familiar) > 50) 
          { 
              $Campos_Crit .= "Familiar " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['familiar']))
              {
                  $Campos_Erros['familiar'] = array();
              }
              $Campos_Erros['familiar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['familiar']) || !is_array($this->NM_ajax_info['errList']['familiar']))
              {
                  $this->NM_ajax_info['errList']['familiar'] = array();
              }
              $this->NM_ajax_info['errList']['familiar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_familiar

    function ValidateField_parentesco(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->parentesco) > 20) 
          { 
              $Campos_Crit .= "Parentesco " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['parentesco']))
              {
                  $Campos_Erros['parentesco'] = array();
              }
              $Campos_Erros['parentesco'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['parentesco']) || !is_array($this->NM_ajax_info['errList']['parentesco']))
              {
                  $this->NM_ajax_info['errList']['parentesco'] = array();
              }
              $this->NM_ajax_info['errList']['parentesco'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_parentesco

    function ValidateField_cid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cid) > 40) 
          { 
              $Campos_Crit .= "CID " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cid']))
              {
                  $Campos_Erros['cid'] = array();
              }
              $Campos_Erros['cid'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cid']) || !is_array($this->NM_ajax_info['errList']['cid']))
              {
                  $this->NM_ajax_info['errList']['cid'] = array();
              }
              $this->NM_ajax_info['errList']['cid'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cid

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
    $this->nmgp_dados_form['nome'] = $this->nome;
    $this->nmgp_dados_form['data_nascimento'] = $this->data_nascimento;
    $this->nmgp_dados_form['cpf'] = $this->cpf;
    $this->nmgp_dados_form['orgao'] = $this->orgao;
    $this->nmgp_dados_form['siape'] = $this->siape;
    $this->nmgp_dados_form['data_inicial'] = $this->data_inicial;
    $this->nmgp_dados_form['data_final'] = $this->data_final;
    $this->nmgp_dados_form['numero_de_dias'] = $this->numero_de_dias;
    $this->nmgp_dados_form['data_hoje'] = $this->data_hoje;
    $this->nmgp_dados_form['familiar'] = $this->familiar;
    $this->nmgp_dados_form['parentesco'] = $this->parentesco;
    $this->nmgp_dados_form['cid'] = $this->cid;
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_data($this->data_nascimento, $this->field_config['data_nascimento']['date_sep']) ; 
      nm_limpa_data($this->data_inicial, $this->field_config['data_inicial']['date_sep']) ; 
      nm_limpa_data($this->data_final, $this->field_config['data_final']['date_sep']) ; 
      nm_limpa_numero($this->numero_de_dias, $this->field_config['numero_de_dias']['symbol_grp']) ; 
      nm_limpa_data($this->data_hoje, $this->field_config['data_hoje']['date_sep']) ; 
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
      if ($Nome_Campo == "numero_de_dias")
      {
          nm_limpa_numero($this->numero_de_dias, $this->field_config['numero_de_dias']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      $this->data_nascimento = trim($this->data_nascimento);
      if ($this->data_nascimento == "00000000")
      {
          $this->data_nascimento = "";
      }
      if (!empty($this->data_nascimento) || (!empty($format_fields) && isset($format_fields['data_nascimento'])))
      {
          nm_conv_form_data($this->data_nascimento, "AAAAMMDD", $this->field_config['data_nascimento']['date_format'], array($this->field_config['data_nascimento']['date_sep'])) ;  
      }
      $this->data_inicial = trim($this->data_inicial);
      if ($this->data_inicial == "00000000000000")
      {
          $this->data_inicial = "";
      }
      if (!empty($this->data_inicial) || (!empty($format_fields) && isset($format_fields['data_inicial'])))
      {
          nm_conv_form_data($this->data_inicial, "DD   MM   AAAA", $this->field_config['data_inicial']['date_format'], array($this->field_config['data_inicial']['date_sep'])) ;  
      }
      $this->data_final = trim($this->data_final);
      if ($this->data_final == "00000000000000")
      {
          $this->data_final = "";
      }
      if (!empty($this->data_final) || (!empty($format_fields) && isset($format_fields['data_final'])))
      {
          nm_conv_form_data($this->data_final, "DD   MM   AAAA", $this->field_config['data_final']['date_format'], array($this->field_config['data_final']['date_sep'])) ;  
      }
      if (!empty($this->numero_de_dias) || (!empty($format_fields) && isset($format_fields['numero_de_dias'])))
      {
          nmgp_Form_Num_Val($this->numero_de_dias, $this->field_config['numero_de_dias']['symbol_grp'], $this->field_config['numero_de_dias']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['numero_de_dias']['symbol_fmt']) ; 
      }
      $this->data_hoje = trim($this->data_hoje);
      if ($this->data_hoje == "00000000")
      {
          $this->data_hoje = "";
      }
      if (!empty($this->data_hoje) || (!empty($format_fields) && isset($format_fields['data_hoje'])))
      {
          nm_conv_form_data($this->data_hoje, "AAAAMMDD", $this->field_config['data_hoje']['date_format'], array($this->field_config['data_hoje']['date_sep'])) ;  
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
      if ($this->data_nascimento != "")  
      {
     nm_conv_form_data($this->data_nascimento, $this->field_config['data_nascimento']['date_format'], "AAAAMMDD", array($this->field_config['data_nascimento']['date_sep'])) ;  
      }
      if ($this->data_inicial != "")  
      {
     nm_conv_form_data($this->data_inicial, $this->field_config['data_inicial']['date_format'], "DD   MM   AAAA", array($this->field_config['data_inicial']['date_sep'])) ;  
      }
      if ($this->data_final != "")  
      {
     nm_conv_form_data($this->data_final, $this->field_config['data_final']['date_format'], "DD   MM   AAAA", array($this->field_config['data_final']['date_sep'])) ;  
      }
      if ($this->data_hoje != "")  
      {
     nm_conv_form_data($this->data_hoje, $this->field_config['data_hoje']['date_format'], "AAAAMMDD", array($this->field_config['data_hoje']['date_sep'])) ;  
      }
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

   function ajax_return_values()
   {
          $this->ajax_return_values_nome();
          $this->ajax_return_values_data_nascimento();
          $this->ajax_return_values_cpf();
          $this->ajax_return_values_orgao();
          $this->ajax_return_values_siape();
          $this->ajax_return_values_data_inicial();
          $this->ajax_return_values_data_final();
          $this->ajax_return_values_numero_de_dias();
          $this->ajax_return_values_data_hoje();
          $this->ajax_return_values_familiar();
          $this->ajax_return_values_parentesco();
          $this->ajax_return_values_cid();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- nome
   function ajax_return_values_nome($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nome", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nome);
              $aLookup = array();
              $this->_tmp_lookup_nome = $this->nome;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['Lookup_nome']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['Lookup_nome'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['Lookup_nome']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['Lookup_nome'] = array(); 
    }

   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_data_inicial = $this->data_inicial;
   $old_value_data_final = $this->data_final;
   $old_value_numero_de_dias = $this->numero_de_dias;
   $old_value_data_hoje = $this->data_hoje;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_data_inicial = $this->data_inicial;
   $unformatted_value_data_final = $this->data_final;
   $unformatted_value_numero_de_dias = $this->numero_de_dias;
   $unformatted_value_data_hoje = $this->data_hoje;

   $nm_comando = "SELECT id_paciente, nome_paciente FROM paciente WHERE (tipo_paciente = 'servidor') AND id_paciente = '" . substr($this->Db->qstr($this->nome), 1, -1) . "' ORDER BY nome_paciente";

   $this->data_nascimento = $old_value_data_nascimento;
   $this->data_inicial = $old_value_data_inicial;
   $this->data_final = $old_value_data_final;
   $this->numero_de_dias = $old_value_numero_de_dias;
   $this->data_hoje = $old_value_data_hoje;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(control_licenca_tratamento_familiar_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => control_licenca_tratamento_familiar_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['Lookup_nome'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['nome'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['nome']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['nome']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['nome']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][control_licenca_tratamento_familiar_pack_protect_string(NM_charset_to_utf8($this->nome))]) ? $aLookup[0][control_licenca_tratamento_familiar_pack_protect_string(NM_charset_to_utf8($this->nome))] : "";
          $this->NM_ajax_info['fldList']['nome_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- data_nascimento
   function ajax_return_values_data_nascimento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_nascimento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_nascimento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_nascimento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cpf
   function ajax_return_values_cpf($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cpf", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cpf);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cpf'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- orgao
   function ajax_return_values_orgao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("orgao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->orgao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['orgao'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- siape
   function ajax_return_values_siape($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("siape", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->siape);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['siape'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- data_inicial
   function ajax_return_values_data_inicial($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_inicial", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_inicial);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_inicial'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- data_final
   function ajax_return_values_data_final($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_final", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_final);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_final'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- numero_de_dias
   function ajax_return_values_numero_de_dias($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numero_de_dias", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numero_de_dias);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numero_de_dias'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- data_hoje
   function ajax_return_values_data_hoje($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_hoje", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_hoje);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_hoje'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- familiar
   function ajax_return_values_familiar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("familiar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->familiar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['familiar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- parentesco
   function ajax_return_values_parentesco($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("parentesco", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->parentesco);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['parentesco'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cid
   function ajax_return_values_cid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['upload_dir'][$fieldName][] = $newName;
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
//
function background()
{
$_SESSION['scriptcase']['control_licenca_tratamento_familiar']['contr_erro'] = 'on';
     
print("
	<html>
		<body>
			<div id='bg'>
				<img id='bg' src='http://192.168.0.51:8081/scriptcase/devel/conf/sys/img/bg/medicina5%202.jpg' alt=''>
			</div>

		</body>
	</html>
	<style>

		.scFormBorder{
			position:relative;
		}

		#bg {
			position: fixed; 
			top: 0; 
			left: 0; 
			width: 100%; 
			height: 100%;
		}

		#bg img {
			position: absolute; 
			top: 0; 
			left: 0; 
			right: 0; 
			bottom: 0; 
			margin: auto; 
			min-width: 50%;
			min-height: 50%;
		}
	</style>
");


$_SESSION['scriptcase']['control_licenca_tratamento_familiar']['contr_erro'] = 'off';
}
function nome_onChange()
{
$_SESSION['scriptcase']['control_licenca_tratamento_familiar']['contr_erro'] = 'on';
     
$original_nome = $this->nome;
$original_data_nascimento = $this->data_nascimento;
$original_cpf = $this->cpf;
$original_orgao = $this->orgao;
$original_siape = $this->siape;

 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select str_replace (convert(char(10),data_nascimento,102), '.', '-') + ' ' + convert(char(8),data_nascimento,20) from paciente where id_paciente = $this->nome "; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select convert(char(23),data_nascimento,121) from paciente where id_paciente = $this->nome "; 
      }
      else
      { 
          $nm_select = "select data_nascimento from paciente where id_paciente = $this->nome "; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->DS_data_nascimento = array();
      $this->ds_data_nascimento = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->DS_data_nascimento[$y] [$x] = $rx->fields[$x];
                      $this->ds_data_nascimento[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->DS_data_nascimento = false;
          $this->DS_data_nascimento_erro = $this->Db->ErrorMsg();
          $this->ds_data_nascimento = false;
          $this->ds_data_nascimento_erro = $this->Db->ErrorMsg();
      } 
;
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

$this->data_nascimento  = $this->ds_data_nascimento[0][0];

 
      $nm_select = "select cpf from paciente where id_paciente = $this->nome "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->DS_cpf = array();
      $this->ds_cpf = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->DS_cpf[$y] [$x] = $rx->fields[$x];
                      $this->ds_cpf[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->DS_cpf = false;
          $this->DS_cpf_erro = $this->Db->ErrorMsg();
          $this->ds_cpf = false;
          $this->ds_cpf_erro = $this->Db->ErrorMsg();
      } 
;
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

$this->cpf  = $this->ds_cpf[0][0];



 
      $nm_select = "select siape from servidor where id_paciente = $this->nome "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->DS_siape = array();
      $this->ds_siape = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->DS_siape[$y] [$x] = $rx->fields[$x];
                      $this->ds_siape[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->DS_siape = false;
          $this->DS_siape_erro = $this->Db->ErrorMsg();
          $this->ds_siape = false;
          $this->ds_siape_erro = $this->Db->ErrorMsg();
      } 
;
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

$this->siape  = $this->ds_siape[0][0];



$modificado_nome = $this->nome;
$modificado_data_nascimento = $this->data_nascimento;
$modificado_cpf = $this->cpf;
$modificado_orgao = $this->orgao;
$modificado_siape = $this->siape;
$this->nm_formatar_campos('nome', 'data_nascimento', 'cpf', 'orgao', 'siape');
if ($original_nome !== $modificado_nome || (isset($bFlagRead_nome) && $bFlagRead_nome))
{
    $this->ajax_return_values_nome(true);
}
if ($original_data_nascimento !== $modificado_data_nascimento || (isset($bFlagRead_data_nascimento) && $bFlagRead_data_nascimento))
{
    $this->ajax_return_values_data_nascimento(true);
}
if ($original_cpf !== $modificado_cpf || (isset($bFlagRead_cpf) && $bFlagRead_cpf))
{
    $this->ajax_return_values_cpf(true);
}
if ($original_orgao !== $modificado_orgao || (isset($bFlagRead_orgao) && $bFlagRead_orgao))
{
    $this->ajax_return_values_orgao(true);
}
if ($original_siape !== $modificado_siape || (isset($bFlagRead_siape) && $bFlagRead_siape))
{
    $this->ajax_return_values_siape(true);
}
control_licenca_tratamento_familiar_pack_ajax_response();
exit;
$_SESSION['scriptcase']['control_licenca_tratamento_familiar']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              control_licenca_tratamento_familiar_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
      { 
          $nm_saida_global = $_SESSION['scriptcase']['nm_sc_retorno']; 
      } 
    $this->nm_formatar_campos();
    include_once("control_licenca_tratamento_familiar_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['csrf_token'];
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
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['sc_outra_jan'])
   {
       $nmgp_saida_form = "control_licenca_tratamento_familiar_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['nm_run_menu'] = 2;
       $nmgp_saida_form = "control_licenca_tratamento_familiar_fim.php";
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
       control_licenca_tratamento_familiar_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['masterValue']);
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
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_licenca_tratamento_familiar']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           control_licenca_tratamento_familiar_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
           $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       }
       control_licenca_tratamento_familiar_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&script_case_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&script_case_session=<?php echo session_id() ?> &nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
   </BODY>
   </HTML>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
}
?>
