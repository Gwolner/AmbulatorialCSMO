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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Prontuário"); } else { echo strip_tags("Prontuário"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" media="screen" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_prontuario_backup/form_prontuario_backup_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_prontuario_backup_mob_sajax_js.php");
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
<?php

include_once('form_prontuario_backup_mob_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
  $(".scBtnGrpClick").find("a").click(function(e){
     e.preventDefault();
  });
  $(".scBtnGrpClick").click(function(){
     var aObj = $(this).find("a"), aHref = aObj.attr("href");
     if ("javascript:" == aHref.substr(0, 11)) {
        eval(aHref.substr(11));
     }
     else {
        aObj.trigger("click");
     }
   }).mouseover(function(){
     $(this).css("cursor", "pointer");
  });
  scJQElementsAdd('');

  scJQGeneralAdd();

  $("#hidden_bloco_0,#hidden_bloco_1,#hidden_bloco_2,#hidden_bloco_3,#hidden_bloco_4,#hidden_bloco_5,#hidden_bloco_6,#hidden_bloco_7,#hidden_bloco_8").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
  });

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
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
    "hidden_bloco_0": true,
    "hidden_bloco_1": true,
    "hidden_bloco_2": true,
    "hidden_bloco_3": true,
    "hidden_bloco_4": true,
    "hidden_bloco_5": true,
    "hidden_bloco_6": true,
    "hidden_bloco_7": true,
    "hidden_bloco_8": true
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
    if ("hidden_bloco_1" == block_id) {
      scAjaxDetailHeight("form_servidor_terceirizado_pront", $($("#nmsc_iframe_liga_form_servidor_terceirizado_pront")[0].contentWindow.document).innerHeight());
      scAjaxDetailHeight("form_servidor_pront", $($("#nmsc_iframe_liga_form_servidor_pront")[0].contentWindow.document).innerHeight());
      scAjaxDetailHeight("form_aluno_pront", $($("#nmsc_iframe_liga_form_aluno_pront")[0].contentWindow.document).innerHeight());
      scAjaxDetailHeight("form_visitante_pront", $($("#nmsc_iframe_liga_form_visitante_pront")[0].contentWindow.document).innerHeight());
    }
    if ("hidden_bloco_2" == block_id) {
      scAjaxDetailHeight("form_triagem_pront", "300");
    }
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("form_evolucao_medica_pront", $($("#nmsc_iframe_liga_form_evolucao_medica_pront")[0].contentWindow.document).innerHeight());
    }
    if ("hidden_bloco_4" == block_id) {
      scAjaxDetailHeight("form_conduta_medica_pront", $($("#nmsc_iframe_liga_form_conduta_medica_pront")[0].contentWindow.document).innerHeight());
    }
    if ("hidden_bloco_5" == block_id) {
      scAjaxDetailHeight("form_evolucao_odontologica_pront", $($("#nmsc_iframe_liga_form_evolucao_odontologica_pront")[0].contentWindow.document).innerHeight());
    }
    if ("hidden_bloco_6" == block_id) {
      scAjaxDetailHeight("form_conduta_odontologica_pront", $($("#nmsc_iframe_liga_form_conduta_odontologica_pront")[0].contentWindow.document).innerHeight());
    }
    if ("hidden_bloco_7" == block_id) {
      scAjaxDetailHeight("form_prescricao_pront", $($("#nmsc_iframe_liga_form_prescricao_pront")[0].contentWindow.document).innerHeight());
    }
    if ("hidden_bloco_8" == block_id) {
      scAjaxDetailHeight("form_registro_de_enfermagem_pront", $($("#nmsc_iframe_liga_form_registro_de_enfermagem_pront")[0].contentWindow.document).innerHeight());
    }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['recarga'];
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
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
 include_once("form_prontuario_backup_mob_js0.php");
