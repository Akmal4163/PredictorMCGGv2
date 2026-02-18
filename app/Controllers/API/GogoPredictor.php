<?php namespace App\Controllers\Api;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models\PredictorModel;

class GogoPredictor extends Controller
{
    use ResponseTrait;

    public function predict()
    {
        $json = $this->request->getJSON(true);
        $enemies = $json['enemies'] ?? null;

        if (!$enemies || count($enemies) !== 7) {
            return $this->failValidationError('Harus 7 lawan');
        }

        $model = new PredictorModel();
        $result = $model->calculatePrediction($enemies);

        return $this->respond([
            'status' => 200,
            'data' => $result
        ]);
    }
}
