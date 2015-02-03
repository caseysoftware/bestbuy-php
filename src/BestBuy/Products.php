<?php

namespace BestBuy;

class Products extends \BestBuy\Resources\Base
{
    protected $resource = 'products';
    protected $resourceId = 'productId';

    /**
     * @param $averageReview This must include a comparison operator like: = >= <= > or <
     * @param $reviewCount This must include a comparison operator like: = >= <= > or <
     * @return $this
     */
    public function byReviews($averageReview, $reviewCount)
    {
        $parameters = array('customerReviewAverage' => $averageReview,
                            'customerReviewCount' => $reviewCount);

        return $this->byValue($parameters);
    }
}