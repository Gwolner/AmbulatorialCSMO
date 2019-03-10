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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Cadastrar atendimento"); } else { echo strip_tags("Atualizar atendimento"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
header("X-XSS-Protection: 0");
?>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_atendimento/form_atendimento_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_atendimento_sajax_js.php");
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
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_atendimento_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['recarga'];
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
 include_once("form_atendimento_js0.php");
?>
<script type="text/javascript"> 
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
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>"> 
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" /> 
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_atendimento'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_atendimento'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Cadastrar atendimento"; } else { echo "Atualizar atendimento"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "R")
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['empty_filter'] = true;
       }
  }
  else
  {
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_servico']))
   {
       $this->nm_new_label['tipo_servico'] = "Tipo de Servico";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_servico = $this->tipo_servico;
   $sStyleHidden_tipo_servico = '';
   if (isset($this->nmgp_cmp_hidden['tipo_servico']) && $this->nmgp_cmp_hidden['tipo_servico'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_servico']);
       $sStyleHidden_tipo_servico = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_servico = 'display: none;';
   $sStyleReadInp_tipo_servico = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_servico']) && $this->nmgp_cmp_readonly['tipo_servico'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_servico']);
       $sStyleReadLab_tipo_servico = '';
       $sStyleReadInp_tipo_servico = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_servico']) && $this->nmgp_cmp_hidden['tipo_servico'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_servico" value="<?php echo $this->form_encode_input($this->tipo_servico) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_servico_label" id="hidden_field_label_tipo_servico" style="<?php echo $sStyleHidden_tipo_servico; ?>"><span id="id_label_tipo_servico"><?php echo $this->nm_new_label['tipo_servico']; ?></span></TD>
    <TD class="scFormDataOdd css_tipo_servico_line" id="hidden_field_data_tipo_servico" style="<?php echo $sStyleHidden_tipo_servico; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_servico_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_servico"]) &&  $this->nmgp_cmp_readonly["tipo_servico"] == "on") { 

$tipo_servico_look = "";
 if ($this->tipo_servico == "Serviço de Enfermagem") { $tipo_servico_look .= "Serviço de Enfermagem" ;} 
 if ($this->tipo_servico == "Serviço Médico") { $tipo_servico_look .= "Serviço Médico" ;} 
 if ($this->tipo_servico == "Serviço Odontológico") { $tipo_servico_look .= "Serviço Odontológico" ;} 
 if (empty($tipo_servico_look)) { $tipo_servico_look = $this->tipo_servico; }
?>
<input type="hidden" name="tipo_servico" value="<?php echo $this->form_encode_input($tipo_servico) . "\">" . $tipo_servico_look . ""; ?>
<?php } else { ?>
<?php

$tipo_servico_look = "";
 if ($this->tipo_servico == "Serviço de Enfermagem") { $tipo_servico_look .= "Serviço de Enfermagem" ;} 
 if ($this->tipo_servico == "Serviço Médico") { $tipo_servico_look .= "Serviço Médico" ;} 
 if ($this->tipo_servico == "Serviço Odontológico") { $tipo_servico_look .= "Serviço Odontológico" ;} 
 if (empty($tipo_servico_look)) { $tipo_servico_look = $this->tipo_servico; }
?>
<span id="id_read_on_tipo_servico" class="css_tipo_servico_line"  style="<?php echo $sStyleReadLab_tipo_servico; ?>"><?php echo $this->form_encode_input($tipo_servico_look); ?></span><span id="id_read_off_tipo_servico" style="<?php echo $sStyleReadInp_tipo_servico; ?>">
 <span id="idAjaxSelect_tipo_servico"><select class="sc-js-input scFormObjectOdd css_tipo_servico_obj" style="" id="id_sc_field_tipo_servico" name="tipo_servico" size="1" alt="{type: 'select', enterTab: false}">
 <option value="Serviço de Enfermagem" <?php  if ($this->tipo_servico == "Serviço de Enfermagem") { echo " selected" ;} ?><?php  if (empty($this->tipo_servico)) { echo " selected" ;} ?>>Serviço de Enfermagem</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_tipo_servico'][] = 'Serviço de Enfermagem'; ?>
 <option value="Serviço Médico" <?php  if ($this->tipo_servico == "Serviço Médico") { echo " selected" ;} ?>>Serviço Médico</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_tipo_servico'][] = 'Serviço Médico'; ?>
 <option value="Serviço Odontológico" <?php  if ($this->tipo_servico == "Serviço Odontológico") { echo " selected" ;} ?>>Serviço Odontológico</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_tipo_servico'][] = 'Serviço Odontológico'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_servico_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_servico_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['procedimento_enfermagem']))
   {
       $this->nm_new_label['procedimento_enfermagem'] = "Procedimento";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $procedimento_enfermagem = $this->procedimento_enfermagem;
   $sStyleHidden_procedimento_enfermagem = '';
   if (isset($this->nmgp_cmp_hidden['procedimento_enfermagem']) && $this->nmgp_cmp_hidden['procedimento_enfermagem'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['procedimento_enfermagem']);
       $sStyleHidden_procedimento_enfermagem = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_procedimento_enfermagem = 'display: none;';
   $sStyleReadInp_procedimento_enfermagem = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['procedimento_enfermagem']) && $this->nmgp_cmp_readonly['procedimento_enfermagem'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['procedimento_enfermagem']);
       $sStyleReadLab_procedimento_enfermagem = '';
       $sStyleReadInp_procedimento_enfermagem = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['procedimento_enfermagem']) && $this->nmgp_cmp_hidden['procedimento_enfermagem'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="procedimento_enfermagem" value="<?php echo $this->form_encode_input($this->procedimento_enfermagem) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_procedimento_enfermagem_label" id="hidden_field_label_procedimento_enfermagem" style="<?php echo $sStyleHidden_procedimento_enfermagem; ?>"><span id="id_label_procedimento_enfermagem"><?php echo $this->nm_new_label['procedimento_enfermagem']; ?></span></TD>
    <TD class="scFormDataOdd css_procedimento_enfermagem_line" id="hidden_field_data_procedimento_enfermagem" style="<?php echo $sStyleHidden_procedimento_enfermagem; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_procedimento_enfermagem_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["procedimento_enfermagem"]) &&  $this->nmgp_cmp_readonly["procedimento_enfermagem"] == "on") { 

$procedimento_enfermagem_look = "";
 if ($this->procedimento_enfermagem == "Administração de Medicamentos") { $procedimento_enfermagem_look .= "Administração de Medicamentos" ;} 
 if ($this->procedimento_enfermagem == "Aferição de Pressão Arterial") { $procedimento_enfermagem_look .= "Aferição de Pressão Arterial" ;} 
 if ($this->procedimento_enfermagem == "Aferição de Temperatura") { $procedimento_enfermagem_look .= "Aferição de Temperatura" ;} 
 if ($this->procedimento_enfermagem == "Altura") { $procedimento_enfermagem_look .= "Altura" ;} 
 if ($this->procedimento_enfermagem == "Aplicação de Insulina") { $procedimento_enfermagem_look .= "Aplicação de Insulina" ;} 
 if ($this->procedimento_enfermagem == "Corpo Estranho") { $procedimento_enfermagem_look .= "Corpo Estranho" ;} 
 if ($this->procedimento_enfermagem == "Crioterapia") { $procedimento_enfermagem_look .= "Crioterapia" ;} 
 if ($this->procedimento_enfermagem == "Curativo") { $procedimento_enfermagem_look .= "Curativo" ;} 
 if ($this->procedimento_enfermagem == "Encaminhamento ao Pronto Atendimento") { $procedimento_enfermagem_look .= "Encaminhamento ao Pronto Atendimento" ;} 
 if ($this->procedimento_enfermagem == "Exame") { $procedimento_enfermagem_look .= "Exame" ;} 
 if ($this->procedimento_enfermagem == "Lavagem Ocular") { $procedimento_enfermagem_look .= "Lavagem Ocular" ;} 
 if ($this->procedimento_enfermagem == "Orientação") { $procedimento_enfermagem_look .= "Orientação" ;} 
 if ($this->procedimento_enfermagem == "Outros") { $procedimento_enfermagem_look .= "Outros" ;} 
 if ($this->procedimento_enfermagem == "Peso") { $procedimento_enfermagem_look .= "Peso" ;} 
 if ($this->procedimento_enfermagem == "Repouso") { $procedimento_enfermagem_look .= "Repouso" ;} 
 if ($this->procedimento_enfermagem == "Retirada de Ponto") { $procedimento_enfermagem_look .= "Retirada de Ponto" ;} 
 if (empty($procedimento_enfermagem_look)) { $procedimento_enfermagem_look = $this->procedimento_enfermagem; }
?>
<input type="hidden" name="procedimento_enfermagem" value="<?php echo $this->form_encode_input($procedimento_enfermagem) . "\">" . $procedimento_enfermagem_look . ""; ?>
<?php } else { ?>
<?php

$procedimento_enfermagem_look = "";
 if ($this->procedimento_enfermagem == "Administração de Medicamentos") { $procedimento_enfermagem_look .= "Administração de Medicamentos" ;} 
 if ($this->procedimento_enfermagem == "Aferição de Pressão Arterial") { $procedimento_enfermagem_look .= "Aferição de Pressão Arterial" ;} 
 if ($this->procedimento_enfermagem == "Aferição de Temperatura") { $procedimento_enfermagem_look .= "Aferição de Temperatura" ;} 
 if ($this->procedimento_enfermagem == "Altura") { $procedimento_enfermagem_look .= "Altura" ;} 
 if ($this->procedimento_enfermagem == "Aplicação de Insulina") { $procedimento_enfermagem_look .= "Aplicação de Insulina" ;} 
 if ($this->procedimento_enfermagem == "Corpo Estranho") { $procedimento_enfermagem_look .= "Corpo Estranho" ;} 
 if ($this->procedimento_enfermagem == "Crioterapia") { $procedimento_enfermagem_look .= "Crioterapia" ;} 
 if ($this->procedimento_enfermagem == "Curativo") { $procedimento_enfermagem_look .= "Curativo" ;} 
 if ($this->procedimento_enfermagem == "Encaminhamento ao Pronto Atendimento") { $procedimento_enfermagem_look .= "Encaminhamento ao Pronto Atendimento" ;} 
 if ($this->procedimento_enfermagem == "Exame") { $procedimento_enfermagem_look .= "Exame" ;} 
 if ($this->procedimento_enfermagem == "Lavagem Ocular") { $procedimento_enfermagem_look .= "Lavagem Ocular" ;} 
 if ($this->procedimento_enfermagem == "Orientação") { $procedimento_enfermagem_look .= "Orientação" ;} 
 if ($this->procedimento_enfermagem == "Outros") { $procedimento_enfermagem_look .= "Outros" ;} 
 if ($this->procedimento_enfermagem == "Peso") { $procedimento_enfermagem_look .= "Peso" ;} 
 if ($this->procedimento_enfermagem == "Repouso") { $procedimento_enfermagem_look .= "Repouso" ;} 
 if ($this->procedimento_enfermagem == "Retirada de Ponto") { $procedimento_enfermagem_look .= "Retirada de Ponto" ;} 
 if (empty($procedimento_enfermagem_look)) { $procedimento_enfermagem_look = $this->procedimento_enfermagem; }
?>
<span id="id_read_on_procedimento_enfermagem" class="css_procedimento_enfermagem_line"  style="<?php echo $sStyleReadLab_procedimento_enfermagem; ?>"><?php echo $this->form_encode_input($procedimento_enfermagem_look); ?></span><span id="id_read_off_procedimento_enfermagem" style="<?php echo $sStyleReadInp_procedimento_enfermagem; ?>">
 <span id="idAjaxSelect_procedimento_enfermagem"><select class="sc-js-input scFormObjectOdd css_procedimento_enfermagem_obj" style="" id="id_sc_field_procedimento_enfermagem" name="procedimento_enfermagem" size="1" alt="{type: 'select', enterTab: false}">
 <option value="Administração de Medicamentos" <?php  if ($this->procedimento_enfermagem == "Administração de Medicamentos") { echo " selected" ;} ?>>Administração de Medicamentos</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Administração de Medicamentos'; ?>
 <option value="Aferição de Pressão Arterial" <?php  if ($this->procedimento_enfermagem == "Aferição de Pressão Arterial") { echo " selected" ;} ?><?php  if (empty($this->procedimento_enfermagem)) { echo " selected" ;} ?>>Aferição de Pressão Arterial</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Aferição de Pressão Arterial'; ?>
 <option value="Aferição de Temperatura" <?php  if ($this->procedimento_enfermagem == "Aferição de Temperatura") { echo " selected" ;} ?>>Aferição de Temperatura</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Aferição de Temperatura'; ?>
 <option value="Altura" <?php  if ($this->procedimento_enfermagem == "Altura") { echo " selected" ;} ?>>Altura</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Altura'; ?>
 <option value="Aplicação de Insulina" <?php  if ($this->procedimento_enfermagem == "Aplicação de Insulina") { echo " selected" ;} ?>>Aplicação de Insulina</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Aplicação de Insulina'; ?>
 <option value="Corpo Estranho" <?php  if ($this->procedimento_enfermagem == "Corpo Estranho") { echo " selected" ;} ?>>Corpo Estranho</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Corpo Estranho'; ?>
 <option value="Crioterapia" <?php  if ($this->procedimento_enfermagem == "Crioterapia") { echo " selected" ;} ?>>Crioterapia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Crioterapia'; ?>
 <option value="Curativo" <?php  if ($this->procedimento_enfermagem == "Curativo") { echo " selected" ;} ?>>Curativo</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Curativo'; ?>
 <option value="Encaminhamento ao Pronto Atendimento" <?php  if ($this->procedimento_enfermagem == "Encaminhamento ao Pronto Atendimento") { echo " selected" ;} ?>>Encaminhamento ao Pronto Atendimento</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Encaminhamento ao Pronto Atendimento'; ?>
 <option value="Exame" <?php  if ($this->procedimento_enfermagem == "Exame") { echo " selected" ;} ?>>Exame</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Exame'; ?>
 <option value="Lavagem Ocular" <?php  if ($this->procedimento_enfermagem == "Lavagem Ocular") { echo " selected" ;} ?>>Lavagem Ocular</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Lavagem Ocular'; ?>
 <option value="Orientação" <?php  if ($this->procedimento_enfermagem == "Orientação") { echo " selected" ;} ?>>Orientação</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Orientação'; ?>
 <option value="Outros" <?php  if ($this->procedimento_enfermagem == "Outros") { echo " selected" ;} ?>>Outros</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Outros'; ?>
 <option value="Peso" <?php  if ($this->procedimento_enfermagem == "Peso") { echo " selected" ;} ?>>Peso</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Peso'; ?>
 <option value="Repouso" <?php  if ($this->procedimento_enfermagem == "Repouso") { echo " selected" ;} ?>>Repouso</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Repouso'; ?>
 <option value="Retirada de Ponto" <?php  if ($this->procedimento_enfermagem == "Retirada de Ponto") { echo " selected" ;} ?>>Retirada de Ponto</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_enfermagem'][] = 'Retirada de Ponto'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_procedimento_enfermagem_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_procedimento_enfermagem_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['procedimento_medico']))
   {
       $this->nm_new_label['procedimento_medico'] = "Procedimento";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $procedimento_medico = $this->procedimento_medico;
   $sStyleHidden_procedimento_medico = '';
   if (isset($this->nmgp_cmp_hidden['procedimento_medico']) && $this->nmgp_cmp_hidden['procedimento_medico'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['procedimento_medico']);
       $sStyleHidden_procedimento_medico = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_procedimento_medico = 'display: none;';
   $sStyleReadInp_procedimento_medico = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['procedimento_medico']) && $this->nmgp_cmp_readonly['procedimento_medico'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['procedimento_medico']);
       $sStyleReadLab_procedimento_medico = '';
       $sStyleReadInp_procedimento_medico = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['procedimento_medico']) && $this->nmgp_cmp_hidden['procedimento_medico'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="procedimento_medico" value="<?php echo $this->form_encode_input($this->procedimento_medico) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_procedimento_medico_label" id="hidden_field_label_procedimento_medico" style="<?php echo $sStyleHidden_procedimento_medico; ?>"><span id="id_label_procedimento_medico"><?php echo $this->nm_new_label['procedimento_medico']; ?></span></TD>
    <TD class="scFormDataOdd css_procedimento_medico_line" id="hidden_field_data_procedimento_medico" style="<?php echo $sStyleHidden_procedimento_medico; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_procedimento_medico_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["procedimento_medico"]) &&  $this->nmgp_cmp_readonly["procedimento_medico"] == "on") { 

$procedimento_medico_look = "";
 if ($this->procedimento_medico == "Consulta") { $procedimento_medico_look .= "Consulta" ;} 
 if ($this->procedimento_medico == "Exame Admissional") { $procedimento_medico_look .= "Exame Admissional" ;} 
 if ($this->procedimento_medico == "Homologação de Atestados (Alunos)") { $procedimento_medico_look .= "Homologação de Atestados (Alunos)" ;} 
 if ($this->procedimento_medico == "Licença Médica") { $procedimento_medico_look .= "Licença Médica" ;} 
 if ($this->procedimento_medico == "Outros") { $procedimento_medico_look .= "Outros" ;} 
 if ($this->procedimento_medico == "Perícia Domiciliar/Externa") { $procedimento_medico_look .= "Perícia Domiciliar/Externa" ;} 
 if ($this->procedimento_medico == "Perícia Médica") { $procedimento_medico_look .= "Perícia Médica" ;} 
 if (empty($procedimento_medico_look)) { $procedimento_medico_look = $this->procedimento_medico; }
?>
<input type="hidden" name="procedimento_medico" value="<?php echo $this->form_encode_input($procedimento_medico) . "\">" . $procedimento_medico_look . ""; ?>
<?php } else { ?>
<?php

$procedimento_medico_look = "";
 if ($this->procedimento_medico == "Consulta") { $procedimento_medico_look .= "Consulta" ;} 
 if ($this->procedimento_medico == "Exame Admissional") { $procedimento_medico_look .= "Exame Admissional" ;} 
 if ($this->procedimento_medico == "Homologação de Atestados (Alunos)") { $procedimento_medico_look .= "Homologação de Atestados (Alunos)" ;} 
 if ($this->procedimento_medico == "Licença Médica") { $procedimento_medico_look .= "Licença Médica" ;} 
 if ($this->procedimento_medico == "Outros") { $procedimento_medico_look .= "Outros" ;} 
 if ($this->procedimento_medico == "Perícia Domiciliar/Externa") { $procedimento_medico_look .= "Perícia Domiciliar/Externa" ;} 
 if ($this->procedimento_medico == "Perícia Médica") { $procedimento_medico_look .= "Perícia Médica" ;} 
 if (empty($procedimento_medico_look)) { $procedimento_medico_look = $this->procedimento_medico; }
?>
<span id="id_read_on_procedimento_medico" class="css_procedimento_medico_line"  style="<?php echo $sStyleReadLab_procedimento_medico; ?>"><?php echo $this->form_encode_input($procedimento_medico_look); ?></span><span id="id_read_off_procedimento_medico" style="<?php echo $sStyleReadInp_procedimento_medico; ?>">
 <span id="idAjaxSelect_procedimento_medico"><select class="sc-js-input scFormObjectOdd css_procedimento_medico_obj" style="" id="id_sc_field_procedimento_medico" name="procedimento_medico" size="1" alt="{type: 'select', enterTab: false}">
 <option value="Consulta" <?php  if ($this->procedimento_medico == "Consulta") { echo " selected" ;} ?><?php  if (empty($this->procedimento_medico)) { echo " selected" ;} ?>>Consulta</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_medico'][] = 'Consulta'; ?>
 <option value="Exame Admissional" <?php  if ($this->procedimento_medico == "Exame Admissional") { echo " selected" ;} ?>>Exame Admissional</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_medico'][] = 'Exame Admissional'; ?>
 <option value="Homologação de Atestados (Alunos)" <?php  if ($this->procedimento_medico == "Homologação de Atestados (Alunos)") { echo " selected" ;} ?>>Homologação de Atestados (Alunos)</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_medico'][] = 'Homologação de Atestados (Alunos)'; ?>
 <option value="Licença Médica" <?php  if ($this->procedimento_medico == "Licença Médica") { echo " selected" ;} ?>>Licença Médica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_medico'][] = 'Licença Médica'; ?>
 <option value="Outros" <?php  if ($this->procedimento_medico == "Outros") { echo " selected" ;} ?>>Outros</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_medico'][] = 'Outros'; ?>
 <option value="Perícia Domiciliar/Externa" <?php  if ($this->procedimento_medico == "Perícia Domiciliar/Externa") { echo " selected" ;} ?>>Perícia Domiciliar/Externa</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_medico'][] = 'Perícia Domiciliar/Externa'; ?>
 <option value="Perícia Médica" <?php  if ($this->procedimento_medico == "Perícia Médica") { echo " selected" ;} ?>>Perícia Médica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_medico'][] = 'Perícia Médica'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_procedimento_medico_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_procedimento_medico_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['procedimento_odontologico']))
   {
       $this->nm_new_label['procedimento_odontologico'] = "Procedimento";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $procedimento_odontologico = $this->procedimento_odontologico;
   $sStyleHidden_procedimento_odontologico = '';
   if (isset($this->nmgp_cmp_hidden['procedimento_odontologico']) && $this->nmgp_cmp_hidden['procedimento_odontologico'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['procedimento_odontologico']);
       $sStyleHidden_procedimento_odontologico = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_procedimento_odontologico = 'display: none;';
   $sStyleReadInp_procedimento_odontologico = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['procedimento_odontologico']) && $this->nmgp_cmp_readonly['procedimento_odontologico'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['procedimento_odontologico']);
       $sStyleReadLab_procedimento_odontologico = '';
       $sStyleReadInp_procedimento_odontologico = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['procedimento_odontologico']) && $this->nmgp_cmp_hidden['procedimento_odontologico'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="procedimento_odontologico" value="<?php echo $this->form_encode_input($this->procedimento_odontologico) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_procedimento_odontologico_label" id="hidden_field_label_procedimento_odontologico" style="<?php echo $sStyleHidden_procedimento_odontologico; ?>"><span id="id_label_procedimento_odontologico"><?php echo $this->nm_new_label['procedimento_odontologico']; ?></span></TD>
    <TD class="scFormDataOdd css_procedimento_odontologico_line" id="hidden_field_data_procedimento_odontologico" style="<?php echo $sStyleHidden_procedimento_odontologico; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_procedimento_odontologico_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["procedimento_odontologico"]) &&  $this->nmgp_cmp_readonly["procedimento_odontologico"] == "on") { 

$procedimento_odontologico_look = "";
 if ($this->procedimento_odontologico == "Anestesia") { $procedimento_odontologico_look .= "Anestesia" ;} 
 if ($this->procedimento_odontologico == "Atendido e Medicado") { $procedimento_odontologico_look .= "Atendido e Medicado" ;} 
 if ($this->procedimento_odontologico == "Atestado Dispensa") { $procedimento_odontologico_look .= "Atestado Dispensa" ;} 
 if ($this->procedimento_odontologico == "Consulta") { $procedimento_odontologico_look .= "Consulta" ;} 
 if ($this->procedimento_odontologico == "Curativo Endodôntico") { $procedimento_odontologico_look .= "Curativo Endodôntico" ;} 
 if ($this->procedimento_odontologico == "Drenagem Abscesso") { $procedimento_odontologico_look .= "Drenagem Abscesso" ;} 
 if ($this->procedimento_odontologico == "Exodontia") { $procedimento_odontologico_look .= "Exodontia" ;} 
 if ($this->procedimento_odontologico == "Flúor") { $procedimento_odontologico_look .= "Flúor" ;} 
 if ($this->procedimento_odontologico == "Obturação Canal") { $procedimento_odontologico_look .= "Obturação Canal" ;} 
 if ($this->procedimento_odontologico == "Orientação Higiene Oral") { $procedimento_odontologico_look .= "Orientação Higiene Oral" ;} 
 if ($this->procedimento_odontologico == "Outros") { $procedimento_odontologico_look .= "Outros" ;} 
 if ($this->procedimento_odontologico == "Perícia") { $procedimento_odontologico_look .= "Perícia" ;} 
 if ($this->procedimento_odontologico == "Profilaxia e Polimento Coronoradicular") { $procedimento_odontologico_look .= "Profilaxia e Polimento Coronoradicular" ;} 
 if ($this->procedimento_odontologico == "Pulcectomia") { $procedimento_odontologico_look .= "Pulcectomia" ;} 
 if ($this->procedimento_odontologico == "Pulpotomia") { $procedimento_odontologico_look .= "Pulpotomia" ;} 
 if ($this->procedimento_odontologico == "Radiografia") { $procedimento_odontologico_look .= "Radiografia" ;} 
 if ($this->procedimento_odontologico == "Remoção de Tártaro") { $procedimento_odontologico_look .= "Remoção de Tártaro" ;} 
 if ($this->procedimento_odontologico == "Restauração, Resina e Outros") { $procedimento_odontologico_look .= "Restauração, Resina e Outros" ;} 
 if ($this->procedimento_odontologico == "Selante") { $procedimento_odontologico_look .= "Selante" ;} 
 if ($this->procedimento_odontologico == "Sutura") { $procedimento_odontologico_look .= "Sutura" ;} 
 if ($this->procedimento_odontologico == "Tratamento Concluído") { $procedimento_odontologico_look .= "Tratamento Concluído" ;} 
 if ($this->procedimento_odontologico == "Tratamento Expectante") { $procedimento_odontologico_look .= "Tratamento Expectante" ;} 
 if (empty($procedimento_odontologico_look)) { $procedimento_odontologico_look = $this->procedimento_odontologico; }
?>
<input type="hidden" name="procedimento_odontologico" value="<?php echo $this->form_encode_input($procedimento_odontologico) . "\">" . $procedimento_odontologico_look . ""; ?>
<?php } else { ?>
<?php

$procedimento_odontologico_look = "";
 if ($this->procedimento_odontologico == "Anestesia") { $procedimento_odontologico_look .= "Anestesia" ;} 
 if ($this->procedimento_odontologico == "Atendido e Medicado") { $procedimento_odontologico_look .= "Atendido e Medicado" ;} 
 if ($this->procedimento_odontologico == "Atestado Dispensa") { $procedimento_odontologico_look .= "Atestado Dispensa" ;} 
 if ($this->procedimento_odontologico == "Consulta") { $procedimento_odontologico_look .= "Consulta" ;} 
 if ($this->procedimento_odontologico == "Curativo Endodôntico") { $procedimento_odontologico_look .= "Curativo Endodôntico" ;} 
 if ($this->procedimento_odontologico == "Drenagem Abscesso") { $procedimento_odontologico_look .= "Drenagem Abscesso" ;} 
 if ($this->procedimento_odontologico == "Exodontia") { $procedimento_odontologico_look .= "Exodontia" ;} 
 if ($this->procedimento_odontologico == "Flúor") { $procedimento_odontologico_look .= "Flúor" ;} 
 if ($this->procedimento_odontologico == "Obturação Canal") { $procedimento_odontologico_look .= "Obturação Canal" ;} 
 if ($this->procedimento_odontologico == "Orientação Higiene Oral") { $procedimento_odontologico_look .= "Orientação Higiene Oral" ;} 
 if ($this->procedimento_odontologico == "Outros") { $procedimento_odontologico_look .= "Outros" ;} 
 if ($this->procedimento_odontologico == "Perícia") { $procedimento_odontologico_look .= "Perícia" ;} 
 if ($this->procedimento_odontologico == "Profilaxia e Polimento Coronoradicular") { $procedimento_odontologico_look .= "Profilaxia e Polimento Coronoradicular" ;} 
 if ($this->procedimento_odontologico == "Pulcectomia") { $procedimento_odontologico_look .= "Pulcectomia" ;} 
 if ($this->procedimento_odontologico == "Pulpotomia") { $procedimento_odontologico_look .= "Pulpotomia" ;} 
 if ($this->procedimento_odontologico == "Radiografia") { $procedimento_odontologico_look .= "Radiografia" ;} 
 if ($this->procedimento_odontologico == "Remoção de Tártaro") { $procedimento_odontologico_look .= "Remoção de Tártaro" ;} 
 if ($this->procedimento_odontologico == "Restauração, Resina e Outros") { $procedimento_odontologico_look .= "Restauração, Resina e Outros" ;} 
 if ($this->procedimento_odontologico == "Selante") { $procedimento_odontologico_look .= "Selante" ;} 
 if ($this->procedimento_odontologico == "Sutura") { $procedimento_odontologico_look .= "Sutura" ;} 
 if ($this->procedimento_odontologico == "Tratamento Concluído") { $procedimento_odontologico_look .= "Tratamento Concluído" ;} 
 if ($this->procedimento_odontologico == "Tratamento Expectante") { $procedimento_odontologico_look .= "Tratamento Expectante" ;} 
 if (empty($procedimento_odontologico_look)) { $procedimento_odontologico_look = $this->procedimento_odontologico; }
?>
<span id="id_read_on_procedimento_odontologico" class="css_procedimento_odontologico_line"  style="<?php echo $sStyleReadLab_procedimento_odontologico; ?>"><?php echo $this->form_encode_input($procedimento_odontologico_look); ?></span><span id="id_read_off_procedimento_odontologico" style="<?php echo $sStyleReadInp_procedimento_odontologico; ?>">
 <span id="idAjaxSelect_procedimento_odontologico"><select class="sc-js-input scFormObjectOdd css_procedimento_odontologico_obj" style="" id="id_sc_field_procedimento_odontologico" name="procedimento_odontologico" size="1" alt="{type: 'select', enterTab: false}">
 <option value="Anestesia" <?php  if ($this->procedimento_odontologico == "Anestesia") { echo " selected" ;} ?>>Anestesia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Anestesia'; ?>
 <option value="Atendido e Medicado" <?php  if ($this->procedimento_odontologico == "Atendido e Medicado") { echo " selected" ;} ?>>Atendido e Medicado</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Atendido e Medicado'; ?>
 <option value="Atestado Dispensa" <?php  if ($this->procedimento_odontologico == "Atestado Dispensa") { echo " selected" ;} ?>>Atestado Dispensa</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Atestado Dispensa'; ?>
 <option value="Consulta" <?php  if ($this->procedimento_odontologico == "Consulta") { echo " selected" ;} ?><?php  if (empty($this->procedimento_odontologico)) { echo " selected" ;} ?>>Consulta</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Consulta'; ?>
 <option value="Curativo Endodôntico" <?php  if ($this->procedimento_odontologico == "Curativo Endodôntico") { echo " selected" ;} ?>>Curativo Endodôntico</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Curativo Endodôntico'; ?>
 <option value="Drenagem Abscesso" <?php  if ($this->procedimento_odontologico == "Drenagem Abscesso") { echo " selected" ;} ?>>Drenagem Abscesso</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Drenagem Abscesso'; ?>
 <option value="Exodontia" <?php  if ($this->procedimento_odontologico == "Exodontia") { echo " selected" ;} ?>>Exodontia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Exodontia'; ?>
 <option value="Flúor" <?php  if ($this->procedimento_odontologico == "Flúor") { echo " selected" ;} ?>>Flúor</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Flúor'; ?>
 <option value="Obturação Canal" <?php  if ($this->procedimento_odontologico == "Obturação Canal") { echo " selected" ;} ?>>Obturação Canal</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Obturação Canal'; ?>
 <option value="Orientação Higiene Oral" <?php  if ($this->procedimento_odontologico == "Orientação Higiene Oral") { echo " selected" ;} ?>>Orientação Higiene Oral</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Orientação Higiene Oral'; ?>
 <option value="Outros" <?php  if ($this->procedimento_odontologico == "Outros") { echo " selected" ;} ?>>Outros</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Outros'; ?>
 <option value="Perícia" <?php  if ($this->procedimento_odontologico == "Perícia") { echo " selected" ;} ?>>Perícia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Perícia'; ?>
 <option value="Profilaxia e Polimento Coronoradicular" <?php  if ($this->procedimento_odontologico == "Profilaxia e Polimento Coronoradicular") { echo " selected" ;} ?>>Profilaxia e Polimento Coronoradicular</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Profilaxia e Polimento Coronoradicular'; ?>
 <option value="Pulcectomia" <?php  if ($this->procedimento_odontologico == "Pulcectomia") { echo " selected" ;} ?>>Pulcectomia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Pulcectomia'; ?>
 <option value="Pulpotomia" <?php  if ($this->procedimento_odontologico == "Pulpotomia") { echo " selected" ;} ?>>Pulpotomia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Pulpotomia'; ?>
 <option value="Radiografia" <?php  if ($this->procedimento_odontologico == "Radiografia") { echo " selected" ;} ?>>Radiografia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Radiografia'; ?>
 <option value="Remoção de Tártaro" <?php  if ($this->procedimento_odontologico == "Remoção de Tártaro") { echo " selected" ;} ?>>Remoção de Tártaro</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Remoção de Tártaro'; ?>
 <option value="Restauração, Resina e Outros" <?php  if ($this->procedimento_odontologico == "Restauração, Resina e Outros") { echo " selected" ;} ?>>Restauração, Resina e Outros</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Restauração, Resina e Outros'; ?>
 <option value="Selante" <?php  if ($this->procedimento_odontologico == "Selante") { echo " selected" ;} ?>>Selante</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Selante'; ?>
 <option value="Sutura" <?php  if ($this->procedimento_odontologico == "Sutura") { echo " selected" ;} ?>>Sutura</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Sutura'; ?>
 <option value="Tratamento Concluído" <?php  if ($this->procedimento_odontologico == "Tratamento Concluído") { echo " selected" ;} ?>>Tratamento Concluído</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Tratamento Concluído'; ?>
 <option value="Tratamento Expectante" <?php  if ($this->procedimento_odontologico == "Tratamento Expectante") { echo " selected" ;} ?>>Tratamento Expectante</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_procedimento_odontologico'][] = 'Tratamento Expectante'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_procedimento_odontologico_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_procedimento_odontologico_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['procedimento']))
    {
        $this->nm_new_label['procedimento'] = "Procedimento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $procedimento = $this->procedimento;
   $sStyleHidden_procedimento = '';
   if (isset($this->nmgp_cmp_hidden['procedimento']) && $this->nmgp_cmp_hidden['procedimento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['procedimento']);
       $sStyleHidden_procedimento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_procedimento = 'display: none;';
   $sStyleReadInp_procedimento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['procedimento']) && $this->nmgp_cmp_readonly['procedimento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['procedimento']);
       $sStyleReadLab_procedimento = '';
       $sStyleReadInp_procedimento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['procedimento']) && $this->nmgp_cmp_hidden['procedimento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="procedimento" value="<?php echo $this->form_encode_input($procedimento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_procedimento_label" id="hidden_field_label_procedimento" style="<?php echo $sStyleHidden_procedimento; ?>"><span id="id_label_procedimento"><?php echo $this->nm_new_label['procedimento']; ?></span></TD>
    <TD class="scFormDataOdd css_procedimento_line" id="hidden_field_data_procedimento" style="<?php echo $sStyleHidden_procedimento; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_procedimento_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["procedimento"]) &&  $this->nmgp_cmp_readonly["procedimento"] == "on") { 

 ?>
<input type="hidden" name="procedimento" value="<?php echo $this->form_encode_input($procedimento) . "\">" . $procedimento . ""; ?>
<?php } else { ?>
<span id="id_read_on_procedimento" class="sc-ui-readonly-procedimento css_procedimento_line" style="<?php echo $sStyleReadLab_procedimento; ?>"><?php echo $this->form_encode_input($this->procedimento); ?></span><span id="id_read_off_procedimento" style="white-space: nowrap;<?php echo $sStyleReadInp_procedimento; ?>">
 <input class="sc-js-input scFormObjectOdd css_procedimento_obj" style="" id="id_sc_field_procedimento" type=text name="procedimento" value="<?php echo $this->form_encode_input($procedimento) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_procedimento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_procedimento_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_paciente']))
   {
       $this->nm_new_label['tipo_paciente'] = "Tipo de Paciente";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_paciente = $this->tipo_paciente;
   $sStyleHidden_tipo_paciente = '';
   if (isset($this->nmgp_cmp_hidden['tipo_paciente']) && $this->nmgp_cmp_hidden['tipo_paciente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_paciente']);
       $sStyleHidden_tipo_paciente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_paciente = 'display: none;';
   $sStyleReadInp_tipo_paciente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_paciente']) && $this->nmgp_cmp_readonly['tipo_paciente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_paciente']);
       $sStyleReadLab_tipo_paciente = '';
       $sStyleReadInp_tipo_paciente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_paciente']) && $this->nmgp_cmp_hidden['tipo_paciente'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_paciente" value="<?php echo $this->form_encode_input($this->tipo_paciente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo_paciente_label" id="hidden_field_label_tipo_paciente" style="<?php echo $sStyleHidden_tipo_paciente; ?>"><span id="id_label_tipo_paciente"><?php echo $this->nm_new_label['tipo_paciente']; ?></span></TD>
    <TD class="scFormDataOdd css_tipo_paciente_line" id="hidden_field_data_tipo_paciente" style="<?php echo $sStyleHidden_tipo_paciente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_paciente_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_paciente"]) &&  $this->nmgp_cmp_readonly["tipo_paciente"] == "on") { 

$tipo_paciente_look = "";
 if ($this->tipo_paciente == "aluno") { $tipo_paciente_look .= "Aluno" ;} 
 if ($this->tipo_paciente == "servidor") { $tipo_paciente_look .= "Servidor" ;} 
 if ($this->tipo_paciente == "servidor terceirizado") { $tipo_paciente_look .= "Servidor Terceirizado" ;} 
 if ($this->tipo_paciente == "visitante") { $tipo_paciente_look .= "Visitante" ;} 
 if (empty($tipo_paciente_look)) { $tipo_paciente_look = $this->tipo_paciente; }
?>
<input type="hidden" name="tipo_paciente" value="<?php echo $this->form_encode_input($tipo_paciente) . "\">" . $tipo_paciente_look . ""; ?>
<?php } else { ?>
<?php

$tipo_paciente_look = "";
 if ($this->tipo_paciente == "aluno") { $tipo_paciente_look .= "Aluno" ;} 
 if ($this->tipo_paciente == "servidor") { $tipo_paciente_look .= "Servidor" ;} 
 if ($this->tipo_paciente == "servidor terceirizado") { $tipo_paciente_look .= "Servidor Terceirizado" ;} 
 if ($this->tipo_paciente == "visitante") { $tipo_paciente_look .= "Visitante" ;} 
 if (empty($tipo_paciente_look)) { $tipo_paciente_look = $this->tipo_paciente; }
?>
<span id="id_read_on_tipo_paciente" class="css_tipo_paciente_line"  style="<?php echo $sStyleReadLab_tipo_paciente; ?>"><?php echo $this->form_encode_input($tipo_paciente_look); ?></span><span id="id_read_off_tipo_paciente" style="<?php echo $sStyleReadInp_tipo_paciente; ?>">
 <span id="idAjaxSelect_tipo_paciente"><select class="sc-js-input scFormObjectOdd css_tipo_paciente_obj" style="" id="id_sc_field_tipo_paciente" name="tipo_paciente" size="1" alt="{type: 'select', enterTab: false}">
 <option value="aluno" <?php  if ($this->tipo_paciente == "aluno") { echo " selected" ;} ?><?php  if (empty($this->tipo_paciente)) { echo " selected" ;} ?>>Aluno</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_tipo_paciente'][] = 'aluno'; ?>
 <option value="servidor" <?php  if ($this->tipo_paciente == "servidor") { echo " selected" ;} ?>>Servidor</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_tipo_paciente'][] = 'servidor'; ?>
 <option value="servidor terceirizado" <?php  if ($this->tipo_paciente == "servidor terceirizado") { echo " selected" ;} ?>>Servidor Terceirizado</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_tipo_paciente'][] = 'servidor terceirizado'; ?>
 <option value="visitante" <?php  if ($this->tipo_paciente == "visitante") { echo " selected" ;} ?>>Visitante</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['Lookup_tipo_paciente'][] = 'visitante'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_paciente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_paciente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['data_hora']))
    {
        $this->nm_new_label['data_hora'] = "Data Hora";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_data_hora = $this->data_hora;
   $this->data_hora .= ' ' . $this->data_hora_hora;
   $data_hora = $this->data_hora;
   $sStyleHidden_data_hora = '';
   if (isset($this->nmgp_cmp_hidden['data_hora']) && $this->nmgp_cmp_hidden['data_hora'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['data_hora']);
       $sStyleHidden_data_hora = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_data_hora = 'display: none;';
   $sStyleReadInp_data_hora = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['data_hora']) && $this->nmgp_cmp_readonly['data_hora'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['data_hora']);
       $sStyleReadLab_data_hora = '';
       $sStyleReadInp_data_hora = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['data_hora']) && $this->nmgp_cmp_hidden['data_hora'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="data_hora" value="<?php echo $this->form_encode_input($data_hora) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_data_hora_label" id="hidden_field_label_data_hora" style="<?php echo $sStyleHidden_data_hora; ?>"><span id="id_label_data_hora"><?php echo $this->nm_new_label['data_hora']; ?></span></TD>
    <TD class="scFormDataOdd css_data_hora_line" id="hidden_field_data_data_hora" style="<?php echo $sStyleHidden_data_hora; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_data_hora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["data_hora"]) &&  $this->nmgp_cmp_readonly["data_hora"] == "on") { 

 ?>
<input type="hidden" name="data_hora" value="<?php echo $this->form_encode_input($data_hora) . "\">" . $data_hora . ""; ?>
<?php } else { ?>
<span id="id_read_on_data_hora" class="sc-ui-readonly-data_hora css_data_hora_line" style="<?php echo $sStyleReadLab_data_hora; ?>"><?php echo $this->form_encode_input($data_hora); ?></span><span id="id_read_off_data_hora" style="white-space: nowrap;<?php echo $sStyleReadInp_data_hora; ?>">
 <input class="sc-js-input scFormObjectOdd css_data_hora_obj" style="" id="id_sc_field_data_hora" type=text name="data_hora" value="<?php echo $this->form_encode_input($data_hora) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['data_hora']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['data_hora']['date_format']; ?>', timeSep: '<?php echo $this->field_config['data_hora']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['data_hora']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<?php echo $tmp_form_data; ?></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_data_hora_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_data_hora_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->data_hora = $old_dt_data_hora;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
<?php
  }
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna_off", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
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
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['mostra_cab'] != "N"))
  {
?>
</td></tr> 
<tr><td><table width="100%"> 
<style>
#rod_col1 { margin:0px; padding: 3px 0 0 5px; float:left; overflow:hidden;}
#rod_col2 { margin:0px; padding: 3px 5px 0 0; float:right; overflow:hidden; text-align:right;}

</style>

<table style="width: 100%; height:20px;" cellpadding="0px" cellspacing="0px" class="scFormFooter">
    <tr>
        <td>
            <span class="scFormFooterFont" id="rod_col1"></span>
        </td>
        <td>
            <span class="scFormFooterFont" id="rod_col2"></span>
        </td>
    </tr>
</table><?php
  }
?>
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
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['masterValue']);
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
 parent.scAjaxDetailStatus("form_atendimento");
 parent.scAjaxDetailHeight("form_atendimento", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_atendimento", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_atendimento", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_atendimento']['sc_modal'])
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
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
</body> 
</html> 
