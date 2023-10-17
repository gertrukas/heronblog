<?php

namespace App\Http\Traits;

trait WithSorting
{

    public $sortByAttribute = 'id';
    public $sortByStatus = '';
    public $sortByType = '';
    public $sortDirection = 'DESC';

    public function sortBy($value)
    {
        $reference = explode('.', $value);
        if (($reference[0] == 'status' || $reference[0] == 'type') && isset($reference[1])) {
            
            if ($reference[0] == 'status')
                $sortArray = array_combine(
                    array_keys(config('globals.status.' . $reference[1])),
                    array_map(
                        function ($status) {
                            return __($status);
                        },
                        array_keys(
                            config('globals.status.' . $reference[1])
                        )
                    )
                );
            else if ($reference[0] == 'type')
                $sortArray = array_combine(
                    array_keys(config('globals.types.' . $reference[1])),
                    array_map(
                        function ($type) {
                            return __($type);
                        },
                        array_keys(
                            config('globals.types.' . $reference[1])
                        )
                    )
                );
            asort($sortArray);

            // dd($sortArray);

            $sortArray = array_keys($sortArray);

            if ($reference[0] == 'status')
                $this->sortByStatus = 'CASE ';
            else if ($reference[0] == 'type')
                $this->sortByType = 'CASE ';

            $referenceKey = count($reference) > 2 ? $reference[2] : $reference[0];

            foreach ($sortArray as $key => $ref) {
                $this->sortByType .= 'WHEN ' . $referenceKey . '=\'' . $ref . '\' THEN ' . ($key + 1) . ' ';
                $this->sortByStatus .= 'WHEN ' . $referenceKey . '=\'' . $ref . '\' THEN ' . ($key + 1) . ' ';
            }

            if ($reference[0] == 'status')
                $this->sortByStatus .= 'ELSE 0 END ';
            else if ($reference[0] == 'type')
                $this->sortByType .= 'ELSE 0 END ';
        }

        if ($value != $this->sortByAttribute || $this->sortDirection == 'DESC') {
            $this->sortDirection = 'ASC';
        } else {
            $this->sortDirection = 'DESC';
        }

        $this->sortByAttribute = $value;
    }

    public function getSortingStateProperty()
    {
        return [
            'sort_by' => $this->sortByAttribute,
            'direction' => $this->sortDirection
        ];
    }

    public function getHandleNullsProperty()
    {
        return $this->sortDirection == 'DESC' ? 'NULLS LAST' : 'NULLS FIRST';
    }
}
