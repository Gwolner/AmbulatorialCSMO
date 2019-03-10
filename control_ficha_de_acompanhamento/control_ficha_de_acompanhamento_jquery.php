
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
  scEventControl_data["curso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["modalidade" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["data_nascimento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["matricula" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["turno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["texto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["nome" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nome" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["curso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["curso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["modalidade" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["modalidade" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_nascimento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_nascimento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["matricula" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["matricula" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["turno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["turno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["texto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["texto" + iSeqRow]["change"]) {
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
  if ("turno" + iSeq == fieldName) {
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
  $('#id_sc_field_nome' + iSeqRow).bind('blur', function() { sc_control_ficha_de_acompanhamento_nome_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_control_ficha_de_acompanhamento_nome_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_control_ficha_de_acompanhamento_nome_onfocus(this, iSeqRow) });
  $('#id_sc_field_curso' + iSeqRow).bind('blur', function() { sc_control_ficha_de_acompanhamento_curso_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_ficha_de_acompanhamento_curso_onfocus(this, iSeqRow) });
  $('#id_sc_field_modalidade' + iSeqRow).bind('blur', function() { sc_control_ficha_de_acompanhamento_modalidade_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_ficha_de_acompanhamento_modalidade_onfocus(this, iSeqRow) });
  $('#id_sc_field_data_nascimento' + iSeqRow).bind('blur', function() { sc_control_ficha_de_acompanhamento_data_nascimento_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_control_ficha_de_acompanhamento_data_nascimento_onfocus(this, iSeqRow) });
  $('#id_sc_field_matricula' + iSeqRow).bind('blur', function() { sc_control_ficha_de_acompanhamento_matricula_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_ficha_de_acompanhamento_matricula_onfocus(this, iSeqRow) });
  $('#id_sc_field_turno' + iSeqRow).bind('blur', function() { sc_control_ficha_de_acompanhamento_turno_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_ficha_de_acompanhamento_turno_onfocus(this, iSeqRow) });
  $('#id_sc_field_texto' + iSeqRow).bind('blur', function() { sc_control_ficha_de_acompanhamento_texto_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_ficha_de_acompanhamento_texto_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_control_ficha_de_acompanhamento_nome_onblur(oThis, iSeqRow) {
  do_ajax_control_ficha_de_acompanhamento_validate_nome();
  scCssBlur(oThis);
}

function sc_control_ficha_de_acompanhamento_nome_onchange(oThis, iSeqRow) {
  do_ajax_control_ficha_de_acompanhamento_event_nome_onchange();
}

function sc_control_ficha_de_acompanhamento_nome_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_control_ficha_de_acompanhamento_curso_onblur(oThis, iSeqRow) {
  do_ajax_control_ficha_de_acompanhamento_validate_curso();
  scCssBlur(oThis);
}

function sc_control_ficha_de_acompanhamento_curso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_ficha_de_acompanhamento_modalidade_onblur(oThis, iSeqRow) {
  do_ajax_control_ficha_de_acompanhamento_validate_modalidade();
  scCssBlur(oThis);
}

function sc_control_ficha_de_acompanhamento_modalidade_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_ficha_de_acompanhamento_data_nascimento_onblur(oThis, iSeqRow) {
  do_ajax_control_ficha_de_acompanhamento_validate_data_nascimento();
  scCssBlur(oThis);
}

function sc_control_ficha_de_acompanhamento_data_nascimento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_ficha_de_acompanhamento_matricula_onblur(oThis, iSeqRow) {
  do_ajax_control_ficha_de_acompanhamento_validate_matricula();
  scCssBlur(oThis);
}

function sc_control_ficha_de_acompanhamento_matricula_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_ficha_de_acompanhamento_turno_onblur(oThis, iSeqRow) {
  do_ajax_control_ficha_de_acompanhamento_validate_turno();
  scCssBlur(oThis);
}

function sc_control_ficha_de_acompanhamento_turno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_ficha_de_acompanhamento_texto_onblur(oThis, iSeqRow) {
  do_ajax_control_ficha_de_acompanhamento_validate_texto();
  scCssBlur(oThis);
}

function sc_control_ficha_de_acompanhamento_texto_onfocus(oThis, iSeqRow) {
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

