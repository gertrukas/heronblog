<table id="printTable" class="table"  {{$attributes}}>
@isset($head)
        <thead>
            <tr>
                {{ $head }}
            </tr>
        </thead>
@endisset
        <tbody wire:sortable="UpdateOrder" class="left-align">
            {{ $body }}
        </tbody>
    </table>
