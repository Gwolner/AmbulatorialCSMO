<?php
/**
 * $Id: nm_gp_config_print.php,v 1.2 2012-01-27 13:02:59 sergio Exp $
 */
    include_once('grid_atendimento_session.php');
    session_start();
    $SC_apl_proc = "grid_atendimento";

    $opc      = (isset($_GET['nm_opc']))   ? $_GET['nm_opc']   : "AM";
    $cor      = (isset($_GET['nm_cor']))   ? $_GET['nm_cor']   : "AM";
    $language = (isset($_GET['language'])) ? $_GET['language'] : "port";
    $page     = (isset($_GET['nm_page']))  ? $_GET['nm_page']  : '';

    ini_set('default_charset', $_SESSION['scriptcase']['charset']);
    if (!function_exists("NM_is_utf8"))
    {
        include_once("../_lib/lib/php/nm_utf8.php");
    }

    $tradutor = array();
    if (isset($_SESSION['scriptcase']['sc_idioma_prt']))
    {
        $tradutor = $_SESSION['scriptcase']['sc_idioma_prt'];
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

<form name="config_prt" method="post" action="grid_atendimento_config_print.php">
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
<?php
if ($opc == "AM")
{
    if (isset($_SESSION['sc_session'][$page][$SC_apl_proc]['scroll_navigate_app']) && $_SESSION['sc_session'][$page][$SC_apl_proc]['scroll_navigate_app'])
    {
?>
  <input type="hidden" name="opc" value="RC" />
<?php
    }
    else
    {
?>
 <tr class="scGridFieldOddVert">
   <td  align="left">
       <?php echo $tradutor[$language]['modoimp']; ?>
   </td>
   <td align="left">
      <input type=radio name="opc" value="PC" checked><?php echo $tradutor[$language]['curr']; ?>
   </td>
 </tr>
 <tr class="scGridFieldOddVert">
   <td>&nbsp;</td>
   <td align="left">
      <input type=radio name="opc" value="RC"><?php echo $tradutor[$language]['total']; ?>
   </td>
 </tr>
 <tr class="scGridFieldOddVert">
   <td align="center" colspan=2>&nbsp;</td>
 </tr>
<?php
    }
}
if ($cor == "AM")
{
?>
 <tr class="scGridFieldOddVert">
   <td  align="left">
       <?php echo $tradutor[$language]['cor']; ?>
   </td>
   <td align="left">
     <input type=radio name="cor" value="PB" checked><?php echo $tradutor[$language]['pb']; ?>
   </td>
</tr>
 <tr class="scGridFieldOddVert">
   <td>&nbsp;</td>
   <td align="left">
     <input type=radio name="cor" value="CO"><?php echo $tradutor[$language]['color']; ?>
   </td>
</tr>
 <tr class="scGridFieldOddVert">
   <td align="center" colspan=2>&nbsp;</td>
 </tr>
<?php
}
?>
</table></td></tr>
 <tr class="scGridToolbar">
   <td align="center" colspan=2>
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

</form>


<script language="javascript">

var bFixed = false;
var incr_w = 40;
var incr_h = 40;
function ajusta_window()
{
  var mt = $(document.getElementById("main_table"));
  if (0 == mt.width() || 0 == mt.height())
  {
    setTimeout("ajusta_window()", 50);
    return;
  }
/*
  else if(!bFixed)
  {
    bFixed = true;
    if (navigator.userAgent.indexOf("Chrome/") > 0)
    {
      self.parent.tb_resize(mt.height() + 40, mt.width() + 100);
      incr_w = 50;
      incr_h = 20;
      setTimeout("ajusta_window()", 50);
      return;
    }
  }
*/
  self.parent.tb_resize(mt.height() + incr_h, mt.width() + incr_w);
}
$( document ).ready(function() {
  setTimeout("ajusta_window()", 50);
});

  function processa()
  {
     var opc = "<?php echo NM_encode_input($opc);?>";
     var cor = "<?php echo NM_encode_input($cor);?>";
     self.parent.tb_remove();
<?php
if ($opc == "AM")
{
    if (isset($_SESSION['sc_session'][$page][$SC_apl_proc]['scroll_navigate_app']) && $_SESSION['sc_session'][$page][$SC_apl_proc]['scroll_navigate_app'])
    {
?>
     opc = "RC";
<?php
    }
    else
    {
?>
     opc = (document.config_prt.opc[0].checked) ? "PC" : "RC";
<?php
    }
}
if ($cor == "AM")
{
?>
     cor = (document.config_prt.cor[0].checked) ? "PB" : "CO";
<?php
}
?>
     parent.nm_gp_print_conf(opc, cor);return false;
  }
</script>
<script>
        //colocado aqui devido a execução modal não executar o ready do jquery
      setTimeout("ajusta_window()", 50);
</script>
</body>
</html>