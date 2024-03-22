<?php

namespace Modules\PaymentGateway\Http\Services;

use Modules\PaymentGateway\Entities\PaymentGateway;
use Modules\PaymentGateway\Http\Services\Base\BaseService;

class PaymentGatewayService extends BaseService
{
    protected $model;
    public function __construct(PaymentGateway $model)
    {
        $this->model = $model;
    }
    public function index(): array
    {
        $data = [];
        $data['payment_gateways'] =  $this->model->where('is_show', 1)->get();
        return $data;
    }
    public function store(array $payload)
    {
        return $model = $this->create($this->formatParams($payload));
    }
    public function formatParams(array $payload, $modelId = null): array
    {
        $params = [];
        if ($modelId) {
            $params['updated_by'] = auth()->user()->id;
        } else {
            $params['created_by'] = auth()->user()->id;
        }
        return $params;
    }
    public function edit(int $modelId)
    {
        $data = [];
        $data['gateway'] = $this->findById($modelId);
        return $data;
    }
    public function updateModel($modelId, $payload)
    {
        return  $model = $this->update($modelId, $this->formatParams($payload, $modelId));
    }
    public function destroy(int $modelId)
    {
        return $this->deleteById($modelId);
    }
    public function activeGateways()
    {
        return $this->model->where('is_active', 1)->get();
    }
}
