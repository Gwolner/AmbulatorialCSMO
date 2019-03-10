<?php
/**
 * $Id: nm_gp_config_pdf.php,v 1.6 2012-01-31 19:33:19 luis Exp $
 */
    include_once('grid_atendimento_session.php');
    session_start();
    $SC_apl_proc = "grid_atendimento";

    $bookmarks    = (isset($_GET['bookmarks']))    ? $_GET['bookmarks'] : "";
    $fonte        = (isset($_GET['conf_fonte']))   ? $_GET['conf_fonte'] : "0";
    $grafico      = (isset($_GET['grafico']))      ? $_GET['grafico'] : "";
    $largura      = (isset($_GET['largura']))      ? $_GET['largura'] : "";
    $opc          = (isset($_GET['nm_opc']))       ? $_GET['nm_opc'] : "";
    $target       = (isset($_GET['nm_target']))    ? $_GET['nm_target'] : "";
    $language     = (isset($_GET['language']))     ? $_GET['language'] : "en_us";
    $papel        = (isset($_GET['papel']))        ? $_GET['papel'] : "";
    $cor          = (isset($_GET['nm_cor']))       ? $_GET['nm_cor'] : "";
    $orientacao   = (isset($_GET['orientacao']))   ? $_GET['orientacao'] : "";
    $conf_larg    = (isset($_GET['conf_larg']))    ? $_GET['conf_larg'] : "N";
    $conf_socor   = (isset($_GET['conf_socor']))   ? $_GET['conf_socor'] : "N";
    $apapel       = (isset($_GET['apapel']))       ? $_GET['apapel'] : "";
    $lpapel       = (isset($_GET['lpapel']))       ? $_GET['lpapel'] : "";
    $is_chart_app = (isset($_GET['is_chart_app'])) ? 'Y' == $_GET['is_chart_app'] : false;

    ini_set('default_charset', $_SESSION['scriptcase']['charset']);
    if (!function_exists("NM_is_utf8"))
    {
        include_once("../_lib/lib/php/nm_utf8.php");
    }

    $tradutor = array();
    if (isset($_SESSION['scriptcase']['sc_idioma_pdf']))
    {
        $tradutor = $_SESSION['scriptcase']['sc_idioma_pdf'];
    }
    if (!isset($tradutor[$language]))
    {
         foreach ($tradutor as $language => $resto)
         {
             break;
         }
    }
    if (!isset($tradutor[$language]))
    {
                exit;
    }
    $tp_papel = array();
    if (!isset($_SESSION['scriptcase']['sc_tp_pdf']) || $_SESSION['scriptcase']['sc_tp_pdf'] == "pd4ml")
    {
        $tp_papel[1]  = "LETTER";
        $tp_papel[2]  = "LEGAL";
        $tp_papel[3]  = "LEDGER";
        $tp_papel[4]  = "A0";
        $tp_papel[5]  = "A1";
        $tp_papel[6]  = "A2";
        $tp_papel[7]  = "A3";
        $tp_papel[8]  = "A4";
        $tp_papel[9]  = "A5";
        $tp_papel[10] = "A6";
        $tp_papel[11] = "ISOB5";
        $tp_papel[12] = "TABLOID";
        $tp_papel[13] = "TABLOID ";
        $tp_papel[14] = "A4";
        $tp_papel[15] = "A4";
        $tp_papel[16] = "A7";
        $tp_papel[17] = "A8";
        $tp_papel[18] = "A9";
        $tp_papel[19] = "A10";
        $tp_papel[20] = "ISOB0";
        $tp_papel[21] = "ISOB1";
        $tp_papel[22] = "ISOB2";
        $tp_papel[23] = "ISOB3";
        $tp_papel[24] = "ISOB4";
        $tp_papel[25] = "NOTE";
        $tp_papel[26] = "HALFLETTER";
    }
    else
    {
        $tp_papel[1]  = "Letter";
        $tp_papel[2]  = "Legal";
        $tp_papel[3]  = "Ledger";
        $tp_papel[4]  = "A0";
        $tp_papel[5]  = "A1";
        $tp_papel[6]  = "A2";
        $tp_papel[7]  = "A3";
        $tp_papel[8]  = "A4";
        $tp_papel[9]  = "A5";
        $tp_papel[10] = "A6";
        $tp_papel[11] = "B5";
        $tp_papel[12] = "Tabloid";
        $tp_papel[13] = "Tabloid ";
        $tp_papel[14] = "A4";
        $tp_papel[15] = "A4";
        $tp_papel[16] = "A7";
        $tp_papel[17] = "A8";
        $tp_papel[18] = "A9";
        $tp_papel[19] = "A9";
        $tp_papel[20] = "B0";
        $tp_papel[21] = "B1";
        $tp_papel[22] = "B2";
        $tp_papel[23] = "B3";
        $tp_papel[24] = "B4";
        $tp_papel[25] = "Executive";
        $tp_papel[26] = "A5";
        $tp_papel[27] = "B6";
        $tp_papel[28] = "B7";
        $tp_papel[29] = "B8";
        $tp_papel[30] = "B9";
        $tp_papel[31] = "B10";
        $tp_papel[32] = "C5E";
        $tp_papel[33] = "Comm10E";
        $tp_papel[34] = "DLE";
        $tp_papel[35] = "Folio";
    }

    if (!isset($tp_papel[$papel]))
    {
        $papel = 8;
    }
    if (!isset($tp_papel[$apapel]))
    {
        $apapel = 8;
    }

