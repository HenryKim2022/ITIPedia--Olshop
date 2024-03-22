<?php

namespace Modules\PaymentGateway\Http\Services\Base;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseService
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    public function allTrashed(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->onlyTrashed()->get($columns);
    }

    public function findById(int $modelId, array $columns = ['*'], array $relations = [], $appends = []): ?Model
    {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }

    public function findTrashedById(int $modelId): ?Model
    {
        return $this->model->withTrashed()->findOrFail($modelId);
    }

    public function findOnlyTrashedById(int $modelId): ?Model
    {
        return $this->model->onlyTrashed()->findOrFail($modelId);
    }

    public function create(array $payload): ?Model
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }

    public function update(int $modelId, $payload): bool
    {
        $model = $this->findById($modelId);
        return $model->update($payload);
    }

    public function deleteById(int $modelId): bool
    {
        return  $this->findById($modelId)->delete();
    }

    public function reStoreById(int $modelId): bool
    {
        return $this->findOnlyTrashedById($modelId)->restore();
    }

    public function permanentlyDeleteById(int $modelId): bool
    {
        return $this->findTrashedById($modelId)->forceDelete();
    }
}
