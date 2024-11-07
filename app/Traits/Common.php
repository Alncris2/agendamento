<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Str;

trait Common
{
    public function formatProperUsername($str)
    {
        return $this->removeAccents(mb_convert_case(str_replace(' ', '', $str), MB_CASE_LOWER, 'UTF-8'));
    }

    public function removeAccents($string)
    {

        if (!preg_match('/[\x80-\xff]/', $string)) {
            return $string;
        }

        $chars = [
            // Decompositions for Latin-1 Supplement
            chr(195) . chr(128) => 'A', chr(195) . chr(129) => 'A',
            chr(195) . chr(130) => 'A', chr(195) . chr(131) => 'A',
            chr(195) . chr(132) => 'A', chr(195) . chr(133) => 'A',
            chr(195) . chr(135) => 'C', chr(195) . chr(136) => 'E',
            chr(195) . chr(137) => 'E', chr(195) . chr(138) => 'E',
            chr(195) . chr(139) => 'E', chr(195) . chr(140) => 'I',
            chr(195) . chr(141) => 'I', chr(195) . chr(142) => 'I',
            chr(195) . chr(143) => 'I', chr(195) . chr(145) => 'N',
            chr(195) . chr(146) => 'O', chr(195) . chr(147) => 'O',
            chr(195) . chr(148) => 'O', chr(195) . chr(149) => 'O',
            chr(195) . chr(150) => 'O', chr(195) . chr(153) => 'U',
            chr(195) . chr(154) => 'U', chr(195) . chr(155) => 'U',
            chr(195) . chr(156) => 'U', chr(195) . chr(157) => 'Y',
            chr(195) . chr(159) => 's', chr(195) . chr(160) => 'a',
            chr(195) . chr(161) => 'a', chr(195) . chr(162) => 'a',
            chr(195) . chr(163) => 'a', chr(195) . chr(164) => 'a',
            chr(195) . chr(165) => 'a', chr(195) . chr(167) => 'c',
            chr(195) . chr(168) => 'e', chr(195) . chr(169) => 'e',
            chr(195) . chr(170) => 'e', chr(195) . chr(171) => 'e',
            chr(195) . chr(172) => 'i', chr(195) . chr(173) => 'i',
            chr(195) . chr(174) => 'i', chr(195) . chr(175) => 'i',
            chr(195) . chr(177) => 'n', chr(195) . chr(178) => 'o',
            chr(195) . chr(179) => 'o', chr(195) . chr(180) => 'o',
            chr(195) . chr(181) => 'o', chr(195) . chr(182) => 'o',
            chr(195) . chr(182) => 'o', chr(195) . chr(185) => 'u',
            chr(195) . chr(186) => 'u', chr(195) . chr(187) => 'u',
            chr(195) . chr(188) => 'u', chr(195) . chr(189) => 'y',
            chr(195) . chr(191) => 'y',
            // Decompositions for Latin Extended-A
            chr(196) . chr(128) => 'A', chr(196) . chr(129) => 'a',
            chr(196) . chr(130) => 'A', chr(196) . chr(131) => 'a',
            chr(196) . chr(132) => 'A', chr(196) . chr(133) => 'a',
            chr(196) . chr(134) => 'C', chr(196) . chr(135) => 'c',
            chr(196) . chr(136) => 'C', chr(196) . chr(137) => 'c',
            chr(196) . chr(138) => 'C', chr(196) . chr(139) => 'c',
            chr(196) . chr(140) => 'C', chr(196) . chr(141) => 'c',
            chr(196) . chr(142) => 'D', chr(196) . chr(143) => 'd',
            chr(196) . chr(144) => 'D', chr(196) . chr(145) => 'd',
            chr(196) . chr(146) => 'E', chr(196) . chr(147) => 'e',
            chr(196) . chr(148) => 'E', chr(196) . chr(149) => 'e',
            chr(196) . chr(150) => 'E', chr(196) . chr(151) => 'e',
            chr(196) . chr(152) => 'E', chr(196) . chr(153) => 'e',
            chr(196) . chr(154) => 'E', chr(196) . chr(155) => 'e',
            chr(196) . chr(156) => 'G', chr(196) . chr(157) => 'g',
            chr(196) . chr(158) => 'G', chr(196) . chr(159) => 'g',
            chr(196) . chr(160) => 'G', chr(196) . chr(161) => 'g',
            chr(196) . chr(162) => 'G', chr(196) . chr(163) => 'g',
            chr(196) . chr(164) => 'H', chr(196) . chr(165) => 'h',
            chr(196) . chr(166) => 'H', chr(196) . chr(167) => 'h',
            chr(196) . chr(168) => 'I', chr(196) . chr(169) => 'i',
            chr(196) . chr(170) => 'I', chr(196) . chr(171) => 'i',
            chr(196) . chr(172) => 'I', chr(196) . chr(173) => 'i',
            chr(196) . chr(174) => 'I', chr(196) . chr(175) => 'i',
            chr(196) . chr(176) => 'I', chr(196) . chr(177) => 'i',
            chr(196) . chr(178) => 'IJ', chr(196) . chr(179) => 'ij',
            chr(196) . chr(180) => 'J', chr(196) . chr(181) => 'j',
            chr(196) . chr(182) => 'K', chr(196) . chr(183) => 'k',
            chr(196) . chr(184) => 'k', chr(196) . chr(185) => 'L',
            chr(196) . chr(186) => 'l', chr(196) . chr(187) => 'L',
            chr(196) . chr(188) => 'l', chr(196) . chr(189) => 'L',
            chr(196) . chr(190) => 'l', chr(196) . chr(191) => 'L',
            chr(197) . chr(128) => 'l', chr(197) . chr(129) => 'L',
            chr(197) . chr(130) => 'l', chr(197) . chr(131) => 'N',
            chr(197) . chr(132) => 'n', chr(197) . chr(133) => 'N',
            chr(197) . chr(134) => 'n', chr(197) . chr(135) => 'N',
            chr(197) . chr(136) => 'n', chr(197) . chr(137) => 'N',
            chr(197) . chr(138) => 'n', chr(197) . chr(139) => 'N',
            chr(197) . chr(140) => 'O', chr(197) . chr(141) => 'o',
            chr(197) . chr(142) => 'O', chr(197) . chr(143) => 'o',
            chr(197) . chr(144) => 'O', chr(197) . chr(145) => 'o',
            chr(197) . chr(146) => 'OE', chr(197) . chr(147) => 'oe',
            chr(197) . chr(148) => 'R', chr(197) . chr(149) => 'r',
            chr(197) . chr(150) => 'R', chr(197) . chr(151) => 'r',
            chr(197) . chr(152) => 'R', chr(197) . chr(153) => 'r',
            chr(197) . chr(154) => 'S', chr(197) . chr(155) => 's',
            chr(197) . chr(156) => 'S', chr(197) . chr(157) => 's',
            chr(197) . chr(158) => 'S', chr(197) . chr(159) => 's',
            chr(197) . chr(160) => 'S', chr(197) . chr(161) => 's',
            chr(197) . chr(162) => 'T', chr(197) . chr(163) => 't',
            chr(197) . chr(164) => 'T', chr(197) . chr(165) => 't',
            chr(197) . chr(166) => 'T', chr(197) . chr(167) => 't',
            chr(197) . chr(168) => 'U', chr(197) . chr(169) => 'u',
            chr(197) . chr(170) => 'U', chr(197) . chr(171) => 'u',
            chr(197) . chr(172) => 'U', chr(197) . chr(173) => 'u',
            chr(197) . chr(174) => 'U', chr(197) . chr(175) => 'u',
            chr(197) . chr(176) => 'U', chr(197) . chr(177) => 'u',
            chr(197) . chr(178) => 'U', chr(197) . chr(179) => 'u',
            chr(197) . chr(180) => 'W', chr(197) . chr(181) => 'w',
            chr(197) . chr(182) => 'Y', chr(197) . chr(183) => 'y',
            chr(197) . chr(184) => 'Y', chr(197) . chr(185) => 'Z',
            chr(197) . chr(186) => 'z', chr(197) . chr(187) => 'Z',
            chr(197) . chr(188) => 'z', chr(197) . chr(189) => 'Z',
            chr(197) . chr(190) => 'z', chr(197) . chr(191) => 's',
        ];

        $string = strtr($string, $chars);

        return $string;
    }

