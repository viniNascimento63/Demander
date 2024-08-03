<?php

namespace Demander;

class Conversor
{

    public static function parseToRoman($num)
    {
        $num = str_split($num);
        $length = count($num); // casas decimais 
        $response = '';
        $romanos = [];

        foreach ($num as $algarismo) {
            while ($length > 0) { 
                // Determina número de casas decimais conforme tamanho do número
                switch ($length) {
                    case 5: // dezena de milhar
                        if ($algarismo == "9") {
                            array_push($romanos, "XC");
                        } elseif ($algarismo == "8") {
                            array_push($romanos, "LXXX");
                        } elseif ($algarismo == "7") {
                            array_push($romanos, "LXX");
                        } elseif ($algarismo == "6") {
                            array_push($romanos, "LX");
                        } elseif ($algarismo == "5") {
                            array_push($romanos, "L");
                        } elseif ($algarismo == "4") {
                            array_push($romanos, "XL");
                        } elseif ($algarismo == "3") {
                            array_push($romanos, "XXX");
                        } elseif ($algarismo == "2") {
                            array_push($romanos, "XX");
                        } elseif ($algarismo == "1") {
                            array_push($romanos, "X");
                        }
                        $length--;
                        break;

                    case 4: // unidade de milhar
                        if ($algarismo == "9") {
                            array_push($romanos, "IX");
                        } elseif ($algarismo == "8") {
                            array_push($romanos, "VIII");
                        } elseif ($algarismo == "7") {
                            array_push($romanos, "VII");
                        } elseif ($algarismo == "6") {
                            array_push($romanos, "VI");
                        } elseif ($algarismo == "5") {
                            array_push($romanos, "V");
                        } elseif ($algarismo == "4") {
                            array_push($romanos, "IV");
                        } elseif ($algarismo == "3") {
                            array_push($romanos, "MMM");
                        } elseif ($algarismo == "2") {
                            array_push($romanos, "MM");
                        } elseif ($algarismo == "1") {
                            array_push($romanos, "M");
                        }
                        $length--;
                        break;

                    case 3: // centeza
                        if ($algarismo == "9") {
                            array_push($romanos, "CM");
                        } elseif ($algarismo == "8") {
                            array_push($romanos, "DCCC");
                        } elseif ($algarismo == "7") {
                            array_push($romanos, "DCC");
                        } elseif ($algarismo == "6") {
                            array_push($romanos, "DC");
                        } elseif ($algarismo == "5") {
                            array_push($romanos, "D");
                        } elseif ($algarismo == "4") {
                            array_push($romanos, "CD");
                        } elseif ($algarismo == "3") {
                            array_push($romanos, "CCC");
                        } elseif ($algarismo == "2") {
                            array_push($romanos, "CC");
                        } elseif ($algarismo == "1") {
                            array_push($romanos, "C");
                        }
                        $length--;
                        break;

                    case 2: // dezena
                        if ($algarismo == "9") {
                            array_push($romanos, "XC");
                        } elseif ($algarismo == "8") {
                            array_push($romanos, "LXXX");
                        } elseif ($algarismo == "7") {
                            array_push($romanos, "LXX");
                        } elseif ($algarismo == "6") {
                            array_push($romanos, "LX");
                        } elseif ($algarismo == "5") {
                            array_push($romanos, "L");
                        } elseif ($algarismo == "4") {
                            array_push($romanos, "XL");
                        } elseif ($algarismo == "3") {
                            array_push($romanos, "XXX");
                        } elseif ($algarismo == "2") {
                            array_push($romanos, "XX");
                        } elseif ($algarismo == "1") {
                            array_push($romanos, "X");
                        }
                        $length--;
                        break;
                    case 1: // unidade
                        if ($algarismo == "9") {
                            array_push($romanos, "IX");
                        } elseif ($algarismo == "8") {
                            array_push($romanos, "VIII");
                        } elseif ($algarismo == "7") {
                            array_push($romanos, "VII");
                        } elseif ($algarismo == "6") {
                            array_push($romanos, "VI");
                        } elseif ($algarismo == "5") {
                            array_push($romanos, "V");
                        } elseif ($algarismo == "4") {
                            array_push($romanos, "IV");
                        } elseif ($algarismo == "3") {
                            array_push($romanos, "III");
                        } elseif ($algarismo == "2") {
                            array_push($romanos, "II");
                        } elseif ($algarismo == "1") {
                            array_push($romanos, "I");
                        }
                        $length -= 1;
                        break;
                }
                break;
            }
        }

        foreach ($romanos as $algarismo) {
            $response .= $algarismo;
        }

        return $response;
    }

    public static function parseToIndo($num)
    {   
        $num = str_split(strtoupper($num));
        $response = 0;

        foreach ($num as $key => $algarismo) {
            switch ($algarismo) {
                case 'M':
                    $response += 1000;
                    break;

                case 'D':
                    $response += 500;
                    break;

                case 'C':
                    if (($key + 1 < count($num)) && ($num[$key + 1] === 'D' || $num[$key + 1] === 'M')) {
                        $response -= 100;
                    } else {
                        $response += 100;
                    }
                    break;

                case 'L':
                    $response += 50;
                    break;

                case 'X':
                    if (($key + 1 < count($num)) && ($num[$key + 1] === 'L' || $num[$key + 1] === 'C')) {
                        $response -= 10;
                    } else {
                        $response += 10;
                    }
                    break;

                case 'V':
                    $response += 5;
                    break;

                case 'I':
                    if (($key + 1 < count($num)) && ($num[$key + 1] === 'V' || $num[$key + 1] === 'X')) {
                        $response -= 1;
                    } else {
                        $response += 1;
                    }
                    break;
            }
        }

        return $response;
    }
}