?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
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
               action="form_prontuario_backup_mob.php" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['insert_validation']; ?>">
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
<input type="hidden" name="id_paciente" value="<?php  echo $this->form_encode_input($this->id_paciente) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_prontuario_backup_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_prontuario_backup_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Prontuário"; } else { echo "Prontuário"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{watermark:'<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>', watermarkClass: 'scFormToolbarInputWm', maxLength: 255}">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = ''; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
        $sCondStyle = ($this->nmgp_botoes['new'] != 'off' || $this->nmgp_botoes['insert'] != 'off' || $this->nmgp_botoes['exit'] != 'off' || $this->nmgp_botoes['update'] != 'off' || $this->nmgp_botoes['delete'] != 'off' || $this->nmgp_botoes['copy'] != 'off') ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_t')", "scBtnGrpShow('group_2_t')", "sc_btgp_btn_group_2_t", "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "", "", "__sc_grp__");?>
 
<?php
        $NM_btn = true;
?>
<table style="border-collapse: collapse; border-width: 0; display: none; position: absolute; z-index: 1000" id="sc_btgp_div_group_2_t">
 <tr><td class="scBtnGrpBackground">
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_new_t">
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_upd_t">
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_del_t">
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_atualiza ('excluir');", "nm_atualiza ('excluir');", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sys_separator">
 </td></tr><tr><td class="scBtnGrpBackground">
  </div>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_clone_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "nm_move ('clone');", "nm_move ('clone');", "sc_b_clone_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
?>
 </td></tr>
</table>
<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (!$this->Embutida_call) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['empty_filter'] = true;
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
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Dados Gerais<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nome_paciente']))
    {
        $this->nm_new_label['nome_paciente'] = "Nome Paciente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nome_paciente = $this->nome_paciente;
   $sStyleHidden_nome_paciente = '';
   if (isset($this->nmgp_cmp_hidden['nome_paciente']) && $this->nmgp_cmp_hidden['nome_paciente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nome_paciente']);
       $sStyleHidden_nome_paciente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nome_paciente = 'display: none;';
   $sStyleReadInp_nome_paciente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nome_paciente']) && $this->nmgp_cmp_readonly['nome_paciente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nome_paciente']);
       $sStyleReadLab_nome_paciente = '';
       $sStyleReadInp_nome_paciente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nome_paciente']) && $this->nmgp_cmp_hidden['nome_paciente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nome_paciente" value="<?php echo $this->form_encode_input($nome_paciente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nome_paciente_line" id="hidden_field_data_nome_paciente" style="<?php echo $sStyleHidden_nome_paciente; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nome_paciente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nome_paciente_label"><span id="id_label_nome_paciente"><?php echo $this->nm_new_label['nome_paciente']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nome_paciente"]) &&  $this->nmgp_cmp_readonly["nome_paciente"] == "on") { 

 ?>
<input type="hidden" name="nome_paciente" value="<?php echo $this->form_encode_input($nome_paciente) . "\">" . $nome_paciente . ""; ?>
<?php } else { ?>
<span id="id_read_on_nome_paciente" class="sc-ui-readonly-nome_paciente css_nome_paciente_line" style="<?php echo $sStyleReadLab_nome_paciente; ?>"><?php echo $this->form_encode_input($this->nome_paciente); ?></span><span id="id_read_off_nome_paciente" style="white-space: nowrap;<?php echo $sStyleReadInp_nome_paciente; ?>">
 <input class="sc-js-input scFormObjectOdd css_nome_paciente_obj" style="" id="id_sc_field_nome_paciente" type=text name="nome_paciente" value="<?php echo $this->form_encode_input($nome_paciente) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nome_paciente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nome_paciente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cpf']))
    {
        $this->nm_new_label['cpf'] = "CPF";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cpf = $this->cpf;
   $sStyleHidden_cpf = '';
   if (isset($this->nmgp_cmp_hidden['cpf']) && $this->nmgp_cmp_hidden['cpf'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cpf']);
       $sStyleHidden_cpf = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cpf = 'display: none;';
   $sStyleReadInp_cpf = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cpf']) && $this->nmgp_cmp_readonly['cpf'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cpf']);
       $sStyleReadLab_cpf = '';
       $sStyleReadInp_cpf = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cpf']) && $this->nmgp_cmp_hidden['cpf'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cpf" value="<?php echo $this->form_encode_input($cpf) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cpf_line" id="hidden_field_data_cpf" style="<?php echo $sStyleHidden_cpf; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cpf_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cpf_label"><span id="id_label_cpf"><?php echo $this->nm_new_label['cpf']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cpf"]) &&  $this->nmgp_cmp_readonly["cpf"] == "on") { 

 ?>
<input type="hidden" name="cpf" value="<?php echo $this->form_encode_input($cpf) . "\">" . $cpf . ""; ?>
<?php } else { ?>
<span id="id_read_on_cpf" class="sc-ui-readonly-cpf css_cpf_line" style="<?php echo $sStyleReadLab_cpf; ?>"><?php echo $this->form_encode_input($this->cpf); ?></span><span id="id_read_off_cpf" style="white-space: nowrap;<?php echo $sStyleReadInp_cpf; ?>">
 <input class="sc-js-input scFormObjectOdd css_cpf_obj" style="" id="id_sc_field_cpf" type=text name="cpf" value="<?php echo $this->form_encode_input($cpf) ?>"
 size=14 alt="{datatype: 'cpf', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cpf_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cpf_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cep']))
    {
        $this->nm_new_label['cep'] = "Cep";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cep = $this->cep;
   $sStyleHidden_cep = '';
   if (isset($this->nmgp_cmp_hidden['cep']) && $this->nmgp_cmp_hidden['cep'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cep']);
       $sStyleHidden_cep = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cep = 'display: none;';
   $sStyleReadInp_cep = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cep']) && $this->nmgp_cmp_readonly['cep'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cep']);
       $sStyleReadLab_cep = '';
       $sStyleReadInp_cep = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cep']) && $this->nmgp_cmp_hidden['cep'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cep" value="<?php echo $this->form_encode_input($cep) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cep_line" id="hidden_field_data_cep" style="<?php echo $sStyleHidden_cep; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cep_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cep_label"><span id="id_label_cep"><?php echo $this->nm_new_label['cep']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['php_cmp_required']['cep']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['php_cmp_required']['cep'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cep"]) &&  $this->nmgp_cmp_readonly["cep"] == "on") { 

 ?>
<input type="hidden" name="cep" value="<?php echo $this->form_encode_input($cep) . "\">" . $cep . ""; ?>
<?php } else { ?>
<span id="id_read_on_cep" class="sc-ui-readonly-cep css_cep_line" style="<?php echo $sStyleReadLab_cep; ?>"><?php echo $this->form_encode_input($this->cep); ?></span><span id="id_read_off_cep" style="white-space: nowrap;<?php echo $sStyleReadInp_cep; ?>">
 <input class="sc-js-input scFormObjectOdd css_cep_obj" style="" id="id_sc_field_cep" type=text name="cep" value="<?php echo $this->form_encode_input($cep) ?>"
 size=8 alt="{datatype: 'cep', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "bzipcode", "tb_show('', '" . $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . SC_dir_app_name('form_prontuario_backup'). "/form_prontuario_backup_mob_cep.php?cep=' + document.F1.cep.value + '&form_origem=F1;CEP,cep;UF,estado;CIDADE,cidade;BAIRRO,bairro;RUA,rua&TB_iframe=true&height=220&width=350&modal=true', '')", "tb_show('', '" . $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . SC_dir_app_name('form_prontuario_backup'). "/form_prontuario_backup_mob_cep.php?cep=' + document.F1.cep.value + '&form_origem=F1;CEP,cep;UF,estado;CIDADE,cidade;BAIRRO,bairro;RUA,rua&TB_iframe=true&height=220&width=350&modal=true', '')", "cep_cep", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cep_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cep_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rua']))
    {
        $this->nm_new_label['rua'] = "Rua";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rua = $this->rua;
   $sStyleHidden_rua = '';
   if (isset($this->nmgp_cmp_hidden['rua']) && $this->nmgp_cmp_hidden['rua'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rua']);
       $sStyleHidden_rua = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rua = 'display: none;';
   $sStyleReadInp_rua = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rua']) && $this->nmgp_cmp_readonly['rua'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rua']);
       $sStyleReadLab_rua = '';
       $sStyleReadInp_rua = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rua']) && $this->nmgp_cmp_hidden['rua'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rua" value="<?php echo $this->form_encode_input($rua) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_rua_line" id="hidden_field_data_rua" style="<?php echo $sStyleHidden_rua; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rua_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_rua_label"><span id="id_label_rua"><?php echo $this->nm_new_label['rua']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rua"]) &&  $this->nmgp_cmp_readonly["rua"] == "on") { 

 ?>
<input type="hidden" name="rua" value="<?php echo $this->form_encode_input($rua) . "\">" . $rua . ""; ?>
<?php } else { ?>
<span id="id_read_on_rua" class="sc-ui-readonly-rua css_rua_line" style="<?php echo $sStyleReadLab_rua; ?>"><?php echo $this->form_encode_input($this->rua); ?></span><span id="id_read_off_rua" style="white-space: nowrap;<?php echo $sStyleReadInp_rua; ?>">
 <input class="sc-js-input scFormObjectOdd css_rua_obj" style="" id="id_sc_field_rua" type=text name="rua" value="<?php echo $this->form_encode_input($rua) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rua_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rua_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bairro']))
    {
        $this->nm_new_label['bairro'] = "Bairro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bairro = $this->bairro;
   $sStyleHidden_bairro = '';
   if (isset($this->nmgp_cmp_hidden['bairro']) && $this->nmgp_cmp_hidden['bairro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bairro']);
       $sStyleHidden_bairro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bairro = 'display: none;';
   $sStyleReadInp_bairro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bairro']) && $this->nmgp_cmp_readonly['bairro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bairro']);
       $sStyleReadLab_bairro = '';
       $sStyleReadInp_bairro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bairro']) && $this->nmgp_cmp_hidden['bairro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bairro" value="<?php echo $this->form_encode_input($bairro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_bairro_line" id="hidden_field_data_bairro" style="<?php echo $sStyleHidden_bairro; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bairro_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_bairro_label"><span id="id_label_bairro"><?php echo $this->nm_new_label['bairro']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bairro"]) &&  $this->nmgp_cmp_readonly["bairro"] == "on") { 

 ?>
<input type="hidden" name="bairro" value="<?php echo $this->form_encode_input($bairro) . "\">" . $bairro . ""; ?>
<?php } else { ?>
<span id="id_read_on_bairro" class="sc-ui-readonly-bairro css_bairro_line" style="<?php echo $sStyleReadLab_bairro; ?>"><?php echo $this->form_encode_input($this->bairro); ?></span><span id="id_read_off_bairro" style="white-space: nowrap;<?php echo $sStyleReadInp_bairro; ?>">
 <input class="sc-js-input scFormObjectOdd css_bairro_obj" style="" id="id_sc_field_bairro" type=text name="bairro" value="<?php echo $this->form_encode_input($bairro) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bairro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bairro_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cidade']))
    {
        $this->nm_new_label['cidade'] = "Cidade";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cidade = $this->cidade;
   $sStyleHidden_cidade = '';
   if (isset($this->nmgp_cmp_hidden['cidade']) && $this->nmgp_cmp_hidden['cidade'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cidade']);
       $sStyleHidden_cidade = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cidade = 'display: none;';
   $sStyleReadInp_cidade = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cidade']) && $this->nmgp_cmp_readonly['cidade'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cidade']);
       $sStyleReadLab_cidade = '';
       $sStyleReadInp_cidade = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cidade']) && $this->nmgp_cmp_hidden['cidade'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cidade" value="<?php echo $this->form_encode_input($cidade) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cidade_line" id="hidden_field_data_cidade" style="<?php echo $sStyleHidden_cidade; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cidade_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cidade_label"><span id="id_label_cidade"><?php echo $this->nm_new_label['cidade']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cidade"]) &&  $this->nmgp_cmp_readonly["cidade"] == "on") { 

 ?>
<input type="hidden" name="cidade" value="<?php echo $this->form_encode_input($cidade) . "\">" . $cidade . ""; ?>
<?php } else { ?>
<span id="id_read_on_cidade" class="sc-ui-readonly-cidade css_cidade_line" style="<?php echo $sStyleReadLab_cidade; ?>"><?php echo $this->form_encode_input($this->cidade); ?></span><span id="id_read_off_cidade" style="white-space: nowrap;<?php echo $sStyleReadInp_cidade; ?>">
 <input class="sc-js-input scFormObjectOdd css_cidade_obj" style="" id="id_sc_field_cidade" type=text name="cidade" value="<?php echo $this->form_encode_input($cidade) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cidade_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cidade_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estado']))
    {
        $this->nm_new_label['estado'] = "Estado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estado = $this->estado;
   $sStyleHidden_estado = '';
   if (isset($this->nmgp_cmp_hidden['estado']) && $this->nmgp_cmp_hidden['estado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estado']);
       $sStyleHidden_estado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estado = 'display: none;';
   $sStyleReadInp_estado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estado']) && $this->nmgp_cmp_readonly['estado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estado']);
       $sStyleReadLab_estado = '';
       $sStyleReadInp_estado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estado']) && $this->nmgp_cmp_hidden['estado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estado" value="<?php echo $this->form_encode_input($estado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estado_line" id="hidden_field_data_estado" style="<?php echo $sStyleHidden_estado; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estado_label"><span id="id_label_estado"><?php echo $this->nm_new_label['estado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estado"]) &&  $this->nmgp_cmp_readonly["estado"] == "on") { 

 ?>
<input type="hidden" name="estado" value="<?php echo $this->form_encode_input($estado) . "\">" . $estado . ""; ?>
<?php } else { ?>
<span id="id_read_on_estado" class="sc-ui-readonly-estado css_estado_line" style="<?php echo $sStyleReadLab_estado; ?>"><?php echo $this->form_encode_input($this->estado); ?></span><span id="id_read_off_estado" style="white-space: nowrap;<?php echo $sStyleReadInp_estado; ?>">
 <input class="sc-js-input scFormObjectOdd css_estado_obj" style="" id="id_sc_field_estado" type=text name="estado" value="<?php echo $this->form_encode_input($estado) ?>"
 size=2 maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_paciente']))
   {
       $this->nm_new_label['tipo_paciente'] = "Tipo Paciente";
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

    <TD class="scFormDataOdd css_tipo_paciente_line" id="hidden_field_data_tipo_paciente" style="<?php echo $sStyleHidden_tipo_paciente; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_paciente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_paciente_label"><span id="id_label_tipo_paciente"><?php echo $this->nm_new_label['tipo_paciente']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_paciente"]) &&  $this->nmgp_cmp_readonly["tipo_paciente"] == "on") { 

$tipo_paciente_look = "";
 if ($this->tipo_paciente == "aluno") { $tipo_paciente_look .= "Aluno" ;} 
 if ($this->tipo_paciente == "servidor") { $tipo_paciente_look .= "Servidor" ;} 
 if ($this->tipo_paciente == "terceirizado") { $tipo_paciente_look .= "Terceirizado" ;} 
 if ($this->tipo_paciente == "visitante") { $tipo_paciente_look .= "Visitante" ;} 
 if (empty($tipo_paciente_look)) { $tipo_paciente_look = $this->tipo_paciente; }
?>
<input type="hidden" name="tipo_paciente" value="<?php echo $this->form_encode_input($tipo_paciente) . "\">" . $tipo_paciente_look . ""; ?>
<?php } else { ?>
<?php

$tipo_paciente_look = "";
 if ($this->tipo_paciente == "aluno") { $tipo_paciente_look .= "Aluno" ;} 
 if ($this->tipo_paciente == "servidor") { $tipo_paciente_look .= "Servidor" ;} 
 if ($this->tipo_paciente == "terceirizado") { $tipo_paciente_look .= "Terceirizado" ;} 
 if ($this->tipo_paciente == "visitante") { $tipo_paciente_look .= "Visitante" ;} 
 if (empty($tipo_paciente_look)) { $tipo_paciente_look = $this->tipo_paciente; }
?>
<span id="id_read_on_tipo_paciente" class="css_tipo_paciente_line"  style="<?php echo $sStyleReadLab_tipo_paciente; ?>"><?php echo $this->form_encode_input($tipo_paciente_look); ?></span><span id="id_read_off_tipo_paciente" style="<?php echo $sStyleReadInp_tipo_paciente; ?>">
 <span id="idAjaxSelect_tipo_paciente"><select class="sc-js-input scFormObjectOdd css_tipo_paciente_obj" style="" id="id_sc_field_tipo_paciente" name="tipo_paciente" size="1" alt="{type: 'select', enterTab: false}">
 <option value="aluno" <?php  if ($this->tipo_paciente == "aluno") { echo " selected" ;} ?><?php  if (empty($this->tipo_paciente)) { echo " selected" ;} ?>>Aluno</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['Lookup_tipo_paciente'][] = 'aluno'; ?>
 <option value="servidor" <?php  if ($this->tipo_paciente == "servidor") { echo " selected" ;} ?>>Servidor</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['Lookup_tipo_paciente'][] = 'servidor'; ?>
 <option value="terceirizado" <?php  if ($this->tipo_paciente == "terceirizado") { echo " selected" ;} ?>>Terceirizado</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['Lookup_tipo_paciente'][] = 'terceirizado'; ?>
 <option value="visitante" <?php  if ($this->tipo_paciente == "visitante") { echo " selected" ;} ?>>Visitante</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['Lookup_tipo_paciente'][] = 'visitante'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_paciente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_paciente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telefone_contato']))
    {
        $this->nm_new_label['telefone_contato'] = "Telefone Contato";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telefone_contato = $this->telefone_contato;
   $sStyleHidden_telefone_contato = '';
   if (isset($this->nmgp_cmp_hidden['telefone_contato']) && $this->nmgp_cmp_hidden['telefone_contato'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telefone_contato']);
       $sStyleHidden_telefone_contato = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telefone_contato = 'display: none;';
   $sStyleReadInp_telefone_contato = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telefone_contato']) && $this->nmgp_cmp_readonly['telefone_contato'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telefone_contato']);
       $sStyleReadLab_telefone_contato = '';
       $sStyleReadInp_telefone_contato = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telefone_contato']) && $this->nmgp_cmp_hidden['telefone_contato'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telefone_contato" value="<?php echo $this->form_encode_input($telefone_contato) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_telefone_contato_line" id="hidden_field_data_telefone_contato" style="<?php echo $sStyleHidden_telefone_contato; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telefone_contato_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_telefone_contato_label"><span id="id_label_telefone_contato"><?php echo $this->nm_new_label['telefone_contato']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telefone_contato"]) &&  $this->nmgp_cmp_readonly["telefone_contato"] == "on") { 

 ?>
<input type="hidden" name="telefone_contato" value="<?php echo $this->form_encode_input($telefone_contato) . "\">" . $telefone_contato . ""; ?>
<?php } else { ?>
<span id="id_read_on_telefone_contato" class="sc-ui-readonly-telefone_contato css_telefone_contato_line" style="<?php echo $sStyleReadLab_telefone_contato; ?>"><?php echo $this->form_encode_input($this->telefone_contato); ?></span><span id="id_read_off_telefone_contato" style="white-space: nowrap;<?php echo $sStyleReadInp_telefone_contato; ?>">
 <input class="sc-js-input scFormObjectOdd css_telefone_contato_obj" style="" id="id_sc_field_telefone_contato" type=text name="telefone_contato" value="<?php echo $this->form_encode_input($telefone_contato) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telefone_contato_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telefone_contato_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['data_nascimento']))
    {
        $this->nm_new_label['data_nascimento'] = "Data Nascimento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $data_nascimento = $this->data_nascimento;
   $sStyleHidden_data_nascimento = '';
   if (isset($this->nmgp_cmp_hidden['data_nascimento']) && $this->nmgp_cmp_hidden['data_nascimento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['data_nascimento']);
       $sStyleHidden_data_nascimento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_data_nascimento = 'display: none;';
   $sStyleReadInp_data_nascimento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['data_nascimento']) && $this->nmgp_cmp_readonly['data_nascimento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['data_nascimento']);
       $sStyleReadLab_data_nascimento = '';
       $sStyleReadInp_data_nascimento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['data_nascimento']) && $this->nmgp_cmp_hidden['data_nascimento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="data_nascimento" value="<?php echo $this->form_encode_input($data_nascimento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_data_nascimento_line" id="hidden_field_data_data_nascimento" style="<?php echo $sStyleHidden_data_nascimento; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_data_nascimento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_data_nascimento_label"><span id="id_label_data_nascimento"><?php echo $this->nm_new_label['data_nascimento']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['php_cmp_required']['data_nascimento']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['php_cmp_required']['data_nascimento'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["data_nascimento"]) &&  $this->nmgp_cmp_readonly["data_nascimento"] == "on") { 

 ?>
<input type="hidden" name="data_nascimento" value="<?php echo $this->form_encode_input($data_nascimento) . "\">" . $data_nascimento . ""; ?>
<?php } else { ?>
<span id="id_read_on_data_nascimento" class="sc-ui-readonly-data_nascimento css_data_nascimento_line" style="<?php echo $sStyleReadLab_data_nascimento; ?>"><?php echo $this->form_encode_input($data_nascimento); ?></span><span id="id_read_off_data_nascimento" style="white-space: nowrap;<?php echo $sStyleReadInp_data_nascimento; ?>">
 <input class="sc-js-input scFormObjectOdd css_data_nascimento_obj" style="" id="id_sc_field_data_nascimento" type=text name="data_nascimento" value="<?php echo $this->form_encode_input($data_nascimento) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['data_nascimento']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['data_nascimento']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><?php
$tmp_form_data = $this->field_config['data_nascimento']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_data_nascimento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_data_nascimento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contato_emergencial']))
    {
        $this->nm_new_label['contato_emergencial'] = "Contato Emergencial";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contato_emergencial = $this->contato_emergencial;
   $sStyleHidden_contato_emergencial = '';
   if (isset($this->nmgp_cmp_hidden['contato_emergencial']) && $this->nmgp_cmp_hidden['contato_emergencial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contato_emergencial']);
       $sStyleHidden_contato_emergencial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contato_emergencial = 'display: none;';
   $sStyleReadInp_contato_emergencial = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contato_emergencial']) && $this->nmgp_cmp_readonly['contato_emergencial'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contato_emergencial']);
       $sStyleReadLab_contato_emergencial = '';
       $sStyleReadInp_contato_emergencial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contato_emergencial']) && $this->nmgp_cmp_hidden['contato_emergencial'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contato_emergencial" value="<?php echo $this->form_encode_input($contato_emergencial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contato_emergencial_line" id="hidden_field_data_contato_emergencial" style="<?php echo $sStyleHidden_contato_emergencial; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contato_emergencial_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_contato_emergencial_label"><span id="id_label_contato_emergencial"><?php echo $this->nm_new_label['contato_emergencial']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contato_emergencial"]) &&  $this->nmgp_cmp_readonly["contato_emergencial"] == "on") { 

 ?>
<input type="hidden" name="contato_emergencial" value="<?php echo $this->form_encode_input($contato_emergencial) . "\">" . $contato_emergencial . ""; ?>
<?php } else { ?>
<span id="id_read_on_contato_emergencial" class="sc-ui-readonly-contato_emergencial css_contato_emergencial_line" style="<?php echo $sStyleReadLab_contato_emergencial; ?>"><?php echo $this->form_encode_input($this->contato_emergencial); ?></span><span id="id_read_off_contato_emergencial" style="white-space: nowrap;<?php echo $sStyleReadInp_contato_emergencial; ?>">
 <input class="sc-js-input scFormObjectOdd css_contato_emergencial_obj" style="" id="id_sc_field_contato_emergencial" type=text name="contato_emergencial" value="<?php echo $this->form_encode_input($contato_emergencial) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contato_emergencial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contato_emergencial_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_contato_emergencial_dumb = ('' == $sStyleHidden_contato_emergencial) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_contato_emergencial_dumb" style="<?php echo $sStyleHidden_contato_emergencial_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Dados Específicos<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor_terceirizado']))
    {
        $this->nm_new_label['servidor_terceirizado'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor_terceirizado = $this->servidor_terceirizado;
   $sStyleHidden_servidor_terceirizado = '';
   if (isset($this->nmgp_cmp_hidden['servidor_terceirizado']) && $this->nmgp_cmp_hidden['servidor_terceirizado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor_terceirizado']);
       $sStyleHidden_servidor_terceirizado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor_terceirizado = 'display: none;';
   $sStyleReadInp_servidor_terceirizado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor_terceirizado']) && $this->nmgp_cmp_readonly['servidor_terceirizado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor_terceirizado']);
       $sStyleReadLab_servidor_terceirizado = '';
       $sStyleReadInp_servidor_terceirizado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor_terceirizado']) && $this->nmgp_cmp_hidden['servidor_terceirizado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor_terceirizado" value="<?php echo $this->form_encode_input($servidor_terceirizado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor_terceirizado_line" id="hidden_field_data_servidor_terceirizado" style="<?php echo $sStyleHidden_servidor_terceirizado; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_servidor_terceirizado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor_terceirizado_label"><span id="id_label_servidor_terceirizado"><?php echo $this->nm_new_label['servidor_terceirizado']; ?></span></span><br>
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['embutida_liga_form_insert'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['embutida_liga_form_update'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['embutida_parms'] = "NM_btn_insert?#?N?@?NM_btn_update?#?N?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['foreign_key']['id_paciente'] = $this->nmgp_dados_form['id_paciente'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['where_filter'] = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['where_detal']  = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_terceirizado_pront']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_prontuario_backup_mob_empty.htm' : $this->Ini->link_form_servidor_terceirizado_pront_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y');
?>
<iframe border="0" id="nmsc_iframe_liga_form_servidor_terceirizado_pront"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_servidor_terceirizado_pront"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor_terceirizado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor_terceirizado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servidor']))
    {
        $this->nm_new_label['servidor'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $servidor = $this->servidor;
   $sStyleHidden_servidor = '';
   if (isset($this->nmgp_cmp_hidden['servidor']) && $this->nmgp_cmp_hidden['servidor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servidor']);
       $sStyleHidden_servidor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servidor = 'display: none;';
   $sStyleReadInp_servidor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servidor']) && $this->nmgp_cmp_readonly['servidor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servidor']);
       $sStyleReadLab_servidor = '';
       $sStyleReadInp_servidor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servidor']) && $this->nmgp_cmp_hidden['servidor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servidor" value="<?php echo $this->form_encode_input($servidor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servidor_line" id="hidden_field_data_servidor" style="<?php echo $sStyleHidden_servidor; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_servidor_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servidor_label"><span id="id_label_servidor"><?php echo $this->nm_new_label['servidor']; ?></span></span><br>
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['embutida_liga_form_insert'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['embutida_liga_form_update'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['embutida_parms'] = "id_paciente?#?" . $this->nmgp_dados_form['id_paciente'] . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?N?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['foreign_key']['id_paciente'] = $this->nmgp_dados_form['id_paciente'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['where_filter'] = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['where_detal']  = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_servidor_pront']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_prontuario_backup_mob_empty.htm' : $this->Ini->link_form_servidor_pront_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y');
?>
<iframe border="0" id="nmsc_iframe_liga_form_servidor_pront"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_servidor_pront"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servidor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servidor_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['aluno']))
    {
        $this->nm_new_label['aluno'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $aluno = $this->aluno;
   $sStyleHidden_aluno = '';
   if (isset($this->nmgp_cmp_hidden['aluno']) && $this->nmgp_cmp_hidden['aluno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['aluno']);
       $sStyleHidden_aluno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_aluno = 'display: none;';
   $sStyleReadInp_aluno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['aluno']) && $this->nmgp_cmp_readonly['aluno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['aluno']);
       $sStyleReadLab_aluno = '';
       $sStyleReadInp_aluno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['aluno']) && $this->nmgp_cmp_hidden['aluno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="aluno" value="<?php echo $this->form_encode_input($aluno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_aluno_line" id="hidden_field_data_aluno" style="<?php echo $sStyleHidden_aluno; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_aluno_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_aluno_label"><span id="id_label_aluno"><?php echo $this->nm_new_label['aluno']; ?></span></span><br>
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['embutida_liga_form_insert'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['embutida_liga_form_update'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['embutida_parms'] = "id_paciente?#?" . $this->nmgp_dados_form['id_paciente'] . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?N?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['foreign_key']['id_paciente'] = $this->nmgp_dados_form['id_paciente'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['where_filter'] = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['where_detal']  = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_aluno_pront']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_prontuario_backup_mob_empty.htm' : $this->Ini->link_form_aluno_pront_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y');
?>
<iframe border="0" id="nmsc_iframe_liga_form_aluno_pront"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_aluno_pront"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_aluno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_aluno_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['visitante']))
    {
        $this->nm_new_label['visitante'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $visitante = $this->visitante;
   $sStyleHidden_visitante = '';
   if (isset($this->nmgp_cmp_hidden['visitante']) && $this->nmgp_cmp_hidden['visitante'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['visitante']);
       $sStyleHidden_visitante = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_visitante = 'display: none;';
   $sStyleReadInp_visitante = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['visitante']) && $this->nmgp_cmp_readonly['visitante'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['visitante']);
       $sStyleReadLab_visitante = '';
       $sStyleReadInp_visitante = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['visitante']) && $this->nmgp_cmp_hidden['visitante'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="visitante" value="<?php echo $this->form_encode_input($visitante) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_visitante_line" id="hidden_field_data_visitante" style="<?php echo $sStyleHidden_visitante; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_visitante_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_visitante_label"><span id="id_label_visitante"><?php echo $this->nm_new_label['visitante']; ?></span></span><br>
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['embutida_liga_form_insert'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['embutida_liga_form_update'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['embutida_parms'] = "id_paciente?#?" . $this->nmgp_dados_form['id_paciente'] . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?N?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['foreign_key']['id_paciente'] = $this->nmgp_dados_form['id_paciente'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['where_filter'] = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['where_detal']  = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_visitante_pront']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_prontuario_backup_mob_empty.htm' : $this->Ini->link_form_visitante_pront_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y');
?>
<iframe border="0" id="nmsc_iframe_liga_form_visitante_pront"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_visitante_pront"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_visitante_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_visitante_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_visitante_dumb = ('' == $sStyleHidden_visitante) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_visitante_dumb" style="<?php echo $sStyleHidden_visitante_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Triagem<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['triagem']))
    {
        $this->nm_new_label['triagem'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $triagem = $this->triagem;
   $sStyleHidden_triagem = '';
   if (isset($this->nmgp_cmp_hidden['triagem']) && $this->nmgp_cmp_hidden['triagem'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['triagem']);
       $sStyleHidden_triagem = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_triagem = 'display: none;';
   $sStyleReadInp_triagem = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['triagem']) && $this->nmgp_cmp_readonly['triagem'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['triagem']);
       $sStyleReadLab_triagem = '';
       $sStyleReadInp_triagem = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['triagem']) && $this->nmgp_cmp_hidden['triagem'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="triagem" value="<?php echo $this->form_encode_input($triagem) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_triagem_line" id="hidden_field_data_triagem" style="<?php echo $sStyleHidden_triagem; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_triagem_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_triagem_label"><span id="id_label_triagem"><?php echo $this->nm_new_label['triagem']; ?></span></span><br>
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_form_btn_nav'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['embutida_parms'] = "NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?S?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['foreign_key']['id_paciente'] = $this->nmgp_dados_form['id_paciente'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter'] = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_detal']  = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_triagem_pront']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_prontuario_backup_mob_empty.htm' : $this->Ini->link_form_triagem_pront_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y&sc_ifr_height=300');
?>
<iframe border="0" id="nmsc_iframe_liga_form_triagem_pront"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="300" width="1100" name="nmsc_iframe_liga_form_triagem_pront"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_triagem_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_triagem_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_triagem_dumb = ('' == $sStyleHidden_triagem) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_triagem_dumb" style="<?php echo $sStyleHidden_triagem_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf3\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Evolução Médica<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['evolucao_medica']))
    {
        $this->nm_new_label['evolucao_medica'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $evolucao_medica = $this->evolucao_medica;
   $sStyleHidden_evolucao_medica = '';
   if (isset($this->nmgp_cmp_hidden['evolucao_medica']) && $this->nmgp_cmp_hidden['evolucao_medica'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['evolucao_medica']);
       $sStyleHidden_evolucao_medica = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_evolucao_medica = 'display: none;';
   $sStyleReadInp_evolucao_medica = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['evolucao_medica']) && $this->nmgp_cmp_readonly['evolucao_medica'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['evolucao_medica']);
       $sStyleReadLab_evolucao_medica = '';
       $sStyleReadInp_evolucao_medica = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['evolucao_medica']) && $this->nmgp_cmp_hidden['evolucao_medica'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="evolucao_medica" value="<?php echo $this->form_encode_input($evolucao_medica) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_evolucao_medica_line" id="hidden_field_data_evolucao_medica" style="<?php echo $sStyleHidden_evolucao_medica; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_evolucao_medica_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_evolucao_medica_label"><span id="id_label_evolucao_medica"><?php echo $this->nm_new_label['evolucao_medica']; ?></span></span><br>
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['embutida_liga_form_btn_nav'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['embutida_parms'] = "NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?S?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['foreign_key']['id_paciente'] = $this->nmgp_dados_form['id_paciente'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['where_filter'] = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['where_detal']  = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_medica_pront']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_prontuario_backup_mob_empty.htm' : $this->Ini->link_form_evolucao_medica_pront_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y');
?>
<iframe border="0" id="nmsc_iframe_liga_form_evolucao_medica_pront"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_evolucao_medica_pront"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_evolucao_medica_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_evolucao_medica_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_evolucao_medica_dumb = ('' == $sStyleHidden_evolucao_medica) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_evolucao_medica_dumb" style="<?php echo $sStyleHidden_evolucao_medica_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf4\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Conduta Médica<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['conduta_medica']))
    {
        $this->nm_new_label['conduta_medica'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $conduta_medica = $this->conduta_medica;
   $sStyleHidden_conduta_medica = '';
   if (isset($this->nmgp_cmp_hidden['conduta_medica']) && $this->nmgp_cmp_hidden['conduta_medica'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['conduta_medica']);
       $sStyleHidden_conduta_medica = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_conduta_medica = 'display: none;';
   $sStyleReadInp_conduta_medica = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['conduta_medica']) && $this->nmgp_cmp_readonly['conduta_medica'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['conduta_medica']);
       $sStyleReadLab_conduta_medica = '';
       $sStyleReadInp_conduta_medica = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['conduta_medica']) && $this->nmgp_cmp_hidden['conduta_medica'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="conduta_medica" value="<?php echo $this->form_encode_input($conduta_medica) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_conduta_medica_line" id="hidden_field_data_conduta_medica" style="<?php echo $sStyleHidden_conduta_medica; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_conduta_medica_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_conduta_medica_label"><span id="id_label_conduta_medica"><?php echo $this->nm_new_label['conduta_medica']; ?></span></span><br>
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['embutida_liga_form_btn_nav'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['embutida_parms'] = "NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?S?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['foreign_key']['id_paciente'] = $this->nmgp_dados_form['id_paciente'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['where_filter'] = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['where_detal']  = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_medica_pront']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_prontuario_backup_mob_empty.htm' : $this->Ini->link_form_conduta_medica_pront_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y');
?>
<iframe border="0" id="nmsc_iframe_liga_form_conduta_medica_pront"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_conduta_medica_pront"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_conduta_medica_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_conduta_medica_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_conduta_medica_dumb = ('' == $sStyleHidden_conduta_medica) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_conduta_medica_dumb" style="<?php echo $sStyleHidden_conduta_medica_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf5\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Evolução Odontológica<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['evolucao_odontologica']))
    {
        $this->nm_new_label['evolucao_odontologica'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $evolucao_odontologica = $this->evolucao_odontologica;
   $sStyleHidden_evolucao_odontologica = '';
   if (isset($this->nmgp_cmp_hidden['evolucao_odontologica']) && $this->nmgp_cmp_hidden['evolucao_odontologica'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['evolucao_odontologica']);
       $sStyleHidden_evolucao_odontologica = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_evolucao_odontologica = 'display: none;';
   $sStyleReadInp_evolucao_odontologica = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['evolucao_odontologica']) && $this->nmgp_cmp_readonly['evolucao_odontologica'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['evolucao_odontologica']);
       $sStyleReadLab_evolucao_odontologica = '';
       $sStyleReadInp_evolucao_odontologica = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['evolucao_odontologica']) && $this->nmgp_cmp_hidden['evolucao_odontologica'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="evolucao_odontologica" value="<?php echo $this->form_encode_input($evolucao_odontologica) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_evolucao_odontologica_line" id="hidden_field_data_evolucao_odontologica" style="<?php echo $sStyleHidden_evolucao_odontologica; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_evolucao_odontologica_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_evolucao_odontologica_label"><span id="id_label_evolucao_odontologica"><?php echo $this->nm_new_label['evolucao_odontologica']; ?></span></span><br>
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['embutida_liga_form_btn_nav'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['embutida_parms'] = "NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?S?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['foreign_key']['id_paciente'] = $this->nmgp_dados_form['id_paciente'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['where_filter'] = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['where_detal']  = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_evolucao_odontologica_pront']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_prontuario_backup_mob_empty.htm' : $this->Ini->link_form_evolucao_odontologica_pront_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y');
?>
<iframe border="0" id="nmsc_iframe_liga_form_evolucao_odontologica_pront"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_evolucao_odontologica_pront"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_evolucao_odontologica_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_evolucao_odontologica_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_evolucao_odontologica_dumb = ('' == $sStyleHidden_evolucao_odontologica) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_evolucao_odontologica_dumb" style="<?php echo $sStyleHidden_evolucao_odontologica_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_6"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_6"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_6" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf6\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Condulta Odontológica<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['conduta_odontologica']))
    {
        $this->nm_new_label['conduta_odontologica'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $conduta_odontologica = $this->conduta_odontologica;
   $sStyleHidden_conduta_odontologica = '';
   if (isset($this->nmgp_cmp_hidden['conduta_odontologica']) && $this->nmgp_cmp_hidden['conduta_odontologica'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['conduta_odontologica']);
       $sStyleHidden_conduta_odontologica = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_conduta_odontologica = 'display: none;';
   $sStyleReadInp_conduta_odontologica = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['conduta_odontologica']) && $this->nmgp_cmp_readonly['conduta_odontologica'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['conduta_odontologica']);
       $sStyleReadLab_conduta_odontologica = '';
       $sStyleReadInp_conduta_odontologica = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['conduta_odontologica']) && $this->nmgp_cmp_hidden['conduta_odontologica'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="conduta_odontologica" value="<?php echo $this->form_encode_input($conduta_odontologica) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_conduta_odontologica_line" id="hidden_field_data_conduta_odontologica" style="<?php echo $sStyleHidden_conduta_odontologica; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_conduta_odontologica_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_conduta_odontologica_label"><span id="id_label_conduta_odontologica"><?php echo $this->nm_new_label['conduta_odontologica']; ?></span></span><br>
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['embutida_liga_form_btn_nav'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['embutida_parms'] = "NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?S?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['foreign_key']['id_paciente'] = $this->nmgp_dados_form['id_paciente'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['where_filter'] = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['where_detal']  = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_conduta_odontologica_pront']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_prontuario_backup_mob_empty.htm' : $this->Ini->link_form_conduta_odontologica_pront_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y');
?>
<iframe border="0" id="nmsc_iframe_liga_form_conduta_odontologica_pront"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_conduta_odontologica_pront"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_conduta_odontologica_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_conduta_odontologica_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_conduta_odontologica_dumb = ('' == $sStyleHidden_conduta_odontologica) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_conduta_odontologica_dumb" style="<?php echo $sStyleHidden_conduta_odontologica_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_7"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_7"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_7" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf7\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Prescrição Médica/Odontológica<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['prescricao']))
    {
        $this->nm_new_label['prescricao'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $prescricao = $this->prescricao;
   $sStyleHidden_prescricao = '';
   if (isset($this->nmgp_cmp_hidden['prescricao']) && $this->nmgp_cmp_hidden['prescricao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['prescricao']);
       $sStyleHidden_prescricao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_prescricao = 'display: none;';
   $sStyleReadInp_prescricao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['prescricao']) && $this->nmgp_cmp_readonly['prescricao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['prescricao']);
       $sStyleReadLab_prescricao = '';
       $sStyleReadInp_prescricao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['prescricao']) && $this->nmgp_cmp_hidden['prescricao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="prescricao" value="<?php echo $this->form_encode_input($prescricao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_prescricao_line" id="hidden_field_data_prescricao" style="<?php echo $sStyleHidden_prescricao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_prescricao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_prescricao_label"><span id="id_label_prescricao"><?php echo $this->nm_new_label['prescricao']; ?></span></span><br>
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_form_btn_nav'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['embutida_parms'] = "id_prescricao?#?" . $this->nmgp_dados_form['id_paciente'] . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?S?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['foreign_key']['id_paciente'] = $this->nmgp_dados_form['id_paciente'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['where_filter'] = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['where_detal']  = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_prescricao_pront']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_prontuario_backup_mob_empty.htm' : $this->Ini->link_form_prescricao_pront_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y');
?>
<iframe border="0" id="nmsc_iframe_liga_form_prescricao_pront"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_prescricao_pront"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prescricao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prescricao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_prescricao_dumb = ('' == $sStyleHidden_prescricao) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_prescricao_dumb" style="<?php echo $sStyleHidden_prescricao_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_8"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_8"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_8" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf8\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Registro de Enfermagem<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['registro_de_enfermagem']))
    {
        $this->nm_new_label['registro_de_enfermagem'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $registro_de_enfermagem = $this->registro_de_enfermagem;
   $sStyleHidden_registro_de_enfermagem = '';
   if (isset($this->nmgp_cmp_hidden['registro_de_enfermagem']) && $this->nmgp_cmp_hidden['registro_de_enfermagem'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['registro_de_enfermagem']);
       $sStyleHidden_registro_de_enfermagem = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_registro_de_enfermagem = 'display: none;';
   $sStyleReadInp_registro_de_enfermagem = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['registro_de_enfermagem']) && $this->nmgp_cmp_readonly['registro_de_enfermagem'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['registro_de_enfermagem']);
       $sStyleReadLab_registro_de_enfermagem = '';
       $sStyleReadInp_registro_de_enfermagem = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['registro_de_enfermagem']) && $this->nmgp_cmp_hidden['registro_de_enfermagem'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="registro_de_enfermagem" value="<?php echo $this->form_encode_input($registro_de_enfermagem) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_registro_de_enfermagem_line" id="hidden_field_data_registro_de_enfermagem" style="<?php echo $sStyleHidden_registro_de_enfermagem; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_registro_de_enfermagem_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_registro_de_enfermagem_label"><span id="id_label_registro_de_enfermagem"><?php echo $this->nm_new_label['registro_de_enfermagem']; ?></span></span><br>
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['embutida_liga_form_btn_nav'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['embutida_parms'] = "NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?S?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['foreign_key']['id_paciente'] = $this->nmgp_dados_form['id_paciente'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['where_filter'] = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['where_detal']  = "id_paciente = " . $this->nmgp_dados_form['id_paciente'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_registro_de_enfermagem_pront']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_prontuario_backup_mob_empty.htm' : $this->Ini->link_form_registro_de_enfermagem_pront_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y');
?>
<iframe border="0" id="nmsc_iframe_liga_form_registro_de_enfermagem_pront"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_registro_de_enfermagem_pront"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_registro_de_enfermagem_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_registro_de_enfermagem_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
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
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
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
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['masterValue']);
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
 parent.scAjaxDetailStatus("form_prontuario_backup_mob");
 parent.scAjaxDetailHeight("form_prontuario_backup_mob", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_prontuario_backup_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_prontuario_backup_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_prontuario_backup_mob']['sc_modal'])
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
</body> 
</html> 
