<?php
include_once('grid_atendimento_session.php');
@session_start() ;

ini_set('default_charset', $_SESSION['scriptcase']['charset']);
$oExportPdf = new grid_atendimento_export_pdf;
$oExportPdf->exportPdf();

class grid_atendimento_export_pdf {

function exportPdf() {

$aParams = array();
$prep    = (isset($_POST['sc_tp_pdf']) || isset($_POST['nmgp_tipo_pdf'])) ? $_POST : $_GET;
foreach ($prep as $nmgp_var => $nmgp_val)
{
    if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
    {
        $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
        if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Md5_pdf'][$SC_Ind_Val[3]]))
        {
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Md5_pdf'][$SC_Ind_Val[3]];
        }
        else
        {
            echo "<html>";
            echo "<body>";
            echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
            echo "<tr>";
            echo "   <td align=\"center\">";
            echo "       <b><font size=4>Invalid Data</font>";
            echo "   </b></td>";
            echo " </tr>";
            echo "</table>";
            echo "</body>";
            echo "</html>";
            exit;
        }
    }
    $aParams[$nmgp_var] = $nmgp_val;
}
if (isset($aParams['nmgp_parms'])) 
{ 
    $todo  = explode("?@?", $aParams['nmgp_parms']);
    foreach ($todo as $param)
    {
        $cadapar = explode("?#?", $param);
        $tmp_p = $cadapar[0];
        $aParams[$tmp_p] = $cadapar[1];
    }
}

$parms_pdf = (isset($aParams['sc_parms_pdf'])) ? $aParams['sc_parms_pdf'] : "";
$graf_pdf  = (isset($aParams['sc_graf_pdf']))  ? $aParams['sc_graf_pdf']  : "";
if (!function_exists("NM_is_utf8"))
{
    include_once("../_lib/lib/php/nm_utf8.php");
}
if (!function_exists("nmButtonOutput"))
{
    include_once("../_lib/lib/php/nm_gp_config_btn.php");
}
$STR_schema = '';
$STR_tmp    = '';
$STR_prod   = '';
$STR_btn    = '';
$STR_lang   = '';
if (isset($_SESSION['sc_session'][ $aParams['script_case_init'] ]['grid_atendimento']['grid_atendimento_iframe_params']))
{
    $STR_schema = $_SESSION['sc_session'][ $aParams['script_case_init'] ]['grid_atendimento']['grid_atendimento_iframe_params']['str_schema'];
    $STR_tmp    = $_SESSION['sc_session'][ $aParams['script_case_init'] ]['grid_atendimento']['grid_atendimento_iframe_params']['str_tmp'];
    $STR_prod   = $_SESSION['sc_session'][ $aParams['script_case_init'] ]['grid_atendimento']['grid_atendimento_iframe_params']['str_prod'];
    $STR_btn    = $_SESSION['sc_session'][ $aParams['script_case_init'] ]['grid_atendimento']['grid_atendimento_iframe_params']['str_btn'];
    $STR_lang   = $_SESSION['sc_session'][ $aParams['script_case_init'] ]['grid_atendimento']['grid_atendimento_iframe_params']['str_lang'];
}
$Nm_lang     = array();
$this->path_botoes = '../_lib/img';
if (@is_file("../_lib/lang/" . $STR_lang . ".lang.php"))
{
    include("../_lib/lang/" . $STR_lang . ".lang.php");
}
else
{
    include("../_lib/lang/en_us.lang.php");
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
$Nm_lang = $this->Nm_lang;
$_str_btn_file = '../_lib/buttons/' . str_replace('.css', $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php', $STR_btn);
if (@is_file($_str_btn_file))
{
    include_once($_str_btn_file);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<head>
 <title><?php echo $Nm_lang['lang_othr_grid_titl'] ?> - atendimento :: PDF</title>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
 if ($_SESSION['scriptcase']['proc_mobile'])
 {
?>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
 }
?>
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $STR_schema; ?>_export.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $STR_schema; ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $STR_btn; ?>" /> 
 <script type="text/javascript" src="<?php echo $STR_prod; ?>/third/jquery/js/jquery.js"></script>
 <script type="text/javascript">
 $(function(){
  buttonDisable("idBtnView");
  buttonDisable("idBtnDown");
  checkPDF();
 });
 function viewClick() {
  if ($("#idBtnView").prop("disabled")) {
   return;
  }
  document.Fview.submit()
 }
 function downloadClick() {
  if ($("#idBtnDown").prop("disabled")) {
   return;
  }
  document.Fdown.submit()
 }
 function buttonDisable(buttonId) {
  $("#" + buttonId).prop("disabled", true).addClass("scButton_disabled");
 }
 function buttonEnable(buttonId) {
  $("#" + buttonId).prop("disabled", false).removeClass("scButton_disabled");
 }
 function checkPDF() {
  $.get(nm_url_rand("grid_atendimento_gauge_ctrl.php"), {
   pbfile    : "<?php echo base64_encode($aParams['pbfile']) ?>",
   sc_apbgcol: "<?php echo NM_encode_input($aParams['sc_apbgcol']) ?>",
   str_lang  : "<?php echo base64_encode($aParams['str_lang']); ?>",
   str_schema: "<?php echo $STR_schema ?>"
  },
  function (data){
   var aInfo = data.split("!#!");
   if (4 == aInfo.length) {
    var iSize = aInfo[0],
        iStep = aInfo[1],
        iEnd  = aInfo[2],
        sMsg  = aInfo[3],
        iPerc = Math.floor((iStep * 95) / iSize);
    if (1 == iEnd) {
     iPerc = 100;
    }
    if (1 <= iPerc) {
     $("#idPbarDone").css("display", "");
    }
    $("#idMessage").html(sMsg);
    $("#idPbarDone").css("width", iPerc + "%");
    $("#idPbarRest").css("width", (100 - iPerc) + "%");
    if (1 == iEnd) {
     buttonEnable("idBtnView");
     buttonEnable("idBtnDown");
     $("#idPbarRest").css("display", "none");
     return;
    }
   }
   setTimeout("checkPDF()", 1000);
  });
 }
 function nm_url_rand(v_str_url)
 {
  str_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  str_rand  = v_str_url;
  str_rand += (-1 == v_str_url.indexOf('?')) ? '?' : '&';
  str_rand += 'r=';
  for (i = 0; i < 8; i++)
  {
   str_rand += str_chars.charAt(Math.round(str_chars.length * Math.random()));
  }
  return str_rand;
 }
 </script>
</head>
<body class="scExportPage">
<?php
$NM_pdfbase = (isset($_SESSION['sc_session'][$aParams['script_case_init']]['grid_atendimento']['pdf_name'])) ? $_SESSION['sc_session'][$aParams['script_case_init']]['grid_atendimento']['pdf_name'] : 'sc_pdf_' . date('YmdHis') . '_' . rand(0, 1000) . '_grid_atendimento.pdf';
$NM_tit_doc = (isset($_SESSION['sc_session'][$aParams['script_case_init']]['grid_atendimento']['pdf_name'])) ? $_SESSION['sc_session'][$aParams['script_case_init']]['grid_atendimento']['pdf_name'] : "grid_atendimento.pdf";
$NM_pdfurl  = $STR_tmp;
$NM_target  = "_self";
$path_doc_md5 = md5($NM_pdfurl . "/" . $NM_pdfbase);
$_SESSION['sc_session'][$aParams['script_case_init']]['grid_atendimento'][$path_doc_md5][0] = $NM_pdfurl . "/" . $NM_pdfbase;
$_SESSION['sc_session'][$aParams['script_case_init']]['grid_atendimento'][$path_doc_md5][1] = $NM_tit_doc;
$NM_volta   = "volta_grid";
$NM_volta   = (!isset($aParams['nmgp_opcao']) || 'pdf_res' != $aParams['nmgp_opcao']) ? "volta_grid" : "resumo";
?>
<form name="F0" method="post" action="./" target="<?php echo $NM_target; ?>" style="display: none"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($NM_volta); ?>"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($aParams['script_case_init']); ?>"> 
<input type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
</form>
<form name="Fdown" method="get" action="grid_atendimento_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($aParams['script_case_init']); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_atendimento"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="Fview" method="get" action="<?php echo $NM_pdfurl . "/" . $NM_pdfbase;?>" target="_blank" style="display: none"> 
</form>
<table style="border-collapse: collapse; border-width: 0; height: 98%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PDF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td style="padding: 0; text-align: center" colspan="2">
     <table class="scExportBar" style="width: 100%" align="center">
      <tr>
       <td class="scExportBarDone" style="width: 0; display: none" id="idPbarDone"></td>
       <td class="scExportBarRest" style="width: 100%" id="idPbarRest"></td>
      </tr>
     </table>
    </td></tr><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    &nbsp;
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "viewClick()", "viewClick()", "idBtnView", "", "", "", "", "", "", $this->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "downloadClick()", "downloadClick()", "idBtnDown", "", "", "", "", "", "", $this->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
    </td></tr></table>
<?php
if (!isset($aParams['nmgp_opcao']) || 'pdf_res' != $aParams['nmgp_opcao'])
{
?>
<iframe name="nmIfrPdf" height="1px" width="1px" frameborder="0" scrolling="no" allowtransparency="true" src="index.php?nmgp_opcao=pdf&script_case_init=<?php echo NM_encode_input($aParams['script_case_init']) ?>&script_case_session=<?php echo session_id() ?>&pbfile=<?php echo NM_encode_input($aParams['pbfile']) ?>&pdf_base=<?php echo str_replace("+", "_NMPLUS_",$NM_pdfbase) ?>&pdf_url=<?php echo $NM_pdfurl ?>&sc_apbgcol=<?php echo NM_encode_input($aParams['sc_apbgcol']) ?>&nmgp_tipo_pdf=<?php echo NM_encode_input($aParams['sc_tp_pdf']) ?>&nmgp_parms_pdf=<?php echo $parms_pdf ?>&nmgp_graf_pdf=<?php echo $graf_pdf ?>"></iframe>
<?php
}
else
{
?>
<iframe name="nmIfrPdf" height="1px" width="1px" frameborder="0" scrolling="no" allowtransparency="true" src="index.php?nmgp_opcao=pdf_res&script_case_init=<?php echo NM_encode_input($aParams['script_case_init']) ?>&script_case_session=<?php echo session_id() ?>&pbfile=<?php echo NM_encode_input($aParams['pbfile']) ?>&pdf_base=<?php echo str_replace("+", "_NMPLUS_",$NM_pdfbase) ?>&pdf_url=<?php echo $NM_pdfurl ?>&sc_apbgcol=<?php echo NM_encode_input($aParams['sc_apbgcol']) ?>&nmgp_tipo_pdf=<?php echo NM_encode_input($aParams['sc_tp_pdf']) ?>&nmgp_parms_pdf=<?php echo $parms_pdf ?>&nmgp_graf_pdf=<?php echo $graf_pdf ?>"></iframe>
<?php
}
?>
   </td>
  </tr>
 </table>
</td></tr></table>
</body>
</html>
<?php
}

}

?>
