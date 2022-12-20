<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <button class="btn btn-default mr-2 btn-block">
                <i class="fa fa-gear"></i>
                Permission
            </button>
        </div>
    </div>
</div>

<button class="btn btn-default mr-2" data-toggle="tooltip" data-placement="top" title="Show Detail">
    <i class="fa fa-eye"></i>    
</button>

<button class="btn btn-default mr-2" onclick="edit({{ $id }})" data-toggle="tooltip" data-placement="top" title="Edit">
    <i class="fa fa-edit"></i>
</button>

<button class="btn btn-danger" onclick="destroy({{ $id }})" data-toggle="tooltip" data-placement="top" title="Delete">
    <i class="fa fa-trash"></i>
</button>
