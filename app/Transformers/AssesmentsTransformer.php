<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Assesments;

/**
 * Class AssesmentsTransformer
 * @package namespace App\Transformers;
 */
class AssesmentsTransformer extends TransformerAbstract
{

    /**
     * Transform the \Assesments entity
     * @param \Assesments $model
     *
     * @return array
     */
    public function transform(Assesments $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
