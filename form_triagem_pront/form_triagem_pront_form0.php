<?php
class form_triagem_pront_form extends form_triagem_pront_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags(""); } else { echo strip_tags(""); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_triagem_pront/form_triagem_pront_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_triagem_pront_sajax_js.php");
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
<?php

include_once('form_triagem_pront_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['recarga'];
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
 include_once("form_triagem_pront_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_triagem_pront'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_triagem_pront'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo ""; } else { echo ""; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "do_ajax_form_triagem_pront_add_new_line(); return false;", "do_ajax_form_triagem_pront_add_new_line(); return false;", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['empty_filter'] = true;
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
   <?php if (isset($this->nmgp_cmp_hidden['id_paciente_']) && $this->nmgp_cmp_hidden['id_paciente_'] == 'off') { $sStyleHidden_id_paciente_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_paciente_']) || $this->nmgp_cmp_hidden['id_paciente_'] == 'on') {
      if (!isset($this->nm_new_label['id_paciente_'])) {
          $this->nm_new_label['id_paciente_'] = "Nome do Paciente"; } ?>

    <TD class="scFormLabelOddMult css_id_paciente__label" id="hidden_field_label_id_paciente_" style="<?php echo $sStyleHidden_id_paciente_; ?>" > <?php echo $this->nm_new_label['id_paciente_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['data_']) && $this->nmgp_cmp_hidden['data_'] == 'off') { $sStyleHidden_data_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['data_']) || $this->nmgp_cmp_hidden['data_'] == 'on') {
      if (!isset($this->nm_new_label['data_'])) {
          $this->nm_new_label['data_'] = "Data"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['data_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_data__label" id="hidden_field_label_data_" style="<?php echo $sStyleHidden_data_; ?>" > <?php echo $this->nm_new_label['data_'] ?> <span class="scFormRequiredOddMult">*</span><br><?php echo $date_format_show ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['hora_']) && $this->nmgp_cmp_hidden['hora_'] == 'off') { $sStyleHidden_hora_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['hora_']) || $this->nmgp_cmp_hidden['hora_'] == 'on') {
      if (!isset($this->nm_new_label['hora_'])) {
          $this->nm_new_label['hora_'] = "Hora"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['hora_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_hora__label" id="hidden_field_label_hora_" style="<?php echo $sStyleHidden_hora_; ?>" > <?php echo $this->nm_new_label['hora_'] ?> <span class="scFormRequiredOddMult">*</span><br><?php echo $date_format_show ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['pa_']) && $this->nmgp_cmp_hidden['pa_'] == 'off') { $sStyleHidden_pa_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['pa_']) || $this->nmgp_cmp_hidden['pa_'] == 'on') {
      if (!isset($this->nm_new_label['pa_'])) {
          $this->nm_new_label['pa_'] = "PA (mmHg)"; } ?>

    <TD class="scFormLabelOddMult css_pa__label" id="hidden_field_label_pa_" style="<?php echo $sStyleHidden_pa_; ?>" > <?php echo $this->nm_new_label['pa_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['fc_']) && $this->nmgp_cmp_hidden['fc_'] == 'off') { $sStyleHidden_fc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['fc_']) || $this->nmgp_cmp_hidden['fc_'] == 'on') {
      if (!isset($this->nm_new_label['fc_'])) {
          $this->nm_new_label['fc_'] = "FC (bpm)"; } ?>

    <TD class="scFormLabelOddMult css_fc__label" id="hidden_field_label_fc_" style="<?php echo $sStyleHidden_fc_; ?>" > <?php echo $this->nm_new_label['fc_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['fr_']) && $this->nmgp_cmp_hidden['fr_'] == 'off') { $sStyleHidden_fr_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['fr_']) || $this->nmgp_cmp_hidden['fr_'] == 'on') {
      if (!isset($this->nm_new_label['fr_'])) {
          $this->nm_new_label['fr_'] = "FR (rpm)"; } ?>

    <TD class="scFormLabelOddMult css_fr__label" id="hidden_field_label_fr_" style="<?php echo $sStyleHidden_fr_; ?>" > <?php echo $this->nm_new_label['fr_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tc_']) && $this->nmgp_cmp_hidden['tc_'] == 'off') { $sStyleHidden_tc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tc_']) || $this->nmgp_cmp_hidden['tc_'] == 'on') {
      if (!isset($this->nm_new_label['tc_'])) {
          $this->nm_new_label['tc_'] = "T (ºC)"; } ?>

    <TD class="scFormLabelOddMult css_tc__label" id="hidden_field_label_tc_" style="<?php echo $sStyleHidden_tc_; ?>" > <?php echo $this->nm_new_label['tc_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['hgt_']) && $this->nmgp_cmp_hidden['hgt_'] == 'off') { $sStyleHidden_hgt_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['hgt_']) || $this->nmgp_cmp_hidden['hgt_'] == 'on') {
      if (!isset($this->nm_new_label['hgt_'])) {
          $this->nm_new_label['hgt_'] = "HGT (mg/dl)"; } ?>

    <TD class="scFormLabelOddMult css_hgt__label" id="hidden_field_label_hgt_" style="<?php echo $sStyleHidden_hgt_; ?>" > <?php echo $this->nm_new_label['hgt_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['peso_']) && $this->nmgp_cmp_hidden['peso_'] == 'off') { $sStyleHidden_peso_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['peso_']) || $this->nmgp_cmp_hidden['peso_'] == 'on') {
      if (!isset($this->nm_new_label['peso_'])) {
          $this->nm_new_label['peso_'] = "Peso (kg)"; } ?>

    <TD class="scFormLabelOddMult css_peso__label" id="hidden_field_label_peso_" style="<?php echo $sStyleHidden_peso_; ?>" > <?php echo $this->nm_new_label['peso_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['altura_']) && $this->nmgp_cmp_hidden['altura_'] == 'off') { $sStyleHidden_altura_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['altura_']) || $this->nmgp_cmp_hidden['altura_'] == 'on') {
      if (!isset($this->nm_new_label['altura_'])) {
          $this->nm_new_label['altura_'] = "Altura (cm)"; } ?>

    <TD class="scFormLabelOddMult css_altura__label" id="hidden_field_label_altura_" style="<?php echo $sStyleHidden_altura_; ?>" > <?php echo $this->nm_new_label['altura_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['coren_']) && $this->nmgp_cmp_hidden['coren_'] == 'off') { $sStyleHidden_coren_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['coren_']) || $this->nmgp_cmp_hidden['coren_'] == 'on') {
      if (!isset($this->nm_new_label['coren_'])) {
          $this->nm_new_label['coren_'] = "Coren"; } ?>

    <TD class="scFormLabelOddMult css_coren__label" id="hidden_field_label_coren_" style="<?php echo $sStyleHidden_coren_; ?>" > <?php echo $this->nm_new_label['coren_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['alergia_']) && $this->nmgp_cmp_hidden['alergia_'] == 'off') { $sStyleHidden_alergia_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['alergia_']) || $this->nmgp_cmp_hidden['alergia_'] == 'on') {
      if (!isset($this->nm_new_label['alergia_'])) {
          $this->nm_new_label['alergia_'] = "Alergia"; } ?>

    <TD class="scFormLabelOddMult css_alergia__label" id="hidden_field_label_alergia_" style="<?php echo $sStyleHidden_alergia_; ?>" > <?php echo $this->nm_new_label['alergia_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_alergia_']) && $this->nmgp_cmp_hidden['tipo_alergia_'] == 'off') { $sStyleHidden_tipo_alergia_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tipo_alergia_']) || $this->nmgp_cmp_hidden['tipo_alergia_'] == 'on') {
      if (!isset($this->nm_new_label['tipo_alergia_'])) {
          $this->nm_new_label['tipo_alergia_'] = "Tipo Alergia"; } ?>

    <TD class="scFormLabelOddMult css_tipo_alergia__label" id="hidden_field_label_tipo_alergia_" style="<?php echo $sStyleHidden_tipo_alergia_; ?>" > <?php echo $this->nm_new_label['tipo_alergia_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_usuario_']) && $this->nmgp_cmp_hidden['id_usuario_'] == 'off') { $sStyleHidden_id_usuario_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_usuario_']) || $this->nmgp_cmp_hidden['id_usuario_'] == 'on') {
      if (!isset($this->nm_new_label['id_usuario_'])) {
          $this->nm_new_label['id_usuario_'] = "Id Usuario"; } ?>

    <TD class="scFormLabelOddMult css_id_usuario__label" id="hidden_field_label_id_usuario_" style="<?php echo $sStyleHidden_id_usuario_; ?>" > <?php echo $this->nm_new_label['id_usuario_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_triagem_pront);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_triagem_pront = $this->form_vert_form_triagem_pront;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_triagem_pront))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_form_triagem_pront as $sc_seq_vert => $sc_lixo)
   {
       $this->id_triagem_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['id_triagem_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_paciente_'] = true;
           $this->nmgp_cmp_readonly['data_'] = true;
           $this->nmgp_cmp_readonly['hora_'] = true;
           $this->nmgp_cmp_readonly['pa_'] = true;
           $this->nmgp_cmp_readonly['fc_'] = true;
           $this->nmgp_cmp_readonly['fr_'] = true;
           $this->nmgp_cmp_readonly['tc_'] = true;
           $this->nmgp_cmp_readonly['hgt_'] = true;
           $this->nmgp_cmp_readonly['peso_'] = true;
           $this->nmgp_cmp_readonly['altura_'] = true;
           $this->nmgp_cmp_readonly['coren_'] = true;
           $this->nmgp_cmp_readonly['alergia_'] = true;
           $this->nmgp_cmp_readonly['tipo_alergia_'] = true;
           $this->nmgp_cmp_readonly['id_usuario_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_paciente_']) || $this->nmgp_cmp_readonly['id_paciente_'] != "on") {$this->nmgp_cmp_readonly['id_paciente_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['data_']) || $this->nmgp_cmp_readonly['data_'] != "on") {$this->nmgp_cmp_readonly['data_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['hora_']) || $this->nmgp_cmp_readonly['hora_'] != "on") {$this->nmgp_cmp_readonly['hora_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pa_']) || $this->nmgp_cmp_readonly['pa_'] != "on") {$this->nmgp_cmp_readonly['pa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['fc_']) || $this->nmgp_cmp_readonly['fc_'] != "on") {$this->nmgp_cmp_readonly['fc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['fr_']) || $this->nmgp_cmp_readonly['fr_'] != "on") {$this->nmgp_cmp_readonly['fr_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tc_']) || $this->nmgp_cmp_readonly['tc_'] != "on") {$this->nmgp_cmp_readonly['tc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['hgt_']) || $this->nmgp_cmp_readonly['hgt_'] != "on") {$this->nmgp_cmp_readonly['hgt_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['peso_']) || $this->nmgp_cmp_readonly['peso_'] != "on") {$this->nmgp_cmp_readonly['peso_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['altura_']) || $this->nmgp_cmp_readonly['altura_'] != "on") {$this->nmgp_cmp_readonly['altura_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['coren_']) || $this->nmgp_cmp_readonly['coren_'] != "on") {$this->nmgp_cmp_readonly['coren_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['alergia_']) || $this->nmgp_cmp_readonly['alergia_'] != "on") {$this->nmgp_cmp_readonly['alergia_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipo_alergia_']) || $this->nmgp_cmp_readonly['tipo_alergia_'] != "on") {$this->nmgp_cmp_readonly['tipo_alergia_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_usuario_']) || $this->nmgp_cmp_readonly['id_usuario_'] != "on") {$this->nmgp_cmp_readonly['id_usuario_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->id_paciente_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['id_paciente_']; 
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
       $this->data_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['data_']; 
       $data_ = $this->data_; 
       $sStyleHidden_data_ = '';
       if (isset($sCheckRead_data_))
       {
           unset($sCheckRead_data_);
       }
       if (isset($this->nmgp_cmp_readonly['data_']))
       {
           $sCheckRead_data_ = $this->nmgp_cmp_readonly['data_'];
       }
       if (isset($this->nmgp_cmp_hidden['data_']) && $this->nmgp_cmp_hidden['data_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['data_']);
           $sStyleHidden_data_ = 'display: none;';
       }
       $bTestReadOnly_data_ = true;
       $sStyleReadLab_data_ = 'display: none;';
       $sStyleReadInp_data_ = '';
       if (isset($this->nmgp_cmp_readonly['data_']) && $this->nmgp_cmp_readonly['data_'] == 'on')
       {
           $bTestReadOnly_data_ = false;
           unset($this->nmgp_cmp_readonly['data_']);
           $sStyleReadLab_data_ = '';
           $sStyleReadInp_data_ = 'display: none;';
       }
       $this->hora_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['hora_']; 
       $hora_ = $this->hora_; 
       $sStyleHidden_hora_ = '';
       if (isset($sCheckRead_hora_))
       {
           unset($sCheckRead_hora_);
       }
       if (isset($this->nmgp_cmp_readonly['hora_']))
       {
           $sCheckRead_hora_ = $this->nmgp_cmp_readonly['hora_'];
       }
       if (isset($this->nmgp_cmp_hidden['hora_']) && $this->nmgp_cmp_hidden['hora_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['hora_']);
           $sStyleHidden_hora_ = 'display: none;';
       }
       $bTestReadOnly_hora_ = true;
       $sStyleReadLab_hora_ = 'display: none;';
       $sStyleReadInp_hora_ = '';
       if (isset($this->nmgp_cmp_readonly['hora_']) && $this->nmgp_cmp_readonly['hora_'] == 'on')
       {
           $bTestReadOnly_hora_ = false;
           unset($this->nmgp_cmp_readonly['hora_']);
           $sStyleReadLab_hora_ = '';
           $sStyleReadInp_hora_ = 'display: none;';
       }
       $this->pa_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['pa_']; 
       $pa_ = $this->pa_; 
       $sStyleHidden_pa_ = '';
       if (isset($sCheckRead_pa_))
       {
           unset($sCheckRead_pa_);
       }
       if (isset($this->nmgp_cmp_readonly['pa_']))
       {
           $sCheckRead_pa_ = $this->nmgp_cmp_readonly['pa_'];
       }
       if (isset($this->nmgp_cmp_hidden['pa_']) && $this->nmgp_cmp_hidden['pa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pa_']);
           $sStyleHidden_pa_ = 'display: none;';
       }
       $bTestReadOnly_pa_ = true;
       $sStyleReadLab_pa_ = 'display: none;';
       $sStyleReadInp_pa_ = '';
       if (isset($this->nmgp_cmp_readonly['pa_']) && $this->nmgp_cmp_readonly['pa_'] == 'on')
       {
           $bTestReadOnly_pa_ = false;
           unset($this->nmgp_cmp_readonly['pa_']);
           $sStyleReadLab_pa_ = '';
           $sStyleReadInp_pa_ = 'display: none;';
       }
       $this->fc_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['fc_']; 
       $fc_ = $this->fc_; 
       $sStyleHidden_fc_ = '';
       if (isset($sCheckRead_fc_))
       {
           unset($sCheckRead_fc_);
       }
       if (isset($this->nmgp_cmp_readonly['fc_']))
       {
           $sCheckRead_fc_ = $this->nmgp_cmp_readonly['fc_'];
       }
       if (isset($this->nmgp_cmp_hidden['fc_']) && $this->nmgp_cmp_hidden['fc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['fc_']);
           $sStyleHidden_fc_ = 'display: none;';
       }
       $bTestReadOnly_fc_ = true;
       $sStyleReadLab_fc_ = 'display: none;';
       $sStyleReadInp_fc_ = '';
       if (isset($this->nmgp_cmp_readonly['fc_']) && $this->nmgp_cmp_readonly['fc_'] == 'on')
       {
           $bTestReadOnly_fc_ = false;
           unset($this->nmgp_cmp_readonly['fc_']);
           $sStyleReadLab_fc_ = '';
           $sStyleReadInp_fc_ = 'display: none;';
       }
       $this->fr_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['fr_']; 
       $fr_ = $this->fr_; 
       $sStyleHidden_fr_ = '';
       if (isset($sCheckRead_fr_))
       {
           unset($sCheckRead_fr_);
       }
       if (isset($this->nmgp_cmp_readonly['fr_']))
       {
           $sCheckRead_fr_ = $this->nmgp_cmp_readonly['fr_'];
       }
       if (isset($this->nmgp_cmp_hidden['fr_']) && $this->nmgp_cmp_hidden['fr_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['fr_']);
           $sStyleHidden_fr_ = 'display: none;';
       }
       $bTestReadOnly_fr_ = true;
       $sStyleReadLab_fr_ = 'display: none;';
       $sStyleReadInp_fr_ = '';
       if (isset($this->nmgp_cmp_readonly['fr_']) && $this->nmgp_cmp_readonly['fr_'] == 'on')
       {
           $bTestReadOnly_fr_ = false;
           unset($this->nmgp_cmp_readonly['fr_']);
           $sStyleReadLab_fr_ = '';
           $sStyleReadInp_fr_ = 'display: none;';
       }
       $this->tc_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['tc_']; 
       $tc_ = $this->tc_; 
       $sStyleHidden_tc_ = '';
       if (isset($sCheckRead_tc_))
       {
           unset($sCheckRead_tc_);
       }
       if (isset($this->nmgp_cmp_readonly['tc_']))
       {
           $sCheckRead_tc_ = $this->nmgp_cmp_readonly['tc_'];
       }
       if (isset($this->nmgp_cmp_hidden['tc_']) && $this->nmgp_cmp_hidden['tc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tc_']);
           $sStyleHidden_tc_ = 'display: none;';
       }
       $bTestReadOnly_tc_ = true;
       $sStyleReadLab_tc_ = 'display: none;';
       $sStyleReadInp_tc_ = '';
       if (isset($this->nmgp_cmp_readonly['tc_']) && $this->nmgp_cmp_readonly['tc_'] == 'on')
       {
           $bTestReadOnly_tc_ = false;
           unset($this->nmgp_cmp_readonly['tc_']);
           $sStyleReadLab_tc_ = '';
           $sStyleReadInp_tc_ = 'display: none;';
       }
       $this->hgt_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['hgt_']; 
       $hgt_ = $this->hgt_; 
       $sStyleHidden_hgt_ = '';
       if (isset($sCheckRead_hgt_))
       {
           unset($sCheckRead_hgt_);
       }
       if (isset($this->nmgp_cmp_readonly['hgt_']))
       {
           $sCheckRead_hgt_ = $this->nmgp_cmp_readonly['hgt_'];
       }
       if (isset($this->nmgp_cmp_hidden['hgt_']) && $this->nmgp_cmp_hidden['hgt_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['hgt_']);
           $sStyleHidden_hgt_ = 'display: none;';
       }
       $bTestReadOnly_hgt_ = true;
       $sStyleReadLab_hgt_ = 'display: none;';
       $sStyleReadInp_hgt_ = '';
       if (isset($this->nmgp_cmp_readonly['hgt_']) && $this->nmgp_cmp_readonly['hgt_'] == 'on')
       {
           $bTestReadOnly_hgt_ = false;
           unset($this->nmgp_cmp_readonly['hgt_']);
           $sStyleReadLab_hgt_ = '';
           $sStyleReadInp_hgt_ = 'display: none;';
       }
       $this->peso_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['peso_']; 
       $peso_ = $this->peso_; 
       $sStyleHidden_peso_ = '';
       if (isset($sCheckRead_peso_))
       {
           unset($sCheckRead_peso_);
       }
       if (isset($this->nmgp_cmp_readonly['peso_']))
       {
           $sCheckRead_peso_ = $this->nmgp_cmp_readonly['peso_'];
       }
       if (isset($this->nmgp_cmp_hidden['peso_']) && $this->nmgp_cmp_hidden['peso_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['peso_']);
           $sStyleHidden_peso_ = 'display: none;';
       }
       $bTestReadOnly_peso_ = true;
       $sStyleReadLab_peso_ = 'display: none;';
       $sStyleReadInp_peso_ = '';
       if (isset($this->nmgp_cmp_readonly['peso_']) && $this->nmgp_cmp_readonly['peso_'] == 'on')
       {
           $bTestReadOnly_peso_ = false;
           unset($this->nmgp_cmp_readonly['peso_']);
           $sStyleReadLab_peso_ = '';
           $sStyleReadInp_peso_ = 'display: none;';
       }
       $this->altura_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['altura_']; 
       $altura_ = $this->altura_; 
       $sStyleHidden_altura_ = '';
       if (isset($sCheckRead_altura_))
       {
           unset($sCheckRead_altura_);
       }
       if (isset($this->nmgp_cmp_readonly['altura_']))
       {
           $sCheckRead_altura_ = $this->nmgp_cmp_readonly['altura_'];
       }
       if (isset($this->nmgp_cmp_hidden['altura_']) && $this->nmgp_cmp_hidden['altura_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['altura_']);
           $sStyleHidden_altura_ = 'display: none;';
       }
       $bTestReadOnly_altura_ = true;
       $sStyleReadLab_altura_ = 'display: none;';
       $sStyleReadInp_altura_ = '';
       if (isset($this->nmgp_cmp_readonly['altura_']) && $this->nmgp_cmp_readonly['altura_'] == 'on')
       {
           $bTestReadOnly_altura_ = false;
           unset($this->nmgp_cmp_readonly['altura_']);
           $sStyleReadLab_altura_ = '';
           $sStyleReadInp_altura_ = 'display: none;';
       }
       $this->coren_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['coren_']; 
       $coren_ = $this->coren_; 
       $sStyleHidden_coren_ = '';
       if (isset($sCheckRead_coren_))
       {
           unset($sCheckRead_coren_);
       }
       if (isset($this->nmgp_cmp_readonly['coren_']))
       {
           $sCheckRead_coren_ = $this->nmgp_cmp_readonly['coren_'];
       }
       if (isset($this->nmgp_cmp_hidden['coren_']) && $this->nmgp_cmp_hidden['coren_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['coren_']);
           $sStyleHidden_coren_ = 'display: none;';
       }
       $bTestReadOnly_coren_ = true;
       $sStyleReadLab_coren_ = 'display: none;';
       $sStyleReadInp_coren_ = '';
       if (isset($this->nmgp_cmp_readonly['coren_']) && $this->nmgp_cmp_readonly['coren_'] == 'on')
       {
           $bTestReadOnly_coren_ = false;
           unset($this->nmgp_cmp_readonly['coren_']);
           $sStyleReadLab_coren_ = '';
           $sStyleReadInp_coren_ = 'display: none;';
       }
       $this->alergia_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['alergia_']; 
       $alergia_ = $this->alergia_; 
       $sStyleHidden_alergia_ = '';
       if (isset($sCheckRead_alergia_))
       {
           unset($sCheckRead_alergia_);
       }
       if (isset($this->nmgp_cmp_readonly['alergia_']))
       {
           $sCheckRead_alergia_ = $this->nmgp_cmp_readonly['alergia_'];
       }
       if (isset($this->nmgp_cmp_hidden['alergia_']) && $this->nmgp_cmp_hidden['alergia_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['alergia_']);
           $sStyleHidden_alergia_ = 'display: none;';
       }
       $bTestReadOnly_alergia_ = true;
       $sStyleReadLab_alergia_ = 'display: none;';
       $sStyleReadInp_alergia_ = '';
       if (isset($this->nmgp_cmp_readonly['alergia_']) && $this->nmgp_cmp_readonly['alergia_'] == 'on')
       {
           $bTestReadOnly_alergia_ = false;
           unset($this->nmgp_cmp_readonly['alergia_']);
           $sStyleReadLab_alergia_ = '';
           $sStyleReadInp_alergia_ = 'display: none;';
       }
       $this->tipo_alergia_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['tipo_alergia_']; 
       $tipo_alergia_ = $this->tipo_alergia_; 
       $sStyleHidden_tipo_alergia_ = '';
       if (isset($sCheckRead_tipo_alergia_))
       {
           unset($sCheckRead_tipo_alergia_);
       }
       if (isset($this->nmgp_cmp_readonly['tipo_alergia_']))
       {
           $sCheckRead_tipo_alergia_ = $this->nmgp_cmp_readonly['tipo_alergia_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipo_alergia_']) && $this->nmgp_cmp_hidden['tipo_alergia_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipo_alergia_']);
           $sStyleHidden_tipo_alergia_ = 'display: none;';
       }
       $bTestReadOnly_tipo_alergia_ = true;
       $sStyleReadLab_tipo_alergia_ = 'display: none;';
       $sStyleReadInp_tipo_alergia_ = '';
       if (isset($this->nmgp_cmp_readonly['tipo_alergia_']) && $this->nmgp_cmp_readonly['tipo_alergia_'] == 'on')
       {
           $bTestReadOnly_tipo_alergia_ = false;
           unset($this->nmgp_cmp_readonly['tipo_alergia_']);
           $sStyleReadLab_tipo_alergia_ = '';
           $sStyleReadInp_tipo_alergia_ = 'display: none;';
       }
       $this->id_usuario_ = $this->form_vert_form_triagem_pront[$sc_seq_vert]['id_usuario_']; 
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_triagem_pront_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_triagem_pront_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_triagem_pront_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_triagem_pront_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_triagem_pront_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_triagem_pront_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
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

   <?php if (isset($this->nmgp_cmp_hidden['data_']) && $this->nmgp_cmp_hidden['data_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="data_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($data_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_data__line" id="hidden_field_data_data_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_data_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_data__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="data_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($data_); ?>"><span id="id_ajax_label_data_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($data_); ?></span>
<?php
$tmp_form_data = $this->field_config['data_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_data_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_data_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['hora_']) && $this->nmgp_cmp_hidden['hora_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hora_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_hora__line" id="hidden_field_data_hora_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_hora_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_hora__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="hora_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hora_); ?>"><span id="id_ajax_label_hora_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($hora_); ?></span>
<?php
$tmp_form_data = $this->field_config['hora_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hora_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hora_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pa_']) && $this->nmgp_cmp_hidden['pa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pa__line" id="hidden_field_data_pa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pa_"]) &&  $this->nmgp_cmp_readonly["pa_"] == "on") { 

 ?>
<input type="hidden" name="pa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pa_) . "\">" . $pa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pa_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pa_<?php echo $sc_seq_vert ?> css_pa__line" style="<?php echo $sStyleReadLab_pa_; ?>"><?php echo $this->form_encode_input($this->pa_); ?></span><span id="id_read_off_pa_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pa_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pa__obj" style="" id="id_sc_field_pa_<?php echo $sc_seq_vert ?>" type=text name="pa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pa_) ?>"
 size=5 maxlength=11 alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("abcdefghijklmnopqrstuvwxyz0123456789") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['fc_']) && $this->nmgp_cmp_hidden['fc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_fc__line" id="hidden_field_data_fc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_fc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_fc__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_fc_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fc_"]) &&  $this->nmgp_cmp_readonly["fc_"] == "on") { 

 ?>
<input type="hidden" name="fc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fc_) . "\">" . $fc_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fc_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-fc_<?php echo $sc_seq_vert ?> css_fc__line" style="<?php echo $sStyleReadLab_fc_; ?>"><?php echo $this->form_encode_input($this->fc_); ?></span><span id="id_read_off_fc_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fc_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_fc__obj" style="" id="id_sc_field_fc_<?php echo $sc_seq_vert ?>" type=text name="fc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fc_) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['fc_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['fc_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['fr_']) && $this->nmgp_cmp_hidden['fr_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fr_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fr_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_fr__line" id="hidden_field_data_fr_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_fr_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_fr__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_fr_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fr_"]) &&  $this->nmgp_cmp_readonly["fr_"] == "on") { 

 ?>
<input type="hidden" name="fr_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fr_) . "\">" . $fr_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fr_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-fr_<?php echo $sc_seq_vert ?> css_fr__line" style="<?php echo $sStyleReadLab_fr_; ?>"><?php echo $this->form_encode_input($this->fr_); ?></span><span id="id_read_off_fr_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fr_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_fr__obj" style="" id="id_sc_field_fr_<?php echo $sc_seq_vert ?>" type=text name="fr_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fr_) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['fr_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['fr_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fr_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fr_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tc_']) && $this->nmgp_cmp_hidden['tc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tc__line" id="hidden_field_data_tc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tc__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tc_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tc_"]) &&  $this->nmgp_cmp_readonly["tc_"] == "on") { 

 ?>
<input type="hidden" name="tc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tc_) . "\">" . $tc_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tc_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-tc_<?php echo $sc_seq_vert ?> css_tc__line" style="<?php echo $sStyleReadLab_tc_; ?>"><?php echo $this->form_encode_input($this->tc_); ?></span><span id="id_read_off_tc_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tc_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_tc__obj" style="" id="id_sc_field_tc_<?php echo $sc_seq_vert ?>" type=text name="tc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tc_) ?>"
 size=5 maxlength=12 alt="{datatype: 'text', maxLength: 12, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789,") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['hgt_']) && $this->nmgp_cmp_hidden['hgt_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="hgt_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hgt_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_hgt__line" id="hidden_field_data_hgt_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_hgt_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_hgt__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_hgt_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hgt_"]) &&  $this->nmgp_cmp_readonly["hgt_"] == "on") { 

 ?>
<input type="hidden" name="hgt_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hgt_) . "\">" . $hgt_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_hgt_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-hgt_<?php echo $sc_seq_vert ?> css_hgt__line" style="<?php echo $sStyleReadLab_hgt_; ?>"><?php echo $this->form_encode_input($this->hgt_); ?></span><span id="id_read_off_hgt_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_hgt_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_hgt__obj" style="" id="id_sc_field_hgt_<?php echo $sc_seq_vert ?>" type=text name="hgt_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hgt_) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['hgt_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['hgt_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hgt_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hgt_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['peso_']) && $this->nmgp_cmp_hidden['peso_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="peso_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($peso_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_peso__line" id="hidden_field_data_peso_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_peso_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_peso__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_peso_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["peso_"]) &&  $this->nmgp_cmp_readonly["peso_"] == "on") { 

 ?>
<input type="hidden" name="peso_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($peso_) . "\">" . $peso_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_peso_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-peso_<?php echo $sc_seq_vert ?> css_peso__line" style="<?php echo $sStyleReadLab_peso_; ?>"><?php echo $this->form_encode_input($this->peso_); ?></span><span id="id_read_off_peso_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_peso_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_peso__obj" style="" id="id_sc_field_peso_<?php echo $sc_seq_vert ?>" type=text name="peso_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($peso_) ?>"
 size=5 maxlength=12 alt="{datatype: 'text', maxLength: 12, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789,") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_peso_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_peso_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['altura_']) && $this->nmgp_cmp_hidden['altura_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="altura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($altura_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_altura__line" id="hidden_field_data_altura_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_altura_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_altura__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_altura_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["altura_"]) &&  $this->nmgp_cmp_readonly["altura_"] == "on") { 

 ?>
<input type="hidden" name="altura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($altura_) . "\">" . $altura_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_altura_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-altura_<?php echo $sc_seq_vert ?> css_altura__line" style="<?php echo $sStyleReadLab_altura_; ?>"><?php echo $this->form_encode_input($this->altura_); ?></span><span id="id_read_off_altura_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_altura_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_altura__obj" style="" id="id_sc_field_altura_<?php echo $sc_seq_vert ?>" type=text name="altura_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($altura_) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['altura_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['altura_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_altura_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_altura_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['coren_']) && $this->nmgp_cmp_hidden['coren_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="coren_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($coren_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_coren__line" id="hidden_field_data_coren_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_coren_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_coren__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="coren_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($coren_); ?>"><span id="id_ajax_label_coren_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($coren_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_coren_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_coren_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['alergia_']) && $this->nmgp_cmp_hidden['alergia_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="alergia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($alergia_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_alergia__line" id="hidden_field_data_alergia_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_alergia_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_alergia__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_alergia_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["alergia_"]) &&  $this->nmgp_cmp_readonly["alergia_"] == "on") { 

 if ("sim" == $this->alergia_) { $alergia__look = "Sim";} 
 if ("nao" == $this->alergia_) { $alergia__look = "Não";} 
?>
<input type="hidden" name="alergia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($alergia_) . "\">" . $alergia__look . ""; ?>
<?php } else { ?>

<?php

 if ("sim" == $this->alergia_) { $alergia__look = "Sim";} 
 if ("nao" == $this->alergia_) { $alergia__look = "Não";} 
?>
<span id="id_read_on_alergia_<?php echo $sc_seq_vert ; ?>"  class="css_alergia__line" style="<?php echo $sStyleReadLab_alergia_; ?>"><?php echo $this->form_encode_input($alergia__look); ?></span><span id="id_read_off_alergia_<?php echo $sc_seq_vert ; ?>" style="<?php echo $sStyleReadInp_alergia_; ?>"><div id="idAjaxRadio_alergia_<?php echo $sc_seq_vert ; ?>" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOddMult css_alergia__line">    <input style="float:left; position:relative; top: -3px;" type=radio name="alergia_<?php echo $sc_seq_vert ?>" value="sim"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_alergia_'][] = 'sim'; ?>
<?php  if ("sim" == $this->alergia_)  { echo " checked" ;} ?>  onClick="do_ajax_form_triagem_pront_event_alergia__onclick(<?php echo $sc_seq_vert; ?>);" >Sim</TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_alergia__line">    <input style="float:left; position:relative; top: -3px;" type=radio name="alergia_<?php echo $sc_seq_vert ?>" value="nao"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_alergia_'][] = 'nao'; ?>
<?php  if ("nao" == $this->alergia_)  { echo " checked" ;} ?><?php  if (empty($this->alergia_)) { echo " checked" ;} ?>  onClick="do_ajax_form_triagem_pront_event_alergia__onclick(<?php echo $sc_seq_vert; ?>);" >Não</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_alergia_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_alergia_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_alergia_']) && $this->nmgp_cmp_hidden['tipo_alergia_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipo_alergia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_alergia_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tipo_alergia__line" id="hidden_field_data_tipo_alergia_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipo_alergia_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipo_alergia__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipo_alergia_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_alergia_"]) &&  $this->nmgp_cmp_readonly["tipo_alergia_"] == "on") { 

 ?>
<input type="hidden" name="tipo_alergia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_alergia_) . "\">" . $tipo_alergia_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipo_alergia_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-tipo_alergia_<?php echo $sc_seq_vert ?> css_tipo_alergia__line" style="<?php echo $sStyleReadLab_tipo_alergia_; ?>"><?php echo $this->form_encode_input($this->tipo_alergia_); ?></span><span id="id_read_off_tipo_alergia_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipo_alergia_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_tipo_alergia__obj" style="" id="id_sc_field_tipo_alergia_<?php echo $sc_seq_vert ?>" type=text name="tipo_alergia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_alergia_) ?>"
 size=50 maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_alergia_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_alergia_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_usuario_']) && $this->nmgp_cmp_hidden['id_usuario_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_usuario_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_usuario__line" id="hidden_field_data_id_usuario_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_usuario_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_usuario__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_usuario_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_usuario_"]) &&  $this->nmgp_cmp_readonly["id_usuario_"] == "on") { 
 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_'] = array(); 
    }

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
   $x = 0; 
   $id_usuario__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_usuario__1))
          {
              foreach ($this->id_usuario__1 as $tmp_id_usuario_)
              {
                  if (trim($tmp_id_usuario_) === trim($cadaselect[1])) { $id_usuario__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_usuario_) === trim($cadaselect[1])) { $id_usuario__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_usuario_) . "\">" . $id_usuario__look . ""; ?>
<?php } else { ?>
 
<?php  
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['Lookup_id_usuario_'] = array(); 
    }

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
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $id_usuario__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_usuario__1))
          {
              foreach ($this->id_usuario__1 as $tmp_id_usuario_)
              {
                  if (trim($tmp_id_usuario_) === trim($cadaselect[1])) { $id_usuario__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_usuario_) === trim($cadaselect[1])) { $id_usuario__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_usuario__look))
          {
              $id_usuario__look = $this->id_usuario_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_usuario_" . $sc_seq_vert . "\" class=\"css_id_usuario__line\" style=\"" .  $sStyleReadLab_id_usuario_ . "\">" . $this->form_encode_input($id_usuario__look) . "</span><span id=\"id_read_off_id_usuario_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_id_usuario_ . "\">";
   echo " <span id=\"idAjaxSelect_id_usuario_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_usuario__obj\" style=\"\" id=\"id_sc_field_id_usuario_" . $sc_seq_vert . "\" name=\"id_usuario_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_usuario_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_usuario_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_usuario_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_usuario_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_id_paciente_))
       {
           $this->nmgp_cmp_readonly['id_paciente_'] = $sCheckRead_id_paciente_;
       }
       if ('display: none;' == $sStyleHidden_id_paciente_)
       {
           $this->nmgp_cmp_hidden['id_paciente_'] = 'off';
       }
       if (isset($sCheckRead_data_))
       {
           $this->nmgp_cmp_readonly['data_'] = $sCheckRead_data_;
       }
       if ('display: none;' == $sStyleHidden_data_)
       {
           $this->nmgp_cmp_hidden['data_'] = 'off';
       }
       if (isset($sCheckRead_hora_))
       {
           $this->nmgp_cmp_readonly['hora_'] = $sCheckRead_hora_;
       }
       if ('display: none;' == $sStyleHidden_hora_)
       {
           $this->nmgp_cmp_hidden['hora_'] = 'off';
       }
       if (isset($sCheckRead_pa_))
       {
           $this->nmgp_cmp_readonly['pa_'] = $sCheckRead_pa_;
       }
       if ('display: none;' == $sStyleHidden_pa_)
       {
           $this->nmgp_cmp_hidden['pa_'] = 'off';
       }
       if (isset($sCheckRead_fc_))
       {
           $this->nmgp_cmp_readonly['fc_'] = $sCheckRead_fc_;
       }
       if ('display: none;' == $sStyleHidden_fc_)
       {
           $this->nmgp_cmp_hidden['fc_'] = 'off';
       }
       if (isset($sCheckRead_fr_))
       {
           $this->nmgp_cmp_readonly['fr_'] = $sCheckRead_fr_;
       }
       if ('display: none;' == $sStyleHidden_fr_)
       {
           $this->nmgp_cmp_hidden['fr_'] = 'off';
       }
       if (isset($sCheckRead_tc_))
       {
           $this->nmgp_cmp_readonly['tc_'] = $sCheckRead_tc_;
       }
       if ('display: none;' == $sStyleHidden_tc_)
       {
           $this->nmgp_cmp_hidden['tc_'] = 'off';
       }
       if (isset($sCheckRead_hgt_))
       {
           $this->nmgp_cmp_readonly['hgt_'] = $sCheckRead_hgt_;
       }
       if ('display: none;' == $sStyleHidden_hgt_)
       {
           $this->nmgp_cmp_hidden['hgt_'] = 'off';
       }
       if (isset($sCheckRead_peso_))
       {
           $this->nmgp_cmp_readonly['peso_'] = $sCheckRead_peso_;
       }
       if ('display: none;' == $sStyleHidden_peso_)
       {
           $this->nmgp_cmp_hidden['peso_'] = 'off';
       }
       if (isset($sCheckRead_altura_))
       {
           $this->nmgp_cmp_readonly['altura_'] = $sCheckRead_altura_;
       }
       if ('display: none;' == $sStyleHidden_altura_)
       {
           $this->nmgp_cmp_hidden['altura_'] = 'off';
       }
       if (isset($sCheckRead_coren_))
       {
           $this->nmgp_cmp_readonly['coren_'] = $sCheckRead_coren_;
       }
       if ('display: none;' == $sStyleHidden_coren_)
       {
           $this->nmgp_cmp_hidden['coren_'] = 'off';
       }
       if (isset($sCheckRead_alergia_))
       {
           $this->nmgp_cmp_readonly['alergia_'] = $sCheckRead_alergia_;
       }
       if ('display: none;' == $sStyleHidden_alergia_)
       {
           $this->nmgp_cmp_hidden['alergia_'] = 'off';
       }
       if (isset($sCheckRead_tipo_alergia_))
       {
           $this->nmgp_cmp_readonly['tipo_alergia_'] = $sCheckRead_tipo_alergia_;
       }
       if ('display: none;' == $sStyleHidden_tipo_alergia_)
       {
           $this->nmgp_cmp_hidden['tipo_alergia_'] = 'off';
       }
       if (isset($sCheckRead_id_usuario_))
       {
           $this->nmgp_cmp_readonly['id_usuario_'] = $sCheckRead_id_usuario_;
       }
       if ('display: none;' == $sStyleHidden_id_usuario_)
       {
           $this->nmgp_cmp_hidden['id_usuario_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_triagem_pront = $guarda_form_vert_form_triagem_pront;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_iframe'] != "R")
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['masterValue']))
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
 parent.scAjaxDetailStatus("form_triagem_pront");
 parent.scAjaxDetailHeight("form_triagem_pront", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_triagem_pront", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_triagem_pront", <?php echo $sTamanhoIframe; ?>);
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
