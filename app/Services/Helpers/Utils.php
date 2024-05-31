<?php

namespace App\Services\Helpers;

class Utils
{
    public static function format($tipo = "", $string, $size = 10)
    {
        $string = mb_ereg_replace("[^0-9]", "", $string);

        switch ($tipo) {
            case 'phone':
                if ($size === 10) {
                    $string = '(' . substr($tipo, 0, 2) . ') ' . substr($tipo, 2, 4)
                        . '-' . substr($tipo, 6);
                } elseif ($size === 11) {
                    $string = '(' . substr($tipo, 0, 2) . ') ' . substr($tipo, 2, 5)
                        . '-' . substr($tipo, 7);
                }
                break;
            case 'zipCode':
                $string = substr($string, 0, 5) . '-' . substr($string, 5, 3);
                break;
            case 'document':
                if (strlen($string) === 11) {
                    $string = substr($string, 0, 3) . '.' . substr($string, 3, 3) .
                        '.' . substr($string, 6, 3) . '-' . substr($string, 9, 2);
                } else {
                    $string = substr($string, 0, 2) . '.' . substr($string, 2, 3) .
                        '.' . substr($string, 5, 3) . '/' .
                        substr($string, 8, 4) . '-' . substr($string, 12, 2);
                }
                break;
            case 'cpf':
                $string = substr($string, 0, 3) . '.' . substr($string, 3, 3) .
                    '.' . substr($string, 6, 3) . '-' . substr($string, 9, 2);
                break;
            case 'cnpj':
                $string = substr($string, 0, 2) . '.' . substr($string, 2, 3) .
                    '.' . substr($string, 5, 3) . '/' .
                    substr($string, 8, 4) . '-' . substr($string, 12, 2);
                break;
            case 'rg':
                $string = substr($string, 0, 2) . '.' . substr($string, 2, 3) .
                    '.' . substr($string, 5, 3);
                break;
            default:
                $string = 'É necessário definir um tipo(fone, cep, cpg, cnpj, rg)';
                break;
        }

        return $string;
    }

    public function removeMask($value)
    {
        return  preg_replace('/[^a-zA-Z0-9]/', '', $value);
    }

    public function maskEmail($email)
    {
        $parts = explode("@", $email);
        if (count($parts) === 2) {
            $username = $parts[0];
            $domain = $parts[1];

            $maskedUsername = substr($username, 0,3) . str_repeat('*', strlen($username) - 3);

            return $maskedUsername . '@' . $domain;
        } else {
            return $email;
        }
    }
}