    public function prepareMoneyForDatabase($val)
    {
        return str_replace(',', '.', str_replace('.', '', $val));
    }

    public function sanitizeZipcode($zipcode)
    {
        return str_replace(['.', '-', '_', ' '], '', $zipcode);
    }

    public function sanitizeCpfCnpj($doc)
    {
        return str_replace(['.', '-', '/', ' ', '_'], '', $doc);
    }

    public function sanitizePhone($phone)
    {
        return str_replace(['.', '-', '/', '(', ')', ' ', '+'], '', $phone);
    }

    public function sanitizePercentage($percentage)
    {
        $percentage = str_replace(['%', ' '], '', $percentage);
        return $this->convertMoneyToDatabase($percentage);
    }

    public function convertMoneyToDatabase($money)
    {
        if (is_string($money)) {
            $money = trim($money);
            if (strpos($money, 'R$') !== false) {
                $money = str_replace('R$', '', $money);
            }

            if (strpos($money, ',') !== false) {
                $money = str_replace(',', '.', str_replace('.', '', $money));
            }

            return (float)$money;
        } elseif (is_numeric($money)) {
            return (float)$money;
        } else {
            if (is_null($money)) {
                return 0;
            }

            if (is_array($money)) {
                foreach ($money as $key => $value) {
                    $money[$key] = $this->convertMoneyToDatabase($value);
                }

                return $money;
            }

            return 0;
        }
    }

