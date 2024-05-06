<table id="basic-datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>Picture</th>
            <th>Barcode</th>
            <th>Name</th>
            <th>Manufacturer</th>   
            <th>Type</th>
            <th>Quantity</th>
            <th>Quantity Movement</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $data)
            <tr id="appendItems" role="row" class="odd">
                <td class="item-id">{{ $data->storage_item_id }}</td>
                <td style="max-height: 40px; max-width: 40px" >
                    <figure class="profile-picture">
                        <img src="{{url(env('IMG_BASE_URL') . $data->referalDocument) }}" style="max-height: 40px; max-width: 40px">
                    </figure>
                </td>
                <td id="barcode_{{ $data->storage_item_id }}">{{ $data->barcode }}</td>
                <td id="name_{{ $data->storage_item_id }}">{{ $data->name }}</td>
                <td id="manufacturer_{{ $data->storage_item_id }}">{{ $data->manufacturer }}</td>
                <td id="type_{{ $data->storage_item_id }}">{{ $data->type }}</td>
                <td id="newQuantity_{{$data->storage_item_id}}">{{$data->qty}}</td>
                <td>
                    <input class="form-control" name="qty_transfer" type="number" id="qtyMov_{{$data->storage_item_id}}" min="1" max="{{$data->qty}}" value="1" oninput="this.value = Math.min(Math.max(parseInt(this.value), 1), <?php echo $data->qty; ?>)">
                </td>                
                <td>
                    <button type="button" onclick="additem(`{{ $data->storage_item_id }}`)" class="btn btn-success waves-effect waves-light table-btn-custom pluscls add_pr" id="add_pr"><i class="uil-plus"></i></button>
                    <button type="button" onclick="additem(`{{ $data->storage_item_id }}`)" class="btn btn-danger waves-effect waves-light table-btn-custom remove_pr" id="remove_pr"><i class="uil-minus"></i></button>
                </td>
                <td id="store-items-id_{{ $data->storage_item_id }}" style="display:none;">{{ $data->storage_item_id }}</td>
            </tr>
        @empty
            <!-- Handle case where $items is empty -->
        @endforelse
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('.remove_pr').hide();
        $('.add_pr').click(function() {
            $(this).hide();
            $(this).siblings('.remove_pr').show();
        });
        $('.remove_pr').click(function() {
            $(this).hide();
            $(this).siblings('.add_pr').show();
        });
    });
</script>