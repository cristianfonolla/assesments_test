<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ScaleRepository;
use App\Entities\Scale;
use App\Validators\ScaleValidator;

/**
 * Class ScaleRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ScaleRepositoryEloquent extends BaseRepository implements ScaleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Scale::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ScaleValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
