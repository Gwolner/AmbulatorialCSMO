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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Aluno"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - aluno"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_aluno_atualizacao/form_aluno_atualizacao_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_aluno_atualizacao_sajax_js.php");
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

include_once('form_aluno_atualizacao_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['recarga'];
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
 include_once("form_aluno_atualizacao_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_aluno_atualizacao'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_aluno_atualizacao'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Aluno"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - aluno"; } ?></span></td>
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['empty_filter'] = true;
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
    if (!isset($this->nm_new_label['matricula']))
    {
        $this->nm_new_label['matricula'] = "Matricula";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $matricula = $this->matricula;
   $sStyleHidden_matricula = '';
   if (isset($this->nmgp_cmp_hidden['matricula']) && $this->nmgp_cmp_hidden['matricula'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['matricula']);
       $sStyleHidden_matricula = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_matricula = 'display: none;';
   $sStyleReadInp_matricula = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['matricula']) && $this->nmgp_cmp_readonly['matricula'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['matricula']);
       $sStyleReadLab_matricula = '';
       $sStyleReadInp_matricula = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['matricula']) && $this->nmgp_cmp_hidden['matricula'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="matricula" value="<?php echo $this->form_encode_input($matricula) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_matricula_label" id="hidden_field_label_matricula" style="<?php echo $sStyleHidden_matricula; ?>"><span id="id_label_matricula"><?php echo $this->nm_new_label['matricula']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['php_cmp_required']['matricula']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['php_cmp_required']['matricula'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_matricula_line" id="hidden_field_data_matricula" style="<?php echo $sStyleHidden_matricula; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_matricula_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["matricula"]) &&  $this->nmgp_cmp_readonly["matricula"] == "on") { 

 ?>
<input type="hidden" name="matricula" value="<?php echo $this->form_encode_input($matricula) . "\">" . $matricula . ""; ?>
<?php } else { ?>
<span id="id_read_on_matricula" class="sc-ui-readonly-matricula css_matricula_line" style="<?php echo $sStyleReadLab_matricula; ?>"><?php echo $this->form_encode_input($this->matricula); ?></span><span id="id_read_off_matricula" style="white-space: nowrap;<?php echo $sStyleReadInp_matricula; ?>">
 <input class="sc-js-input scFormObjectOdd css_matricula_obj" style="" id="id_sc_field_matricula" type=text name="matricula" value="<?php echo $this->form_encode_input($matricula) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_matricula_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_matricula_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nome_responsavel']))
    {
        $this->nm_new_label['nome_responsavel'] = "Nome Responsavel";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nome_responsavel = $this->nome_responsavel;
   $sStyleHidden_nome_responsavel = '';
   if (isset($this->nmgp_cmp_hidden['nome_responsavel']) && $this->nmgp_cmp_hidden['nome_responsavel'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nome_responsavel']);
       $sStyleHidden_nome_responsavel = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nome_responsavel = 'display: none;';
   $sStyleReadInp_nome_responsavel = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nome_responsavel']) && $this->nmgp_cmp_readonly['nome_responsavel'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nome_responsavel']);
       $sStyleReadLab_nome_responsavel = '';
       $sStyleReadInp_nome_responsavel = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nome_responsavel']) && $this->nmgp_cmp_hidden['nome_responsavel'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nome_responsavel" value="<?php echo $this->form_encode_input($nome_responsavel) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nome_responsavel_label" id="hidden_field_label_nome_responsavel" style="<?php echo $sStyleHidden_nome_responsavel; ?>"><span id="id_label_nome_responsavel"><?php echo $this->nm_new_label['nome_responsavel']; ?></span></TD>
    <TD class="scFormDataOdd css_nome_responsavel_line" id="hidden_field_data_nome_responsavel" style="<?php echo $sStyleHidden_nome_responsavel; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nome_responsavel_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nome_responsavel"]) &&  $this->nmgp_cmp_readonly["nome_responsavel"] == "on") { 

 ?>
<input type="hidden" name="nome_responsavel" value="<?php echo $this->form_encode_input($nome_responsavel) . "\">" . $nome_responsavel . ""; ?>
<?php } else { ?>
<span id="id_read_on_nome_responsavel" class="sc-ui-readonly-nome_responsavel css_nome_responsavel_line" style="<?php echo $sStyleReadLab_nome_responsavel; ?>"><?php echo $this->form_encode_input($this->nome_responsavel); ?></span><span id="id_read_off_nome_responsavel" style="white-space: nowrap;<?php echo $sStyleReadInp_nome_responsavel; ?>">
 <input class="sc-js-input scFormObjectOdd css_nome_responsavel_obj" style="" id="id_sc_field_nome_responsavel" type=text name="nome_responsavel" value="<?php echo $this->form_encode_input($nome_responsavel) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nome_responsavel_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nome_responsavel_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_campus']))
   {
       $this->nm_new_label['id_campus'] = "Campus";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_campus = $this->id_campus;
   $sStyleHidden_id_campus = '';
   if (isset($this->nmgp_cmp_hidden['id_campus']) && $this->nmgp_cmp_hidden['id_campus'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_campus']);
       $sStyleHidden_id_campus = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_campus = 'display: none;';
   $sStyleReadInp_id_campus = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_campus']) && $this->nmgp_cmp_readonly['id_campus'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_campus']);
       $sStyleReadLab_id_campus = '';
       $sStyleReadInp_id_campus = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_campus']) && $this->nmgp_cmp_hidden['id_campus'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_campus" value="<?php echo $this->form_encode_input($this->id_campus) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_campus_label" id="hidden_field_label_id_campus" style="<?php echo $sStyleHidden_id_campus; ?>"><span id="id_label_id_campus"><?php echo $this->nm_new_label['id_campus']; ?></span></TD>
    <TD class="scFormDataOdd css_id_campus_line" id="hidden_field_data_id_campus" style="<?php echo $sStyleHidden_id_campus; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_campus_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_campus"]) &&  $this->nmgp_cmp_readonly["id_campus"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus'] = array(); 
    }

   $old_value_data_cadastro = $this->data_cadastro;
   $old_value_data_cadastro_hora = $this->data_cadastro_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_cadastro = $this->data_cadastro;
   $unformatted_value_data_cadastro_hora = $this->data_cadastro_hora;

   $nm_comando = "SELECT id_campus, nome_campi 
FROM campus 
ORDER BY nome_campi";

   $this->data_cadastro = $old_value_data_cadastro;
   $this->data_cadastro_hora = $old_value_data_cadastro_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus'][] = $rs->fields[0];
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
   $id_campus_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_campus_1))
          {
              foreach ($this->id_campus_1 as $tmp_id_campus)
              {
                  if (trim($tmp_id_campus) === trim($cadaselect[1])) { $id_campus_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_campus) === trim($cadaselect[1])) { $id_campus_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_campus" value="<?php echo $this->form_encode_input($id_campus) . "\">" . $id_campus_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus'] = array(); 
    }

   $old_value_data_cadastro = $this->data_cadastro;
   $old_value_data_cadastro_hora = $this->data_cadastro_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_cadastro = $this->data_cadastro;
   $unformatted_value_data_cadastro_hora = $this->data_cadastro_hora;

   $nm_comando = "SELECT id_campus, nome_campi 
FROM campus 
ORDER BY nome_campi";

   $this->data_cadastro = $old_value_data_cadastro;
   $this->data_cadastro_hora = $old_value_data_cadastro_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_id_campus'][] = $rs->fields[0];
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
   $id_campus_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_campus_1))
          {
              foreach ($this->id_campus_1 as $tmp_id_campus)
              {
                  if (trim($tmp_id_campus) === trim($cadaselect[1])) { $id_campus_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_campus) === trim($cadaselect[1])) { $id_campus_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_campus_look))
          {
              $id_campus_look = $this->id_campus;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_campus\" class=\"css_id_campus_line\" style=\"" .  $sStyleReadLab_id_campus . "\">" . $this->form_encode_input($id_campus_look) . "</span><span id=\"id_read_off_id_campus\" style=\"" . $sStyleReadInp_id_campus . "\">";
   echo " <span id=\"idAjaxSelect_id_campus\"><select class=\"sc-js-input scFormObjectOdd css_id_campus_obj\" style=\"\" id=\"id_sc_field_id_campus\" name=\"id_campus\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_campus) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_campus)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_campus_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_campus_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['modalidade_curso']))
   {
       $this->nm_new_label['modalidade_curso'] = "Modalidade Curso";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $modalidade_curso = $this->modalidade_curso;
   $sStyleHidden_modalidade_curso = '';
   if (isset($this->nmgp_cmp_hidden['modalidade_curso']) && $this->nmgp_cmp_hidden['modalidade_curso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['modalidade_curso']);
       $sStyleHidden_modalidade_curso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_modalidade_curso = 'display: none;';
   $sStyleReadInp_modalidade_curso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['modalidade_curso']) && $this->nmgp_cmp_readonly['modalidade_curso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['modalidade_curso']);
       $sStyleReadLab_modalidade_curso = '';
       $sStyleReadInp_modalidade_curso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['modalidade_curso']) && $this->nmgp_cmp_hidden['modalidade_curso'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="modalidade_curso" value="<?php echo $this->form_encode_input($this->modalidade_curso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_modalidade_curso_label" id="hidden_field_label_modalidade_curso" style="<?php echo $sStyleHidden_modalidade_curso; ?>"><span id="id_label_modalidade_curso"><?php echo $this->nm_new_label['modalidade_curso']; ?></span></TD>
    <TD class="scFormDataOdd css_modalidade_curso_line" id="hidden_field_data_modalidade_curso" style="<?php echo $sStyleHidden_modalidade_curso; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_modalidade_curso_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["modalidade_curso"]) &&  $this->nmgp_cmp_readonly["modalidade_curso"] == "on") { 

$modalidade_curso_look = "";
 if ($this->modalidade_curso == "tecnico") { $modalidade_curso_look .= "Técnico" ;} 
 if ($this->modalidade_curso == "superior") { $modalidade_curso_look .= "Superior" ;} 
 if ($this->modalidade_curso == "posgraduacao") { $modalidade_curso_look .= "Pós-Graduação" ;} 
 if (empty($modalidade_curso_look)) { $modalidade_curso_look = $this->modalidade_curso; }
?>
<input type="hidden" name="modalidade_curso" value="<?php echo $this->form_encode_input($modalidade_curso) . "\">" . $modalidade_curso_look . ""; ?>
<?php } else { ?>
<?php

$modalidade_curso_look = "";
 if ($this->modalidade_curso == "tecnico") { $modalidade_curso_look .= "Técnico" ;} 
 if ($this->modalidade_curso == "superior") { $modalidade_curso_look .= "Superior" ;} 
 if ($this->modalidade_curso == "posgraduacao") { $modalidade_curso_look .= "Pós-Graduação" ;} 
 if (empty($modalidade_curso_look)) { $modalidade_curso_look = $this->modalidade_curso; }
?>
<span id="id_read_on_modalidade_curso" class="css_modalidade_curso_line"  style="<?php echo $sStyleReadLab_modalidade_curso; ?>"><?php echo $this->form_encode_input($modalidade_curso_look); ?></span><span id="id_read_off_modalidade_curso" style="<?php echo $sStyleReadInp_modalidade_curso; ?>">
 <span id="idAjaxSelect_modalidade_curso"><select class="sc-js-input scFormObjectOdd css_modalidade_curso_obj" style="" id="id_sc_field_modalidade_curso" name="modalidade_curso" size="1" alt="{type: 'select', enterTab: false}">
 <option value="tecnico" <?php  if ($this->modalidade_curso == "tecnico") { echo " selected" ;} ?><?php  if (empty($this->modalidade_curso)) { echo " selected" ;} ?>>Técnico</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_modalidade_curso'][] = 'tecnico'; ?>
 <option value="superior" <?php  if ($this->modalidade_curso == "superior") { echo " selected" ;} ?>>Superior</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_modalidade_curso'][] = 'superior'; ?>
 <option value="posgraduacao" <?php  if ($this->modalidade_curso == "posgraduacao") { echo " selected" ;} ?>>Pós-Graduação</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_modalidade_curso'][] = 'posgraduacao'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_modalidade_curso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_modalidade_curso_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['curso']))
   {
       $this->nm_new_label['curso'] = "Curso";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $curso = $this->curso;
   $sStyleHidden_curso = '';
   if (isset($this->nmgp_cmp_hidden['curso']) && $this->nmgp_cmp_hidden['curso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['curso']);
       $sStyleHidden_curso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_curso = 'display: none;';
   $sStyleReadInp_curso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['curso']) && $this->nmgp_cmp_readonly['curso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['curso']);
       $sStyleReadLab_curso = '';
       $sStyleReadInp_curso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['curso']) && $this->nmgp_cmp_hidden['curso'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="curso" value="<?php echo $this->form_encode_input($this->curso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_curso_label" id="hidden_field_label_curso" style="<?php echo $sStyleHidden_curso; ?>"><span id="id_label_curso"><?php echo $this->nm_new_label['curso']; ?></span></TD>
    <TD class="scFormDataOdd css_curso_line" id="hidden_field_data_curso" style="<?php echo $sStyleHidden_curso; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_curso_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["curso"]) &&  $this->nmgp_cmp_readonly["curso"] == "on") { 

$curso_look = "";
 if ($this->curso == "Administração") { $curso_look .= "Administração" ;} 
 if ($this->curso == "Agricultor Familiar") { $curso_look .= "Agricultor Familiar" ;} 
 if ($this->curso == "Agricultura") { $curso_look .= "Agricultura" ;} 
 if ($this->curso == "Agroecologia") { $curso_look .= "Agroecologia" ;} 
 if ($this->curso == "Agroindústria") { $curso_look .= "Agroindústria" ;} 
 if ($this->curso == "Agronomia") { $curso_look .= "Agronomia" ;} 
 if ($this->curso == "Agropecuária") { $curso_look .= "Agropecuária" ;} 
 if ($this->curso == "Alimentos") { $curso_look .= "Alimentos" ;} 
 if ($this->curso == "Almoxarife") { $curso_look .= "Almoxarife" ;} 
 if ($this->curso == "Análise e Desenvolvimento de Sistemas") { $curso_look .= "Análise e Desenvolvimento de Sistemas" ;} 
 if ($this->curso == "Artes Visuais") { $curso_look .= "Artes Visuais" ;} 
 if ($this->curso == "Automação Industrial") { $curso_look .= "Automação Industrial" ;} 
 if ($this->curso == "Auxiliar de Técnico em Agropecuária") { $curso_look .= "Auxiliar de Técnico em Agropecuária" ;} 
 if ($this->curso == "Computação Gráfica") { $curso_look .= "Computação Gráfica" ;} 
 if ($this->curso == "Construção Naval") { $curso_look .= "Construção Naval" ;} 
 if ($this->curso == "Cozinha") { $curso_look .= "Cozinha" ;} 
 if ($this->curso == "Desenvolvimento, Inovação e Tecnologias Emergentes") { $curso_look .= "Desenvolvimento, Inovação e Tecnologias Emergentes" ;} 
 if ($this->curso == "Design Gráfico") { $curso_look .= "Design Gráfico" ;} 
 if ($this->curso == "Edificações") { $curso_look .= "Edificações" ;} 
 if ($this->curso == "Educação Profissional e Tecnológica (mestrado) ") { $curso_look .= "Educação Profissional e Tecnológica (mestrado) " ;} 
 if ($this->curso == "Eletroeletrônica") { $curso_look .= "Eletroeletrônica" ;} 
 if ($this->curso == "Eletrônica") { $curso_look .= "Eletrônica" ;} 
 if ($this->curso == "Eletrotécnica") { $curso_look .= "Eletrotécnica" ;} 
 if ($this->curso == "Enfermagem") { $curso_look .= "Enfermagem" ;} 
 if ($this->curso == "Enfermagem (superior)") { $curso_look .= "Enfermagem (superior)" ;} 
 if ($this->curso == "Engenharia Civil") { $curso_look .= "Engenharia Civil" ;} 
 if ($this->curso == "Engenharia Elétrica") { $curso_look .= "Engenharia Elétrica" ;} 
 if ($this->curso == "Engenharia Mecânica") { $curso_look .= "Engenharia Mecânica" ;} 
 if ($this->curso == "Engenharia de Segurança do Trabalho") { $curso_look .= "Engenharia de Segurança do Trabalho" ;} 
 if ($this->curso == "Ensino da Matemática para o Ensino Médio") { $curso_look .= "Ensino da Matemática para o Ensino Médio" ;} 
 if ($this->curso == "Ensino de Ciências") { $curso_look .= "Ensino de Ciências" ;} 
 if ($this->curso == "Gestão Ambiental (superior)") { $curso_look .= "Gestão Ambiental (superior)" ;} 
 if ($this->curso == "Gestão Ambiental (mestrado)") { $curso_look .= "Gestão Ambiental (mestrado)" ;} 
 if ($this->curso == "Gestão da Qualidade") { $curso_look .= "Gestão da Qualidade" ;} 
 if ($this->curso == "Gestão de Turismo") { $curso_look .= "Gestão de Turismo" ;} 
 if ($this->curso == "Gestão e Qualidade e Tecnologia da Informação e Comunicação") { $curso_look .= "Gestão e Qualidade e Tecnologia da Informação e Comunicação" ;} 
 if ($this->curso == "Gestão Pública") { $curso_look .= "Gestão Pública" ;} 
 if ($this->curso == "Hospedagem") { $curso_look .= "Hospedagem" ;} 
 if ($this->curso == "Informática") { $curso_look .= "Informática" ;} 
 if ($this->curso == "Informática para Internet") { $curso_look .= "Informática para Internet" ;} 
 if ($this->curso == "Inovação e Desenvolvimento de Softwares para a Web e Dispositivos Móveis") { $curso_look .= "Inovação e Desenvolvimento de Softwares para a Web e Dispositivos Móveis" ;} 
 if ($this->curso == "Instrumento Musical") { $curso_look .= "Instrumento Musical" ;} 
 if ($this->curso == "Licenciatura em Física") { $curso_look .= "Licenciatura em Física" ;} 
 if ($this->curso == "Licenciatura em Geografia") { $curso_look .= "Licenciatura em Geografia" ;} 
 if ($this->curso == "Licenciatura em Matemática") { $curso_look .= "Licenciatura em Matemática" ;} 
 if ($this->curso == "Licenciatura em Música") { $curso_look .= "Licenciatura em Música" ;} 
 if ($this->curso == "Licenciatura em Química") { $curso_look .= "Licenciatura em Química" ;} 
 if ($this->curso == "Logística") { $curso_look .= "Logística" ;} 
 if ($this->curso == "Manutenção Automotiva") { $curso_look .= "Manutenção Automotiva" ;} 
 if ($this->curso == "Manutenção e Suporte em Informática") { $curso_look .= "Manutenção e Suporte em Informática" ;} 
 if ($this->curso == "Matemática (especialização)") { $curso_look .= "Matemática (especialização)" ;} 
 if ($this->curso == "Mecânica") { $curso_look .= "Mecânica" ;} 
 if ($this->curso == "Mecatrônica") { $curso_look .= "Mecatrônica" ;} 
 if ($this->curso == "Meio Ambiente") { $curso_look .= "Meio Ambiente" ;} 
 if ($this->curso == "Operador de Computador") { $curso_look .= "Operador de Computador" ;} 
 if ($this->curso == "Operador de Processamento de Frutas e Hortaliças") { $curso_look .= "Operador de Processamento de Frutas e Hortaliças" ;} 
 if ($this->curso == "Petroquímica") { $curso_look .= "Petroquímica" ;} 
 if ($this->curso == "Qualidade") { $curso_look .= "Qualidade" ;} 
 if ($this->curso == "Química") { $curso_look .= "Química" ;} 
 if ($this->curso == "Radiologia") { $curso_look .= "Radiologia" ;} 
 if ($this->curso == "Rede de Computadores") { $curso_look .= "Rede de Computadores" ;} 
 if ($this->curso == "Refrigeração e Climatização") { $curso_look .= "Refrigeração e Climatização" ;} 
 if ($this->curso == "Saneamento") { $curso_look .= "Saneamento" ;} 
 if ($this->curso == "Segurança do Trabalho") { $curso_look .= "Segurança do Trabalho" ;} 
 if ($this->curso == "Sistemas de Energia Renovável") { $curso_look .= "Sistemas de Energia Renovável" ;} 
 if ($this->curso == "Telecomunicações") { $curso_look .= "Telecomunicações" ;} 
 if ($this->curso == "Zootecnia") { $curso_look .= "Zootecnia" ;} 
 if (empty($curso_look)) { $curso_look = $this->curso; }
?>
<input type="hidden" name="curso" value="<?php echo $this->form_encode_input($curso) . "\">" . $curso_look . ""; ?>
<?php } else { ?>
<?php

$curso_look = "";
 if ($this->curso == "Administração") { $curso_look .= "Administração" ;} 
 if ($this->curso == "Agricultor Familiar") { $curso_look .= "Agricultor Familiar" ;} 
 if ($this->curso == "Agricultura") { $curso_look .= "Agricultura" ;} 
 if ($this->curso == "Agroecologia") { $curso_look .= "Agroecologia" ;} 
 if ($this->curso == "Agroindústria") { $curso_look .= "Agroindústria" ;} 
 if ($this->curso == "Agronomia") { $curso_look .= "Agronomia" ;} 
 if ($this->curso == "Agropecuária") { $curso_look .= "Agropecuária" ;} 
 if ($this->curso == "Alimentos") { $curso_look .= "Alimentos" ;} 
 if ($this->curso == "Almoxarife") { $curso_look .= "Almoxarife" ;} 
 if ($this->curso == "Análise e Desenvolvimento de Sistemas") { $curso_look .= "Análise e Desenvolvimento de Sistemas" ;} 
 if ($this->curso == "Artes Visuais") { $curso_look .= "Artes Visuais" ;} 
 if ($this->curso == "Automação Industrial") { $curso_look .= "Automação Industrial" ;} 
 if ($this->curso == "Auxiliar de Técnico em Agropecuária") { $curso_look .= "Auxiliar de Técnico em Agropecuária" ;} 
 if ($this->curso == "Computação Gráfica") { $curso_look .= "Computação Gráfica" ;} 
 if ($this->curso == "Construção Naval") { $curso_look .= "Construção Naval" ;} 
 if ($this->curso == "Cozinha") { $curso_look .= "Cozinha" ;} 
 if ($this->curso == "Desenvolvimento, Inovação e Tecnologias Emergentes") { $curso_look .= "Desenvolvimento, Inovação e Tecnologias Emergentes" ;} 
 if ($this->curso == "Design Gráfico") { $curso_look .= "Design Gráfico" ;} 
 if ($this->curso == "Edificações") { $curso_look .= "Edificações" ;} 
 if ($this->curso == "Educação Profissional e Tecnológica (mestrado) ") { $curso_look .= "Educação Profissional e Tecnológica (mestrado) " ;} 
 if ($this->curso == "Eletroeletrônica") { $curso_look .= "Eletroeletrônica" ;} 
 if ($this->curso == "Eletrônica") { $curso_look .= "Eletrônica" ;} 
 if ($this->curso == "Eletrotécnica") { $curso_look .= "Eletrotécnica" ;} 
 if ($this->curso == "Enfermagem") { $curso_look .= "Enfermagem" ;} 
 if ($this->curso == "Enfermagem (superior)") { $curso_look .= "Enfermagem (superior)" ;} 
 if ($this->curso == "Engenharia Civil") { $curso_look .= "Engenharia Civil" ;} 
 if ($this->curso == "Engenharia Elétrica") { $curso_look .= "Engenharia Elétrica" ;} 
 if ($this->curso == "Engenharia Mecânica") { $curso_look .= "Engenharia Mecânica" ;} 
 if ($this->curso == "Engenharia de Segurança do Trabalho") { $curso_look .= "Engenharia de Segurança do Trabalho" ;} 
 if ($this->curso == "Ensino da Matemática para o Ensino Médio") { $curso_look .= "Ensino da Matemática para o Ensino Médio" ;} 
 if ($this->curso == "Ensino de Ciências") { $curso_look .= "Ensino de Ciências" ;} 
 if ($this->curso == "Gestão Ambiental (superior)") { $curso_look .= "Gestão Ambiental (superior)" ;} 
 if ($this->curso == "Gestão Ambiental (mestrado)") { $curso_look .= "Gestão Ambiental (mestrado)" ;} 
 if ($this->curso == "Gestão da Qualidade") { $curso_look .= "Gestão da Qualidade" ;} 
 if ($this->curso == "Gestão de Turismo") { $curso_look .= "Gestão de Turismo" ;} 
 if ($this->curso == "Gestão e Qualidade e Tecnologia da Informação e Comunicação") { $curso_look .= "Gestão e Qualidade e Tecnologia da Informação e Comunicação" ;} 
 if ($this->curso == "Gestão Pública") { $curso_look .= "Gestão Pública" ;} 
 if ($this->curso == "Hospedagem") { $curso_look .= "Hospedagem" ;} 
 if ($this->curso == "Informática") { $curso_look .= "Informática" ;} 
 if ($this->curso == "Informática para Internet") { $curso_look .= "Informática para Internet" ;} 
 if ($this->curso == "Inovação e Desenvolvimento de Softwares para a Web e Dispositivos Móveis") { $curso_look .= "Inovação e Desenvolvimento de Softwares para a Web e Dispositivos Móveis" ;} 
 if ($this->curso == "Instrumento Musical") { $curso_look .= "Instrumento Musical" ;} 
 if ($this->curso == "Licenciatura em Física") { $curso_look .= "Licenciatura em Física" ;} 
 if ($this->curso == "Licenciatura em Geografia") { $curso_look .= "Licenciatura em Geografia" ;} 
 if ($this->curso == "Licenciatura em Matemática") { $curso_look .= "Licenciatura em Matemática" ;} 
 if ($this->curso == "Licenciatura em Música") { $curso_look .= "Licenciatura em Música" ;} 
 if ($this->curso == "Licenciatura em Química") { $curso_look .= "Licenciatura em Química" ;} 
 if ($this->curso == "Logística") { $curso_look .= "Logística" ;} 
 if ($this->curso == "Manutenção Automotiva") { $curso_look .= "Manutenção Automotiva" ;} 
 if ($this->curso == "Manutenção e Suporte em Informática") { $curso_look .= "Manutenção e Suporte em Informática" ;} 
 if ($this->curso == "Matemática (especialização)") { $curso_look .= "Matemática (especialização)" ;} 
 if ($this->curso == "Mecânica") { $curso_look .= "Mecânica" ;} 
 if ($this->curso == "Mecatrônica") { $curso_look .= "Mecatrônica" ;} 
 if ($this->curso == "Meio Ambiente") { $curso_look .= "Meio Ambiente" ;} 
 if ($this->curso == "Operador de Computador") { $curso_look .= "Operador de Computador" ;} 
 if ($this->curso == "Operador de Processamento de Frutas e Hortaliças") { $curso_look .= "Operador de Processamento de Frutas e Hortaliças" ;} 
 if ($this->curso == "Petroquímica") { $curso_look .= "Petroquímica" ;} 
 if ($this->curso == "Qualidade") { $curso_look .= "Qualidade" ;} 
 if ($this->curso == "Química") { $curso_look .= "Química" ;} 
 if ($this->curso == "Radiologia") { $curso_look .= "Radiologia" ;} 
 if ($this->curso == "Rede de Computadores") { $curso_look .= "Rede de Computadores" ;} 
 if ($this->curso == "Refrigeração e Climatização") { $curso_look .= "Refrigeração e Climatização" ;} 
 if ($this->curso == "Saneamento") { $curso_look .= "Saneamento" ;} 
 if ($this->curso == "Segurança do Trabalho") { $curso_look .= "Segurança do Trabalho" ;} 
 if ($this->curso == "Sistemas de Energia Renovável") { $curso_look .= "Sistemas de Energia Renovável" ;} 
 if ($this->curso == "Telecomunicações") { $curso_look .= "Telecomunicações" ;} 
 if ($this->curso == "Zootecnia") { $curso_look .= "Zootecnia" ;} 
 if (empty($curso_look)) { $curso_look = $this->curso; }
?>
<span id="id_read_on_curso" class="css_curso_line"  style="<?php echo $sStyleReadLab_curso; ?>"><?php echo $this->form_encode_input($curso_look); ?></span><span id="id_read_off_curso" style="<?php echo $sStyleReadInp_curso; ?>">
 <span id="idAjaxSelect_curso"><select class="sc-js-input scFormObjectOdd css_curso_obj" style="" id="id_sc_field_curso" name="curso" size="1" alt="{type: 'select', enterTab: false}">
 <option value="Administração" <?php  if ($this->curso == "Administração") { echo " selected" ;} ?>>Administração</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Administração'; ?>
 <option value="Agricultor Familiar" <?php  if ($this->curso == "Agricultor Familiar") { echo " selected" ;} ?>>Agricultor Familiar</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Agricultor Familiar'; ?>
 <option value="Agricultura" <?php  if ($this->curso == "Agricultura") { echo " selected" ;} ?>>Agricultura</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Agricultura'; ?>
 <option value="Agroecologia" <?php  if ($this->curso == "Agroecologia") { echo " selected" ;} ?>>Agroecologia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Agroecologia'; ?>
 <option value="Agroindústria" <?php  if ($this->curso == "Agroindústria") { echo " selected" ;} ?>>Agroindústria</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Agroindústria'; ?>
 <option value="Agronomia" <?php  if ($this->curso == "Agronomia") { echo " selected" ;} ?>>Agronomia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Agronomia'; ?>
 <option value="Agropecuária" <?php  if ($this->curso == "Agropecuária") { echo " selected" ;} ?>>Agropecuária</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Agropecuária'; ?>
 <option value="Alimentos" <?php  if ($this->curso == "Alimentos") { echo " selected" ;} ?>>Alimentos</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Alimentos'; ?>
 <option value="Almoxarife" <?php  if ($this->curso == "Almoxarife") { echo " selected" ;} ?>>Almoxarife</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Almoxarife'; ?>
 <option value="Análise e Desenvolvimento de Sistemas" <?php  if ($this->curso == "Análise e Desenvolvimento de Sistemas") { echo " selected" ;} ?>>Análise e Desenvolvimento de Sistemas</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Análise e Desenvolvimento de Sistemas'; ?>
 <option value="Artes Visuais" <?php  if ($this->curso == "Artes Visuais") { echo " selected" ;} ?>>Artes Visuais</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Artes Visuais'; ?>
 <option value="Automação Industrial" <?php  if ($this->curso == "Automação Industrial") { echo " selected" ;} ?>>Automação Industrial</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Automação Industrial'; ?>
 <option value="Auxiliar de Técnico em Agropecuária" <?php  if ($this->curso == "Auxiliar de Técnico em Agropecuária") { echo " selected" ;} ?>>Auxiliar de Técnico em Agropecuária</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Auxiliar de Técnico em Agropecuária'; ?>
 <option value="Computação Gráfica" <?php  if ($this->curso == "Computação Gráfica") { echo " selected" ;} ?>>Computação Gráfica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Computação Gráfica'; ?>
 <option value="Construção Naval" <?php  if ($this->curso == "Construção Naval") { echo " selected" ;} ?>>Construção Naval</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Construção Naval'; ?>
 <option value="Cozinha" <?php  if ($this->curso == "Cozinha") { echo " selected" ;} ?>>Cozinha</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Cozinha'; ?>
 <option value="Desenvolvimento, Inovação e Tecnologias Emergentes" <?php  if ($this->curso == "Desenvolvimento, Inovação e Tecnologias Emergentes") { echo " selected" ;} ?>>Desenvolvimento, Inovação e Tecnologias Emergentes</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Desenvolvimento, Inovação e Tecnologias Emergentes'; ?>
 <option value="Design Gráfico" <?php  if ($this->curso == "Design Gráfico") { echo " selected" ;} ?>>Design Gráfico</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Design Gráfico'; ?>
 <option value="Edificações" <?php  if ($this->curso == "Edificações") { echo " selected" ;} ?>>Edificações</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Edificações'; ?>
 <option value="Educação Profissional e Tecnológica (mestrado) " <?php  if ($this->curso == "Educação Profissional e Tecnológica (mestrado) ") { echo " selected" ;} ?>>Educação Profissional e Tecnológica (mestrado) </option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Educação Profissional e Tecnológica (mestrado) '; ?>
 <option value="Eletroeletrônica" <?php  if ($this->curso == "Eletroeletrônica") { echo " selected" ;} ?>>Eletroeletrônica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Eletroeletrônica'; ?>
 <option value="Eletrônica" <?php  if ($this->curso == "Eletrônica") { echo " selected" ;} ?>>Eletrônica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Eletrônica'; ?>
 <option value="Eletrotécnica" <?php  if ($this->curso == "Eletrotécnica") { echo " selected" ;} ?>>Eletrotécnica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Eletrotécnica'; ?>
 <option value="Enfermagem" <?php  if ($this->curso == "Enfermagem") { echo " selected" ;} ?>>Enfermagem</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Enfermagem'; ?>
 <option value="Enfermagem (superior)" <?php  if ($this->curso == "Enfermagem (superior)") { echo " selected" ;} ?>>Enfermagem (superior)</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Enfermagem (superior)'; ?>
 <option value="Engenharia Civil" <?php  if ($this->curso == "Engenharia Civil") { echo " selected" ;} ?>>Engenharia Civil</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Engenharia Civil'; ?>
 <option value="Engenharia Elétrica" <?php  if ($this->curso == "Engenharia Elétrica") { echo " selected" ;} ?>>Engenharia Elétrica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Engenharia Elétrica'; ?>
 <option value="Engenharia Mecânica" <?php  if ($this->curso == "Engenharia Mecânica") { echo " selected" ;} ?>>Engenharia Mecânica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Engenharia Mecânica'; ?>
 <option value="Engenharia de Segurança do Trabalho" <?php  if ($this->curso == "Engenharia de Segurança do Trabalho") { echo " selected" ;} ?>>Engenharia de Segurança do Trabalho</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Engenharia de Segurança do Trabalho'; ?>
 <option value="Ensino da Matemática para o Ensino Médio" <?php  if ($this->curso == "Ensino da Matemática para o Ensino Médio") { echo " selected" ;} ?>>Ensino da Matemática para o Ensino Médio</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Ensino da Matemática para o Ensino Médio'; ?>
 <option value="Ensino de Ciências" <?php  if ($this->curso == "Ensino de Ciências") { echo " selected" ;} ?>>Ensino de Ciências</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Ensino de Ciências'; ?>
 <option value="Gestão Ambiental (superior)" <?php  if ($this->curso == "Gestão Ambiental (superior)") { echo " selected" ;} ?>>Gestão Ambiental (superior)</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Gestão Ambiental (superior)'; ?>
 <option value="Gestão Ambiental (mestrado)" <?php  if ($this->curso == "Gestão Ambiental (mestrado)") { echo " selected" ;} ?>>Gestão Ambiental (mestrado)</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Gestão Ambiental (mestrado)'; ?>
 <option value="Gestão da Qualidade" <?php  if ($this->curso == "Gestão da Qualidade") { echo " selected" ;} ?>>Gestão da Qualidade</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Gestão da Qualidade'; ?>
 <option value="Gestão de Turismo" <?php  if ($this->curso == "Gestão de Turismo") { echo " selected" ;} ?>>Gestão de Turismo</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Gestão de Turismo'; ?>
 <option value="Gestão e Qualidade e Tecnologia da Informação e Comunicação" <?php  if ($this->curso == "Gestão e Qualidade e Tecnologia da Informação e Comunicação") { echo " selected" ;} ?>>Gestão e Qualidade e Tecnologia da Informação e Comunicação</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Gestão e Qualidade e Tecnologia da Informação e Comunicação'; ?>
 <option value="Gestão Pública" <?php  if ($this->curso == "Gestão Pública") { echo " selected" ;} ?>>Gestão Pública</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Gestão Pública'; ?>
 <option value="Hospedagem" <?php  if ($this->curso == "Hospedagem") { echo " selected" ;} ?>>Hospedagem</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Hospedagem'; ?>
 <option value="Informática" <?php  if ($this->curso == "Informática") { echo " selected" ;} ?>>Informática</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Informática'; ?>
 <option value="Informática para Internet" <?php  if ($this->curso == "Informática para Internet") { echo " selected" ;} ?>>Informática para Internet</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Informática para Internet'; ?>
 <option value="Inovação e Desenvolvimento de Softwares para a Web e Dispositivos Móveis" <?php  if ($this->curso == "Inovação e Desenvolvimento de Softwares para a Web e Dispositivos Móveis") { echo " selected" ;} ?>>Inovação e Desenvolvimento de Softwares para a Web e Dispositivos Móveis</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Inovação e Desenvolvimento de Softwares para a Web e Dispositivos Móveis'; ?>
 <option value="Instrumento Musical" <?php  if ($this->curso == "Instrumento Musical") { echo " selected" ;} ?>>Instrumento Musical</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Instrumento Musical'; ?>
 <option value="Licenciatura em Física" <?php  if ($this->curso == "Licenciatura em Física") { echo " selected" ;} ?>>Licenciatura em Física</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Licenciatura em Física'; ?>
 <option value="Licenciatura em Geografia" <?php  if ($this->curso == "Licenciatura em Geografia") { echo " selected" ;} ?>>Licenciatura em Geografia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Licenciatura em Geografia'; ?>
 <option value="Licenciatura em Matemática" <?php  if ($this->curso == "Licenciatura em Matemática") { echo " selected" ;} ?>>Licenciatura em Matemática</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Licenciatura em Matemática'; ?>
 <option value="Licenciatura em Música" <?php  if ($this->curso == "Licenciatura em Música") { echo " selected" ;} ?>>Licenciatura em Música</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Licenciatura em Música'; ?>
 <option value="Licenciatura em Química" <?php  if ($this->curso == "Licenciatura em Química") { echo " selected" ;} ?>>Licenciatura em Química</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Licenciatura em Química'; ?>
 <option value="Logística" <?php  if ($this->curso == "Logística") { echo " selected" ;} ?>>Logística</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Logística'; ?>
 <option value="Manutenção Automotiva" <?php  if ($this->curso == "Manutenção Automotiva") { echo " selected" ;} ?>>Manutenção Automotiva</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Manutenção Automotiva'; ?>
 <option value="Manutenção e Suporte em Informática" <?php  if ($this->curso == "Manutenção e Suporte em Informática") { echo " selected" ;} ?>>Manutenção e Suporte em Informática</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Manutenção e Suporte em Informática'; ?>
 <option value="Matemática (especialização)" <?php  if ($this->curso == "Matemática (especialização)") { echo " selected" ;} ?>>Matemática (especialização)</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Matemática (especialização)'; ?>
 <option value="Mecânica" <?php  if ($this->curso == "Mecânica") { echo " selected" ;} ?>>Mecânica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Mecânica'; ?>
 <option value="Mecatrônica" <?php  if ($this->curso == "Mecatrônica") { echo " selected" ;} ?>>Mecatrônica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Mecatrônica'; ?>
 <option value="Meio Ambiente" <?php  if ($this->curso == "Meio Ambiente") { echo " selected" ;} ?>>Meio Ambiente</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Meio Ambiente'; ?>
 <option value="Operador de Computador" <?php  if ($this->curso == "Operador de Computador") { echo " selected" ;} ?>>Operador de Computador</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Operador de Computador'; ?>
 <option value="Operador de Processamento de Frutas e Hortaliças" <?php  if ($this->curso == "Operador de Processamento de Frutas e Hortaliças") { echo " selected" ;} ?>>Operador de Processamento de Frutas e Hortaliças</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Operador de Processamento de Frutas e Hortaliças'; ?>
 <option value="Petroquímica" <?php  if ($this->curso == "Petroquímica") { echo " selected" ;} ?>>Petroquímica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Petroquímica'; ?>
 <option value="Qualidade" <?php  if ($this->curso == "Qualidade") { echo " selected" ;} ?>>Qualidade</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Qualidade'; ?>
 <option value="Química" <?php  if ($this->curso == "Química") { echo " selected" ;} ?>>Química</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Química'; ?>
 <option value="Radiologia" <?php  if ($this->curso == "Radiologia") { echo " selected" ;} ?>>Radiologia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Radiologia'; ?>
 <option value="Rede de Computadores" <?php  if ($this->curso == "Rede de Computadores") { echo " selected" ;} ?>>Rede de Computadores</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Rede de Computadores'; ?>
 <option value="Refrigeração e Climatização" <?php  if ($this->curso == "Refrigeração e Climatização") { echo " selected" ;} ?>>Refrigeração e Climatização</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Refrigeração e Climatização'; ?>
 <option value="Saneamento" <?php  if ($this->curso == "Saneamento") { echo " selected" ;} ?>>Saneamento</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Saneamento'; ?>
 <option value="Segurança do Trabalho" <?php  if ($this->curso == "Segurança do Trabalho") { echo " selected" ;} ?>>Segurança do Trabalho</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Segurança do Trabalho'; ?>
 <option value="Sistemas de Energia Renovável" <?php  if ($this->curso == "Sistemas de Energia Renovável") { echo " selected" ;} ?>>Sistemas de Energia Renovável</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Sistemas de Energia Renovável'; ?>
 <option value="Telecomunicações" <?php  if ($this->curso == "Telecomunicações") { echo " selected" ;} ?>>Telecomunicações</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Telecomunicações'; ?>
 <option value="Zootecnia" <?php  if ($this->curso == "Zootecnia") { echo " selected" ;} ?>>Zootecnia</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['Lookup_curso'][] = 'Zootecnia'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_curso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_curso_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['data_cadastro']))
    {
        $this->nm_new_label['data_cadastro'] = "Data Cadastro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_data_cadastro = $this->data_cadastro;
   $this->data_cadastro .= ' ' . $this->data_cadastro_hora;
   $data_cadastro = $this->data_cadastro;
   $sStyleHidden_data_cadastro = '';
   if (isset($this->nmgp_cmp_hidden['data_cadastro']) && $this->nmgp_cmp_hidden['data_cadastro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['data_cadastro']);
       $sStyleHidden_data_cadastro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_data_cadastro = 'display: none;';
   $sStyleReadInp_data_cadastro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['data_cadastro']) && $this->nmgp_cmp_readonly['data_cadastro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['data_cadastro']);
       $sStyleReadLab_data_cadastro = '';
       $sStyleReadInp_data_cadastro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['data_cadastro']) && $this->nmgp_cmp_hidden['data_cadastro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="data_cadastro" value="<?php echo $this->form_encode_input($data_cadastro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_data_cadastro_label" id="hidden_field_label_data_cadastro" style="<?php echo $sStyleHidden_data_cadastro; ?>"><span id="id_label_data_cadastro"><?php echo $this->nm_new_label['data_cadastro']; ?></span></TD>
    <TD class="scFormDataOdd css_data_cadastro_line" id="hidden_field_data_data_cadastro" style="<?php echo $sStyleHidden_data_cadastro; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_data_cadastro_line" style="vertical-align: top;padding: 0px"><input type="hidden" name="data_cadastro" value="<?php echo $this->form_encode_input($data_cadastro); ?>"><span id="id_ajax_label_data_cadastro"><?php echo nl2br($data_cadastro); ?></span>
<?php
$tmp_form_data = $this->field_config['data_cadastro']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<?php echo $tmp_form_data; ?></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_data_cadastro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_data_cadastro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->data_cadastro = $old_dt_data_cadastro;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['run_iframe'] != "R")
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['masterValue']);
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
 parent.scAjaxDetailStatus("form_aluno_atualizacao");
 parent.scAjaxDetailHeight("form_aluno_atualizacao", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_aluno_atualizacao", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_aluno_atualizacao", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_atualizacao']['sc_modal'])
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
