<?php
   include_once('odontograma_inclusao_Vfinal_session.php');
   @session_start() ;
   $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_doc']        = "";
//
class odontograma_inclusao_Vfinal_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $nm_app_version;
   var $cor_link_dados;
   var $root;
   var $server;
   var $java_protocol;
   var $server_pdf;
   var $Arr_result;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_conf_reg;
   var $str_schema_all;
   var $Str_btn_grid;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_ger_css_emb;
   var $sc_tem_trans_banco;
   var $nm_bases_all;
   var $nm_bases_access;
   var $nm_bases_db2;
   var $nm_bases_ibase;
   var $nm_bases_informix;
   var $nm_bases_mssql;
   var $nm_bases_mysql;
   var $nm_bases_postgres;
   var $nm_bases_oracle;
   var $nm_bases_sqlite;
   var $nm_bases_sybase;
   var $nm_bases_vfp;
   var $nm_bases_odbc;
   var $sc_page;
   var $sc_lig_md5 = array();
//
   function init($Tp_init = "")
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init, $nmgp_opcao;

      if (!function_exists("sc_check_mobile"))
      {
          include_once("../_lib/lib/php/nm_check_mobile.php");
      }
      $_SESSION['scriptcase']['proc_mobile'] = sc_check_mobile();
      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
      $this->sc_charset['UTF-8'] = 'utf-8';
      $this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
      $this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
      $this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
      $this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
      $this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
      $this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
      $this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
      $this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
      $this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
      $this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
      $this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
      $this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
      $this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
      $this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
      $this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
      $this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
      $this->sc_charset['WINDOWS-1250'] = 'windows-1250';
      $this->sc_charset['WINDOWS-1251'] = 'windows-1251';
      $this->sc_charset['WINDOWS-1252'] = 'windows-1252';
      $this->sc_charset['WINDOWS-1253'] = 'windows-1253';
      $this->sc_charset['WINDOWS-1254'] = 'windows-1254';
      $this->sc_charset['WINDOWS-1255'] = 'windows-1255';
      $this->sc_charset['WINDOWS-1256'] = 'windows-1256';
      $this->sc_charset['WINDOWS-1257'] = 'windows-1257';
      $this->sc_charset['KOI8-R'] = 'koi8-r';
      $this->sc_charset['BIG-5'] = 'big5';
      $this->sc_charset['EUC-CN'] = 'EUC-CN';
      $this->sc_charset['GB18030'] = 'GB18030';
      $this->sc_charset['GB2312'] = 'gb2312';
      $this->sc_charset['EUC-JP'] = 'euc-jp';
      $this->sc_charset['SJIS'] = 'shift-jis';
      $this->sc_charset['EUC-KR'] = 'euc-kr';
      $_SESSION['scriptcase']['charset_entities']['UTF-8'] = 'UTF-8';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
      $_SESSION['scriptcase']['charset_entities']['WINDOWS-1251'] = 'cp1251';
      $_SESSION['scriptcase']['charset_entities']['WINDOWS-1252'] = 'cp1252';
      $_SESSION['scriptcase']['charset_entities']['BIG-5'] = 'BIG5';
      $_SESSION['scriptcase']['charset_entities']['EUC-CN'] = 'GB2312';
      $_SESSION['scriptcase']['charset_entities']['GB2312'] = 'GB2312';
      $_SESSION['scriptcase']['charset_entities']['SJIS'] = 'Shift_JIS';
      $_SESSION['scriptcase']['charset_entities']['EUC-JP'] = 'EUC-JP';
      $_SESSION['scriptcase']['charset_entities']['KOI8-R'] = 'KOI8-R';
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "odontograma_inclusao_Vfinal"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "sistema_csmo_gwolner"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "gwolner"; 
      $this->nm_versao_sc    = "v8"; 
      $this->nm_tp_lic_sc    = "ep_gold"; 
      $this->nm_dt_criacao   = "20181218"; 
      $this->nm_hr_criacao   = "182030"; 
      $this->nm_autor_alt    = "gwolner"; 
      $this->nm_dt_ult_alt   = "20190222"; 
      $this->nm_hr_ult_alt   = "173915"; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "2.0.0";
