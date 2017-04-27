<?php

namespace App\Presenters;

use App\Transformers\AssesmentsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AssesmentsPresenter
 *
 * @package namespace App\Presenters;
 */
class AssesmentsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AssesmentsTransformer();
    }
}
