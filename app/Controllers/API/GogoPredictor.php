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

        $model = new PredictorModel();
        $result = $model->calculatePrediction($enemies);

        return $this->respond([
            'status' => 200,
            'data' => $result
        ]);
    }
}
