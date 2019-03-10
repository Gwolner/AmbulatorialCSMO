
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('input:radio.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && $("#id_ac_" + sField).length > 0) {
    if (false == scSetFocusOnField($("#id_ac_" + sField))) {
      setTimeout(function () { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["id_prescricao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["medicamento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["prescritor_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["hora_de_adm_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["prof_que_adm_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["data_cadastro_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_paciente_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_usuario_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["selecionar_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["obs_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_prescricao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_prescricao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["medicamento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["medicamento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prescritor_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prescritor_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_de_adm_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_de_adm_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prof_que_adm_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prof_que_adm_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_cadastro_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_cadastro_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_paciente_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_paciente_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_usuario_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_usuario_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["selecionar_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["selecionar_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onChange_call(sFieldName, iFieldSeq) {
  var oField, fieldId, fieldName;
  oField = $("#id_sc_field_" + sFieldName + iFieldSeq);
  fieldId = oField.attr("id");
  fieldName = fieldId.substr(12);
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id_prescricao_' + iSeqRow).bind('blur', function() { sc_form_prescricao_pront_id_prescricao__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_prescricao_pront_id_prescricao__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_prescricao_pront_id_prescricao__onfocus(this, iSeqRow) });
  $('#id_sc_field_data_cadastro_' + iSeqRow).bind('blur', function() { sc_form_prescricao_pront_data_cadastro__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_prescricao_pront_data_cadastro__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_prescricao_pront_data_cadastro__onfocus(this, iSeqRow) });
  $('#id_sc_field_data_cadastro__hora' + iSeqRow).bind('blur', function() { sc_form_prescricao_pront_data_cadastro__hora_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_prescricao_pront_data_cadastro__hora_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_prescricao_pront_data_cadastro__hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_medicamento_' + iSeqRow).bind('blur', function() { sc_form_prescricao_pront_medicamento__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_prescricao_pront_medicamento__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_prescricao_pront_medicamento__onfocus(this, iSeqRow) });
  $('#id_sc_field_prescritor_' + iSeqRow).bind('blur', function() { sc_form_prescricao_pront_prescritor__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_prescricao_pront_prescritor__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_prescricao_pront_prescritor__onfocus(this, iSeqRow) });
  $('#id_sc_field_hora_de_adm_' + iSeqRow).bind('blur', function() { sc_form_prescricao_pront_hora_de_adm__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_prescricao_pront_hora_de_adm__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_prescricao_pront_hora_de_adm__onfocus(this, iSeqRow) });
  $('#id_sc_field_prof_que_adm_' + iSeqRow).bind('blur', function() { sc_form_prescricao_pront_prof_que_adm__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_prescricao_pront_prof_que_adm__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_prescricao_pront_prof_que_adm__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_usuario_' + iSeqRow).bind('blur', function() { sc_form_prescricao_pront_id_usuario__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_prescricao_pront_id_usuario__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_prescricao_pront_id_usuario__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_paciente_' + iSeqRow).bind('blur', function() { sc_form_prescricao_pront_id_paciente__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_prescricao_pront_id_paciente__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_prescricao_pront_id_paciente__onfocus(this, iSeqRow) });
  $('#id_sc_field_obs_' + iSeqRow).bind('blur', function() { sc_form_prescricao_pront_obs__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_prescricao_pront_obs__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_prescricao_pront_obs__onfocus(this, iSeqRow) });
  $('#id_sc_field_selecionar_' + iSeqRow).bind('blur', function() { sc_form_prescricao_pront_selecionar__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_prescricao_pront_selecionar__onchange(this, iSeqRow) })
                                         .bind('click', function() { sc_form_prescricao_pront_selecionar__onclick(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_prescricao_pront_selecionar__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_prescricao_pront_id_prescricao__onblur(oThis, iSeqRow) {
  do_ajax_form_prescricao_pront_validate_id_prescricao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_prescricao_pront_id_prescricao__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_prescricao_pront_id_prescricao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_prescricao_pront_data_cadastro__onblur(oThis, iSeqRow) {
  do_ajax_form_prescricao_pront_validate_data_cadastro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_prescricao_pront_data_cadastro__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_prescricao_pront_validate_data_cadastro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_prescricao_pront_data_cadastro__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_prescricao_pront_data_cadastro__hora_onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_prescricao_pront_data_cadastro__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_prescricao_pront_data_cadastro__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_prescricao_pront_medicamento__onblur(oThis, iSeqRow) {
  do_ajax_form_prescricao_pront_validate_medicamento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_prescricao_pront_medicamento__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_prescricao_pront_medicamento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_prescricao_pront_prescritor__onblur(oThis, iSeqRow) {
  do_ajax_form_prescricao_pront_validate_prescritor_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_prescricao_pront_prescritor__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_prescricao_pront_prescritor__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_prescricao_pront_hora_de_adm__onblur(oThis, iSeqRow) {
  do_ajax_form_prescricao_pront_validate_hora_de_adm_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_prescricao_pront_hora_de_adm__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_prescricao_pront_hora_de_adm__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_prescricao_pront_prof_que_adm__onblur(oThis, iSeqRow) {
  do_ajax_form_prescricao_pront_validate_prof_que_adm_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_prescricao_pront_prof_que_adm__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_prescricao_pront_prof_que_adm__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_prescricao_pront_id_usuario__onblur(oThis, iSeqRow) {
  do_ajax_form_prescricao_pront_validate_id_usuario_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_prescricao_pront_id_usuario__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_prescricao_pront_id_usuario__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_prescricao_pront_id_paciente__onblur(oThis, iSeqRow) {
  do_ajax_form_prescricao_pront_validate_id_paciente_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_prescricao_pront_id_paciente__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_prescricao_pront_id_paciente__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_prescricao_pront_obs__onblur(oThis, iSeqRow) {
  do_ajax_form_prescricao_pront_validate_obs_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_prescricao_pront_obs__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_prescricao_pront_obs__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_prescricao_pront_selecionar__onblur(oThis, iSeqRow) {
  do_ajax_form_prescricao_pront_validate_selecionar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_prescricao_pront_selecionar__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_prescricao_pront_selecionar__onclick(oThis, iSeqRow) {
  do_ajax_form_prescricao_pront_event_selecionar__onclick(iSeqRow);
}

function sc_form_prescricao_pront_selecionar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_data_cadastro_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_data_cadastro_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['data_cadastro_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['data_cadastro_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['data_cadastro_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

