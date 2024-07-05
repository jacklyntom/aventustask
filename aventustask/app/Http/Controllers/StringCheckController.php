<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StringCheckController extends Controller
{
    public function showForm()
    {
        return view('string_form');
    }

    public function checkStrings(Request $request)
    {
        $masterString = $request->input('masterString');
        $strings = [
            'String 1' => $request->input('string1'),
            'String 2' => $request->input('string2'),
            'String 3' => $request->input('string3'),
            'String 4' => $request->input('string4')
        ];

        $results = [];
        $masterStringChars = count_chars($masterString, 1);

        foreach ($strings as $key => $str) {
            $strChars = count_chars($str, 1);
            $canForm = true;

            foreach ($strChars as $char => $count) {
                if (!isset($masterStringChars[$char]) || $masterStringChars[$char] < $count) {
                    $canForm = false;
                    break;
                }
            }

            if ($canForm) {
                foreach ($strChars as $char => $count) {
                    $masterStringChars[$char] -= $count;
                }
                $results[$key] = 'Yes';
            } else {
                $results[$key] = 'No';
            }
        }

        return view('string_form', ['results' => $results]);
    }
}
