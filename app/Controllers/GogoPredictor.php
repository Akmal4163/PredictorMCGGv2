<?php namespace App\Controllers\Api;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models\PredictorModel;

class GogoPredictor extends Controller
{
    use ResponseTrait;

    public function predict()
    {
        $enemies = $this->request->getPost('enemies');

        $model = new PredictorModel();
        $result = $model->calculatePrediction($enemies);


        return $this->respond([
            'status' => 200,
            'data' => $result
        ]);
    }
}
