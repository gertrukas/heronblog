<?php

namespace App\Http\Traits;

trait WithTable {
    use WithPerPage;
    use WithSearch;
    use WithSorting;
    use WithSortings;
    use WithMessages;
    use WithExports;
    use WithBulkActions;
    use WithCachedRows;
}
