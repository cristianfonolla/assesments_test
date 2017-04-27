<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Scale;

/**
 * Class ScaleTransformer
 * @package namespace App\Transformers;
 */
class ScaleTransformer extends TransformerAbstract
{

    /**
     * Transform the \Scale entity
     * @param \Scale $model
     *
     * @return array
     */
    public function transform(Scale $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
