<?php

namespace BestBuy;

class Products extends \BestBuy\Resources\Base
{
    protected $resource = 'products';
    protected $resourceId = 'productId';

    public function byReviews($averageReview, $reviewCount)
    {
        $parameters = array('customerReviewAverage' => '>=' . $averageReview,
                            'customerReviewCount' => '>=' . $reviewCount);

        return $this->byValue($parameters);
    }
}