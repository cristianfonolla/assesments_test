<?php

namespace App\Presenters;

use App\Transformers\ScaleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ScalePresenter
 *
 * @package namespace App\Presenters;
 */
class ScalePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ScaleTransformer();
    }
}