    public function convertPercentageToDatabase($percentage)
{
    if (is_string($percentage)) {
        $percentage = trim($percentage);
        if (strpos($percentage, '%') !== false) {
            $percentage = str_replace('%', '', $percentage);
        }
        if (strpos($percentage, ',') !== false) {
            $percentage = str_replace(',', '.', str_replace('.', '', $percentage));
        }

        return (float)$percentage;
    } elseif (is_numeric($percentage)) {
        return (float)$percentage;
    } else {
        if (is_null($percentage)) {
            return 0;
        }

        if (is_array($percentage)) {
            foreach ($percentage as $key => $value) {
                $percentage[$key] = $this->convertPercentageToDatabase($value);
            }

            return $percentage;
        }

        return 0;
    }
}

    public function cpfCnpjAreValid($cpfCnpj)
    {
        $cpfCnpj = preg_replace('/[^0-9]/is', '', $cpfCnpj);
        if (strlen($cpfCnpj) === 11) {
            return $this->cpfIsValid($cpfCnpj);
        } else {
            return $this->cnpjIsValid($cpfCnpj);
        }
    }

    public function cpfIsValid($cpf)
    {
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);
        if (strlen($cpf) != 11) {
            return false;
        }
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    public function cnpjIsValid($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string)$cnpj);

        if (strlen($cnpj) != 14) {
            return false;
        }

        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    public function formatName($name)
    {
        $nameParts = explode(' ', $name);
        $formattedName = '';

        foreach ($nameParts as $part) {
            $formattedPart = mb_convert_case($part, MB_CASE_TITLE, 'UTF-8');
            $formattedName .= $formattedPart . ' ';
        }

        return trim($formattedName);
    }

    public function formatPhone($phoneNumber)
    {
        if (strlen($phoneNumber) == 10 || strlen($phoneNumber) == 11) {
            $formattedNumber = '(' . substr($phoneNumber, 0, 2) . ') ' . substr($phoneNumber, 2, 5) . '-' . substr($phoneNumber, -4);

            return $formattedNumber;
        } else {
            return $phoneNumber;
        }
    }

    public function formatPhoneNoDdi($phoneNumber)
    {
        if (strlen($phoneNumber) == 10) {
            $formattedNumber = '(' . substr($phoneNumber, 0, 2) . ') ' . substr($phoneNumber, 2, 4) . '-' . substr($phoneNumber, 6);
        } elseif (strlen($phoneNumber) == 11) {
            $formattedNumber = '(' . substr($phoneNumber, 0, 2) . ') ' . substr($phoneNumber, 2, 5) . '-' . substr($phoneNumber, 7);
        } else {
            $formattedNumber = $phoneNumber;
        }

        return $formattedNumber;
    }

    public function formatDateTime($dateTime)
    {
        return Carbon::parse($dateTime)->setTimeZone('America/Sao_Paulo')->format('d/m/Y H:i');
    }

    public function formatDate($dateTime)
    {
        return Carbon::parse($dateTime)->setTimeZone('America/Sao_Paulo')->format('d/m/Y');
    }

    public function formatMoney($value, $currency = false)
    {

        $value = number_format($value, 2, ',', '.');

        return $currency ? 'R$ ' . $value : $value;
    }

    public function formatPercent($money)
    {
        return number_format($money, 2, ',', '.') . '%';
    }

    public function formatCpfCnpj($document)
    {
        $document = preg_replace('/[^0-9]/', '', $document);

        if (strlen($document) === 11) {
            return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '\1.\2.\3-\4', $document);
        } elseif (strlen($document) === 14) {
            return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '\1.\2.\3/\4-\5', $document);
        }

        return $document;
    }

    public function formatZipCode($zipcode)
    {
        return preg_replace('/(\d{5})(\d{3})/', '\1-\2', $zipcode);
    }

    public function sanitizeTextToNumber($string)
    {
        return preg_replace('/[^0-9]/', '', $string);
    }

    public function getDeliveredWeekDay($w)
    {
        $days = ['Domingo-Feira', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado-Feira'];

        return $days[$w];
    }

    public function createDate(string $date = null, string $format = 'd/m/Y')
    {
        if(is_null($date)) {
            return null;
        }

        $dateFormat = Carbon::createFromFormat($format, $date)->setTimezone('America/Sao_Paulo');

        return $dateFormat->toDateString();
    }

    public function makeImageName($custonName = null)
    {
        $letters = 'abcdefghijklmnopqrstuvwxyz0123456789';

        return $custonName . '_' . str_replace(['.', ' '], '', uniqid(rand(), true) . substr(str_shuffle($letters), 0, 4)) . date('YmdHis');
    }
}
