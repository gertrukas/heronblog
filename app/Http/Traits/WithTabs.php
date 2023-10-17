<?php

namespace App\Http\Traits;

trait WithTabs
{
    use WithMessages;

    public $tabs;
    public $selectedTab;
    public $prevTabsSelected = [];

    public $detailsTab = [
        'client' => true,
        'beneficiary' => true,
        'contract' => true,
        'document' => true,
    ];

    public function updatedSelectedTab()
    {
        $this->dispatchBrowserEvent('set-loading-to-false');
        $this->prevTabsSelected[$this->selectedTab] = $this->selectedTab;
    }

    public function initializeTabs(array $tabs, $menuDetails = false)
    {
        if ($menuDetails) {
            $tabs = $this->menuDetails();
        }
        $this->tabs = collect($tabs)->filter(fn ($tab) => !isset($tab['show']) || $tab['show']);
        $selected = $this->tabs->firstWhere('title', $this->selectedTab);
        if (!$selected) {
            $this->selectedTab = $this->tabs->first()['title'];
        }

        $this->prevTabsSelected[$this->selectedTab] = $this->selectedTab;
    }

    private function menuDetails()
    {
        $menuTabs = [];
        $menus = $this->detailsTab;
        foreach ($menus as $key => $value) {
            if ($value && config('globals.detail-tabs.' . $key)) {
                $menuTabs[] = config('globals.detail-tabs.' . $key);
            }
        }

        return  $menuTabs;
    }
}
