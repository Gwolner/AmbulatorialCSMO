
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
  scEventControl_data["tipo_servico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["procedimento_enfermagem" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["procedimento_medico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["procedimento_odontologico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["procedimento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tipo_paciente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["data_hora" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tipo_servico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_servico" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["procedimento_enfermagem" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["procedimento_enfermagem" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["procedimento_medico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["procedimento_medico" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["procedimento_odontologico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["procedimento_odontologico" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["procedimento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["procedimento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_paciente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_paciente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_hora" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_hora" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipo_servico" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("procedimento_enfermagem" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("procedimento_medico" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("procedimento_odontologico" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_paciente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_servidor_saude" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
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
  if ("tipo_servico" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_tipo_servico' + iSeqRow).bind('blur', function() { sc_form_atendimento_tipo_servico_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_atendimento_tipo_servico_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_atendimento_tipo_servico_onfocus(this, iSeqRow) });
  $('#id_sc_field_procedimento' + iSeqRow).bind('blur', function() { sc_form_atendimento_procedimento_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_atendimento_procedimento_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_paciente' + iSeqRow).bind('blur', function() { sc_form_atendimento_tipo_paciente_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_atendimento_tipo_paciente_onfocus(this, iSeqRow) });
  $('#id_sc_field_data_hora' + iSeqRow).bind('blur', function() { sc_form_atendimento_data_hora_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_atendimento_data_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_data_hora_hora' + iSeqRow).bind('blur', function() { sc_form_atendimento_data_hora_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_atendimento_data_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_procedimento_enfermagem' + iSeqRow).bind('blur', function() { sc_form_atendimento_procedimento_enfermagem_onblur(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_atendimento_procedimento_enfermagem_onfocus(this, iSeqRow) });
  $('#id_sc_field_procedimento_medico' + iSeqRow).bind('blur', function() { sc_form_atendimento_procedimento_medico_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_atendimento_procedimento_medico_onfocus(this, iSeqRow) });
  $('#id_sc_field_procedimento_odontologico' + iSeqRow).bind('blur', function() { sc_form_atendimento_procedimento_odontologico_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_atendimento_procedimento_odontologico_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_atendimento_tipo_servico_onblur(oThis, iSeqRow) {
  do_ajax_form_atendimento_mob_validate_tipo_servico();
  scCssBlur(oThis);
}

function sc_form_atendimento_tipo_servico_onchange(oThis, iSeqRow) {
  do_ajax_form_atendimento_mob_event_tipo_servico_onchange();
}

function sc_form_atendimento_tipo_servico_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_atendimento_procedimento_onblur(oThis, iSeqRow) {
  do_ajax_form_atendimento_mob_validate_procedimento();
  scCssBlur(oThis);
}

function sc_form_atendimento_procedimento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_atendimento_tipo_paciente_onblur(oThis, iSeqRow) {
  do_ajax_form_atendimento_mob_validate_tipo_paciente();
  scCssBlur(oThis);
}

function sc_form_atendimento_tipo_paciente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_atendimento_data_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_atendimento_mob_validate_data_hora();
  scCssBlur(oThis);
}

function sc_form_atendimento_data_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_atendimento_mob_validate_data_hora();
  scCssBlur(oThis);
}

function sc_form_atendimento_data_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_atendimento_data_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_atendimento_procedimento_enfermagem_onblur(oThis, iSeqRow) {
  do_ajax_form_atendimento_mob_validate_procedimento_enfermagem();
  scCssBlur(oThis);
}

function sc_form_atendimento_procedimento_enfermagem_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_atendimento_procedimento_medico_onblur(oThis, iSeqRow) {
  do_ajax_form_atendimento_mob_validate_procedimento_medico();
  scCssBlur(oThis);
}

function sc_form_atendimento_procedimento_medico_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_atendimento_procedimento_odontologico_onblur(oThis, iSeqRow) {
  do_ajax_form_atendimento_mob_validate_procedimento_odontologico();
  scCssBlur(oThis);
}

function sc_form_atendimento_procedimento_odontologico_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup) {
  if ('over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
  }
}
