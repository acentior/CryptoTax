<?php

namespace App\Services;

use App\CaravelAdmin\Resources\AffiliateUser\AffiliateUserResource;
use App\CaravelAdmin\Resources\BackendUser\BackendUserResource;
use App\CaravelAdmin\Resources\CryptoSource\CryptoSourceResource;
use App\CaravelAdmin\Resources\Customer\CustomerResource;
use App\CaravelAdmin\Resources\TaxAdvisor\TaxAdvisorResource;
use App\CaravelAdmin\Resources\UserAccountType\UserAccountTypeResource;
use App\CaravelAdmin\Resources\UserCreditAction\UserCreditActionResource;
use App\CaravelAdmin\Resources\UserCreditLog\UserCreditLogResource;

class NavigationService
{
    /**
     * @var $this
     */
    protected static self $instance;

    /**
     * @var array
     */
    protected array $items = [];
    /**
     * @var array
     */
    protected array $subnavi = [];

    public function __construct()
    {
        $user = \Auth::user();

        if($user->isAdminAccount()) {
            $this->adminAccountItems();
        }
        else if($user->isCustomerAccount()) {
            $this->customerAccountItems();
        }
        else if($user->isTaxAdvisorAccount()) {
            $this->taxAdvisorAccountItems();
        }
        else if($user->isSupportAccount()) {
            $this->supportAccountItems();
        }
        else if($user->isEditorAccount()) {
            $this->editorAccountItems();
        }
    }

