<style>
    .table {
        border: 1px solid;
        border-collapse: collapse;
        width: 100%;
        text-indent: 0;
        border-color: inherit;
    }

    .table th {
        padding-left: 0.5rem;
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
        font-weight: 400;
        font-size: 10px;
        border: 1px solid;
        text-align: left;
    }

    .table td {
        padding-left: 0.5rem;
        font-size: 8px;
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
        border: 1px solid;
        text-align: left;
    }

    .page-break {
        page-break-after: always;
    }
</style>
@isset($logo)
  <div>
    <img src="{{$logo}}" style="width: 150px;margin-left: -25px;" />
  </div>
@endisset
@isset($title)
<h2 >{{$title}}</h2>
@endisset
@isset($info)
<p>{{$info}}</p>
@endisset
<table style="width:100%;margin-top:20px;" class="table">
    @isset($header)
    <thead>
        <tr>
            @foreach ($header as $item)
            <th><b>{{$item}}</b></th>
            @endforeach
        </tr>
    </thead>
    @endisset
    @isset($rows)
    @php $a=0; @endphp
    <tbody style="border:1px solid;">
        @foreach ($rows as $item)
        <tr>
            @foreach ($item as $items)
            <td>{{$items}}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
    @endisset
</table>
