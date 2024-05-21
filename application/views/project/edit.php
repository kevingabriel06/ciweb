<h2 class="text-center mt-5 mb-3"><?php echo $title;?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('project/');?>"> 
            View All Projects
        </a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('errors')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>
 
        <form action="<?php echo base_url('project/update/' . $project->id);?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    value="<?php echo $project->name;?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                    class="form-control"
                    id="description"
                    rows="3"
                    name="description"><?php echo $project->description;?></textarea>
            </div>
          
            <div class="form-froup mb-3">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control" required onchange="previewImage(event)">
                <img class="img-fluid" id="imagePreview" src="<?= base_url('../assets/images/') . $project->image ?>" style="width: 150px; height: 150px; <?php echo base_url('../assets/images/') . $project->image ; ?>">
            </div>

            <button type="submit" class="btn btn-outline-primary">Save Project</button>
        </form>
       
    </div>
</div>

<script>
    function previewImage(event){
        var reader = new FileReader();

        reader.onload = function (){
            var output = document.getElementById('imagePreview');
            output.src=reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
    }
</script>