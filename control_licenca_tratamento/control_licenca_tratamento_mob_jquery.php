
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
  scEventControl_data["nome" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["data_nascimento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cpf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["orgao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["siape" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["data_inicial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["data_final" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["numero_de_dias" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["data_hoje" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["nome" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nome" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_nascimento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_nascimento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cpf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cpf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["orgao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["orgao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["siape" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["siape" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_inicial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_inicial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_final" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_final" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_de_dias" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_de_dias" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_hoje" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_hoje" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nome" + iSeqRow]["autocomp"]) {
    return true;
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
  if ("nome" + iFieldSeq == fieldName) {
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
  $('#id_sc_field_nome' + iSeqRow).bind('blur', function() { sc_control_licenca_tratamento_nome_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_control_licenca_tratamento_nome_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_control_licenca_tratamento_nome_onfocus(this, iSeqRow) });
  $('#id_sc_field_data_nascimento' + iSeqRow).bind('blur', function() { sc_control_licenca_tratamento_data_nascimento_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_control_licenca_tratamento_data_nascimento_onfocus(this, iSeqRow) });
  $('#id_sc_field_cpf' + iSeqRow).bind('blur', function() { sc_control_licenca_tratamento_cpf_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_control_licenca_tratamento_cpf_onfocus(this, iSeqRow) });
  $('#id_sc_field_orgao' + iSeqRow).bind('blur', function() { sc_control_licenca_tratamento_orgao_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_licenca_tratamento_orgao_onfocus(this, iSeqRow) });
  $('#id_sc_field_siape' + iSeqRow).bind('blur', function() { sc_control_licenca_tratamento_siape_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_licenca_tratamento_siape_onfocus(this, iSeqRow) });
  $('#id_sc_field_data_inicial' + iSeqRow).bind('blur', function() { sc_control_licenca_tratamento_data_inicial_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_control_licenca_tratamento_data_inicial_onfocus(this, iSeqRow) });
  $('#id_sc_field_data_final' + iSeqRow).bind('blur', function() { sc_control_licenca_tratamento_data_final_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_licenca_tratamento_data_final_onfocus(this, iSeqRow) });
  $('#id_sc_field_data_hoje' + iSeqRow).bind('blur', function() { sc_control_licenca_tratamento_data_hoje_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_licenca_tratamento_data_hoje_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_de_dias' + iSeqRow).bind('blur', function() { sc_control_licenca_tratamento_numero_de_dias_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_control_licenca_tratamento_numero_de_dias_onfocus(this, iSeqRow) });
  $('#id_sc_field_cid' + iSeqRow).bind('blur', function() { sc_control_licenca_tratamento_cid_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_control_licenca_tratamento_cid_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_control_licenca_tratamento_nome_onblur(oThis, iSeqRow) {
  do_ajax_control_licenca_tratamento_mob_validate_nome();
  scCssBlur(oThis);
}

function sc_control_licenca_tratamento_nome_onchange(oThis, iSeqRow) {
  do_ajax_control_licenca_tratamento_mob_event_nome_onchange();
}

function sc_control_licenca_tratamento_nome_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_control_licenca_tratamento_data_nascimento_onblur(oThis, iSeqRow) {
  do_ajax_control_licenca_tratamento_mob_validate_data_nascimento();
  scCssBlur(oThis);
}

function sc_control_licenca_tratamento_data_nascimento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_licenca_tratamento_cpf_onblur(oThis, iSeqRow) {
  do_ajax_control_licenca_tratamento_mob_validate_cpf();
  scCssBlur(oThis);
}

function sc_control_licenca_tratamento_cpf_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_licenca_tratamento_orgao_onblur(oThis, iSeqRow) {
  do_ajax_control_licenca_tratamento_mob_validate_orgao();
  scCssBlur(oThis);
}

function sc_control_licenca_tratamento_orgao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_licenca_tratamento_siape_onblur(oThis, iSeqRow) {
  do_ajax_control_licenca_tratamento_mob_validate_siape();
  scCssBlur(oThis);
}

function sc_control_licenca_tratamento_siape_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_licenca_tratamento_data_inicial_onblur(oThis, iSeqRow) {
  do_ajax_control_licenca_tratamento_mob_validate_data_inicial();
  scCssBlur(oThis);
}

function sc_control_licenca_tratamento_data_inicial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_licenca_tratamento_data_final_onblur(oThis, iSeqRow) {
  do_ajax_control_licenca_tratamento_mob_validate_data_final();
  scCssBlur(oThis);
}

function sc_control_licenca_tratamento_data_final_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_licenca_tratamento_data_hoje_onblur(oThis, iSeqRow) {
  do_ajax_control_licenca_tratamento_mob_validate_data_hoje();
  scCssBlur(oThis);
}

function sc_control_licenca_tratamento_data_hoje_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_licenca_tratamento_numero_de_dias_onblur(oThis, iSeqRow) {
  do_ajax_control_licenca_tratamento_mob_validate_numero_de_dias();
  scCssBlur(oThis);
}

function sc_control_licenca_tratamento_numero_de_dias_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_licenca_tratamento_cid_onblur(oThis, iSeqRow) {
  do_ajax_control_licenca_tratamento_mob_validate_cid();
  scCssBlur(oThis);
}

function sc_control_licenca_tratamento_cid_onfocus(oThis, iSeqRow) {
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

