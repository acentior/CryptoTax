<?php

namespace App\Http\Livewire\Partials;

use App\Models\UserAccountType;
use Laravel\Jetstream\Http\Livewire\NavigationMenu;

class SubNavi extends NavigationMenu
{
    /**
     * @var array
     */
    public array $navItems = [];

    /**
     * @var array
     */
    public array $actions = [];


    public function __construct()
    {
        $user = \Auth::user();

        if($user->isAdminAccount()) {
            // No subnavi currently
        }
        else if($user->isCustomerAccount()) {
            $this->navItems = [
                ["label" => __('Markets'), 'icon' => 'fas-shopping-cart', 'route' => 'dashboard'],
                ["label" => __('Watchlist'), 'icon' => 'fas-binoculars', 'route' => 'customer.wallet'],
                ["label" => __('News'), 'icon' => 'fas-newspaper', 'route' => 'customer.portfolio'],
                ["label" => __('Invite a Friend'), 'icon' => 'fas-user-plus', 'route' => 'customer.taxes'],
            ];
            $this->actions = [
                ["label" => __('Share'), 'icon' => 'fas-share-alt', 'route' => 'todo', 'color' => 'text-blue-800 bg-third'],
                ["label" => __('Settings'), 'icon' => 'fas-cogs', 'route' => 'todo', 'color' => 'text-white bg-primary'],
            ];
        }
        else if($user->isTaxAdvisorAccount()) {
            // No subnavi currently
        }
        else if($user->isSupportAccount()) {
            // No subnavi currently
        }
        else if($user->isEditorAccount()) {
            // No subnavi currently
        }
    }

    /**
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.partials.sub-navi');
    }
}
