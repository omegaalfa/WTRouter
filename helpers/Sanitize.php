<?php
/**
 * Created by PhpStorm.
 * User: HCNX
 * Date: 11/05/2017
 * Time: 09:59
 */

namespace Helpers;


abstract class Sanitize
{
    /**
     * Filter
     *
     * @param  mixed $value
     * @param  array $modes
     * @return mixed
     * @static
     * @since  1.0
     */
    static public function filter($value, $modes = array('all'))
    {
        if (!is_array($modes)) {
            $modes = array($modes);
        }
        if (is_string($value)) {
            foreach ($modes as $type) {
                $value = self::_doFilter($value, $type);
            }
            return $value;
        }
        foreach ($value as $key => $toSanatize) {

            if (is_array($toSanatize)) {
                $value[$key] = self::filter($toSanatize, $modes);
            } else {
                foreach ($modes as $type) {
                    $value[$key] = self::_doFilter($toSanatize, $type);
                }
            }
        }

        return $value;
    }

    /**
     * DoFilter
     *
     * @param  mixed $value
     * @param  array $modes
     * @return mixed
     * @static
     * @since  1.0
     */
    static public function _doFilter($value, $mode)
    {
        switch ($mode) {
            case 'all':
                $value = strip_tags($value); //Retira as tags HTML e PHP de uma string
                $value = addslashes($value);//Adiciona barras invertidas a uma string
                $value = htmlspecialchars($value); //Converte caracteres especiais para a realidade HTML
                break;

            case 'string':
                $value = filter_var($value, FILTER_SANITIZE_STRING);
                break;

            case 'password':
                $value = password_hash($value, PASSWORD_DEFAULT, ['const' =>12]);
                break;

            case 'sql':
                $value = preg_replace('/[^[:alnum:]_]/', '', $value);
                break;

            case 'float':
                $value = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT);
                break;
            case 'int':
                $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
                break;

            case 'email':
                $value = filter_var($value, FILTER_SANITIZE_EMAIL);
                break;

            case 'noTags':
                $value = strip_tags($value); //Retira as tags HTML e PHP de uma string
                break;
        }
        return $value;
    }

} 