?>
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
<?php
if ((isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])  || (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
?>
 <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup'] ?>" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_dir'] ?>" />
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $_SESSION['scriptcase']['css_btn_popup'] ?>" />
</head>
<body class="scGridPage" style="margin: 0px; overflow-x: hidden">

<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.js"></script>

<form name="config_pdf" method="post">
<?php
if ($_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'")
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; right: 20px\">";
}
else
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; left: 20px\">";
}
?>
<tr>
 <td>
 <div class="scGridBorder">
  <table class="scGridTabela" width='100%' cellspacing=0 cellpadding=0>
   <tr class="scGridLabelVert">
    <td align="middle" nowrap>
      <b><?php echo $tradutor[$language]['titulo']; ?></b>
    </td>
   </tr>

 <tr><td>
 <table style="border-collapse: collapse; border-width: 0px">
 <tr class="scGridFieldOddVert">
   <td>
     <?php echo $tradutor[$language]['tp_imp']; ?>
   </td>
   <td>
     <select  name="cor_imp"  size=1>
       <option value="cor"      <?php if ($cor == "cor")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['color']; ?></option>
       <option value="pb"       <?php if ($cor == "pb")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['econm']; ?></option>
     </select>
   </td>
 </tr>
<?php
if ($conf_socor == "N")
{
?>
 <tr class="scGridFieldOddVert">
   <td>
     <?php echo $tradutor[$language]['tp_pap']; ?>
   </td>
   <td>
<?php
  if (!isset($_SESSION['scriptcase']['sc_tp_pdf']) || $_SESSION['scriptcase']['sc_tp_pdf'] == "pd4ml")
  {
//      echo "     <select  name=\"papel\" size=1 onchange=custom_paper()>\r\n";
      echo "     <select  name=\"papel\" size=1>\r\n";
      echo "       <option value=\"" . $tp_papel[1]  . "\""; if ($papel == "1")   { echo " selected" ;} echo ">" . $tradutor[$language]['carta'] . " (216 x 279 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[2]  . "\""; if ($papel == "2")   { echo " selected" ;} echo ">" . $tradutor[$language]['oficio'] . " (216 x 356 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[3]  . "\""; if ($papel == "3")   { echo " selected" ;} echo ">Ledger (432 x 279 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[4]  . "\""; if ($papel == "4")   { echo " selected" ;} echo ">A0 (841 X 1189 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[5]  . "\""; if ($papel == "5")   { echo " selected" ;} echo ">A1 (594 x 841  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[6]  . "\""; if ($papel == "6")   { echo " selected" ;} echo ">A2 (420 x 594  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[7]  . "\""; if ($papel == "7")   { echo " selected" ;} echo ">A3 (297 x 420  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[8]  . "\""; if ($papel == "8")   { echo " selected" ;} echo ">A4 (210 X 297  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[9]  . "\""; if ($papel == "9")   { echo " selected" ;} echo ">A5 (148 x 210  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[10] . "\""; if ($papel == "10")  { echo " selected" ;} echo ">A6 (105 x 148  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[16] . "\""; if ($papel == "16")  { echo " selected" ;} echo ">A7 (74  x 105  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[17] . "\""; if ($papel == "17")  { echo " selected" ;} echo ">A8 (52  x 74   mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[18] . "\""; if ($papel == "18")  { echo " selected" ;} echo ">A9 (37  x 52   mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[19] . "\""; if ($papel == "19")  { echo " selected" ;} echo ">A10 (26  x 37  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[20] . "\""; if ($papel == "20")  { echo " selected" ;} echo ">B0 (1000 x 1414 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[21] . "\""; if ($papel == "21")  { echo " selected" ;} echo ">B1 (707  x 1000 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[22] . "\""; if ($papel == "22")  { echo " selected" ;} echo ">B2 (500  x 707  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[23] . "\""; if ($papel == "23")  { echo " selected" ;} echo ">B3 (353  x 500  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[24] . "\""; if ($papel == "24")  { echo " selected" ;} echo ">B4 (250  x 353  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[11] . "\""; if ($papel == "11")  { echo " selected" ;} echo ">B5 (176  x 250  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[13] . "\""; if ($papel == "13")  { echo " selected" ;} echo ">Tabliod (280 x 432 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[25] . "\""; if ($papel == "25")  { echo " selected" ;} echo ">Note (190 x 254 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[26] . "\""; if ($papel == "26")  { echo " selected" ;} echo ">HalfLetter (140 x 216 mm)</option>\r\n";
  }
  else
  {
      echo "     <select  name=\"papel\" size=1>\r\n";
      echo "       <option value=\"" . $tp_papel[1]  . "\""; if ($papel == "1")   { echo " selected" ;} echo ">" . $tradutor[$language]['carta'] . " (216 x 279 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[2]  . "\""; if ($papel == "2")   { echo " selected" ;} echo ">" . $tradutor[$language]['oficio'] . " (216 x 356 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[3]  . "\""; if ($papel == "3")   { echo " selected" ;} echo ">Ledger (432 x 279 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[4]  . "\""; if ($papel == "4")   { echo " selected" ;} echo ">A0 (841 X 1189 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[5]  . "\""; if ($papel == "5")   { echo " selected" ;} echo ">A1 (594 x 841  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[6]  . "\""; if ($papel == "6")   { echo " selected" ;} echo ">A2 (420 x 594  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[7]  . "\""; if ($papel == "7")   { echo " selected" ;} echo ">A3 (297 x 420  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[8]  . "\""; if ($papel == "8")   { echo " selected" ;} echo ">A4 (210 X 297  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[9]  . "\""; if ($papel == "9")   { echo " selected" ;} echo ">A5 (148 x 210  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[10] . "\""; if ($papel == "10")  { echo " selected" ;} echo ">A6 (105 x 148  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[16] . "\""; if ($papel == "16")  { echo " selected" ;} echo ">A7 (74  x 105  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[17] . "\""; if ($papel == "17")  { echo " selected" ;} echo ">A8 (52  x 74   mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[18] . "\""; if ($papel == "18")  { echo " selected" ;} echo ">A9 (37  x 52   mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[20] . "\""; if ($papel == "20")  { echo " selected" ;} echo ">B0 (1000 x 1414 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[21] . "\""; if ($papel == "21")  { echo " selected" ;} echo ">B1 (707  x 1000 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[22] . "\""; if ($papel == "22")  { echo " selected" ;} echo ">B2 (500  x 707  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[23] . "\""; if ($papel == "23")  { echo " selected" ;} echo ">B3 (353  x 500  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[24] . "\""; if ($papel == "24")  { echo " selected" ;} echo ">B4 (250  x 353  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[11] . "\""; if ($papel == "11")  { echo " selected" ;} echo ">B5 (176  x 250  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[11] . "\""; if ($papel == "27")  { echo " selected" ;} echo ">B6 (125  x 176  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[11] . "\""; if ($papel == "28")  { echo " selected" ;} echo ">B7 (88  x 125  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[11] . "\""; if ($papel == "29")  { echo " selected" ;} echo ">B8 (62  x 88  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[11] . "\""; if ($papel == "30")  { echo " selected" ;} echo ">B9 (33  x 62  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[11] . "\""; if ($papel == "31")  { echo " selected" ;} echo ">B10 (31  x 44  mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[13] . "\""; if ($papel == "13")  { echo " selected" ;} echo ">Tabliod (280 x 432 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[25] . "\""; if ($papel == "25")  { echo " selected" ;} echo ">Executive (190 x 254 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[26] . "\""; if ($papel == "32")  { echo " selected" ;} echo ">C5E (163 x 229 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[26] . "\""; if ($papel == "33")  { echo " selected" ;} echo ">Comm10E (105 x 241 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[26] . "\""; if ($papel == "34")  { echo " selected" ;} echo ">DLE (110 x 220 mm)</option>\r\n";
      echo "       <option value=\"" . $tp_papel[26] . "\""; if ($papel == "35")  { echo " selected" ;} echo ">Folio (210 x 330 mm)</option>\r\n";
  }
?>
     </select>
   </td>
</tr>
 <tr class="scGridFieldOddVert" id='customiz_papel' style='display: none'>
   <td align=right>
    <font size="1">
     <?php echo $tradutor[$language]['alt_papel'] . " x " . $tradutor[$language]['larg_papel']; ?>
   </td>
   <td>
     <input type=text name="alt_papel"  size=2 maxlength=4 value="<?php echo NM_encode_input($apapel); ?>">&nbsp;x&nbsp;
     <input type=text name="larg_papel" size=2 maxlength=4 value="<?php echo NM_encode_input($lpapel); ?>">&nbsp;mm
   </td>
</tr>
<?php
}
if ($conf_socor == "N")
{
?>
 <tr class="scGridFieldOddVert">
   <td>
     <?php echo $tradutor[$language]['orient']; ?>
   </td>
   <td>
     <select  name="orientacao"  size=1>
       <option value="portrait" <?php if ($orientacao == "1")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['retrato']; ?></option>
       <option value="landscape"<?php if ($orientacao == "2")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['paisag']; ?></option>
     </select>
   </td>
</tr>
<?php
}
 if ($bookmarks != "XX" && $conf_socor == "N")
 {
?>
 <tr class="scGridFieldOddVert">
   <td>
     <?php echo $tradutor[$language]['book']; ?>
   </td>
   <td>
     <select  name="bookmarks"  size=1>
       <option value="1"<?php if ($bookmarks == "1")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sim']; ?></option>
       <option value="2"<?php if ($bookmarks == "2")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['nao']; ?></option>
     </select>
   </td>
 </tr>
<?php
 }
 if ($grafico != "XX" && $conf_socor == "N")
 {
     $sDisplay = $is_chart_app ? ' style="display: none"' : '';
?>
 <tr class="scGridFieldOddVert"<?php echo $sDisplay; ?>>
   <td>
     <?php echo $tradutor[$language]['grafico']; ?>
   </td>
   <td>
     <select  name="grafico"  size=1>
       <option value="S"<?php if ($grafico == "S")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sim']; ?></option>
       <option value="N"<?php if ($grafico == "N")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['nao']; ?></option>
     </select>
   </td>
</tr>
<?php
 }

