<?php

namespace App\Services;

use App\DTO\Suporte\CreateSuporteDTO;
use App\DTO\Suporte\UpdateSuporteDTO;
use App\Repositories\SuporteRepositoryInterface;
use stdClass;

class SuporteService
{
    public function __construct(
        protected SuporteRepositoryInterface $repository,
    ){}

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateSuporteDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateSuporteDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}