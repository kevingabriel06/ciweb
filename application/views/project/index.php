<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-primary" href="<?php echo base_url('project/create/');?>"> 
            Create New Project
        </a>
        <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-outline-danger">Logout</a>
    </div>

    <div class="card-body">
        <?php if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
 
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Date Created</th>
                <th width="240px">Action</th>
            </tr>
 
            <?php foreach ($projects as $project) { ?>      
            <tr limit="10">
                <td><?php echo $project->name; ?></td>
                <td><?php echo $project->description; ?></td> 
                <td><?php echo $project->created_at; ?></td>          
                <td>
                    <a
                        class="btn btn-outline-info"
                        href="<?php echo base_url('project/show/'. $project->id) ?>"> 
                        Show
                    </a>
                    <a
                        class="btn btn-outline-success"
                        href="<?php echo base_url('project/edit/'.$project->id) ?>"> 
                        Edit
                    </a>
                    <a
                        class="btn btn-outline-danger" onclick="confirmDelete('<?php echo base_url('project/delete/'.$project->id) ?>')"
                        href="#"> 
                        Delete
                    </a>

                    <script>
                    function confirmDelete(url){
                        if(confirm("Are you sure you want to Delete this data?")){
                            window.location.href = url;
                        }
                    }
                    </script>
                </td>     
            </tr>
            <?php } ?>
        </table>
    </div>
</div>