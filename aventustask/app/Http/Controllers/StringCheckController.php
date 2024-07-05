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
        $request->validate([
            'master_string' => 'required|string',
            'string_1' => 'required|string',
            'string_2' => 'required|string',
            'string_3' => 'required|string',
            'string_4' => 'required|string'
        ]);

        $masterString = $request->input('master_string');
        $strings = [
            'string_1' => $request->input('string_1'),
            'string_2' => $request->input('string_2'),
            'string_3' => $request->input('string_3'),
            'string_4' => $request->input('string_4')
        ];

        $results = [];
        foreach ($strings as $key => $string) {
            if ($this->canFormString($masterString, $string)) {
                $results[$key] = 'Yes';
                $masterString = $this->removeCharacters($masterString, $string);
            } else {
                $results[$key] = 'No';
            }
        }

        return redirect()->route('showForm')->with('results', $results);

    }

    private function canFormString($masterString, $string)
    {
        $masterChars = count_chars($masterString, 1);
        $stringChars = count_chars($string, 1);

        foreach ($stringChars as $char => $count) {
            if (!isset($masterChars[$char]) || $masterChars[$char] < $count) {
                return false;
            }
        }

        return true;
    }

    private function removeCharacters($masterString, $string)
    {
        foreach (count_chars($string, 1) as $char => $count) {
            $masterString = str_replace(chr($char), '', $masterString, $count);
        }

        return $masterString;
    }
}