// 
// 
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys          = str_replace("\\", '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(empty($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
      $this->sc_site_ssl     = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_path_doc'];
      if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
      {
          $_SESSION['scriptcase']['str_lang'] = "pt_br";
      }
      if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
      {
          $_SESSION['scriptcase']['str_conf_reg'] = "pt_br";
      }
      $this->str_lang        = $_SESSION['scriptcase']['str_lang'];
      $this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Green/Green";
      $_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
      $_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
      $this->server          = (!isset($_SERVER['HTTP_HOST'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (!isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->java_protocol   = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->server_pdf      = $this->java_protocol . $this->server;
      $this->server          = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/odontograma_inclusao_Vfinal';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_font       = $this->root . $this->path_link . "_lib/font/";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_lib_js     = $this->root . $this->path_link . "_lib/lib/js";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_chart_theme = $this->root . $this->path_link . "_lib/chart/";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      if (!isset($_SESSION['scriptcase']['fusioncharts_new']))
      {
          $_SESSION['scriptcase']['fusioncharts_new'] = @is_dir($this->path_third . '/fusioncharts_xt_ol');
      }
      if (!isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs');
      }
      if (isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $aTmpOS = $this->getRunningOS();
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs/' . $aTmpOS['os']);
      }
      if (!class_exists('Services_JSON'))
      {
          include_once("odontograma_inclusao_Vfinal_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['SC_Link_View'] = true;
          }
      }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_save_ancor")
      {
          $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['ancor_save'] = $_POST['ancor_save'];
          $oJson = new Services_JSON();
          exit;
      }
      if (isset($_SESSION['scriptcase']['user_logout']))
      {
          foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
          {
              if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
              {
                  unset($_SESSION['scriptcase']['user_logout'][$ind]);
                  $nm_apl_dest = $parms['R'];
                  $dir = explode("/", $nm_apl_dest);
                  if (count($dir) == 1)
                  {
                      $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_event" || $_POST['nmgp_opcao'] == "ajax_navigate"))
                  {
                      $this->Arr_result = array();
                      $this->Arr_result['redirInfo']['action']              = $nm_apl_dest;
                      $this->Arr_result['redirInfo']['target']              = $parms['T'];
                      $this->Arr_result['redirInfo']['metodo']              = "post";
                      $this->Arr_result['redirInfo']['script_case_init']    = $this->sc_page;
                      $this->Arr_result['redirInfo']['script_case_session'] = session_id();
                      $oJson = new Services_JSON();
                      echo $oJson->encode($this->Arr_result);
                      exit;
                  }
?>
                  <html>
                  <body>
                  <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
                  </form>
                  <script>
                   document.FRedirect.submit();
                  </script>
                  </body>
                  </html>
<?php
                  exit;
              }
          }
      }
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "ISO-8859-1";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_lang as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
         {
             $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
             $this->Nm_lang[$ind] = $dados;
         }
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      $_SESSION['sc_session']['SC_download_violation'] = $this->Nm_lang['lang_errm_fnfd'];
      if (isset($_SESSION['sc_session']['SC_parm_violation']))
      {
          unset($_SESSION['sc_session']['SC_parm_violation']);
          echo "<html>";
          echo "<body>";
          echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
          echo "<tr>";
          echo "   <td align=\"center\">";
          echo "       <b><font size=4>" . $this->Nm_lang['lang_errm_ajax_data'] . "</font>";
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          echo "</body>";
          echo "</html>";
          exit;
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      $PHP_ver = str_replace(".", "", phpversion()); 
      if (substr($PHP_ver, 0, 3) < 434)
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
      } 
      if (file_exists($this->path_libs . "/ver.dat"))
      {
          $SC_ver = file($this->path_libs . "/ver.dat"); 
          $SC_ver = str_replace(".", "", $SC_ver[0]); 
          if (substr($SC_ver, 0, 5) < 40015)
          {
              echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
          } 
      } 
      $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #34495E; border-style: solid; border-width: 1px; padding: 8px 10px;  }";
          echo ".scButton_disabled { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #7d7d7d; font-weight: normal; background-color: #e6e6e6; border-style: solid; border-width: 1px; padding: 8px 10px;  }";
          echo ".scButton_onmousedown { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #5D6D7E; border-style: solid; border-width: 1px; padding: 8px 10px;  }";
          echo ".scButton_onmouseover { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #5D6D7E; border-style: solid; border-width: 1px; padding: 8px 10px;  }";
          echo ".scButton_small { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #34495E; border-style: solid; border-width: 1px; padding: 3px 13px;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }

      $this->nm_ger_css_emb = true;
      $this->path_atual     = getcwd();
      $opsys = strtolower(php_uname());

// 
      include_once($this->path_aplicacao . "odontograma_inclusao_Vfinal_erro.class.php"); 
      $this->Erro = new odontograma_inclusao_Vfinal_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('odontograma_inclusao_Vfinal'); 
// 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("pt_br");
      include("../_lib/css/" . $this->str_schema_all . "_grid.php");
      $this->Tree_img_col    = trim($str_tree_col);
      $this->Tree_img_exp    = trim($str_tree_exp);
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1;
      } 
      $this->regionalDefault();
      $this->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->path_btn . $this->Str_btn_grid);
      $_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->sc_tem_trans_banco = false;
      $this->nm_bases_access     = array("access", "ado_access");
      $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6");
      $this->nm_bases_ibase      = array("ibase", "firebird", "borland_ibase");
      $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
      $this->nm_bases_mssql      = array("mssql", "ado_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "maxsql", "pdo_mysql");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql");
      $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle");
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_sybase     = array("sybase");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_odbc       = array("odbc");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_db2, $this->nm_bases_ibase, $this->nm_bases_informix, $this->nm_bases_mssql, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_oracle, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc);
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcBwZSX7D1BeD5JwHgvsDkFCDWFYVENUHQNmZ1rqHIBeHQBOHgNKHArCDWF/VoBiDcJUZSX7Z1BYHuFaDMvOV9FeV5X/VEBiHQNmH9BqZ1rYHQX7HgNOHErsHEB7VoFGHQFYH9BiD1BeHQJeDMvsV9BUH5B3DoXGHQXGH9BOHAN7HQJeHgNODkB/H5FGVoFGHQNmDQFaHArYHuBqHgrwDkBsDuB7VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3V5B7ZuJsHQXsH9FUHABYHQrqDMrYVIBsDuFGDoXGDcNmZ1FGHAvmZMXGDMvCDkXKHEB7VoFGHQBiH9FUHIvsVWBOHgvOV9FeDurGDoXGHQBqZ1BOHANOHQBqHgBYHArCH5X/DoF7D9XsDQJsDSBYV5FGHgNKZSJ3HEBmDoBiHQNGVIraHArKHQrqDMzGDkFeDWF/VoFGD9NmDQX7HIBeVWJsHuvmVcFCDWXCDoJeDcJUZkFUHArKHQrqHgBOHEBUH5X/DoNUDcJeDQFGHANOD5JwHgNKVcrsH5FqDoX7D9BsH9FaHIBeV5FUHgvCHEFKDWF/ZuXGD9XsZSFGD1vOV5BiHgvsDkBODWFaDoJsDcBwZ1rqHArYD5JeDMzGHAFKDWF/VoB/D9JKDQFGD1veD5BOHgrKVcFCDWrmVoFaD9BsH9B/HAvmD5raDEvsHEFiDuJeVoB/D9XsDuBOHAveD5JeHuNODkFCDWrmVoFaD9BsZ1F7DSrYD5rqDMzGHEXeV5XCDoXGD9JKDQX7Z1N7D5XGDMrwZSrCH5FqDoJeD9JmZ1B/D1NaD5rqHgrKHArsHEB3ZuBqHQNmH9BiHIrwHuX7HgrwVcFiV5FYHIX7HQBsZSBODSvOZMXGHgBeHAFKV5FqHMX7DcBiDQB/D1NKV5BqHgrwZSrCV5FYHMFGHQBsH9BqD1NaD5XGHgvsHAFKH5FYVoX7D9JKDQX7D1BOV5FGDMzGV9BUHEF/HINUDcFYZkFGD1rwHQXGHgvsDkFeV5B7ZuBqDcBiDQFUHAN7V5FaDMBOV9FiV5FYHIBiDcNmZSBqZ1rYHuBOHgNKHAFKV5FqHMX7DcBiDQBqHAvCVWJeDMrYV9FiH5FqDoJeD9JmZ1B/D1NaD5rqHgvsHErsHEXCHMFaHQXsDuFaHAvmVWJeHgrwZSJ3V5FYHIX7HQXGZ1BiHArYHuJsDMvCHEFKV5FqHMB/HQXsZSBiHABYV5FaDMvOZSJ3V5X/VoFGHQXGZSBODSrYHQFUHgBODkBsH5FYVoX7D9JKDQX7D1BOV5FGHuzGDkBOH5FqVoJwD9XOZ1F7HABYZMB/DEBeHENiV5XKDoB/D9XsZSFGHAveVWJsDMrwDkBsV5F/DoraD9BiZ1FGZ1rYD5NUDEBeZSXeH5FGDoB/D9NmZ9XGHIvsV5XGDMrwDkFCDuX7VEF7D9BiH9FaHAN7D5FaDEBOZSJGH5BmDoB/D9NwZSX7D1BeV5BOHuvmVcFCDWXCVENUDcBqH9B/HABYD5JeDMzGHAFKV5XKDoF7D9XsDQJsDSBYV5FGHgNKDkFCH5FqVoBqDcNwH9B/HIveD5FaDErKZSJGH5F/DoFUD9NmZSX7HABYD5BqDMrwVIFCDWJeDoraDcBqH9B/DSrYV5BqDMzGHAFKV5XCVoXGDcBwH9FGHAveD5JwDMrwVIBODuFqVoraDcBqH9B/HABYV5FGHgBeHEFiV5B3DoF7D9XsDuFaHANKV5BqHgvOVcBOV5BmVoFGHQBiZkBiD1rwD5JeDEBOHEFiHEFaHMB/DcBwH9FGD1veHQB/DMvmVcFKV5BmVoBqD9BsZkFGHAvsD5FaDEBOZSXeH5F/DoB/D9XsH9FGD1veV5JwHgrKDkFCDWJeVoB/D9BsZ1B/HABYD5BiDEBeHEXeV5XCDoF7D9XsDQJwHABYV5BqHgvsVcBOV5X7VoJwDcFYZSB/HANOV5JeDEBOVkXeDWX7VoX7HQXGH9FGHAveD5BOHuzGVcFeDWXCDoJsDcBwH9B/Z1rYHQJwHgBeHEFiV5B3DoF7D9XsDuFaHAveHuBOHgvOVcFeV5FYHIrqHQXOZSBqZ1rYHuXGDEBOZSJGDWXCDoJsHQBiZSFUHANKV5XGHgrKDkBsV5F/DoraHQJmZ1F7Z1vmD5rqDEBOHArCDWF/VoB/D9NwDQB/Z1rwD5XGHuNODkBODuFqDoNUHQJmZ1F7Z1vmD5rqDEBOHArCDWBmDoJeHQBiDQBqHAvOVWBqDMvOVcBUDWrmVoX7HQNwZkFGHArKV5FUDMrYZSXeV5FqHIJsD9NmDQX7D1BOVWXGDMzGDkBODWF/DoX7D9XGZkFGHANOHQJsHgNOHEFiHEFaHIJwHQJKDQJsZ1vCV5FGHuNOV9FeDWXCHMBqHQBsZSBOHArKHQBiDMrYHEFKV5B7DoNUHQNwDQX7Z1N7V5BqHuBYVcFKHEFYVENUD9BiZ1FaD1rKD5FaDMrYHErCDWXCVoB/DcBwDQJsHABYV5BOHgvsVcBODuB7VoFaDcJUZ1F7D1zGD5raHgBOHEXeH5F/ZuB/HQXGZ9JeHAveHuF7HuvmZSFeHEBmDoJsDcBwZ1X7D1rKV5FaDMBYDkBsV5B3DoNUDcBwDQJsD1vOV5BiDMBOVcFeDWFYHMBiD9BsVIraD1rwV5X7HgBeHErsDurmVoBiHQBiDQNUZ1rKVWFU";
      ob_start();
      $this->prep_conect();
      $this->conectDB();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase8_BlueWood_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase8_BlueWood_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
      $this->Ajax_result_set = ob_get_contents();
      ob_end_clean();
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = ""; 
      }
   }

   function getRunningOS()
   {
       $aOSInfo = array();

       if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
       {
           $aOSInfo['os'] = 'win';
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
       {
           $aOSInfo['os'] = 'linux-i386';
           if(strpos(strtolower(php_uname()), 'x86_64') !== FALSE) 
            {
               $aOSInfo['os'] = 'linux-amd64';
            }
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
       {
           $aOSInfo['os'] = 'macos';
       }

       return $aOSInfo;
   }

   function prep_conect()
   {
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_conexao']) && $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_perfil']) && $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'sistema_csmo_gwolner', 2); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S", $this->path_conf);
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['embutida_init']) 
      {
      }