if ($conf_larg == "S" && $conf_socor == "N")
{
  if (isset($_SESSION['scriptcase']['sc_tp_pdf']) && $_SESSION['scriptcase']['sc_tp_pdf'] == "wkhtmltopdf")
  {
?>
     <input type="hidden" name="largura" value="<?php echo NM_encode_input($largura); ?>" size=6 maxlength=4>
     <input type="hidden" name="fonte" value="<?php echo NM_encode_input($fonte); ?>">
<?php
  }
  else
  {
?>
 <tr class="scGridFieldOddVert">
   <td>
     <?php echo $tradutor[$language]['largura']; ?>
   </td>
   <td>
     <input type="text" name="largura" value="<?php echo NM_encode_input($largura); ?>" size=6 maxlength=4>
   </td>
</tr>
     <input type="hidden" name="fonte" value="<?php echo NM_encode_input($fonte); ?>">
<?php
  }
 }
?>
</table></td></tr>
 <tr class="scGridToolbar">
   <td colspan=1 align="middle">
<?php
echo  $_SESSION['scriptcase']['bg_btn_popup']['bok'] . "\r\n";
echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n";
echo  $_SESSION['scriptcase']['bg_btn_popup']['btbremove'] . "\r\n";

?>
   </td>
 </tr>
