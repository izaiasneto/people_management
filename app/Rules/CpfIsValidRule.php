<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CpfIsValidRule implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail) : void
    {
        if ($value !== null) {
            // Verifica se tem 11 digitos
            if (strlen($value) !== 11) {
                $fail('O CPF é inválido.');
                return;
            }
        
            // Verificação com dígitos repetidos
            if (preg_match('/^(\d)\1{10}$/', $value)) {
                $fail('O CPF é inválido.');
                return;
            }
        
            $sum = 0;
            for ($i = 0; $i < 9; $i++) {
                $sum += intval($value[$i]) * (10 - $i);
            }
        
            $remainder = $sum % 11;
        
            if ($remainder === 0 || $remainder === 1) {
                $expected_digit = 0;
            } else {
                $expected_digit = 11 - $remainder;
            }
        
            if (intval($value[9]) !== $expected_digit) {
                $fail('O CPF é inválido.');
                return;
            }
        
            $sum = 0;
            for ($i = 0; $i < 10; $i++) {
                $sum += intval($value[$i]) * (11 - $i);
            }
        
            $remainder = $sum % 11;
        
            if ($remainder === 0 || $remainder === 1) {
                $expected_digit = 0;
            } else {
                $expected_digit = 11 - $remainder;
            }
        
            if (intval($value[10]) !== $expected_digit) {
                $fail('O CPF é inválido.');
            }
        }
    }
}