// 
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
      {
          $this->nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
      {
          $this->nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
      {
          $this->nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
      {
          $this->nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
      $this->date_delim  = "'";
      $this->date_delim1 = "'";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
      {
          $this->date_delim  = "#";
          $this->date_delim1 = "#";
      }
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
          $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['SC_sep_date1'];
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #34495E; border-style: solid; border-width: 1px; padding: 8px 10px;  }";
          echo ".scButton_disabled { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #7d7d7d; font-weight: normal; background-color: #e6e6e6; border-style: solid; border-width: 1px; padding: 8px 10px;  }";
          echo ".scButton_onmousedown { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #5D6D7E; border-style: solid; border-width: 1px; padding: 8px 10px;  }";
          echo ".scButton_onmouseover { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #5D6D7E; border-style: solid; border-width: 1px; padding: 8px 10px;  }";
          echo ".scButton_small { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #34495E; border-style: solid; border-width: 1px; padding: 3px 13px;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
   }
   function conectDB()
   {
      global $glo_senha_protect;
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['glo_nm_conexao'], $this->root . $this->path_prod, 'sistema_csmo_gwolner'); 
      } 
      else 
      { 
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding); 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
      {
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
      {
          $this->Db->Execute("alter session set nls_date_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters = '.,'");
          $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['decimal_db'] = "."; 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "R$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
// 
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_mysql")
       {
           $TP_banco = $_SESSION['scriptcase']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           $delim  = "'";
           $delim1 = "'";
           if (in_array(strtolower($TP_banco), $this->nm_bases_access))
           {
               $delim  = "#";
               $delim1 = "#";
           }
           if (isset($_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['odontograma_inclusao_Vfinal']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
}
//===============================================================================
//
class odontograma_inclusao_Vfinal_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
   }
//
//----- 
   function controle()
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $glo_senha_protect;

      $this->Ini = new odontograma_inclusao_Vfinal_ini(); 
      $this->Ini->init();
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['odontograma_inclusao_Vfinal']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['odontograma_inclusao_Vfinal']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['odontograma_inclusao_Vfinal']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['odontograma_inclusao_Vfinal'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['odontograma_inclusao_Vfinal']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['odontograma_inclusao_Vfinal']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('odontograma_inclusao_Vfinal') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['odontograma_inclusao_Vfinal']['label'] = "" . $this->Ini->Nm_lang['lang_othr_blank_title'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "odontograma_inclusao_Vfinal")
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
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['odontograma_inclusao_Vfinal']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['odontograma_inclusao_Vfinal']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['odontograma_inclusao_Vfinal']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      $this->nm_data = new nm_data("pt_br");
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
      $this->Db = $this->Ini->Db; 
      include_once($this->Ini->path_aplicacao . "odontograma_inclusao_Vfinal_erro.class.php"); 
      $this->Erro      = new odontograma_inclusao_Vfinal_erro();
      $this->Erro->Ini = $this->Ini;
//
      $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['contr_erro'] = 'on';
if (!isset($_SESSION['id_dentista_global'])) {$_SESSION['id_dentista_global'] = "";}
if (!isset($this->sc_temp_id_dentista_global)) {$this->sc_temp_id_dentista_global = (isset($_SESSION['id_dentista_global'])) ? $_SESSION['id_dentista_global'] : "";}
if (!isset($_SESSION['id_paciente_global'])) {$_SESSION['id_paciente_global'] = "";}
if (!isset($this->sc_temp_id_paciente_global)) {$this->sc_temp_id_paciente_global = (isset($_SESSION['id_paciente_global'])) ? $_SESSION['id_paciente_global'] : "";}
 $this->sc_temp_id_paciente_global;
$this->sc_temp_id_dentista_global;

$id_paciente = $this->sc_temp_id_paciente_global;
$id_dentista = $this->sc_temp_id_dentista_global;



 
      $nm_select = "select nome_paciente from paciente where id_paciente = $id_paciente"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->nome_paciente = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->nome_paciente[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->nome_paciente = false;
          $this->nome_paciente_erro = $this->Db->ErrorMsg();
      } 
;
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}



 
      $nm_select = "select data_hora from dente where id_paciente = $id_paciente"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->DS_data = array();
      $this->ds_data = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->DS_data[$y] [$x] = $rx->fields[$x];
                        $this->ds_data[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->DS_data = false;
          $this->DS_data_erro = $this->Db->ErrorMsg();
          $this->ds_data = false;
          $this->ds_data_erro = $this->Db->ErrorMsg();
      } 
;
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}



 
      $nm_select = "SELECT COUNT(id_dente) FROM dente where id_paciente = $id_paciente"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->quantidade = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->quantidade[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->quantidade = false;
          $this->quantidade_erro = $this->Db->ErrorMsg();
      } 
;
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


$quantidade_de_dentes = $this->quantidade[0][0];

for($n = 0; $n < $quantidade_de_dentes; $n++){
	$data_dente[] = $this->ds_data[$n][0];
};


 
      $nm_select = "select id_dente, numero from dente where id_paciente = $id_paciente"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->DS_dente = array();
      $this->ds_dente = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->DS_dente[$y] [$x] = $rx->fields[$x];
                        $this->ds_dente[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->DS_dente = false;
          $this->DS_dente_erro = $this->Db->ErrorMsg();
          $this->ds_dente = false;
          $this->ds_dente_erro = $this->Db->ErrorMsg();
      } 
;
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


for($i = 0; $i<$quantidade_de_dentes; $i++){
	$ids_dentes[$i] = $this->ds_dente[$i][0]; 
	$num_dentes[$i] = $this->ds_dente[$i][1]; 
};


echo '
	<script>	

		tamanho_vetor_dentes = 0;
		num_dentes = [];
		nomes_faces = [];
		nomes_situacoes = [];
		situacoes_extracoes = [];
		ids_dentes_js = [];
		observacoes = [];

		ano = [];
		mes = [];
		dia = [];
		hora = [];
		minuto = [];
		segundo = [];

		cros = [];

	</script>

';



for($k = 0; $k < $quantidade_de_dentes; $k++){

	 
      $nm_select = "SELECT COUNT(id_face) FROM face_x_dente where id_dente = $ids_dentes[$k]"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->quantidade = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->quantidade[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->quantidade = false;
          $this->quantidade_erro = $this->Db->ErrorMsg();
      } 
;
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


	 
      $nm_select = "SELECT id_face FROM face_x_dente where id_dente = $ids_dentes[$k]"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->DS_ids_faces = array();
      $this->ds_ids_faces = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->DS_ids_faces[$y] [$x] = $rx->fields[$x];
                        $this->ds_ids_faces[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->DS_ids_faces = false;
          $this->DS_ids_faces_erro = $this->Db->ErrorMsg();
          $this->ds_ids_faces = false;
          $this->ds_ids_faces_erro = $this->Db->ErrorMsg();
      } 
;
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}



	$quantidade_de_faces[] = $this->quantidade[0][0];

	if($quantidade_de_faces[$k] != 0){
		
		$l = 0;
		while($l < $quantidade_de_faces[$k]){
			
			$num_dentes_aux[] = $num_dentes[$k];
			$ids_dentes_aux[] = $ids_dentes[$k];
			$ids_faces[] = $this->ds_ids_faces[$l][0]; 
			$data_dente_aux[] = $data_dente[$k];
			$l++;
		};
	}else{
		$num_dentes_aux[] = $num_dentes[$k];
		$ids_dentes_aux[] = $ids_dentes[$k];
		$data_dente_aux[] = $data_dente[$k];
	};

};

$g = 0;

if(isset($ids_dentes_aux)){
	foreach($ids_dentes_aux as $aux){
		 
      $nm_select = "select extracao from dente where id_dente = $aux"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->situacao_extracao = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->situacao_extracao[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->situacao_extracao = false;
          $this->situacao_extracao_erro = $this->Db->ErrorMsg();
      } 
;
		if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

		$situacoes_extracoes[] = $this->situacao_extracao[0][0];
		$g++; 
	};
};

if(isset($situacoes_extracoes)){

	foreach($situacoes_extracoes as $aux){
		echo '
			<script>		
				situacoes_extracoes.push('.$aux.');
		    </script>
		'; 
	};
};


if(isset($ids_faces)){
	foreach($ids_faces as $aux){
		 
      $nm_select = "select num_face from face where id_face = $aux"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->DS_num_face = array();
      $this->ds_num_face = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->DS_num_face[$y] [$x] = $rx->fields[$x];
                        $this->ds_num_face[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->DS_num_face = false;
          $this->DS_num_face_erro = $this->Db->ErrorMsg();
          $this->ds_num_face = false;
          $this->ds_num_face_erro = $this->Db->ErrorMsg();
      } 
;
		if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

		
		 
      $nm_select = "select desc_situacao from situacao s, face f where s.id_situacao = f.id_situacao && f.id_face =  $aux"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->DS_situacao = array();
      $this->ds_situacao = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->DS_situacao[$y] [$x] = $rx->fields[$x];
                        $this->ds_situacao[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->DS_situacao = false;
          $this->DS_situacao_erro = $this->Db->ErrorMsg();
          $this->ds_situacao = false;
          $this->ds_situacao_erro = $this->Db->ErrorMsg();
      } 
;
		if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


		$num_faces[] = $this->ds_num_face[0][0];
		$situacoes[] = $this->ds_situacao[0][0];
	};
};



if(isset($num_dentes)){

	foreach($num_dentes_aux as $aux){
		echo '
			<script>		
				num_dentes.push('.$aux.');
		  		tamanho_vetor_dentes++;
		    </script>

		'; 
	};
};


if(isset($num_faces)){

	foreach($num_faces as $aux){
		if($aux >= 10){

			$aux = $aux % 10;

			if($aux > 5){
				$aux = $aux - 5;
			};

			if($aux == 0){
				$aux = 5;		
			};
		} else if($aux > 5){
			$aux = $aux - 5;
		};

		echo '
			<script>		
				nomes_faces.push('.$aux.');	  	
		    </script>
		';
	};
};



if(isset($situacoes)){

	foreach($situacoes as $aux){

		echo '
			<script>		
				nomes_situacoes.push('.$aux.');
		    </script>
		'; 
	};
};


$p = 0;

if(isset($data_dente_aux)){

	foreach($data_dente_aux as $aux){
		$ano[] = substr($aux, 0, 4);
		$mes[] = substr($aux, 5, 2);
		$dia[] = substr($aux, 8, 2);
		$hora[] = substr($aux, 11, 2);
		$minuto[] = substr($aux, 14, 2);
		$segundo[] = substr($aux, 17, 2); 
		
		echo '
			<script>
				ano.push('.$ano[$p].');
				mes.push('.$mes[$p].');
				dia.push('.$dia[$p].');
				hora.push('.$hora[$p].');
				minuto.push('.$minuto[$p].');
				segundo.push('.$segundo[$p].');	  	            
		    </script>
		';
		
		$p++;

	};
};

$f = 0;

if(isset($ids_dentes_aux)){
	foreach($ids_dentes_aux as $aux){
		echo '
			<script>		
				ids_dentes_js.push('.$aux.');
		    </script>
		'; 
		
		$f++;
	};
};


if(isset($ids_dentes)){
	foreach($ids_dentes as $aux){

		 
      $nm_select = "select texto from observacao where id_dente = $aux"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->id_observacao = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->id_observacao[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->id_observacao = false;
          $this->id_observacao_erro = $this->Db->ErrorMsg();
      } 
;
		if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


		$tam_vetor_id_observacao = count($this->id_observacao );

		if($this->id_observacao ){
			for($i = 0; $i < $tam_vetor_id_observacao; $i++){
				$observacoes[] = $this->id_observacao[$i][0];
			}
		} else {
			$observacoes[] = 0;	
		};
	};
};

$f = 0;

if(isset($observacoes)){
	foreach($observacoes as $aux){
		echo '
			<html>
				<body>
					<p id="id_texto_obs" style = "display: none; position = left">' .$aux. '</p>
				</body>
				<script>
					var aux = document.getElementById("id_texto_obs");
					observacoes.push(aux.innerHTML);
					aux.remove();
				</script>
			</html>
		';
		$f++;
	};
};

print('

	<html>
		<body>

			<h2> '.$this->nome_paciente[0][0].' </h2>

			<div class="content">
				<form action="http://192.168.0.51:8081/scriptcase/app/sistema_csmo_gwolner/odontograma_back_end_Vfinal/odontograma_back_end_Vfinal.php" method = "post">
					<div id="container">

						<div id="mapaDentario">
							<img id="mapaDentario" src="http://192.168.0.51:8081/scriptcase/devel/conf/sys/img/bg/odontogramaFinal2.jpg" alt="Mapa dentário">
						</div>

						<input id="mySub" type = "submit" value="Salvar">

						<input name = "flag" id="id_flag" type = "number" value = 0>

						<div id="historico">
							<div id="cont">
								<span >Dente - Face</span>
								<span class="a1">Situação</span>
								<span class="a2">Data</span>
								<span class="a3">Observação</span>
							</div>	
						</div>

					</div>
				</form>
			<div/>

			<div id = "imagens_extracao"><div/>

		</body>
	</html>

	<style>

		h2{
			text-align: center;
			text-decoration: underline;
			color: #00008B;
		}

		#imagens_extracao{
			position: absolute;
			top: 10px;
		}

		#historico{
			position: absolute;
			margin-top: 94%;
			margin-left: 22%;
			overflow: auto;
			width: 90%;
			height:200;
			display: none;
		}

		.text{
			width: 25%;
		}

		.text2{
			border: 0px;
			padding-right: 3px;
		}

		#cont{
			margin-left: 1%;
		}

		.a1{
			margin-left: 10%;
		}


		.a2{
			margin-left: 18%;
		}

		.a3{
			margin-left: 22%;
		}


		#container{
			position: relative;
			top: 3%; 
			left: 2%; 
			width: 800px; 
			height: 600px;
		}

		#mapaDentario{
			position: absolute;
		}

		td{
		   border: 1px solid black;
		   background-color: white;
		   value: white;
		   background-color: #c9cac9;
		}

		#i{
		   border: 0px solid black;
		   background-color: #fff;
		}

		#mySub{
			position: absolute;
			margin-top: 85%;
			margin-left: 56%;
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 12px 30px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			cursor: pointer;
		}

		.content {
		  max-width: 1100px;
		  margin: auto;
		}

		#myIframe{
			width: 110px;
			height: 110px;
			overflow: hidden;
		}

		#id_historico_dente{
			text-align: center;
			width: 100px;
		}

		#id_historico_situacao{
			text-align: center;
		}


		#id_historico_date{
			text-align: center;
		}

		.observacaoClass{
			text-align: left;
			width: 250px;
		}
	</style>

	<script>
		var quantidadeDente = 52; //Define número total de dentes

		var auxi_j = 0;
		var formFace = 0;
		var auxi_formFace = 0;

		for(var i= 0; i < quantidadeDente; i++){ //Cria TODOS os botões para os dentes

			auxi_j++;

			var container = document.getElementById("container");
			var table = document.createElement("table");
			table.setAttribute("id", "table"+i);
			table.setAttribute("style", "width:50px");
			table.setAttribute("height", "50");
			container.appendChild(table);

			var table = document.getElementById("table"+i);
			var tr01 = document.createElement("tr");
			tr01.setAttribute("id", "tr01"+i);
			table.appendChild(tr01);

			var tr01 = document.getElementById("tr01"+i);
			var td01 = document.createElement("td");
			var space = document.createTextNode(" ");
			td01.setAttribute("id", "i");
			td01.appendChild(space);
			tr01.appendChild(td01);

			var td02 = document.createElement("td");
			var space = document.createTextNode(" ");
			td02.setAttribute("id", auxi_j);
			td02.setAttribute("name", "v");
			td02.appendChild(space);
			tr01.appendChild(td02);

			var td03 = document.createElement("td");
			var space = document.createTextNode(" ");
			td03.setAttribute("id", "i");
			td02.appendChild(space);
			tr01.appendChild(td03);

			var tr02 = document.createElement("tr");
			tr02.setAttribute("id", "tr02"+i);
			table.appendChild(tr02);	
			auxi_j++;
			
			var tr02 = document.getElementById("tr02"+i);
			var td01 = document.createElement("td");
			var space = document.createTextNode(" ");
			td01.setAttribute("id", auxi_j);
			td01.appendChild(space);
			tr02.appendChild(td01);
			
			auxi_j++;					
			var td02 = document.createElement("td");
			var space = document.createTextNode(" ");
			td02.setAttribute("id", auxi_j);
			td02.setAttribute("name", "v");
			td02.appendChild(space);
			tr02.appendChild(td02);
			
			auxi_j++;			
			var td03 = document.createElement("td");
			var space = document.createTextNode(" ");
			td03.setAttribute("id", auxi_j);
			td02.appendChild(space);
			tr02.appendChild(td03);

			var tr03 = document.createElement("tr");
			tr03.setAttribute("id", "tr03"+i);
			table.appendChild(tr03);

			var tr03 = document.getElementById("tr03"+i);
			var td01 = document.createElement("td");
			var space = document.createTextNode(" ");
			td01.setAttribute("id", "i");
			td01.appendChild(space);
			tr03.appendChild(td01);
			
			auxi_j++;					
			var td02 = document.createElement("td");
			var space = document.createTextNode(" ");
			td02.setAttribute("id", auxi_j);
			td02.setAttribute("name", "v");
			td02.appendChild(space);
			tr03.appendChild(td02);

			var td03 = document.createElement("td");
			var space = document.createTextNode(" ");
			td03.setAttribute("id", "i");
			td02.appendChild(space);
			tr03.appendChild(td03);
	
			formFace = 261+auxi_formFace;

			var input = document.createElement("input");
			input.setAttribute("type", "number");
			input.setAttribute("id", formFace);
			input.setAttribute("name", formFace);
			container.appendChild(input);

			auxi_formFace++;
			formFace = 261+auxi_formFace;

			var input = document.createElement("input");
			input.setAttribute("type", "number");
			input.setAttribute("id", formFace);
			input.setAttribute("name", formFace);
			container.appendChild(input);

			auxi_formFace++;
			formFace = 261+auxi_formFace;

			var input = document.createElement("input");
			input.setAttribute("type", "number");
			input.setAttribute("id", formFace);
			input.setAttribute("name", formFace);
			container.appendChild(input);

			auxi_formFace++;		
			formFace = 261+auxi_formFace;

			var input = document.createElement("input");
			input.setAttribute("type", "number");
			input.setAttribute("id", formFace);
			input.setAttribute("name", formFace);
			container.appendChild(input);

			auxi_formFace++;
			formFace = 261+auxi_formFace;

			var input = document.createElement("input");
			input.setAttribute("type", "number");
			input.setAttribute("id", formFace);
			input.setAttribute("name", formFace);
			container.appendChild(input);

			auxi_formFace++;

		};
		
		
		var distribuicaoDentesLinha1 = 16; //Define a quantidade de dentes da primeira linha

		for(var i= 0; i < distribuicaoDentesLinha1; i++){ //Distribui os botões na primeira fila de dentes

			var dez = 63*i; //Cria valor de afastamento entre as faces que compõe um dente
			var p = document.getElementById("table"+i);
			p.style.position = "absolute";
			p.style.top = "140"; //Altura em relação ao topo da imagem
			p.style.left = dez+"px";
		};


		var distribuicaoDentesLinha2 = 10; //Define a quantidade de dentes da segunda linha

		for(var i= 0; i < distribuicaoDentesLinha2; i++){ //Distribui os botões na segunda fila de dentes

			var numeroDente = (25-i); //Mantem continuidade dos valores do table id
			var dez = 62*i; //Cria valor de afastamento entre as faces que compõe um dente
			var p = document.getElementById("table"+numeroDente);
			p.style.position = "absolute";
			p.style.top = "299px"; //Altura em relação ao topo da imagem
			p.style.right = dez+"px";
		};


		var distribuicaoDentesLinha3 = 10; //Define a quantidade de dentes da terceira linha

		for(var i= 0; i < distribuicaoDentesLinha3; i++){ //Distribui os botões na terceira fila de dentes

			var numeroDente = (35-i); //Mantem continuidade dos valores do table id
			var dez = 62*i; //Cria valor de afastamento entre as faces que compõe um dente
			var p = document.getElementById("table"+numeroDente);
			p.style.position = "absolute";
			p.style.top = "349px"; //Altura em relação ao topo da imagem
			p.style.right = dez+"px";
		};


		var distribuicaoDentesLinha3 = 16; //Define a quantidade de dentes da quarta linha

		for(var i= 0; i < distribuicaoDentesLinha3; i++){ //Distribui os botões na quarta fila de dentes

			var numeroDente = (36+i); //Mantem continuidade dos valores do table id
			var dez = 63*i; //Cria valor de afastamento entre as faces que compõe um dente
			var p = document.getElementById("table"+numeroDente);
			p.style.position = "absolute";
			p.style.top = "495"; //Altura em relação ao topo da imagem
			p.style.left = dez+"px";
		};

	
		var flag = document.getElementById("id_flag");

		flag.style.display="none";
		var face_situacao = [];
		var k = 0;


		for(var i = 261; i<521; i++){
			face_situacao.push(document.getElementById(i));
			face_situacao[ k].style.display="none";
			k++;
		};

		var faces = [];


		for(var i = 1; i<261; i++){
			faces.push(document.getElementById(i));
		};



		for(var j = 0; j < 260; j++){
			var numeroDaCor = 0;
			var marginTop = 0;

			faces[ j].addEventListener("click", function(e){
				numeroDaCor++;
				flag.value = 1;
				if(numeroDaCor == 1){  
					var face = document.getElementById(this.id);
					face.style.backgroundColor="red";
					var i = this.id - 1;
					face_situacao[ i].value = this.id + "1";
					indice_campo_zero = i;
				};

				if(numeroDaCor == 2){
					var face = document.getElementById(this.id);
					face.style.backgroundColor="blue";
					var i = this.id - 1;
					face_situacao[ i].value = this.id + "2";
					indice_campo_zero = i;
				};

				if(numeroDaCor == 3){
					var face = document.getElementById(this.id);
					face.style.backgroundColor="white";
					var i = this.id - 1;
					face_situacao[ i].value = this.id + "3";
					indice_campo_zero = i;
					id_anterior = this.id;
				};

				if(numeroDaCor == 4){
					var face = document.getElementById(this.id);
					face.style.backgroundColor="#c9cac9";
					numeroDaCor = 0;
					if(this.id == id_anterior){
						face_situacao[ indice_campo_zero].value = 0;
					};
					flag.value = 0;
				};
			});
		};


		var qtd_linhas_historico = document.createElement("input");
		qtd_linhas_historico.setAttribute("type", "text");
		qtd_linhas_historico.setAttribute("id", "id_qtd_obs");
		qtd_linhas_historico.setAttribute("name", "qtd_obs");
		qtd_linhas_historico.style.display = "none";
		historico.appendChild(qtd_linhas_historico);
		
		quantidade_de_linhas = 0;		


		var vetor_campos_obs = [];
		function criarCampos(numDente, numFace, nomeSituacao, dataDente, incremento){
			
			historico.style.display="block";
			var dente = document.createElement("input");
			dente.setAttribute("type", "text");
			dente.setAttribute("id", "id_historico_dente");
			dente.setAttribute("name", "historico_dente");
			dente.setAttribute("class", "text");
			dente.setAttribute("value", numDente + " " + numFace);
			historico.appendChild(dente);

			var situacao = document.createElement("input");
			situacao.setAttribute("type", "text");
			situacao.setAttribute("id", "id_historico_situacao");
			situacao.setAttribute("name", "historico_situacao");
			situacao.setAttribute("class", "text");
			situacao.setAttribute("value", nomeSituacao);

			if(situacao.value == "A fazer"){
				situacao.setAttribute("style", "color: red;");
			};
			
			if(situacao.value == "Tratamento realizado"){
				situacao.setAttribute("style", "color: blue;");
			};

			historico.appendChild(situacao);
			var data = document.createElement("input");
			data.setAttribute("type", "text");
			data.setAttribute("id", "id_historico_date");
			data.setAttribute("name", "historico_date");
			data.setAttribute("class", "text");
			data.setAttribute("value", dataDente);
			historico.appendChild(data);

			var observacao = document.createElement("input");
			observacao.setAttribute("type", "text");
			observacao.setAttribute("id", "id_historico_observacao"+incremento);
			observacao.setAttribute("name", "historico_observacao"+incremento);
			observacao.setAttribute("class", "observacaoClass");

			if(observacoes[ incremento] != "0"){
				observacao.setAttribute("value", observacoes[ incremento]);	
			}; 

			historico.appendChild(observacao);
			vetor_campos_obs.push(observacao);
			quantidade_de_linhas++;
			qtd_linhas_historico.setAttribute("value", quantidade_de_linhas);
		};

		
		var  flag_botao_salvar = true;
		document.getElementById("mySub").addEventListener("click", function(e){   
			if(flag_botao_salvar == true){
				for(var p = 0; p < ids_dentes_js.length; p++){
					var texto_obs = vetor_campos_obs[ p].value;
					vetor_campos_obs[ p].style.color = "white";
					vetor_campos_obs[ p].value = texto_obs +"@"+ ids_dentes_js[ p];
				};
			};

			flag_botao_salvar = false;
		});


		/* o for abaixo preenche os campos do histórico do odontograma, a partir dos valores contidos nos vetores preenchidos com valores vindos do banco de dados. Os vetores receberam os seus valores nos códigos que estão no começo dessa página (que fazem consulta ao banco de dados). */

		var j = 0;

		for(var i = 0; i < tamanho_vetor_dentes; i++){
			if(situacoes_extracoes[ i] == 0){
				switch(nomes_faces[ j]){
					case 1:
						if(num_dentes[ i] < 29) { nomes_faces[ j] = "palatal";}
						if(num_dentes[ i] > 50 && num_dentes[ i] < 76) { nomes_faces[ j] = "palatal";}
						if(num_dentes[ i] > 70 && num_dentes[ i] < 86) { nomes_faces[ j] = "lingual";}
						if(num_dentes[ i] > 30 && num_dentes[ i] < 49) { nomes_faces[ j] = "lingual";}
					break;
					case 2: nomes_faces[ j] = "distal"; break;
					case 3: nomes_faces[ j] = "oclusal"; break;
					case 4: nomes_faces[ j] = "mesial"; break;
					case 5: nomes_faces[ j] = "vestibular"; break;
				};
			};	
					
			switch(nomes_situacoes[ i]){
				case 1: nomes_situacoes[ i] = "A fazer"; break;
				case 2: nomes_situacoes[ i] = "Tratamento realizado"; break;
				case 3: nomes_situacoes[ i] = "Higido"; break;		
			};

			switch(situacoes_extracoes[ i]){
				case 1: situacoes_extracoes[ i] = "A fazer"; break;
				case 2: situacoes_extracoes[ i] = "Tratamento realizado"; break;
			};

			var data = ano[ i] + "-" + mes[ i] + "-" + dia[ i] + " " + hora[ i] + ":" + minuto[ i] + ":" + segundo[ i];
			if(situacoes_extracoes[ i] == 0){
				criarCampos(num_dentes[ i], nomes_faces[ j], nomes_situacoes[ j], data, i);
				j++;
			}else{
				criarCampos(num_dentes[ i], " ", situacoes_extracoes[ i], data, i); 
			};
		};

		var imgs_invisiveis = [];
		var extracoes = [];
		var extraidos = [];
		var campos_extracoes = [];

		var div_campos_extracoes = document.getElementById("container");
		var flag_extracao = document.createElement("input");
		flag_extracao.setAttribute("id", "id_flag_extracao");
		flag_extracao.setAttribute("name", "flag_extracao");
		flag_extracao.setAttribute("type", "text");
		flag_extracao.style.display = "none";
		div_campos_extracoes.appendChild(flag_extracao);
		flag_extracao.setAttribute("value", 0);

		for(var i = 0; i < 52; i++){

			var divImagensExtracao = document.getElementById("imagens_extracao");
			var div_campos_extracoes = document.getElementById("container");


			imgs_invisiveis.push(document.createElement("img"));
			imgs_invisiveis[ i].setAttribute("id", "img"+i);
			imgs_invisiveis[ i].setAttribute("src","http://192.168.0.51:8081/scriptcase/devel/conf/sys/img/bg/Invisible5.png");
			imgs_invisiveis[ i].setAttribute("width", "30");
			imgs_invisiveis[ i].setAttribute("height", "30");
			imgs_invisiveis[ i].setAttribute("style", "position: absolute");
			divImagensExtracao.appendChild(imgs_invisiveis[ i]);	


			extracoes.push(document.createElement("img"));
			extracoes[ i].setAttribute("id", "id_extracao_img"+i);
			extracoes[ i].setAttribute("src",    "http://192.168.0.51:8081/scriptcase/devel/conf/sys/img/bg/Tra%C3%A7odoOdontograma5.png");
			extracoes[ i].setAttribute("width", "30");
			extracoes[ i].setAttribute("height", "50");
			extracoes[ i].setAttribute("style", "position: absolute");
			divImagensExtracao.appendChild(extracoes[ i]);
			extracoes[ i].style.display="none";


			extraidos.push(document.createElement("img"));
			extraidos[ i].setAttribute("id", "id_extraido_img"+i);
			extraidos[ i].setAttribute("src",    "http://192.168.0.51:8081/scriptcase/devel/conf/sys/img/bg/XdoOdontograma5.png");
			extraidos[ i].setAttribute("width", "30");
			extraidos[ i].setAttribute("height", "50");
			extraidos[ i].setAttribute("style", "position: absolute");
			divImagensExtracao.appendChild(extraidos[ i]);
			extraidos[ i].style.display="none";

			campos_extracoes.push(document.createElement("input"));
			campos_extracoes[ i].setAttribute("id", "campo_img"+i);
			campos_extracoes[ i].setAttribute("name", "campo_img"+i);
			campos_extracoes[ i].setAttribute("type", "text");
			campos_extracoes[ i].style.display = "none";
			div_campos_extracoes.appendChild(campos_extracoes[ i]);

			/*Criação de eventos de cliques para cada elemento de cada um dos vetores anteriormente declarados (extracoes, extraidos e imgs_invisiveis). Esses eventos farão com que as imagens sejam exibidas, ou não.*/

			imgs_invisiveis[ i].addEventListener("click", function(e){ 
				var extracao = document.getElementById("id_extracao_"+this.id);
				extracao.style.display="block";					
				var campo_extracao = document.getElementById("campo_"+this.id);
				campo_extracao.value = this.id+"1";
				flag_extracao.setAttribute("value", 1);			
			});

			extracoes[ i].addEventListener("click", function(e){ 
				var id_aux2 = this.id.substring(12);
				var extracao = document.getElementById(this.id);
				extracao.style.display="none";

				var extraido = document.getElementById("id_extraido_"+id_aux2);
				extraido.style.display="block";
				var campo_extracao = document.getElementById("campo_"+id_aux2);

				campo_extracao.value = id_aux2+"2";

				flag_extracao.setAttribute("value", 1);

			});

			extraidos[ i].addEventListener("click", function(e){ 
				var id_aux3 = this.id.substring(12);

				var extraido = document.getElementById(this.id);
				extraido.style.display="none";	

				var img_invisivel = document.getElementById(id_aux3);
				img_invisivel.style.display="block";	

				var campo_extracao = document.getElementById("campo_"+id_aux3);
				campo_extracao.value = 0;

				flag_extracao.setAttribute("value", 1);

			});
		};


		var incremento = 30; //Dentes superiores (adulto)
		
		for(var i = 0; i < 16; i++){
			var aux =  document.getElementById("img"+i);

			aux.style.position = "absolute";
			aux.style.top = "125px";
			aux.style.left = incremento + "px";

			incremento += 65;

			if(i == 3){
				incremento -= 6;
			};
			if(i == 4){
				incremento -= 5;
			};
			if(i == 9){
				incremento -= 10;
			};
			if(i == 13){
				incremento -= 5;
			};
		};

		var incremento = 230; //Dentes superiores (infantil)
		
		for(var i = 16; i < 26; i++){
			var aux =  document.getElementById("img"+i);

			aux.style.position = "absolute";
			aux.style.top = "285px";
			aux.style.left = incremento + "px";

			incremento += 65;

			if(i == 16){
				incremento -= 10;
			};
			if(i == 19){
				incremento -= 10;
			};
			if(i == 22){
				incremento -= 5;
			};
			if(i == 24){
				incremento -= 10;
			};
		};

		var incremento = 230; //Dentes inferiores (infantil)
		
		for(var i = 26; i < 36; i++){
			var aux =  document.getElementById("img"+i);

			aux.style.position = "absolute";
			aux.style.top = "465px";
			aux.style.left = incremento + "px";

			incremento +=65;
			
			if(i == 26){
				incremento -= 10;
			};
			if(i == 28){
				incremento -= 10;
			};
			if(i == 32){
				incremento -= 10;
			};

		};

		var incremento = 30; //Dentes inferiores (adulto)
		
		for(var i = 36; i < 52; i++){
			var aux =  document.getElementById("img"+i);

			aux.style.position = "absolute";
			aux.style.top = "615px";
			aux.style.left = incremento + "px";

			incremento +=65;

			if(i == 40){
				incremento-=10;
			};
			if(i == 45){
				incremento-=10;
			};
			if(i == 48){
				incremento-=5;
			};
			if(i == 49){
				incremento-=2
			};
			if(i == 50){
				incremento-=4;
			};
		};


		var incremento = 30; //Dentes superiores (adulto)
		
		for(var i = 0; i < 16; i++){
			var aux =  document.getElementById("id_extracao_img"+i);

			aux.style.position = "absolute";
			aux.style.top = "115px";
			aux.style.left = incremento + "px";

			incremento +=65;	

			if(i == 3){
				incremento -= 6;
			};
			if(i == 4){
				incremento -= 5;
			};
			if(i == 9){
				incremento -= 10;
			};
			if(i == 13){
				incremento -= 5;
			};
		};

		var incremento = 220; //Dentes superiores (infantil)
		
		for(var i = 16; i < 26; i++){
			var aux =  document.getElementById("id_extracao_img"+i);

			aux.style.position = "absolute";
			aux.style.top = "280px";
			aux.style.left = incremento + "px";

			incremento += 65;

			if(i == 16){
				incremento -= 4;
			};
			if(i == 19){
				incremento -= 4;
			};
			if(i == 22){
				incremento -= 5;
			};
			if(i == 24){
				incremento -= 10;
			};
		};		

		var incremento = 220; //Dentes inferiores (infantil)
		
		for(var i = 26; i < 36; i++){
			var aux =  document.getElementById("id_extracao_img"+i);

			aux.style.position = "absolute";
			aux.style.top = "470px";
			aux.style.left = incremento + "px";

			incremento +=65;

			if(i == 26){
				incremento -= 4;
			};
			if(i == 28){
				incremento -= 4;
			};
			if(i == 32){
				incremento -= 10;
			};
		};

		var incremento = 30; //Dentes inferiores (adulto)
		
		for(var i = 36; i < 52; i++){
			var aux =  document.getElementById("id_extracao_img"+i);

			aux.style.position = "absolute";
			aux.style.top = "615px";
			aux.style.left = incremento + "px";

			incremento +=65;

			if(i == 40){
				incremento-=10;
			};
			if(i == 45){
				incremento-=10;
			};
			if(i == 48){
				incremento-=5;
			};
			if(i == 49){
				incremento-=2
			};
			if(i == 50){
				incremento-=4;
			};
		};



		var incremento = 30; //Dentes superiores (adulto)
		
		for(var i = 0; i < 16; i++){

			var aux =  document.getElementById("id_extraido_img"+i);

			aux.style.position = "absolute";
			aux.style.top = "115px";
			aux.style.left = incremento + "px";

			incremento +=65;	

			if(i == 3){
				incremento -= 6;
			};
			if(i == 4){
				incremento -= 5;
			};
			if(i == 9){
				incremento -= 10;
			};
			if(i == 13){
				incremento -= 5;
			};
		};

		var incremento = 220; //Dentes superiores (infantil)
		
		for(var i = 16; i < 26; i++){
			var aux =  document.getElementById("id_extraido_img"+i);

			aux.style.position = "absolute";
			aux.style.top = "280px";
			aux.style.left = incremento + "px";

			incremento += 65;

			if(i == 16){
				incremento -= 4;
			};
			if(i == 19){
				incremento -= 4;
			};
			if(i == 22){
				incremento -= 5;
			};
			if(i == 24){
				incremento -= 10;
			};
		};		

		var incremento = 220; //Dentes inferiores (infantil)
		
		for(var i = 26; i < 36; i++){
			var aux =  document.getElementById("id_extraido_img"+i);

			aux.style.position = "absolute";
			aux.style.top = "470px";
			aux.style.left = incremento + "px";

			incremento +=65;

			if(i == 26){
				incremento -= 4;
			};
			if(i == 28){
				incremento -= 4;
			};
			if(i == 32){
				incremento -= 10;
			};
		};

		var incremento = 30; //Dentes inferiores (adulto)
		
		for(var i = 36; i < 52; i++){
			var aux =  document.getElementById("id_extraido_img"+i);

			aux.style.position = "absolute";
			aux.style.top = "615px";
			aux.style.left = incremento + "px";

			incremento +=65;

			if(i == 40){
				incremento-=10;
			};
			if(i == 45){
				incremento-=10;
			};
			if(i == 48){
				incremento-=5;
			};
			if(i == 49){
				incremento-=2
			};
			if(i == 50){
				incremento-=4;
			};
		};
	</script>