</table>
 </div>
 </td>
 </tr>
</table>

<?php
if ($bookmarks == "XX" || $conf_socor == "S")
{
    $book = $bookmarks;
    if ($bookmarks == "XX")
    {
        $book = 2;
    }
?>
    <input type="hidden" name="bookmarks" value="<?php echo NM_encode_input($book); ?>">
<?php
}
if ($conf_larg != "S" || $conf_socor == "S")
{
?>
    <input type="hidden" name="largura" value="<?php echo NM_encode_input($largura); ?>">
    <input type="hidden" name="fonte" value="<?php echo NM_encode_input($fonte); ?>">
<?php
}
if ($grafico == "XX" || $conf_socor == "S")
{
    $graf = $grafico;
    if ($grafico == "XX")
    {
        $graf = 2;
    }
?>
    <input type="hidden" name="grafico" value="<?php echo NM_encode_input($graf); ?>">
<?php
}
if ($conf_socor == "S")
{
    if (!isset($_SESSION['scriptcase']['sc_tp_pdf']) || $_SESSION['scriptcase']['sc_tp_pdf'] == "pd4ml")
    {
        $orient = ($orientacao == "1") ? "portrait" : "landscape";
    }
    else
    {
        $orient = ($orientacao == "1") ? "Portrait" : "Landscape";
    }
    $dim_papel = $tp_papel[$papel];
?>
    <input type="hidden" name="papel" value="<?php echo NM_encode_input($dim_papel); ?>">
    <input type="hidden" name="orientacao" value="<?php echo NM_encode_input($orient); ?>">
<?php
}

