
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
  scEventControl_data["nome_paciente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cpf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["rua" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["bairro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cidade" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["estado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tipo_paciente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["telefone_contato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["data_nascimento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["contato_emergencial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["servidor_terceirizado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["servidor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["aluno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["visitante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["triagem" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["evolucao_medica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["conduta_medica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["evolucao_odontologica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["conduta_odontologica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["prescricao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["registro_de_enfermagem" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["nome_paciente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nome_paciente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cpf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cpf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rua" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rua" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bairro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bairro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cidade" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cidade" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_paciente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_paciente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefone_contato" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefone_contato" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_nascimento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_nascimento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contato_emergencial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contato_emergencial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servidor_terceirizado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servidor_terceirizado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servidor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servidor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aluno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aluno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["visitante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["visitante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["triagem" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["triagem" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["evolucao_medica" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["evolucao_medica" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conduta_medica" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conduta_medica" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["evolucao_odontologica" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["evolucao_odontologica" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conduta_odontologica" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conduta_odontologica" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prescricao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prescricao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["registro_de_enfermagem" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["registro_de_enfermagem" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipo_paciente" + iSeq == fieldName) {
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
  $('#id_sc_field_nome_paciente' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_nome_paciente_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_prontuario_backup_nome_paciente_onfocus(this, iSeqRow) });
  $('#id_sc_field_cpf' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_cpf_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_prontuario_backup_cpf_onfocus(this, iSeqRow) });
  $('#id_sc_field_cep' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_cep_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_prontuario_backup_cep_onfocus(this, iSeqRow) });
  $('#id_sc_field_rua' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_rua_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_prontuario_backup_rua_onfocus(this, iSeqRow) });
  $('#id_sc_field_bairro' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_bairro_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_prontuario_backup_bairro_onfocus(this, iSeqRow) });
  $('#id_sc_field_cidade' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_cidade_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_prontuario_backup_cidade_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_estado_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_prontuario_backup_estado_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_paciente' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_tipo_paciente_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_prontuario_backup_tipo_paciente_onfocus(this, iSeqRow) });
  $('#id_sc_field_contato_emergencial' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_contato_emergencial_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_prontuario_backup_contato_emergencial_onfocus(this, iSeqRow) });
  $('#id_sc_field_data_nascimento' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_data_nascimento_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_prontuario_backup_data_nascimento_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefone_contato' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_telefone_contato_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_prontuario_backup_telefone_contato_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor_terceirizado' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_servidor_terceirizado_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_prontuario_backup_servidor_terceirizado_onfocus(this, iSeqRow) });
  $('#id_sc_field_aluno' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_aluno_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_prontuario_backup_aluno_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_servidor_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_prontuario_backup_servidor_onfocus(this, iSeqRow) });
  $('#id_sc_field_visitante' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_visitante_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_prontuario_backup_visitante_onfocus(this, iSeqRow) });
  $('#id_sc_field_triagem' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_triagem_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_prontuario_backup_triagem_onfocus(this, iSeqRow) });
  $('#id_sc_field_evolucao_medica' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_evolucao_medica_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_prontuario_backup_evolucao_medica_onfocus(this, iSeqRow) });
  $('#id_sc_field_conduta_medica' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_conduta_medica_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_prontuario_backup_conduta_medica_onfocus(this, iSeqRow) });
  $('#id_sc_field_evolucao_odontologica' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_evolucao_odontologica_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_prontuario_backup_evolucao_odontologica_onfocus(this, iSeqRow) });
  $('#id_sc_field_conduta_odontologica' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_conduta_odontologica_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_prontuario_backup_conduta_odontologica_onfocus(this, iSeqRow) });
  $('#id_sc_field_prescricao' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_prescricao_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_prontuario_backup_prescricao_onfocus(this, iSeqRow) });
  $('#id_sc_field_registro_de_enfermagem' + iSeqRow).bind('blur', function() { sc_form_prontuario_backup_registro_de_enfermagem_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_prontuario_backup_registro_de_enfermagem_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_prontuario_backup_nome_paciente_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_nome_paciente();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_nome_paciente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_cpf_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_cpf();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_cpf_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_cep_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_cep();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_cep_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_rua_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_rua();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_rua_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_bairro_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_bairro();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_bairro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_cidade_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_cidade();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_cidade_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_estado_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_estado();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_estado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_tipo_paciente_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_tipo_paciente();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_tipo_paciente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_contato_emergencial_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_contato_emergencial();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_contato_emergencial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_data_nascimento_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_data_nascimento();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_data_nascimento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_telefone_contato_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_telefone_contato();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_telefone_contato_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_servidor_terceirizado_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_servidor_terceirizado();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_servidor_terceirizado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_aluno_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_aluno();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_aluno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_servidor_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_servidor();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_servidor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_visitante_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_visitante();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_visitante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_triagem_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_triagem();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_triagem_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_evolucao_medica_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_evolucao_medica();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_evolucao_medica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_conduta_medica_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_conduta_medica();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_conduta_medica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_evolucao_odontologica_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_evolucao_odontologica();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_evolucao_odontologica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_conduta_odontologica_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_conduta_odontologica();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_conduta_odontologica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_prescricao_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_prescricao();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_prescricao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_prontuario_backup_registro_de_enfermagem_onblur(oThis, iSeqRow) {
  do_ajax_form_prontuario_backup_mob_validate_registro_de_enfermagem();
  scCssBlur(oThis);
}

function sc_form_prontuario_backup_registro_de_enfermagem_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_data_nascimento" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_data_nascimento" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['data_nascimento']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
