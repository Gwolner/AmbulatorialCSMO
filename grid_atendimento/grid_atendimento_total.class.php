<?php

class grid_atendimento_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function grid_atendimento_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("pt_br");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_atendimento']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_atendimento']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->id_atendimento = $Busca_temp['id_atendimento']; 
          $tmp_pos = strpos($this->id_atendimento, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_atendimento = substr($this->id_atendimento, 0, $tmp_pos);
          }
          $id_atendimento_2 = $Busca_temp['id_atendimento_input_2']; 
          $this->id_atendimento_2 = $Busca_temp['id_atendimento_input_2']; 
          $this->id_servidor_saude = $Busca_temp['id_servidor_saude']; 
          $tmp_pos = strpos($this->id_servidor_saude, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_servidor_saude = substr($this->id_servidor_saude, 0, $tmp_pos);
          }
          $id_servidor_saude_2 = $Busca_temp['id_servidor_saude_input_2']; 
          $this->id_servidor_saude_2 = $Busca_temp['id_servidor_saude_input_2']; 
          $this->tipo_servico = $Busca_temp['tipo_servico']; 
          $tmp_pos = strpos($this->tipo_servico, "##@@");
          if ($tmp_pos !== false)
          {
              $this->tipo_servico = substr($this->tipo_servico, 0, $tmp_pos);
          }
          $this->procedimento = $Busca_temp['procedimento']; 
          $tmp_pos = strpos($this->procedimento, "##@@");
          if ($tmp_pos !== false)
          {
              $this->procedimento = substr($this->procedimento, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['where_pesq']; 
      } 
      $nm_comando .= " group by tipo_servico, procedimento"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      while (!$rt->EOF) 
      {
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['tot_geral'][1])) 
         {
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['tot_geral'][1] = 1 ; 
         } 
         else
         {
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['tot_geral'][1] += 1 ; 
         } 
         $rt->MoveNext() ;
      } 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['contr_total_geral'] = "OK";
   } 

   //-----  tipo_servico
   function quebra_tipo_servico_sc_free_group_by($tipo_servico, $Where_qb) 
   {
      global $tot_tipo_servico ;  
      $tot_tipo_servico = array() ;  
      $tot_tipo_servico[0] = $tipo_servico ; 
   }
   //-----  procedimento
   function quebra_procedimento_sc_free_group_by($procedimento, $Where_qb) 
   {
      global $tot_procedimento ;  
      $tot_procedimento = array() ;  
      $tot_procedimento[0] = $procedimento ; 
   }
   //-----  tipo_paciente
   function quebra_tipo_paciente_sc_free_group_by($tipo_paciente, $Where_qb) 
   {
      global $tot_tipo_paciente ;  
      $tot_tipo_paciente = array() ;  
      $tot_tipo_paciente[0] = $tipo_paciente ; 
   }
   //-----  data_hora
   function quebra_data_hora_sc_free_group_by($data_hora, $Where_qb) 
   {
      global $tot_data_hora , $Sc_groupby_data_hora;  
      $tot_data_hora = array() ;  
      $tot_data_hora[0] = $data_hora ; 
   }
   //-----  tipo_servico
   function quebra_tipo_servico_tipo_servico($tipo_servico, $arg_sum_tipo_servico) 
   {
      global $tot_tipo_servico ;  
      $tot_tipo_servico = array() ;  
      $tot_tipo_servico[0] = $tipo_servico ; 
   }

   //----- 
   function resumo_sc_free_group_by($destino_resumo, &$array_total_tipo_servico, &$array_total_procedimento, &$array_total_tipo_paciente, &$array_total_data_hora)
   {
      global $nada, $nm_lang, $aluno, $servidor, $servidor_terceirizado, $visitante, $total;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['campos_busca'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
       $this->id_atendimento = $Busca_temp['id_atendimento']; 
       $tmp_pos = strpos($this->id_atendimento, "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_atendimento = substr($this->id_atendimento, 0, $tmp_pos);
       }
       $this->id_atendimento_2 = $Busca_temp['id_atendimento_input_2']; 
       $this->id_servidor_saude = $Busca_temp['id_servidor_saude']; 
       $tmp_pos = strpos($this->id_servidor_saude, "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_servidor_saude = substr($this->id_servidor_saude, 0, $tmp_pos);
       }
       $this->id_servidor_saude_2 = $Busca_temp['id_servidor_saude_input_2']; 
       $this->tipo_servico = $Busca_temp['tipo_servico']; 
       $tmp_pos = strpos($this->tipo_servico, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo_servico = substr($this->tipo_servico, 0, $tmp_pos);
       }
       $this->procedimento = $Busca_temp['procedimento']; 
       $tmp_pos = strpos($this->procedimento, "##@@");
       if ($tmp_pos !== false)
       {
           $this->procedimento = substr($this->procedimento, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['where_pesq_filtro'];
   $temp = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['SC_Gb_Free_sql'] as $cmp_gb => $ord)
   {
       $temp .= (empty($temp)) ? $cmp_gb . " " . $ord : ", " . $cmp_gb . " " . $ord;
   }
   $nmgp_order_by = (!empty($temp)) ? " order by " . $temp : "";
   $free_group_by = "";
   $all_sql_free  = array();
   $all_sql_free[] = "tipo_servico";
   $all_sql_free[] = "procedimento";
   $all_sql_free[] = "tipo_paciente";
   $all_sql_free[] = "data_hora";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['SC_Gb_Free_sql'] as $cmp_gb => $ord)
   {
       $free_group_by .= (empty($free_group_by)) ? $cmp_gb : ", " . $cmp_gb;
   }
   foreach ($all_sql_free as $cmp_gb)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['SC_Gb_Free_sql'][$cmp_gb]))
       {
           $free_group_by .= (empty($free_group_by)) ? $cmp_gb : ", " . $cmp_gb;
       }
   }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), tipo_servico, procedimento, tipo_paciente, str_replace (convert(char(10),data_hora,102), '.', '-') + ' ' + convert(char(8),data_hora,20) from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by " . $free_group_by . "  " . $nmgp_order_by;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $comando  = "select count(*), tipo_servico, procedimento, tipo_paciente, convert(char(23),data_hora,121) from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by " . $free_group_by . "  " . $nmgp_order_by;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $comando  = "select count(*), tipo_servico, procedimento, tipo_paciente, data_hora from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by " . $free_group_by . "  " . $nmgp_order_by;
      } 
      else 
      { 
         $comando  = "select count(*), tipo_servico, procedimento, tipo_paciente, data_hora from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by " . $free_group_by . "  " . $nmgp_order_by;
      } 
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $registro[0] = 1;
         $tipo_servico      = $registro[1];
         $tipo_servico_orig = $registro[1];
         $conteudo = $registro[1];
         $tipo_servico = $conteudo;
         if (null === $tipo_servico)
         {
             $tipo_servico = '';
         }
         if (null === $tipo_servico_orig)
         {
             $tipo_servico_orig = '';
         }
         $val_grafico_tipo_servico = $tipo_servico;
         $procedimento      = $registro[2];
         $procedimento_orig = $registro[2];
         $conteudo = $registro[2];
         $procedimento = $conteudo;
         if (null === $procedimento)
         {
             $procedimento = '';
         }
         if (null === $procedimento_orig)
         {
             $procedimento_orig = '';
         }
         $val_grafico_procedimento = $procedimento;
         $tipo_paciente      = $registro[3];
         $tipo_paciente_orig = $registro[3];
         $conteudo = $registro[3];
         $tipo_paciente = $conteudo;
         if (null === $tipo_paciente)
         {
             $tipo_paciente = '';
         }
         if (null === $tipo_paciente_orig)
         {
             $tipo_paciente_orig = '';
         }
         $val_grafico_tipo_paciente = $tipo_paciente;
         $registro[4] = substr($registro[4], 0, 10);
         $data_hora      = $registro[4];
         $data_hora_orig = $registro[4];
         $conteudo = $registro[4];
        if (substr($conteudo, 10, 1) == "-") 
        { 
            $conteudo = substr($conteudo, 0, 10) . " " . substr($conteudo, 11);
        } 
        if (substr($conteudo, 13, 1) == ".") 
        { 
           $conteudo = substr($conteudo, 0, 13) . ":" . substr($conteudo, 14, 2) . ":" . substr($conteudo, 17);
        } 
        $conteudo_x = $conteudo;
        nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
        if (is_numeric($conteudo_x) && $conteudo_x > 0) 
        { 
            $this->nm_data->SetaData($conteudo, "YYYY-MM-DD");
            $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa"));
        } 
         $data_hora = $conteudo;
         if (null === $data_hora)
         {
             $data_hora = '';
         }
         if (null === $data_hora_orig)
         {
             $data_hora_orig = '';
         }
         $val_grafico_data_hora = $data_hora;
         $data_hora_orig        = NM_encode_input(sc_strip_script($data_hora_orig));
         $val_grafico_data_hora = NM_encode_input(sc_strip_script($val_grafico_data_hora));
         $contr_arr = "";
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
         {
             $temp       = $cmp_gb . "_orig";
             $contr_arr .= "[\"" . str_replace('"', '\"', $$temp) . "\"]";
             $arr_name   = "array_total_" . $cmp_gb . $contr_arr;
            eval ('
             if (!isset($' . $arr_name . '))
             {
                 $' . $arr_name . '[0] = ' . $registro[0] . ';
                 $' . $arr_name . '[1] = $val_grafico_' . $cmp_gb . ';
                 $' . $arr_name . '[2] = "' . str_replace('"', '\"', $$temp) . '";
             }
             else
             {
                 $' . $arr_name . '[0] += ' . $registro[0] . ';
             }
            ');
         }
      }
   }

   //----- 
   function resumo_tipo_servico($destino_resumo, &$array_total_tipo_servico)
   {
      global $nada, $nm_lang, $aluno, $servidor, $servidor_terceirizado, $visitante, $total;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['campos_busca'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
       $this->id_atendimento = $Busca_temp['id_atendimento']; 
       $tmp_pos = strpos($this->id_atendimento, "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_atendimento = substr($this->id_atendimento, 0, $tmp_pos);
       }
       $this->id_atendimento_2 = $Busca_temp['id_atendimento_input_2']; 
       $this->id_servidor_saude = $Busca_temp['id_servidor_saude']; 
       $tmp_pos = strpos($this->id_servidor_saude, "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_servidor_saude = substr($this->id_servidor_saude, 0, $tmp_pos);
       }
       $this->id_servidor_saude_2 = $Busca_temp['id_servidor_saude_input_2']; 
       $this->tipo_servico = $Busca_temp['tipo_servico']; 
       $tmp_pos = strpos($this->tipo_servico, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo_servico = substr($this->tipo_servico, 0, $tmp_pos);
       }
       $this->procedimento = $Busca_temp['procedimento']; 
       $tmp_pos = strpos($this->procedimento, "##@@");
       if ($tmp_pos !== false)
       {
           $this->procedimento = substr($this->procedimento, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_atendimento']['where_pesq_filtro'];
   $nmgp_order_by = " order by tipo_servico asc"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), tipo_servico from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by tipo_servico  " . $nmgp_order_by;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $comando  = "select count(*), tipo_servico from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by tipo_servico  " . $nmgp_order_by;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $comando  = "select count(*), tipo_servico from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by tipo_servico  " . $nmgp_order_by;
      } 
      else 
      { 
         $comando  = "select count(*), tipo_servico from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by tipo_servico  " . $nmgp_order_by;
      } 
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $registro[0] = 1;
         $tipo_servico      = $registro[1];
         $tipo_servico_orig = $registro[1];
         $conteudo = $registro[1];
         $tipo_servico = $conteudo;
         if (null === $tipo_servico)
         {
             $tipo_servico = '';
         }
         if (null === $tipo_servico_orig)
         {
             $tipo_servico_orig = '';
         }
         $val_grafico_tipo_servico = $tipo_servico;
         if (isset($tipo_servico_orig))
         {
            //-----  tipo_servico
            if (!isset($array_total_tipo_servico[$tipo_servico_orig]))
            {
               $array_total_tipo_servico[$tipo_servico_orig][0] = $registro[0];
               $array_total_tipo_servico[$tipo_servico_orig][1] = sc_strip_script($val_grafico_tipo_servico);
               $array_total_tipo_servico[$tipo_servico_orig][2] = $tipo_servico_orig;
            }
            else
            {
               $array_total_tipo_servico[$tipo_servico_orig][0] += $registro[0];
            }
         } // isset
      }
   }
   //-----
   function get_array($rs)
   {
       if ('ado_mssql' != $this->Ini->nm_tpbanco)
       {
           return $rs->GetArray();
       }

       $array_db_total = array();
       while (!$rs->EOF)
       {
           $arr_row = array();
           foreach ($rs->fields as $k => $v)
           {
               $arr_row[$k] = $v . '';
           }
           $array_db_total[] = $arr_row;
           $rs->MoveNext();
       }
       return $array_db_total;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }

   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
