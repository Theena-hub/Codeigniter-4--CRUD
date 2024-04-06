<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">S.No</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($result)) {
            $sno = 1;
            foreach ($result as $row) { ?>
                <tr>
                    <th scope="row">
                        <?= $sno ?>
                    </th>
                    <td>
                        <?= $row->name ?>
                    </td>
                    <td>
                        <?= $row->phone ?>
                    </td>
                    <td>
                        <?= $row->email ?>
                    </td>
                    <td>
                        <button type="button" data-id="<?=$row->id?>" class="btn btn-warning edit-btn" data-bs-toggle='modal' data-bs-target='#Modal'>Edit</button>
                        <button type="button" data-id="<?=$row->id?>" class="btn btn-danger delete-btn">Delete</button>
                    </td>
                </tr>
                <?php $sno++;
            }
        }
        ?>
    </tbody>
</table>        