    /**
     * @return static
     */
    public static function instance(): self
    {
        return static::$instance ?? (static::$instance = new self());
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return array
     */
    public function getTopLevelItems(): array
    {
        return array_map(function($row){
            unset($row["actions"], $row["children"]);
            return $row;
        }, $this->items);
    }


    /**
     * @param array $children
     * @param array $actions
     * @return $this
     */
    public function overwriteSubnavi(array $children, array $actions = []): self
    {
        $this->subnavi = [
            "children" => $children,
            "actions" => $actions
        ];

        return $this;
    }


    /**
     * @return array
     */
    public function getSubnavi(): array
    {
        return $this->subnavi ?: $this->getRouteItem();
    }


    /**
     * @return array
     */
    public function getRouteItem(): array
    {
        $result = array_filter($this->items, function ($row) {
            return request()->routeIs($row["route"]);
        });

        return $result ? current($result) : [];
    }

    /**
     * @param string $topItemLabel
     * @return array
     */
    public function getItem(string $topItemLabel): array
    {
        $result = array_filter($this->items, function ($row) use ($topItemLabel) {
            return $row["label"] == $topItemLabel;
        });

        return current($result);
    }

    /**
     * @param array $array
     * @return $this
     */
    protected function addItems(array $array): self
    {
        foreach($array AS $row) {
            $this->addItem($row["label"], $row["icon"] ?? null, $row["route"] ?? null, $row["children"] ?? [], $row["actions"] ?? []);
        }

        return $this;
    }

    /**
     * @param string $label
     * @param string|null $icon
     * @param string|null $route
     * @param array $children
     * @param array $actions
     * @return $this
     */
    protected function addItem(string $label, ?string $icon = null, ?string $route = null, array $children = [], array $actions = []): self
    {
        $hasChildren = false;
        foreach($children AS $child) {
            if(empty($child["hide"])) {
                $hasChildren = true;
            }
        }

        if($route || $hasChildren) {
            $this->items[] = [
                'label' => $label,
                'icon' => $icon,
                'route' => $route,
                'children' => $children,
                'actions' => $actions,
            ];
        }

        return $this;
    }


    private function adminAccountItems()
    {
        $this->addItems([
            ["label" => __('Dashboard'), 'icon' => 'dashboard', 'route' => 'admin.dashboard'],
            ["label" => __('User'), 'children' => [
                CustomerResource::make()->sidebar(),
                TaxAdvisorResource::make()->sidebar(),
                BackendUserResource::make()->sidebar(),
                AffiliateUserResource::make()->sidebar(),
                UserAccountTypeResource::make()->sidebar(),
                UserCreditActionResource::make()->sidebar(),
                UserCreditLogResource::make()->sidebar()
            ]],
            ["label" => __('Finance'), 'children' => [
                ["label" => "Finance", "icon" => "fas-coins", "route" => "admin.todo"],
            ]],
            ["label" => __('API\'s'), 'children' => [
                CryptoSourceResource::make()->sidebar(),
            ]],
            ["label" => __('Settings'), 'children' => [
                ["label" => "Affiliate Settings", "icon" => "fas-ad", "route" => "admin.settings.affiliate"],
            ]],
            ["label" => __('Administration'), 'children' => [
                ["label" => "Currency Stats", "icon" => "fas-binoculars", "route" => "admin.crypto.currency-stats"],
                ["label" => "Telescope", "icon" => "fas-binoculars", "route" => "telescope", "target" => "_blank"],
            ]],
        ]);
    }


    private function customerAccountItems()
    {
        $this->addItems([
            ["label" => __('Dashboard'), 'icon' => 'carbon-dashboard', 'route' => 'customer.dashboard',
                "children" => [
                    ["label" => __('Markets'), 'icon' => 'fluentui-building-shop-16-o', 'route' => 'customer.dashboard'],
                    ["label" => __('Watchlist'), 'icon' => 'uni-eye-o', 'route' => 'customer.account'],
                ],
                "actions" => [
                    ["label" => __('Invite a Friend'), 'icon' => 'go-person-add-16', 'route' => 'customer.invite', 'color' => 'text-white bg-primary'],
                ]
            ],
            ["label" => __('Accounts'), 'icon' => 'carbon-wallet', 'route' => 'customer.account',
                "children" => [
                    ["label" => "Accounts", "icon" => "fluentui-wallet-32-o", "route" => "customer.account"],
                    ["label" => "Transactions", "icon" => "grommet-transaction", "route" => "customer.transactions"],
                    ["label" => "Add New Account", "icon" => "bx-add-to-queue", "route" => "customer.account.new"],
                ],
                "actions" => [
                    ["label" => __('Invite a Friend'), 'icon' => 'go-person-add-16', 'route' => 'customer.invite', 'color' => 'text-white bg-primary'],
                ]
            ],
            ["label" => __('Portfolio'), 'icon' => 'carbon-portfolio', 'route' => 'customer.portfolio',
                "children" => [
                    ["label" => __('Portfolio'), "icon" => "fluentui-wallet-32-o", "route" => "customer.portfolio"],
                    ["label" => __('Transactions'), 'icon' => 'grommet-transaction', 'route' => 'customer.transactions'],
                    ["label" => __('Assets'), 'icon' => 'grommet-money', 'route' => 'customer.asset'],
                ],
                "actions" => [
                    ["label" => __('Invite a Friend'), 'icon' => 'go-person-add-16', 'route' => 'customer.invite', 'color' => 'text-white bg-primary'],
                ]
            ],
            ["label" => __('Taxes'), 'icon' => 'tabler-tax', 'route' => 'customer.taxes',
                "children" => [
                    ["label" => __('Markets'), 'icon' => 'fluentui-building-shop-16-o', 'route' => 'customer.dashboard'],
                    ["label" => __('Watchlist'), 'icon' => 'uni-eye-o', 'route' => 'customer.account'],
                ],
                "actions" => [
                    ["label" => __('Invite a Friend'), 'icon' => 'go-person-add-16', 'route' => 'customer.invite', 'color' => 'text-white bg-primary'],
                ]
            ],
            ["label" => __('Advisor'), 'icon' => 'uni-user-md-o', 'route' => 'customer.advisor',
                "children" => [
                    ["label" => __('Markets'), 'icon' => 'fluentui-building-shop-16-o', 'route' => 'customer.dashboard'],
                    ["label" => __('Watchlist'), 'icon' => 'uni-eye-o', 'route' => 'customer.account'],
                ],
                "actions" => [
                    ["label" => __('Invite a Friend'), 'icon' => 'go-person-add-16', 'route' => 'customer.invite', 'color' => 'text-white bg-primary'],
                ]
            ],
            ["label" => __('Services'), 'icon' => 'carbon-folders', 'route' => 'customer.services',
                "children" => [
                    ["label" => __('Markets'), 'icon' => 'fluentui-building-shop-16-o', 'route' => 'customer.dashboard'],
                    ["label" => __('Watchlist'), 'icon' => 'uni-eye-o', 'route' => 'customer.account'],
                ],
                "actions" => [
                    ["label" => __('Invite a Friend'), 'icon' => 'go-person-add-16', 'route' => 'customer.invite', 'color' => 'text-white bg-primary'],
                ]
            ],
        ]);
    }


    private function taxAdvisorAccountItems()
    {
        $this->addItems([
            ["label" => __('Dashboard'), 'icon' => 'fas-home', 'route' => 'customer.dashboard'],
        ]);
    }


    private function supportAccountItems()
    {
        $this->addItems([
            ["label" => __('Dashboard'), 'icon' => 'fas-home', 'route' => 'admin.dashboard'],
        ]);
    }


    private function editorAccountItems()
    {
        $this->addItems([
            ["label" => __('Dashboard'), 'icon' => 'fas-home', 'route' => 'admin.dashboard'],
        ]);
    }
}
