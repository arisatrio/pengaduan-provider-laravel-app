<button class="btn btn-default mr-2" onclick="edit({{ $id }})" data-toggle="tooltip" data-placement="top" title="Edit">
    <i class="fa fa-edit"></i>
</button>

@if($deleted_at)
<button class="btn btn-success" onclick="destroy({{ $id }})" data-toggle="tooltip" data-placement="top" title="Delete">
    <i class="fa fa-history"></i>
</button>
@else
<button class="btn btn-danger" onclick="destroy({{ $id }})" data-toggle="tooltip" data-placement="top" title="Delete">
    <i class="fa fa-trash"></i>
</button>
@endif