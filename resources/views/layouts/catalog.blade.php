@if(!empty($products))
    <table>
        @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                @if(!empty($categories))
                    @foreach($categories as $category)
                        @if($category->id == $product->id)
                            <td>{{$category->cat}}</td>
        @endif
        @endforeach
        @endif
@endforeach
@endif