?>
</form>
<script language="javascript">
<?php
 if ($conf_socor == "N")
 {
?>
 // custom_paper();
<?php
 }
?>
var bFixed = false;
function ajusta_window()
{
  var mt = $(document.getElementById("main_table"));
  if (0 == mt.width() || 0 == mt.height())
  {
    setTimeout("ajusta_window()", 50);
    return;
  }
  else if(!bFixed)
  {
    bFixed = true;
    if (navigator.userAgent.indexOf("Chrome/") > 0)
    {
      self.parent.tb_resize(mt.height() + 40, mt.width() + 40);
      setTimeout("ajusta_window()", 50);
      return;
    }
  }
  self.parent.tb_resize(mt.height() + 40, mt.width() + 40);
}

$( document ).ready(function() {
   setTimeout("ajusta_window()", 50);
});

  function processa()
  {
     self.parent.tb_remove();
//     self.parent.SC_colorbox_close();
     ind   = document.config_pdf.cor_imp.selectedIndex;
     cor   = document.config_pdf.cor_imp.options[ind].value;
<?php
 if ($conf_socor == "N")
 {
?>
     ind        = document.config_pdf.papel.selectedIndex;
     papel      = document.config_pdf.papel.options[ind].value;
     larg_papel = document.config_pdf.larg_papel.value;
     alt_papel  = document.config_pdf.alt_papel.value;
     ind        = document.config_pdf.orientacao.selectedIndex;
     orientacao = document.config_pdf.orientacao.options[ind].value;
<?php
 }
 else
 {
?>
     papel      = document.config_pdf.papel.value;
     orientacao = document.config_pdf.orientacao.value;
<?php
 }
 if ($bookmarks != "XX" && $conf_socor == "N")
 {
?>
     ind   = document.config_pdf.bookmarks.selectedIndex;
     bookmarks = document.config_pdf.bookmarks.options[ind].value;
<?php
 }
 else
 {
?>
     bookmarks  = document.config_pdf.bookmarks.value;
<?php
 }
 if ($grafico != "XX" && $conf_socor == "N")
 {
?>
     ind   = document.config_pdf.grafico.selectedIndex;
     grafico = document.config_pdf.grafico.options[ind].value;
<?php
 }
 else
 {
?>
     grafico    = document.config_pdf.grafico.value;
<?php
}
?>
     largura    = document.config_pdf.largura.value;
     fonte      = document.config_pdf.fonte.value;
     parms_pdf = " ";
<?php
  if (!isset($_SESSION['scriptcase']['sc_tp_pdf']) || $_SESSION['scriptcase']['sc_tp_pdf'] == "pd4ml")
  {
?>
     if (largura > 0)
     {
         parms_pdf += largura;
     }
     else
     {
         parms_pdf += 800;
     }
     parms_pdf += ' ' + papel;
     parms_pdf += ' -orientation ' + orientacao.toUpperCase();
     if (bookmarks == 1)
     {
         parms_pdf += ' -bookmarks HEADINGS';
     }
<?php
  }
  else
  {
?>
     parms_pdf += ' --page-size ' + papel;
     if (orientacao.toUpperCase() == 'PORTRAIT')
     {
         parms_pdf += ' --orientation Portrait';
     }
     else
     {
         parms_pdf += ' --orientation Landscape';
     }
     if (bookmarks == 2)
     {
         parms_pdf += ' --outline-depth 0';
     }
<?php
  }
?>
     parent.nm_gp_move('<?php echo NM_encode_input($opc); ?>', '<?php echo NM_encode_input($target); ?>', cor, parms_pdf, grafico);return false;
  }
  function custom_paper()
  {
     ind   = document.config_pdf.papel.selectedIndex;
     papel = document.config_pdf.papel.options[ind].value;
     if (papel != 'custom')
     {
         document.getElementById('customiz_papel').style.display = 'none';
     }
     else
     {
         document.getElementById('customiz_papel').style.display = '';
     }
  }
</script>
<script>
        //colocado aqui devido a execução modal não executar o ready do jquery
     setTimeout("ajusta_window()", 50);
</script>
</body>
</html>