@php
    use App\Models\Item;
    use App\Models\ItemCategory;

    $item = Item::find($row->choose_equip);

@endphp
{{$item->cat->category_name}}