');
if (isset($this->sc_temp_id_paciente_global)) {$_SESSION['id_paciente_global'] = $this->sc_temp_id_paciente_global;}
if (isset($this->sc_temp_id_dentista_global)) {$_SESSION['id_dentista_global'] = $this->sc_temp_id_dentista_global;}
$_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['contr_erro'] = 'off'; 
//--- 
       $this->Db->Close(); 
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
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
?>
              <HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
               <HEAD>
                <TITLE></TITLE>
               <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
           if ($_SESSION['scriptcase']['proc_mobile'])
           {
?>
                <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
           }
?>
                <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>                <META http-equiv="Pragma" content="no-cache"/>
                <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
                <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
                <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
                <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
                <script type="text/javascript"><?php echo $this->redir_modal ?></script>
               </HEAD>
              </HTML>
<?php
       } 
       exit;
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
} 
// 
//======= =========================
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   if (!function_exists("SC_dir_app_ini"))
   {
       include_once("../_lib/lib/php/nm_ctrl_app_name.php");
   }
   SC_dir_app_ini('sistema_csmo_gwolner');
   $_SESSION['scriptcase']['odontograma_inclusao_Vfinal']['contr_erro'] = 'off';
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
            nm_limpa_str_odontograma_inclusao_Vfinal($nmgp_val);
            $$nmgp_var = $nmgp_val;
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
            nm_limpa_str_odontograma_inclusao_Vfinal($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (isset($_POST["id_paciente_global"])) 
   {
       $_SESSION["id_paciente_global"] = $_POST["id_paciente_global"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["id_paciente_global"]);
   }
   if (isset($_GET["id_paciente_global"])) 
   {
       $_SESSION["id_paciente_global"] = $_GET["id_paciente_global"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["id_paciente_global"]);
   }
   if (!isset($_SESSION["id_paciente_global"])) 
   {
       $_SESSION["id_paciente_global"] = "";
   }
   if (isset($_POST["id_dentista_global"])) 
   {
       $_SESSION["id_dentista_global"] = $_POST["id_dentista_global"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["id_dentista_global"]);
   }
   if (isset($_GET["id_dentista_global"])) 
   {
       $_SESSION["id_dentista_global"] = $_GET["id_dentista_global"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["id_dentista_global"]);
   }
   if (!isset($_SESSION["id_dentista_global"])) 
   {
       $_SESSION["id_dentista_global"] = "";
   }
   if (isset($_POST["k"])) 
   {
       $_SESSION["k"] = $_POST["k"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["k"]);
   }
   if (isset($_GET["k"])) 
   {
       $_SESSION["k"] = $_GET["k"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["k"]);
   }
   if (!isset($_SESSION["k"])) 
   {
       $_SESSION["k"] = "";
   }
   if (isset($_POST["j"])) 
   {
       $_SESSION["j"] = $_POST["j"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["j"]);
   }
   if (isset($_GET["j"])) 
   {
       $_SESSION["j"] = $_GET["j"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["j"]);
   }
   if (!isset($_SESSION["j"])) 
   {
       $_SESSION["j"] = "";
   }
   if (isset($_POST["i"])) 
   {
       $_SESSION["i"] = $_POST["i"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["i"]);
   }
   if (isset($_GET["i"])) 
   {
       $_SESSION["i"] = $_GET["i"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["i"]);
   }
   if (!isset($_SESSION["i"])) 
   {
       $_SESSION["i"] = "";
   }
   if (isset($_POST["indice_campo_zero"])) 
   {
       $_SESSION["indice_campo_zero"] = $_POST["indice_campo_zero"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["indice_campo_zero"]);
   }
   if (isset($_GET["indice_campo_zero"])) 
   {
       $_SESSION["indice_campo_zero"] = $_GET["indice_campo_zero"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["indice_campo_zero"]);
   }
   if (!isset($_SESSION["indice_campo_zero"])) 
   {
       $_SESSION["indice_campo_zero"] = "";
   }
   if (isset($_POST["p"])) 
   {
       $_SESSION["p"] = $_POST["p"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["p"]);
   }
   if (isset($_GET["p"])) 
   {
       $_SESSION["p"] = $_GET["p"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["p"]);
   }
   if (!isset($_SESSION["p"])) 
   {
       $_SESSION["p"] = "";
   }
   if (isset($_POST["incremento"])) 
   {
       $_SESSION["incremento"] = $_POST["incremento"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["incremento"]);
   }
   if (isset($_GET["incremento"])) 
   {
       $_SESSION["incremento"] = $_GET["incremento"];
       nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["incremento"]);
   }
   if (!isset($_SESSION["incremento"])) 
   {
       $_SESSION["incremento"] = "";
   }
   if (!empty($glo_perfil))  
   { 
      $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
   }   
   if (isset($glo_servidor)) 
   {
       $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
   }
   if (isset($glo_banco)) 
   {
       $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
   }
   if (isset($glo_tpbanco)) 
   {
       $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
   }
   if (isset($glo_usuario)) 
   {
       $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
   }
   if (isset($glo_senha)) 
   {
       $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
   }
   if (isset($glo_senha_protect)) 
   {
       $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 10000);
   }
   $salva_iframe = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['iframe_menu']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1)
   {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']))
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "odontograma_inclusao_Vfinal";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'odontograma_inclusao_Vfinal' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$script_case_init][$nome_apl]))
                    {
                        $achou = true;
                    }
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('odontograma_inclusao_Vfinal' == $sReferer || 'odontograma_inclusao_Vfinal_' == substr($sReferer, 0, 28))
       {
           $_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['initialize'] = true;
       }
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'odontograma_inclusao_Vfinal')
   {
       $_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['odontograma_inclusao_Vfinal']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/odontograma_inclusao_Vfinal_erro.php");
   }
   if (!empty($nmgp_parms)) 
   { 
       $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
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
                nm_limpa_str_odontograma_inclusao_Vfinal($cadapar[1]);
                if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                $$cadapar[0] = $cadapar[1];
            }
            $ix++;
       }
       if (isset($id_paciente_global)) 
       {
           $_SESSION['id_paciente_global'] = $id_paciente_global;
           nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["id_paciente_global"]);
       }
       if (isset($id_dentista_global)) 
       {
           $_SESSION['id_dentista_global'] = $id_dentista_global;
           nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["id_dentista_global"]);
       }
       if (isset($k)) 
       {
           $_SESSION['k'] = $k;
           nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["k"]);
       }
       if (isset($j)) 
       {
           $_SESSION['j'] = $j;
           nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["j"]);
       }
       if (isset($i)) 
       {
           $_SESSION['i'] = $i;
           nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["i"]);
       }
       if (isset($indice_campo_zero)) 
       {
           $_SESSION['indice_campo_zero'] = $indice_campo_zero;
           nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["indice_campo_zero"]);
       }
       if (isset($p)) 
       {
           $_SESSION['p'] = $p;
           nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["p"]);
       }
       if (isset($incremento)) 
       {
           $_SESSION['incremento'] = $incremento;
           nm_limpa_str_odontograma_inclusao_Vfinal($_SESSION["incremento"]);
       }
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0;  
   $contr_odontograma_inclusao_Vfinal = new odontograma_inclusao_Vfinal_apl();
   $contr_odontograma_inclusao_Vfinal->controle();
//
   function nm_limpa_str_odontograma_inclusao_Vfinal(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               foreach ($str as $x => $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
?>
