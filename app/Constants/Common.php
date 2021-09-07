<?php

namespace App\Constants;


class Common
{
    const ORDER_RECCOMEND = '0';
    const ORDER_HIGHER = '1';
    const ORDER_LOWER = '2';
    const ORDER_LATER = '3';
    const ORDER_OLDER = '4';

    const SORT_ORDER = [
        'recommend' => self::ORDER_RECCOMEND,
        'higherPrice' => self::ORDER_HIGHER,
        'lowerPrice' => self::ORDER_LOWER,
        'later' => self::ORDER_LATER,
        'older' => self::ORDER_OLDER
    ];

}

// <!-- <select name="sort" id="sort">
//                                     <option value="{{ \Constant::SORT_ORDER['later'] }}"
//                                     @if(\Request::get('sort') === \Constant::SORT_ORDER['later'])
//                                     selected
//                                     @endif
//                                     >新しい順</option>
//                                     <option value="{{ \Constant::SORT_ORDER['older'] }}"
//                                     @if(\Request::get('sort') === \Constant::SORT_ORDER['older'])
//                                     selected
//                                     @endif
//                                     >古い順</option>
//                                 </select> -->
// <option value="{{ \Constant::SORT_ORDER['higherPrice'] }}"
// @if(\Request::get('sort') === \Constant::SORT_ORDER['higherPrice'])
// selected
// @endif
// >価格の高い順</option>
// <option value="{{ \Constant::SORT_ORDER['lowerPrice'] }}"
// @if(\Request::get('sort') === \Constant::SORT_ORDER['lowerPrice'])
// selected
// @endif
// >価格の安い順</option>