
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
  scEventControl_data["id_paciente_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["data_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["hora_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fr_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["hgt_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["peso_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["altura_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["coren_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["alergia_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tipo_alergia_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_usuario_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_paciente_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_paciente_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fr_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fr_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hgt_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hgt_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["peso_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["peso_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["altura_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["altura_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coren_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coren_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["alergia_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["alergia_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_alergia_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_alergia_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_usuario_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_usuario_" + iSeqRow]["change"]) {
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
  if ("id_usuario_" + iSeq == fieldName) {
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
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_data_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_data__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_triagem_pront_data__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_triagem_pront_data__onfocus(this, iSeqRow) });
  $('#id_sc_field_hora_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_hora__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_triagem_pront_hora__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_triagem_pront_hora__onfocus(this, iSeqRow) });
  $('#id_sc_field_pa_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_pa__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_triagem_pront_pa__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_triagem_pront_pa__onfocus(this, iSeqRow) });
  $('#id_sc_field_fc_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_fc__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_triagem_pront_fc__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_triagem_pront_fc__onfocus(this, iSeqRow) });
  $('#id_sc_field_fr_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_fr__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_triagem_pront_fr__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_triagem_pront_fr__onfocus(this, iSeqRow) });
  $('#id_sc_field_tc_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_tc__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_triagem_pront_tc__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_triagem_pront_tc__onfocus(this, iSeqRow) });
  $('#id_sc_field_hgt_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_hgt__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_triagem_pront_hgt__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_triagem_pront_hgt__onfocus(this, iSeqRow) });
  $('#id_sc_field_peso_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_peso__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_triagem_pront_peso__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_triagem_pront_peso__onfocus(this, iSeqRow) });
  $('#id_sc_field_altura_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_altura__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_triagem_pront_altura__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_triagem_pront_altura__onfocus(this, iSeqRow) });
  $('#id_sc_field_coren_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_coren__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_triagem_pront_coren__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_triagem_pront_coren__onfocus(this, iSeqRow) });
  $('#id_sc_field_alergia_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_alergia__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_triagem_pront_alergia__onchange(this, iSeqRow) })
                                      .bind('click', function() { sc_form_triagem_pront_alergia__onclick(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_triagem_pront_alergia__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_alergia_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_tipo_alergia__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_triagem_pront_tipo_alergia__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_triagem_pront_tipo_alergia__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_usuario_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_id_usuario__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_triagem_pront_id_usuario__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_triagem_pront_id_usuario__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_paciente_' + iSeqRow).bind('blur', function() { sc_form_triagem_pront_id_paciente__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_triagem_pront_id_paciente__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_triagem_pront_id_paciente__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_triagem_pront_data__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_data_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_data__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_data__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_triagem_pront_hora__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_hora_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_hora__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_hora__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_triagem_pront_pa__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_pa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_pa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_pa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_triagem_pront_fc__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_fc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_fc__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_fc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_triagem_pront_fr__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_fr_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_fr__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_fr__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_triagem_pront_tc__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_tc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_tc__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_tc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_triagem_pront_hgt__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_hgt_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_hgt__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_hgt__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_triagem_pront_peso__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_peso_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_peso__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_peso__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_triagem_pront_altura__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_altura_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_altura__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_altura__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_triagem_pront_coren__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_coren_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_coren__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_coren__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_triagem_pront_alergia__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_alergia_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_alergia__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_alergia__onclick(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_event_alergia__onclick(iSeqRow);
}

function sc_form_triagem_pront_alergia__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_triagem_pront_tipo_alergia__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_tipo_alergia_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_tipo_alergia__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_tipo_alergia__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_triagem_pront_id_usuario__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_id_usuario_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_id_usuario__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_id_usuario__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_triagem_pront_id_paciente__onblur(oThis, iSeqRow) {
  do_ajax_form_triagem_pront_validate_id_paciente_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_triagem_pront_id_paciente__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_triagem_pront_id_paciente__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

