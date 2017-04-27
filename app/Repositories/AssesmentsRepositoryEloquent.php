<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\assesmentsRepository;
use App\Entities\Assesments;
use App\Validators\AssesmentsValidator;

/**
 * Class AssesmentsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class AssesmentsRepositoryEloquent extends BaseRepository implements AssesmentsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Assesments::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AssesmentsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
