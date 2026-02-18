<?php namespace App\Models;

use CodeIgniter\Model;

class PredictorModel extends Model
{
    public function calculatePrediction(array $e): array
    {
        return [
            'rounds' => $e,
            'next' => [
                $e[1],
                $e[4],
                $e[3],
            ]
        ];
    }
}
