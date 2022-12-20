<button class="btn btn-default mr-2" data-toggle="tooltip" data-placement="top" title="Show Detail">
    <i class="fa fa-eye"></i>    
</button>

<button class="btn btn-default mr-2" onclick="edit({{ $id }})" data-toggle="tooltip" data-placement="top" title="Edit">
    <i class="fa fa-edit"></i>
</button>

<button class="btn btn-danger" onclick="destroy({{ $id }})" data-toggle="tooltip" data-placement="top" title="Delete">
    <i class="fa fa-trash"></i>
</button>
