<td class="hstack gap-4">
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?query=edit&id=<?php echo $data->Id; ?>">
        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
            <i class="bi bi-pencil"></i>
        </button>
    </a>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?query=delete&id=<?php echo $data->Id; ?>">
        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
            <i class="bi bi-trash"></i>
        </button>
    </a>
</td>