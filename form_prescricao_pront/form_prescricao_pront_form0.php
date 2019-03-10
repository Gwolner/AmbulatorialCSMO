<?php
class form_prescricao_pront_form extends form_prescricao_pront_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Inclusão Prescrição"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Atualização Prescricao"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
header("X-XSS-Protection: 0");
?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_prescricao_pront/form_prescricao_pront_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_prescricao_pront_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).show();
       $("#sc_b_ini_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ini_" + str_pos).show();
       $("#gbl_sc_b_ini_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).show();
       $("#sc_b_ret_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ret_" + str_pos).show();
       $("#gbl_sc_b_ret_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).hide();
       $("#sc_b_ini_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ini_" + str_pos).hide();
       $("#gbl_sc_b_ini_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).hide();
       $("#sc_b_ret_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ret_" + str_pos).hide();
       $("#gbl_sc_b_ret_off_" + str_pos).show();
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).show();
       $("#sc_b_fim_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_fim_" + str_pos).show();
       $("#gbl_sc_b_fim_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).show();
       $("#sc_b_avc_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_avc_" + str_pos).show();
       $("#gbl_sc_b_avc_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).hide();
       $("#sc_b_fim_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_fim_" + str_pos).hide();
       $("#gbl_sc_b_fim_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).hide();
       $("#sc_b_avc_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_avc_" + str_pos).hide();
       $("#gbl_sc_b_avc_off_" + str_pos).show();
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}

 function nm_field_disabled(Fields, Opt, Seq, Opcao) {
  if (Opcao != null) {
      opcao = Opcao;
  }
  else {
      opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  }
  if (opcao == "novo" && Opt == "U") {
      return;
  }
  if (opcao != "novo" && Opt == "I") {
      return;
  }
  Field = Fields.split(";");
  for (i=0; i < Field.length; i++)
  {
     F_temp = Field[i].split("=");
     F_name = F_temp[0];
     F_opc  = (F_temp[1] && ("disabled" == F_temp[1] || "true" == F_temp[1])) ? true : false;
     ini = 1;
     xx = document.F1.sc_contr_vert.value;
     if (Seq != null) 
     {
         ini = parseInt(Seq);
         xx  = ini + 1;
     }
     if (F_name == "hora_de_adm_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "hora_de_adm_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "prof_que_adm_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "prof_que_adm_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "medicamento_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "medicamento_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("medicamento_=enabled", "", i);
    nm_field_disabled("hora_de_adm_=enabled", "", i);
    nm_field_disabled("prof_que_adm_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('form_prescricao_pront_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).load(function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_prescricao_pront_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form name="F1" method="post" 
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>"> 
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" /> 
<?php
$_SESSION['scriptcase']['error_span_title']['form_prescricao_pront'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_prescricao_pront'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['mostra_cab'] != "N"))
  {
?>
<tr><td>
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Inclusão Prescrição"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Atualização Prescricao"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php echo date($this->dateDefaultFormat()); ?></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "do_ajax_form_prescricao_pront_add_new_line(); return false;", "do_ajax_form_prescricao_pront_add_new_line(); return false;", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
   if (!isset($this->nmgp_cmp_hidden['id_prescricao_']))
   {
       $this->nmgp_cmp_hidden['id_prescricao_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_usuario_']))
   {
       $this->nmgp_cmp_hidden['id_usuario_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['id_paciente_']))
   {
       $this->nmgp_cmp_hidden['id_paciente_'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ((!isset($this->nmgp_cmp_hidden['id_prescricao_']) || $this->nmgp_cmp_hidden['id_prescricao_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_prescricao_'])) {
          $this->nm_new_label['id_prescricao_'] = "Id Prescricao"; } ?>

    <TD class="scFormLabelOddMult css_id_prescricao__label" id="hidden_field_label_id_prescricao_" style="<?php echo $sStyleHidden_id_prescricao_; ?>" > <?php echo $this->nm_new_label['id_prescricao_'] ?> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['medicamento_']) && $this->nmgp_cmp_hidden['medicamento_'] == 'off') { $sStyleHidden_medicamento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['medicamento_']) || $this->nmgp_cmp_hidden['medicamento_'] == 'on') {
      if (!isset($this->nm_new_label['medicamento_'])) {
          $this->nm_new_label['medicamento_'] = "Medicamento"; } ?>

    <TD class="scFormLabelOddMult css_medicamento__label" id="hidden_field_label_medicamento_" style="<?php echo $sStyleHidden_medicamento_; ?>" > <?php echo $this->nm_new_label['medicamento_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['prescritor_']) && $this->nmgp_cmp_hidden['prescritor_'] == 'off') { $sStyleHidden_prescritor_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['prescritor_']) || $this->nmgp_cmp_hidden['prescritor_'] == 'on') {
      if (!isset($this->nm_new_label['prescritor_'])) {
          $this->nm_new_label['prescritor_'] = "Prescritor"; } ?>

    <TD class="scFormLabelOddMult css_prescritor__label" id="hidden_field_label_prescritor_" style="<?php echo $sStyleHidden_prescritor_; ?>" > <?php echo $this->nm_new_label['prescritor_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['hora_de_adm_']) && $this->nmgp_cmp_hidden['hora_de_adm_'] == 'off') { $sStyleHidden_hora_de_adm_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['hora_de_adm_']) || $this->nmgp_cmp_hidden['hora_de_adm_'] == 'on') {
      if (!isset($this->nm_new_label['hora_de_adm_'])) {
          $this->nm_new_label['hora_de_adm_'] = "Hora de administração da medicação"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['hora_de_adm_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_hora_de_adm__label" id="hidden_field_label_hora_de_adm_" style="<?php echo $sStyleHidden_hora_de_adm_; ?>" > <?php echo $this->nm_new_label['hora_de_adm_'] ?><br><?php echo $date_format_show ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['prof_que_adm_']) && $this->nmgp_cmp_hidden['prof_que_adm_'] == 'off') { $sStyleHidden_prof_que_adm_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['prof_que_adm_']) || $this->nmgp_cmp_hidden['prof_que_adm_'] == 'on') {
      if (!isset($this->nm_new_label['prof_que_adm_'])) {
          $this->nm_new_label['prof_que_adm_'] = "Nome do administrador"; } ?>

    <TD class="scFormLabelOddMult css_prof_que_adm__label" id="hidden_field_label_prof_que_adm_" style="<?php echo $sStyleHidden_prof_que_adm_; ?>" > <?php echo $this->nm_new_label['prof_que_adm_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['data_cadastro_']) && $this->nmgp_cmp_hidden['data_cadastro_'] == 'off') { $sStyleHidden_data_cadastro_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['data_cadastro_']) || $this->nmgp_cmp_hidden['data_cadastro_'] == 'on') {
      if (!isset($this->nm_new_label['data_cadastro_'])) {
          $this->nm_new_label['data_cadastro_'] = "Data da Prescrição"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['data_cadastro_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_data_cadastro__label" id="hidden_field_label_data_cadastro_" style="<?php echo $sStyleHidden_data_cadastro_; ?>" > <?php echo $this->nm_new_label['data_cadastro_'] ?><br><?php echo $date_format_show ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_paciente_']) && $this->nmgp_cmp_hidden['id_paciente_'] == 'off') { $sStyleHidden_id_paciente_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_paciente_']) || $this->nmgp_cmp_hidden['id_paciente_'] == 'on') {
      if (!isset($this->nm_new_label['id_paciente_'])) {
          $this->nm_new_label['id_paciente_'] = ""; } ?>

    <TD class="scFormLabelOddMult css_id_paciente__label" id="hidden_field_label_id_paciente_" style="<?php echo $sStyleHidden_id_paciente_; ?>" > <?php echo $this->nm_new_label['id_paciente_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_usuario_']) && $this->nmgp_cmp_hidden['id_usuario_'] == 'off') { $sStyleHidden_id_usuario_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_usuario_']) || $this->nmgp_cmp_hidden['id_usuario_'] == 'on') {
      if (!isset($this->nm_new_label['id_usuario_'])) {
          $this->nm_new_label['id_usuario_'] = "Id Usuario"; } ?>

    <TD class="scFormLabelOddMult css_id_usuario__label" id="hidden_field_label_id_usuario_" style="<?php echo $sStyleHidden_id_usuario_; ?>" > <?php echo $this->nm_new_label['id_usuario_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['selecionar_']) && $this->nmgp_cmp_hidden['selecionar_'] == 'off') { $sStyleHidden_selecionar_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['selecionar_']) || $this->nmgp_cmp_hidden['selecionar_'] == 'on') {
      if (!isset($this->nm_new_label['selecionar_'])) {
          $this->nm_new_label['selecionar_'] = ""; } ?>

    <TD class="scFormLabelOddMult css_selecionar__label" id="hidden_field_label_selecionar_" style="<?php echo $sStyleHidden_selecionar_; ?>" > <?php echo $this->nm_new_label['selecionar_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off') { $sStyleHidden_obs_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['obs_']) || $this->nmgp_cmp_hidden['obs_'] == 'on') {
      if (!isset($this->nm_new_label['obs_'])) {
          $this->nm_new_label['obs_'] = "Observação"; } ?>

    <TD class="scFormLabelOddMult css_obs__label" id="hidden_field_label_obs_" style="<?php echo $sStyleHidden_obs_; ?>" > <?php echo $this->nm_new_label['obs_'] ?> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_prescricao_pront);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_prescricao_pront = $this->form_vert_form_prescricao_pront;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_prescricao_pront))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_prescricao_']))
           {
               $this->nmgp_cmp_readonly['id_prescricao_'] = 'on';
           }
   foreach ($this->form_vert_form_prescricao_pront as $sc_seq_vert => $sc_lixo)
   {
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_prescricao_'] = true;
           $this->nmgp_cmp_readonly['medicamento_'] = true;
           $this->nmgp_cmp_readonly['prescritor_'] = true;
           $this->nmgp_cmp_readonly['hora_de_adm_'] = true;
           $this->nmgp_cmp_readonly['prof_que_adm_'] = true;
           $this->nmgp_cmp_readonly['data_cadastro_'] = true;
           $this->nmgp_cmp_readonly['id_paciente_'] = true;
           $this->nmgp_cmp_readonly['id_usuario_'] = true;
           $this->nmgp_cmp_readonly['selecionar_'] = true;
           $this->nmgp_cmp_readonly['obs_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_prescricao_']) || $this->nmgp_cmp_readonly['id_prescricao_'] != "on") {$this->nmgp_cmp_readonly['id_prescricao_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['medicamento_']) || $this->nmgp_cmp_readonly['medicamento_'] != "on") {$this->nmgp_cmp_readonly['medicamento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['prescritor_']) || $this->nmgp_cmp_readonly['prescritor_'] != "on") {$this->nmgp_cmp_readonly['prescritor_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['hora_de_adm_']) || $this->nmgp_cmp_readonly['hora_de_adm_'] != "on") {$this->nmgp_cmp_readonly['hora_de_adm_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['prof_que_adm_']) || $this->nmgp_cmp_readonly['prof_que_adm_'] != "on") {$this->nmgp_cmp_readonly['prof_que_adm_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['data_cadastro_']) || $this->nmgp_cmp_readonly['data_cadastro_'] != "on") {$this->nmgp_cmp_readonly['data_cadastro_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_paciente_']) || $this->nmgp_cmp_readonly['id_paciente_'] != "on") {$this->nmgp_cmp_readonly['id_paciente_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_usuario_']) || $this->nmgp_cmp_readonly['id_usuario_'] != "on") {$this->nmgp_cmp_readonly['id_usuario_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['selecionar_']) || $this->nmgp_cmp_readonly['selecionar_'] != "on") {$this->nmgp_cmp_readonly['selecionar_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['obs_']) || $this->nmgp_cmp_readonly['obs_'] != "on") {$this->nmgp_cmp_readonly['obs_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->id_prescricao_ = $this->form_vert_form_prescricao_pront[$sc_seq_vert]['id_prescricao_']; 
       $id_prescricao_ = $this->id_prescricao_; 
       if (!isset($this->nmgp_cmp_hidden['id_prescricao_']))
       {
           $this->nmgp_cmp_hidden['id_prescricao_'] = 'off';
       }
       $sStyleHidden_id_prescricao_ = '';
       if (isset($sCheckRead_id_prescricao_))
       {
           unset($sCheckRead_id_prescricao_);
       }
       if (isset($this->nmgp_cmp_readonly['id_prescricao_']))
       {
           $sCheckRead_id_prescricao_ = $this->nmgp_cmp_readonly['id_prescricao_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_prescricao_']) && $this->nmgp_cmp_hidden['id_prescricao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_prescricao_']);
           $sStyleHidden_id_prescricao_ = 'display: none;';
       }
       $bTestReadOnly_id_prescricao_ = true;
       $sStyleReadLab_id_prescricao_ = 'display: none;';
       $sStyleReadInp_id_prescricao_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_prescricao_"]) &&  $this->nmgp_cmp_readonly["id_prescricao_"] == "on"))
       {
           $bTestReadOnly_id_prescricao_ = false;
           unset($this->nmgp_cmp_readonly['id_prescricao_']);
           $sStyleReadLab_id_prescricao_ = '';
           $sStyleReadInp_id_prescricao_ = 'display: none;';
       }
       $this->medicamento_ = $this->form_vert_form_prescricao_pront[$sc_seq_vert]['medicamento_']; 
       $medicamento_ = $this->medicamento_; 
       $sStyleHidden_medicamento_ = '';
       if (isset($sCheckRead_medicamento_))
       {
           unset($sCheckRead_medicamento_);
       }
       if (isset($this->nmgp_cmp_readonly['medicamento_']))
       {
           $sCheckRead_medicamento_ = $this->nmgp_cmp_readonly['medicamento_'];
       }
       if (isset($this->nmgp_cmp_hidden['medicamento_']) && $this->nmgp_cmp_hidden['medicamento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['medicamento_']);
           $sStyleHidden_medicamento_ = 'display: none;';
       }
       $bTestReadOnly_medicamento_ = true;
       $sStyleReadLab_medicamento_ = 'display: none;';
       $sStyleReadInp_medicamento_ = '';
       if (isset($this->nmgp_cmp_readonly['medicamento_']) && $this->nmgp_cmp_readonly['medicamento_'] == 'on')
       {
           $bTestReadOnly_medicamento_ = false;
           unset($this->nmgp_cmp_readonly['medicamento_']);
           $sStyleReadLab_medicamento_ = '';
           $sStyleReadInp_medicamento_ = 'display: none;';
       }
       $this->prescritor_ = $this->form_vert_form_prescricao_pront[$sc_seq_vert]['prescritor_']; 
       $prescritor_ = $this->prescritor_; 
       $sStyleHidden_prescritor_ = '';
       if (isset($sCheckRead_prescritor_))
       {
           unset($sCheckRead_prescritor_);
       }
       if (isset($this->nmgp_cmp_readonly['prescritor_']))
       {
           $sCheckRead_prescritor_ = $this->nmgp_cmp_readonly['prescritor_'];
       }
       if (isset($this->nmgp_cmp_hidden['prescritor_']) && $this->nmgp_cmp_hidden['prescritor_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['prescritor_']);
           $sStyleHidden_prescritor_ = 'display: none;';
       }
       $bTestReadOnly_prescritor_ = true;
       $sStyleReadLab_prescritor_ = 'display: none;';
       $sStyleReadInp_prescritor_ = '';
       if (isset($this->nmgp_cmp_readonly['prescritor_']) && $this->nmgp_cmp_readonly['prescritor_'] == 'on')
       {
           $bTestReadOnly_prescritor_ = false;
           unset($this->nmgp_cmp_readonly['prescritor_']);
           $sStyleReadLab_prescritor_ = '';
           $sStyleReadInp_prescritor_ = 'display: none;';
       }
       $this->hora_de_adm_ = $this->form_vert_form_prescricao_pront[$sc_seq_vert]['hora_de_adm_']; 
       $hora_de_adm_ = $this->hora_de_adm_; 
       $sStyleHidden_hora_de_adm_ = '';
       if (isset($sCheckRead_hora_de_adm_))
       {
           unset($sCheckRead_hora_de_adm_);
       }
       if (isset($this->nmgp_cmp_readonly['hora_de_adm_']))
       {
           $sCheckRead_hora_de_adm_ = $this->nmgp_cmp_readonly['hora_de_adm_'];
       }
       if (isset($this->nmgp_cmp_hidden['hora_de_adm_']) && $this->nmgp_cmp_hidden['hora_de_adm_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['hora_de_adm_']);
           $sStyleHidden_hora_de_adm_ = 'display: none;';
       }
       $bTestReadOnly_hora_de_adm_ = true;
       $sStyleReadLab_hora_de_adm_ = 'display: none;';
       $sStyleReadInp_hora_de_adm_ = '';
       if (isset($this->nmgp_cmp_readonly['hora_de_adm_']) && $this->nmgp_cmp_readonly['hora_de_adm_'] == 'on')
       {
           $bTestReadOnly_hora_de_adm_ = false;
           unset($this->nmgp_cmp_readonly['hora_de_adm_']);
           $sStyleReadLab_hora_de_adm_ = '';
           $sStyleReadInp_hora_de_adm_ = 'display: none;';
       }
       $this->prof_que_adm_ = $this->form_vert_form_prescricao_pront[$sc_seq_vert]['prof_que_adm_']; 
       $prof_que_adm_ = $this->prof_que_adm_; 
       $sStyleHidden_prof_que_adm_ = '';
       if (isset($sCheckRead_prof_que_adm_))
       {
           unset($sCheckRead_prof_que_adm_);
       }
       if (isset($this->nmgp_cmp_readonly['prof_que_adm_']))
       {
           $sCheckRead_prof_que_adm_ = $this->nmgp_cmp_readonly['prof_que_adm_'];
       }
       if (isset($this->nmgp_cmp_hidden['prof_que_adm_']) && $this->nmgp_cmp_hidden['prof_que_adm_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['prof_que_adm_']);
           $sStyleHidden_prof_que_adm_ = 'display: none;';
       }
       $bTestReadOnly_prof_que_adm_ = true;
       $sStyleReadLab_prof_que_adm_ = 'display: none;';
       $sStyleReadInp_prof_que_adm_ = '';
       if (isset($this->nmgp_cmp_readonly['prof_que_adm_']) && $this->nmgp_cmp_readonly['prof_que_adm_'] == 'on')
       {
           $bTestReadOnly_prof_que_adm_ = false;
           unset($this->nmgp_cmp_readonly['prof_que_adm_']);
           $sStyleReadLab_prof_que_adm_ = '';
           $sStyleReadInp_prof_que_adm_ = 'display: none;';
       }
       $this->data_cadastro_ = $this->form_vert_form_prescricao_pront[$sc_seq_vert]['data_cadastro_'] . ' ' . $this->form_vert_form_prescricao_pront[$sc_seq_vert]['data_cadastro__hora']; 
       $data_cadastro_ = $this->data_cadastro_; 
       $sStyleHidden_data_cadastro_ = '';
       if (isset($sCheckRead_data_cadastro_))
       {
           unset($sCheckRead_data_cadastro_);
       }
       if (isset($this->nmgp_cmp_readonly['data_cadastro_']))
       {
           $sCheckRead_data_cadastro_ = $this->nmgp_cmp_readonly['data_cadastro_'];
       }
       if (isset($this->nmgp_cmp_hidden['data_cadastro_']) && $this->nmgp_cmp_hidden['data_cadastro_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['data_cadastro_']);
           $sStyleHidden_data_cadastro_ = 'display: none;';
       }
       $bTestReadOnly_data_cadastro_ = true;
       $sStyleReadLab_data_cadastro_ = 'display: none;';
       $sStyleReadInp_data_cadastro_ = '';
       if (isset($this->nmgp_cmp_readonly['data_cadastro_']) && $this->nmgp_cmp_readonly['data_cadastro_'] == 'on')
       {
           $bTestReadOnly_data_cadastro_ = false;
           unset($this->nmgp_cmp_readonly['data_cadastro_']);
           $sStyleReadLab_data_cadastro_ = '';
           $sStyleReadInp_data_cadastro_ = 'display: none;';
       }
       $this->id_paciente_ = $this->form_vert_form_prescricao_pront[$sc_seq_vert]['id_paciente_']; 
       $id_paciente_ = $this->id_paciente_; 
       if (!isset($this->nmgp_cmp_hidden['id_paciente_']))
       {
           $this->nmgp_cmp_hidden['id_paciente_'] = 'off';
       }
       $sStyleHidden_id_paciente_ = '';
       if (isset($sCheckRead_id_paciente_))
       {
           unset($sCheckRead_id_paciente_);
       }
       if (isset($this->nmgp_cmp_readonly['id_paciente_']))
       {
           $sCheckRead_id_paciente_ = $this->nmgp_cmp_readonly['id_paciente_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_paciente_']) && $this->nmgp_cmp_hidden['id_paciente_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_paciente_']);
           $sStyleHidden_id_paciente_ = 'display: none;';
       }
       $bTestReadOnly_id_paciente_ = true;
       $sStyleReadLab_id_paciente_ = 'display: none;';
       $sStyleReadInp_id_paciente_ = '';
       if (isset($this->nmgp_cmp_readonly['id_paciente_']) && $this->nmgp_cmp_readonly['id_paciente_'] == 'on')
       {
           $bTestReadOnly_id_paciente_ = false;
           unset($this->nmgp_cmp_readonly['id_paciente_']);
           $sStyleReadLab_id_paciente_ = '';
           $sStyleReadInp_id_paciente_ = 'display: none;';
       }
       $this->id_usuario_ = $this->form_vert_form_prescricao_pront[$sc_seq_vert]['id_usuario_']; 
       $id_usuario_ = $this->id_usuario_; 
       if (!isset($this->nmgp_cmp_hidden['id_usuario_']))
       {
           $this->nmgp_cmp_hidden['id_usuario_'] = 'off';
       }
       $sStyleHidden_id_usuario_ = '';
       if (isset($sCheckRead_id_usuario_))
       {
           unset($sCheckRead_id_usuario_);
       }
       if (isset($this->nmgp_cmp_readonly['id_usuario_']))
       {
           $sCheckRead_id_usuario_ = $this->nmgp_cmp_readonly['id_usuario_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_usuario_']) && $this->nmgp_cmp_hidden['id_usuario_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_usuario_']);
           $sStyleHidden_id_usuario_ = 'display: none;';
       }
       $bTestReadOnly_id_usuario_ = true;
       $sStyleReadLab_id_usuario_ = 'display: none;';
       $sStyleReadInp_id_usuario_ = '';
       if (isset($this->nmgp_cmp_readonly['id_usuario_']) && $this->nmgp_cmp_readonly['id_usuario_'] == 'on')
       {
           $bTestReadOnly_id_usuario_ = false;
           unset($this->nmgp_cmp_readonly['id_usuario_']);
           $sStyleReadLab_id_usuario_ = '';
           $sStyleReadInp_id_usuario_ = 'display: none;';
       }
       $this->selecionar_ = $this->form_vert_form_prescricao_pront[$sc_seq_vert]['selecionar_']; 
       $selecionar_ = $this->selecionar_; 
       $sStyleHidden_selecionar_ = '';
       if (isset($sCheckRead_selecionar_))
       {
           unset($sCheckRead_selecionar_);
       }
       if (isset($this->nmgp_cmp_readonly['selecionar_']))
       {
           $sCheckRead_selecionar_ = $this->nmgp_cmp_readonly['selecionar_'];
       }
       if (isset($this->nmgp_cmp_hidden['selecionar_']) && $this->nmgp_cmp_hidden['selecionar_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['selecionar_']);
           $sStyleHidden_selecionar_ = 'display: none;';
       }
       $bTestReadOnly_selecionar_ = true;
       $sStyleReadLab_selecionar_ = 'display: none;';
       $sStyleReadInp_selecionar_ = '';
       if (isset($this->nmgp_cmp_readonly['selecionar_']) && $this->nmgp_cmp_readonly['selecionar_'] == 'on')
       {
           $bTestReadOnly_selecionar_ = false;
           unset($this->nmgp_cmp_readonly['selecionar_']);
           $sStyleReadLab_selecionar_ = '';
           $sStyleReadInp_selecionar_ = 'display: none;';
       }
       $this->obs_ = $this->form_vert_form_prescricao_pront[$sc_seq_vert]['obs_']; 
       $obs_ = $this->obs_; 
       $sStyleHidden_obs_ = '';
       if (isset($sCheckRead_obs_))
       {
           unset($sCheckRead_obs_);
       }
       if (isset($this->nmgp_cmp_readonly['obs_']))
       {
           $sCheckRead_obs_ = $this->nmgp_cmp_readonly['obs_'];
       }
       if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['obs_']);
           $sStyleHidden_obs_ = 'display: none;';
       }
       $bTestReadOnly_obs_ = true;
       $sStyleReadLab_obs_ = 'display: none;';
       $sStyleReadInp_obs_ = '';
       if (isset($this->nmgp_cmp_readonly['obs_']) && $this->nmgp_cmp_readonly['obs_'] == 'on')
       {
           $bTestReadOnly_obs_ = false;
           unset($this->nmgp_cmp_readonly['obs_']);
           $sStyleReadLab_obs_ = '';
           $sStyleReadInp_obs_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_botoes['delete'] == "on" && $this->nmgp_opcao != "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_botoes['update'] == "on" && $this->nmgp_opcao != "novo") {
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_prescricao_pront_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_prescricao_pront_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_prescricao_pront_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_prescricao_pront_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_prescricao_pront_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_prescricao_pront_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_prescricao_']) && $this->nmgp_cmp_hidden['id_prescricao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_prescricao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_prescricao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_id_prescricao__line" id="hidden_field_data_id_prescricao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_prescricao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_prescricao__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_prescricao_<?php echo $sc_seq_vert ?>" class="css_id_prescricao__line" style="<?php echo $sStyleReadLab_id_prescricao_; ?>"><?php echo $this->form_encode_input($this->id_prescricao_); ?></span><span id="id_read_off_id_prescricao_<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_id_prescricao_; ?>"><input type="hidden" id="id_sc_field_id_prescricao_<?php echo $sc_seq_vert ?>" name="id_prescricao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_prescricao_) . "\">"?><span id="id_ajax_label_id_prescricao_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($id_prescricao_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_prescricao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_prescricao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['medicamento_']) && $this->nmgp_cmp_hidden['medicamento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="medicamento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($medicamento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_medicamento__line" id="hidden_field_data_medicamento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_medicamento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_medicamento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_medicamento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["medicamento_"]) &&  $this->nmgp_cmp_readonly["medicamento_"] == "on") { 

 ?>
<input type="hidden" name="medicamento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($medicamento_) . "\">" . $medicamento_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_medicamento_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-medicamento_<?php echo $sc_seq_vert ?> css_medicamento__line" style="<?php echo $sStyleReadLab_medicamento_; ?>"><?php echo $this->form_encode_input($this->medicamento_); ?></span><span id="id_read_off_medicamento_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_medicamento_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_medicamento__obj" style="" id="id_sc_field_medicamento_<?php echo $sc_seq_vert ?>" type=text name="medicamento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($medicamento_) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_medicamento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_medicamento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['prescritor_']) && $this->nmgp_cmp_hidden['prescritor_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="prescritor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($prescritor_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_prescritor__line" id="hidden_field_data_prescritor_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_prescritor_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_prescritor__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="prescritor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($prescritor_); ?>"><span id="id_ajax_label_prescritor_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($prescritor_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prescritor_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prescritor_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['hora_de_adm_']) && $this->nmgp_cmp_hidden['hora_de_adm_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_de_adm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_de_adm_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_hora_de_adm__line" id="hidden_field_data_hora_de_adm_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_hora_de_adm_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_hora_de_adm__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_hora_de_adm_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hora_de_adm_"]) &&  $this->nmgp_cmp_readonly["hora_de_adm_"] == "on") { 

 ?>
<input type="hidden" name="hora_de_adm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_de_adm_) . "\">" . $hora_de_adm_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_hora_de_adm_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-hora_de_adm_<?php echo $sc_seq_vert ?> css_hora_de_adm__line" style="<?php echo $sStyleReadLab_hora_de_adm_; ?>"><?php echo $this->form_encode_input($hora_de_adm_); ?></span><span id="id_read_off_hora_de_adm_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hora_de_adm_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_hora_de_adm__obj" style="" id="id_sc_field_hora_de_adm_<?php echo $sc_seq_vert ?>" type=text name="hora_de_adm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_de_adm_) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['hora_de_adm_']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['hora_de_adm_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['hora_de_adm_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_de_adm_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_de_adm_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['prof_que_adm_']) && $this->nmgp_cmp_hidden['prof_que_adm_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="prof_que_adm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($prof_que_adm_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_prof_que_adm__line" id="hidden_field_data_prof_que_adm_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_prof_que_adm_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_prof_que_adm__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_prof_que_adm_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prof_que_adm_"]) &&  $this->nmgp_cmp_readonly["prof_que_adm_"] == "on") { 

 ?>
<input type="hidden" name="prof_que_adm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($prof_que_adm_) . "\">" . $prof_que_adm_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_prof_que_adm_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-prof_que_adm_<?php echo $sc_seq_vert ?> css_prof_que_adm__line" style="<?php echo $sStyleReadLab_prof_que_adm_; ?>"><?php echo $this->form_encode_input($this->prof_que_adm_); ?></span><span id="id_read_off_prof_que_adm_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_prof_que_adm_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_prof_que_adm__obj" style="" id="id_sc_field_prof_que_adm_<?php echo $sc_seq_vert ?>" type=text name="prof_que_adm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($prof_que_adm_) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prof_que_adm_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prof_que_adm_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['data_cadastro_']) && $this->nmgp_cmp_hidden['data_cadastro_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="data_cadastro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($data_cadastro_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_data_cadastro__line" id="hidden_field_data_data_cadastro_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_data_cadastro_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_data_cadastro__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="data_cadastro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($data_cadastro_); ?>"><span id="id_ajax_label_data_cadastro_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($data_cadastro_); ?></span>
<?php
$tmp_form_data = $this->field_config['data_cadastro_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_data_cadastro_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_data_cadastro_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->data_cadastro_ = $old_dt_data_cadastro_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['id_paciente_']) && $this->nmgp_cmp_hidden['id_paciente_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_paciente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_paciente_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_paciente__line" id="hidden_field_data_id_paciente_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_paciente_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_paciente__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_paciente_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_paciente_"]) &&  $this->nmgp_cmp_readonly["id_paciente_"] == "on") { 

 ?>
<input type="hidden" name="id_paciente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_paciente_) . "\">" . $id_paciente_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_paciente_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_paciente_<?php echo $sc_seq_vert ?> css_id_paciente__line" style="<?php echo $sStyleReadLab_id_paciente_; ?>"><?php echo $this->form_encode_input($this->id_paciente_); ?></span><span id="id_read_off_id_paciente_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_paciente_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_paciente__obj" style="" id="id_sc_field_id_paciente_<?php echo $sc_seq_vert ?>" type=text name="id_paciente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_paciente_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_paciente_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_paciente_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_paciente_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_paciente_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_usuario_']) && $this->nmgp_cmp_hidden['id_usuario_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_usuario_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_usuario__line" id="hidden_field_data_id_usuario_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_usuario_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_usuario__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_usuario_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_usuario_"]) &&  $this->nmgp_cmp_readonly["id_usuario_"] == "on") { 

 ?>
<input type="hidden" name="id_usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_usuario_) . "\">" . $id_usuario_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_usuario_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-id_usuario_<?php echo $sc_seq_vert ?> css_id_usuario__line" style="<?php echo $sStyleReadLab_id_usuario_; ?>"><?php echo $this->form_encode_input($this->id_usuario_); ?></span><span id="id_read_off_id_usuario_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_usuario_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_id_usuario__obj" style="" id="id_sc_field_id_usuario_<?php echo $sc_seq_vert ?>" type=text name="id_usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_usuario_) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_usuario_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_usuario_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_usuario_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_usuario_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['selecionar_']) && $this->nmgp_cmp_hidden['selecionar_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="selecionar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($selecionar_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_selecionar__line" id="hidden_field_data_selecionar_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_selecionar_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_selecionar__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_selecionar_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["selecionar_"]) &&  $this->nmgp_cmp_readonly["selecionar_"] == "on") { 

 if ("sim" == $this->selecionar_) { $selecionar__look = "Sim";} 
 if ("nao" == $this->selecionar_) { $selecionar__look = "Não";} 
?>
<input type="hidden" name="selecionar_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($selecionar_) . "\">" . $selecionar__look . ""; ?>
<?php } else { ?>

<?php

 if ("sim" == $this->selecionar_) { $selecionar__look = "Sim";} 
 if ("nao" == $this->selecionar_) { $selecionar__look = "Não";} 
?>
<span id="id_read_on_selecionar_<?php echo $sc_seq_vert ; ?>"  class="css_selecionar__line" style="<?php echo $sStyleReadLab_selecionar_; ?>"><?php echo $this->form_encode_input($selecionar__look); ?></span><span id="id_read_off_selecionar_<?php echo $sc_seq_vert ; ?>" style="<?php echo $sStyleReadInp_selecionar_; ?>"><div id="idAjaxRadio_selecionar_<?php echo $sc_seq_vert ; ?>" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOddMult css_selecionar__line">    <input style="float:left; position:relative; top: -3px;" type=radio name="selecionar_<?php echo $sc_seq_vert ?>" value="sim"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['Lookup_selecionar_'][] = 'sim'; ?>
<?php  if ("sim" == $this->selecionar_)  { echo " checked" ;} ?>  onClick="do_ajax_form_prescricao_pront_event_selecionar__onclick(<?php echo $sc_seq_vert; ?>);" >Sim</TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_selecionar__line">    <input style="float:left; position:relative; top: -3px;" type=radio name="selecionar_<?php echo $sc_seq_vert ?>" value="nao"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['Lookup_selecionar_'][] = 'nao'; ?>
<?php  if ("nao" == $this->selecionar_)  { echo " checked" ;} ?><?php  if (empty($this->selecionar_)) { echo " checked" ;} ?>  onClick="do_ajax_form_prescricao_pront_event_selecionar__onclick(<?php echo $sc_seq_vert; ?>);" >Não</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_selecionar_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_selecionar_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obs_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($obs_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_obs__line" id="hidden_field_data_obs_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_obs_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_obs__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_obs_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obs_"]) &&  $this->nmgp_cmp_readonly["obs_"] == "on") { 

 ?>
<input type="hidden" name="obs_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($obs_) . "\">" . $obs_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_obs_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-obs_<?php echo $sc_seq_vert ?> css_obs__line" style="<?php echo $sStyleReadLab_obs_; ?>"><?php echo $this->form_encode_input($this->obs_); ?></span><span id="id_read_off_obs_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_obs_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_obs__obj" style="" id="id_sc_field_obs_<?php echo $sc_seq_vert ?>" type=text name="obs_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($obs_) ?>"
 size=200 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obs_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obs_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_id_prescricao_))
       {
           $this->nmgp_cmp_readonly['id_prescricao_'] = $sCheckRead_id_prescricao_;
       }
       if ('display: none;' == $sStyleHidden_id_prescricao_)
       {
           $this->nmgp_cmp_hidden['id_prescricao_'] = 'off';
       }
       if (isset($sCheckRead_medicamento_))
       {
           $this->nmgp_cmp_readonly['medicamento_'] = $sCheckRead_medicamento_;
       }
       if ('display: none;' == $sStyleHidden_medicamento_)
       {
           $this->nmgp_cmp_hidden['medicamento_'] = 'off';
       }
       if (isset($sCheckRead_prescritor_))
       {
           $this->nmgp_cmp_readonly['prescritor_'] = $sCheckRead_prescritor_;
       }
       if ('display: none;' == $sStyleHidden_prescritor_)
       {
           $this->nmgp_cmp_hidden['prescritor_'] = 'off';
       }
       if (isset($sCheckRead_hora_de_adm_))
       {
           $this->nmgp_cmp_readonly['hora_de_adm_'] = $sCheckRead_hora_de_adm_;
       }
       if ('display: none;' == $sStyleHidden_hora_de_adm_)
       {
           $this->nmgp_cmp_hidden['hora_de_adm_'] = 'off';
       }
       if (isset($sCheckRead_prof_que_adm_))
       {
           $this->nmgp_cmp_readonly['prof_que_adm_'] = $sCheckRead_prof_que_adm_;
       }
       if ('display: none;' == $sStyleHidden_prof_que_adm_)
       {
           $this->nmgp_cmp_hidden['prof_que_adm_'] = 'off';
       }
       if (isset($sCheckRead_data_cadastro_))
       {
           $this->nmgp_cmp_readonly['data_cadastro_'] = $sCheckRead_data_cadastro_;
       }
       if ('display: none;' == $sStyleHidden_data_cadastro_)
       {
           $this->nmgp_cmp_hidden['data_cadastro_'] = 'off';
       }
       if (isset($sCheckRead_id_paciente_))
       {
           $this->nmgp_cmp_readonly['id_paciente_'] = $sCheckRead_id_paciente_;
       }
       if ('display: none;' == $sStyleHidden_id_paciente_)
       {
           $this->nmgp_cmp_hidden['id_paciente_'] = 'off';
       }
       if (isset($sCheckRead_id_usuario_))
       {
           $this->nmgp_cmp_readonly['id_usuario_'] = $sCheckRead_id_usuario_;
       }
       if ('display: none;' == $sStyleHidden_id_usuario_)
       {
           $this->nmgp_cmp_hidden['id_usuario_'] = 'off';
       }
       if (isset($sCheckRead_selecionar_))
       {
           $this->nmgp_cmp_readonly['selecionar_'] = $sCheckRead_selecionar_;
       }
       if ('display: none;' == $sStyleHidden_selecionar_)
       {
           $this->nmgp_cmp_hidden['selecionar_'] = 'off';
       }
       if (isset($sCheckRead_obs_))
       {
           $this->nmgp_cmp_readonly['obs_'] = $sCheckRead_obs_;
       }
       if ('display: none;' == $sStyleHidden_obs_)
       {
           $this->nmgp_cmp_hidden['obs_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_prescricao_pront = $guarda_form_vert_form_prescricao_pront;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div> 
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna_off", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal_off", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['masterValue']);
?>
}
<?php
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_prescricao_pront");
 parent.scAjaxDetailHeight("form_prescricao_pront", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_prescricao_pront", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_prescricao_pront", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['sc_modal'])
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
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
</body> 
</html> 
<?php 
 } 
} 
?> 
