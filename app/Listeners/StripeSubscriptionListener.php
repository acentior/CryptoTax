<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\UserCreditAction;
use App\Services\CreditCodeService;
use Spark\Events\SubscriptionCreated;

class StripeSubscriptionListener
{
    public function __construct()
    {
        //
    }


    public function handle(SubscriptionCreated $event)
    {
        /**
         * @var User $user
         */
        $user = $event->billable;
        $user->creditAction(CreditCodeService::ACTION_ADD_PREMIUM_YEAR);
    }
}
